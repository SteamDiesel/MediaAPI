<?php

use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/post', 'PostController@store')->name('post.store');
Route::get('/post/{post}/edit', 'PostController@edit');
Route::post('/post/{post}/update', 'PostController@update');
Route::post('/post/{post}/photo', 'PostController@photo');
Route::post('/update_post_photo/{id}', 'PostController@updatephoto');

