<?php

namespace Intec\LeadloversSdk;

class Machine extends Resource
{
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

    public function retrieveMachineInfoById(int $machineId)
    {
        $endpoint = '/webapi/Machines/' . $machineId;
        $params = [
            'token' => $this->token
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveMachineFormsCollection(int $machineCode)
    {
        $endpoint = '/webapi/Forms';
        $params = [
            'token' => $this->token,
            'machineCode' => $machineCode
        ];

        return $this->get($endpoint, $params);
    }

    public function retrieveMachinePagesCollection(int $machineCode)
    {
        $endpoint = '/webapi/Pages';
        $params = [
            'token' => $this->token,
            'machineCode' => $machineCode
        ];

        return $this->get($endpoint, $params);
    }
}