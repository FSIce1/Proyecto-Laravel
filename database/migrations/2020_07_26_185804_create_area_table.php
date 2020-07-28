<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration{
    
    public function up(){
        Schema::create('tb_area', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->timestamps();
            $table->increments('id_area');
            $table->string('nombre_area',70);
            $table->boolean('condicion_area')->nullable($value = true);
        });
    }

    public function down(){
        Schema::dropIfExists('tb_area');
    }
}
