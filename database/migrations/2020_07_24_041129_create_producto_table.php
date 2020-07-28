<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {

            //$table->engine = 'InnoDB';

            //$table->bigIncrements('id_producto');
            
            $table->increments('id_producto');
            $table->string('nombre_producto', 100);
            $table->decimal('precio_producto', 5, 2);

//            $table->integer('id_marca_fk')->unsignedBigInteger();
            $table->integer('id_marca_fk')->unsigned();

            //$table->timestamps();

        });

        Schema::table('producto', function ($table) {
            $table->foreign('id_marca_fk')->references('id_marca')->on('marca')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
