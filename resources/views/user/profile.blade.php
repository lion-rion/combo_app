@extends('layout')
@section('title','プロフィール') <!--タイトルはコンボのタイトルに設定するとイイかも？？-->
@section('content')
<div id="main_content_wrap">
  <div id="content_wrap">
        <!--左側メニューのラップ-->
        <div class="right_menu_wrap">
        </div>
        <!--左側メニューのラップ終了-->
        <!--中央メニューのラップ-->
        <div class="post_content_wrap">
            <section class="post_section_wrap">
                <div class="post_info_wrap"></div>
            </section>
        </div>
        <!--右側メニューのラップ-->
        <div class="left_menu_wrap"></div>
        <!--右側メニューのラップ終了-->
  </div>
</div>
  
@endsection