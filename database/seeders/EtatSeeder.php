<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etat')->insert([
            'id' => '1',
            'libelle' => 'En attente',
        ]);

        DB::table('etat')->insert([
            'id' => '2',
            'libelle' => 'Accepter',
        ]);

        DB::table('etat')->insert([
            'id' => '3',
            'libelle' => 'Refuser',
        ]);
    }
}
