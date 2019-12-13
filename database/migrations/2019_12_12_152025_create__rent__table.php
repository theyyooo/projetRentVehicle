<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rent', function (Blueprint $table) {
            $table->integer('UserId')->unsigned()->index();
            $table->integer('VehicleId')->unsigned()->index();
            $table->date('DateDepart');
            $table->date('DateArrive');
            $table->foreign('UserId')->references('UserId')->on('Users');
            $table->foreign('VehicleId')->references('VehicleId')->on('Vehicle');
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
        Schema::dropIfExists('Rent');
    }
}
