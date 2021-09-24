<?php

namespace jaffarhussain1011\Guesty;

use GuzzleHttp\Client;

class Guesty 
{
    protected $client_id;
    protected $client_pass;
    protected $http_client;
    protected $provider;
    protected $base_url = 'https://api.guesty.com/api/v2/';

    public function __construct()
    {
        $this->setCredentials();
        $this->setClient();
    }

    protected function setCredentials()
    {
        $this->client_id = env('GUESTY_USERNAME');
        $this->client_pass = env('GUESTY_PASSWORD');
        $this->account_id = env('GUESTY_ACCOUNT_ID');
    }

    protected function setClient()
    {
        if (empty($this->client_id) || empty($this->client_pass)) {
            throw new \Exception("In order to use Guesty Api, please set GUESTY_USERNAME, GUESTY_PASSWORD and GUESTY_ACCOUNT_ID via env");
        }
        $this->http_client = new Client(['base_uri' => $this->base_url, 'auth' => [$this->client_id, $this->client_pass]]);
    }

    protected function formatResponse($response)
    {
        $status_code = $response->getStatusCode();
        if ($status_code == 200) {
            return json_decode($response->getBody()->getContents(), true);
        } else {
            $error = $response->getBody()->getContents();
            return ['isError' => true, "error" => $error, "status_code" => $status_code];
        }
    }


    protected function makeRequest($uri, $request_type = "GET", $params = [])
    {
        // we can enable api usage stats here
        return $this->http_client->request($request_type, $uri, $params);
    }

    public function all($limit = "100", $skip = 0)
    {
        $form_data = ['limit' => $limit, 'skip' => $skip];
        $response = $this->makeRequest($this->uri, "GET", ["query" => $form_data]);

        return $this->formatResponse($response);
    }

    public function listings()
    {
        return app()->guestyListing;
    }

    public function reservations()
    {
        return app()->guestyReservation;
    }

    public function ownerReservations()
    {
        return app()->guestyOwnersReservation;
    }
}
