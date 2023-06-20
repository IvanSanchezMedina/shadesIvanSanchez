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
        //se cambio a true para poder ejecutar este Request y validar.
        return true;
    }

    /**
     * //Reglas de validacion para Request al registrar producto.
     *
     * @return array
     */
    public function rules()
    {
        //Reglas de validacion para Request al registrar producto
        return [
        
            'nombre' => 'required|max:255',
            'precio' => 'required|numeric|between:0,9999999999.99',
            'cantidad' => 'required|numeric|between:0,9999999999',
            'archivo'=>'nullable|max:10240|file|mimes:png,jpg,pdf'
        ];
    }

    /**
     * Mensajes en caso de error basado en las validaciones y datos recibidos.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'Nombre del producto requerido.',
            'precio.required' => 'Precio del producto requerido.',
            'cantidad.required' => 'Cantidad de producto requerido.',
            'precio.numeric' => 'Precio debe ser numerico.',
            'cantidad.numeric' => 'Cantidad debe ser numerico.',
            'archivo.max'=>'Archivo excede los 10 MB'
        ];
    }
}
