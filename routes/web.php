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
     * 用户信息管理
     */
    Route::get('user', 'UserController@index');             // 展示用户列表页面
    Route::get('user/info', 'UserController@info');         // 获取单个用户信息接口
    Route::get('user/list', 'UserController@list');         // 获取用户列表数据接口
    Route::get('user/create', 'UserController@create');     // 新增用户信息页面
    Route::get('user/edit', 'UserController@edit');         // 修改用户信息页面
    Route::post('user', 'UserController@save');             // 保存用户信息接口
    Route::post('user/status', 'UserController@status');    // 修改用户状态接口
    Route::delete('user', 'UserController@delete');         // 删除用户信息接口
    /**
     * 用户密码管理
     */
    Route::get('password/edit', 'PasswordController@edit'); // 修改用户密码页面
    Route::post('password', 'PasswordController@save');     // 保存用户密码接口



    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});



