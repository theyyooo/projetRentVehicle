<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            $table->string('nom');
            $table->string('prenom');
            $table->date('anniversaire');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('codePostal');
            $table->string('mail');         
            $table->string('tel'); 
            $table->boolean('vehicle')->default(false);
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
        Schema::dropIfExists('users');
    }
}
