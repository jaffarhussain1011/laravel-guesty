<?php

namespace jaffarhussain1011\Guesty;

use jaffarhussain1011\Guesty\Guesty;

class Reservation extends Guesty
{
    protected $fields = ["listingId", "confirmationCode", "checkIn","checkOut","source","status","money","canceledAt","nightsCount"];
    protected $uri = "reservations";
    
}
