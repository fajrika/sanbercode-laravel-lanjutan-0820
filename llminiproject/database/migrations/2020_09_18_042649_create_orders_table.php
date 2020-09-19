<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->integer('total');
            $table->string('description');
            $table->uuid('user_uuid')->nullable();
            $table->timestamps();
            $table->foreign('user_uuid')->references('uuid')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_uuid_foreign');
        });        
    }
}
