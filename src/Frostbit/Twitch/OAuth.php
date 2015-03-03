<?php

/*
 * Twitch API OAuth
 * @author Tomas Volsansky <volsansky.tomas@frostbit.cz>
 * @version 1.0.0
 * @package Twitch
 */

namespace Frostbit\Twitch;

class OAuth
{

  const OAUTH_URL     = 'https://api.twitch.tv/kraken/oauth2/authorize';
  const TOKEN_URL     = 'https://api.twitch.tv/kraken/oauth2/token';
  const RESPONSE_TYPE = 'code';
  const CLIENT_ID     = '';
  const BACK_URL      = '';
  const SCOPE         = 'user_read';

  public function getAuthenticateUri()
  {
    $url = self::OAUTH_URL .
      "?response_type=" . self::RESPONSE_TYPE .
      "&client_id=" . self::CLIENT_ID .
      "&redirect_uri=" . self::BACK_URL .
      "&scope=" . self::SCOPE;

    return $url;
  }

}
