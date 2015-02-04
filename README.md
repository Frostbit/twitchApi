# twitchApi
Twitch.tv API Library developed by Frostbit.cz. Currently in development. :space_invader:

![Build](https://scrutinizer-ci.com/g/Frostbit/twitchApi/badges/build.png?b=master)
![Build](https://scrutinizer-ci.com/g/Frostbit/twitchApi/badges/quality-score.png?b=master)

## Install
Put following line into your composer.json (require) and run composer update. [Packagist!](https://packagist.org/packages/frostbit/twitch)
```
"frostbit/twitch": "dev-master"
```

## Settings
Update return URI, Scopes and Client ID in OAuth & Twitch classes.
```php
// Frostbit/Twitch/OAuth.php
const CLIENT_ID = 'fkevhl9oi795jqt3bdwmfn6xupunzkf';
const BACK_URL  = 'http://sounddonate.dev:8888/oauth';
const SCOPE     = 'user_read';

// Frostbit/Twitch/Twitch.php
const ACCEPT    = 'application/vnd.twitchtv.v3+json';
const CLIENT_ID = 'fkevhl9oi795jqt3bdwmfn6xupunzkf';
```

## Usage
```php
use Frostbit\Twitch\Twitch;

$twitch = new Twitch;
$channel = $twitch->getChannel("swifty");
...

// For OAuth you can use
use Frostbit\Twitch\OAuth;

$oAuth = new OAuth;
$redirectUri = $oAuth->getAuthenticateUri();
```

## Support
List of supported block of functions.

* Channel
* Games
* Chat
