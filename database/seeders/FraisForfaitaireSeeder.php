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
            'quantiteValide' => '450',
            'fraisCode' => '1',
            'rembCode' => '1',
        ]);

        DB::table('fraisforfaitaire')->insert([
            'id' => '2',
            'date' => '2020-04-05',
            'quantite' => '50',
            'quantiteValide' => '50',
            'fraisCode' => '2',
            'rembCode' => '2',
        ]);
    }
}
