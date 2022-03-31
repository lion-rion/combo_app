@extends('layout')
@section('title','ブログ詳細') <!--タイトルはコンボのタイトルに設定するとイイかも？？-->
@section('content')
      <!--中央メニューのラップ-->
<div class="post_content_wrap">
  <section class="post_section_wrap">
    <div class="post_info_wrap">
      <!--投稿者情報を記載(アイコンを追加したらよさそう)-->
      <div class="flex_space_between" >
        <div class="flex post_info">
          <a href="/profile/{{ $post->user->id }}"><img class="user_image" src="{{ asset('image/'.$post->user->profile_image) }}" alt=""><!--プロフ画像追加--></a>
          <a href="/profile/{{ $post->user->id }}"><p class="user_id"><span>@</span>{{ $post->user->name }}</a></p>
        </div>
        <div class="report_wrap tententen_wrap">
          <i class="fa-solid fa-ellipsis"></i>
        </div>
        <div id="report_menu_wrap">
          <div class="report_menu">
            @auth
            @if(Auth::user()->id === $post->user_id)
            <button type="button" onclick="location.href='/post/edit/{{ $post->id }}'">編集</button>
            @endif
            @endauth
            @auth
            @if(Auth::user()->id === $post->user_id)
            <form method="POST" action="{{ route('delete', $post->id) }}" onSubmit="return checkDelete()">
                @csrf
                <button type="submit">削除</button>
            </form>
            @endif
            @endauth
            <!--<div class="profile_menu_under_bar"></div>アンダーバー-->
            <a href="/report">報告</a>
          </div>
        </div>
      </div>
      <div class="post_info flex created_post">
        <p class="created_at_p">投稿日 <time datetime="{{ $post->created_at}}">{{ $post->created_at->format('Y年m月d日')}}</time></p>
        <p>更新日 {{ $post->updated_at->format('Y年m月d日')}}</p>
      </div>
      <div class="flex post_info">
          <p class="post_info_item post_info_char">【{{ $post->char }}】</p>
          <p class="post_info_item post_info_damage">ダメージ : {{ $post->damage }}</p>
          <p class="post_info_item post_info_when_season">{{ $post->when_season }}対応</p>
      </div>
    </div>
    <div class="post_info post_title_wrap">
        <div class="post_title">
          <h1 class="post_detail_h1">{{ $post->title }}</h1>
        </div>
    </div>
    <!--タグからリンクに飛べるようにしたほうがいい。後日やる予定-->
    <div class="tag_flex_wrap">
      <div class="post_tag_container">
          <i class="fa-solid fa-tags"></i>
          <div class="post_tag_wrap">
              @if($post->tag_1 != null)
              <p class="post_tag">{{ $post->tag_1 }}</p>
              @endif
          </div>
          <div class="post_tag_wrap">
              @if($post->tag_2 != null)
              <p class="post_tag">{{ $post->tag_2 }}</p>
              @endif
          </div>
          <div class="post_tag_wrap">
              @if($post->tag_3 != null)
              <p class="post_tag">{{ $post->tag_3 }}</p>
              @endif
          </div>
          
          <div class="post_tag_wrap">
              @if($post->tag_4 != null)
              <p class="post_tag">{{ $post->tag_4 }}</p>
              @endif
          </div>
      </div>
    </div>
    <section class="combo_recipe">
      <h2 class="post_detail_h2 detail_recipe_h2">コンボレシピ</h2>
      <div class="combo_content">
        <p class="combo_detail_recipe">{{$post->combo_content}}</p>
      </div>
    </section>
    <section>
      <h2 class="post_detail_h2 detail_advise_h2">アドバイス</h2>
      <div class="">
        <p class="post_detail_normal_p">{{ $post->advise}}</p>
      </div>
    </section>
    <section>
      <h2 class="post_detail_h2 detail_twitter_h2">コンボ動画</h2>
      <!--コンボ動画
      <blockquote class="twitter-tweet" data-width="100%">
        <a href="https://twitter.com/moeta_aoshiki/status/1503017833055150084?s=20&t=sV8t8HR0lZMJQIpSFa_tCw"></a>
        </blockquote>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
      -->
    </section>
    <section>
      
    </div>
    </section>
  </section>
  <section class="post_section_wrap">
    <div>
      <h2 class="post_comment_h2">コメント</h2>
    </div>
    <div class="commnet_form_wrap">
      <div id="comment-article-{{ $post->id }}">
        @if($post->comments == "[]")<!--コメントがない場合は下の文字を表示させる-->
        <div class="post_info">
          <p>この記事にコメントはありません。</p>
        </div>
        @endif
        @foreach ($post->comments as $comment)
          <div class="comment_list">
            <div class="post_info flex_space_between created_post">
              <!--aタグでユーザー情報に飛べるように設定(OK)-->
              <!--削除ボタン通報ボタンを設定したい-->
              <div class="flex comment_user_wrap">
                <a href="/profile/{{$comment->user->id}}"><img class="user_image" src="{{ asset('image/'.$comment->user->profile_image) }}" alt=""></a><!--プロフ画像追加-->
                <p class="user_id"><a href="/profile/{{$comment->user->id}}"><span>@</span>{{ $comment->user->name }}</a></p>
              </div>
              <div class="flex" > 
                <p class="comment_time">{{ $post->created_at->format('Y-m-d h:m')}}</p>
                <div class="tententen_wrap">
                  <a class="comment_delete_button"  href="#1"><i class="fa-solid fa-ellipsis"></i></a>
                </div>
                <div id="comment_delete_wrap" id="1">
                  <div class="report_menu">
                    @if ($comment->user->id == Auth::id()) <!--コメント投稿ユーザーと見てるユーザーが同じなら削除ボタンを設ける-->
                      <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}">削除</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="comment_wrap">
              <span>{{ $comment->comment }}</span>
            </div>
          </div>
        @endforeach
      </div>

      <!--ログインしてコメントしよう画像を追加する予定-->
      @guest
      <div class="guest_comment_form">
        <form id="new_comment" action="/post/{{ $post->id }}/comments" method="POST">
          @csrf
          <input value="{{ $post->id }}" type="hidden" name="post_id" />
          <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
          <textarea class="comment_textarea" placeholder="" autocomplete="off" type="text" name="comment"></textarea>
          <button type="submit" class="delete_button">▶投稿する</button>
        </form>
      </div>
      @endguest
      @auth
      <div class="comment_form">
        <form id="new_comment" action="/post/{{ $post->id }}/comments" method="POST">
          @csrf
          <input value="{{ $post->id }}" type="hidden" name="post_id" />
          <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
          <textarea class="comment_textarea" placeholder="" autocomplete="off" type="text" name="comment"></textarea>
          <button type="submit" class="delete_button">▶投稿する</button>
        </form>
      </div>
      @endauth
    </div>
  </section>
<script>
  function checkDelete(){
  if(window.confirm('この記事を削除してよろしいですか？削除した投稿は復旧できません。')){
      return true;
  } else {
      return false;
  }
  }
  </script>
@endsection