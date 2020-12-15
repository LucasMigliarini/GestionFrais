<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemboursementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('remboursement')->insert([
            'id' => '1',
            'utiMatricul' => '1',
            'etatCode' => '1',
            'date' => '2020-05-07',
        ]);

        DB::table('remboursement')->insert([
            'id' => '2',
            'utiMatricul' => '1',
            'etatCode' => '2',
            'date' => '2020-05-06',
        ]);

        DB::table('remboursement')->insert([
            'id' => '3',
            'utiMatricul' => '1',
            'etatCode' => '3',
            'date' => '2020-05-05',
        ]);

        DB::table('remboursement')->insert([
            'id' => '4',
            'utiMatricul' => '2',
            'etatCode' => '1',
            'date' => '2020-07-05',
        ]);

        DB::table('remboursement')->insert([
            'id' => '5',
            'utiMatricul' => '3',
            'etatCode' => '1',
            'date' => '2020-01-25',
        ]);
    }
}
