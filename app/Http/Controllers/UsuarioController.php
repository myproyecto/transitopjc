<?php

namespace Tesis\Http\Controllers;

use Illuminate\Http\Request;

use Tesis\http\Requests;
use Illuminate\Support\Facades\Redirect;
use Tesis\User;

use Tesis\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
    	if($request)

    		$query=trim($request->get('searchText'));
    		$usuarios=DB::table('users')
    		->where('name','LIKE','%'.$query.'%')
        ->where('username','LIKE','%'.$query.'%')
    		->orderby('id','desc')
    		->paginate(7);
    		return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText" =>$query]);
    	

    }

    public function create()
    {

    	return view("seguridad.usuario.create");

    }

    public function store (UsuarioFormRequest $request)
    {
    	$usuario=new User;
     	$usuario->name=$request->get('name');
     	$usuario->username=$request->get('username');
     	$usuario->email=$request->get('email');
     	$usuario->password=bcrypt($request->get('password'));
     	$usuario->save();
      	return redirect::to('seguridad/usuario');
    }  

    public function edit($cod)
    {
    	return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($cod)]);
    }

    public function update(UsuarioFormRequest $request,$cod)
    {

    	$usuario=User::findOrFail($cod);
     	$usuario->name=$request->get('name');
     	$usuario->username=$request->get('username');
     	$usuario->email=$request->get('email');
     	$usuario->password=bcrypt($request->get('password'));
     	$usuario->update();
      	return redirect::to('seguridad/usuario');
    }

    public function destroy($cod)
    {
    	$usuario=DB::table('users')->where('id','=',$cod)->delete();
    	return redirect::to('seguridad/seguridad');
    }
    
}
