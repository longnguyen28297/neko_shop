<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name' , 255);
            $table->integer('price');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category')->->onDelete('cascade');;
            $table->unsignedBigInteger('id_gender');
            $table->foreign('id_gender')->references('id')->on('gender')->onDelete('cascade');;
            $table->unsignedBigInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brand')->onDelete('cascade');;
            $table->unsignedBigInteger('id_colors');
            $table->foreign('id_colors')->references('id')->on('colors')->onDelete('cascade');;
            $table->string('list_size' , 255);
            $table->string('list_material' , 255);
            $table->tinyInteger('status');
            $table->tinyInteger('sale');
            $table->integer('promotional_price')->nullable();
            $table->text('images' , 1000);
            $table->string('description' , 5000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
