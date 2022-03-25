@extends('layout')
@section('title','格ゲー総合攻略')
@section('content')
<!--中央メニューのラップ-->
<div class="post_content_wrap">
    <div class="post_image_wrap">
        <a href="{{ route('create') }}">
            <img src="{{ asset('storage/img/post_image.png') }}" alt="">
        </a>
    </div>
    @foreach($posts as $post)
        <a class="post_section_link" href="/post/{{ $post->id }}">
        <section class="post_section_wrap">
            <div class="post_info_wrap">
                <div class="flex post_info">
                    <!--これを使えば投稿者のユーザー情報を取得できる？
                    <p>{{ $post->user->name }}</p>-->
                    <p class="post_info_item post_info_char">【{{ $post->char }}】</p>
                    <p class="post_info_item post_info_damage">ダメージ : {{ $post->damage }}</p>
                    <p class="post_info_item post_info_when_season">{{ $post->when_season }}対応</p>
                </div>
            </div>
            <div class="post_info post_title_wrap">
                <div class="post_title">
                    <h2 class="post_title_h2">{{ $post->title }}</h2>
                </div>
            </div>
            <div class="post_info combo_content_wrap">
                <div class="combo_content">
                    <p class="combo_content_p">レシピ : {{ $post->combo_content }}</p>
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
        </section>
        </a>
    @endforeach
    <!--
    <section class="search_window_wrap">
        <div class="search_window">
            <h2 class="post_form_h2">検索</h2>
            <form action="{{ url('/serch')}}" method="post">
                {{ csrf_field()}}
                {{method_field('get')}}
        </div>
    </section>
    -->
</div>
<!--中央メニューのラップ終了-->
@endsection