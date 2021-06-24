<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('progress_status')->default('in_progress');
            $table->string('category');
            $table->text('description');
            $table->text('approach');
            $table->text('challenges');
            $table->text('things_learnt');
            $table->text('tech_stack');
            $table->string('project_link')->nullable();
            $table->string('code_link')->nullable();
            $table->string('project_image')->nullable();
            // add mini _ image l8r
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
        Schema::dropIfExists('projects');
    }
}
