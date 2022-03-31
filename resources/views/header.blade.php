<div class="main_header_wrap">
  <div class="main-header">
    <div id="header-start">
      <a href="{{route('posts')}}"><img class="header-icon" src="{{ asset('image/DzrVneqUcAARoIa.png') }}" loading="" alt=""></a>
      <a href="{{route('posts')}}"><h1 id="title">格ゲー総合攻略</h1></a> 
    </div>
    <div id="header-end" class="flex">
      <a class="header_search_button_wrap" href="/search">
        <i class="fa-solid fa-magnifying-glass header_search_button"></i>
      </a>
      @guest <!--ログインしていなかったら表示-->
      <a href="{{ url('/register') }}"><i class="fa-solid fa-circle-user header_login_button"></i></a>
      @endguest
      @auth
      <div id="user_profile_img_wrap" class="user_profile_img_wrap">
        
          <img class="user_profile_img" src="{{ asset('image/'.Auth::user()->profile_image) }}" alt="プロフィール画像"><!--プロフ画像追加-->
        
        <div id="profile_menu_wrap">
          <div class="profile_menu">
            <a href="/profile/{{ Auth::user()->id }}">マイページ</a>
            <a href="">保存リスト</a>
            <a href="">設定</a>
            <div class="profile_menu_under_bar"></div>
            <a href="/logout">ログアウト</a>
          </div>
        </div>
      </div>
      <!--<a href="{{ url('/logout') }}">ログアウト</a>-->
      @endauth
    </div>
  </div>
</div>
<div class="notice_container">
  <div class="flex_space_between notice_wrap">
    <p class="notice_p"><i class="fa-solid fa-bell"> 総合攻略からお知らせ</i></p>
    <p>詳細 <i class="fa-solid fa-angle-right"></i></p>
  </div>
</div>
<div class="home_menu">
  <nav class="flex home_menu_nav">
    <div class="">
      <a class="home_menu_nav_item" href="{{route('posts')}}">ホーム</a>
    </div>
    <div class="">
      <a class="home_menu_nav_item" href="/search"><i class="fa-solid fa-magnifying-glass fa_p_margin"></i>検索</a>
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