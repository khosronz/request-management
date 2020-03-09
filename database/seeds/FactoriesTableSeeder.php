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
//        $telltypes = factory(App\Models\Telltype::class, 3)->create();
        $telltypes = \Illuminate\Support\Facades\DB::table('telltypes')->insert([
            [
                'title' => 'تلفن همراه',
                'desc' => '',
                'created_at' => \Illuminate\Support\Facades\Date::now(),
                'updated_at' => \Illuminate\Support\Facades\Date::now(),
            ],
            [
                'title' => 'تلفن محل کار',
                'desc' => '',
                'created_at' => \Illuminate\Support\Facades\Date::now(),
                'updated_at' => \Illuminate\Support\Facades\Date::now(),
            ],
            [
                'title' => 'فکس',
                'desc' => '',
                'created_at' => \Illuminate\Support\Facades\Date::now(),
                'updated_at' => \Illuminate\Support\Facades\Date::now(),
            ],
        ]);
        $factories = factory(App\Models\Factory::class, 10)->create();
        $factoytells = factory(App\Models\Factorytell::class, 100)->create();
        $factoryaddress = factory(App\Models\Factoryaddress::class, 100)->create();
    }
}