<?php

namespace App\Api\Blizzard;

/**
 * Class Locale
 *
 * @note: There is also the taiwan zone, but it's not authenticating so I'll remove it since it's probably part of the China zone now.
 * Check news about the APAC zone if needed.
 *
 * @package App\Api\Blizzard
 */
class Locale
{

    /**
     * @var string
     */
    protected string $region;


    /**
     * Locale constructor.
     *
     * @param  string  $region
     */
    public function __construct(string $region)
    {
        $this->region = strtoupper($region);
    }

    /**
     * Region getter
     *
     * @return string
     */
    public function getRegion() : string
    {
        return $this->region;
    }

    /**
     * Get the API base URL for the current region
     *
     * @return string
     */
    public function getApiBaseUrl() : string
    {
        return self::getAllAvailableApiUrls()[$this->region] ?? '';
    }

    /**
     * Get all the possible API base urls
     *
     * @param  bool  $flatten
     *
     * @return array
     */
    public static function getAllAvailableApiUrls(bool $flatten = false) : array
    {
        $map     = [];
        $regions = self::getValidRegions();
        foreach ($regions as $region) {
            $map[$region] = 'CH' === $region ? 'https://gateway.battlenet.com.cn/' : sprintf('https://%s.api.blizzard.com/', strtolower($region));
        }

        return $map;
    }

    /**
     * Get the known regions
     *
     * @return array
     */
    public static function getValidRegions() : array
    {
        return array_keys(self::getAllAvailableLocales());
    }

    /**
     * Get a list of regions with the relative locales
     *
     * @param  bool  $flatten
     *
     * @return string[][]
     */
    public static function getAllAvailableLocales(bool $flatten = false) : array
    {
        $map = [
            'US' => [
                'en_US',
                'es_MX',
                'pt_BR',
            ],
            'EU' => [
                'en_GB',
                'es_ES',
                'fr_FR',
                'ru_RU',
                'de_DE',
                'pt_PT',
                'it_IT',
            ],
            'KR' => [
                'ko_KR',
            ],
            'CH' => [
                'zh_CN',
            ],
        ];

        return $flatten ? array_merge(...array_values($map)) : $map;
    }

    /**
     * Get the auth API base URL for the current region
     *
     * @return string
     */
    public function getAuthApiBaseUrl() : string
    {
        return self::getAllAvailableAuthUrls()[$this->region] ?? '';
    }

    /**
     * Get all the possible auth API base urls
     *
     * @param  bool  $flatten
     *
     * @return array
     */
    public static function getAllAvailableAuthUrls(bool $flatten = false) : array
    {
        $map     = [];
        $regions = self::getValidRegions();
        foreach ($regions as $region) {
            $map[$region] = 'CH' === $region ? 'https://www.battlenet.com.cn/' : sprintf('https://%s.battle.net/', strtolower($region));
        }

        return $map;
    }

    /**
     * Check if a locale is valid for the current region
     *
     * @param  string  $locale
     *
     * @return bool
     */
    public function isValidLocale(string $locale)
    {
        return in_array($locale, $this->getLocales());
    }

    /**
     * Get all the known locales
     *
     * @return string[]
     */
    public function getLocales() : array
    {
        return self::getAllAvailableLocales()[$this->region] ?? [];
    }

}
