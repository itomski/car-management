<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // \App\Events\VehicleActive::class => [
        //     \App\Listeners\VehicleActiveListener::class,
        // ]
    ];

    protected $subscribe = [
        'App\Listeners\VehicleActionSubscriber'
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    // Scannt automatisch nach Listenern und Events
    public function shouldDiscoverEvents() {
        return true;
    }

    // mit Überschrreiben der disoverEventsWithin() kann man weitere Orte zum Scannen angeben
}
