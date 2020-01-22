<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Email;
use Intec\LeadloversSdk\Test\TestCase;

class EmailTest extends TestCase
{
    /**
     * @group get-method
     */
    public function testRetrieveEmailSequenceCollectionMachineNotFound()
    {
        $client = $this->getClientInstance();
        $email = new Email($client, $this->token);
        $machineCode = 1;

        $result = $email->retrieveEmailSequenceCollection($machineCode);

        $this->assertEquals([
            'StatusCode' => 400,
            'Message' => 'Código da Máquina inválido'
        ], $result);
    }

    /**
     * @group get-method
     */
    public function testRetrieveEmailSequenceCollectionMachineSuccess()
    {
        $client = $this->getClientInstance();
        $email = new Email($client, $this->token);

        $result = $email->retrieveEmailSequenceCollection($this->machineCode);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('SequenceCode', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceName', $result['Items'][0]);
        $this->assertEquals($this->sequenceCode, $result['Items'][0]['SequenceCode']);
    }

    /**
     * @group get-method
     */
    public function testRetrieveLevelsFromEmailSequence()
    {
        $client = $this->getClientInstance();
        $email = new Email($client, $this->token);

        $result = $email->retrieveLevelsFromEmailSequence($this->machineCode, $this->sequenceCode);

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('ModelCode', $result['Items'][0]);
        $this->assertArrayHasKey('Sequence', $result['Items'][0]);
        $this->assertArrayHasKey('Subject', $result['Items'][0]);
    }
}