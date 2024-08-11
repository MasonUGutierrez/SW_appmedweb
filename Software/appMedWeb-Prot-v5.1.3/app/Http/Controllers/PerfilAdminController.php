<?php

namespace appMedWeb\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use appMedWeb\Models\User;
use appMedWeb\Models\PersonaModel;

use appMedWeb\Http\Requests\PerfilFormRequest;

use DB;

class PerfilAdminController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	$perfil = DB::table('tbpersona as p')
    		->join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
    		->select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
    		->where('u.IdUsuario','=',Auth()->user()->IdUsuario)
    		->first();
    	return view('Admin.perfil.index',['perfil'=>$perfil]);
    }

    public function edit($id){
    	$perfil = DB::table('tbpersona as p')
    		->join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
    		->select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
    		->where('u.IdUsuario','=',$id)
    		->first();
    	return view('Admin.perfil.edit',['perfil'=>$perfil]);
    }

    public function update(PerfilFormRequest $request, $id){
    	try {
            DB::beginTransaction();
	    	$usuario = User::findOrFail($id);	    	

	    	if (strcasecmp($usuario->name, $request->get('name'))) 
	    	{
                $usuario->name = $request->get('name');
            }
	        $passwordh = hash::make($request->get('password'));
	        $usuario->password=$passwordh;
	        $usuario->Rol=$request->get('Rol');
	        $usuario->save();

	        //Se actualiza de esta forma ya que $personal es un objeto de la tabla no del modelo
	        $personal = DB::table('tbpersona as p')
	        	->where('p.IdUsuario','=',$id)
	        	->update([
	        		'Cedula'=>$request->get('Cedula'),
	        		'Nombres'=>$request->get('Nombres'),
	        		'Apellidos'=>$request->get('Apellidos'),
	        		'Sexo'=>$request->get('Sexo'),
	        		'Telefono'=>$request->get('Telefono'),
	        		'Direccion'=>$request->get('Direccion'),
	        		'Correo'=>$request->get('Correo')
	        		]);
	     
	        DB::commit();
	    }catch(Exception $e){
	    	DB::rollback();
	    }

        return Redirect::to(url('admin/perfil'));
    }
}
