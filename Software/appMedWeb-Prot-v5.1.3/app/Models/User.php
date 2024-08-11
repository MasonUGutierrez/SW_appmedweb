<?php

namespace appMedWeb\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guard = 'users';
    protected $table = 'tbusuario';
    protected $primaryKey='IdUsuario';
    public $timestamps=false;
    protected $fillable = [
        'name', 'password', 'Rol','Estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relaciones
    public function personas(){
        return $this->hasMany(PersonaModel::Class,'IdUsuario','IdUsuario');
    }
}
