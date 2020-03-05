<?php

use Illuminate\Database\Seeder;

class ProtectionCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $protection_categories = factory(App\Models\ProtectionCategory::class, 10)->create();
    }
}
