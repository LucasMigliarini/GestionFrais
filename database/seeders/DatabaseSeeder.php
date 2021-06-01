<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EtatSeeder::class,
            FraisSeeder::class,
            UsersSeeder::class,
            RemboursementSeeder::class,
            HorsFraisSeeder::class,
            FraisForfaitaireSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
          ]);
    }
}
