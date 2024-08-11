<?php

namespace appMedWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicaFormRequest extends FormRequest
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
        return [
            'Ruc' => 'required|string',
            'NombreClinica' => 'required|max:100',
            'Telefono' => 'required|max:15',
            'Direccion' => 'required|max:250',
            'Correo' => 'required|max:100',
            'Url' => 'max:50',
        ];
    }
}
