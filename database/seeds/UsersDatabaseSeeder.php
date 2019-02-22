<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Transation;
use App\ColPeso;

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

      $transationA = Transation::where('from_address', '1a34d3rvssrf5dx4ww4scd5grtneymmedfg')->first();
      $transationB = Transation::where('from_address', '1a34d3rvcstvtrt665ew45yhe7nbymmed6h')->first();
      $transationC = Transation::where('from_address', '1a34d3rvssrf5dx4ww4scd5grvet7e6s5qwg')->first();



      $user = new User();
      $user->name = 'Admin';
      $user->email = 'admin@example.com';
      $user->walletBTC = '1MoFKJj8DuPu14HRKzP6UXEtTQA162LgHh';
      $user->walletETH = '1MoFKJj8euPue4HRKzP6UXEtTQA162LgHh';
      $user->walletBCH = '1MoFKJj8FuPu74HRKzP6UXEtTQA162LgHh';
      $user->walletCOL = 'pesos:'.Hash::make(str_random(10));
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'Aliado';
      $user->email = 'aliado@example.com';
      $user->walletBTC = '1MoFKJj8DuPuf4HRKzP6UXEtTQA162LgHh';
      $user->walletETH = '1MoFKJj8euPuf4HRKzP6UXEtTQA162LgHh';
      $user->walletBCH = '1MoFKJj8FuPuf4HRKzP6UXEtTQA162LgHh';
      $user->walletCOL = 'pesos:'.Hash::make(str_random(10));
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_aliado);

      $user = new User();
      $user->name = 'User';
      $user->email = 'user@example.com';
      $user->walletBTC = '1MoFKJj8DuPuf4HwKzP6UXEtTQA162LgHh';
      $user->walletETH = '1MoFKJj8euPuf4HhKzP6UXEtTQA162LgHh';
      $user->walletBCH = '1MoFKJj8FuPuf4HoKzP6UXEtTQA162LgHh';
      $user->walletCOL = 'pesos:'.Hash::make(str_random(10));
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role_user);
      $user->transations()->attach($transationA);
      $user->transations()->attach($transationB);
      $user->transations()->attach($transationC);
    }
}
