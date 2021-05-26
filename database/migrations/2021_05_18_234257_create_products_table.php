<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('img');
            $table->double('precio_actual');
            $table->double('precio_anterior');
            $table->double('cantidad');
            $table->string('active');
            $table->integer('eliminado');
            /* $table->unsignedBigInteger('line_id');
            $table->unsignedBigInteger('brand_id'); */
            $table->timestamps();            

            /* $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('line_id')->references('id')->on('lines'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
