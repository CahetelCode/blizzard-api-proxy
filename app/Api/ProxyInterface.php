<?php

namespace App\Api;

/**
 * Interface ProxyInterface
 *
 * @package App\Api
 */
interface ProxyInterface
{

    /**
     * ProxyInterface constructor.
     *
     * @param  ApiInterface  $api
     */
    public function __construct(ApiInterface $api);

}
