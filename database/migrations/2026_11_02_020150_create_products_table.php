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
            $table->bigIncrements("products_id");
            $table->foreignId('categories_id')->references('categories_id')->on('categories');
            $table->string("products_name",100);
            $table->text("products_description");
            $table->decimal("products_price", 10, 2);
            $table->integer("products_stock");
            $table->string("products_image");
            $table->enum("products_status", ["available", "unvailable"])->default("available");
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
