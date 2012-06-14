<?php

namespace MusicFestival\Link;

class DefaultLink implements \MusicFestival\Link\Link {
  protected $url;

  public function __construct($url) {
    $this->url = $url;
  }

  public function getIcon() {
    return "http://www.zug.com/img/icon-link.jpg";
  }

  public function getName() {
    return "Link";
  }

  public function getTemplate() {
    return "link/default.twig";
  }

  public function getUrl() {
    return $this->url;
  }

  public function isValid() {
    return true;
  }

  public static function isMatchingUrl($url) {
    return (bool) $url;
  }

  public function __toString() {
    try {
      $twig = \MusicFestival\Config::getInstance()->getTwig();
      return  $twig->render($this->getTemplate(), array('link' => $this));
    } catch (\Exception $e) {
      return $e->getMessage();
    }

  }
}