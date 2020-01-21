<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Lead;
use Intec\LeadloversSdk\Tag;
use Intec\LeadloversSdk\Test\TestCase;

class TagTest extends TestCase
{
    public function testRetrieveListOfLeadTags()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $tag = new Tag($client, $token);
        $lead = new Lead($client, $token);
        $leadCode = $lead->retrieveLeadByEmail('teste@teste.com.br')['Code'];

        $result = $tag->retrieveListOfLeadTags($leadCode);

        $this->assertArrayHasKey('Tags', $result);
        $this->assertArrayHasKey('Id', $result['Tags'][0]);
        $this->assertArrayHasKey('Title', $result['Tags'][0]);
    }

    public function testCheckIfTagIsFromUserCaseFalse()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $tag = new Tag($client, $token);
        $tagId = 123;

        $result = $tag->checkIfTagIsFromUser($tagId);

        $this->assertArrayHasKey('Result', $result);
        $this->assertFalse($result['Result']);
    }

    public function testCheckIfTagIsFromUserCaseTrue()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $tag = new Tag($client, $token);
        $lead = new Lead($client, $token);
        $leadCode = $lead->retrieveLeadByEmail('teste@teste.com.br')['Code'];
        $tagId = $tag->retrieveListOfLeadTags($leadCode)['Tags'][0]['Id'];

        $result = $tag->checkIfTagIsFromUser($tagId);

        $this->assertArrayHasKey('Result', $result);
        $this->assertTrue($result['Result']);
    }

    public function testGetTagCollectionFromUser()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $tag = new Tag($client, $token);

        $result = $tag->getTagCollectionFromUser();

        $this->assertArrayHasKey('Tags', $result);
        $this->assertArrayHasKey('Id', $result['Tags'][0]);
        $this->assertArrayHasKey('Title', $result['Tags'][0]);
    }
}