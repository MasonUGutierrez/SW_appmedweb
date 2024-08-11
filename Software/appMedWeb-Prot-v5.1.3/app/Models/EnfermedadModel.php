<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class EnfermedadModel extends Model
{
    //
    protected $table = 'tbenfermedad';
    protected $primaryKey='IdEnfermedad';

    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable=[
    	'Enfermedad',
        'Estado',
    ];

    protected $hidden = [];

    //Relaciones
	public function consultas(){
		return $this->hasMany(ConsultaEnfermedadModel::Class,'IdEnfermedad','IdEnfermedad');
	}
}
