<?php

namespace Intec\LeadloversSdk\Test;

use GuzzleHttp\Client;
use Intec\LeadloversSdk\Leadlovers;
use PHPUnit\Framework\TestCase;

class LeadloversTest extends TestCase
{
    public function testCanCreatInstance()
    {
        $host = Leadlovers::PROD_ENDPOINT;

        $client = new Client([
            'base_uri' => $host,
        ]);

        $leadlovers = new Leadlovers($client);

        $this->assertInstanceOf(Leadlovers::class, $leadlovers);
    }
}
