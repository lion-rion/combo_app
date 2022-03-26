@extends('layout')
@section('content')
<div class="main_content_wrap">
    @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg')  }}</p>
    @endif
    <div class="content_wrap">
        <div class="post_image_wrap">
            <a href="{{ route('create') }}">
                <img src="{{ asset('image/post_image.png') }}" alt="">
            </a>
        </div>
        <div class="post_section_wrap">
            <div class="post_form_section">
                <h2 class="post_form_h2">コンボ検索</h2>
                <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="post_select_form">
                    <p class="form_p">キャラクター</p>
                    <div class="char_select_form"  action="">
                        <select name="char" id="Select1" class="cp_ipselect cp_sl01" onchange="">
                            <option value="{{ $request->char }}">@if($request->char != null){{ $request->char }}@else---@endif</option>
                            <option value="リュウ">リュウ</option>
                            <option value="ケン">ケン</option>
                            <option value="春麗">春麗</option>
                            <option value="ラシード">ラシード</option>
                            <option value="バーディー">バーディー</option>
                        </select>
                    </div>
                </div>
                <div class="post_select_form">
                    <p class="form_p">バージョン</p>
                    <div class="char_select_form"  action="">
                        <label for="when_season">
                        </label>
                        <select name="when_season" class="cp_ipselect cp_sl01">
                            <option value="{{ $request->when_season }}">@if($request->when_season != null){{ $request->when_season }}@else---@endif</option>
                            <option value="シーズン1">シーズン1</option>
                            <option value="シーズン2">シーズン2</option>
                            <option value="シーズン3">シーズン3</option>
                            <option value="シーズン4">シーズン4</option>
                            <option value="シーズン5">シーズン5</option>
                        </select>
                    </div>
                </div>
                <div class="post_select_form">
                    <p class="p_arange">ダメージ上限</p>
                    <div class="damage_textarea">
                        <input class="normal_input" id="" name="max_damage" value="@if($request->max_damage != null){{ $request->max_damage }}@else{{9999}}@endif">
                    </div> 
                </div>
                <div class="post_select_form">
                    <p class="p_arange">ダメージ加減</p>
                    <div class="damage_textarea">
                        <input class="normal_input" id="" name="mix_damage" value="@if($request->mix_damage != null){{ $request->mix_damage }}@else{{0}}@endif">
                    </div> 
                </div>
                <!--タイトルでの検索って必要なのかわからないからとりあえず消しておく
                <div class="post_info">
                    <p class="post_form_upper_p">タイトル</p>
                    <input
                        class="form_input_long"
                        name="title"
                        placeholder="例 : 小梅式エイジス表裏"
                        value="{{ $request->title }}">
                </div>
                -->
                <div class="post_info">
                        <p class="post_form_upper_p">レシピ</p>
                        <textarea id="combo_content" name="combo_content" value="" type="text" placeholder="例 : 前ジャンプ→大k→中足→波動拳" >{{ $request->combo_content }}</textarea>
                </div>
                <div class="flex search_button_container post_info">
                    <div class="search_button_wrap">
                        <button class="combo_button_display" type="button" onclick="selectboxChange();">技ボタンを表示</button>
                    </div>
                    <div class="search_button_wrap">
                        <button class="combo_button_display" type="button" onclick="selectboxChange2();">閉じる</button>
                    </div>
                </div>
                <div id="output"></div>
                <div class="post_info">
                    <p class="post_form_upper_p">タグ</p>
                    <div class="flex_wrap"  action="">
                        <input name="tag_1" class="tag_1" value="{{ $request->tag_1 }}" type="text" placeholder="簡単" >
                        <input name="tag_2" class="tag_1" value="{{ $request->tag_2 }}" type="text" placeholder="初心者" >
                        <input name="tag_3" class="tag_1" value="{{ $request->tag_3 }}" type="text" placeholder="動画リンク有" >
                        <input name="tag_4" class="tag_1" value="{{ $request->tag_4 }}" type="text" placeholder="エイジス" >
                    </div>
                </div>
                <div class="flex">
                    <button type="submit" class="submit_button">
                        検索する
                    </button>
                </div>
                </form>
            </div>
        </div>
            @if ($posts != null)
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
            <!--検索条件をページネーションでも引き継ぐ場合はappendsをつける必要がある-->
            {{$posts->appends(request()->query())->links('pagination::default')}}
            @endif
        </div>
    </div>
@endsection