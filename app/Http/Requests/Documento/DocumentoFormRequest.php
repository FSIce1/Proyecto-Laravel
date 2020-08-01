<?php

namespace Inicio\Http\Requests\Documento;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoFormRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre_documento' => 'required',
            'descripcion_documento' => 'required|min:4',
            'archivo_documento' => 'required|max:10000|mimes:pdf', // mimes: doc, docx - el máximo de blob es 64kb
        ];
    }

    public function messages(){
        
        return [
            //? PARA NOMBRE DOCUMENTO  
            'nombre_documento.required' => 'El campo nombre es obligatorio.',
            
            //? PARA DESCRIPCIÓN DOCUMENTO  
            'descripcion_documento.required' => 'El campo descripción es obligatorio.',
            'descripcion_documento.min' => 'La descripción del documento debe tener al menos 4 caracteres.',
            
            //? PARA ARCHIVO
            'archivo_documento.required' => 'Debe incluir un archivo',
            'archivo_documento.max' => 'El archivo no puede pasar los 1000 KB',
            'archivo_documento.mimes' => 'Solo aceptamos documentos PDF',
        ];

    }

}
