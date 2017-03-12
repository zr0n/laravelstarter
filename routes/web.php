<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin/configuration', "ConfigurationController@index");
Route::put('/admin/configuration', "ConfigurationController@store");

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('users', 'UserController');
Route::resource('admin/gallery', 'GalleryAdminController');

Route::get('/users/{id}/delete', 'UserController@destroy')->name('userDelete');
Route::get('/register', function(){
  return redirect('/admin');
});
