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
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->decimal('price', 8, 3);
            $table->integer('quantity')->nullable();
            //$table->enum('status', [Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);
            
            //Definir variable para FK y después definir Foreign Key. Relacionar esta tabla products con la subcategories
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            //Definir variable para FK y después definir Foreign Key. Relacionar esta tabla products con la brands
            //$table->unsignedBigInteger('brand_id');
            //$table->foreign('brand_id')->references('id')->on('brands'); 
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
        Schema::dropIfExists('products');
    }
}
