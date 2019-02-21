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
        $mount->user_id = 1;
        $mount->save();

        $mount = new ColPeso();
        $mount->mount = 0;
        $mount->user_id = 2;
        $mount->save();

        $mount = new ColPeso();
        $mount->mount = 0;
        $mount->user_id = 3;
        $mount->save();
    }
}
