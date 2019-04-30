<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name');
            $table->Integer('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->Integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->Integer('stage_id');
            $table->foreign('stage_id')->references('id')->on('stages');
            $table->Integer('schoole_id');
            $table->foreign('schoole_id')->references('id')->on('schooles');
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
        Schema::dropIfExists('students');
    }
}
