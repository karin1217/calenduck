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


/** 主页 **/
Route::get('/', 'PagesController@root')->name('root');
/** 生成认证相关路由 **/
Auth::routes();
/**
 * =================================================================================================================
 *                                                                                                                  |
 *                                上 述 代 码 等 同 于                                                                |
 *                                                                                                                  |
 * -----------------------------------------------------------------------------------------------------------------
 *   // Authentication Routes...                                                                                    |
 *   Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');                                      |
 *   Route::post('login', 'Auth\LoginController@login');                                                            |
 *   Route::post('logout', 'Auth\LoginController@logout')->name('logout');                                          |
 *                                                                                                                  |
 *   // Registration Routes...                                                                                      |
 *   Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');                      |
 *   Route::post('register', 'Auth\RegisterController@register');                                                   |
 *                                                                                                                  |
 *   // Password Reset Routes...                                                                                    |
 *   Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');   |
 *   Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');     |
 *   Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');    |
 *   Route::post('password/reset', 'Auth\ResetPasswordController@reset');                                           |
 * ==================================================================================================================
 */

Route::get('/home', 'HomeController@index')->name('home');

/**
 * 言語切替
 */
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);



Route::get('/help', 'StaticPagesController@help');
Route::get('/about', 'StaticPagesController@about');
Route::get('/test', 'StaticPagesController@test');

Route::get('/baby/', 'StaticPagesController@baby');
Route::get('/main/', 'StaticPagesController@main');
Route::get('/slider/', 'StaticPagesController@slider');
Route::get('/calendar', 'StaticPagesController@calendar');

Route::resource('/users', 'UsersController', ['only'=>['show','update','edit']]);
/** 注册 **/
Route::get('/signup', 'UsersController@create')->name('signup');
Route::get('/signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
/** 关注列表 **/
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
/** 粉丝列表 **/
Route::get('/users/{user}/fans', 'UsersController@fans')->name('users.fans');

/** 添加关注 **/
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
/** 删除关注 **/
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

/** 登录 **/
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('login');
Route::delete('/logout', 'SessionsController@destroy')->name('logout');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

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

Route::resource('/blogs', 'BlogsController', ['only'=>['store','destroy']]);
