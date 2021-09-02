<?php

namespace App\Api\Blizzard;

use App\Api\ApiInterface;
use App\Api\ProxyInterface;

/**
 * Class AbstractBlizzardProxy
 *
 * @package App\Api\Blizzard
 */
class AbstractBlizzardProxy implements ProxyInterface
{

    /**
     * @var ApiInterface
     */
    protected ApiInterface $api;

    /**
     * @var Locale
     */
    protected Locale $locale;


    /**
     * AbstractBlizzardProxy constructor.
     *
     * @param  ApiInterface  $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    /**
     * Allow to set a Locale instance if the proxy requires it
     *
     * @param  Locale  $locale
     *
     * @return $this
     *
     * @codeCoverageIgnore
     */
    public function setLocale(Locale $locale) : self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Throw away unwanted parameters
     *
     * @param  array  $params
     * @param  array  $accepted
     *
     * @return array
     */
    protected function filterParams(array $params, array $accepted = ['locale']) : array
    {
        $accepted = array_flip($accepted);

        return array_intersect_key($params, $accepted);
    }

}
