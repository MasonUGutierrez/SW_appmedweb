<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteModel extends Model
{
    //
    protected $table = 'tbexpediente';

    protected $primaryKey='IdExpediente';
    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable=[
    	'Nombres',
    	'Apellidos',
    	'Edad',
    	'Ocupacion',
    	'Sexo',
    	'TipoSangre',
    	'Alergias',
    	'Direccion',
    	'Correo',
    	'Telefono',
    	'ContactoEmergencia',
    	'ParentezcoContacto',
    	'TelefonoContacto',
    ];

    protected $hidden = [];

    //Relaciones
    public function consultas(){
        return $this->hasMany(ConsultaModel::Class,'IdExpediente','IdExpediente');
    }
}
