<?php

namespace appMedWeb\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use appMedWeb\Http\Controllers\Controller;

use appMedWeb\Models\AreaMedicaModel;
use appMedWeb\Http\Requests\AreaMedicaFormRequest;
use DB;

class AreaMedicaController extends Controller
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
    public function index(Request $request)
    {
        if ($request) {
            $areasmedicas = DB::table('tbareamedica')
                ->where('Estado','=','1')
                ->get();
        return view('Admin.areamedica.index',['areasmedicas'=>$areasmedicas]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.areamedica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaMedicaFormRequest $request)
    {
        $areamedica=new AreaMedicaModel;
        $areamedica->AreaMedica=$request->get('AreaMedica');
        $areamedica->save();

        return Redirect::to(url('admin/areas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.areamedica.show',['areamedica'=>AreaMedicaModel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.areamedica.edit',['areamedica'=>AreaMedicaModel::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaMedicaFormRequest $request, $id)
    {
        $areamedica=AreaMedicaModel::findOrFail($id);
        $areamedica->AreaMedica=$request->get('AreaMedica');
        $areamedica->save();
        return Redirect::to(url('admin/areas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areamedica=AreaMedicaModel::findOrFail($id);
        $areamedica->Estado=0;
        $areamedica->save();
        return Redirect::to(url('admin/areas'));
    }
}
