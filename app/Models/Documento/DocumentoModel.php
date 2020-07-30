<?php

namespace Inicio\Models\Documento;

use Illuminate\Database\Eloquent\Model;

class DocumentoModel extends Model{
    
    protected $table = 'tb_documento';

    protected $primarykey = 'id_documento';
    
    public $timestamps = false;

    protected $fillable = [
        'nombre_documento',
        'descripcion_documento',
        'archivo_documento',
        'condicion_documento'
    ];

}
