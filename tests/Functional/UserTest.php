<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\User;
use Intec\LeadloversSdk\Test\TestCase;

class UserTest extends TestCase
{
    public function testRetrieveUserAccountData()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $user = new User($client, $token);

        $result = $user->retrieveUserAccountData();

        $this->assertArrayHasKey('Items', $result);
        $this->assertArrayHasKey('Order', $result['Items'][0]);
        $this->assertArrayHasKey('UserCode', $result['Items'][0]);
        $this->assertArrayHasKey('PlanLeads', $result['Items'][0]);
        $this->assertArrayHasKey('ActiveLeads', $result['Items'][0]);
        $this->assertArrayHasKey('PlanName', $result['Items'][0]);
        $this->assertArrayHasKey('Leads', $result['Items'][0]);
        $this->assertArrayHasKey('Purchase', $result['Items'][0]);
        $this->assertArrayHasKey('Expiration', $result['Items'][0]);
        $this->assertArrayHasKey('PointerPlanOrBonus', $result['Items'][0]);
        $this->assertArrayHasKey('RegisterType', $result['Items'][0]);
    }

    public function testGetUserCode()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $user = new User($client, $token);

        $result = $user->getUserCode();

        $this->assertArrayHasKey('Value', $result);
    }

    public function testGetUserInformation()
    {
        $client = $this->getClientInstance();
        $token = getenv('TOKEN');
        $user = new User($client, $token);

        $result = $user->getUserInformation();

        $this->assertArrayHasKey('UserCode', $result);
        $this->assertArrayHasKey('UserName', $result);
        $this->assertArrayHasKey('UserEmail', $result);
        $this->assertArrayHasKey('UserAccessEmail', $result);
        $this->assertArrayHasKey('UserPhoto', $result);
    }
}