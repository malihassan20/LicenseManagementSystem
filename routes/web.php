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

Route::get('/','Admin\UserController@checkLogin');

Route::post('login','Admin\UserController@login');

Route::get('forgetPassword',function(){
    return view('User.forgetPassword');
});

Route::post('sendForgetMail','Admin\UserController@sendForgetMail');

Route::group(['middleware' => 'checkSessionExists'], function()
{
    Route::get('dashboard','Admin\UserController@dashboard');

    Route::get('logout','Admin\UserController@logout');
    Route::get('profile','Admin\UserController@displayProfile');
    Route::get('editProfile','Admin\UserController@editProfile');
    Route::post('profile','Admin\UserController@updateProfile');

    //client
    Route::resource('client','Admin\ClientController');

    //project
    Route::resource('project','Admin\ProjectController');

    //license
    Route::resource('license','Admin\LicenseController');

    //license
    Route::resource('type','Admin\TypeController');

    //license
    Route::resource('technology','Admin\TechnologyController');

});
