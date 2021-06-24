<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            //teporary soln to problem cos of time constraint
            $table->string('phone');
            $table->string('email');
            $table->string('physical_address');
            $table->string('whatsapp_link');
            $table->string('whatsapp_text');
            $table->string('linkedin_text');
            $table->string('linkedin_link');
            $table->string('github_link');
            $table->string('github_text');
            $table->string('instagram_link');
            $table->string('instagram_text');
            $table->string('twitter_text');
            $table->string('twitter_link');
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
        Schema::dropIfExists('contacts');
    }
}
