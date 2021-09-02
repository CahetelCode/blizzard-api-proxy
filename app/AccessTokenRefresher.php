<?php

namespace App;

use App\Api\AuthEnum;
use App\Api\Blizzard\BlizzardProxyBuilder;
use App\Api\Blizzard\Proxies\Auth;
use App\Api\Exceptions\ApiError;
use App\Models\AccessToken;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class AccessTokenRefresher
 *
 * @package App
 */
class AccessTokenRefresher
{

    /**
     * @var string
     */
    protected string $api;

    /**
     * @var string
     */
    protected string $region;


    /**
     * AccessTokenRefresher constructor.
     *
     * @param  string  $api
     * @param  string  $region
     */
    public function __construct(string $api = '', string $region = '')
    {
        $this->api    = $api;
        $this->region = $region;
    }

    /**
     * Refresh the token
     *
     * @throws ApiError|GuzzleException
     */
    public function refresh() : AccessToken
    {
        $model = new AccessToken();
        $type  = AuthEnum::${$this->api};

        /**
         * @var Auth $auth
         */
        $auth  = BlizzardProxyBuilder::getProxy(Auth::class, $this->region);
        $token = $auth->getAuthToken();
        $token = [
            'api'     => $type,
            'token'   => $token->access_token,
            'expires' => strtotime('now') + $token->expires_in,
            'region'  => $this->region,
        ];
        $model->fill($token);
        $model->save();

        return $model;
    }
}
