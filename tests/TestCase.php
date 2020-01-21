<?php

namespace Intec\LeadloversSdk\Test;

use GuzzleHttp\Client;
use Intec\LeadloversSdk\Resource;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    protected function getClientInstance()
    {
        $host = Resource::PROD_ENDPOINT;

        $client = new Client([
            'base_uri' => $host,
        ]);

        return $client;
    }
}