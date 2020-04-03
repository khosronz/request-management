<?php

use Illuminate\Database\Seeder;

class PrefactorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $verifiedOrders = \App\Models\Order::where('verified', '=', \App\Enums\VerifiedType::supplier_waite)
            ->where('waite_status', '=', 1)
            ->get();

        foreach ($verifiedOrders as $verifiedOrder) {
            $prefactor = new \App\Models\Prefactor();

            $prefactor->user_id = \App\Enums\UserType::supplier;
            $prefactor->order_id = $verifiedOrder->id;
            $prefactor->factory_id = rand(1, 10);
            $prefactor->created_at = now();
            $prefactor->updated_at = now();

            $prefactor->save();
        }
    }
}
