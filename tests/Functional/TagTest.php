<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Tag;
use Intec\LeadloversSdk\Test\TestCase;

class TagTest extends TestCase
{
    /**
     * @group get-method
     */
    public function testRetrieveListOfLeadTags()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->retrieveListOfLeadTags($this->leadCode);

        $this->assertArrayHasKey('Tags', $result);
        $this->assertArrayHasKey('Id', $result['Tags'][0]);
        $this->assertArrayHasKey('Title', $result['Tags'][0]);
    }

    /**
     * @group get-method
     */
    public function testCheckIfTagIsFromUserCaseFalse()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);
        $tagId = 123;

        $result = $tag->checkIfTagIsFromUser($tagId);

        $this->assertArrayHasKey('Result', $result);
        $this->assertFalse($result['Result']);
    }

    /**
     * @group get-method
     */
    public function testCheckIfTagIsFromUserCaseTrue()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->checkIfTagIsFromUser($this->tagId);

        $this->assertArrayHasKey('Result', $result);
        $this->assertTrue($result['Result']);
    }

    /**
     * @group get-method
     */
    public function testGetTagCollectionFromUser()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->getTagCollectionFromUser();

        $this->assertArrayHasKey('Tags', $result);
        $this->assertArrayHasKey('Id', $result['Tags'][0]);
        $this->assertArrayHasKey('Title', $result['Tags'][0]);
    }

    /**
     * @group post-method
     */
    public function testAddTagToLeadHardcoded()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->addTagToLead(
            'email@email.com.br',
            168271,
            0
        );

        $this->assertEquals(200, $result['StatusCode']);
        $this->assertEquals('Sucesso ao inserir tag', $result['Message']);
    }

    /**
     * @group delete-method
     */
    public function testDeleteTagFromLeadHardcoded()
    {
        $client = $this->getClientInstance();
        $tag = new Tag($client, $this->token);

        $result = $tag->deleteTagFromLead(
            'email@email.com.br',
            168271
        );

        $this->assertIsArray($result);
        $this->assertEquals(200, $result['StatusCode']);
        $this->assertEquals('Tag removida com sucesso', $result['Message']);
    }
}