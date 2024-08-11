<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('layouts/panel-admin');
//     return view('layouts/welcome');
// })->name('home');

Route::get('/','MainController@index')->name('home');

// Grupo con el middleware para solo admins
Route::group(['middleware' => ['admin']], function () {
	// Ruta de Acceso principal
    Route::get('admin','Acceso\AccesoAdminController@index')->name('admin');

    // Rutas para los resources
    Route::resource('admin/enfermedades','Administrador\EnfermedadController');
	Route::resource('admin/areas','Administrador\AreaMedicaController');
	Route::resource('admin/usuarios/admin','Administrador\AdministradorController');
	Route::resource('admin/usuarios/padmin','Administrador\PAdministrativoController');
	Route::resource('admin/usuarios/medico','Administrador\MedicoController');

	// Rutas para el perfil
	Route::get('admin/perfil','PerfilAdminController@index')->name('perfil.index');
	Route::get('admin/perfil/{perfil}/edit','PerfilAdminController@edit')->name('perfil.edit');
	Route::match(['put', 'patch'],'admin/perfil/{perfil}','PerfilAdminController@update')->name('perfil.update');

	// Rutas para la clinica
	Route::get('admin/clinica','Administrador\ClinicaController@index')->name('clinica.index');
	Route::get('admin/clinica/{clinica?}/edit','Administrador\ClinicaController@edit')->name('clinica.edit');
	Route::match(['put', 'patch'],'admin/clinica/{clinica}','Administrador\ClinicaController@update')->name('clinica.update');
});

Route::group(['middleware' => ['padmin']], function () {
    Route::get('padmin','Acceso\AccesoPAdminController@index')->name('padmin');
    // Ruta para cancelar una cita
    Route::match(['put','patch'],'padmin/citas-cancelar/{cita}','PAdministrativo\Extra\CancelarCitaController@cancelar')->name('citas.cancelar');

    // Rutas para los resources
    Route::resource('padmin/citas','PAdministrativo\CitaController');
    Route::resource('padmin/paciente','PAdministrativo\PacienteController');
    

    // Rutas para el perfil
    Route::get('padmin/perfil','PerfilPAdminController@index')->name('paperfil.index');
    Route::get('padmin/perfil/{perfil}/edit','PerfilPAdminController@edit')->name('paperfil.edit');
    Route::match(['put','patch'],'padmin/perfil/{perfil}','PerfilPAdminController@update')->name('paperfil.update');
});

Route::group(['middleware' => ['medico']], function () {
    Route::get('medico','Acceso\AccesoMedicoController@index')->name('medico');
});


Route::get('accesodenegado',function(){
	return view('layouts/accesodenegado');
});

Route::get('construccion',function(){
	return view('layouts/construccion');
});

// Route::resource('admin/usuarios/pmedico','PMedicoController');

Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');