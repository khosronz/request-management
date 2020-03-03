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
        $factories = factory(App\Models\Factory::class, 15)->create();
    }
}