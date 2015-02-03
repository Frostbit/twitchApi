# twitchApi
Twitch.tv API Library developed by Frostbit.cz. Currently in development. :space_invader: 

![Build](https://scrutinizer-ci.com/g/Frostbit/twitchApi/badges/build.png?b=master)
![Build](https://scrutinizer-ci.com/g/Frostbit/twitchApi/badges/quality-score.png?b=master)

## Install
Put following line into your composer.json (require) and run composer update. [Packagist!](https://packagist.org/packages/frostbit/twitch)
```
"frostbit/twitch": "dev-master"
```

## Usage
```php
use Frostbit\Twitch\Twitch;

$twitch = new Twitch;
$channel = $twitch->getChannel("swifty");
...
```

## Support
List of supported block of functions.

* Channel
* Games
* Chat
