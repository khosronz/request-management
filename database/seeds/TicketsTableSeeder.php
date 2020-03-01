<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \Illuminate\Support\Facades\DB::table('tickets')->delete();

        $tickets = factory(App\Models\Ticket::class, 100)->create();
        $messages = factory(App\Models\Message::class, 1000)->create();
    }
}
