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
        </div>
    </section>
</div>
<!--中央メニューのラップ終了-->
@endsection