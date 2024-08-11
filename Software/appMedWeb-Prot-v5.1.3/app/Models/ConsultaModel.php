<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaModel extends Model
{
    //
    protected $table = 'tbconsulta';

    protected $primaryKey = 'IdConsulta';
    //negando la creacion de campos adicionales
    public $timestamps=false;

	protected $fillable = [
		'IdMedico',
		'IdExpediente',
		'Peso',
		'Presion',
		'Padecimiento',
		'Tratamiento',
		'Examenes',
	];

	protected $hidden = [];

	//Relaciones
	public function medico(){
		return $this->belongsTo(MedicoModel::Class,'IdMedico','IdMedico');
	}
	public function expediente(){
		return $this->belongsTo(ExpedienteModel::Class,'IdExpediente','IdExpediente');
	}
	public function enfermedades(){
		return $this->hasMany(ConsultaEnfermedadModel::Class,'IdConsulta','IdConsulta');
	}
}
