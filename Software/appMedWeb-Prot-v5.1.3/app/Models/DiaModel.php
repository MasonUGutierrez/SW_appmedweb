<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class DiaModel extends Model
{
    //
    protected $table = 'tbdia';

    protected $primaryKey='IdDia';
    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable=[
    	'Dia',
    ];

    protected $hidden = [];

    //Relaciones
     public function medicos()
    {
    	return $this->hasMany(MedicoModel::Class,'IdDia','IdDia');
    }
}
