<?php

namespace appMedWeb\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaModel extends Model
{
    //apuntando a la tabla exacta
    protected $table = 'tbpersona';
    //especificando el id de la tabla
    protected $primaryKey = 'IdPersona';
    //negando la creacion de campos adicionales
    public $timestamps=false;
    //propiedad que contiene los campos aceptados para ser guardados en la bd
    protected $fillable = 
        [
            'IdUsuario',
        	// 'IdRol',
        	// 'IdClinica',
        	// 'NombreUsuario',
        	// 'Contraseña',
        	'Cedula',
        	'Nombres',
        	'Apellidos',
        	'Sexo',
        	'Telefono',
        	'Direccion',
        	'Correo',
            'Estado',
        ];
    protected $hidden = [];
    /*Creando relaciones con las tablas
    //por defecto buscara un foreign key con el nombre que se tiene en el modelo agreandole al final _id,
    //como la foreign key no se llama asi hay que especificarlo*/

    // public function rol()
    // {
    // 	return $this->belongsTo(RolModel::Class,'IdRol','IdRol');
    // }
    // public function clinica()
    // {
    // 	return $this->belongsTo(ClinicaModel::Class,'IdClinica','IdClinica');
    // }
    public function user(){
        return $this->belongsTo(User::Class,'IdUsuario','IdUsuario');
    }
    public function medico()
    {
    	return $this->hasOne(MedicoModel::Class,'IdPersona','IdPersona');
    }
}
