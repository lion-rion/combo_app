<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $post->title }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script src="{{ mix('js/sample.js') }}" defer></script>
    <script src="{{ mix('js/jquery.js') }}" defer></script>
    <link rel="stylesheet" href='/css/sample.css'>
    <link rel="icon" href="{{ asset('image/DzrVneqUcAARoIa.png') }}">
    <!--<link rel="stylesheet" href='/css/app.css'> bootstrapを使う場合に必要 -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
</head>

<body>
    <header>
        <div class="main_header_wrap">
            <div class="main-header">
                <div id="header-start">
                    <a href="{{ route('posts') }}"><img class="header-icon"
                            src="{{ asset('image/DzrVneqUcAARoIa.png') }}" loading="" alt=""></a>
                    <a href="{{ route('posts') }}">
                        <h1 id="title">格ゲー総合攻略</h1>
                    </a>
                </div>
                <div id="header-end" class="flex">
                    <a class="header_search_button_wrap" href="/search">
                        <i class="fa-solid fa-magnifying-glass header_search_button"></i>
                    </a>
                    @guest
                        <!--ログインしていなかったら表示-->
                        <a href="{{ url('/register') }}"><i class="fa-solid fa-circle-user header_login_button"></i></a>
                    @endguest
                    @auth
                        <div id="user_profile_img_wrap" class="user_profile_img_wrap">

                            <img class="user_profile_img" src="{{ asset('image/' . Auth::user()->profile_image) }}"
                                alt="プロフィール画像">
                            <!--プロフ画像追加-->

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
                    <a class="home_menu_nav_item" href="{{ route('posts') }}">ホーム</a>
                </div>
                <div class="">
                    <a class="home_menu_nav_item" href="/search"><i
                            class="fa-solid fa-magnifying-glass fa_p_margin"></i>検索</a>
                </div>
                <div class="">
                    <a class="home_menu_nav_item_last" href="{{ route('create') }}"><i
                            class="fa-regular fa-pen-to-square fa_p_margin"></i>投稿</a>
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
    </header>
    <div class="container">
        <div id="main_content_wrap">
            <div id="content_wrap">
                <!--中央メニューのラップ-->
                <div class="post_content_wrap">
                    <section class="post_section_wrap">
                        <div class="post_info_wrap">
                            <!--投稿者情報を記載(アイコンを追加したらよさそう)-->
                            <div class="flex_space_between">
                                <div class="flex post_info">
                                    <a href="/profile/{{ $post->user->id }}"><img class="user_image"
                                            src="{{ asset('image/' . $post->user->profile_image) }}" alt="">
                                        <!--プロフ画像追加-->
                                    </a>
                                    <a href="/profile/{{ $post->user->id }}">
                                        <p class="user_id"><span>@</span>{{ $post->user->name }}
                                    </a></p>
                                </div>
                                <div class="report_wrap tententen_wrap">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                                <div id="report_menu_wrap">
                                    <div class="report_menu">
                                        @auth
                                            @if (Auth::user()->id === $post->user_id)
                                                <button type="button"
                                                    onclick="location.href='/post/edit/{{ $post->id }}'">編集</button>
                                                <div class="profile_menu_under_bar"></div>
                                                <form method="POST" action="{{ route('delete', $post->id) }}"
                                                    onSubmit="return checkDelete()">
                                                    @csrf
                                                    <button type="submit">削除</button>
                                                </form>
                                            @else
                                                <a href="/report">報告</a>
                                            @endif
                                        @endauth

                                        <!--<div class="profile_menu_under_bar"></div>アンダーバー-->

                                    </div>
                                </div>
                            </div>
                            <div class="post_info flex created_post">
                                <p class="created_at_p">投稿日 <time
                                        datetime="{{ $post->created_at }}">{{ $post->created_at->format('Y年m月d日') }}</time>
                                </p>
                                <p>更新日 {{ $post->updated_at->format('Y年m月d日') }}</p>
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
                                    @if ($post->tag_1 != null)
                                        <p class="post_tag">{{ $post->tag_1 }}</p>
                                    @endif
                                </div>
                                <div class="post_tag_wrap">
                                    @if ($post->tag_2 != null)
                                        <p class="post_tag">{{ $post->tag_2 }}</p>
                                    @endif
                                </div>
                                <div class="post_tag_wrap">
                                    @if ($post->tag_3 != null)
                                        <p class="post_tag">{{ $post->tag_3 }}</p>
                                    @endif
                                </div>

                                <div class="post_tag_wrap">
                                    @if ($post->tag_4 != null)
                                        <p class="post_tag">{{ $post->tag_4 }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <section class="combo_recipe">
                            <h2 class="post_detail_h2 detail_recipe_h2">コンボレシピ</h2>
                            <div class="combo_content">
                                <p class="combo_detail_recipe">{{ $post->combo_content }}</p>
                            </div>
                        </section>
                        <section>
                            <h2 class="post_detail_h2 detail_advise_h2">アドバイス</h2>
                            <div class="">
                                <p class="post_detail_normal_p">{{ $post->advise }}</p>
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
                            @if ($post->comments == '[]')
                                <!--コメントがない場合は下の文字を表示させる-->
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
                                            <a href="/profile/{{ $comment->user->id }}"><img class="user_image"
                                                    src="{{ asset('image/' . $comment->user->profile_image) }}"
                                                    alt=""></a>
                                            <!--プロフ画像追加-->
                                            <p class="user_id"><a
                                                    href="/profile/{{ $comment->user->id }}"><span>@</span>{{ $comment->user->name }}</a>
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <p class="comment_time">{{ $post->created_at->format('Y-m-d h:m') }}</p>
                                            <div class="comment_icon_wrap">
                                                @if ($comment->user->id == Auth::id())
                                                    <!--コメント投稿ユーザーと見てるユーザーが同じなら削除ボタンを設ける-->
                                                    <a onclick="return checkDelete2()" class="delete-comment"
                                                        data-remote="true" rel="nofollow" data-method="delete"
                                                        href="/comments/{{ $comment->id }}"><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                @else
                                                    <a class="delete-comment" data-remote="true" rel="nofollow"
                                                        data-method="delete" href=""><i
                                                            class="fa-solid fa-ban"></i></a>
                                                    <!--通報についてのリンクを春-->
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_wrap">
                                    <span>{{ $comment->comment }}</span>
                                </div>
                            @endforeach
                        </div>
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
                </section>
            <script>
                function checkDelete() {
                    if (window.confirm('この記事を削除してよろしいですか？削除した投稿は復旧できません。')) {
                        return true;
                    } else {
                        return false;
                    }
                }

                function checkDelete2() {
                    if (window.confirm('このコメントを削除してよろしいですか？')) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </div>
    </div>
    </div>
    </div>
    </div>
    <footer>
        <div class="footer-wrap">
            <p><small>&copy; 2022 格ゲー総合攻略</small></p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</body>

</html>
