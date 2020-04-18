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

Route::get('/', 'PageController@index')->name('home');
Route::get('/contribute', 'PageController@contribute')->name('contribute');
Route::get('/category/{slug}', 'PageController@category')->name('category');
Route::get('/questions', 'PageController@yourQuestions')->name('questions');

Route::get('/login', 'DiscordController@login')->name('login');
Route::get('/callback', 'DiscordController@callback');

Route::post('/contribute', 'QuestionController@create')->name('new_question');

Route::get('/logout', 'DiscordController@logout')->name('logout');
