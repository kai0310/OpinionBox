<?php

namespace App\Listeners;

use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Support\Facades\Artisan;

class MigrationsEndedListener
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
     * @param  MigrationsEnded  $event
     * @return void
     */
    public function handle(MigrationsEnded $event)
    {
        Artisan::call('ensure-database-state-is-loaded');
    }
}
