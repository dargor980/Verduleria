<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'fono' => 'required',
            'domicilio' => 'required'
        ];
    }
}
