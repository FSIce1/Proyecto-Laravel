<?php

namespace Inicio\Http\Controllers\Documento;

use Illuminate\Http\Request;
use Inicio\Http\Controllers\Controller;

// TODO: MODELOS
use Inicio\Models\Documento\DocumentoModel;

// TODO: PARA LOS MENSAJES FLASH
//use Illuminate\Support\Facades\Session;

// TODO: PARA LA LISTA DE ERRORES
use Inicio\Http\Requests\Documento\DocumentoFormRequest;

// TODO: PARA EL DATABLES
use Yajra\DataTables\Facades\DataTables as DataTables;

class DocumentoController extends Controller{
    

    // TODO: LISTAR
    public function listarDocumentoAJAX(Request $request){

        if($request->ajax()){

            $documentos = DocumentoModel::select('tb_documento.id_documento','tb_documento.descripcion_documento','tb_documento.condicion_documento');
    
                return datatables($documentos)
                ->addColumn('action','documento.actions')
                ->make(true);
    
            }
    
        return view('documento/listar_documentos');
     
    }

    // TODO: CREA
    public function store(DocumentoFormRequest $request){

        if($request->ajax()){
            $resultado = DocumentoModel::create($request->all());
            
            if($resultado){
                return response()->json(['success' => 'true']);
            } else{
                return response()->json(['success' => 'false']);
            }
        }

    }

    // TODO: LLAMAR A MI OBJETO
    public function edit($id){
        $documento = DocumentoModel::where('id_documento', $id)->firstOrFail();
        return response()->json($documento);
    }

    // TODO: MODIFICA
    public function update(DocumentoFormRequest $request, $id){
        
        if($request->ajax()){
            
            $documento = DocumentoModel::where('id_documento', $id)->firstOrFail();
        
            $resultado = $documento->where('id_documento', $id)->update($request->except(['_token', '_method' ,'guardar']));
            $input = $request->all();
            $resultado = $documento->fill($input)->save();
            
            if($resultado){
                return response()->json(['success' => 'true']);
            } else{
                return response()->json(['success' => 'false']);
            }
            
        }

    }

    // TODO: DESTRUYE
    public function destroy($id){
        
        $documento = DocumentoModel::where('id_documento', $id)->firstOrFail();

        $resultado=$documento->where('id_documento', $id)->delete();
        
        if($resultado){
            return response()->json(['success' => 'true']);
        } else{
            return response()->json(['success' => 'false']);
        }

    }

    // TODO: VER GRAFICOS
    public function graficosDocumentos(){
        
        $documentos = DocumentoModel::select('marca.id_documento','marca.nombre_documento')->get();

        return view('documento/graficos')->with('documentos', $documentos);

        //return view('area/graficos');
    }
    
}
