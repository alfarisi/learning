<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('imagefile');
            $table->unsignedInteger('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->unsignedTinyInteger('rating')->default(0);
            $table->unsignedDecimal('price', 10, 0);
            $table->unsignedInteger('qty_stock')->default(0);
            $table->unsignedInteger('qty_sold')->default(0);
            $table->boolean('is_halal')->default(1);
            $table->boolean('is_active')->default(0);
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
