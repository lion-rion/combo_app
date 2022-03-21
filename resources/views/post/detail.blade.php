@extends('layout')
@section('title','ブログ詳細') <!--タイトルはコンボのタイトルに設定するとイイかも？？-->
@section('content')
<div class="main_content_wrap">
  @if (session('err_msg'))
      <p class="text-danger">{{ session('err_msg')  }}</p>
  @endif
<div class="content_wrap">
  <div class="ranking_section_wrap"></div>
  <div class="post_section_wrap">
    <div class="post_detail_section">
      <div class="poster_detail">
        <p><span>@</span>{{ $user = Auth::user()->name }}</p><!--プロフ画像を追加する予定-->
        <div class="created_post">
          <p class="created_at_p">投稿日 <time datetime="{{ $post->created_at}}">{{ $post->created_at->format('Y年m月d日')}}</time></p>
          <p>更新日 {{ $post->updated_at->format('Y年m月d日')}}</p>
        </div>
      </div>
      <h1 class="post_detail_h1">{{ $post->title }}</h1>
      <section class="tag_flex_wrap">
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
      </section>
      
      <section class="combo_recipe">
        <h2 class="post_detail_h2 detail_recipe_h2">コンボレシピ | <span class="post_detail_sub">【{{ $post->char}}】 ダメージ : {{ $post->damage }} {{ $post->when_season }}対応</span> </h2>
        <div class="combo_len">
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
        <blockquote class="twitter-tweet" data-width="100%">
          <a href="https://twitter.com/moeta_aoshiki/status/1503017833055150084?s=20&t=sV8t8HR0lZMJQIpSFa_tCw"></a>
          </blockquote>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </section>
  </div>
  </div>
</div>
</div>
@endsection