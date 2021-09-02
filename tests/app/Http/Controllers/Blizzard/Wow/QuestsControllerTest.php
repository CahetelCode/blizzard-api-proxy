<?php

class QuestsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Quests::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\QuestsController::class;

        $this->doBaseUsageTest($proxy, 'getQuests', $controller, 'questsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getQuest', $controller, 'questShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getQuestsCategories', $controller, 'questsCategoriesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getQuestCategory', $controller, 'questCategoryShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getQuestsAreas', $controller, 'questsAreasIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getQuestArea', $controller, 'questAreaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getQuestsTypes', $controller, 'questsTypesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getQuestType', $controller, 'questTypeShow', $this->getStandardRequest(), [1]);
    }

}
