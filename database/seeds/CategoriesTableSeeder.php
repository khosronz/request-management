<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \Illuminate\Support\Facades\DB::table('categories')->delete();

        \Illuminate\Support\Facades\DB::table('categories')->insert([
            ['title' => 'دسته مادر',
                'desc' => 'همه ی دسته ها در این دسته قرار می گیرند.',
                'user_id' => \App\Enums\UserType::master,
                'parent_id' => 0,
                'category_visits' => 0,
                'created_at' => now(),
                'updated_at' => now()],
        ]);

        $categories = factory(App\Models\Category::class, 10)->create();
    }
}
