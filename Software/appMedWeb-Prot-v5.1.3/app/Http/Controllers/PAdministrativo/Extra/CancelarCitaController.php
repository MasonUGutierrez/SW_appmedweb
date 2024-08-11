<?php

namespace appMedWeb\Http\Controllers\PAdministrativo\Extra;

use Illuminate\Http\Request;
use appMedWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use appMedWeb\Models\CitaModel;

class CancelarCitaController extends Controller
{
    public function cancelar($id)
    {
        $cita = CitaModel::findOrFail($id);
        $cita->EstadoCita = 'C';

        $cita->save();
        if ($cita->EstadoCita=='C') {
            return redirect('padmin/citas');
        }
        // return $cita->EstadoCita;
        return redirect('padmin/citas');
    }
}
