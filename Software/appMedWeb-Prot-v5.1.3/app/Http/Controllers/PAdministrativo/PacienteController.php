<?php

namespace appMedWeb\Http\Controllers\PAdministrativo;

use Illuminate\Http\Request;
use appMedWeb\Http\Controllers\Controller;
use appMedWeb\Http\Requests\PacienteFormRequest;
use appMedWeb\Models\ExpedienteModel;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exp = ExpedienteModel::all()->where('Estado',1);
        // with: para enviar parametros
        return view('PAdmin.paciente.index')->with('exp',$exp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PAdmin.paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteFormRequest $request)
    {
        $exp = new ExpedienteModel;

        $exp->Nombres = $request->Nombres;
        $exp->Apellidos = $request->Apellidos;
        $exp->Edad = $request->Edad;
        $exp->Ocupacion = $request->Ocupacion;
        $exp->Sexo = $request->Sexo;
        $exp->TipoSangre = $request->TipoSangre;
        $exp->Alergias = $request->Alergias;
        $exp->Direccion = $request->Direccion;
        $exp->Correo = $request->Correo;
        $exp->Telefono = $request->Telefono;
        $exp->ContactoEmergencia = $request->ContactoEmergencia;
        $exp->ParentezcoContacto = $request->ParentezcoContacto;
        $exp->TelefonoContacto = $request->TelefonoContacto;
        $exp->save();

        return redirect()->action('PAdministrativo\PacienteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exp = ExpedienteModel::find($id);

        $exp->each(function($exp){
             $exp->consultas;
        });

        return view('PAdmin.paciente.show')->with('exp',$exp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exp = ExpedienteModel::find($id);
        return view('PAdmin.paciente.edit')->with('exp',$exp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteFormRequest $request, $id)
    {
        $exp = ExpedienteModel::find($id);

        $exp->Nombres = $request->Nombres;
        $exp->Apellidos = $request->Apellidos;
        $exp->Edad = $request->Edad;
        $exp->Ocupacion = $request->Ocupacion;
        $exp->Sexo = $request->Sexo;
        $exp->TipoSangre = $request->TipoSangre;
        $exp->Alergias = $request->Alergias;
        $exp->Direccion = $request->Direccion;
        $exp->Correo = $request->Correo;
        $exp->Telefono = $request->Telefono;
        $exp->ContactoEmergencia = $request->ContactoEmergencia;
        $exp->ParentezcoContacto = $request->ParentezcoContacto;
        $exp->TelefonoContacto = $request->TelefonoContacto;
        $exp->save();

        return redirect()->action('PAdministrativo\PacienteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exp = ExpedienteModel::find($id);
        $exp->Estado=0;
        $exp->save();
        // $exp->delete();

        return redirect()->action('PAdministrativo\PacienteController@index');
    }
}
