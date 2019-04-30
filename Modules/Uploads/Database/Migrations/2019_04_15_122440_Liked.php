<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Liked extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('uploadfavourate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('favourate_id')->nullable();
            $table->foreign('favourate_id')->references('id')->on('favourates')->onDelete('cascade');
            $table->Integer('upload_id')->nullable();
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('cascade');
            $table->Integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('setnull');
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
        //
        Schema::dropIfExists('uploadfavourate');
    }
}
