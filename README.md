# twitchApi
Twitch.tv API Library developed by Frostbit.cz.

[![Latest Stable Version](https://poser.pugx.org/frostbit/twitch/v/stable.svg)](https://packagist.org/packages/frostbit/twitch)
[![Build Status](https://scrutinizer-ci.com/g/Frostbit/twitchApi/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Frostbit/twitchApi/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Frostbit/twitchApi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Frostbit/twitchApi/?branch=master)
[![Total Downloads](https://poser.pugx.org/frostbit/twitch/downloads.svg)](https://packagist.org/packages/frostbit/twitch)

## Install
Put following line into your composer.json (require) and run composer update. [Packagist!](https://packagist.org/packages/frostbit/twitch)
```
"frostbit/twitch": "dev-master"
```

## Settings
Update return URI, Scopes, client ID and client secret in OAuth & Twitch classes.
```php
// Frostbit/Twitch/OAuth.php
const OAUTH_URL     = 'https://api.twitch.tv/kraken/oauth2/authorize';
const TOKEN_URL     = 'https://api.twitch.tv/kraken/oauth2/token';
const RESPONSE_TYPE = 'code';
const CLIENT_ID     = 'your_client_id';
const CLIENT_SECRET = 'your_secret';
const BACK_URL      = 'your_uri';
const SCOPE         = 'user_read';

// Frostbit/Twitch/Twitch.php
const API_URL   = 'https://api.twitch.tv/kraken';
const ACCEPT    = 'application/vnd.twitchtv.v3+json';
const CLIENT_ID = 'your_client_id';
```

## Usage
```php
use Frostbit\Twitch\Twitch;

$twitch = new Twitch;
$channel = $twitch->getChannel("swifty");
...

// OAuth for get Twitch OAuth URI with your params and get access token from received code.
use Frostbit\Twitch\OAuth;

$oAuth = new OAuth;
$redirectUri = $oAuth->getAuthenticateUri();
```

## Support
List of supported functions.

* Channel
* Stream
* Games
* Chat
* Emoticons
* User
* Autorized User (user_read scope)
