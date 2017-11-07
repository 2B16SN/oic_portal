@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/auth/register.css">
@endsection

@section('plug')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/js/register.js"></script>
@endsection


@section('main')

  <div class="title">
    <p class="center-align">新規登録</p>
  </div>

<div class="row_content">
  <form role="form" class="col s12" method="POST" action="{{ url('/register/complete') }}">
    {{ csrf_field() }}

    <div class="input-field col s12">
      <i class="material-icons prefix">account_circle</i>
      <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
      <label for="name">氏名</label>
    </div>

    <div class="input-field col s12">
      <i class="material-icons prefix">edit</i>
      <input id="kana" type="text" class="validate" name="kana" value="{{ old('kana') }}">
      <label for="kana">フリガナ</label>
    </div>

    <div class="input-field col s12">
      <i class="material-icons prefix">mail</i>
      <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
      <label for="email">メールアドレス</label>
    </div>

    <div class="row">
      <div class="input-field rap">
        <select name="sc_year" value="{{ old('sc_year') }}">
               <option value="" disabled selected></option>
               <option value="1" class="left circle">1</option>
               <option value="2" class="left circle">2</option>
               <option value="3" class="left circle">3</option>
               <option value="4" class="left circle">4</option>
             </select>
        <label>学年</label>
      </div>


    <div class="input-field rap">
        <select id="categories" name="major" value="{{ old('major') }}">
            <option data-category="1" value="">学科を選択してください</option>
            <option data-category="2" value="情報処理IT" class="it">情報処理IT</option>
            <option data-category="3" value="ゲーム" class="game">ゲーム</option>
            <option data-category="4" value="CG・映像・アニメーション" class="cg">CG・映像・アニメーション</option>
            <option data-category="5" value="デザイン・Web" class="design">デザイン・Web</option>
        </select>
     <label>学科</label>
    </div>

      <div class="target__select input-field rap" data-category="1">
          <select  name="course" value="{{ old('course') }}">
              <option value="" selected disabled>コースを選択してください</option>
          </select>
          <label>コース</label>
      </div>

    <div class="target__select input-field rap none" data-category="2">
      <select  name="course" value="{{ old('course') }}">
          <option value="1" class="it">ITスペシャリスト専攻</option>
          <option value="2" class="it">ネットワークセキュリティ専攻</option>
          <option value="3" class="it">システムエンジニア専攻</option>
          <option value="4" class="it">ネットワークエンジニア専攻</option>
          <option value="5" class="it">Webエンジニア専攻</option>
          <option value="6" class="it">テクニカルコース</option>
          <option value="7" class="it">ネットワークシステムコース</option>
      </select>
      <label>コース</label>
    </div>

      <div class="target__select input-field rap none" data-category="3">
          <select name="course" value="{{ old('course') }}">
              <option value="ゲームプログラマー専攻" class="game">ゲームプログラマー専攻</option>
              <option value="ゲームデザイナー専攻" class="game">ゲームデザイナー専攻</option>
              <option value="ゲームプランナー専攻" class="game">ゲームプランナー専攻</option>
              <option value="ゲームクリエイター専攻（PG）" class="game">ゲームクリエイター専攻（PG）</option>
              <option value="ゲームクリエイター専攻（CG）" class="game">ゲームクリエイター専攻（CG）</option>
              <option value="ゲームプログラムコース" class="game">ゲームプログラムコース</option>
              <option value="ゲームCGデザインコース" class="game">ゲームCGデザインコース</option>
          </select>
          <label>コース</label>
      </div>

      <div class="target__select input-field rap none" data-category="4">
          <select name="course" value="{{ old('course') }}">
              <option value="CG映像クリエイター専攻" class="cg">CG映像クリエイター専攻</option>
              <option value="CGクリエイター専攻"class="cg">CGクリエイター専攻</option>
              <option value="CG映像コース" class="cg">CG映像コース</option>
              <option value="CGアニメーションコース" class="cg">CGアニメーションコース</option>
          </select>
          <label>コース</label>
      </div>

      <div class="target__select input-field rap none" data-category="5">
          <select name="course" value="{{ old('course') }}">
              <option value="20" class="design">アートディレクター専攻</option>
              <option value="Webデザインコース" class="design">Webデザインコース</option>
              <option value="グラフィックデザインコース" class="design">グラフィックデザインコース</option>
              <option value="マンガイラストコース" class="design">マンガイラストコース</option>
          </select>
          <label>コース</label>
      </div>


    <div class="input-field col s12">
      <i class="material-icons prefix">description</i>
      <input id="portfolio" name="portfolio" type="text" class="validate" value="{{ old('portfolio') }}">
      <label for="portfolio">ポートフォリオ</label>
    </div>

    <div class="input-field col s12">
      <i class="material-icons prefix">chat</i>
      <textarea id="introduction" name="introduction" class="materialize-textarea" value="{{ old('introduction') }}"></textarea>
      <label for="introduction">自己紹介</label>
    </div>

    <div class="row">
        <div class="col s6 center"><button type="button" class="waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
        <div class="col s6 center"><button type="submit" class="waves-effect waves-light btn">送信</button></div>
    </div>

  </form>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection
