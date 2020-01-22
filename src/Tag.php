<?php

namespace Intec\LeadloversSdk;

class Tag extends Resource
{
    public function retrieveListOfLeadTags(int $leadCode)
    {
        $endpoint = '/webapi/Tag/Lead';
        $params = ['leadCode' => $leadCode];

        return $this->get($endpoint, $params);
    }

    public function checkIfTagIsFromUser(int $tagId)
    {
        $endpoint = '/webapi/TagChecker';
        $params = ['tag' => $tagId];

        return $this->get($endpoint, $params);
    }

    public function getTagCollectionFromUser()
    {
        $endpoint = '/webapi/Tags';

        return $this->get($endpoint);
    }

    public function addTagToLead(string $leadEmail, int $tagId, int $leadScore)
    {
        $endpoint = '/webapi/Tag';
        $params = [
            'Email' => $leadEmail,
            'Tag' => $tagId,
            'Score' => $leadScore
        ];

        return $this->post($endpoint, $params);
    }

    public function deleteTagFromLead(string $leadEmail, int $tagId)
    {
        $endpoint = '/webapi/Tag';
        $params = [
            'Email' => $leadEmail,
            'Tag' => $tagId
        ];

        return $this->delete($endpoint, $params);
    }
}