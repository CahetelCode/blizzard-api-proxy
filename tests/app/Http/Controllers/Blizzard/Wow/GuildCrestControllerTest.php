<?php

class GuildCrestControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\GuildCrest::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\GuildCrestController::class;

        $this->doBaseUsageTest($proxy, 'getGuildCrestIndex', $controller, 'guildCrestIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getGuildCrestBorder', $controller, 'guildCrestBorderMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getGuildCrestEmblem', $controller, 'guildCrestEmblemMediaShow', $this->getStandardRequest(), [1]);
    }

}
