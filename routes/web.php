<?php

use app\Http\Controllers\Crawl\CrawlController;
use App\Events\MessagePosted;

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

Route::get('/','IndexController@index');

Route::get('/top','TopController@top');
Route::get('/details','DetailsController@details');

Route::get('/like/index','FakeController@fake');

//Route::get('/mypage','FakeController@fake');
Route::get('/mypage','MypageController@mypage');
Route::get('/mypage/edit','FakeController@fake');
Route::get('/mypage/confirm','FakeController@fake');

Route::get('/mypage/follow','FakeController@fake');
Route::get('/user/10484','FakeController@fake');
Route::get('/mypage/block','FakeController@fake');

Route::get('/articles/2017/03','FakeController@fake');
Route::get('/articles/post','FakeController@fake');
Route::get('/articles/post/confirm','FakeController@fake');
Route::get('/articles/post/complete','FakeController@fake');
Route::get('/articles/index','FakeController@fake');
Route::get('/articles/999999/edit','FakeController@fake');
Route::get('/articles/999999','FakeController@fake');

Route::get('/report','FakeController@fake');
Route::get('/report/confirm','FakeController@fake');
Route::get('/report/complete','FakeController@fake');


Route::group(['middleware' => ['web']], function () {

Route::get('/chat', 'MessagesController@chat');
Route::get('/messages', 'MessagesController@getmessages');
Route::post('/messages', 'MessagesController@postmessages');


//Auth
Route::get('/login/google', 'Auth\LoginController@getGoogleAuth');
Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');

Route::post('/register/confirm','Auth\RegisterController@confirm');
Route::post('/register/complete','Auth\RegisterController@complete');

});

Auth::routes();

// crawler
Route::get('/crawl','Crawl\CrawlController@getRss');
Route::get('/crawl2','Crawl\CrawlController@getImage')->name('getImage');
Route::get('/crawl/check','Crawl\CrawlController@customeCheck');