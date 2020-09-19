<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('name',45);
            $table->string('description',255);
            $table->integer('price');
            $table->uuid('category_uuid')->nullable();
            $table->timestamps();
            $table->foreign('category_uuid')->references('uuid')->on('categories');
        });
    }
    public function down()
    {
        Schema::dropIfExists('products', function (Blueprint $table) {
            $table->dropForeign('products_category_uuid_foreign');
        });
    }
}
