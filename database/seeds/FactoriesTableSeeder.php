<?php

use Illuminate\Database\Seeder;

class FactoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telltypes=factory(App\Models\Telltype::class, 3)->create();
        $factories = factory(App\Models\Factory::class, 10)->create();
        $factoytells = factory(App\Models\Factorytell::class, 100)->create();
        $factoryaddress = factory(App\Models\Factoryaddress::class, 100)->create();
    }
}