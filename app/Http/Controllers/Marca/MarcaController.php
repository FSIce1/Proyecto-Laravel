<?php

namespace Inicio\Http\Controllers\Marca;

use Illuminate\Http\Request;
use Inicio\Http\Controllers\Controller;

// TODO: MODELOS
use Inicio\Models\Marca\MarcaModel;

// TODO: PARA LOS MENSAJES FLASH
use Illuminate\Support\Facades\Session;

// TODO: PARA LA LISTA DE ERRORES
use Inicio\Http\Requests\Marca\MarcaFormRequest;

class MarcaController extends Controller
{

    public function listall(){
        
        $marcas = MarcaModel::select('marca.id_marca','marca.nombre_marca')->get();

        return view('marca/listall')->with('marcas', $marcas);

    }

    public function index(){

        //$marcas = MarcaModel::select('marca.id_marca','marca.nombre_marca')->get();

        //return view('marca/listar_marcas');

        $marcas = MarcaModel::select('marca.id_marca','marca.nombre_marca')->get();

        return view('marca/listar_marcas')->with('marcas', $marcas);
    }

    public function create(){
        return view('marca.crear_marca');
    }

    public function store(MarcaFormRequest $request){
       
        MarcaModel::create($request->all());

        Session::flash('guardar','Guardado correctamente');

        return redirect()->route('marca.index');
    
    }


    public function edit($id){
        
        $marca = MarcaModel::where('id_marca', $id)->firstOrFail();

        return view('marca.editar_marca',array('marca' => $marca));
        
    }

    public function update(MarcaFormRequest $request, $id){
        
        $marca = MarcaModel::where('id_marca', $id)->firstOrFail();
        
        $marca->where('id_marca', $id)->update($request->except(['_token', '_method' ,'guardar']));

        Session::flash('modificar','Modificado correctamente');

        return redirect()->route('marca.index');

    }

    
    public function show($id){

        $marca = MarcaModel::where('id_marca', $id)->firstOrFail();
        
        return view('marca.eliminar_marca')->with('marca',$marca);

    }

    public function destroy($id){

        $marca = MarcaModel::where('id_marca', $id)->firstOrFail();

        Session::flash('eliminar','Eliminado correctamente');

        $marca->where('id_marca', $id)->delete();

        return redirect()->route('marca.index');
    }
}
