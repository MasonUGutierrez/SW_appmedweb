<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class MedicoModel extends Model
{
    //
    protected $table = 'tbmedico';
    protected $primaryKey='IdMedico';
    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable=
        [
        	'IdPersona',
        	'IdAreaMedica',
        	'CodMinsa',
        	'Especialidad',
        	'SubEspecialidad',
        ];

    protected $hidden=[];
    //Relaciones
    public function persona()
    {
    	return $this->belongsTo(PersonaModel::Class,'IdPersona','IdPersona');
    }
    public function areamedica()
    {
    	return $this->belongsTo(AreaMedicaModel::Class,'IdAreaMedica','IdAreaMedica');
    }
    public function consultas()
    {
    	return $this->hasMany(ConsultaModel::Class,'IdMedico','IdMedico');
	}
    public function citas()
    {
    	return $this->hasMany(CitaModel::Class,'IdMedico','IdMedico');

    }
    public function dias()
    {
    	return $this->hasMany(DiaMedicoModel::Class,'IdMedico','IdMedico');
    }

}
