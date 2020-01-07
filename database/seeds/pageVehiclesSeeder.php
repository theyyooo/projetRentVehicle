<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pageVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            [
            'immatriculation'=>'AL-705-SK',
            'marque'=>'Mercedes-Benz',
            'modele'=>'classeA',
            'type'=>'Berline',
            'photo'=>'classeA',
            'disponibilite' => true
        ],[
            'immatriculation'=>'SK-845-HF',
            'marque'=>'Bmw',
            'modele'=>'serie3',
            'type'=>'Break',
            'photo'=>'serie3',  
            'disponibilite' => false
        ],[
            'immatriculation'=>'FH-545-HC',
            'marque'=>'Audi',
            'modele'=>'q4',
            'type'=>'S.U.V',
            'photo'=>'q4',
            'disponibilite' => false
        ],[
            'immatriculation'=>'AQ-123-QQ',
            'marque'=>'Renault',
            'modele'=>'kangoo',
            'type'=>'Utilitaire',
            'photo'=>'kangoo',
            'disponibilite' => false 
        ]
        ]);
    }
}
