<?php

namespace App\Api;

use App\Models\AccessToken;

/**
 * Interface ProxyBuilderInterface
 *
 * @package App\Api
 */
interface ProxyBuilderInterface
{

    /**
     * Build the proxy given a namespace
     *
     * @param  string  $ns
     * @param  string  $region
     * @param  ?AccessToken  $token
     * @param  ?string  $namespace
     *
     * @return ProxyInterface
     */
    public static function getProxy(string $ns, string $region, AccessToken $token = null, string $namespace = null) : ProxyInterface;

}
