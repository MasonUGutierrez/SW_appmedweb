<?php

namespace appMedWeb\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use appMedWeb\Http\Controllers\Controller;

use appMedWeb\Models\PersonaModel;
use appMedWeb\Models\User;
use Illuminate\Support\Facades\Hash;

use appMedWeb\Http\Requests\PAdministrativoFormRequest;
use DB;

class PAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $padministrativos=DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
                -> where('p.Estado','=','1')
                -> where('u.Rol','=','P')
                -> get();
            return view('Admin.padministrador.index',["padministrativos"=>$padministrativos]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.padministrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PAdministrativoFormRequest $request)
    {
        try {
            DB::beginTransaction();
                $usuario = new User;
                $padministrativo = new PersonaModel;

                $usuario->name=$request->get('name');
                $passwordh = hash::make($request->get('password'));
                $usuario->password=$passwordh;
                $usuario->Rol=$request->get('Rol');
                $usuario->save();

                $IdUsuario = $usuario->IdUsuario;

                $padministrativo->IdUsuario=$IdUsuario;
                $padministrativo->Cedula=$request->get('Cedula');
                $padministrativo->Nombres=$request->get('Nombres');
                $padministrativo->Apellidos=$request->get('Apellidos');
                $padministrativo->Sexo=$request->get('Sexo');
                $padministrativo->Telefono=$request->get('Telefono');
                $padministrativo->Direccion=$request->get('Direccion');
                $padministrativo->Correo=$request->get('Correo');
                $padministrativo->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return Redirect::to(url('admin/usuarios/padmin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $padministrativo = DB::table('tbpersona as p')
            -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
            -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
            -> where('p.IdPersona','=',$id)
            ->first();
        return view('Admin.padministrador.show',['padministrativo'=>$padministrativo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $padministrativo = DB::table('tbpersona as p')
            -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
            -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
            -> where('p.IdPersona','=',$id)
            ->first();
        return view('Admin.padministrador.edit',['padministrativo'=>$padministrativo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PAdministrativoFormRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $padministrativo = PersonaModel::findOrFail($id);
            $usuario = User::findOrFail($padministrativo->IdUsuario);

            if (strcasecmp($usuario->name, $request->get('name')))
            {
                $usuario->name = $request->get('name');
            }
            $passwordh = hash::make($request->get('password'));
            $usuario->password=$passwordh;
            $usuario->Rol=$request->get('Rol');
            $usuario->save();

            $padministrativo->Cedula=$request->get('Cedula');
            $padministrativo->Nombres=$request->get('Nombres');
            $padministrativo->Apellidos=$request->get('Apellidos');
            $padministrativo->Sexo=$request->get('Sexo');
            $padministrativo->Telefono=$request->get('Telefono');
            $padministrativo->Direccion=$request->get('Direccion');
            $padministrativo->Correo=$request->get('Correo');
            $padministrativo->save();
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }  
        return Redirect::to(url('admin/usuarios/padmin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $padministrativo=PersonaModel::findOrFail($id);
        $usuario=User::findOrFail($padministrativo->IdUsuario);

        $usuario->Estado=0;
        $usuario->save();

        $padministrativo->Estado=0;
        $padministrativo->save();

        return Redirect::to(url('admin/usuarios/padmin'));
    }
}
