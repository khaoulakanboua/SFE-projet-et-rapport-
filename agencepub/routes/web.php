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

Route::get('/', function () { 
    return view('welcome');
});
 
/*Route::get('pubs', 'PubController@index');
Route::get('pubs/create', 'PubController@create');
Route::post('pubs', 'PubController@store');
Route::get('pubs/{id}/edit', 'PubController@edit');
Route::put('pubs/{id}', 'PubController@update');
Route::delete('pubs/{id}', 'PubController@destroy');*/

Route::resource('pubs','PubController');

Route::get('/getexperiences/{id}','PubController@getExperiences');
Route::post('/addexperience','PubController@addExperience');
Route::put('/updateexperience','PubController@updateExperience');
Route::delete('/deleteexperience/{id}','PubController@deleteExperience');
Route::get('/user/activation/{token}','Auth\RegisterController@userAvtivation');

Route::get('/search', 'PubController@search');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pub/{id}', 'PubController@profile')->name('user.profile');
Route::get('/edit/pub/', 'PubController@editer')->name('user.edit');
Route::post('/edit/pub/', 'PubController@updater')->name('user.update');
Route::get('/edit/password/pub/', 'PubController@passwordEdit')->name('password.edit');
Route::post('/edit/password/pub/','PubController@passwordUpdate')->name('password.update');

/*Route::get('publication', 'PublicationController@index');
Route::get('publications/create', 'PublicationController@create');
Route::post('publications', 'PublicationController@store');
Route::get('publications/{id}/edit', 'PublicationController@edit');
Route::put('publications/{id}', 'PublicationController@update');
Route::delete('publications/{id}', 'PublicationController@destroy');*/
Route::resource('publications','PublicationController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


 Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('fblogin');
 Route::get('/login/facebook/callback','Auth\LoginController@handleFacebookCallback')->name('fbcallback');

 Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('gologin');
 Route::get('/login/google/callback','Auth\LoginController@handleGoogleCallback')->name('gocallback');
 Route::post('/comments/{publication}','CommentController@store')->name('comments.store');
 Route::post('/commentReply/{comment}','CommentController@storeCommentReply')->name('comments.storeReply');