<?php
namespace Tesis\Http\Controllers;

use Illuminate\Http\Request;

use Tesis\requests;
use Tesis\Falla;
use Illuminate\support\facades\redirect;
use Tesis\http\requests\FallaFormRequest;
use Illuminate\support\facades\Input;
use DB;

class FallaController extends Controller
{

    public function __construct()

  	{
        
 
  	}

  	public function index(Request $request)
  	{
    	if($request)

    		$query=trim($request->get('searchText'));
    		$fallas=DB::table('falla')
    		->where('nombre','LIKE','%'.$query.'%')
    		->orderby('idfalla','desc')
    		->paginate(7);
    		return view("fallas.falla.index",["fallas"=>$fallas,"searchText" =>$query]);
    	

  }

  public function create()
  {
    return view("fallas.falla.create");

  }

  public function store (FallaFormRequest $request)
  {
    $falla=new Falla;
    $falla->nombre=$request->get('nombre');
    $falla->descripcion=$request->get('descripcion');

    if (input::hasfile('imagen')){

      $file=input::file('imagen');
      $file->move(public_path().'/imagenes/fallas/',$file->getClientOriginalName());
      $falla->imagen=$file->getClientOriginalName();
    }
    $falla->estado='A';
    $falla->save();
    return redirect::to('fallas/falla');
  }  

  public function show($cod)
  {

    return view("fallas.falla.show",["falla"=>Falla::findOrFail($cod)]);
  }

  public function edit($cod)
  {
    return view("fallas.falla.edit",["falla"=>Falla::findOrFail($cod)]);
  }

  public function update(FallaFormRequest $request,$cod)
  {
    $falla=Falla::findOrFail($cod);
    $falla->nombre=$request->get('nombre');
    $falla->descripcion=$request->get('descripcion');
      	

    if (input::hasfile('imagen')){
      $file=input::file('imagen');
      $file->move(public_path().'/imagenes/fallas/',$file->getClientOriginalName());
      $falla->imagen=$file->getClientOriginalName();
    }
    $falla->estado='A';
    $falla->update();
    return redirect::to('fallas/falla');
  }

  public function destroy($cod)
  {
    $falla=Falla::findOrFail($cod);
    $falla->estado='I';
    $falla->update();
    return redirect::to('fallas/falla');
  }
}
