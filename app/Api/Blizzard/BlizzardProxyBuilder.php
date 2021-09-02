<?php

namespace App\Api\Blizzard;

use App\Api\Api;
use App\Api\Blizzard\Proxies\Auth;
use App\Api\ProxyBuilderInterface;
use App\Api\ProxyInterface;
use App\Models\AccessToken;
use Exception;
use GuzzleHttp\Client;

/**
 * Class BlizzardProxyBuilder
 *
 * Please note that this class is for "internal use only" so it does some magic which could cause an exception.
 * Said kind of exceptions are not handled and thrown immediately. Do your unit tests.
 *
 * @package App\Api\Blizzard
 */
class BlizzardProxyBuilder implements ProxyBuilderInterface
{

    /**
     * @inheritDoc
     * @throws Exception
     */
    public static function getProxy(string $ns, string $region, AccessToken $token = null, string $namespace = null) : ProxyInterface
    {
        $obj    = new self();
        $locale = new Locale($region);

        return Auth::class === $ns ? $obj->getAuthProxy($locale) : $obj->getNamespacedProxy($ns, $locale, $token, $namespace);
    }

    /**
     * Build the Auth proxy
     *
     * @param  Locale  $locale
     *
     * @return Auth
     */
    protected function getAuthProxy(Locale $locale) : Auth
    {
        $options = [
            'base_uri'    => $locale->getAuthApiBaseUrl(),
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'client_id'     => env('BLIZZARD_CLIENT_ID'),
                'client_secret' => env('BLIZZARD_CLIENT_SECRET'),
            ],
            'headers'     => ['Content-Type' => 'multipart/form-data'],
        ];
        $client  = new Client($options);
        $api     = new Api($client);

        return new Auth($api);
    }

    /**
     * Build any other proxy
     *
     * @param  string  $ns
     * @param  Locale  $locale
     * @param  AccessToken  $token
     * @param  string  $namespace
     *
     * @return ProxyInterface
     *
     * @throws Exception
     */
    protected function getNamespacedProxy(string $ns, Locale $locale, AccessToken $token, string $namespace) : ProxyInterface
    {
        $options = [
            'base_uri' => $locale->getApiBaseUrl(),
            'headers'  => [
                'Authorization'       => sprintf('Bearer %s', $token->token),
                'Battlenet-Namespace' => $namespace,
            ],
        ];
        $client  = new Client($options);
        $api     = new Api($client);

        return new $ns($api);
    }

}
