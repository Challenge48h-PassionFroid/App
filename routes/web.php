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

Route::get('/', 'App\Http\Controllers\ImageController@displaySearchImage');
Route::get('/ajout', 'App\Http\Controllers\ImageController@displayAddImage');
Route::get('/connexion', 'App\Http\Controllers\AuthController@displayLogin');
Route::post('/login-to-strapi', 'App\Http\Controllers\AuthController@loginToStrapi');
