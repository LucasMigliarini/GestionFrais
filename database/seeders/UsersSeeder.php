<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123+aze'),
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'visitor1',
            'email' => Str::random(10).'@gmail.com',
            'password' => '123+aze',
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'name' => 'visitor2',
            'email' => Str::random(10).'@gmail.com',
            'password' => '123+aze',
        ]);
    }
}
