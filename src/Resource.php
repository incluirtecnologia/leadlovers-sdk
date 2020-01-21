<?php

namespace Intec\LeadloversSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

use function GuzzleHttp\json_decode;

abstract class Resource
{
    const PROD_ENDPOINT = 'http://llapi.leadlovers.com';
    const ACCESS_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IldlYkFwaSIsInN1YiI6IldlYkFwaSIsInJvbGUiOlsicmVhZCIsIndyaXRlIl0sImlzcyI6Imh0dHA6Ly93ZWJhcGlsbC5henVyZXdlYnNpdGVzLm5ldCIsImF1ZCI6IjFhOTE4YzA3NmE1YjQwN2Q5MmJkMjQ0YTUyYjZmYjc0IiwiZXhwIjoxNjA1NDQxMzM4LCJuYmYiOjE0NzU4NDEzMzh9.YIIpOycEAVr_xrJPLlEgZ4628pLt8hvWTCtjqPTaWMs';

    const GET = 'GET';
    const POST = 'POST';

    private $client;
    protected $token;

    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    protected function post(string $uri, array $params)
    {
        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
            ],
            'json' => json_encode($params)
        ];

        $response = $this->client->post($uri, $options);

        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        }
    }

    protected function get(string $uri, array $params)
    {
        try {
            $queryParams = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
                ],
                'query' => $params
            ];

            $response = $this->client->get($uri, $queryParams);

            return json_decode($response->getBody()->getContents(), true);

        } catch (ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 400 && $statusCode < 500) {
                return json_decode($response->getBody()->getContents(), true);
            }
        }

    }
}