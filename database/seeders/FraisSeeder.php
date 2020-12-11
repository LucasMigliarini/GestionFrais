<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FraisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frais')->insert([
            'id' => '1',
            'libelle' => 'Etape',
            'montant' => '50',
        ]);

        DB::table('frais')->insert([
            'id' => '2',
            'libelle' => 'Kilometrique',
            'montant' => '250',
        ]);

        DB::table('frais')->insert([
            'id' => '3',
            'libelle' => 'Hotel',
            'montant' => '350',
        ]);

        DB::table('frais')->insert([
            'Code' => '4',
            'libelle' => 'Repas',
            'Montant' => '450',
        ]);
    }
}
