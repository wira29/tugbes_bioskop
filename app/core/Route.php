<?php
class Route
{
  private static $routes = [
    // initial 
    'GET@/' => 'HomeController@index',

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

    'GET@/admin' => 'HomeController@adminIndex',
    'GET@/admin/logout' => 'AuthController@logout',

    // Admin User
    'GET@/admin/user' => 'AdminUserController@index',
    'GET@/admin/user/create' => 'AdminUserController@create',
    'POST@/admin/user' => 'AdminUserController@store',
    'GET@/admin/user/:id/edit' => 'AdminUserController@edit',
    'POST@/admin/user/:id/update' => 'AdminUserController@update',
    'POST@/admin/user/:id/delete' => 'AdminUserController@destroy',
    'POST@/admin/user/getall' => 'AdminUserController@getall', // fetch datatable

    // Admin Film
    'GET@/admin/film' => 'AdminFilmController@index',
    'GET@/admin/film/create' => 'AdminFilmController@create',
    'POST@/admin/film' => 'AdminFilmController@store',
    'GET@/admin/film/:id/edit' => 'AdminFilmController@edit',
    'POST@/admin/film/:id/update' => 'AdminFilmController@update',
    'POST@/admin/film/:id/delete' => 'AdminFilmController@destroy',
    'POST@/admin/film/getall' => 'AdminFilmController@getall', // fetch datatable

    // Admin Film
    'GET@/admin/bioskop' => 'AdminBioskopController@index',
    'GET@/admin/bioskop/create' => 'AdminBioskopController@create',
    'POST@/admin/bioskop' => 'AdminBioskopController@store',
    'GET@/admin/bioskop/:id/edit' => 'AdminBioskopController@edit',
    'POST@/admin/bioskop/:id/update' => 'AdminBioskopController@update',
    'POST@/admin/bioskop/:id/delete' => 'AdminBioskopController@destroy',
    'POST@/admin/bioskop/getall' => 'AdminBioskopController@getall', // fetch datatable
    // 'GET@/admin/user/:id/posts/:post' => 'UserController@show',
  ];

  public static  function getRoutes()
  {
    return self::$routes;
  }
}
