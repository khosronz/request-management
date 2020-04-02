<?php

use Illuminate\Database\Seeder;

class OrganizationCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization_it = \App\Models\Organization::where('title', '=', 'فناوری اطلاعات')->first();
        \Illuminate\Support\Facades\DB::table('organization_categories')->insert([
            [
                'user_id' => \App\Enums\UserType::superadmin,
                'category_id' => \App\Enums\MainCategories::Digital_goods,
                'organization_id' => $organization_it->id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
