<?php

namespace appMedWeb\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	
    public function index()
    {
    	return view('layouts.welcome');
    }
}
