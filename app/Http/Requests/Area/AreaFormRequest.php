<?php

namespace Inicio\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;

class AreaFormRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre_area' => 'required|min:4|max:70',
        ];
    }

    public function messages(){
        
        return [
            //? PARA NOMBRE AREA  
            'nombre_area.required' => 'El campo nombre es obligatorio.',
            'nombre_area.min' => 'El nombre de la area debe tener al menos 4 caracteres.',
            'nombre_area.max' => 'El nombre de la area no puede tener más de 70 caracteres.',
        ];

    }

}
