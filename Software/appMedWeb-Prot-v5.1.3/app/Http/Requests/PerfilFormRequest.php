<?php

namespace appMedWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//Facades para hacer la validacion en el rule
use Illuminate\Validation\Rule;

class PerfilFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Validacion si es que va editar los datos del usuario
        //o se esta creando un nuevo usuario
        if($this->method() == 'PUT')
        {
            $name_rule = ['required','max:25',Rule::unique('tbusuario')->ignore($this->get('IdUsuario'),'IdUsuario')];
        }
        else
        {
            $name_rule = 'required|max:25|unique:tbusuario,name';
        }
        return [
            //Datos Usuarios tbusuario
            'name'=>$name_rule, 
            'password'=>'required|max:60', 
            'Rol'=>'max:1',
            //Datos personales tbpersona
            // 'IdUsuario'=>'numeric',
            'Cedula'=>'required|max:16',
            'Nombres'=>'required|max:120',
            'Apellidos'=>'required|max:120',
            'Sexo'=>'max:1',
            'Telefono'=>'required|max:15',
            'Direccion'=>'max:250',
            'Correo'=>'max:100',
        ];
    }
}
