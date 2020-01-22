<?php

namespace Intec\LeadloversSdk;

class Lead extends Resource
{
    public function retrieveLeadByEmail(string $email)
    {
        $endpoint = '/webapi/Lead';
        $params = ['email' => $email];

        return $this->get($endpoint, $params);
    }

    public function retrieveLeadLocation(string $email)
    {
        $endpoint = '/webapi/LeadLocation';
        $params = ['email' => $email];

        return $this->get($endpoint, $params);
    }

    public function insertNewLead(
        string $email,
        int $machineCode,
        int $emailSequenceCode,
        int $sequenceLevelCode
    ) {
        $endpoint = '/webapi/Lead';
        $params = [
            'Email' => $email,
            'MachineCode' => $machineCode,
            'EmailSequenceCode' => $emailSequenceCode,
            'SequenceLevelCode' => $sequenceLevelCode
        ];

        return $this->post($endpoint, $params);
    }

    public function moveLeadInsideEmailSequence(
        string $email,
        int $machineCode,
        int $emailSequenceCode,
        int $sequenceLevelCode
    ) {
        $endpoint = '/webapi/LeadLocation';
        $params = [
            'Email' => $email,
            'MachineFrom' => $machineCode,
            'FunnelFrom' => $emailSequenceCode,
            'MachineTo' => $machineCode,
            'FunnelTo' => $emailSequenceCode,
            'Level' => $sequenceLevelCode
        ];

        return $this->put($endpoint, $params);
    }

    public function moveLeadBetweenEmailSequences(
        string $email,
        int $machineCode,
        int $emailSequenceCodeTo,
        int $emailSequenceCodeFrom,
        int $sequenceLevelCode
    ) {
        $endpoint = '/webapi/LeadLocation';
        $params = [
            'Email' => $email,
            'MachineFrom' => $machineCode,
            'FunnelFrom' => $emailSequenceCodeFrom,
            'MachineTo' => $machineCode,
            'FunnelTo' => $emailSequenceCodeTo,
            'Level' => $sequenceLevelCode
        ];

        return $this->put($endpoint, $params);
    }

    public function removeLeadFromMachine(string $email, int $machineCode)
    {
        $endpoint = '/webapi/Lead';
        $params = [
            'email' => $email,
            'machineCode' => $machineCode
        ];

        return $this->delete($endpoint, $params);
    }

    public function removeLeadFromSequence(
        string $email,
        int $machineCode,
        int $emailSequenceCode
    ) {
        $endpoint = '/webapi/Lead/Funnel';
        $params = [
            'email' => $email,
            'machineCode' => $machineCode,
            'sequenceCode' => $emailSequenceCode
        ];

        return $this->delete($endpoint, $params);
    }

    public function addScoreToLead(
        string $email,
        int $score,
        bool $overwrite
    ) {
        $endpoint = '/webapi/Score';
        $params = [
            'Email' => $email,
            'Score' => $score,
            'Overwrite' => $overwrite
        ];

        return $this->post($endpoint, $params);
    }
}