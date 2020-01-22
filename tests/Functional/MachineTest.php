<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Machine;
use Intec\LeadloversSdk\Test\TestCase;

class MachineTest extends TestCase
{
    /**
     * @group get-method
     */
    public function testRetrieveMachinesFromAccount()
    {
        $client = $this->getClientInstance();
        $machine = new Machine($client, $this->token, $this->machineCode);

        $result = $machine->retrieveMachinesFromAccount();

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('CurrentPage', $result);
        $this->assertArrayHasKey('Registers', $result);
    }

    /**
     * @group get-method
     */
    public function testRetrieveMachineInfoById()
    {
        $client = $this->getClientInstance();
        $machine = new Machine($client, $this->token, $this->machineCode);

        $result = $machine->retrieveMachineInfoById();

        $this->assertEquals($this->machineCode, $result['MachineCode']);
        $this->assertArrayHasKey('MachineImage', $result);
        $this->assertArrayHasKey('MachineType', $result);
        $this->assertArrayHasKey('MachineName', $result);
    }

    /**
     * @group get-method
     */
    public function testRetrieveMachineFormsCollection()
    {
        $client = $this->getClientInstance();
        $machine = new Machine($client, $this->token, $this->machineCode);

        $result = $machine->retrieveMachineFormsCollection();

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('FormCode', $result['Items'][0]);
        $this->assertArrayHasKey('FormName', $result['Items'][0]);
        $this->assertArrayHasKey('Views', $result['Items'][0]);
        $this->assertArrayHasKey('Conversions', $result['Items'][0]);
        $this->assertArrayHasKey('pageHtml', $result['Items'][0]);
    }

    /**
     * @group get-method
     */
    public function testRetrieveMachinePagesCollection()
    {
        $client = $this->getClientInstance();
        $machine = new Machine($client, $this->token, $this->machineCode);

        $result = $machine->retrieveMachinePagesCollection();

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