<?php

class Helper
{
  private $base_url = "http://localhost/tugbes-bioskop/";
  private static $app_name = "tugbes-bioskop";

  /**
   * Define mutators for site base url
   *
   * @param string $url
   * @return string
   */

  public function baseUrl(string $url = null): string
  {
    return $this->base_url . $url;
  }

  /**
   * get application name
   * 
   * @return string
   */
  public static function getAppname(): string
  {
    return self::$app_name;
  }

  /**
   * helper for redirect
   */
  public static function redirect(string $url)
  {
    return header('Location: ' . $base_url . self::$app_name . $url);
  }
}
