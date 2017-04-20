<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'correo'=>'required',
            'pais_id'=>'required',
            'asunto'=>'required',
            'solicitud'=>'required',
            'CaptchaCode' => 'required|valid_captcha'
        ];
    }
}
