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
        Schema::create('returnsForms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rent_id')->unsigned()->index();
            $table->date('dateDepart');
            $table->date('dateArrive');
            $table->foreign('rent_id')->references('id')->on('rents');
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
        Schema::dropIfExists('returnsForms');
    }
}
