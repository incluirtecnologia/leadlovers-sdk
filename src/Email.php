<?php

namespace Intec\LeadloversSdk;

class Email extends Resource
{
    public function retrieveEmailSequenceCollection(int $machineCode)
    {
        $endpoint = '/webapi/EmailSequences';
        $params = [
            'token' => $this->token,
            'machineCode' => $machineCode
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveLevelsFromEmailSequence(int $machineCode, int $sequenceCode)
    {
        $endpoint = '/webapi/Levels';
        $params = [
            'token' => $this->token,
            'machineCode' => $machineCode,
            'sequenceCode' => $sequenceCode
        ];

        return $this->get($endpoint, $params);
    }
}