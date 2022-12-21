<?php
class Route
{
  private static $routes = [
    'GET@/' => 'UserController@index',
    'GET@/login' => 'AuthController@index',
    'POST@/processLogin' => 'AuthController@processLogin',
    'GET@/register' => 'UserController@index',
    'GET@/home' => 'HomeController@index',
    'GET@/admin/user' => 'AdminUserController@index',
    'GET@/admin/user/:id' => 'AdminUserController@show',
    // 'GET@/admin/user/:id/posts/:post' => 'UserController@show',
  ];

  public static  function getRoutes()
  {
    return self::$routes;
  }
}
