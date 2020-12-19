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
Route::get('register', 'UsersController@create')->name('users.create');
/*************************************************************************************************/
Route::get('login', 'SessionsController@create')->name('sessions.create');
Route::post('login', 'SessionsController@store')->name('sessions.store');
Route::delete('logout', 'SessionsController@destroy')->name('sessions.destory');
/*************************************************************************************************/
