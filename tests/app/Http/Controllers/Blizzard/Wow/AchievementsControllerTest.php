<?php

class AchievementsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Achievements::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\AchievementsController::class;

        $this->doBaseUsageTest($proxy, 'getAchievementsCategories', $controller, 'achievementsCategoriesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getAchievementsCategory', $controller, 'achievementsCategory', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getAchievements', $controller, 'achievementsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getAchievement', $controller, 'achievementShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getAchievementMedia', $controller, 'achievementMediaShow', $this->getStandardRequest(), [1]);
    }

}
