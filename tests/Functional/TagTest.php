<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Tag;
use Intec\LeadloversSdk\Test\TestCase;

class TagTest extends TestCase
{
    public function testRetrieveListOfLeadTags()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->retrieveListOfLeadTags($this->leadCode);

        $this->assertArrayHasKey('Tags', $result);
        $this->assertArrayHasKey('Id', $result['Tags'][0]);
        $this->assertArrayHasKey('Title', $result['Tags'][0]);
    }

    public function testCheckIfTagIsFromUserCaseFalse()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);
        $tagId = 123;

        $result = $tag->checkIfTagIsFromUser($tagId);

        $this->assertArrayHasKey('Result', $result);
        $this->assertFalse($result['Result']);
    }

    public function testCheckIfTagIsFromUserCaseTrue()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->checkIfTagIsFromUser($this->tagId);

        $this->assertArrayHasKey('Result', $result);
        $this->assertTrue($result['Result']);
    }

    public function testGetTagCollectionFromUser()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->getTagCollectionFromUser();

        $this->assertArrayHasKey('Tags', $result);
        $this->assertArrayHasKey('Id', $result['Tags'][0]);
        $this->assertArrayHasKey('Title', $result['Tags'][0]);
    }
}