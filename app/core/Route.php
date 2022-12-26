<?php
class Route
{
  private static $routes = [
    // initial 
    'GET@' => 'HomeController@index',

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

    // checkout 
    'GET@/checkout/:id' => 'CheckoutController@index',
    'POST@/checkout/getJadwal' => 'CheckoutController@getJadwal',
    // end checkout 

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
    'POST@/admin/film/search' => 'AdminFilmController@search',

    // Admin Bioskop
    'GET@/admin/bioskop' => 'AdminBioskopController@index',
    'GET@/admin/bioskop/create' => 'AdminBioskopController@create',
    'POST@/admin/bioskop' => 'AdminBioskopController@store',
    'GET@/admin/bioskop/:id/edit' => 'AdminBioskopController@edit',
    'POST@/admin/bioskop/:id/update' => 'AdminBioskopController@update',
    'POST@/admin/bioskop/:id/delete' => 'AdminBioskopController@destroy',
    'POST@/admin/bioskop/getall' => 'AdminBioskopController@getall', // fetch datatable

    // Admin Teater
    'GET@/admin/bioskop/:id_bioskop/teater' => 'AdminTeaterController@index',
    'GET@/admin/bioskop/:id_bioskop/teater/create' => 'AdminTeaterController@create',
    'GET@/admin/bioskop/:id_bioskop/teater/:id/edit' => 'AdminTeaterController@edit',
    'POST@/admin/teater' => 'AdminTeaterController@store',
    'POST@/admin/teater/:id/update' => 'AdminTeaterController@update',
    'POST@/admin/teater/:id/delete' => 'AdminTeaterController@destroy',
    'POST@/admin/teater/getall' => 'AdminTeaterController@getAll',
    'POST@/admin/bioskop/:id_bioskop/teater/getbybioskop' => 'AdminTeaterController@getByBioskop', // fetch datatable
    // fetch datatable

    // Admin Jadwal
    'GET@/admin/jadwal' => 'AdminTeaterController@index',
    'GET@/admin/teater/:id_teater/jadwal' => 'AdminJadwalController@indexByTeater',
    'GET@/admin/teater/:id_teater/jadwal/create' => 'AdminJadwalController@create',
    'GET@/admin/teater/:id_teater/jadwal/:id/edit' => 'AdminJadwalController@edit',
    'POST@/admin/jadwal' => 'AdminJadwalController@store',
    'POST@/admin/jadwal/:id/update' => 'AdminJadwalController@update',
    'POST@/admin/jadwal/:id/delete' => 'AdminJadwalController@destroy',
    'POST@/admin/teater/:id_teater/jadwal/getbyteater' => 'AdminJadwalController@getByTeater', // fetch datatable

    // Admin Transaksi
    'GET@/admin/transaksi' => 'AdminTransaksiController@index',
    'GET@/admin/transaksi/:id/detail' => 'AdminTransaksiController@show',
    'POST@/admin/transaksi/getall' => 'AdminTransaksiController@getAll',

  ];

  public static  function getRoutes()
  {
    return self::$routes;
  }
}
