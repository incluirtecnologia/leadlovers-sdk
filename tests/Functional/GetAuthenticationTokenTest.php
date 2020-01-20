<?php

namespace Intec\LeadloversSdk\Test\Functional;

use Intec\LeadloversSdk\Leadlovers;
use Intec\LeadloversSdk\Test\TestCase;

class LeadloversTest extends TestCase
{
    public function testCanCreatInstance()
    {
        $leadlovers = $this->getLeadLoversSdkInstance();
        $this->assertInstanceOf(Leadlovers::class, $leadlovers);
    }
}