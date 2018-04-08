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

use \Illuminate\Support\Facades\Route;

/**
 * 切换语言
 */
Route::get('/language/{lang}', [
        //指定Language中间件
        'middleware' => 'language',
        'uses' => 'LanguageController@change'
    ]);

//Route::get('/language/{lang}', 'LanguageController@change');

Route::get('/', 'StaticPagesController@home');
Route::get('/help', 'StaticPagesController@help');
Route::get('/about', 'StaticPagesController@about');
Route::get('/test', 'StaticPagesController@test');

Route::get('/baby/', 'StaticPagesController@baby');
Route::get('/main/', 'StaticPagesController@main');
Route::get('/slider/', 'StaticPagesController@slider');
Route::get('/calendar', 'StaticPagesController@calendar');

Route::resource('/users', 'UsersController');
/** 注册 **/
Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('/events', 'CalendarController');
/**
 * ===========================================================================================
 *                                                                                            |
 *                                上 述 代 码 等 同 于                                          |
 *                                                                                            |
 * -------------------------------------------------------------------------------------------
 *   Route::get('/events', 'CalendarController@index')->name('events.index');                 |
 *   Route::get('/events/{event}', 'CalendarController@show')->name('events.show');           |
 *   Route::get('/events/create', 'CalendarController@create')->name('events.create');        |
 *   Route::post('/events', 'CalendarController@store')->name('events.store');                |
 *   Route::get('/events/{event}/edit', 'CalendarController@edit')->name('events.edit');      |
 *   Route::patch('/events/{event}', 'CalendarController@update')->name('events.update');     |
 *   Route::delete('/events/{event}', 'CalendarController@destroy')->name('events.destroy');  |
 * ===========================================================================================
 */