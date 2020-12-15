<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FraisForfaitaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fraisforfaitaire')->insert([
            'id' => '1',
            'date' => '2020-05-15',
            'quantite' => '450',
            'fraisCode' => '1',
            'rembCode' => '1',
            'situation' => 'En attente',
        ]);

        DB::table('fraisforfaitaire')->insert([
            'id' => '2',
            'date' => '2020-04-05',
            'quantite' => '50',
            'fraisCode' => '2',
            'rembCode' => '2',
            'situation' => 'En attente',
        ]);

        DB::table('fraisforfaitaire')->insert([
            'id' => '3',
            'date' => '2020-01-25',
            'quantite' => '450',
            'fraisCode' => '3',
            'rembCode' => '4',
            'situation' => 'En attente',
        ]);

        DB::table('fraisforfaitaire')->insert([
            'id' => '4',
            'date' => '2020-01-26',
            'quantite' => '450',
            'fraisCode' => '1',
            'rembCode' => '4',
            'situation' => 'En attente',
        ]);

        DB::table('fraisforfaitaire')->insert([
            'id' => '5',
            'date' => '2020-06-05',
            'quantite' => '450',
            'fraisCode' => '1',
            'rembCode' => '5',
            'situation' => 'En attente',
        ]);
    }
}
