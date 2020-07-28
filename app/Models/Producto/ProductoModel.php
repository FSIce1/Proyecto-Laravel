<?php

namespace Inicio\Models\Producto;

use Illuminate\Database\Eloquent\Model;
use Inicio\Models\Marca\MarcaModel;

class ProductoModel extends Model{

    protected $table = 'producto';

    protected $primarykey = 'id_producto';
    //protected $primarykey = 'uuid';
    
    public $timestamps = false;

    protected $fillable = [
        'nombre_producto',
        'precio_producto',
        'id_marca_fk'
    ];

    public function marca(){
        // has many -> tiene muchos
        return $this->hasMany(MarcaModel::class);
    }

}
