<?php

use app\Http\Controllers\Crawl\CrawlController;
use app\Http\Controllers\ArticlesController;

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

/**
 *  一般
 */
// ホーム
Route::get('/', 'HomeController@index')->name('user_home');

// 問い合わせ

//お気に入り
Route::get('/like', 'LikeController@index');


/**
 * 記事
 */
// 一覧
Route::get('/articles/index', 'ArticlesController@index')->name('user_article_list');
// 詳細
Route::get('/articles/1000', 'ArticlesController@detail')->name('user_article_detail');
// 編集
Route::get('/articles/1000/edit', 'ArticlesController@edit')->name('user_article_edit');

// TODO : URL設計
Route::get('/articles/2017/03', 'ArticlesController@fake');

// 投稿
Route::get('/articles/post', 'ArticlesController@fake')->name('user_article_post');
// 確認
Route::get('/articles/post/confirm', 'ArticlesController@fake')->name('user_article_post_confirm');
// 完了 TODO : いる？
Route::get('/articles/post/complete', 'ArticlesController@fake')->name('user_article_post_complete');


/**
 * 通報
 */
Route::get('/report', 'FakeController@fake');
Route::get('/report/confirm', 'FakeController@fake');
Route::get('/report/complete', 'FakeController@fake');


/**
 * AUTH
 */
//Route::group(['middleware' => ['UserAuth']], function () {
    /**
     * マイページ
     */
    // マイページ
    Route::get('/mypage', 'MypagesController@show')->name('user_mypage');
    // ユーザページ
    Route::get('/user/1000', 'FakeController@fake');

    // 編集
    Route::get('/mypage/edit', 'MypagesController@edit')->name('user_mypage_edit');

    // フォロー
    Route::get('/mypage/follow', 'FakeController@fake');
    // ブロック
    Route::get('/mypage/block', 'FakeController@fake');

    // CHAT
    Route::get('/chat', 'MessagesController@chat');

    // MESSAGE
    Route::get('/messages', 'MessagesController@getmessages');
    Route::post('/messages', 'MessagesController@postmessages');

    // });

/**
 * コミュニティ
 */
// 一覧
Route::get('/community', 'FakeController@index');
// 詳細
Route::get('/community/{$id}', 'FakeController@show');

// 更新
Route::get('/community/1000/edit', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/community/1000/edit/confirm', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/community/1000/edit/complete', 'FakeController@edit');

// 新規作成
Route::get('/community/new', 'FakeController@make');
// 新規作成-確認
Route::get('/community/new/confirm', 'FakeController@make');
// 新規作成-完了
Route::get('/community/new/complete', 'FakeController@fake');


/**
 *  イベント
 */
<<<<<<< HEAD
    // Route::get('/mypage','MypagesController@show')->name('user_mypage');
    // Route::get('/mypage/edit','MypagesController@edit')->name('user_mypage_edit');
    // Route::get('/mypage/confirm','FakeController@fake');
    //
    // Route::get('/mypage/follow','FakeController@fake');
    // Route::get('/user/10484','FakeController@fake');
    // Route::get('/mypage/block','FakeController@fake');
});

    Route::get('/mypage','MypagesController@show')->name('user_mypage');
    Route::get('/mypage/edit','MypagesController@edit')->name('user_mypage_edit');
    Route::get('/mypage/confirm','FakeController@fake');

    Route::get('/mypage/follow','FakeController@fake');
    Route::get('/user/10484','FakeController@fake');
    Route::get('/mypage/block','FakeController@fake');
=======
// 一覧
Route::get('/event', 'FakeController@index');
// 一覧(終了分)  TODO : URL考える
Route::get('/event/', 'FakeController@index');
// 詳細
Route::get('/event/1000', 'FakeController@show');

// 更新
Route::get('/event/1000/edit', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/event/1000/edit/confirm', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/event/1000/edit/complete', 'FakeController@edit');

// 新規作成
Route::get('/event/new', 'FakeController@make');
// 新規作成-確認
Route::get('/event/new/confirm', 'FakeController@make');
// 新規作成-完了   TODO : 関数名変更
Route::get('/event/new/complete', 'FakeController@fake');


>>>>>>> 1049288094192935f199067388f15c042cd16db2

/**
 * Auth
 */
// 認証
Route::get('/login/google', 'Auth\LoginController@getGoogleAuth')->name('user_login');
Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');
Route::post('/logout', 'Auth\LoginController@logout')->name('user_logout');

// 会員登録
Route::post('/register/complete', 'Auth\RegisterController@complete')->name('user_register_complete');;

Auth::routes();


/**
 * Crawler
 */
// test
Route::get('/crawl', 'Crawl\CrawlController@getRss');
Route::get('/crawl2', 'Crawl\CrawlController@getLists')->name('getImage');
Route::get('/crawl/check', 'Crawl\CrawlController@customeCheck');
