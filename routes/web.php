<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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

/*************************************************************************************************/
Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('help', 'PagesController@help')->name('pages.help');
Route::get('about', 'PagesController@about')->name('pages.about');
/*************************************************************************************************/
Route::resource('users', 'UsersController');
Route::get('register', 'UsersController@create')->name('register');
/*************************************************************************************************/
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('sessions.store');
Route::delete('logout', 'SessionsController@destroy')->name('sessions.destory');
/*************************************************************************************************/
Route::get('email/verify/{token}', 'EmailController@store')->name('email.verify');
/*************************************************************************************************/
Route::get('password/reset', 'PasswordController@index')->name('password.index');
Route::post('password/reset', 'PasswordController@store')->name('password.store');
Route::get('password/reset/{token}', 'PasswordController@edit')->name('password.edit');
Route::patch('password/reset', 'PasswordController@update')->name('password.update');
/*************************************************************************************************/
Route::resource('statuses', 'StatusesController', [ 'only' => [ 'store', 'destroy' ] ]);
/*************************************************************************************************/
Route::get('users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('users/{user}/followers', 'UsersController@followers')->name('users.followers');
