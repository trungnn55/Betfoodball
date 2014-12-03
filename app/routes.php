<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Login
Route::get('login', array( 'as'=>'login', 'uses'=>'AccountController@getLogin'));
Route::post('login', 'AccountController@postLogin');

// Logout
Route::get('logout', array( 'as'=>'logout', 'uses'=>'AccountController@getLogout'));

// Register
Route::get('register', array( 'as'=>'register', 'uses'=>'AccountController@getRegister'));
Route::post('register', 'AccountController@postRegister');

// Index
Route::get('index', array( 'as'=>'index', 'before'=>'guest', 'uses'=>'BetController@getIndex'));

// Change Password
Route::get('changepassword', array('as'=>'changepassword', 'uses'=>'AccountController@getChangePassword'));
Route::post('changepassword', 'AccountController@postChangePassword');

// Admin add match
Route::get('admin/addmatch', array('as'=>'admin.addmatch', 'before'=>'auth.admin', 'uses'=>'AdminController@getAdminAddMatch'));
Route::post('admin/addmatch', 'AdminController@postAdminAddMatch');

// Admin add team
Route::get('admin/addteam', array('as'=>'admin.addteam', 'before'=>'auth.admin', 'uses'=>'AdminController@getAdminAddTeam'));
Route::post('admin/addteam', 'AdminController@postAdminAddTeam');

// Match
Route::get('match/{id}', array('as'=>'match', 'before'=>'guest', 'uses'=>'BetController@getMatch'));
Route::post('match/{id}', array('as'=>'postmatch', 'uses'=> 'BetController@postMatch')); 
Route::get('viewmatch/{id}', array('as'=>'viewmatch', 'before'=>'guest', 'uses'=>'BetController@getViewMatch'));

// Update Result
Route::get('result/{id}', array('as'=>'result', 'before'=>'auth.admin', 'uses'=>'AdminController@getUpdateResult'));
Route::post('result/{id}', array('as'=>'postresult', 'uses'=>'AdminController@postUpdateResult'));
Route::get('updateresult/{id}', array('as'=>'updateresult', 'before'=>'auth.admin', 'uses'=>'AdminController@getReupdateResult'));
Route::post('updateresult/{id}', array('as'=>'postupdateresult', 'uses'=>'AdminController@postReupdateResult'));