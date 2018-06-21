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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * 系统管理
 */
Route::namespace('System')->group(function(){
    /**
     * 登录/退出
     */
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    /**
     * 注册
     */
//    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'RegisterController@register');

    /**
     * 用户角色权限管理
     */
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});



