<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicaModel extends Model
{
    //
    protected $table = 'tbclinica';
    protected $primaryKey = 'IdClinica';
    //negando la creacion de campos adicionales
    public $timestamps=false;
    //Campos guardables
    protected $fillable = [
    	'Ruc',
    	'NombreClinica',
    	'Telefono',
    	'Direccion',
    	'Correo',
    	'Url',
    ];
    protected $hidden = [];
    //Relaciones
    public function usuarios(){
        return $this->hasMany(UsuarioModel::Class,'IdClinica','IdClinica');
    }
}
