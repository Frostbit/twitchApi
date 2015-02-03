<?php

/*
 * Twitch API Library
 * @author Tomas Volsansky <volsansky.tomas@frostbit.cz>
 * @version 1.0.0
 * @package Twitch
 */

namespace Frostbit\Twitch;

class Twitch
{

  const API_URL   = 'https://api.twitch.tv/kraken';
  const ACCEPT    = 'application/vnd.twitchtv.v3+json';
  const CLIENT_ID = 'fkevhl9oi795jqt3bdwmfn6xupunzkf';

  /* Get Twitch API response */
  private function getResponse($url)
  {
    if (!function_exists('curl_init')){
        die('cURL is not installed! Check your php.ini and enable cURL.');
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, "https://www.sounddonate.com/");
    curl_setopt($ch, CURLOPT_USERAGENT, "SoundDonate/1.0.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: ' . self::ACCEPT, 'Client-ID: ' . self::CLIENT_ID));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $result = curl_exec($ch);
    curl_close($ch);

    if(!$httpCode != 200) {
      // TO-DO: Without response, insert message into log
      $result = false;
    }

    return json_decode($result);
  }

  /* Get channel informations */
  public function getChannel($name)
  {
    $url = self::API_URL . "/channels/" . $name;
    return $this->getResponse($url);
  }

  /* Get channel videos */
  public function getChannelVideos($name)
  {
    $url = self::API_URL . "/channels/" . $name . "/videos";
    return $this->getResponse($url);
  }

  /* Get channel follows */
  public function getChannelFollows($name)
  {
    $url = self::API_URL . "/channels/" . $name . "/follows";
    return $this->getResponse($url);
  }

  /* Get top games (available params limit, offset) */
  public function getGames($limit = 10, $offset = 0)
  {
    $url = self::API_URL . "/games/top?limit=" . $limit . "&offset=" . $offset;
    return $this->getResponse($url);
  }

  /* Get chat informations */
  public function getChat($name)
  {
    $url = self::API_URL . "/chat/" . $name;
    return $this->getResponse($url);
  }

  /* Get chat emoticons */
  public function getChatEmoticons($name)
  {
    $url = self::API_URL . "/chat/" . $name . "/emoticons";
    return $this->getResponse($url);
  }

}
