<?php

namespace appMedWeb\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use appMedWeb\Http\Controllers\Controller;

class AccesoAdminController extends Controller
{
	// public function __construct(){
	// 	$this->middleware('admin');
	// }

    public function index(){
    	return view('layouts.panel-admin');
    }
}
