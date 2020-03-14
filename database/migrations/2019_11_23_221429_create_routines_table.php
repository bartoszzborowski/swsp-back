<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->string('starting_hour')->nullable();
            $table->string('ending_hour')->nullable();
            $table->string('starting_minute')->nullable();
            $table->string('ending_minute')->nullable();
            $table->integer('lesson_number')->nullable();
            $table->string('day')->nullable();
            $table->string('session')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('subject_id')->references('id')->on('students_subjects');
            $table->foreign('teacher_id')->references('id')->on('students_teachers');
            $table->foreign('room_id')->references('id')->on('class_rooms');
            $table->foreign('school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routines');
    }
}
