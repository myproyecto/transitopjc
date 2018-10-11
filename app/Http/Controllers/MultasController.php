<?php

namespace Tesis\Http\Controllers;

use Illuminate\Http\Request;

use Tesis\http\Requests;
use Illuminate\support\facades\Redirect;
use Illuminate\support\facades\Input;
use Tesis\http\Requests\MultasFormRequest;
use Tesis\Multa;
use Tesis\DetalleMulta;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\support\Collection;

class MultasController extends Controller

{

    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
    	if($request)
        {
            $query=trim($request->get('searchText'));
            $multas=DB::table('multa as m')
            ->join('users as u', 'm.id', '=', 'u.id')
            ->join('persona as pe', 'm.idconductor', '=', 'pe.idpersona')
            
            ->join('detalle_multa as dm', 'm.idmulta','=','dm.idmulta')
            ->select('m.idmulta','m.fecha_hora','u.name','pe.nombre','m.tipo_comprobante','m.num_comprobante','m.datos_vehiculo','m.impuesto','m.estado',DB::raw('sum(1*valor_falla)as total'))
            
            ->where('m.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('m.idmulta','desc')
            ->groupBy('m.idmulta','m.fecha_hora','u.name','pe.nombre','m.tipo_comprobante','m.num_comprobante','m.datos_vehiculo','m.impuesto','m.estado')
            ->paginate(7);
            return view('multas.multa.index',["multas"=>$multas,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	$personas=DB::table('users')->where('id','=','1')->get();
        $personal=DB::table('persona')->where('tipo_persona','=','Conductor')->get();
    	$fallas=DB::table('falla as fa')
    	->select(DB::raw('CONCAT("ID-",fa.idfalla," : ",fa.nombre) as falla'), 'fa.idfalla')
    	->where('fa.estado','=','A')
    	->get();
    	return view("multas.multa.create",["personas"=>$personas,"personal"=>$personal,"fallas"=>$fallas]);
    }

    public function store(MultasFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $multa = new Multa;
            $multa->id = $request->get('id');
            $multa->idconductor = $request->get('idconductor');
            $multa->tipo_comprobante = $request->get('tipo_comprobante');
            $multa->num_comprobante = $request->get('num_comprobante');
            $multa->datos_vehiculo = $request->get('datos_vehiculo');

            $mytime = Carbon::now('America/Asuncion');
            $multa->fecha_hora = $mytime->toDateTimeString();
            $multa->impuesto = '10';
            $multa->estado = 'A';
            $multa->save();


            $idfalla=$request->get('idfalla');
            $valor_falla=$request->get('valor_falla');


            $cont=0;

            while($cont < count ($idfalla)){
                $detalle = new DetalleMulta();
                $detalle->idmulta = $multa->idmulta;
                $detalle->idfalla = $idfalla[$cont];
                $detalle->valor_falla = $valor_falla[$cont];
                $detalle->save();
                $cont=$cont+1;


            }
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('multas/multa');
    }

    public function show($cod)
    {
        $multa=DB::table('multa as m')  
            ->join('users as u', 'm.id','=','u.id')
            ->join('persona as pe', 'm.idconductor','=','pe.idpersona')
            ->join('detalle_multa as dm','m.idmulta','=','dm.idmulta')
            ->select('m.idmulta','m.fecha_hora','u.name','pe.nombre','m.tipo_comprobante','m.num_comprobante','m.datos_vehiculo','m.impuesto','m.estado', DB::raw('sum(1*valor_falla)as total'))
            ->where('m.idmulta', '=',$cod)
            ->groupBy('m.idmulta','m.fecha_hora','u.name','pe.nombre','m.tipo_comprobante', 'm.num_comprobante','m.datos_vehiculo','m.impuesto','m.estado')
            ->first();

        $detalles=DB::table('detalle_multa as d')
            ->join('falla as f','d.idfalla','=','f.idfalla')
            ->select('f.nombre as falla','d.valor_falla')
            ->where('d.idmulta','=',$cod)
            ->get();
        return view("multas.multa.show",["ingreso"=>$multa,"detalles"=>$detalles]);

    }
    public function destroy($cod)
    {
        $multa=Multa::findOrfail($cod);
        $Multa->estado='I';
        $Multa->update();
        return Redirect::to('multas/multa');
    }
}

