<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsSitesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sites_master', function (Blueprint $table) {
            $table->increments('id');//ニュースサイトID
            $table->string('news_site_name', 255);//ニュースサイト名
            $table->string('news_site_url', 255);//ニュースサイトURL
            $table->string('news_site_tag_title', 255);//カスタムタグ(記事タイトル)
            $table->string('news_site_tag_url', 255);//カスタムタグ(記事URL)
            $table->string('news_site_tag_text', 255);//カスタムタグ(記事本文)
            $table->string('news_site_tag_image', 255);//カスタムタグ(記事画像)
            $table->integer('news_site_category_id');//ニュースサイトカテゴリID
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news_sites_master');
    }
}
