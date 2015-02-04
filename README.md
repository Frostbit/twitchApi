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
const CLIENT_ID = 'YOUR-CLIENT-ID-PROVIDED-BY-TWITCH';
const BACK_URL  = 'YOUR-RETURN-URI e.g. http://myapp.com/twitch-oauth';
const SCOPE     = 'user_read';

// Frostbit/Twitch/Twitch.php
const ACCEPT    = 'application/vnd.twitchtv.v3+json';
const CLIENT_ID = 'YOUR-CLIENT-ID-PROVIDED-BY-TWITCH';
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
