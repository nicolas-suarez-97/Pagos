<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_aliado = Role::where('name', 'aliado')->first();
      $role_user = Role::where('name', 'user')->first();

      $user = new User();
      $user->name = 'Admin';
      $user->email = 'admin@example.com';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'Aliado';
      $user->email = 'aliado@example.com';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_aliado);

      $user = new User();
      $user->name = 'User';
      $user->email = 'user@example.com';
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_user);
    }
}
