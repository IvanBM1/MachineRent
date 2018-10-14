<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinerentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machinerents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rent_id')->references('id')->on('rents');          //rent_id
            $table->integer('machine_id')->references('id')->on('machines');    //machine_id
            $table->string('dateinit',128)->nullable();                               //dateinit
            $table->string('dateend',128)->nullable();                                //dateend
            $table->integer('rentcost')->nullable();                            //rentcost
            $table->integer('extradays')->nullable();                           //extradays
            $table->string('concret',128)->nullable();                             //concretado
            
            $table->text('description')->nullable();                                //description
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
        Schema::dropIfExists('machinerents');
    }
}
