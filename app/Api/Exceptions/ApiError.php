<?php

namespace App\Api\Exceptions;

use Exception;
use Throwable;

/**
 * Class ApiError
 *
 * @package App\Api\Exceptions
 */
class ApiError extends Exception
{

    /**
     * ApiError constructor.
     *
     * @param  int  $errorCode
     * @param  null  $content
     * @param  string  $message
     * @param  int?  $code
     * @param  Throwable|null  $previous
     */
    public function __construct(int $errorCode, $content = null, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = sprintf('An external API returned an error. Code: %s. Message: %s, URI: %s', $errorCode, $content ?? '(empty)', request()->getUri());
        parent::__construct($message, $code, $previous);
    }

}
