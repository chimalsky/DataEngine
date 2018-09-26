<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_responses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('data_id')
                ->references('id')->on('data')
                ->onDelete('cascade');
            
            $table->integer('form_column_id')
                ->references('id')->on('form_columns')
                ->onDelete('cascade');
            
            $table->text('response')->nullable();

            $table->string('meta')->nullable();
            $table->integer('stimulus')->nullable();

            $table->index(['data_id', 'form_column_id']);
            $table->index(['data_id', 'form_column_id', 'stimulus']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_responses');
    }
}
