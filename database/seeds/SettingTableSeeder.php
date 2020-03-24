<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('settings')->insert([
            [
                'title' => 'language',
                'default' => 'fa_IR',
                'user_id' => \App\Enums\UserType::superadmin,
                'short_code' => 'language',
                'value' => '',
                'desc' => 'Set language of your system',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
