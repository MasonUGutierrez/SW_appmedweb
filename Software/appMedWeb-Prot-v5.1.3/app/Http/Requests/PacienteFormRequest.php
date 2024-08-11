<?php

namespace appMedWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
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
        $rules = array('Nombres' => 'required|max:120',
                       'Apellidos' => 'required|max:120',
                       'Edad' => 'required|max:3',
                       'Ocupacion' => 'required|max:1',
                       'Sexo' => 'required|max:1',
                       'TipoSangre' => 'required|max:3',
                       'Alergias' => 'required|max:250',
                       'Direccion' => 'required|max:250',
                       'Correo' => 'required|max:100',
                       'Telefono' => 'required|max:15',
                       'ContactoEmergencia' => 'required|max:120',
                       'ParentezcoContacto' => 'required|max:1',
                       'TelefonoContacto' => 'required|max:15', 
                      );

        return $rules;
    }
}
