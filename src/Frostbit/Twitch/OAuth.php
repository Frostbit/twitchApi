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
  const SCOPE         = 'user_read';

  public function __construct($clientId, $clientSecret, $backUrl)
  {
      const CLIENT_ID     = $clientId;
      const CLIENT_SECRET = $clientSecret;
      const BACK_URL      = $backUrl;
  }

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
    $params = array(
      'client_id' => self::CLIENT_ID,
      'client_secret' => self::CLIENT_SECRET,
      'grant_type' => 'authorization_code',
      'redirect_uri' => self::BACK_URL,
      'code' => $code
    );

    $postFields = '';
    foreach($params as $key => $value) { $postFields .= $key.'='.urlencode($value).'&'; }
    rtrim($postFields, '&');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.twitch.tv/kraken/oauth2/token");
    curl_setopt($ch,CURLOPT_POST, count($params));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $postFields);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 60);

    $oauthResult = curl_exec($ch);
    curl_close($ch);

    $oauthResult = json_decode($oauthResult, true);
    return $oauthResult['access_token'];
  }

}
