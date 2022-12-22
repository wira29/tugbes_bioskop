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

    // home 
    'GET@/home' => 'HomeController@index',
    // end home 

    // film 
    'GET@/film' => 'FilmController@index',
    'GET@/film?page=:page' => 'FilmController@index',
    'GET@/film/:id' => 'FilmController@show',
    // end film 

    // profile 
    'GET@/profile' => 'ProfileController@index',
    'GET@/updateProfile' => 'ProfileController@edit',
    'POST@/processUpdateProfile' => 'ProfileController@update',
    // end profile 

    'GET@/' => 'UserController@index',
    
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
