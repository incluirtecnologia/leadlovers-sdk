<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Email;
use Intec\LeadloversSdk\Machine;
use Intec\LeadloversSdk\Test\TestCase;

class EmailTest extends TestCase
{
    public function testRetrieveEmailSequenceCollectionMachineNotFound()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $email = new Email($client, $token);
        $machineCode = 1;

        $result = $email->retrieveEmailSequenceCollection($machineCode);

        $this->assertEquals([
            'StatusCode' => 400,
            'Message' => 'Código da Máquina inválido'
        ], $result);
    }

    public function testRetrieveEmailSequenceCollectionMachineSuccess()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $email = new Email($client, $token);
        $machine = new Machine($client, $token);
        $machineCode = $machine->retrieveMachinesFromAccount()['Items'][0]['MachineCode'];

        $result = $email->retrieveEmailSequenceCollection($machineCode);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('SequenceCode', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceName', $result['Items'][0]);
    }

    public function testRetrieveLevelsFromEmailSequence()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $email = new Email($client, $token);
        $machine = new Machine($client, $token);
        $machineCode = $machine->retrieveMachinesFromAccount()['Items'][0]['MachineCode'];
        $sequenceCode = $email->retrieveEmailSequenceCollection($machineCode)['Items'][0]['SequenceCode'];

        $result = $email->retrieveLevelsFromEmailSequence($machineCode, $sequenceCode);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('ModelCode', $result['Items'][0]);
        $this->assertArrayHasKey('Sequence', $result['Items'][0]);
        $this->assertArrayHasKey('Subject', $result['Items'][0]);
    }
}