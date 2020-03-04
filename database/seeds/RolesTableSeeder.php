<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            ['id'=>\App\Enums\UserType::superadmin,'title' => 'superadmin', 'desc' => 'Administrator Of System', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::owner,'title' => 'owner', 'desc' => 'Owner of Requests', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::financial,'title' => 'financial', 'desc' => 'Financial user', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::protection,'title' => 'protection', 'desc' => 'Protection user', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::successor,'title' => 'successor', 'desc' => 'Successor user', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::master,'title' => 'master', 'desc' => 'Master user', 'created_at' => now(), 'updated_at' => now()],
            ['id'=>\App\Enums\UserType::support,'title' => 'support', 'desc' => 'Support user', 'created_at' => now(), 'updated_at' => now()]
        ]);

        \Illuminate\Support\Facades\DB::table('role_users')->insert([
            ['role_id' => \App\Enums\UserType::superadmin, 'user_id' => \App\User::where('id',\App\Enums\UserType::superadmin)->first()->id],
            ['role_id' => \App\Enums\UserType::owner, 'user_id' => \App\User::where('id',\App\Enums\UserType::owner)->first()->id],
            ['role_id' => \App\Enums\UserType::master, 'user_id' => \App\User::where('id',\App\Enums\UserType::master)->first()->id],
            ['role_id' => \App\Enums\UserType::financial, 'user_id' => \App\User::where('id',\App\Enums\UserType::financial)->first()->id],
            ['role_id' => \App\Enums\UserType::support, 'user_id' => \App\User::where('id',\App\Enums\UserType::support)->first()->id],
            ['role_id' => \App\Enums\UserType::protection, 'user_id' => \App\User::where('id',\App\Enums\UserType::protection)->first()->id],
            ['role_id' => \App\Enums\UserType::successor, 'user_id' => \App\User::where('id',\App\Enums\UserType::successor)->first()->id]
        ]);

    }
}
