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
        ]);

        DB::table('frais')->insert([
            'id' => '2',
            'libelle' => 'Kilometrique',
        ]);

        DB::table('frais')->insert([
            'id' => '3',
            'libelle' => 'Hotel',
        ]);
    }
}
