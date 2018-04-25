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


Route::get('/','PageController@index');
Route::get('/lang/{lang_code}','LangController@changelang');
Route::group(['middleware' => 'auth'],function(){
	Route::get('/manageSubject','PageController@manageSubject');
	Route::post('/manageSubject','PageController@newCourse');
	Route::get('/profile','PageController@profile');
	Route::post('/profile','PageController@profile_update');
	Route::get('/teacher_ta_setting','PageController@teacher_ta_setting');
});






$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);
Route::get('login/google','Auth\LoginController@redirectToProvider');
Route::get('login/google/callback','Auth\LoginController@handleProviderCallback');
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/auth/login', 'HomeController@index')->name('home');
