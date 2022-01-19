<?php
declare(strict_types = 1);
namespace src\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Request
{
    protected Client $httpClient;

    public function __construct(array $headers)
    {
        $this->httpClient = new Client([
           'headers' => $headers
        ]);
    }

    public function makeRequest(string $endpoint, array $data, string $method = 'POST')
    {
        try {
            $response = $this->httpClient->request(
                $method,
                $endpoint,
                [
                    RequestOptions::JSON => $data
                ]
            );
            return json_decode($response->getBody()->getContents());
        }catch (\Exception $exception) {
            return ['ERROR' ,$exception->getMessage()];
        }
    }
}

