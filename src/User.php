<?php

namespace Intec\LeadloversSdk;

class User extends Resource
{
    public function retrieveUserAccountData()
    {
        $endpoint = '/webapi/ListDataAccount';

        return $this->get($endpoint);
    }

    public function getUserCode()
    {
        $endpoint = '/webapi/UserCode';

        return $this->get($endpoint);
    }

    public function getUserInformation()
    {
        $endpoint = '/webapi/User';

        return $this->get($endpoint);
    }
}