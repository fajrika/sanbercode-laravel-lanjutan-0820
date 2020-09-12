<?php

namespace App\Listeners;

use App\Events\TodoCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogInfo
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
     * @param  TodoCreatedEvent  $event
     * @return void
     */
    public function handle(TodoCreatedEvent $event)
    {
        Log::info($event->todo->user->name , ["message" => "berhasil menambahkan todo list"]);
    }
}
