<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Token;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class TokensController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class TokensController extends Controller
{

    /**
     * Journal Encounter Search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function getTokenPrice(Request $request) : JsonResponse
    {
        /**
         * @var Token $proxy
         */
        $proxy    = $this->getBlizzardProxy(Token::class, $request);
        $response = $proxy->getTokens($request->all());

        return $this->getResponse($response);
    }

}
