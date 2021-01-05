<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => '1',
            'libelle' => 'admin',
        ]);

        DB::table('permissions')->insert([
            'id' => '2',
            'libelle' => 'comptable',
        ]);

        DB::table('permissions')->insert([
            'id' => '3',
            'libelle' => 'visiteur',
        ]);
    }
}
