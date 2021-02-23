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

// Images
Route::get('/', 'App\Http\Controllers\ImageController@displaySearchImage');
Route::get('/ajout', 'App\Http\Controllers\ImageController@displayAddImage');
Route::post('/upload', 'App\Http\Controllers\ImageController@uploadImage');

// Auth
Route::get('/connexion', 'App\Http\Controllers\AuthController@displayLogin');
Route::post('/login-to-strapi', 'App\Http\Controllers\AuthController@loginToStrapi');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
