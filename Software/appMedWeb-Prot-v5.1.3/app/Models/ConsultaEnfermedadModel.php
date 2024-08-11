<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaEnfermedadModel extends Model
{
    //
    protected $table = 'tbconsultaenfermedad';

    protected $primaryKey = 'IdConsultaEnfermedad';
    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable = [
    	'IdConsulta',
    	'IdEnfermedad',
    ];

    protected $hidden = [];

    //Relaciones
	public function consulta(){
		return $this->belongsTo(ConsultaModel::Class,'IdConsulta','IdConsulta');
	}
	public function enfermedad(){
		return $this->belongsTo(EnfermedadModel::Class,'IdEnfermedad','IdEnfermedad');
	}
}
