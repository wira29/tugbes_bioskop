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

    // user


    // home 
    'GET@/home' => 'HomeController@index',
    // end home 

    // film 
    'GET@/film' => 'FilmController@index',
    'GET@/film?page=:page' => 'FilmController@index',
    'GET@/film/:id' => 'FilmController@show',
    'POST@/film/cari' => 'FilmController@search',
    // end film 

    // profile 
    'GET@/profile' => 'ProfileController@index',
    'GET@/updateProfile' => 'ProfileController@edit',
    'POST@/processUpdateProfile' => 'ProfileController@update',
    // end profile

    // checkout 
    'GET@/checkout/:id' => 'CheckoutController@index',
    'POST@/checkout/getJadwal' => 'CheckoutController@getJadwal',
    'POST@/checkout/jadwal/:id' => 'CheckoutController@storeJadwal',
    'GET@/pilih-kursi/:id' => 'CheckoutController@pilihKursi',
    'GET@/confirm-checkout/:id' => 'CheckoutController@konfirmasi',
    'GET@/success-checkout/:id' => 'CheckoutController@success',
    // end checkout 

    'GET@/admin' => 'HomeController@adminIndex',
    'GET@/admin/logout' => 'AuthController@logout',


    // User
    'POST@/user' => 'AdminUserController@store',
    'POST@/user/:id/update' => 'AdminUserController@update',
    'POST@/user/:id/delete' => 'AdminUserController@destroy',
    'POST@/user/getall' => 'AdminUserController@getall', // fetch datatable


    // Film
    'POST@/film' => 'AdminFilmController@store',
    'POST@/film/:id/update' => 'AdminFilmController@update',
    'POST@/film/:id/delete' => 'AdminFilmController@destroy',
    'POST@/film/getall' => 'AdminFilmController@getall', // fetch datatable
    'POST@/film/search' => 'AdminFilmController@search',

    // Bioskop
    'POST@/bioskop' => 'AdminBioskopController@store',
    'POST@/bioskop/:id/update' => 'AdminBioskopController@update',
    'POST@/bioskop/:id/delete' => 'AdminBioskopController@destroy',
    'POST@/bioskop/getall' => 'AdminBioskopController@getall', // fetch datatable

    // Teater
    'POST@/teater' => 'AdminTeaterController@store',
    'POST@/teater/:id/update' => 'AdminTeaterController@update',
    'POST@/teater/:id/delete' => 'AdminTeaterController@destroy',
    'POST@/teater/getall' => 'AdminTeaterController@getAll',
    'POST@/bioskop/:id_bioskop/teater/getbybioskop' => 'AdminTeaterController@getByBioskop', // fetch datatable

    // Jadwal
    'POST@/jadwal' => 'AdminJadwalController@store',
    'POST@/jadwal/:id/update' => 'AdminJadwalController@update',
    'POST@/jadwal/:id/delete' => 'AdminJadwalController@destroy',
    'POST@/teater/:id_teater/jadwal/getbyteater' => 'AdminJadwalController@getByTeater', // fetch datatable

    // Transaksi
    'GET@/transaksi' => 'TransaksiController@index',
    'POST@/transaksi/getall' => 'AdminTransaksiController@getAll', // fetch datatable

    // Admin Pages
    // Admin User 
    'GET@/admin/user' => 'AdminUserController@index',
    'GET@/admin/user/create' => 'AdminUserController@create',
    'GET@/admin/user/:id/edit' => 'AdminUserController@edit',

    // Admin Film
    'GET@/admin/film' => 'AdminFilmController@index',
    'GET@/admin/film/create' => 'AdminFilmController@create',
    'GET@/admin/film/:id/edit' => 'AdminFilmController@edit',

    // Admin Bioskop
    'GET@/admin/bioskop' => 'AdminBioskopController@index',
    'GET@/admin/bioskop/create' => 'AdminBioskopController@create',
    'GET@/admin/bioskop/:id/edit' => 'AdminBioskopController@edit',

    // Admin Teater
    'GET@/admin/bioskop/:id_bioskop/teater' => 'AdminTeaterController@index',
    'GET@/admin/bioskop/:id_bioskop/teater/create' => 'AdminTeaterController@create',
    'GET@/admin/bioskop/:id_bioskop/teater/:id/edit' => 'AdminTeaterController@edit',

    // Admin Jadwal
    'GET@/admin/jadwal' => 'AdminTeaterController@index',
    'GET@/admin/teater/:id_teater/jadwal' => 'AdminJadwalController@indexByTeater',
    'GET@/admin/teater/:id_teater/jadwal/create' => 'AdminJadwalController@create',
    'GET@/admin/teater/:id_teater/jadwal/:id/edit' => 'AdminJadwalController@edit',

    // Admin Transaksi
    'GET@/admin/transaksi' => 'AdminTransaksiController@index',
    'GET@/admin/transaksi/:id/detail' => 'AdminTransaksiController@show',
    // End Admin Page

  ];

  public static  function getRoutes()
  {
    return self::$routes;
  }
}
