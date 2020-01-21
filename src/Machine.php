<?php

namespace Intec\LeadloversSdk;

use GuzzleHttp\Client;

class Machine extends Resource
{
    private $machineCode;

    public function __construct(Client $client, string $token, string $machineCode) {
        parent::__construct($client, $token);
        $this->machineCode = $machineCode;
    }

    public function retrieveMachinesFromAccount(int $page = 1, int $registers = 10)
    {
        $endpoint = '/webapi/Machines';
        $params = [
            'token' => $this->token,
            'page' => $page,
            'registers' => $registers
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveMachineInfoById()
    {
        $endpoint = '/webapi/Machines/' . $this->machineCode;
        $params = [
            'token' => $this->token
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveMachineFormsCollection()
    {
        $endpoint = '/webapi/Forms';
        $params = [
            'token' => $this->token,
            'machineCode' => $this->machineCode
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveMachinePagesCollection()
    {
        $endpoint = '/webapi/Pages';
        $params = [
            'token' => $this->token,
            'machineCode' => $this->machineCode
        ];

        return $this->get($endpoint, $params);
    }
}