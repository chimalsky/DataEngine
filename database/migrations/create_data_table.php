<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            
            $table->integer('form_id')
                ->references('id')->on('forms')
                ->onDelete('cascade');
            
            $table->decimal('geo_lat', 10, 8);
            $table->decimal('geo_lng', 11, 8);
            $table->dateTime('geo_datetime')->nullable();
            $table->string('geo_type')->nullable();
            $table->smallInteger('geo_acc')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
