<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Lead;
use Intec\LeadloversSdk\Test\TestCase;

class LeadTest extends TestCase
{
    /**
     * @group get-method
     */
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

    /**
     * @group get-method
     */
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

    /**
     * @group post-method
     */
    public function testInsertNewLeadHardcoded()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->insertNewLead(
            'email@email.com.br',
            $this->machineCode,
            $this->sequenceCode,
            1
        );

        $this->assertEquals(200, $result['StatusCode']);
        $this->assertEquals('Novo lead inserido na fila para processamento.', $result['Message']);
    }

    /**
     * @group put-method
     */
    public function testMoveLeadInsideEmailSequenceHardcoded()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->moveLeadInsideEmailSequence(
            'email@email.com.br',
            $this->machineCode,
            $this->sequenceCode,
            2
        );

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('LeadCode', $result['Items'][0]);
        $this->assertArrayHasKey('LeadEmail', $result['Items'][0]);
        $this->assertArrayHasKey('LeadName', $result['Items'][0]);
        $this->assertArrayHasKey('MachineCode', $result['Items'][0]);
        $this->assertArrayHasKey('MachineName', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceCode', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceName', $result['Items'][0]);
        $this->assertArrayHasKey('Level', $result['Items'][0]);
        $this->assertEquals(2, $result['Items'][0]['Level']);
        $this->assertEquals('email@email.com.br', $result['Items'][0]['LeadEmail']);
        $this->assertEquals($this->machineCode, $result['Items'][0]['MachineCode']);
        $this->assertEquals($this->sequenceCode, $result['Items'][0]['SequenceCode']);
    }

    /**
     * @group put-method
     */
    public function testMoveLeadBetweenEmailSequencesHardcoded()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->moveLeadBetweenEmailSequences(
            'email@email.com.br',
            $this->machineCode,
            816102,
            $this->sequenceCode,
            1
        );

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('LeadCode', $result['Items'][0]);
        $this->assertArrayHasKey('LeadEmail', $result['Items'][0]);
        $this->assertArrayHasKey('LeadName', $result['Items'][0]);
        $this->assertArrayHasKey('MachineCode', $result['Items'][0]);
        $this->assertArrayHasKey('MachineName', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceCode', $result['Items'][0]);
        $this->assertArrayHasKey('SequenceName', $result['Items'][0]);
        $this->assertArrayHasKey('Level', $result['Items'][0]);
        $this->assertEquals(1, $result['Items'][0]['Level']);
        $this->assertEquals('email@email.com.br', $result['Items'][0]['LeadEmail']);
        $this->assertEquals($this->machineCode, $result['Items'][0]['MachineCode']);
        $this->assertEquals(816102, $result['Items'][0]['SequenceCode']);
    }

    /**
     * @group delete-method
     */
    public function testRemoveLeadFromMachineHardcoded()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->removeLeadFromMachine('email@email.com.br', $this->machineCode);

        $this->assertEquals(200, $result['StatusCode']);
        $this->assertEquals('Solicitação de remoção de Lead enviada com sucesso.', $result['Message']);
    }

    /**
     * @group delete-method
     */
    public function testRemoveLeadFromSequenceHardcoded()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->removeLeadFromSequence(
            'email@email.com.br',
            $this->machineCode,
            $this->sequenceCode
        );

        $this->assertEquals(200, $result['StatusCode']);
        $this->assertEquals('Lead removido do funil com sucesso', $result['Message']);
    }

    /**
     * @group post-method
     */
    public function testAddScoreToLeadHardcoded()
    {
        $client = $this->getClientInstance();
        $lead = new Lead($client, $this->token);

        $result = $lead->addScoreToLead('email@email.com.br', 5, true);

        $this->assertEquals(200, $result['StatusCode']);
        $this->assertEquals('Sucesso ao inserir score ao lead.', $result['Message']);
    }
}