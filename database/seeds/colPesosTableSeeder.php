<?php

use Illuminate\Database\Seeder;
use App\ColPeso;
class colPesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mount = new ColPeso();
        $mount->mount = 100000;
        $mount->save();
    }
}
