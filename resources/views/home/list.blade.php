@extends('template/master')
@section('css')
    <link rel="stylesheet" href="/css/top/top.css">
@endsection
@section('nav-tab')
    <div class="nav-wrapper">
        <ul class="left">
          @if(Auth::guest())
            <li class="tab_link active"><a href="{{ route('user_home') }}">ホーム</a></li>
            <li class="tab_link"><a href="{{ route('user_community') }}">コミュニティ</a></li>
            <li class="tab_link"><a href="{{ route('user_event') }}">イベント</a></li>
            <li class="tab_link"><a href="{{ route('user_contact') }}">お問い合わせ</a></li>
          @else
            <li class="tab_link active"><a href="{{ route('user_home') }}">ホーム</a></li>
            <li class="tab_link"><a href="{{ route('user_mypage') }}">マイページ</a></li>
            <li class="tab_link"><a href="{{ route('user_article_write') }}">記事を投稿する</a></li>
            <li class="tab_link"><a href="{{ route('user_article_favlist') }}">お気に入り記事</a></li>
            <li class="tab_link"><a href="{{ route('user_community') }}">コミュニティ</a></li>
            <li class="tab_link"><a href="{{ route('user_event') }}">イベント</a></li>
            <li class="tab_link"><a href="{{ route('user_contact') }}">お問い合わせ</a></li>
           @endif
            {{-- <li class="tab_link active"><a href="{{ route('user_home') }}">新着ニュース</a></li>
            <li class="tab_link"><a href="{{ route('user_it') }}">IT・ビジネス系</a></li>
            <li class="tab_link"><a href="{{ route('user_game') }}">ゲーム系</a></li>
            <li class="tab_link"><a href="{{ route('user_movie') }}">映像・CG・アニメーション</a></li>
            <li class="tab_link"><a href="{{ route('user_design') }}">デザイン・WEB系</a></li>
            <li class="tab_link_drb"><a class="dropdown-button" href="#!" data-activates="dropdown1">表示する記事ジャンルを選択<i class="material-icons right">arrow_drop_down</i></a></li> --}}
        </ul>

        {{-- <ul id="dropdown1" class="dropdown-content">
          <li class="active"><a href="{{ route('user_home') }}">新着ニュース</a></li>
          <li><a href="{{ route('user_it') }}">IT・ビジネス系</a></li>
          <li><a href="{{ route('user_game') }}">ゲーム系</a></li>
          <li><a href="{{ route('user_movie') }}">映像・CG・アニメーション</a></li>
          <li><a href="{{ route('user_design') }}">デザイン・WEB系</a></li>
        </ul> --}}
    </div>
@endsection
@section('main')
  @include('common.top_card')
@endsection

@section('script')
    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(document).ready(function () {
            $('select').material_select();
        });

        $(".dropdown-button").dropdown();
    </script>
@endsection
