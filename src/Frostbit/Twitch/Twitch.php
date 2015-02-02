<?php

namespace Frostbit\Twitch;

class Twitch
{

  const API_URL   = 'https://api.twitch.tv/kraken';
  const ACCEPT    = 'application/vnd.twitchtv.v3+json';

  /* Get Twitch API response */
  private function getResponse($type, $param)
  {
    if (!function_exists('curl_init')){
        die('cURL is not installed! Check your php.ini and enable cURL.');
    }

    $apiTypes = array(
      "channel" => API_URL . "/channels/" . $param
    );

    $url = $apiTypes[$type][$param];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, "https://www.sounddonate.com/");
    curl_setopt($ch, CURLOPT_USERAGENT, "SoundDonate/1.0.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
  }

  /* Get channel informations */
  public function getChannel($name)
  {
    return $this->getResponse("channel", $name);
  }

}
