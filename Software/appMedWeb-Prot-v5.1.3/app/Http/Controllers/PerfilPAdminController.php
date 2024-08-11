<?php

namespace appMedWeb\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use appMedWeb\Models\User;
use appMedWeb\Models\PersonaModel;
use appMedWeb\Http\Requests\PerfilFormRequest;

use DB;


class PerfilPAdminController extends Controller
{
    //
    public function index()
    {
    	$perfilUsuario = User::findOrFail(Auth()->user()->IdUsuario);
    	$perfilPersona = PersonaModel::where('IdUsuario','=',$perfilUsuario->IdUsuario)->first();

    	return view('PAdmin.perfil.index',['perfilUsuario'=>$perfilUsuario,'perfilPersona'=>$perfilPersona]);
    }

    public function edit($id)
    {
    	$perfilUsuario = User::findOrFail($id);
    	$perfilPersona = PersonaModel::where('IdUsuario','=',$perfilUsuario->IdUsuario)->first();

    	return view('PAdmin.perfil.edit',['perfilUsuario'=>$perfilUsuario,'perfilPersona'=>$perfilPersona]);
    }

    public function update(PerfilFormRequest $request, $id)
    {
    	try
    	{
    		DB::beginTransaction();
    			//Actualizando campos de la tabla usuario
    			$perfilUsuario = User::findOrFail($id);
    			$perfilUsuario->name=$request->get('name');
    			$perfilUsuario->password=$request->get('password');
    			$perfilUsuario->save();

    			$perfilPersona = PersonaModel::where('IdUsuario','=',$perfilUsuario->IdUsuario)->first();
    			$perfilPersona->Cedula = $request->get('Cedula');
    			$perfilPersona->Nombres = $request->get('Nombres');
    			$perfilPersona->Apellidos = $request->get('Apellidos');
    			$perfilPersona->Sexo = $request->get('Sexo');
    			$perfilPersona->Telefono = $request->get('Telefono');
    			$perfilPersona->Direccion = $request->get('Direccion');
    			$perfilPersona->Correo = $request->get('Correo');
    			$perfilPersona->save();
    		DB::commit();
    	}
    	catch(Exception $e)
    	{
    		DB::rollBack();
    	}
    	return Redirect::to(url('padmin/perfil'));
    }
}
