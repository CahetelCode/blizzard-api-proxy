<?php

namespace App\Console\Commands;

use App\AccessTokenRefresher;
use App\Api\AuthEnum;
use App\Api\Blizzard\Locale;
use App\Api\Exceptions\ApiError;
use App\Models\AccessToken;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

/**
 * Class RefreshBlizzardAccessToken
 *
 * @package App\Console\Commands
 */
class RefreshBlizzardAccessToken extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'refresh blizzard access token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Blizzard\'s access token';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:refresh
        {combo : the api and region, separated by columns (e.g. blizzard:eu). Use "all" as region to refresh all the available regions}
        {threshold=7200 : the threshold before expiration}
        {--f|force : force the operation}';


    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws ApiError|GuzzleException
     */
    public function handle()
    {
        $arguments = $this->arguments();
        $options   = $this->options();
        if (!is_numeric($arguments['threshold'])) {
            $this->error('The threshold, if specified, must be a number and it will be casted to an integer.');

            return;
        }

        $threshold = (int) $arguments['threshold'];
        $combo     = explode(':', $arguments['combo']);
        $api       = $this->getApi($combo);
        if ('blizzard' !== $api) {
            $this->error('At this stage only Blizzard API are supported.');

            return;
        }

        $regions = $this->getRegions($combo);
        if (empty($regions)) {
            $this->error('Invalid region.');

            return;
        }

        $now = strtotime('now');
        foreach ($regions as $region) {
            $this->line(sprintf('Checking %s token', $region));
            $model = new AccessToken();
            $last  = $model->getLast($api, $region);
            if (empty($last) || $last->isExpired() || ($last->expires - $now) < $threshold || $options['force']) {
                (new AccessTokenRefresher($api, $region))->refresh();
                $this->line(sprintf('Updated %s token for %s', $api, $region));
            } else {
                $this->line(sprintf('%s token for %s: nothing to do', $api, $region));
            }
        }
    }

    /**
     * Get provider key
     *
     * @param  array  $combo
     *
     * @return string
     */
    protected function getApi(array $combo) : string
    {
        return AuthEnum::${$combo[0]} ?? '';
    }

    /**
     * Get the regions we need to update
     *
     * @param  array  $combo
     *
     * @return array
     */
    protected function getRegions(array $combo) : array
    {
        $available = array_map('strtolower', Locale::getValidRegions());
        if ('all' === strtolower($combo[1])) {
            $regions = $available;
        } else {
            $regions = [strtolower($combo[1])];
        }

        return array_values(array_intersect($available, $regions));
    }

}
