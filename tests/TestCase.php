<?php

namespace Intec\LeadloversSdk\Test;

use GuzzleHttp\Client;
use Intec\LeadloversSdk\Leadlovers;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    protected function getLeadLoversSdkInstance()
    {
        $host = Leadlovers::PROD_ENDPOINT;

        $client = new Client([
            'base_uri' => $host,
        ]);

        return new Leadlovers($client);
    }
}