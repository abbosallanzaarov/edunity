<?php

namespace App\Observers;

use App\Models\mentor;
use Illuminate\Support\Facades\File;

class MentorObserver
{
    /**
     * Handle the mentor "created" event.
     *
     * @param  \App\Models\mentor  $mentor
     * @return void
     */
    public function created(mentor $mentor)
    {
        //
    }

    /**
     * Handle the mentor "updated" event.
     *
     * @param  \App\Models\mentor  $mentor
     * @return void
     */
    public function updated(mentor $mentor)
    {
        //
    }

    /**
     * Handle the mentor "deleted" event.
     *
     * @param  \App\Models\mentor  $mentor
     * @return void
     */
    public function deleted(mentor $mentor)
    {
        //
    }

    /**
     * Handle the mentor "restored" event.
     *
     * @param  \App\Models\mentor  $mentor
     * @return void
     */
    public function restored(mentor $mentor)
    {
        //
    }

    /**
     * Handle the mentor "force deleted" event.
     *
     * @param  \App\Models\mentor  $mentor
     * @return void
     */
    public function forceDeleted(mentor $mentor)
    {
    
    }
}
