<?php

namespace Intec\LeadloversSdk;

class Lead extends Resource
{
    public function retrieveLeadByEmail(string $email)
    {
        $endpoint = '/webapi/Lead';
        $params = [
            'token' => $this->token,
            'email' => $email
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveLeadLocation(string $email)
    {
        $endpoint = '/webapi/LeadLocation';
        $params = [
            'token' => $this->token,
            'email' => $email
        ];

        return $this->get($endpoint, $params);
    }
}