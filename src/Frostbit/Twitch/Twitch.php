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

  /* Get Twitch API response */
  private function getResponse($type, $param, $param2)
  {
    if (!function_exists('curl_init')){
        die('cURL is not installed! Check your php.ini and enable cURL.');
    }

    switch ($type) {
      case "channel":
        $url = self::API_URL . "/channels/" . $param;
        break;
      case "channel-videos":
        $url = self::API_URL . "/channels/" . $param . "/videos";
        break;
      case "channel-follows":
        $url = self::API_URL . "/channels/" . $param . "/follows";
        break;
      case "games":
        $url = self::API_URL . "/games/top?limit=" . $param . "&offset=" . $param2;
        break;
      case "chat":
        $url = self::API_URL . "/chat/" . $param;
        break;
      case "chat-emoticons":
        $url = self::API_URL . "/chat/" . $param . "/emoticons";
        break;
      default:
        $url = self::API_URL . "/channels/" . $param;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, "https://www.sounddonate.com/");
    curl_setopt($ch, CURLOPT_USERAGENT, "SoundDonate/1.0.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $result = curl_exec($ch);
    curl_close($ch);

    if(!$httpCode != 200) {
      // TO-DO: Without response, insert message into log
      $result = false;
    }

    return $result;
  }

  /* Get channel informations */
  public function getChannel($name)
  {
    return $this->getResponse("channel", $name);
  }

  /* Get channel videos */
  public function getChannelVideos($name)
  {
    return $this->getResponse("channel-videos", $name);
  }

  /* Get channel follows */
  public function getChannelFollows($name)
  {
    return $this->getResponse("channel-follows", $name);
  }

  /* Get top games (available params limit, offset) */
  public function getGames($limit, $offset)
  {
    return $this->getResponse("games", $limit, $offset)
  }

  /* Get chat informations */
  public function getChat($name)
  {
    return $this->getResponse("chat", $name);
  }

  /* Get chat emoticons */
  public function getChatEmoticons($name)
  {
    return $this->getResponse("chat-emoticons", $name);
  }

}
