<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Incidents', function (Blueprint $table) {
            $table->increments('IncidentId');
            $table->integer('VehicleId')->unsigned()->index();
            $table->string('Description');
            $table->boolean('VoitureUtilisable');
            $table->string('Photo');
            $table->date('Date');
            $table->date('DateReparation');
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
        Schema::dropIfExists('Incidents');
    }
}
