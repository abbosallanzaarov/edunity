<?php

namespace App\Listeners;

use App\Events\StudentCreate;
use App\Models\student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class SentToEmailStudent
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
     * @param  \App\Events\StudentCreate  $event
     * @return void
     */
    public function handle(StudentCreate $event)
    {
        dd($event->student);
    }
}
