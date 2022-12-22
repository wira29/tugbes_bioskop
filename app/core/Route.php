<?php
class Route
{
  private static $routes = [
    // auth 
    'GET@/login' => 'AuthController@index',
    'POST@/processLogin' => 'AuthController@processLogin',
    'GET@/register' => 'AuthController@index',
    'POST@/processRegister' => 'AuthController@processRegister',
    'GET@/logout' => 'AuthController@logout',
    // end auth 
    'GET@/' => 'UserController@index',
    'GET@/home' => 'HomeController@index',
    'GET@/admin/user' => 'AdminUserController@index',
    'GET@/admin/user/:id' => 'AdminUserController@show',
    'GET@/admin/user/update/:id' => 'AdminUserController@update',
    'POST@/admin/user/getall' => 'AdminUserController@getall'
    // 'GET@/admin/user/:id/posts/:post' => 'UserController@show',
  ];

  public static  function getRoutes()
  {
    return self::$routes;
  }
}
