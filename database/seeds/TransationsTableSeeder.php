<?php

use Illuminate\Database\Seeder;

use App\Transation;

class TransationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = new Transation();
      $role->state = 0;
      $role->mount = '12000';
      $role->from_address = '1a34d3rvssrf5dx4ww4scd5grtneymmedfg';
      $role->moneda = 'Pesos';
      $role->save();

      $role = new Transation();
      $role->state = 1;
      $role->mount = '112000';
      $role->from_address = '1a34d3rvcstvtrt665ew45yhe7nbymmed6h';
      $role->moneda = 'Bitcoin';
      $role->save();

      $role = new Transation();
      $role->state = 0;
      $role->mount = '22000';
      $role->from_address = '1a34d3rvssrf5dx4ww4scd5grvet7e6s5qwg';
      $role->moneda = 'Pesos';
      $role->save();
    }
}
