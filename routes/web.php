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

Route::get('/','sessionController@getLogin');
Route::get('/register', function () {
    return view('register');
});
Route::resource('lists','ListsController');

Route::prefix('lists')->group(function (){
    Route::get('/{header}/{id}','ListsController@deleteItem');
    Route::post('/addItem/{header}','ListsController@addItem');
    Route::post('/edit/{header}/{id}','ListsController@editItem');

});

Route::post('/register','sessionController@register');
Route::post('/checkEmail','sessionController@checkEmail');
Route::post('/login','sessionController@login');
Route::get('/logout','sessionController@destroy');

Route::prefix('login')->group(function (){
    Route::get('/facebook', 'SocialAuthFacebookController@redirect');
    Route::get('/facebookCallback', 'SocialAuthFacebookController@callback');
    Route::get('/github', 'SocialAuthGithubController@redirect');
    Route::get('/githubCallback', 'SocialAuthGithubController@callback');
});

