<?php

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
        $this->call(RolesDatabaseSeeder::class);
        $this->call(TransationsTableSeeder::class);
        $this->call(UsersDatabaseSeeder::class);
        $this->call(colPesosTableSeeder::class);
    }
}
