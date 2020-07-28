<?php

namespace Inicio\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [ 
            
            //! unique:tabla,nombre -> para la creacion

            /**  
             * TODO: PARA MODIFICAR (PARA QUE ADMITA EL MISMO NOMBRE)
             *! use Illuminate\Routing\Route 
            *? CREO CONSTRUCTOR
            *? public function __construct(Route $route){
            *?     $this->route = $route;
            *? }
            
            *!'unique:tabla,nombre,'.$this->route->getParameter('producto'),
            *? SE VALIDAN DE ACUERDO  AL ORDEN  
            
            */ 
            'nombre_producto' => 'required|min:4|max:100',
            'precio_producto' => 'required|numeric|between:0.01,999.99',
            'id_marca_fk' => 'required|not_in:0',
        ];
    }

    public function messages(){
        
        return [
            //? PARA NOMBRE PRODUCTO  
            'nombre_producto.required' => 'El campo producto es obligatorio.',
            'nombre_producto.min' => 'El nombre del producto debe tener al menos 4 caracteres.',
            'nombre_producto.max' => 'El nombre del producto no puede tener más de 100 caracteres.',
            
            //? PARA PRECIO PRECIO
            'precio_producto.required' => 'El campo precio es obligatorio.',
            'precio_producto.between' => 'El precio del producto debe tener entre mímimo: 0 y máximo: 5 caracteres(autocompletado con 2 ceros xxxx.00)',
            
            //? PARA MARCA
            'id_marca_fk.required' => 'El campo marca es obligatorio.',
            'id_marca_fk.not_in' => 'El campo marca es obligatorio.',
        ];

    }

}
