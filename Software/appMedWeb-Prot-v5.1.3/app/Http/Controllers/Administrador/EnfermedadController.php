<?php

namespace appMedWeb\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; //usamos libreria para poder direccionar
use appMedWeb\Http\Controllers\Controller;

use appMedWeb\Models\EnfermedadModel;//usamos el modelo
use appMedWeb\Http\Requests\EnfermedadFormRequest;//usamos el request para el modelo
use DB;//usamos la clase DB de laravel

class EnfermedadController extends Controller
{
    public function __construct()
    {
        // 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//Muestra la pagina inicial de busqueda
    {
        if($request)
        {
            // $query=trim($request->get('searchText'));
            // $enfermedades=DB::table('tbEnfermedad')->where('Enfermedad','LIKE','%'.$query.'%')
            $enfermedades=DB::table('tbEnfermedad')
                ->where('Estado','=','1')
                ->get();
                // ->orderBy('IdEnfermedad','desc');
                
            // return view('Admin.enfermedad.index',["enfermedades"=>$enfermedades,"searchText"=>$query]);
            return view('Admin.enfermedad.index',["enfermedades"=>$enfermedades]);
            // return view('layouts.Admin.enfermedad.index');
        }
         // return view('Admin.enfermedad.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//muestra la pagina de creacion
    {
        //
        return view('Admin.enfermedad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnfermedadFormRequest $request)//Almecena el objeto del modelo
    {
        $enfermedad=new EnfermedadModel;//Se crea la instancia del modelo
        $enfermedad->Enfermedad=$request->get('Enfermedad');//se almecena el valor que este en el form
        $enfermedad->save();
        return Redirect::to(url('admin/enfermedades'));        
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
        return view('Admin.enfermedad.show',['enfermedad'=>EnfermedadModel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('Admin.enfermedad.edit',['enfermedad'=>EnfermedadModel::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnfermedadFormRequest $request, $id)
    {
        $enfermedad=EnfermedadModel::findOrFail($id);
        $enfermedad->Enfermedad=$request->get('Enfermedad');
        $enfermedad->save();
        return Redirect::to(url('admin/enfermedades'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad=EnfermedadModel::findOrFail($id);
        $enfermedad->Estado=0;
        $enfermedad->save();
        return Redirect::to(url('admin/enfermedades'));
    }
}
