<?php

namespace Intec\LeadloversSdk;

class User extends Resource
{
    public function retrieveUserAccountData()
    {
        $endpoint = '/webapi/ListDataAccount';
        $params = [
            'token' => $this->token
        ];

        return $this->get($endpoint, $params);
    }

    public function getUserCode()
    {
        $endpoint = '/webapi/UserCode';
        $params = [
            'token' => $this->token
        ];

        return $this->get($endpoint, $params);
    }

    public function getUserInformation()
    {
        $endpoint = '/webapi/User';
        $params = [
            'token' => $this->token
        ];

        return $this->get($endpoint, $params);
    }
}