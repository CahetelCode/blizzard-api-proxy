<?php

namespace App;

/**
 * Class Auth
 *
 * @package App
 */
class Auth
{

    /**
     * @var string
     */
    private static string $enableAuthEnvKey = 'ENABLE_AUTH';

    /**
     * @var string
     */
    private static string $authTokenEnvKey = 'AUTH_TOKEN';

    /**
     * @var string
     */
    protected string $token;


    /**
     * Auth constructor.
     *
     * @param  string  $token
     */
    public function __construct(string $token = '')
    {
        $this->token = $token;
    }

    /**
     * @return bool
     */
    public function authenticate() : bool
    {
        $result = true;
        if ($this->canAuthenticate()) {
            $result = $this->getEnv(self::$authTokenEnvKey, '') === $this->token;
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function canAuthenticate() : bool
    {
        return $this->shouldAuthenticate() && !empty($this->token);
    }

    /**
     * @return bool
     */
    public function shouldAuthenticate() : bool
    {
        return boolval($this->getEnv(self::$enableAuthEnvKey, false));
    }

    /**
     * @param  string  $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    protected function getEnv(string $key, mixed $default) : mixed
    {
        $fallback = $_ENV[$key] ?: $default;

        return function_exists('env') ? env($key, $default) : $fallback;
    }

}
