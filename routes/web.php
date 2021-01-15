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

Route::pattern('id', '[0-9]+');

Route::get('/', 'ViewController@home')->name('home')->middleware('checkIp');
Route::get('/contact', 'ViewController@contact')->name('contact');
Route::get('/contact/submit', 'ContactController@checkContactForm')->name('check-contact');


Route::get('/cart', 'ViewController@cart')->name('cart');
Route::get('/about', 'ViewController@about')->name('about');
Route::get('/faq', 'ViewController@faq')->name('faq');

//izlistavanje filmova, filter na osnovu zanra i prikaz svakog filma pojedinacno
Route::group(['prefix' => '/movies'], function(){
    Route::get('/', 'MovieController@listMovies')->name('movies');
    Route::get('/{id}', 'MovieController@listSingleMovie')->name('single_movie');
    Route::get('/genre/{id}', 'MovieController@listMoviesGenre')->name('movies_genre');
    Route::get('/sort-by/{id}', 'MovieController@listMoviesFilter')->name('movies_filter');
});

//logovanje
Route::post('/login-user', 'AuthController@login')->name('login-user');
Route::get('/logout-user', 'AuthController@logout')->name('logout-user');

//registracija
Route::get('/register', 'AuthController@showForms')->middleware('isLogged', 'activitySignUp')->name('register');
Route::post('/register-user', 'AuthController@signup')->name('signup');
//Route::get('/admin', 'AdminController@metod')->middleware('checkIp');

//Admin panel - resurs kontroleri
Route::resource('/admin-panel/users', 'AdminUserController')->middleware('isAdmin');
Route::resource('/admin-panel/movies', 'AdminMoviesController')->middleware('isAdmin');
Route::resource('/admin-panel/slider', 'AdminSliderController')->middleware('isAdmin');
Route::get('/admin-panel/activity', 'AdminActivityController@index')->middleware('isAdmin');
Route::get('/admin-panel/connections', 'AdminActivityController@connections')->middleware('isAdmin');




