<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class AreaMedicaModel extends Model
{
    //
    protected $table = 'tbareamedica';
    protected $primaryKey = 'IdAreaMedica';
    //negando la creacion de campos adicionales
    public $timestamps=false;

    protected $fillable = [
    	'AreaMedica',
        'Estado',
    ];
    protected $hidden = [];

    //Relaciones
    public function medicos()
    {
    	return $this->hasMany(MedicoModel::Class,'IdAreaMedica','IdAreaMedica');
    }
}
