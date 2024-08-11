<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class DiaMedicoModel extends Model
{
    //
    protected $table = 'tbdiamedico';

	protected $primaryKey = 'IdDiasMedico';
	//negando la creacion de campos adicionales
    public $timestamps=false;

	protected $fillable = [
		'IdDia',
		'IdMedico',
		'HoraInicio',
		'HoraFin',
	];

	protected $hidden = [];

	//Relaciones
	public function medico()
    {
    	return $this->belongsTo(MedicoModel::Class,'IdMedico','IdMedico');
    }
    public function dia()
    {
    	return $this->belongsTo(DiaModel::Class,'IdDia','IdDia');
    }
}
