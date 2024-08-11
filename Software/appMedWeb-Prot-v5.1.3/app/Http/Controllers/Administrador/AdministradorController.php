<?php

namespace appMedWeb\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use appMedWeb\Http\Controllers\Controller;

use appMedWeb\Models\PersonaModel;
use appMedWeb\Models\User;
use Illuminate\Support\Facades\Hash;

use appMedWeb\Http\Requests\AdministradorFormRequest;

use DB;
class AdministradorController extends Controller
{
    public function __construct(){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $administradores=DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
                -> where('p.Estado','=','1')
                -> where('u.Rol','=','A')
                -> where('u.IdUsuario','!=',Auth()->user()->IdUsuario)
                -> get();
            return view('Admin.administrador.index',["administradores"=>$administradores]);
        }        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorFormRequest $request)
    {
        try {
            DB::beginTransaction();
                $usuario= new User;
                $administrador= new PersonaModel;

                $usuario->name=$request->get('name');
                $passwordh = hash::make($request->get('password'));
                $usuario->password=$passwordh;
                $usuario->Rol=$request->get('Rol');
                $usuario->save();

                $IdUsuario = $usuario->IdUsuario;
                // $Ultimousuario=DB::table('tbusuario');
                // $usuarioA=$Ultimousuario->last();

                // $administrador->IdUsuario=$usuarioA->IdUsuario;
                $administrador->IdUsuario=$IdUsuario;
                $administrador->Cedula=$request->get('Cedula');
                $administrador->Nombres=$request->get('Nombres');
                $administrador->Apellidos=$request->get('Apellidos');
                $administrador->Sexo=$request->get('Sexo');
                $administrador->Telefono=$request->get('Telefono');
                $administrador->Direccion=$request->get('Direccion');
                $administrador->Correo=$request->get('Correo');
                $administrador->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }     
        return Redirect::to(url('admin/usuarios/admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrador==DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
                -> where('p.IdPersona','=',$id)
                -> where('u.Rol','=','A')
                -> first();
        return view('Admin.administrador.show',['administrador'=>$administrador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $administrador=DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
                -> where('p.IdPersona','=',$id)
                // -> where('u.Rol','=','Administrador')
                -> first();
        return view('Admin.administrador.edit',['administrador'=>$administrador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministradorFormRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $administrador=PersonaModel::findOrFail($id);
            // $administrador = DB::table('tbpersona')
            //     ->where('tbpersona.IdPersona','=',$id)
            //     ->first();
            $usuario=User::findOrFail($administrador->IdUsuario);
            // $usuario=DB::table('tbusuario')
            //     ->where('tbusuario.IdUsuario','=',$administrador->IdUsuario)
            //     ->first();

            if (strcasecmp($usuario->name, $request->get('name'))) 
            {
                $usuario->name = $request->get('name');
            }
            $passwordh = hash::make($request->get('password'));
            $usuario->password=$passwordh;
            $usuario->Rol=$request->get('Rol');
            $usuario->save();

            $administrador->Cedula=$request->get('Cedula');
            $administrador->Nombres=$request->get('Nombres');
            $administrador->Apellidos=$request->get('Apellidos');
            $administrador->Sexo=$request->get('Sexo');
            $administrador->Telefono=$request->get('Telefono');
            $administrador->Direccion=$request->get('Direccion');
            $administrador->Correo=$request->get('Correo');
            $administrador->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }  
        return Redirect::to(url('admin/usuarios/admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrador=PersonaModel::findOrFail($id);
        $usuario=User::findOrFail($administrador->IdUsuario);

        $usuario->Estado=0;
        $usuario->save();

        $administrador->Estado=0;
        $administrador->save();

        return Redirect::to(url('admin/usuarios/admin'));
    }
}
