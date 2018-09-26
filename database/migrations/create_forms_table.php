<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');

            $table->integer('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            
            $table->json('arrangement')->nullable();

            $table->integer('stimuli')->nullable();
            $table->integer('response')->nullable();
        });

        Schema::create('form_form_column', function(Blueprint $table) {
             $table->integer('form_column_id')->references('id')->on('form_columns')->onDelete('cascade');

             $table->integer('form_id')->references('id')->on('forms')->onDelete('cascade');

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
        Schema::dropIfExists('forms');
        Schema::dropIfExists('form_form_column');
    }
}
