<?php
require_once __DIR__ . '/../core/Helper.php';

class AuthMiddleware
{

  public static function userAuth()
  {

    if (isset($_SESSION['user'])) {
      if ($_SESSION['user']->id_role == 2) return true;
    }
    return Helper::redirect('login');
  }

  public static function adminAuth()
  {
    if (isset($_SESSION['user'])) {
      if ($_SESSION['user']->id_role == 1) return true;
    }
    return Helper::redirect('login');
  }
}
