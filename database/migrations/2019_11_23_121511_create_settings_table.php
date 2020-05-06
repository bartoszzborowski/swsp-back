<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail_client')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_user')->nullable();
            $table->string('payu_user')->nullable();
            $table->string('payu_id')->nullable();
            $table->string('payu_secret_key')->nullable();
            $table->string('paypal_user')->nullable();
            $table->string('paypal_password')->nullable();
            $table->string('paypal_id')->nullable();
            $table->string('paypal_secret_key')->nullable();
            $table->string('system_name')->nullable();
            $table->string('system_title')->nullable();
            $table->string('system_email')->nullable();
            $table->integer('selected_branch')->nullable();
            $table->string('selected_session')->nullable();
            $table->string('phone')->nullable();
            $table->string('purchase_code')->nullable();
            $table->text('address');
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
        Schema::dropIfExists('settings');
    }
}
