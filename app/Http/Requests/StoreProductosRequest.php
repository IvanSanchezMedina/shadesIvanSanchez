<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductosRequest extends FormRequest
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
        
            'nombre' => 'required|max:255',
            'precio' => 'required|numeric|between:0,9999999999.99',
            'cantidad' => 'required|numeric|between:0,9999999999',
            // 'archivo'=>'file|mimes:png,jpg,application/pdf'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre del producto requerido.',
            'precio.required' => 'Precio del producto requerido.',
            'cantidad.required' => 'Cantidad de producto requerido.',
            'precio.numeric' => 'Precio debe ser numerico.',
            'cantidad.numeric' => 'Cantidad debe ser numerico.',
            // 'archivo'=>'Archivo excede los 10 MB'
        ];
    }
}
