<?php

namespace App\Http\Requests\Backend\Convocatoria;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'titulo'=>'required',
            'orden'=>'required|integer',
            'fecha_inicio'=>'required|date_format:d/m/Y',
            'fecha_fin'=>'required|date_format:d/m/Y|after:fecha_inicio',
            //'hora_inicio'=>'required|date_format:H:i',
            //'hora_fin'=>'required|date_format:H:i|after:hora_inicio',
        ];
    }
}
