<div class="main_header_wrap">
  <div class="main-header">
    <div id="header-start">
      <a href="{{route('posts')}}"><img class="header-icon" src="https://rust-wiki.net/some/img/icon/DzrVneqUcAARoIa.png" loading="" alt=""></a>
      <a href="{{route('posts')}}"><h1 id="title">格ゲー総合攻略</h1></a> 
    </div>
    <div id="header-end" class="flex">
      <a href="#1"><i class="fa-solid fa-magnifying-glass font_awesome_icon_margin"></i></a>
      @guest <!--ログインしていなかったら表示-->
      <a href="{{ url('/login') }}"><i class="fa-solid fa-circle-user font_awesome_icon_margin"></i></a>
      @endguest
      @auth
      <div id="user_profile_img_wrap" class="user_profile_img_wrap">
        <a href="/profile/{{ Auth::user()->id }}"><!--プロフィールに飛べるようにした ここはメニューを表示できるようにするから後日変更予定-->
          <img class="user_profile_img" src="{{ asset('image/'.Auth::user()->profile_image) }}" alt="プロフィール画像"><!--プロフ画像追加-->
        </a>
      </div>
      <!--<a href="{{ url('/logout') }}">ログアウト</a>-->
      @endauth
    </div>
  </div>
</div>
<div class="notice_container">
  <div class="flex_space_between notice_wrap">
    <p class="notice_p"><i class="fa-solid fa-bell"> 総合攻略からお知らせ</i></p>
    <p>詳細 <i class="fa-solid fa-angle-right-blue"></i></p>
  </div>
</div>
<div class="home_menu">
  <nav class="flex home_menu_nav">
    <div class="">
      <a class="home_menu_nav_item" href="{{route('posts')}}">ホーム</a>
    </div>
    <div class="">
      <a class="home_menu_nav_item" href=""><i class="fa-solid fa-magnifying-glass fa_p_margin"></i>検索</a>
    </div>
    <div class="">
      <a class="home_menu_nav_item_last" href="{{ route('create') }}"><i class="fa-regular fa-pen-to-square fa_p_margin"></i>投稿</a>
    </div>
  </nav>
</div>
  <!--
  <nav id="global_nav">
    <div class="global_nav_item_wrapper">
      <a class="global_nav_item" href="{{ route('posts') }}">TOP</a>
      <a class="global_nav_item" href="{{ route('posts') }}">新着一覧</a>
      <a class="global_nav_item" href="{{ route('search') }}">検索</a>
      <a class="global_nav_item" href="{{ route('posts') }}">保存一覧</a>
    </div>
  </nav> 
-->
</div>