<?php

namespace Intec\LeadloversSdk\Test;

use GuzzleHttp\Client;
use Intec\LeadloversSdk\Resource;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    protected $token;
    protected $tagId;
    protected $leadEmail;
    protected $LeadCode;
    protected $machineCode;
    protected $sequenceCode;

    protected function setUp(): void
    {
        $this->token = getenv('TOKEN');
        $this->tagId = getenv('TAG_ID');
        $this->leadEmail = getenv('LEAD_EMAIL');
        $this->leadCode = getenv('LEAD_CODE');
        $this->machineCode = getenv('MACHINE_CODE');
        $this->sequenceCode = getenv('SEQUENCE_CODE');
    }

    protected function getClientInstance()
    {
        $host = Resource::PROD_ENDPOINT;

        $client = new Client([
            'base_uri' => $host,
        ]);

        return $client;
    }
}