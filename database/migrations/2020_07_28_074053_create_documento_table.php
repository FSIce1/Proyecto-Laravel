<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration{
    
    public function up(){
        Schema::create('tb_documento', function (Blueprint $table) {
            
            $table->increments('id_documento');
            $table->text('descripcion_documento');
            $table->binary('archivo_documento')->nullable($value = true);

            //$table->text('condicion_documento');

            //$table->enum('condicion_documento', ['0', '1']);
            
            $table->boolean('condicion_documento')->nullable($value = true);
            
            
            //$table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tb_documento');
    }
}