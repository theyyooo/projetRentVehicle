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
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('UserId');
            $table->string('UserNom');
            $table->String('UserPrenom');
            $table->date('UserAnniversaire');
            $table->string('UserAdresse');
            $table->string('UserVille');
            $table->string('UserPays');
            $table->string('UserCodePostal');
            $table->string('UserMail');
            $table->string('UserTel'); 
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
        Schema::dropIfExists('Users');
    }
}
