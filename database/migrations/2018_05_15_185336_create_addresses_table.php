<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->references('id')->on('clients');

            $table->string('street',128)->nullable();
            $table->string('numberext',128)->nullable();
            $table->string('numberint',128)->nullable();
            $table->string('colony',128)->nullable();
            $table->string('state',128)->nullable();
            $table->string('municipality',128)->nullable();
            $table->string('cp',128)->nullable();

            $table->string('rfc',128)->nullable();
            $table->string('razon',128)->nullable();
            $table->string('fiscal',24)->nullable();
            
            $table->string('betweenstreet1',128)->nullable();
            $table->string('betweenstreet2',128)->nullable();
            $table->string('references',255)->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
