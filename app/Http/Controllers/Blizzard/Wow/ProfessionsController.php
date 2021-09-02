<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Professions;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ProfessionsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class ProfessionsController extends Controller
{

    /**
     * Professions index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function professionsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Professions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Professions::class, $request);
        $response = $proxy->getProfessions($request->all());

        return $this->getResponse($response);
    }

    /**
     * Profession show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function professionShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Professions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Professions::class, $request);
        $response = $proxy->getProfession($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Profession media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function professionMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Professions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Professions::class, $request);
        $response = $proxy->getProfessionMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Profession skill tier show
     *
     * @param  Request  $request
     * @param  int  $id
     * @param  int  $tier
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function professionSkillTierShow(Request $request, int $id, int $tier) : JsonResponse
    {
        /**
         * @var Professions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Professions::class, $request);
        $response = $proxy->getProfessionSkillTier($id, $tier, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Recipe show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function recipeShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Professions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Professions::class, $request);
        $response = $proxy->getRecipe($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Recipe media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function recipeMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Professions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Professions::class, $request);
        $response = $proxy->getRecipeMedia($id, $request->all());

        return $this->getResponse($response);
    }

}
