<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class CitaModel extends Model
{
    //
    protected $table = 'tbcita';

    protected $primaryKey = 'IdCita';
    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable = [
    	'IdMedico',
    	'IdExpediente',
    	'FechaCita',
        'EstadoCita',
    ];

    protected $hidden = [];

    //Relaciones
    public function medico(){
    	return $this->belongsTo(MedicoModel::Class,'IdMedico','IdMedico');
    }
    public function expediente(){
    	return $this->belongsTo(ExpedienteModel::Class,'IdExpediente','IdExpediente');
    }
}
