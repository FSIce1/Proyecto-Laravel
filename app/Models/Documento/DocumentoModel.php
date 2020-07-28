<?php

namespace Inicio\Models\Documento;

use Illuminate\Database\Eloquent\Model;

class DocumentoModel extends Model{
    
    protected $table = 'tb_documentos';

    protected $primarykey = 'id_documento';

    protected $fillable = [
        'nombre_documento',
        'archivo_documento'
    ];

}
