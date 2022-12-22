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
    'GET@/home' => 'HomeController@index',
    // Admin User
    'GET@/admin/user' => 'UserController@index',
    'GET@/admin/user/create' => 'UserController@create',
    'POST@/admin/user' => 'UserController@store',
    'GET@/admin/user/:id/edit' => 'UserController@edit',
    'POST@/admin/user/:id/update' => 'UserController@update',
    'POST@/admin/user/:id/delete' => 'UserController@destroy',

    'POST@/admin/user/getall' => 'UserController@getall' // fetch datatable
    // 'GET@/admin/user/:id/posts/:post' => 'UserController@show',
  ];

  public static  function getRoutes()
  {
    return self::$routes;
  }
}
