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

// Admin pass: 123456

Route::prefix('admin')->namespace('Backend')->group(function(){
  Route::match(['get','post'], 'login', 'AdminController@login')->name('login');
  Route::group(['middleware'=>['admin']], function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('userDashboard', 'AdminController@userDashboard')->name('userDashboard');
    Route::get('logout', 'AdminController@logout')->name('logout');
    Route::get('settings', 'AdminController@settings')->name('settings');
    Route::get('userPass', 'AdminController@userSettings')->name('userSetting');
    // Route::get('update', 'AdminController@update_pwd');
    Route::post('checkCurrPass', 'AdminController@checkCurrPwd');
    Route::post('updateCurrPass', 'AdminController@updateCurrPwd')->name('updatePass');
    Route::post('userPassUpdate', 'AdminController@userPass')->name('userPass');
    Route::match(['get','post'],'updateDetails', 'AdminController@updateDetails')->name('updateDetails');
    Route::match(['get','post'],'userProfile', 'AdminController@userProfile')->name('userProfile');

    //Logo Controller
    Route::group(['prefix' => 'logo'], function(){
      Route::get('/create','LogoController@create')->name('logo.create');
      Route::get('/edit/{id}','LogoController@edit')->name('logo.edit');
      Route::post('/store','LogoController@store')->name('logo.store');
      Route::post('/update/{id}','LogoController@update')->name('logo.update');
      Route::post('/delete/{id}','LogoController@delete')->name('logo.delete');
      Route::get('/all','LogoController@index')->name('logo.all');
    });
    //Menu Controller
    Route::group(['prefix' => 'menu'], function(){
      Route::get('/create','MenuController@create')->name('menu.create');
      Route::get('/edit/{id}','MenuController@edit')->name('menu.edit');
      Route::post('/store','MenuController@store')->name('menu.store');
      Route::post('/update/{id}','MenuController@update')->name('menu.update');
      Route::post('/delete/{id}','MenuController@delete')->name('menu.delete');
      Route::get('/all','MenuController@index')->name('menu.all');
    });

});
});
