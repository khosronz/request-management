<?php

use Illuminate\Database\Seeder;

class OrganizationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization_it = \App\Models\Organization::where('title', '=', 'فناوری اطلاعات')->first();
        \Illuminate\Support\Facades\DB::table('organization_users')->insert([
            [
                'user_id' => \App\Enums\UserType::master,
                'organization_id' => $organization_it->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => \App\Enums\UserType::successor,
                'organization_id' => $organization_it->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => \App\Enums\UserType::owner,
                'organization_id' => $organization_it->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
