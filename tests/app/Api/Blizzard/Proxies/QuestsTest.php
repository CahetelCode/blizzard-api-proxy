<?php

class QuestsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Quests::class;

        $this->runProxyTest($proxy, 'getQuests', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuest', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuestsCategories', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuestCategory', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuestsAreas', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuestArea', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuestsTypes', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getQuestType', [1, ['locale' => 'it_IT']]);
    }

}
