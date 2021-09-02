# Blizzard API proxy
## Introduction
This application aims to be a proxy towards Blizzard's API, so we can cache their responses. This is mainly because of 
the rate limit imposed by Blizzard, which can be a problem if your service is under heavy load. Plus, delegating
this to a separate application makes them reusable from every microservice you may want to put in place for your project.

Of course, this application can be further extended so it will include other API services. For contributor notes/concerns 
and testability considerations, check the bottom of this document.

At the current stage, only Retail WoW APIs are implemented.


## Requirements
This application has been built on top of [Lumen 8](https://lumen.laravel.com/docs). Additional requirements are:
- PHP >= 8.0
- Redis (no version restriction, to be confirmed)
- MariaDB (or MySQL, no version restriction, to be confirmed)

Please note that this application can work even without Redis, but caching is pretty much our objective.


## Configuration
The configuration is done via environment variables. Other than Lumen's defaults, you can set:
- `BLIZZARD_CLIENT_ID`: (__string__) your Blizzard client app id
- `BLIZZARD_CLIENT_SECRET`: (__string__) your Blizzard client app secret
- `STATIC_CACHE_EXPIRATION`: (__integer__) cache duration for calls made with the static header (default `3600`)
- `DYNAMIC_CACHE_EXPIRATION`: (__integer__) cache duration for calls made with the dynamic header (default `900`)
- `ENABLE_AUTH`: (__boolean__) add authentication to this service
- `AUTH_TOKEN`: (__string__) the auth token (pointless if `ENABLE_AUTH` is false)


## Performing requests to this application
### Headers
- `Battlenet-Namespace`: must be compliant with [Blizzard's namespace specifications](https://develop.battle.net/documentation/world-of-warcraft/guides/namespaces) (e.g.: `static-eu`)
- `Authorization`: if you enabled the authentication, use this header. The token itself is a plain string (e.g.: `Authorization: your-token`)
### Response
The response is given as a JSON with the following structure:
```json
{
    "success": true, // true or false
    "response": ... // Blizzard's response OR the error message
}
```
Possible response codes are:
- `200`
- `403` (unauthenticated)
- `404` (endpoint not found on Blizzard's side)
- `500` (please open a bug report :))

## APIs List
## Blizzard
All Blizzard's API are prefixed like so: `https://yoururl.com/blizzard/{region}/{locale}`. Please check [Blizzard's docs](https://develop.battle.net/documentation/world-of-warcraft/guides/localization)
to know more. Also, these APIs are mapped one-by-one with the official APIs and the correspondent one should be pretty
straightforward. Check the docs about the [Game Data APIs here](https://develop.battle.net/documentation/world-of-warcraft/game-data-apis).
### WoW (Retail)
__Achievements__
- `GET` __/achievements/__
- `GET` __/achievements/{id}__
- `GET` __/achievements/categories__
- `GET` __/achievements/categories/{id}__
- `GET` __/achievements/media/{id}__

__Auction houses__
- `GET` __/auction-houses__

__Azerite essence__
- `GET` __/azerite/__
- `GET` __/azerite/{id}__
  - Query string:
    - ___page__: (int) page number
    - __orderby__: (string) field to sort
    - __specializationId__: (int) filter by specialization
- `GET` __/azerite/search__
- `GET` __/azeritemedia/{id}__

__Connected realms__
- `GET` __/connected-realms/__
- `GET` __/connected-realms/{id}__
- `GET` __/connected-realms/search__
  - Query string:
    - ___page__: (int) page number
    - __status__: (string) `UP` or `DOWN`
    - __timezone__: (string) (e.g. `America/New York`)
    - __orderby__: (string) field to sort

__Covenants__
- `GET` __/covenants/__
- `GET` __/covenants/{id}__
- `GET` __/covenants/soulbinds__
- `GET` __/covenants/soulbinds/{id}__
- `GET` __/covenants/conduits__
- `GET` __/covenants/conduits/{id}__
- `GET` __/covenants/media/{id}__

__Creatures__
- `GET` __/creatures/{id}__
- `GET` __/creatures/family__
- `GET` __/creatures/family/{id}__
- `GET` __/creatures/family/media/{id}__
- `GET` __/creatures/types__
- `GET` __/creatures/types/{id}__
- `GET` __/creatures/search__
  - Query string:
      - ___page__: (int) page number
      - __orderby__: (string) field to sort
      - __name__: (string) creature name. Please note that the locale is locked to the one specified in the url path
- `GET` __/creatures/media/{id}__

(in progress...)

## Contributors concerns
As stated in the introduction this application currently handles Retail WoW APIs, but it will likely grow and include
all the available games. Some classes may be a bit too specific or generic, but I'll tune them over time.
Speaking about testability instead, there's not really much to unit test here. Most of the tests are just a quick way to 
ensure the correctness of the method arguments. The best way to really test this application would be to compare the official
APIs responses with the one given by this application, but this may be a HUGE problem in a CI/CD context. For this reason, 
for the moment such tests are not implemented. If you have better ideas/suggestions, contact me or open a PR.
