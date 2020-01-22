<?php

namespace Intec\LeadloversSdk;

class Email extends Resource
{
    public function retrieveEmailSequenceCollection(int $machineCode)
    {
        $endpoint = '/webapi/EmailSequences';
        $params = ['machineCode' => $machineCode];

        return $this->get($endpoint, $params);
    }

    public function retrieveLevelsFromEmailSequence(int $machineCode, int $sequenceCode)
    {
        $endpoint = '/webapi/Levels';
        $params = [
            'machineCode' => $machineCode,
            'sequenceCode' => $sequenceCode
        ];

        return $this->get($endpoint, $params);
    }
}