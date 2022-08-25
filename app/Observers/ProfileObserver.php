<?php

namespace App\Observers;

use App\Profile;
use Illuminate\Support\Facades\Log;

class ProfileObserver
{
    /**
     * Handle the profile "created" event.
     *
     * @param  \App\Profile  $profile
     * @return void
     */
    public function created(Profile $profile)
    {
        //
    }

    public function updating(Profile $profile)
    {
        Log::info('want change profile of '.$profile->user->name);
    }


    /**
     * Handle the profile "updated" event.
     *
     * @param  \App\Profile  $profile
     * @return void
     */
    public function updated(Profile $profile)
    {
        Log::info('profile changed '.$profile->user->name);
    }

    /**
     * Handle the profile "deleted" event.
     *
     * @param  \App\Profile  $profile
     * @return void
     */
    public function deleted(Profile $profile)
    {
        //
    }

    /**
     * Handle the profile "restored" event.
     *
     * @param  \App\Profile  $profile
     * @return void
     */
    public function restored(Profile $profile)
    {
        //
    }

    /**
     * Handle the profile "force deleted" event.
     *
     * @param  \App\Profile  $profile
     * @return void
     */
    public function forceDeleted(Profile $profile)
    {
        //
    }
}
