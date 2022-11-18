<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'precio' => 'required',
            'medidaId' => 'required|not_in:0',
            'categoriaId' => 'required|not_in:0',
            'cantidad' => 'required',
            'costo'    =>  'required'
        ];
    }
}
