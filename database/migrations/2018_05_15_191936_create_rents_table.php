<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->references('id')->on('clients');
            $table->integer('employee_id')->references('id')->on('employees')->nullable();
            $table->integer('address_id')->references('id')->on('addresses');
            $table->integer('extracost')->nullable();        //flete
            $table->integer('discount')->nullable();         //descuento
            $table->integer('iva')->nullable();              //iva
            $table->string('bill')->nullable();              //factura
            $table->integer('payment')->nullable();          //pagos 
            $table->integer('total')->nullable();            //total
            $table->string('observations', 255)->nullable(); //observaciones
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
        Schema::dropIfExists('rents');
    }
}
