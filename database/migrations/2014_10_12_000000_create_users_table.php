<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality_code')->unique();
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('birthday')->nullable();
            $table->enum('gender',['female','male'])->default('male');
            $table->enum('military',['end','exempt','doing'])->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('authentication_code')->default(rand(9999,99999));
            $table->timestamp('code_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
