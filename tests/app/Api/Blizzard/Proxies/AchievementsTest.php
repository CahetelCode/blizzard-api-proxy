<?php

class AchievementsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Achievements::class;

        $this->runProxyTest($proxy, 'getAchievementsCategories', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAchievementsCategory', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAchievements', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAchievement', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAchievementMedia', [1, ['locale' => 'it_IT']]);
    }

}
