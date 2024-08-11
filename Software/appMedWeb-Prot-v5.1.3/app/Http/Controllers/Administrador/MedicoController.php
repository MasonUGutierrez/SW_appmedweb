<?php

namespace appMedWeb\Http\Controllers\Administrador;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use appMedWeb\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use appMedWeb\Models\PersonaModel;
use appMedWeb\Models\User;
use appMedWeb\Models\MedicoModel;
// use appMedWeb\Models\DiaModel;
use appMedWeb\Models\DiaMedicoModel;
// use appMedWeb\Models\AreaMedicaModel;

use appMedWeb\Http\Requests\MedicoFormRequest;

use DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $medicos=DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> join('tbmedico as m','p.IdPersona','=','m.IdPersona')
                -> join('tbareamedica as am','m.IdAreaMedica','=','am.IdAreaMedica')
                -> select('p.IdPersona','m.CodMinsa','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Correo','u.IdUsuario','am.AreaMedica')
                -> where('p.Estado','=','1')
                -> where('u.Rol','=','M')
                -> get();
            return view('Admin.medico.index',['medicos'=>$medicos]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areasmedicas = DB::table('tbareamedica as a')->where('a.Estado','=','1')->get();
        $dias = DB::table('tbdia as d')->where('d.Estado','=','1')->get();

        return view('Admin.medico.create',['areasmedicas'=>$areasmedicas,'dias'=>$dias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoFormRequest $request)
    {
        try {
            DB::beginTransaction();
                //Modelos de las tablas
                $usuario = new User;
                $medico = new PersonaModel;
                $detallesmedico = new MedicoModel;

                //Guardando datos del usuario
                $usuario->name = $request->get('name');
                $passwordh = hash::make($request->get('password'));
                $usuario->password = $passwordh;
                $usuario->Rol = $request->get('Rol');
                $usuario->save();
                //Obteniendo el id del ultimo usuario ingresado
                $IdUsuario = $usuario->IdUsuario;
                //Guardando datos de la persona (medico)
                $medico->IdUsuario = $IdUsuario;
                $medico->Cedula=$request->get('Cedula');
                $medico->Nombres=$request->get('Nombres');
                $medico->Apellidos=$request->get('Apellidos');
                $medico->Sexo=$request->get('Sexo');
                $medico->Telefono=$request->get('Telefono');
                $medico->Direccion=$request->get('Direccion');
                $medico->Correo=$request->get('Correo');
                $medico->save();                
                //Obteniendo el id de la ultima persona ingresada
                $IdPersona = $medico->IdPersona;
                //Guardando datos del medico
                $detallesmedico->IdPersona=$IdPersona;
                $detallesmedico->IdAreaMedica=$request->get('IdAreaMedica');
                $detallesmedico->CodMinsa=$request->get('CodMinsa');
                $detallesmedico->Especialidad=$request->get('Especialidad');
                $detallesmedico->SubEspecialidad=$request->get('SubEspecialidad');
                $detallesmedico->save();
                //Obteniendo el id del ultimo medico ingresado
                $IdMedico = $detallesmedico->IdMedico;

                //Array de elementos de diamedico
                $IdDia = $request->get('IdDia');
                $HoraInicio = $request->get('HoraInicio');
                $HoraFin = $request->get('HoraFin');
                //variable contador
                $contador = 0;
                while ( $contador < count($IdDia) ) 
                {
                    //Modelo de la tabla DiaMedico
                    $DiaMedico = new DiaMedicoModel();
                    //Guardando datos de diamedico                    
                    $DiaMedico->IdDia = $IdDia[$contador];
                    $DiaMedico->IdMedico = $IdMedico;
                    $DiaMedico->HoraInicio = $HoraInicio[$contador];
                    $DiaMedico->HoraFin = $HoraFin[$contador];
                    $DiaMedico->save();

                    $contador++;
                }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return Redirect::to(url('admin/usuarios/medico'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Arreglo con datos de usuario y persona por X id
        $medico=DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
                -> where('p.IdPersona','=',$id)
                -> first();
        //Arreglo del medico por el Id de la persona                
        $detallesmedico=DB::table('tbmedico as m')
                -> where('m.IdPersona','=',$medico->IdPersona)
                -> first();
        //Arreglo de todas las areas medicas, llenara el combobox y mostrara seleccionada el area del medico exacto
        $areasmedicas = DB::table('tbareamedica as a')->where('a.Estado','=','1')
                -> get();
        //Arrego con todos los dias del medico
        $diasmedico=DB::table('tbdiamedico as dm')
                -> where('dm.IdMedico','=',$detallesmedico->IdMedico)
                -> get();
        //Arreglo para los dias
        $dias = DB::table('tbdia as d')->where('d.Estado','=','1')->get();

        return view('Admin.medico.show',['medico'=>$medico,'detallesmedico'=>$detallesmedico,'areasmedicas'=>$areasmedicas,'diasmedico'=>$diasmedico,'dias'=>$dias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Arreglo con datos de usuario y persona por X id
        $medico=DB::table('tbpersona as p')
                -> join('tbusuario as u','p.IdUsuario','=','u.IdUsuario')
                -> select('p.IdPersona','p.Cedula','p.Nombres','p.Apellidos','p.Sexo','p.Telefono','p.Direccion','p.Correo','u.IdUsuario','u.name','u.password','u.Rol')
                -> where('p.IdPersona','=',$id)
                -> first();
        //Arreglo del medico por el Id de la persona                
        $detallesmedico=DB::table('tbmedico as m')
                -> where('m.IdPersona','=',$medico->IdPersona)
                -> first();
        //Arreglo de todas las areas medicas, llenara el combobox y mostrara seleccionada el area del medico exacto
        $areasmedicas = DB::table('tbareamedica as a')->where('a.Estado','=','1')
                -> get();
        //Arreglo con todos los dias del medico
        $diasmedico=DB::table('tbdiamedico as dm')
                -> join('tbdia as d','dm.IdDia','=','d.IdDia')
                -> select('dm.*','d.Dia')
                -> where('dm.IdMedico','=',$detallesmedico->IdMedico)
                -> get();
        //Arreglo para los dias
        $dias = DB::table('tbdia as d')->where('d.Estado','=','1')->get();

        return view('Admin.medico.edit',['medico'=>$medico,'detallesmedico'=>$detallesmedico,'areasmedicas'=>$areasmedicas,'diasmedico'=>$diasmedico,'dias'=>$dias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoFormRequest $request, $id)
    {        
        try {
            DB::beginTransaction();
                // Modelos por el IdPersona
                $medico = PersonaModel::findOrFail($id);
                $usuario = User::findOrFail($medico->IdUsuario);
                $detallesmedico = MedicoModel::where('IdPersona','=',$medico->IdPersona)->first();

                //Regla de validacion
                // $this->validate($request,[
                //     //Datos Usuarios tbusuario
                //     'name'=>[
                //             'required',
                //             'max:25',
                //             Rule::unique('tbusuario')->ignore($usuario->IdUsuario, 'IdUsuario')
                //             ], 
                //     'password'=>'required|max:60', 
                //     'Rol'=>'max:1',
                //     //Datos personales tbpersona
                //     // 'IdUsuario'=>'numeric',
                //     'Cedula'=>'required|max:16',
                //     'Nombres'=>'required|max:120',
                //     'Apellidos'=>'required|max:120',
                //     'Sexo'=>'max:1',
                //     'Telefono'=>'required|max:15',
                //     'Direccion'=>'max:250',
                //     'Correo'=>'max:100',
                //     // Datos medico tbmedico
                //     // 'IdPersona'=>'numeric' se ingresara automaticamente se ingrese una nueva persona
                //     'IdAreaMedica'=>'required',
                //     'CodMinsa'=>'required|string',
                //     'Especialidad'=>'string|max:100',
                //     'SubEspecialidad'=>'string|max:100',
                //     // Datos tbdiamedico
                //     // 'IdMedico' se ingresara inmendiatamente se cree el medico
                //     'IdDia'=>'required',
                //     'HoraInicio'=>'required',
                //     'HoraFin'=>'required',
                // ]);

                // Actualizando Campos
                if (strcasecmp($usuario->name, $request->get('name'))) 
                {
                    $usuario->name = $request->get('name');
                }                
                $passwordh = hash::make($request->get('password'));
                $usuario->password = $passwordh;
                $usuario->Rol = $request->get('Rol');
                $usuario->save();

                $medico->Cedula=$request->get('Cedula');
                $medico->Nombres=$request->get('Nombres');
                $medico->Apellidos=$request->get('Apellidos');
                $medico->Sexo=$request->get('Sexo');
                $medico->Telefono=$request->get('Telefono');
                $medico->Direccion=$request->get('Direccion');
                $medico->Correo=$request->get('Correo');
                $medico->save();

                $detallesmedico->IdAreaMedica=$request->get('IdAreaMedica');
                $detallesmedico->CodMinsa=$request->get('CodMinsa');
                $detallesmedico->Especialidad=$request->get('Especialidad');
                $detallesmedico->SubEspecialidad=$request->get('SubEspecialidad');
                $detallesmedico->save();
                //Obteniendo el id del medico actualizado
                $IdMedico = $detallesmedico->IdMedico;

                // Elimando registros de diasmedicos por X Medico
                $diasmedico = DiaMedicoModel::where('IdMedico','=',$detallesmedico->IdMedico)->delete();

                //Array de elementos de diamedico
                $IdDia = $request->get('IdDia');
                $HoraInicio = $request->get('HoraInicio');
                $HoraFin = $request->get('HoraFin');
                //variable contador
                $contador = 0;
                while ( $contador < count($IdDia) ) 
                {
                    //Modelo de la tabla DiaMedico
                    $DiaMedico = new DiaMedicoModel();
                    //Guardando datos de diamedico                    
                    $DiaMedico->IdDia = $IdDia[$contador];
                    $DiaMedico->IdMedico = $IdMedico;
                    $DiaMedico->HoraInicio = $HoraInicio[$contador];
                    $DiaMedico->HoraFin = $HoraFin[$contador];
                    $DiaMedico->save();

                    $contador++;
                }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return Redirect::to(url('admin/usuarios/medico'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
                $medico = PersonaModel::findOrFail($id);
                $usuario = User::findOrFail($medico->IdUsuario);


                $detallesmedico = DB::table('tbmedico as m')
                    ->where('m.IdPersona','=',$medico->IdPersona)
                    ->update(['Estado'=>'0']);

                $detallemedico = MedicoModel::where('IdPersona','=',$medico->IdPersona)->first();

                $diasmedico = DB::table('tbdiamedico as dm')
                    ->where('dm.IdMedico','=',$detallemedico->IdMedico)
                    ->update(['Estado'=>'0']);

                $usuario->Estado=0;
                $usuario->save();

                $medico->Estado=0;
                $medico->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return Redirect::to(url('admin/usuarios/medico'));
    }
}
