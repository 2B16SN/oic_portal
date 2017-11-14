<?php

namespace App\Http\Controllers\Crawl;

use function GuzzleHttp\Psr7\parse_request;
use Illuminate\Http\Request;
use App\Service\CrawlService;
use App\Service\SQLService;
use App\Http\Controllers\Controller;
use Goutte\Client;

class CrawlController extends Controller
{
    protected $crawlService;

    public function __construct(CrawlService $crawlService)
    {
        $this->crawlService = $crawlService;
    }

    public function customeCheck()
    {
        // TARGET PATH
        $rss_url = 'http://dengekionline.com/'; //サイトURL
        $articles_list_tag = '.artMain h3 a'; // 記事一覧を取得するためのタグ

        // 処理
        $client = new Client();
        $crawler = $client->request('GET', $rss_url);

        // 記事URL取得
        $urls = $crawler->filter($articles_list_tag)->each(function ($node) {
            $results = $node->text();
            return $results;
        });
        dd($urls);

    }

    public function getLists()
    {
        $SQL = new SQLService();

        $sites = $SQL->getRssSites();

        for($j=0; $j<count($sites); $j++)
        {

        }


        // TARGET PATH
        $site_id = 1;
        $url = 'http://feed.rssad.jp/rss/gigazine/rss_2.0';
        $tag_for_url = 'item link';
        $tag_for_title = '.cntimage h1.title';
        $tag_for_image = '.cntimage img';
        $tag_for_text = '.cntimage';

        // 初期設定
        $client = $this->crawlService->makeCrient();
        $urls = $this->crawlService->getLists($client, $url, $tag_for_url);


        $ko = array();

        for ($i = 0; $i < count($urls); $i++) {
            // 記事取得
            $contents = $this->crawlService->getContents($client, $urls[$i]);
            $title = $this->crawlService->getTitle($contents,$tag_for_title);
            $image = $this->crawlService->getImages($contents,$tag_for_image);
            $text = $this->crawlService->getText($contents,$tag_for_text);
            // 不要文字列除去
            //$text = $this->crawlService->replaceWord($text);

            // DB挿入
            $query = $SQL->insertArticle($title[0],$text[0],$image[0],$site_id);
            $ko[$i] = $urls[$i];
        }
        dd($ko);
    }

    public function getRss()
    {
        // TARGET PATH
        $rss_url = 'http://feed.rssad.jp/rss/gigazine/rss_2.0';
        $articles_list_tag = 'item link';

        // 初期設定
        $client = $this->crawlService->makeCrient();
        $crawler = $client->request('GET', $rss_url);
        dd($crawler);

        // 記事URL取得
        $urls = $crawler->filter($articles_list_tag)->each(function ($node) {
            $results = $node->text();
            return $results;
        });


        // DBに一致する記事があるか検索する処理
        $article_url = $urls[0];
        $image_custom_tag = 'div.cntimage a img';

        //　記事イメージを取得
        $article_images = $this->crawlService->get_article_images($client, $article_url, $image_custom_tag);
        /*
        $article_url = $urls[0];
        $crawler = $client->request('GET', $article_url);
        $article_images = $crawler->filter('div.cntimage a img')->each(function ($node) {
            $results = $node->attr('src');
            return $results;
        });
        */


        // 記事イメージ取得失敗時
        if (!$article_images) {

        }

        $article_text_tag = '#article div.cntimage p';

        // 記事本文を取得
        $article_text = $crawler->filter($article_text_tag)->each(function ($node) {
            $result = $node->text();
            return $result;
        });

        // DBに格納

        return view('crawl', compact('urls'));
    }

    public function getImage()
    {
        dd(123);
    }

    public function get()
    {
        $client = new Client();

        $crawler = $client->request('GET', 'http://photoshopvip.net/');


        // 記事URL取得
        $urls = $crawler->filter('#main article div a')->each(function ($node) {
            $results = $node->attr('href');
            return $results;
        });
        dd($urls);

        //dd($crawler->filter('article'));

        return view('crawl', compact('links', 'titles'));

        // タイトル
        $crawler->filter('title')->each(function ($node) {
            echo $node->text();
        });

        //
    }
}
