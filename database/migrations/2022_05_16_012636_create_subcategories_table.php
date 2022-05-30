<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->boolean('color')->default(false);
            $table->boolean('size')->default(false);
            
            //Llave foranea de la tabla categories y su nombre es category_id
            $table->unsignedBigInteger('category_id');
            //Crearemos la llave Foranea con el nombre de category_id y que hace referencia al atributo id de la tabla categories
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('subcategories');
    }
}
