<?php

namespace jaffarhussain1011\Guesty;

use jaffarhussain1011\Guesty\Guesty;
use jaffarhussain1011\Guesty\Listing as GuestyListing;
use jaffarhussain1011\Guesty\Reservation as GuestyReservation;
use jaffarhussain1011\Guesty\OwnersReservation as GuestyOwnersReservation;

/**
 * Class GuestyApiServiceProvider
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('guesty', Guesty::class);
        $this->app->singleton('guestyListing', GuestyListing::class);
        $this->app->singleton('guestyReservation', GuestyReservation::class);
        $this->app->singleton('guestyOwnersReservation', GuestyOwnersReservation::class);
    }
}
