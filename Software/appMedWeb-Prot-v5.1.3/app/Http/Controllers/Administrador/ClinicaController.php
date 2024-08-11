<?php

namespace appMedWeb\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use appMedWeb\Http\Controllers\Controller;

use appMedWeb\Models\ClinicaModel;
use appMedWeb\Http\Requests\ClinicaFormRequest;
use DB;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinica = DB::table('tbclinica as c')
        ->where('c.Estado','=','1')
        ->first();
        return view('Admin.clinica.index',['clinica'=>$clinica]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinica = DB::table('tbclinica as c')
            ->select('c.IdClinica','c.Ruc','c.NombreClinica','c.Telefono','c.Direccion','c.Correo','c.Url')
            ->where('c.IdClinica','=',$id)
            ->first();
        return view('Admin.clinica.edit',['clinica'=>$clinica]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicaFormRequest $request, $id)
    {
        $clinica = ClinicaModel::findOrFail($id);

        $clinica->Ruc = $request->get('Ruc');
        $clinica->NombreClinica = $request->get('NombreClinica');
        $clinica->Telefono = $request->get('Telefono');
        $clinica->Direccion = $request->get('Direccion');
        $clinica->Correo = $request->get('Correo');
        $clinica->Url = $request->get('Url');

        $clinica->save();
        return redirect('admin/clinica');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
