<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Lead;
use Intec\LeadloversSdk\Test\TestCase;

class LeadTest extends TestCase
{
    public function testRetrieveLeadByEmail()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $lead = new Lead($client, $token);
        $email = 'teste@teste.com.br';

        $result = $lead->retrieveLeadByEmail($email);

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
        $this->assertEquals($email, $result['Email']);
        $this->assertEquals('teste', $result['Name']);
    }

    public function testRetrieveLeadLocation()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $lead = new Lead($client, $token);
        $email = 'teste@teste.com.br';

        $result = $lead->retrieveLeadLocation($email);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('LeadCode', $result['Items'][0]);
        $this->assertArrayHasKey('LeadEmail', $result['Items'][0]);
        $this->assertArrayHasKey('LeadName', $result['Items'][0]);
        $this->assertArrayHasKey('MachineCode', $result['Items'][0]);
        $this->assertArrayHasKey('MachineName', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceCode', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceName', $result['Items'][0]);
        $this->assertArrayHasKey('Level', $result['Items'][0]);
        $this->assertEquals('teste', $result['Items'][0]['LeadName']);
        $this->assertEquals('teste@teste.com.br', $result['Items'][0]['LeadEmail']);
    }
}