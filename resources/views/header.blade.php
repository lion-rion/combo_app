<div class="main_header_wrap">
  <div class="main-header">
    <div id="header-start">
      <a href="https://rust-wiki.net/"><img class="header-icon" src="https://rust-wiki.net/some/img/icon/DzrVneqUcAARoIa.png" loading="" alt=""></a>
      <a href="https://rust-wiki.net/"><h1 id="title">格ゲー総合攻略</h1></a> 
    </div>
    <div id="header-end" class="flex">
      @guest <!--ログインしていなかったら表示-->
      <a href="{{ url('/login') }}">ログイン</a>
      @endguest
      
      <a href="#1"><i class="fa-solid fa-magnifying-glass"></i></a>
      <a href="{{ route('create') }}"><i class="fa-regular fa-pen-to-square"></i></a>
      @auth
      <div id="user_profile_img_wrap" class="user_profile_img_wrap">
        <a href="{{ route('user_profile', Auth::user()->name) }}"><!--プロフィールに飛べるようにした ここはメニューを表示できるようにするから後日変更予定-->
        <img class="user_profile_img" src="{{ asset('storage/profiles/'.Auth::user()->profile_image) }}" alt="プロフィール画像"><!--プロフ画像追加-->
      </a>
      </div>
      <!--<a href="{{ url('/logout') }}">ログアウト</a>-->
      @endauth
    </div>
  </div>
  <nav id="global_nav">
    <div class="global_nav_item_wrapper">
      <a class="global_nav_item" href="{{ route('posts') }}">TOP</a>
      <a class="global_nav_item" href="{{ route('posts') }}">新着一覧</a>
      <a class="global_nav_item" href="{{ route('search') }}">検索</a>
      <a class="global_nav_item" href="{{ route('posts') }}">保存一覧</a>
    </div>
  </nav>
</div>