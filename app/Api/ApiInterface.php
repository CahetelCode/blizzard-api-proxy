<?php

namespace App\Api;

use App\Api\Exceptions\ApiError;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Interface ApiInterface
 *
 * @package App\Api
 */
interface ApiInterface
{

    /**
     * Set a Guzzle client
     *
     * @param  Client  $client
     *
     * @return ApiInterface
     */
    public function setClient(Client $client) : ApiInterface;

    /**
     * Perform a GET rquest
     *
     * @param  string  $uri
     * @param  array  $parameters
     * @param  array  $headers
     *
     * @return mixed
     *
     * @throws ApiError|GuzzleException
     */
    public function get(string $uri, array $parameters = [], array $headers = []) : mixed;

    /**
     * Perform a POST request
     *
     * @param  string  $uri
     * @param  array  $parameters
     * @param  array  $body
     * @param  array  $headers
     *
     * @return mixed
     *
     * @throws ApiError|GuzzleException
     */
    public function post(string $uri, array $parameters = [], array $body = [], array $headers = []) : mixed;

    /**
     * Generic call
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $query
     * @param  array  $body
     * @param  array  $headers
     *
     * @return mixed
     *
     * @throws ApiError|GuzzleException
     */
    public function call(string $method, string $uri, array $query = [], array $body = [], array $headers = []) : mixed;

}
