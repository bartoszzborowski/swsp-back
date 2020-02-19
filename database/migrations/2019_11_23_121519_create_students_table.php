<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('classes_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('parent');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('classes_id')->references('id')->on('classes');
            $table->foreign('session_id')->references('id')->on('sessions');
        });

        Schema::table('parent', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', static function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['school_id']);
            $table->dropForeign(['classes_id']);
            $table->dropForeign(['session_id']);
        });
        Schema::table('parent', static function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });
        Schema::dropIfExists('students');
    }
}
