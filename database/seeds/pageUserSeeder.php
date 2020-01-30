<?php

use Illuminate\Database\Seeder;

class pageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nom'=> 'polette',
            'prenom'=> 'théo',
            'password'=> '$2y$10$BGiHPMQn7.a/VpRvah9yXe4XzfvtMqaitqKPPksrzg4tOvISUppUy',
            'mail'=> 'polette.theo@hotmail.fr',
            'admin'=> 1
        ]);
    }
}
