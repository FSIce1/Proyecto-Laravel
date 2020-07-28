<?php

namespace Inicio\Models\Marca;

use Illuminate\Database\Eloquent\Model;
use Inicio\Models\Producto\ProductoModel;

class MarcaModel extends Model{

    protected $table = 'marca';

    protected $primarykey = 'id_marca';

    public $timestamps = false;


    protected $fillable = [
        'nombre_marca'
    ];

    public function producto(){
        // belongsto -> pertenece a
        return $this->belongsTo(ProductoModel::class);
    }

}
