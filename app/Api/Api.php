<?php

namespace App\Api;

use App\Api\Exceptions\ApiError;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use stdClass;

/**
 * Class Api
 *
 * @package App\Api
 */
class Api implements ApiInterface
{

    /**
     * @var Client
     */
    protected Client $client;


    /**
     * Api constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->setClient($client);
    }

    /**
     * @inheritDoc
     */
    public function setClient(Client $client) : ApiInterface
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function get(string $uri, array $parameters = [], array $headers = []) : mixed
    {
        return $this->call('GET', $uri, $parameters, $headers);
    }

    /**
     * @inheritDoc
     */
    public function call(string $method, string $uri, array $query = [], array $body = [], array $headers = []) : mixed
    {
        $requestOptions = $this->getRequestOptions($query, $body, $headers);
        try {
            $response = $this->client->request(strtoupper($method), $uri, $requestOptions);
            $body     = $response->getBody()->getContents();
            $result   = json_decode($body);
        } catch (ClientException $e) {
            $code = $e->getCode();
            if (500 <= $code) {
                throw new ApiError($code, $e->getMessage());
            }

            $result = new stdClass();
        }

        return $result ?? new stdClass();
    }

    /**
     * Prepare the call-specific options
     *
     * @param  array  $query
     * @param  array  $body
     * @param  array  $headers
     *
     * @return array
     */
    protected function getRequestOptions(array $query, array $body, array $headers) : array
    {
        $requestOptions = [];
        if (!empty($query)) {
            $requestOptions['query'] = $query;
        }
        if (!empty($body)) {
            $requestOptions['body'] = $body;
        }
        if (!empty($headers)) {
            $requestOptions['headers'] = $headers;
        }

        return $requestOptions;
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function post(string $uri, array $parameters = [], array $body = [], array $headers = []) : mixed
    {
        return $this->call('POST', $uri, $parameters, $headers);
    }


}
