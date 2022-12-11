<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationForAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('no action');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_for_all');
    }
}
