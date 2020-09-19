<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->integer('price');
            $table->uuid('product_uuid')->nullable();
            $table->uuid('order_uuid')->nullable();
            $table->timestamps();
            $table->foreign('product_uuid')->references('uuid')->on('products');
            $table->foreign('order_uuid')->references('uuid')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_product_uuid_foreign');
            $table->dropForeign('order_details_order_uuid_foreign');
        });  
    }
}
