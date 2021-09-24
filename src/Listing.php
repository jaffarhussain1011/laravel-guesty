<?php

namespace jaffarhussain1011\Guesty;

use jaffarhussain1011\Guesty\Guesty;

class Listing extends Guesty
{
    protected $fields = ["isListed", "nickname", "bedrooms","propertyType"];
    protected $uri = "listings";
}
