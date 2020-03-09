<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'id' => \App\Enums\UserType::superadmin,
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::owner,
                'name' => 'owner',
                'email' => 'owner@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::financial,
                'name' => 'financial',
                'email' => 'financial@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::protection,
                'name' => 'protection',
                'email' => 'protection@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::successor,
                'name' => 'successor',
                'email' => 'successor@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::master,
                'name' => 'master',
                'email' => 'master@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::support,
                'name' => 'support',
                'email' => 'support@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
            [
                'id' => \App\Enums\UserType::supplier,
                'name' => 'supplier',
                'email' => 'supplier@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
            ],
        ]);
    }
}
