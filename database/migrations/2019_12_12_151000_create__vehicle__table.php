<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vehicle', function (Blueprint $table) {
            $table->increments('VehicleId');
            $table->string('VehicleImmatriculation');
            $table->string('VehicleMarque');
            $table->string('VehicleModele');
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
        Schema::dropIfExists('Vehicle');
    }
}
