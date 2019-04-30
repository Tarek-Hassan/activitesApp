<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersSchooles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersSchooles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->Integer('schoole_id');
            $table->foreign('schoole_id')->references('id')->on('schooles');
           
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('UsersSchooles');
    }
}
