<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class AccessToken
 *
 * @package App\Models
 */
class AccessToken extends Model
{

    /**
     * @var string
     */
    protected $table = 'access_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'api',
        'region',
        'token',
        'expires',
    ];


    /**
     * Get the total count of the access tokens
     *
     * @param  string  $api
     * @param  string  $region
     *
     * @return int
     */
    public function count(string $api = '', string $region = '') : int
    {
        $db     = $this->getDb()->select('*');
        $wheres = $this->getWhereConditions($api, $region);
        if (!empty($wheres)) {
            $db = $db->where($wheres);
        }

        return $db->count();
    }

    /**
     * @return Builder
     *
     * @codeCoverageIgnore
     */
    protected function getDb() : Builder
    {
        return app('db')->table($this->table);
    }

    /**
     * Build common WHERE conditions for the access token queries
     *
     * @param  string  $api
     * @param  string  $region
     *
     * @return array
     */
    protected function getWhereConditions(string $api, string $region) : array
    {
        $wheres = [];
        if (!empty($api)) {
            $wheres[] = ['api', '=', $api];
        }
        if (!empty($region)) {
            $wheres[] = ['region', '=', $region];
        }

        return $wheres;
    }

    /**
     * Get last available access token
     *
     * @param  string  $api
     * @param  string  $region
     *
     * @return AccessToken|null
     */
    public function getLast(string $api = '', string $region = '') : ?AccessToken
    {
        $db     = $this->getDb()->select('*');
        $wheres = $this->getWhereConditions($api, $region);
        if (!empty($wheres)) {
            $db = $db->where($wheres);
        }

        $count = $db->count();
        if ($count) {
            $queryResult = $this->getDb()->select('*');
            if (!empty($wheres)) {
                $queryResult = $queryResult->where($wheres);
            }
            $queryResult = $queryResult->skip($count - 1)->first();
            if (!empty($queryResult)) {
                $result = new self();
                $result->forceFill((array) $queryResult);
            }
        }

        return $result ?? null;
    }

    /**
     * Check if the current token is expired
     *
     * @return bool
     */
    public function isExpired() : bool
    {
        return strtotime('now') >= ($this->expires ?? 0);
    }

}
