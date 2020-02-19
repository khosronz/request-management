<?php

use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \Illuminate\Support\Facades\DB::table('equipments')->delete();

        $equipments = factory(App\Models\Equipment::class, 100)->create();
    }
}
