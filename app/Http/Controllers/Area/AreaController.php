<?php

namespace Inicio\Http\Controllers\Area;

use Illuminate\Http\Request;
use Inicio\Http\Controllers\Controller;

// TODO: MODELOS
use Inicio\Models\Area\AreaModel;

// TODO: PARA LOS MENSAJES FLASH
//use Illuminate\Support\Facades\Session;

// TODO: PARA LA LISTA DE ERRORES
use Inicio\Http\Requests\Area\AreaFormRequest;

// TODO: PARA EL DATABLES
use Yajra\DataTables\Facades\DataTables as DataTables;

use Validator;
use response;
use Illuminate\Support\Facades\input;
use \Inicio\Http\Requests;
use Inicio\Models\Marca\MarcaModel;

class AreaController extends Controller{
    
    /*
    // TODO: LISTO
    public function index(){
        return view('area/listar_areas');
    }

    // TODO: MANDO A CREAR - ESTO SE ANULA POR EL MODAL
    public function create(){
        return view('area.crear_area');
    }


    public function show($id){

        $marca = AreaModel::where('id_area', $id)->firstOrFail();
        
        return view('area.eliminar_area')->with('marca',$marca);

    }
    */

    // TODO: LISTAR
    public function listarAreaAJAX(Request $request){

        if($request->ajax()){

        $areas = AreaModel::select('tb_area.id_area','tb_area.nombre_area','tb_area.condicion_area');

            return datatables($areas)
            ->addColumn('action','area.actions')
            ->make(true);

        }

        return view('area/listar_areas');
    
    }

    // TODO: CREA
    public function store(AreaFormRequest $request){
       
        /*
        AreaModel::create($request->all());

        Session::flash('guardar','Guardado correctamente');

        return redirect()->route('area.index');
        */

        if($request->ajax()){
            $resultado = AreaModel::create($request->all());
            
            if($resultado){
                return response()->json(['success' => 'true']);
            } else{
                return response()->json(['success' => 'false']);
            }
        }
    
    }

    // TODO: LLAMAR A MI OBJETO
    public function edit($id){
        
        /*
        $area = AreaModel::where('id_area', $id)->firstOrFail();

        return view('area.editar_area',array('area' => $area));
        */

        $area = AreaModel::where('id_area', $id)->firstOrFail();
        return response()->json($area);

    }

    // TODO: MODIFICA
    public function update(AreaFormRequest $request, $id){
        
        /*
        $marca = AreaModel::where('id_area', $id)->firstOrFail();
        
        //? ARREGLAR AQUÍ
        $marca->where('id_area', $id)->update($request->except(['_token', '_method' ,'guardar']));

        Session::flash('modificar','Modificado correctamente');

        return redirect()->route('area.index');
        */

        if($request->ajax()){
            
            $area = AreaModel::where('id_area', $id)->firstOrFail();
        
            $resultado = $area->where('id_area', $id)->update($request->except(['_token', '_method' ,'guardar']));

            $input = $request->all();
            $resultado = $area->fill($input)->save();
            
            /*
            $resultado = $area->update();
            */
        
            if($resultado){
                return response()->json(['success' => 'true']);
            } else{
                return response()->json(['success' => 'false']);
            }
            
        }

    }

    // TODO: DESTRUYE
    public function destroy($id){

        /*
        $marca = AreaModel::where('id_area', $id)->firstOrFail();

        Session::flash('eliminar','Eliminado correctamente');

        $marca->where('id_area', $id)->delete();

        return redirect()->route('area.index');
        */

        $marca = AreaModel::where('id_area', $id)->firstOrFail();

        $resultado=$marca->where('id_area', $id)->delete();
        
        if($resultado){
            return response()->json(['success' => 'true']);
        } else{
            return response()->json(['success' => 'false']);
        }

    }

    // TODO: VER GRAFICOS
    public function graficosArea(){
        
        $marcas = MarcaModel::select('marca.id_marca','marca.nombre_marca')->get();

        return view('area/graficos')->with('marcas', $marcas);

        //return view('area/graficos');
    }


}
