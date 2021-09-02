<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Spells;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class SpellsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class SpellsController extends Controller
{

    /**
     * Spell show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function spellShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Spells $proxy
         */
        $proxy    = $this->getBlizzardProxy(Spells::class, $request);
        $response = $proxy->getSpell($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Spell media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function spellMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Spells $proxy
         */
        $proxy    = $this->getBlizzardProxy(Spells::class, $request);
        $response = $proxy->getSpellMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Spells search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function spellsSearch(Request $request) : JsonResponse
    {
        $locale        = $request->get('locale');
        $instanceParam = 'name.'.$locale;
        $request->merge([$instanceParam => $request->get('name')]);

        /**
         * @var Spells $proxy
         */
        $proxy    = $this->getBlizzardProxy(Spells::class, $request);
        $response = $proxy->getSpells($request->all());

        return $this->getResponse($response);
    }

}
