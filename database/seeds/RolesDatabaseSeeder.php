<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator to all system';
        $role->save();

        $role = new Role();
        $role->name = 'aliado';
        $role->description = 'The mall';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Client';
        $role->save();


    }
}
