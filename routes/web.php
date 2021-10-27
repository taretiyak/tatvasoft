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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','blog@home');
Route::get('/manage','blog@userblog')->middleware('checklogin');
Route::get('/addblog','blog@addblog')->middleware('checklogin');
Route::post('/addblog','blog@addblog')->middleware('checklogin');
Route::get('/editblog/{id}','blog@editblog')->middleware('checklogin');
Route::post('/editblog/{id}','blog@editblog')->middleware('checklogin');
Route::get('/deleteblog/{id}','blog@deleteblog')->middleware('checklogin');
Route::get('/login','Usermgmt@login');
Route::post('/login','Usermgmt@loginsubmit');
Route::get('/signout','Usermgmt@signout');
Route::get('/signup','Usermgmt@signup');
Route::post('/signup','Usermgmt@signupsubmit');