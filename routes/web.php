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

Route::get('/login','Auth\LoginController@getLogin');

Route::post('/login','Auth\LoginController@postLogin');

Route::get('/logout', 'HomeController@logoutUser');

Route::post('/loadData','HomeController@loadData');

Route::group(['middleware' => 'userAuth'], function () {
    Route::get('/home', 'HomeController@home');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::get('/delete/{id}', 'UserController@delete');
    Route::post('/update', 'UserController@update');
    Route::get('/editphotograph/{id}', 'PhotographsController@photographEdit');
    Route::get('/insertphotograph', 'PhotographsController@insertPhotograph');
    Route::get('/deletephotograph/{id}', 'PhotographsController@photographDelete');
    Route::post('/createphotograph', 'PhotographsController@photographCreate');
    Route::get('/photographslist', 'PhotographsController@photographsList');
    Route::post('/updatephotograph', 'PhotographsController@photographUpdate');
    Route::post('/checkEmail', 'PhotographsController@checkEmail');
});