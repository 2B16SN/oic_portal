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
Route::get('/contact','ContactsController@show')->name('user_contact');

//お気に入り
Route::get('/like', 'LikeController@index')->name('user_like');


/**
 * 記事
 */
// 一覧
Route::get('/articles/index', 'ArticlesController@index')->name('user_article_list');
// 詳細
Route::get('/articles/{id}', 'ArticlesController@detail')->name('user_article_detail');
// 編集
Route::get('/articles/1000/edit', 'ArticlesController@edit')->name('user_article_edit');
// コメント投稿
Route::post('/articles/{article_id}/comment', 'ArticlesController@store')->name('user_article_comment');
//

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
Route::get('/report', 'FakeController@fake')->name('user_report');

//フォロー
Route::get('/mypage/follow', 'MypagesController@follow')->name('user_mypage_follow');
//フォロワー
Route::get('/mypage/follower', 'MypagesController@follower')->name('user_mypage_follower');

Route::group(['middleware' => ['UserAuth']],function()
{
    /**
     * マイページ
     */

    // マイページ
    Route::get('/mypage', 'MypagesController@show')->name('user_mypage');
    // ユーザページ
    Route::get('/user/1000', 'MypagesController@show_user')->name('user_profile');

    // 編集
    Route::get('/mypage/edit', 'MypagesController@edit')->name('user_mypage_edit');

    /* // フォロー 作業中
    Route::get('/mypage/follow', 'MypagesController@follow')->name('user_mypage_follow');
    */


    // ブロック
    Route::get('/mypage/block', 'FakeController@fake')->name('user_mypage_block');

    // CHAT
    Route::get('/chat', 'MessagesController@chat')->name('user_mypage_chat');

    // MESSAGE
    Route::get('/messages', 'MessagesController@getmessages')->name('user_mypage_message');
    Route::post('/messages', 'MessagesController@postmessages');

});

/**
 * コミュニティ
 */
// 一覧
Route::get('/community', 'CommunityController@index')->name('user_community');
// 詳細
Route::get('/community/{$id}', 'FakeController@show')->name('user_community_detail');

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
// 一覧
Route::get('/event', 'EventController@index');
// 一覧(終了分)  TODO : URL考える
Route::get('/event/kk', 'FakeController@index');
// 詳細
Route::get('/event/1000', 'EventController@show');

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



/**
 * Auth
 */
// Googleログイン
Route::get('/login/google', 'Auth\LoginController@getGoogleAuth')->name('user_login');
Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');
//ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('user_logout');
// 会員登録
Route::post('/register/complete', 'Auth\RegisterController@complete')->name('user_register_complete');


/**
 * Crawler
 */
// test
Route::get('/crawl', 'Crawl\CrawlController@getRss');
Route::get('/crawl2', 'Crawl\CrawlController@getLists')->name('getImage');
Route::get('/crawl/check', 'Crawl\CrawlController@customeCheck');
