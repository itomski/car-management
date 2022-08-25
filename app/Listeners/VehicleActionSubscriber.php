<?php

namespace App\Listeners;

use App\Events\VehicleActive;

class VehicleActionSubscriber {


    public function subscribe($events) {

        $events->listen(
            'App\Events\VehicleActive',
            'App\Listeners\VehicleActionSubscriber@handleStatus'
        );

        $events->listen(
            'App\Events\VehicleNew',
            'App\Listeners\VehicleActionSubscriber@handleNew'
        );

        $events->listen(
            'App\Events\VehicleDelete',
            'App\Listeners\VehicleActionSubscriber@handleDelete'
        );
    }

    public function handleStatus($event) {
        dd('Subscriber... handleStatus');
    }

    public function handleNew($event) {
        
    }

    public function handleDelete($event) {
        
    }
}