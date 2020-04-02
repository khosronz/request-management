<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SeveritiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(FactoriesTableSeeder::class);
        $this->call(MediasTableSeeder::class);
        $this->call(ProtectionCategoryTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
