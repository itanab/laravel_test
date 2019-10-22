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

Route::get('/api', 'ApiController@index');

//??
Route::get('/api/search/people', 'ApiController@search_people');
Route::get('/api/cast_and_crew', 'ApiController@cast_and_crew');

//excercise with forms and post
Route::get('/test/form', 'ApiController@form');
Route::get('/test/form', 'ApiController@handleForm');


//excercise from wednesday
Route::get('/api/movies', 'MovieController@movies');
Route::get('/api/movies/list', 'MovieController@index');
Route::get('/api/movies/cast_and_crew', 'MovieController@cast_and_crew');

Route::get('/api/movies/show', 'MovieController@show');

//reviews
Route::get('/api/review', 'Api\ReviewController@index');
Route::post('/api/review', 'ReviewController@store');

//ratings

Route::get('/api/rating', 'Api\RatingController@index');
Route::post('/api/rating', 'Api\RatingController@store');
Route::put('/api/rating', 'Api\RatingController@update');

//morning workout
Route::get('/api/movies/top_rated', 'MovieController@top_rated');
Route::get('/api/movies/movie_of_the_week', 'MovieController@movie_of_the_week');

//morning workout monday
Route::post('/api/collection', 'CollectionController@store');
Route::get('/api/list/user', 'CollectionController@user_lists');

//Route::resource('/api/review', 'ReviewController');
//Route::resource('/api/rating', 'RatingController');

//morning workout favorite movies

Route::post('/api/movies/favorite/toggle', 'Api\FavoriteMovieController@toggle');
Route::get('/api/movies/favorite', 'Api\FavoriteMovieController@status');