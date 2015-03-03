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
  const CLIENT_ID     = 'fkevhl9oi795jqt3bdwmfn6xupunzkf';
  const BACK_URL      = 'http://sounddonate.dev:8888/app_dev.php/login/check/';
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

  public function getToken($code)
  {
    $data = "client_id=" . self::CLIENT_ID .
      "&client_secret=fxnb2elhqagix4zye0em8j3xopcc9h9
      &grant_type=authorization_code
      &redirect_uri=" . self::BACK_URL .
      "&code=" . $code;

    $ch = curl_init(self::TOKEN_URL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data))
    );

    $result = curl_exec($ch);

    return json_decode($result);
  }

}
