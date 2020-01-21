<?php

namespace Intec\LeadloversSdk;

class Tag extends Resource
{
    public function retrieveListOfLeadTags(int $leadCode)
    {
        $endpoint = '/webapi/Tag/Lead';
        $params = [
            'token' => $this->token,
            'leadCode' => $leadCode
        ];

        return $this->get($endpoint, $params);
    }

    public function checkIfTagIsFromUser(int $tagId)
    {
        $endpoint = '/webapi/TagChecker';
        $params = [
            'token' => $this->token,
            'tag' => $tagId
        ];

        return $this->get($endpoint, $params);
    }

    public function getTagCollectionFromUser()
    {
        $endpoint = '/webapi/Tags';
        $params = [
            'token' => $this->token
        ];

        return $this->get($endpoint, $params);
    }
}