<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Favourate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploadlikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('like_id')->nullable();
            $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade');
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
        Schema::dropIfExists('uploadlikes');
      
    }
   
   
}
