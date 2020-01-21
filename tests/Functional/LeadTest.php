<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Lead;
use Intec\LeadloversSdk\Test\TestCase;

class LeadTest extends TestCase
{
    public function testRetrieveLeadByEmail()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->retrieveLeadByEmail($this->leadEmail);

        $this->assertArrayHasKey('Code', $result);
        $this->assertArrayHasKey('Email', $result);
        $this->assertArrayHasKey('Name', $result);
        $this->assertArrayHasKey('Phone', $result);
        $this->assertArrayHasKey('Birthday', $result);
        $this->assertArrayHasKey('Photo', $result);
        $this->assertArrayHasKey('City', $result);
        $this->assertArrayHasKey('State', $result);
        $this->assertArrayHasKey('Company', $result);
        $this->assertArrayHasKey('Gender', $result);
        $this->assertEquals($this->leadEmail, $result['Email']);
    }

    public function testRetrieveLeadLocation()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->retrieveLeadLocation($this->leadEmail);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('LeadCode', $result['Items'][0]);
        $this->assertArrayHasKey('LeadEmail', $result['Items'][0]);
        $this->assertArrayHasKey('LeadName', $result['Items'][0]);
        $this->assertArrayHasKey('MachineCode', $result['Items'][0]);
        $this->assertArrayHasKey('MachineName', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceCode', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceName', $result['Items'][0]);
        $this->assertArrayHasKey('Level', $result['Items'][0]);
        $this->assertEquals($this->leadEmail, $result['Items'][0]['LeadEmail']);
    }
}