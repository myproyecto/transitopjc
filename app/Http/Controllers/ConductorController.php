<?php

namespace Tesis\Http\Controllers;

use Illuminate\Http\Request;
use Tesis\Requests;
use Tesis\Persona;
use Illuminate\support\facades\redirect;
use Tesis\http\Requests\PersonaFormRequest;

use DB;

class ConductorController extends Controller
{

    
  public function __construct()
  {
        
  }

  public function index(Request $request)
  {
    if($request)

    	$query=trim($request->get('searchText'));
    	$personas=DB::table('persona')
    	->where('nombre','LIKE','%'.$query.'%')
    	->where('tipo_persona','=','Conductor')
    	->orwhere('num_documento','LIKE','%'.$query.'%')
    	->where('tipo_persona','=','Conductor')
    	->orderby('idpersona','desc')
    	->paginate(7);
    	return view('pagos.conductor.index',["personas"=>$personas,"searchText" =>$query]);
    	

  }

  public function create()
  {

    return view("pagos.conductor.create");

  }

  public function store (PersonaFormRequest $request)
  {

    $persona=new Persona;
    $persona->tipo_persona='Conductor';
    $persona->nombre=$request->get('nombre');
    $persona->tipo_documento=$request->get('tipo_documento');
    $persona->num_documento=$request->get('num_documento');
    $persona->direccion=$request->get('direccion');
    $persona->telefono=$request->get('telefono');
    $persona->email=$request->get('email');
    $persona->save();
    return redirect::to('pagos/conductor');
  }  

  public function show($cod)
  {
    return view("pagos.conductor.show",["persona"=>Persona::findOrFail($cod)]);
  }

  public function edit($cod)
  {
    return view("pagos.conductor.edit",["persona"=>Persona::findOrFail($cod)]);
  }

  public function update(PersonaFormRequest $request,$cod)
  {

    $persona=Persona::findOrFail($cod);
    $persona->nombre=$request->get('nombre');
    $persona->tipo_documento=$request->get('tipo_documento');
    $persona->num_documento=$request->get('num_documento');
    $persona->direccion=$request->get('direccion');
    $persona->telefono=$request->get('telefono');
    $persona->email=$request->get('email');
    $persona->update();
    return redirect::to('pagos/conductor');
  }

  public function destroy($cod)
  {
    $persona=Persona::findOrFail($cod);
    $persona->tipo_persona='I';
    $persona->update();
    return redirect::to('pagos/conductor');
  }
}
