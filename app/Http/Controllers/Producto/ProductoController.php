<?php

namespace Inicio\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Inicio\Http\Controllers\Controller;

// TODO: MODELOS
use \Inicio\Models\Marca\MarcaModel;
use \Inicio\Models\Producto\ProductoModel;

// TODO: PARA LOS MENSAJES FLASH
use Illuminate\Support\Facades\Session;

// TODO: PARA LA LISTA DE ERRORES
use \Inicio\Http\Requests\Producto\ProductoFormRequest;

class ProductoController extends Controller{
    
    /*
    *? PARA BLOQUEAR POR AUTORIZACIÓN - Método 2 
    public function __construct(){
        $this->middleware('auth');
    }
    */

    public function index(){
        /** 
        *? $productos = \Inicio\Models\Producto\ProductoModel::all();
        */

        $productos = ProductoModel::
        select('producto.id_producto','producto.nombre_producto','producto.precio_producto','marca.nombre_marca as nombre')
        ->join('marca','id_marca','=','producto.id_marca_fk')->get();
        ;

        return view('producto.listar_productos')->with('productos', $productos);

    }

    public function create(){

        /** 
        *! método list() ya no existe a partir del laravel 5.3 cambió a pluck()
        */

        $marcas = MarcaModel::pluck('nombre_marca','id_marca')->prepend('Selecciona la Marca');

        return view('producto.crear_producto')->with('marcas',$marcas);
    }

    public function store(ProductoFormRequest $request){
        
        ProductoModel::create($request->all());

        Session::flash('guardar','Guardado correctamente');

        return redirect()->route('producto.index');
    }

    
    public function edit($id_producto){
        //$marcas = \Inicio\Models\Marca\MarcaModel::pluck('nombre_marca','id_marca')->prepend('Selecciona la Marca');
        $marcas = MarcaModel::pluck('nombre_marca','id_marca')->prepend('Selecciona la Marca');
        
        //$producto = \Inicio\Models\Producto\ProductoModel::FindOrFail($id_producto);
        
        $producto = ProductoModel::where('id_producto', $id_producto)->firstOrFail();


        return view('producto.editar_producto',array('producto' => $producto,'marcas' => $marcas));

    }

    public function update(ProductoFormRequest $request, $id){

        
        
        $producto = ProductoModel::where('id_producto', $id)->firstOrFail();
        
        //$producto->where('id_producto', $id)->fill($request->all())->save();

        //$producto->update($request->all());
        
        /*
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio_producto = $request->precio_producto;
        $producto->id_marca_fk = $request->id_marca_fk;
        */

        $producto->where('id_producto', $id)->update($request->except(['_token', '_method' ,'guardar']));

        Session::flash('modificar','Modificado correctamente');

        return redirect()->route('producto.index');

    }


    public function show($id){
        
        $producto = ProductoModel::where('id_producto', $id)->firstOrFail();
        
        return view('producto.eliminar_producto')->with('producto',$producto);
    }

    public function destroy($id){

        $producto = ProductoModel::where('id_producto', $id)->firstOrFail();

        Session::flash('eliminar','Eliminado correctamente');

        $producto->where('id_producto', $id)->delete();

        return redirect()->route('producto.index');

    }

}
