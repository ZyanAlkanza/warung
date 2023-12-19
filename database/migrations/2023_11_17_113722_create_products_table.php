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

            //* CARA 2 MEMBUAT RELASI
            // $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('categories_id')->unsigned();
            $table->string('product_name', 150);
            $table->integer('stock')->nullable();
            $table->integer('price');
            $table->text('product_desc')->nullable();
            $table->string('image', 255);
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
         
            //* CARA 1 MEMBUAT RELASI
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
