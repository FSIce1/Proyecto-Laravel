<?php

namespace Inicio\Http\Requests\Documento;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoFormRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'descripcion_documento' => 'required|min:4',
        ];
    }

    public function messages(){
        
        return [
            //? PARA DESCRIPCIÓN DOCUMENTO  
            'descripcion_documento.required' => 'El campo descripción es obligatorio.',
            'descripcion_documento.min' => 'La descripción del documento debe tener al menos 4 caracteres.',
            
        ];

    }

}
