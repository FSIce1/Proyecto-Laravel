<?php

namespace Inicio\Models\Area;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model{
    
    protected $table = 'tb_area';

    protected $primarykey = 'id_area';

    public $timestamps = false;


    protected $fillable = [
        'nombre_area',
        'condicion_area'
    ];

}
