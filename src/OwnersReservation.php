<?php

namespace jaffarhussain1011\Guesty;

use jaffarhussain1011\Guesty\Guesty;

class OwnersReservation extends Guesty
{
    protected $fields = ["listingId", "checkIn","checkOut","source","status","cancelledAt","nightsCount"];
    protected $uri = "owners-reservations/";

    public function list($limit = "100", $skip = 0)
    {
        $form_data = ['limit' => $limit, 'skip' => $skip];
        $form_data['fields'] = implode(" ", $this->fields);
        $response = $this->makeRequest($this->uri, "GET", ["query" => $form_data]);

        return $this->formatResponse($response);
    }

    protected function formatResponse($response)
    {
        $status_code = $response->getStatusCode();
        if ($status_code == 200 || $status_code == 201) {
            return json_decode($response->getBody()->getContents(), true);
        } else {
            $error = $response->getBody()->getContents();
            return ['isError' => true, "error" => $error , "status_code" => $status_code];
        }
    }

    
}
