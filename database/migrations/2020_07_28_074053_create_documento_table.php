<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration{
    public function up(){
        Schema::create('tb_documento', function (Blueprint $table) {
            $table->increments('id_documento');
            $table->text('descripcion_documento');
            $table->binary('archivo_documento')->nullable();
            //$table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('documento');
    }
}