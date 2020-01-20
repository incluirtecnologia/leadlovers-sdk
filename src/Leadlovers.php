<?php

namespace Intec\LeadloversSdk;

use GuzzleHttp\Client;

class Leadlovers
{
    const PROD_ENDPOINT = 'http://llapi.leadlovers.com/webapi';

    private $client;

    const GET = 'GET';
    const POST = 'POST';

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
