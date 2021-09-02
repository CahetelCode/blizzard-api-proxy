<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\AuctionHouse;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AuctionHouseController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class AuctionHouseController extends Controller
{

    /**
     * Auction houses active for a connected realm
     *
     * @param  Request  $request
     * @param  int  $realmId
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function auctionHousesIndex(Request $request, int $realmId) : JsonResponse
    {
        /**
         * @var AuctionHouse $proxy
         */
        $proxy    = $this->getBlizzardProxy(AuctionHouse::class, $request);
        $response = $proxy->getAuctionHouses($realmId, $request->all());

        return $this->getResponse($response);
    }
}
