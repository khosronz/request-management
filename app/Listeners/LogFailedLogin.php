<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogFailedLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
//        dd($event);
//        Log::critical($event->credentials['email'].' want to login to your system. but Failed in this action.');
//        Log::channel('mysql')->critical($event->credentials['email'].' want to login to your system. but Failed in this action.',['id' => Auth::id()]);
        Log::channel('mysql')->critical($event->credentials['email'].' want to login to your system. but Failed in this action.');
    }
}
