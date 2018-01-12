@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/like/like.css">
@endsection

@section('main')

  <div class="row center-align">
    <h1 class="title">
      お気に入り
    </h1>
  </div>

  <div class="row">
    <form class="edit" action="" method="post">
      <div class="edit-form col s12 right-align">
        <a id="edit-btn" class="waves-effect waves-light btn">編集</a>
      </div>
      @foreach($article_lists as $article_list)
    <div class="card-box col s4">
      <div class="card hoverable">
        <div class="card-wrapper">
          <div class="card-image">
            <a href="{{ $article_list->article_url }}"><img src="{{ $article_list->article_image }}"></a>
          </div>
        <div class="card-stacked">
          <a href="{{ route('user_article_detail',1) }}"></a>
          <div class="card-content">
            <span class="card-title">{{ $article_list->article_title }}</span>
            <p class="card-text">{{ $article_list->article_text }}</p>
          </div>
          <div class="card-action">
            <a href="{{ $article_list->article_url }}">続きを読む</a>
            <div class="tags">
              <div class="chip">
                IT
              </div>
              <div class="chip">
                デザイン
              </div>
              <div class="chip">
                映像
              </div>
              <div class="chip">
                ゲーム
              </div>
            </div>
            {{--
            <div class="chkbox">
              <input type="checkbox" name="article" id="check{{ $i }}">
              <label for="check{{ $i }}"></label>
              --}}
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="delete-form col s12 center">
      <a id="delete-btn" class="del-btn waves-effect waves-light modal-trigger btn" href="#modal1">削除</a>
    </div>

    <div id="modal1" class="modal">
      <div class="modal-content">
        <h1>選択した項目を削除しますか？</h1>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">キャンセル</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
      </div>
  </div>

  </form>
  </div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
  $(document).ready(function (){
    $('#delete-btn').css('display','none');
    $('.chkbox').css('display','none');
  });
  </script>

  <script type="text/javascript">
  $(function() {
    $('#edit-btn').click(function(){
        $('#delete-btn').toggle();
        $('.chkbox').toggle();
        $('.chip').toggle();
    });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
  // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
  $('.modal').modal();
  });
  </script>
@endsection
