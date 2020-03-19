<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('organizations')->insert([
            ['title' => 'دسته ریشه','desc' => 'همه ی دسته ها در این دسته قرار می گیرند.', 'parent_id'=>0,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'فروش','desc' => 'سوالات مربوط به فروش', 'parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'پشتیبانی', 'desc' => 'پشتیبانی فنی','parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'لایسنس', 'desc' => 'مشکلات و خطاهای مربوط به لایسنس','parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'سرویس مشتری','desc' => 'حساب کاربری و گزارش های خرید', 'parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'گذارش خطا', 'desc' => 'گزارش خاطا و باگ','parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'درخواست قابلیت', 'desc' => 'درخواست قابلیت های مورد نیاز','parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'فروشگاه', 'desc' => 'سرویس و پشتیبانی','parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
            ['title' => 'همکاری درفروش / ریسلر','desc' => 'دریافت نمایندگی', 'parent_id'=>1,'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
