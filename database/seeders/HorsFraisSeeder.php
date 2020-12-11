<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorsFraisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horsfrais')->insert([
            'id' => '1',
            'date' => '2020-02-10',
            'montant' => '450',
            'libelle' => 'Invitation client repas',
            'montantValide' => '450',
            'rembCode' => '1',
        ]);
    }
}
