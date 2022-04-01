@extends('layout')
@section('title','プロフィール') <!--タイトルはコンボのタイトルに設定するとイイかも？？-->
@section('content')
<!--中央メニューのラップ-->
<div class="post_content_wrap">
    <section class="profile_section_wrap">
        <div class="profile_wrap">
            <div class="profile_card">
                <img class="profile_img" src="{{ asset('image/'.$user->profile_image) }}" id="img">
                <p class="profile_username"><span>@</span>{{ $user->name }}</p>
                <p class="profile_post_count"><span>POST : </span>{{ $user->post_count }}</p>
                <p class="normal_p">{{ $user->profile_text }}</p>
                <!--ここに｛・・・｝を置いて通報ボタンとかを作ろう-->
            </div>
            @if($user->id == Auth::id())
            <div class="simple_long_button_wrap">
                <a href="edit/{{ $user->id }}">
                    <button class="simple_long_button">
                    プロフィールを編集
                    </button>
                </a>
            </div>
            @endif
        </div>
    </section>
</div>
<div>
    <div class="sort_form_wrap">
        <div class="flex sort_button_container">
            <!--おすすめ順の設定が終わってないです-->
            <div class="sort_button_wrap">
                <p class="sort_button_on">{{$user->name}}さんの投稿</p>
            </div>
        </div>
    </div>
    @if($user->post_count >= 2)
    @include('post')
    @else
    <a class="post_section_link" href="/post/{{ $posts->id }}">
        <section class="post_section_wrap">
            <div class="post_info_wrap">
                <div class="flex post_info">
                    <!--これを使えば投稿者のユーザー情報を取得できる？
                    <p>{{ $posts->user->name }}</p>-->
                    <p class="post_info_item post_info_char">【{{ $posts->char }}】</p>
                    <p class="post_info_item post_info_damage">ダメージ : {{ $posts->damage }}</p>
                    <p class="post_info_item post_info_when_season">{{ $posts->when_season }}対応</p>
                </div>
            </div>
            <div class="post_info post_title_wrap">
                <div class="post_title">
                    <h2 class="post_title_h2">{{ $posts->title }}</h2>
                </div>
            </div>
            <div class="post_info combo_content_wrap">
                <div class="combo_content">
                    <p class="combo_content_p">レシピ : {{ $posts->combo_content }}</p>
                </div>
            </div>
            <!--タグからリンクに飛べるようにしたほうがいい。後日やる予定-->
            <div class="tag_flex_wrap">
                <div class="post_tag_container">
                    <i class="fa-solid fa-tags"></i>
                    <div class="post_tag_wrap">
                        @if($posts->tag_1 != null)
                        <p class="post_tag">{{ $posts->tag_1 }}</p>
                        @endif
                    </div>
                    <div class="post_tag_wrap">
                        @if($posts->tag_2 != null)
                        <p class="post_tag">{{ $posts->tag_2 }}</p>
                        @endif
                    </div>
                    <div class="post_tag_wrap">
                        @if($posts->tag_3 != null)
                        <p class="post_tag">{{ $posts->tag_3 }}</p>
                        @endif
                    </div>
                    
                    <div class="post_tag_wrap">
                        @if($posts->tag_4 != null)
                        <p class="post_tag">{{ $posts->tag_4 }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        </a>
    @endif
   
</div>
<!--中央メニューのラップ終了-->
@endsection