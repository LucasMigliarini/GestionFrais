<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Rusers' => '1',
            'Rpermissions' => '1',

        ]);

        DB::table('users')->insert([
            'Rusers' => '2',
            'Rpermissions' => '3',

        ]);

        DB::table('users')->insert([
            'Rusers' => '3',
            'Rpermissions' => '2',

        ]);
    }
}
