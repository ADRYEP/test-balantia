<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {

            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('rol_id');
            $table->dropForeign('city_id');
        });
    }
}
