<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes');
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
        Schema::table('sections', static function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['school_id']);
        });

        Schema::disableForeignKeyConstraints();
        DB::table('sections')->truncate();
        Schema::dropIfExists('sections');
        Schema::enableForeignKeyConstraints();
    }
}
