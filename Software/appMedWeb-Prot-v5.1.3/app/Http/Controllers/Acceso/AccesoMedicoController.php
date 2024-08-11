<?php

namespace appMedWeb\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use appMedWeb\Http\Controllers\Controller;

class AccesoMedicoController extends Controller
{
    public function index(){
    	return view('layouts.panel-medico');
    }
}
