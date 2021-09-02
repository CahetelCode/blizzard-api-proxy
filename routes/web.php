<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$blizzardMiddlewares = [
    'auth',
    'getCachedResponse',
    'blizzardNamespace',
    'blizzardAuth',
    'blizzardRequestMerge',
    'cacheResponse'
];

// Blizzard game data APIs
$router->group(['middleware' => $blizzardMiddlewares, 'namespace' => 'Blizzard', 'prefix' => '/blizzard/{region}/{locale}'], function () use ($router) {

    // WoW APIs
    $router->group(['namespace' => 'Wow', 'prefix' => '/wow'], function () use ($router) {

        // Achievements
        $router->group(['prefix' => '/achievements'], function () use ($router) {
            $router->get('/categories', ['uses' => 'AchievementsControllerTest@achievementsCategoriesIndex']);
            $router->get('/categories/{id}', ['uses' => 'AchievementsControllerTest@achievementsCategory']);
            $router->get('/', ['uses' => 'AchievementsControllerTest@achievementsIndex']);
            $router->get('/{id}', ['uses' => 'AchievementsControllerTest@achievementShow']);
            $router->get('/media/{id}', ['uses' => 'AchievementsControllerTest@achievementMediaShow']);
        });

        // Auction houses
        $router->group(['prefix' => '/auction-houses'], function () use ($router) {
            $router->get('/', ['uses' => 'AuctionHouseController@auctionHousesIndex']);
        });

        // Azerite
        $router->group(['prefix' => '/azerite'], function () use ($router) {
            $router->get('/', ['uses' => 'AzeriteController@azeriteIndex']);
            $router->get('/search', ['uses' => 'AzeriteController@azeriteSearch']);
            $router->get('/{id}', ['uses' => 'AzeriteController@azeriteShow']);
            $router->get('/media/{id}', ['uses' => 'AzeriteController@azeriteMediaShow']);

        });

        // Connected realms
        $router->group(['prefix' => '/connected-realms'], function () use ($router) {
            $router->get('/', ['uses' => 'ConnectedRealmsController@connectedRealmsIndex']);
            $router->get('/search', ['uses' => 'ConnectedRealmsController@connectedRealmSearch']);
            $router->get('/{id}', ['uses' => 'ConnectedRealmsController@connectedRealmShow']);
        });

        // Covenants
        $router->group(['prefix' => '/covenants'], function () use ($router) {
            $router->get('/soulbinds', ['uses' => 'CovenantsController@covenantSoulbindsIndex']);
            $router->get('/soulbinds/{id}', ['uses' => 'CovenantsController@covenantSoulbindShow']);
            $router->get('/conduits', ['uses' => 'CovenantsController@covenantConduitsIndex']);
            $router->get('/conduits/{id}', ['uses' => 'CovenantsController@covenantConduitShow']);
            $router->get('/media/{id}', ['uses' => 'CovenantsController@covenantMediaShow']);
            $router->get('/{id}', ['uses' => 'CovenantsController@covenantShow']);
            $router->get('/', ['uses' => 'CovenantsController@covenantIndex']);
        });

        // Creatures
        $router->group(['prefix' => '/creatures'], function () use ($router) {
            $router->get('/family/{id}', ['uses' => 'CreaturesController@creatureFamilyShow']);
            $router->get('/family/media/{id}', ['uses' => 'CreaturesController@creatureFamilyMediaShow']);
            $router->get('/family', ['uses' => 'CreaturesController@creaturesFamilyIndex']);
            $router->get('/types/{id}', ['uses' => 'CreaturesController@creatureTypeShow']);
            $router->get('/types', ['uses' => 'CreaturesController@creaturesTypeIndex']);
            $router->get('/search', ['uses' => 'CreaturesController@creatureSearch']);
            $router->get('/media/{id}', ['uses' => 'CreaturesController@creatureMediaShow']);
            $router->get('/{id}', ['uses' => 'CreaturesController@creatureShow']);
        });

        // Guild Crest
        $router->group(['prefix' => '/guild-crest'], function () use ($router) {
            $router->get('/', ['uses' => 'GuildCrestController@guildCrestIndex']);
            $router->get('/border/{id}', ['uses' => 'GuildCrestController@guildCrestBorderMediaShow']);
            $router->get('/emblem/{id}', ['uses' => 'GuildCrestController@guildCrestEmblemMediaShow']);
        });

        // Items
        $router->group(['prefix' => '/items'], function () use ($router) {
            $router->group(['prefix' => '/classes'], function () use ($router) {
                $router->get('/', ['uses' => 'ItemsController@itemClassesIndex']);
                $router->get('/{id}', ['uses' => 'ItemsController@itemClassById']);
            });
            $router->group(['prefix' => '/sets'], function () use ($router) {
                $router->get('/', ['uses' => 'ItemsController@itemSetIndex']);
                $router->get('/{id}', ['uses' => 'ItemsController@itemSetById']);
            });
            $router->group(['prefix' => '/subclasses'], function () use ($router) {
                $router->get('/{idClass}/{idSubClass}', ['uses' => 'ItemsController@itemSubClassById']);
            });
            $router->get('search', ['uses' => 'ItemsController@itemSearch']);
            $router->get('/media/{id}', ['uses' => 'ItemsController@itemMediaById']);
            $router->get('/{id}', ['uses' => 'ItemsController@itemById']);
        });

        // Journal
        $router->group(['prefix' => '/journal'], function () use ($router) {
            $router->group(['prefix' => '/expansions'], function () use ($router) {
                $router->get('/', ['uses' => 'JournalController@expansionsIndex']);
                $router->get('/{id}', ['uses' => 'JournalController@expansionShow']);
            });
            $router->group(['prefix' => '/encounters'], function () use ($router) {
                $router->get('/search', ['uses' => 'JournalController@encounterSearch']);
                $router->get('/', ['uses' => 'JournalController@encountersIndex']);
                $router->get('/{id}', ['uses' => 'JournalController@encounterShow']);
            });
            $router->group(['prefix' => '/instances'], function () use ($router) {
                $router->get('/media/{id}', ['uses' => 'JournalController@instanceMediaShow']);
                $router->get('/', ['uses' => 'JournalController@instancesIndex']);
                $router->get('/{id}', ['uses' => 'JournalController@instanceShow']);
            });
        });

        // Media
        $router->group(['prefix' => '/media'], function () use ($router) {
            $router->get('/search', ['uses' => 'MediaController@search']);
        });

        // Modified Crafting
        $router->group(['prefix' => '/modified-crafting'], function () use ($router) {
            $router->group(['prefix' => '/categories'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'ModifiedCraftingController@categoryShow']);
                $router->get('/', ['uses' => 'ModifiedCraftingController@categoriesIndex']);
            });
            $router->group(['prefix' => '/reagents'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'ModifiedCraftingController@reagentShow']);
                $router->get('/', ['uses' => 'ModifiedCraftingController@reagentsIndex']);
            });
            $router->get('/', ['uses' => 'ModifiedCraftingController@craftingIndex']);
        });

        // Mounts
        $router->group(['prefix' => '/mounts'], function () use ($router) {
            $router->get('/search', ['uses' => 'MountsController@mountsSearch']);
            $router->get('/{id}', ['uses' => 'MountsController@mountShow']);
            $router->get('/', ['uses' => 'MountsController@mountsIndex']);
        });

        // Mythic dungeons affixes
        $router->group(['prefix' => '/mythic-keystone-affixes'], function () use ($router) {
            $router->get('/media/{id}', ['uses' => 'MythicAffixesController@affixMediaShow']);
            $router->get('/{id}', ['uses' => 'MythicAffixesController@affixShow']);
            $router->get('/', ['uses' => 'MythicAffixesController@affixesIndex']);
        });

        // Mythic dungeons
        $router->group(['prefix' => '/mythic-keystone'], function () use ($router) {
            $router->group(['prefix' => '/dungeons'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'MythicDungeonsController@dungeonShow']);
                $router->get('/', ['uses' => 'MythicDungeonsController@dungeonsIndex']);
            });
            $router->group(['prefix' => '/periods'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'MythicDungeonsController@periodShow']);
                $router->get('/', ['uses' => 'MythicDungeonsController@periodsIndex']);
            });
            $router->get('/keystones', ['uses' => 'MythicDungeonsController@seasonsIndex']);
            $router->get('/seasons', ['uses' => 'MythicDungeonsController@seasonsIndex']);
        });

        // Mythic keystone HOF
        $router->group(['prefix' => '/keystone-hall-of-fame'], function () use ($router) {
            $router->get('/{realmId}/{dungeonId}/{period}', ['uses' => 'MythicKeystoneLeaderboardsController@leaderboardShow']);
            $router->get('/{realm}', ['uses' => 'MythicKeystoneLeaderboardsController@leaderboardIndex']);
        });

        // Mythic raid HOF
        $router->group(['prefix' => '/raid-hall-of-fame'], function () use ($router) {
            $router->get('/{raid}/{faction}', ['uses' => 'MythicRaidLeaderboardsController@leaderboardShow']);
        });

        // Pets
        $router->group(['prefix' => '/pets'], function () use ($router) {
            $router->get('/abilities/media/{id}', ['uses' => 'PetsController@petAbilityMediaShow']);
            $router->get('/abilities/{id}', ['uses' => 'PetsController@petAbilityShow']);
            $router->get('/abilities', ['uses' => 'PetsController@petAbilityIndex']);
            $router->get('/media/{id}', ['uses' => 'PetsController@petMediaShow']);
            $router->get('/{id}', ['uses' => 'PetsController@petShow']);
            $router->get('/', ['uses' => 'PetsController@petIndex']);
        });

        // Playable classes
        $router->group(['prefix' => '/playable-classes'], function () use ($router) {
            $router->get('/{id}/pvp-talent-slots', ['uses' => 'PlayableClassesController@classPvpTalentsSlots']);
            $router->get('/media/{id}', ['uses' => 'PlayableClassesController@classMediaShow']);
            $router->get('/{id}', ['uses' => 'PlayableClassesController@classShow']);
            $router->get('/', ['uses' => 'PlayableClassesController@classesIndex']);
        });

        // Playable races
        $router->group(['prefix' => '/playable-races'], function () use ($router) {
            $router->get('/{id}', ['uses' => 'PlayableRacesController@raceShow']);
            $router->get('/', ['uses' => 'PlayableRacesController@racesIndex']);
        });

        // Playable specializations
        $router->group(['prefix' => '/playable-specializations'], function () use ($router) {
            $router->get('/media/{id}', ['uses' => 'PlayableSpecializationsController@specializationMediaShow']);
            $router->get('/{id}', ['uses' => 'PlayableSpecializationsController@specializationShow']);
            $router->get('/', ['uses' => 'PlayableSpecializationsController@specializationsIndex']);
        });

        // Power types
        $router->group(['prefix' => '/power-types'], function () use ($router) {
            $router->get('/{id}', ['uses' => 'PowerTypesController@powerTypeShow']);
            $router->get('/', ['uses' => 'PowerTypesController@powerTypeIndex']);
        });

        // Professions
        $router->group(['prefix' => '/professions'], function () use ($router) {
            $router->get('/recipes/media/{id}', ['uses' => 'ProfessionsController@recipeMediaShow']);
            $router->get('/recipes/{id}', ['uses' => 'ProfessionsController@recipeShow']);
            $router->get('/media/{id}', ['uses' => 'ProfessionsController@professionMediaShow']);
            $router->get('/{id}/tiers/{tier}', ['uses' => 'ProfessionsController@professionSkillTierShow']);
            $router->get('/{id}', ['uses' => 'ProfessionsController@professionShow']);
            $router->get('/', ['uses' => 'ProfessionsController@professionsIndex']);
        });

        // PvP
        $router->group(['prefix' => '/pvp'], function () use ($router) {
            // PvP tiers
            $router->group(['prefix' => '/tiers'], function () use ($router) {
                $router->get('/media/{id}', ['uses' => 'PvpTiersController@pvpTierMediaShow']);
                $router->get('/{id}', ['uses' => 'PvpTiersController@pvpTierShow']);
                $router->get('/', ['uses' => 'PvpTiersController@pvpTierIndex']);
            });

            // PvP seasons
            $router->group(['prefix' => '/seasons'], function () use ($router) {
                $router->get('/', ['uses' => 'PvpSeasonsController@seasonsIndex']);
                $router->get('/{id}', ['uses' => 'PvpSeasonsController@seasonShow']);
                $router->get('/{id}/leaderboard', ['uses' => 'PvpSeasonsController@leaderboardsIndex']);
                $router->get('/{id}/leaderboard/{bracket}', ['uses' => 'PvpSeasonsController@leaderboardShow']);
                $router->get('/{id}/rewards', ['uses' => 'PvpSeasonsController@rewardsIndex']);
            });
        });

        // Quests
        $router->group(['prefix' => '/quest'], function () use ($router) {
            $router->group(['prefix' => '/categories'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'QuestsController@questCategoryShow']);
                $router->get('/', ['uses' => 'QuestsController@questsCategoriesIndex']);
            });
            $router->group(['prefix' => '/areas'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'QuestsController@questAreaShow']);
                $router->get('/', ['uses' => 'QuestsController@questsAreasIndex']);
            });
            $router->group(['prefix' => '/types'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'QuestsController@questTypeShow']);
                $router->get('/', ['uses' => 'QuestsController@questsTypesIndex']);
            });
            $router->get('/{id}', ['uses' => 'QuestsController@questShow']);
            $router->get('/', ['uses' => 'QuestsController@questsIndex']);
        });

        // Realms
        $router->group(['prefix' => '/realms'], function () use ($router) {
            $router->get('/search', ['uses' => 'RealmsController@searchRealm']);
            $router->get('/{id}', ['uses' => 'RealmsController@realmShow']);
            $router->get('/', ['uses' => 'RealmsController@realmsIndex']);
        });

        // Regions
        $router->group(['prefix' => '/regions'], function () use ($router) {
            $router->get('/{id}', ['uses' => 'RegionsController@regionShow']);
            $router->get('/', ['uses' => 'RegionsController@regionsIndex']);
        });

        // Reputations
        $router->group(['prefix' => '/reputations'], function () use ($router) {
            $router->group(['prefix' => '/factions'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'ReputationsController@factionShow']);
                $router->get('/', ['uses' => 'ReputationsController@factionsIndex']);
            });
            $router->group(['prefix' => '/tiers'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'ReputationsController@tierShow']);
                $router->get('/', ['uses' => 'ReputationsController@tiersIndex']);
            });
        });

        // Spells
        $router->group(['prefix' => '/spells'], function () use ($router) {
            $router->get('/media/{id}', ['uses' => 'SpellsController@spellMediaShow']);
            $router->get('/search', ['uses' => 'SpellsController@spellsSearch']);
            $router->get('/{id}', ['uses' => 'SpellsController@spellShow']);
        });

        // Talents
        $router->group(['prefix' => '/talents'], function () use ($router) {
            $router->get('/pvp/{id}', ['uses' => 'TalentsController@pvpTalentShow']);
            $router->get('/pvp', ['uses' => 'TalentsController@pvpTalentsIndex']);
            $router->get('/{id}', ['uses' => 'TalentsController@talentShow']);
            $router->get('/', ['uses' => 'TalentsController@talentsIndex']);
        });

        // Tech talents
        $router->group(['prefix' => '/tech'], function () use ($router) {
            $router->group(['prefix' => '/trees'], function () use ($router) {
                $router->get('/{id}', ['uses' => 'TechTalentsController@techTalentTreeShow']);
                $router->get('/', ['uses' => 'TechTalentsController@techTalentTreesIndex']);
            });
            $router->get('/media/{id}', ['uses' => 'TechTalentsController@techTalentMediaShow']);
            $router->get('/{id}', ['uses' => 'TechTalentsController@techTalentShow']);
            $router->get('/', ['uses' => 'TechTalentsController@techTalentsIndex']);
        });

        // Titles
        $router->group(['prefix' => '/titles'], function () use ($router) {
            $router->get('/{id}', ['uses' => 'TitlesController@titleShow']);
            $router->get('/', ['uses' => 'TitlesController@titlesIndex']);
        });

        // Tokens
        $router->group(['prefix' => '/tokens'], function () use ($router) {
            $router->get('/', ['uses' => 'TokensController@getTokenPrice']);
        });

    });

});


