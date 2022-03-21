<div class="main_header_wrap">
  <div class="main-header">
    <div id="header-start">
      <a href="https://rust-wiki.net/"><img class="header-icon" src="https://rust-wiki.net/some/img/icon/DzrVneqUcAARoIa.png" loading="" alt=""></a>
      <a href="https://rust-wiki.net/"><h1 id="title">格ゲー総合攻略</h1></a> 
    </div>
    <div id="header-end">
      @auth
      <a href="{{ url('/logout') }}">ログアウト</a>
      @endauth
      <a href="{{ url('/login') }}">ログイン</a>
      <a href="{{ route('create') }}">コンボ投稿</a>
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