<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{   
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('name',45);
            $table->string('email',45);
            $table->string('password');
            $table->uuid('role_uuid')->nullable();
            $table->timestamps();
            $table->foreign('role_uuid')->references('uuid')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users', function (Blueprint $table) {
            $table->dropForeign('users_role_uuid_foreign');
        });    
    }
}
