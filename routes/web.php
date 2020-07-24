<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/thanks', 'HomeController@thanks')->name('thanks');

// critical incident form
Route::get('/form/critical', 'CriticalIncidentController@index')->name('formcritical');
Route::post('/form/critical', 'CriticalIncidentController@store')->name('formcriticalpost');

// form A
Route::get('/form/a', 'FormAController@index')->name('forma');
Route::post('/form/a', 'FormAController@store')->name('formapost');

// form B
Route::get('/form/b', 'FormBController@index')->name('formb');
Route::post('/form/b', 'FormBController@store')->name('formbpost');
