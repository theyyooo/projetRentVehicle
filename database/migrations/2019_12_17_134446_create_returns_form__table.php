<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ReturnsForm', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('RentId')->unsigned()->index();
            $table->date('DateDepart');
            $table->date('DateArrive');
            $table->foreign('RentId')->references('RentId')->on('Rent');
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
        Schema::dropIfExists('ReturnsForm');
    }
}
