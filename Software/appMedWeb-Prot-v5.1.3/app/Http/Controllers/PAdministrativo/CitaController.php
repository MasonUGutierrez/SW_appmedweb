<?php

namespace appMedWeb\Http\Controllers\PAdministrativo;

use Illuminate\Http\Request;
use appMedWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use appMedWeb\Models\CitaModel;
use appMedWeb\Models\AreaMedicaModel;
use appMedWeb\Models\MedicoModel;
use appMedWeb\Models\ExpedienteModel;

use appMedWeb\Http\Requests\CitaFormRequest;

use DB;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citasgenerales = CitaModel::where('Estado','=',1)->get();
        // $citasdia = CitaModel::where('FechaCita',date('Y-m-d'))->get();
        // $citascanc = CitaModel::where('EstadoCita','C')->get();
        // $citaspend = CitaModel::where('EstadoCita','P')->get();
        // $citasreal = CitaModel::where('EstadoCita','R')->get();

        //retornando la vista index con las lista de los tipos de citas generales, del dia en curso, canceladas, pendientes y realizadas
        return view('PAdmin.cita.index',['citasgenerales'=>$citasgenerales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = ExpedienteModel::where('Estado',1)->get();
        $areasmedicas = AreaMedicaModel::where('Estado','=','1')->get();
        $medicos = MedicoModel::where('Estado',1)->get();
        $medicos->each(function($medicos)
            {
                $medicos->persona;
            });
        // $medicos = DB::table('tbmedico as m')
        //     ->join('tbpersona as p','m.IdPersona','=','p.IdPersona')
        //     ->select('m.*','p.*')
        //     ->where('m.Estado',1)
        //     ->get();

        return view('PAdmin.cita.create',['pacientes'=>$pacientes,'areasmedicas'=>$areasmedicas,'medicos'=>$medicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaFormRequest $request)
    {
        $cita = new CitaModel;
        $cita->IdMedico = $request->IdMedico;
        $cita->IdExpediente = $request->IdExpediente;
        $cita->FechaCita = $request->FechaCita;
        $cita->save();
        return redirect('padmin/citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = CitaModel::findOrFail($id);
        return view('PAdmin.cita.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = CitaModel::findOrFail($id);
        if ($cita->EstadoCita =='C' || $cita->EstadoCita=='R') {
            session()->flash('mensaje', 
                            [
                                'color' => 'danger',
                                'm' => 'La cita ha sido ' . (( $cita->EstadoCita == 'C' ) ? 'cancelada':'realizada' )
                            ]);
            return redirect('padmin/citas');
        }
        return view('PAdmin.cita.edit',['cita'=>$cita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitaFormRequest $request, $id)
    {
        $cita = CitaModel::findOrFail($id);
        $cita->FechaCita = $request->FechaCita;
        $cita->EstadoCita = $request->EstadoCita;

        $cita->save();
        // return $cita->EstadoCita;
        return redirect('padmin/citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = CitaModel::findOrFail($id);
        $cita->Estado = 0;

        $cita->save();
        return redirect('padmin/citas');
    }
}
