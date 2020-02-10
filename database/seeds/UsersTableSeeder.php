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
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'owner',
                'email' => 'owner@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'financial',
                'email' => 'financial@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'protection',
                'email' => 'protection@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'successor',
                'email' => 'successor@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'master',
                'email' => 'master@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'support',
                'email' => 'support@gmail.com',
                'password' => bcrypt('1qaz!QAZ'),
                'api_token' => \Illuminate\Support\Str::random(60),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
