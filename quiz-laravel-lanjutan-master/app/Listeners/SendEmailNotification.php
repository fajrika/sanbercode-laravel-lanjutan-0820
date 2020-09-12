<?php

namespace App\Listeners;

use App\Events\TodoCreatedEvent;
use App\Mail\TodoCreatedMail;
use App\Models\Todo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  TodoCreatedEvent  $event
     * @return void
     */
    public function handle(TodoCreatedEvent $event)
    {
      Mail::to($event->todo->user)->send(new TodoCreatedMail($event->todo->user));

    }
}
