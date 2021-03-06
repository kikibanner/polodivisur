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

Route::get('/','AuthController@login')->name('ndasmu');

Route::get('/login','AuthController@login')->name('login');
Route::post('postlogin','AuthController@postlogin');
Route::get('logout','AuthController@logout');

Route::get('details', function () {

	  $ip = '50.90.0.1';
    $data = \Location::get($ip);
    dd($data);

});

Route::get('/rs', 'RsController@index');
Route::get('/rs/export_excel', 'RsController@export_excel');
Route::post('/rs/import_excel', 'RsController@import_excel');

Route::middleware(['auth','CheckRole:admin'])->group(function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/dashboard','IpoltController@index');
    Route::post('ipolt/create','IpoltController@create');
    Route::get('/ipolt/{id}/edit','IpoltController@edit');
    Route::post('/ipolt/{id}/update','IpoltController@update');
    Route::get('/ipolt/{id}/delete','IpoltController@delete');
    Route::get('/ipolt/{id}/detail', 'IpoltController@detail');

    Route::get('/pengaturan', 'UserController@index');
    Route::post('/pengaturanpost', 'UserController@create');
    Route::get('/profil/{id}/edit','UserController@edit');
    Route::post('/profil/{id}/update','UserController@update');
    Route::get('/profil/{id}/delete','UserController@delete');
    Route::get('/profil/{id}/detail', 'UserController@detail');

    Route::resource('ajaxuncfg','UncfgController');
});

Route::middleware(['auth','CheckRole:admin,user'])->group(function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/ipolt','IpoltController@index');
    Route::get('/ipolt/{id}/detail', 'IpoltController@detail');

    Route::get('/profil/{id}/detail', 'UserController@detail');
    Route::get('/profil/{id}/edit','UserController@edit');

    Route::resource('ajaxuncfg','UncfgController');
});
