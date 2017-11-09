@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/post.css">
@endsection

@section('main')

<div class="content">
  <form class="col s10">
    <div class="input-field col s12">
      <input placeholder="タイトル" id="first_name" type="text" class="validate">
      <label for="first_name">タイトル</label>
    </div>
      <div class="input-field col s12">
        <textarea id="textarea1" class="materialize-textarea" data-length="120"></textarea>
        <label for="textarea1">記事本文</label>
      </div>
      <div class="file-field input-field">
          <input type="file" multiple>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="画像選択">
          <label for="image">画像選択</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <select>
            <option value="" disabled selected></option>
            <option value="1">すべて</option>
            <option value="2">情報処理・IT</option>
            <option value="3">ゲーム</option>
            <option value="4">CG・映像・アニメーション</option>
            <option value="5">デザイン・web</option>
          </select>
          <label>ジャンル</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="datepicker">
          <label for="password">掲載期間</label>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
      <div class="col s6 right-align"><button type="button" class="waves-effect waves-light btn">戻る</button></div>
      <div class="col s6 left-align"><button type="submit" class="waves-effect waves-light btn">確認</button></div>
  </div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false // Close upon selecting a date,
    });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
  $('select').material_select();
});
  </script>
@endsection
