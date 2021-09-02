<?php

namespace App\Cache;

use Exception;
use Predis\Client;

/**
 * Class Cache
 *
 * @package App\Cache
 */
class Cache
{

    /**
     * @var Client
     */
    protected Client $cache;


    /**
     * Cache constructor.
     *
     * @param  Client  $cache
     */
    public function __construct(Client $cache)
    {
        $this->cache = $cache;
    }


    /**
     * Static init
     *
     * @return static
     */
    public static function init() : self
    {
        $options = [
            'host'     => env('REDIS_HOST'),
            'port'     => env('REDIS_PORT'),
            'database' => env('REDIS_DATABASE'),
        ];
        $client  = new Client($options);

        return new self($client);
    }

    /**
     * Check for eventual connection issues
     *
     * @return bool
     */
    public function isAvailable() : bool
    {
        $result = true;
        try {
            $this->cache->ping();
        } catch (Exception $e) {
            $result = false;
        }

        return $result;
    }

    /**
     * Set a key in store
     *
     * @param  string  $key
     * @param  string  $value
     *
     * @return $this
     */
    public function set(string $key, string $value, int $expiration) : self
    {
        $this->cache->set($key, $value);
        $this->cache->expire($key, $expiration);

        return $this;
    }

    /**
     * Get a key from the store
     *
     * @param  string  $key
     * @param  mixed|null  $default
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = false) : mixed
    {
        if ($this->has($key)) {
            $result = $this->cache->get($key);
        }

        return $result ?? $default;
    }

    /**
     * Check if a key lookup provides results
     *
     * @param  string  $key
     *
     * @return bool
     */
    public function has(string $key) : bool
    {
        return !empty($this->cache->keys($key));
    }

    /**
     * Get all the results for a key lookup
     *
     * @param  string  $key
     *
     * @return array
     */
    public function getAll(string $key) : array
    {
        $result = [];
        $keys   = $this->cache->keys($key);
        foreach ($keys as $key) {
            $result[] = $this->cache->get($key);
        }

        return $result;
    }

    /**
     * Delete a key match
     *
     * @param  string  $key
     *
     * @return $this
     */
    public function delete(string $key) : self
    {
        $this->cache->del($key);

        return $this;
    }

    /**
     * Get the TTL of a key
     *
     * @param  string  $key
     *
     * @return int
     */
    public function ttl(string $key) : int
    {
        return $this->cache->ttl($key);
    }

}
