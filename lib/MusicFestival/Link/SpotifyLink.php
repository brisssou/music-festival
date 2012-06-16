<?php

namespace MusicFestival\Link;

class SpotifyLink extends \MusicFestival\Link\DefaultLink {
  public function __construct($url) {
    $this->url = $url;

    if(preg_match('#http://open.spotify.com/track/(?<id>.*)#', $url, $match))
    {
      $this->id = $match['id'];
    }
  }

  public function hasPlayer()
  {
    return true;
  }

  public function getPlayer()
  {
    return new \MusicFestival\Player\SpotifyPlayer($this);
  }


  public function getSpotifyId() {
    return $this->id;
  }

  public function getSpotifyUri() {
    return "spotify:track:$this->id";
  }

  public function getIcon() {
    return "images/link/spotify.png";
  }

  public function getName() {
    return "Spotify";
  }

 public function getTemplate() {
    return "link/spotify.twig";
  }

  public static function isMatchingUrl($url) {
    return (bool) preg_match('#http://open.spotify.com/track/.*#', $url);
  }
}