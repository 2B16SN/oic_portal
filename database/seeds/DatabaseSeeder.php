<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersSeeder');
        $this->call('AuthoritiesMasterSeeder');
        $this->call('ProfilesTableSeeder');
        $this->call('CoursesMasterSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('ArticlesLikesTableSeeder');
        $this->call('ArticlesCommentsTableSeeder');
        $this->call('ReportsTableSeeder');
        $this->call('ReportsDealsTableSeeder');
        $this->call('ReportsCategoriesMasterSeeder');
        $this->call('FriendsTableSeeder');
        $this->call('CommunitiesCategoriesMasterSeeder');
        $this->call('CommunitiesTableSeeder');
        $this->call('CommunitiesParticipantsTableSeeder');
        $this->call('CommunitiesCommentsTableSeeder');
        $this->call('NewsSitesMasterSeeder');
        $this->call('NewsSitesCategoriesMasterSeeder');
        $this->call('EventsTableSeeder');
        $this->call('EventsParticipantsTableSeeder');
        $this->call('ReportsRisksDealStatusMasterSeeder');
        $this->call('ReportsRisksCategoriesMasterSeeder');
        $this->call('EventsAuthoritiesTableSeeder');
        $this->call('ChatsTableSeeder');

        Model::reguard();
    }
}

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'email' => 'b9999@oic.jp',
            'name' => '山田太郎',
            'name_kana' => 'ヤマダタロウ',
            'authority_id' => 1,
            'course_id' => 1,
            'profile_id' => 1
        ]);
    }
}

class AuthoritiesMasterSeeder extends Seeder
{
    public function run()
    {
        $authorities = ['一般','サブ管理者','管理者'];
        DB::table('authorities_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('authorities_master')->insert([
                'authority_name' => $authorities[$i]
            ]);
        }
    }
}

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles_table')->delete();
        DB::table('profiles_table')->insert([
            'profile_image' => '',
            'profile_name' => 'ホゲ',
            'course_id' => 1
        ]);
    }
}

class CoursesMasterSeeder extends Seeder
{
    public function run()
    {
        $categories = ['総合情報メディア','',''];
        DB::table('courses_master')->delete();
        for($i = 0; $i < count($i); $i++) {
            DB::table('courses_master')->insert([
                'course_name' => $categories[$i],
                'parent_course_id' => 1,
                'course_depth' => 1
            ]);
        }
    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_table')->delete();
        DB::table('articles_table')->insert([
            'article_title' => '新商品',
            'article_text' => '新商品が',
            'article_image' => '',
            'news_site_id' => 1
        ]);
    }
}

class ArticlesLikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_likes_table')->delete();
        DB::table('articles_likes_table')->insert([
            'article_id' => 1,
            'user_id' => 1
        ]);
    }
}

class ArticlesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles_comments_table')->delete();
        DB::table('articles_comments_table')->insert([
            'article_id' => 1,
            'user_id' => 1,
            'article_comment_text' => 'あああああああ'
        ]);
    }
}

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_table')->delete();
        DB::table('reports_table')->insert([
            'report_category_id' => 1,
            'user_id' => 1,
            'report_contents' => 'テスト',
            'report_deal_status_id' =>1
        ]);
    }
}

class ReportsDealsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports_deals_table')->delete();
        DB::table('reports_deals_table')->insert([
            'report_id' => 1,
            'user_id' => 1,
            'report_deal_comment' => '削除しました'
        ]);
    }
}

class ReportsCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportCategories = ['不適切','誹謗中傷','規約違反'];
        DB::table('reports_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('reports_categories_master')->insert([
                'report_category_name' => $reportCategories[$i],
                'report_risk_id' => 1
            ]);
        }
    }
}

class FriendsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('friends_table')->delete();
        DB::table('friends_table')->insert([
            'user_id' => 1,
            'user2_id' => 1
        ]);
    }
}

class CommunitiesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $communitiesCategories = ['#test1','#test2','#test3'];
        DB::table('communities_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('communities_categories_master')->insert([
                'community_category_name' => $communitiesCategories[$i]
            ]);
        }
    }
}

class CommunitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_table')->delete();
        DB::table('communities_table')->insert([
            'community_title' => '会',
            'community_contents' => 'あああああ',
            'authority_id' => 1
        ]);
    }
}

class CommunitiesParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_participants_table')->delete();
        DB::table('communities_participants_table')->insert([
            'community_id' => 1,
            'user_id' => 1
        ]);
    }
}

class CommunitiesCommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('communities_comments_table')->delete();
        DB::table('communities_comments_table')->insert([
            'community_id' => 1,
            'user_id' => 1,
            'community_comment_contents' => 'コミュニティコメント'
        ]);
    }
}

class NewsSitesMasterSeeder extends Seeder
{
    public function run()
    {
        DB::table('news_sites_master')->delete();
        DB::table('news_sites_master')->insert([
            'news_site_url' => '',
            'news_site_tag_title' => 'ITメディア',
            'news_site_tag_article' => 'ああああ',
            'news_site_tag_image' => '',
            'news_site_category_id' => 1
        ]);
    }
}

class NewsSitesCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $newsSitesCategories = ['#test1','#test2','#test3'];
        DB::table('news_sites_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('news_sites_categories_master')->insert([
                'news_site_category_name' => $newsSitesCategories[$i]
            ]);
        }
    }
}

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_table')->delete();
        DB::table('events_table')->insert([
            'event_title' => '勉強会',
            'event_text' => '勉強会開催します',
            'event_start_date_time' => 20170101,
            'event_end_date_time' => 20171231,
            'event_marker_id' => 1
        ]);
    }
}

class EventsParticipantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events_participants_table')->delete();
        for ($i = 0; $i < 10; $i++){
            DB::table('events_participants_table')->insert([
                'event_id' => $i,
                'event_user_id' => $i,
                'event_authority_id' => $i
            ]);
        }
    }
}

class ReportsRisksDealStatusMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksDealStatus = ['対処待ち', '対処中', '対処済'];
        DB::table('reports_risks_deal_status_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('reports_risks_deal_status_master')->insert([
                'report_risk_deal_status_name' => $reportsRisksDealStatus[$i]
            ]);
        }
    }
}

class ReportsRisksCategoriesMasterSeeder extends Seeder
{
    public function run()
    {
        $reportsRisksCategories = ['#test1','#test2','#test3'];
        DB::table('reports_risks_categories_master')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('reports_risks_categories_master')->insert([
                'report_risk_category_name' => $reportsRisksCategories[$i],
                'report_risk_num' => 1
            ]);
        }
    }
}

class EventsAuthoritiesTableSeeder extends Seeder
{
    public function run()
    {
        $eventsAuthorities = ['#test1', '#test2', '#test3'];
        DB::table('events_authorities_table')->delete();
        for ($i = 0; $i < count($i); $i++) {
            DB::table('events_authorities_table')->insert([
                'event_authority_name' => $eventsAuthorities[$i]
            ]);
        }
    }
}

class ChatsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('chats_table')->delete();
        DB::table('chats_table')->insert([
            'chat_user_id' => 1,
            'chat_user2_id' => 1,
            'chat_text' => ''
        ]);
    }
}