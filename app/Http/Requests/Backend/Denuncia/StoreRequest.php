<?php

namespace App\Http\Requests\Backend\Denuncia;

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
            'nombres'=>'required',
            'apellido_paterno'=>'required',
            'carnet'=>'required',
            'telefono'=>'required|integer',
            'correo'=>'email',
            'denunciados'=>'required',
            'descripcion'=>'required',
        ];
    }
}
