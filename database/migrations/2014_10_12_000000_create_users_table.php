<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->text('address')->nullable();
                $table->string('phone')->nullable();
                $table->string('birthday')->nullable();
                $table->string('blood_group')->nullable();
                $table->integer('gender')->nullable();
                $table->unsignedBigInteger('school_id')->nullable();
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('school_id')->references('id')->on('schools');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
