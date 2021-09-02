<?php

namespace App;

/**
 * Class UrlHash
 *
 * @package App
 */
class UrlHash
{

    /**
     * @var string
     */
    protected string $url;


    /**
     * UrlHash constructor.
     *
     * @param  string  $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Create from env
     *
     * @return static
     */
    public static function init() : self
    {
        return new self(request()->fullUrl());
    }

    /**
     * Get the md5 of the provided URL
     *
     * @return string
     */
    public function getMd5() : string
    {
        $baseUrl = parse_url($this->url, PHP_URL_HOST);
        $path    = parse_url($this->url, PHP_URL_PATH);
        parse_str(parse_url($this->url, PHP_URL_QUERY), $query);
        ksort($query);
        $url   = trim(sprintf('%s%s', $baseUrl, $path), '/').'/';
        $query = http_build_query($query);
        if (!empty($query)) {
            $url = sprintf('%s?%s', $url, $query);
        }

        return md5($url);
    }

}
