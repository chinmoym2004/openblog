<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// landing page
Route::get('/','HomeController@index');
//
Route::controller('users','UsersController');
//Route::controller('admin','AdminController');
Route::controller('blog','ContentController');
Route::get('password/reset', array(
  'uses' => 'PasswordController@remind',
  'as' => 'password.remind'
));
// secure routes
Route::group(array('before' => 'auth'), function()
{
    //Route::get('send_request', 'friends@send_request');
    //Route::any('search/(:all?)', 'search@index');

    Route::get('admin/','AdminController@index');
    Route::controller('admin','AdminController');

   // Route::any('edit_profile', 'profile@edit');
   // Route::get('(:any)', 'profile@view');
});

Route::post('password/reset', array(
  'uses' => 'PasswordController@request',
  'as' => 'password.request'
));


Route::get('password/reset/{token}', array(
  'uses' => 'PasswordController@reset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'PasswordController@update',
  'as' => 'password.update'
));

Route::get('users/setting',array('UsersController@getSetting'));
Route::post('users/setting',array('UsersController@postSetting'));

