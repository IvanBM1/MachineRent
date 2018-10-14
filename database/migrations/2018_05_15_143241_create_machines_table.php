<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('economic',255)->nullable();
            $table->string('brand',255)->nullable();
            $table->string('model',255)->nullable();
            $table->string('series',255)->nullable();
            $table->string('motor',255)->nullable();
            $table->integer('year')->nullable();
            $table->integer('hp')->nullable();
            $table->string('motorseries',255)->nullable();
            $table->integer('status')->nullable();
            $table->string('observations',255)->nullable();
            
            $table->integer('day_1')->nullable();
            $table->integer('day_2')->nullable();
            $table->integer('day_3')->nullable();
            $table->integer('day_4')->nullable();
            $table->integer('day_7')->nullable();
            $table->integer('day_15')->nullable();
            $table->integer('day_30')->nullable();

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
        Schema::dropIfExists('machines');
    }
}
