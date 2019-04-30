<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       
        Schema::create('uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('link')->nullable();
            $table->string('views')->nullable();
            $table->string('likes')->nullable();
            $table->Integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->Integer('schoole_id')->nullable();
            $table->foreign('schoole_id')->references('id')->on('schooles');
            $table->Integer('activty_id')->nullable();
            $table->foreign('activty_id')->references('id')->on('activties');
            $table->Integer('city_id')->nullable();
            $table->string('stage_id');
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
        Schema::dropIfExists('uploads');
    }
}
