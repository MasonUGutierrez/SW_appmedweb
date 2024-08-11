<?php

namespace appMedWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaMedicaFormRequest extends FormRequest
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
            'AreaMedica'=>'required|max:100',
        ];
    }
}
