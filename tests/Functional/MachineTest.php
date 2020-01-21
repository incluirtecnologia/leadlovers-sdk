<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Machine;
use Intec\LeadloversSdk\Test\TestCase;

class MachineTest extends TestCase
{
    public function testRetrieveMachinesFromAccount()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $machine = new Machine($client, $token);

        $result = $machine->retrieveMachinesFromAccount();

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('CurrentPage', $result);
        $this->assertArrayHasKey('Registers', $result);
    }

    public function testRetrieveMachineInfoById()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $machine = new Machine($client, $token);
        $machineId = $machine->retrieveMachinesFromAccount()['Items'][0]['MachineCode'];

        $result = $machine->retrieveMachineInfoById($machineId);

        $this->assertEquals($machineId, $result['MachineCode']);
        $this->assertArrayHasKey('MachineImage', $result);
        $this->assertArrayHasKey('MachineType', $result);
        $this->assertArrayHasKey('MachineName', $result);
    }

    public function testRetrieveMachineFormsCollection()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $machine = new Machine($client, $token);
        $machineCode = $machine->retrieveMachinesFromAccount()['Items'][3]['MachineCode'];

        $result = $machine->retrieveMachineFormsCollection($machineCode);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('FormCode', $result['Items'][0]);
        $this->assertArrayHasKey('FormName', $result['Items'][0]);
        $this->assertArrayHasKey('Views', $result['Items'][0]);
        $this->assertArrayHasKey('Conversions', $result['Items'][0]);
        $this->assertArrayHasKey('pageHtml', $result['Items'][0]);
    }

    public function testRetrieveMachinePagesCollection()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $machine = new Machine($client, $token);
        $machineCode = $machine->retrieveMachinesFromAccount()['Items'][3]['MachineCode'];

        $result = $machine->retrieveMachinePagesCollection($machineCode);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('Path', $result['Items'][0]);
        $this->assertArrayHasKey('PageCode', $result['Items'][0]);
        $this->assertArrayHasKey('MachineCode', $result['Items'][0]);
        $this->assertArrayHasKey('PageName', $result['Items'][0]);
        $this->assertArrayHasKey('PageImage', $result['Items'][0]);
        $this->assertArrayHasKey('Views', $result['Items'][0]);
        $this->assertArrayHasKey('Conversions', $result['Items'][0]);
        $this->assertArrayHasKey('PageRoot', $result['Items'][0]);
        $this->assertArrayHasKey('UserId', $result['Items'][0]);
    }
}