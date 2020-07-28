<?php

namespace Inicio\Http\Requests\Marca;

use Illuminate\Foundation\Http\FormRequest;

class MarcaFormRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [ 
            'nombre_marca' => 'required|min:4|max:50',
        ];
    }

    public function messages(){
        
        return [
            //? PARA NOMBRE PRODUCTO  
            'nombre_marca.required' => 'El campo marca es obligatorio.',
            'nombre_marca.min' => 'El nombre de la marca debe tener al menos 4 caracteres.',
            'nombre_marca.max' => 'El nombre de la marca no puede tener más de 50 caracteres.',
        ];

    }

}
