<?php

namespace Intec\LeadloversSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

use function GuzzleHttp\json_decode;

abstract class Resource
{
    const PROD_ENDPOINT = 'http://llapi.leadlovers.com';
    const ACCESS_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IldlYkFwaSIsInN1YiI6IldlYkFwaSIsInJvbGUiOlsicmVhZCIsIndyaXRlIl0sImlzcyI6Imh0dHA6Ly93ZWJhcGlsbC5henVyZXdlYnNpdGVzLm5ldCIsImF1ZCI6IjFhOTE4YzA3NmE1YjQwN2Q5MmJkMjQ0YTUyYjZmYjc0IiwiZXhwIjoxNjA1NDQxMzM4LCJuYmYiOjE0NzU4NDEzMzh9.YIIpOycEAVr_xrJPLlEgZ4628pLt8hvWTCtjqPTaWMs';

    private $client;
    protected $token;

    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    protected function delete(string $uri, array $queryParams)
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
                ],
                'query' => array_merge($queryParams, ['token' => $this->token])
            ];

            $response = $this->client->delete($uri, $options);

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (ClientException $e) {
            return $this->handleClientException($e);
        }
    }

    protected function post(string $uri, array $bodyParams, array $queryParams = [])
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
                ],
                'query' => array_merge($queryParams, ['token' => $this->token]),
                'json' => $bodyParams
            ];

            $response = $this->client->post($uri, $options);

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (ClientException $e) {
            return $this->handleClientException($e);
        }
    }

    protected function put(string $uri, array $bodyParams, array $queryParams = [])
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
                ],
                'query' => array_merge($queryParams, ['token' => $this->token]),
                'json' => $bodyParams
            ];

            $response = $this->client->put($uri, $options);

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (ClientException $e) {
            return $this->handleClientException($e);
        }
    }

    protected function get(string $uri, array $queryParams = [])
    {
        try {
            $options = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::ACCESS_TOKEN
                ],
                'query' => array_merge($queryParams, ['token' => $this->token])
            ];

            $response = $this->client->get($uri, $options);

            return json_decode($response->getBody()->getContents(), true);

        } catch (ClientException $e) {
            return $this->handleClientException($e);
        }
    }

    private function handleClientException(ClientException $e)
    {
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 400 && $statusCode < 500) {
            return json_decode($response->getBody()->getContents(), true);
        }
    }
}