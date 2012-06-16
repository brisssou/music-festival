<?php

namespace MusicFestival\Link;

class DeezerLink extends \MusicFestival\Link\DefaultLink {
  public function getIcon() {
    return "images/link/deezer.png";
  }

    public function hasPlayer()
  {
    return true;
  }

  public function getPlayer()
  {
    return new \MusicFestival\Player\DeezerPlayer($this);
  }

  public function getName() {
    return "Deezer";
  }

  public function getTemplate() {
    return "link/deezer.twig";
  }

  public static function isMatchingUrl($url) {
    return (bool) preg_match('#http://www.deezer.com/(.+/)?music/track/.*#', $url);
  }
}