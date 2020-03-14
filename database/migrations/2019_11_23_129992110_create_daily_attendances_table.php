<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_attendances', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamp('timestamp');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('subject_id')->references('id')->on('students_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_attendances', static function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['section_id']);
            $table->dropForeign(['student_id']);
            $table->dropForeign(['school_id']);
        });

        Schema::dropIfExists('daily_attendances');
    }
}
