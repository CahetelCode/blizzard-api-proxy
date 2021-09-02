<?php

namespace App\Api\Blizzard;

/**
 * Class NamespaceHeaderValidator
 *
 * @package App\Api\Blizzard
 */
class NamespaceHeaderValidator
{

    /**
     * @var string
     */
    protected string $header;


    /**
     * NamespaceHeaderValidator constructor.
     *
     * @param  string  $header
     */
    public function __construct(string $header)
    {
        $this->header = $header;
    }

    /**
     * @return bool
     */
    public function isValid() : bool
    {
        return (!$this->isEmpty()) &&
               ($this->isDynamic() || $this->isStatic()) &&
               $this->hasValidLocale();
    }

    /**
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->header);
    }

    /**
     * @return bool
     */
    public function isDynamic() : bool
    {
        $exploded = explode('-', $this->header);

        return 'dynamic' === $exploded[0];
    }

    /**
     * @return bool
     */
    public function isStatic() : bool
    {
        $exploded = explode('-', $this->header);

        return 'static' === $exploded[0];
    }

    /**
     * @return bool
     */
    public function hasValidLocale() : bool
    {
        if (!str_contains($this->header, '-')) {
            return false;
        }

        $locales = array_map('strtolower', Locale::getValidRegions());
        // Battlenet namespace is insconsistent in asia, so "cn" is a valid locale apparently
        $locales[] = 'cn';
        $exploded  = explode('-', $this->header);

        return in_array($exploded[1], $locales);
    }

    /**
     * @return string
     */
    public function getMode() : string
    {
        return explode('-', $this->header)[0];
    }

    /**
     * @return string
     */
    public function getLocale() : string
    {
        return explode('-', $this->header)[1];
    }

}
