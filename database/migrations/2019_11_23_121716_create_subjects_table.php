<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_subjects', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->timestamps();

            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students_subjects', static function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['session_id']);
            $table->dropForeign(['school_id']);
        });

        Schema::dropIfExists('students_subjects');
    }
}
