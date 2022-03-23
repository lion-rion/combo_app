@extends('layout')
@section('title','格ゲー総合攻略')
@section('content')
<div class="main_content_wrap">
    @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg')  }}</p>
    @endif
    <div class="content_wrap">
        <div class="ranking_section_wrap"></div>
        <div class="post_section_wrap">
            @foreach ($posts as $post) 
            <div class="post_section">
                <a class="post_section_link" href="/post/{{ $post->id }}">
                    <section class="post-info">
                        <!--ユーザーネーム（今後urlで飛べるように設定）-->
                        <div class="char_wrap">
                            <p class="char_p">【{{ $post->char}}】</p>
                            <p class="damage">ダメージ : {{ $post->damage }}</p>
                            <p class="damage">{{ $post->when_season }}対応</p>
                        </div>
                        <div class="username_data">
                            <p class="username_p">{{ $user = Auth::user()->name }}</p>
                            <p class="created_data_p">投稿日 : {{ $post->created_at->format('Y年m月d日') }}</p>
                        </div>
                    </section>
                    <section class="post_title_wrap">
                        <div class="post_title">
                            <h2 class="post_title_h2">{{ $post->title }}</h2>
                        </div>
                    </section>
                    <section class="combo_len_wrap">
                        <div class="combo_len">
                            <p class="combo_len_p">レシピ : {{ $post->combo_content }}</p>
                        </div>
                    </section>
                    
                    <section class="tag_flex_wrap">
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
                    </section>
                    <!--ここに星評価を設定する予定-->
                </a>
            </div>
            @endforeach
            <section class="search_window">
                <div class="post_section">
                    <a class="anchor" id="1">
                    <h2 class="post_form_h2">検索</h2>
                    <form action="{{ url('/serch')}}" method="post">
                    {{ csrf_field()}}
                    {{method_field('get')}}
                    <div class="post_form_char">
                        <div class="flex">
                            <p class="form_p">キャラクター : </p>
                            <div class="char_select_form"  action="">
                                    <label for="char">
                                    </label>
                                    <select name="char" id="Select1" class="cp_ipselect cp_sl01" onchange="selectboxChange();">
                                        <option value=''>---</option>
                                        <option value="リュウ">リュウ</option>
                                        <option value="ケン">ケン</option>
                                        <option value="春麗">春麗</option>
                                        <option value="ラシード">ラシード</option>
                                        <option value="バーディー">バーディー</option>
                                    </select>
                            </div>
                        </div>
                        <div class="flex">
                            <p>ダメージ : </p>
                            <div class="damage_textarea">
                                <textarea
                                    id="damage_textarea"
                                    name="mix_damage"
                                >{{ old('damage') }}</textarea>
                            </div>
                            <p>以上</p>
                            <div class="damage_textarea">
                                <textarea
                                    id="damage_textarea"
                                    name="max_damage"
                                >{{ old('damage') }}</textarea>
                            </div> 
                            <p>以下</p>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="flex">
                                <label class="label_title" for="title">
                                    タイトル :　
                                </label>
                                <input id="combo_title" type="text" class="form-control col-md-5" placeholder="例 : 小梅式エイジス表裏" name="title">
                            </div>
                        </div>
                    <div class="post_form_combo">
                        <div class="form-group">
                            <div class="flex">
                                <label for="combo_content">
                                    レシピ :　
                                </label>
                                <input name="combo_content" id="combo_content" value="{{ old('combo_content') }}" type="text" placeholder="例 : 前ジャンプ→大k→中足→波動拳" >
                            </div>
                        </div>
                    </div>
                    <div id="output"></div>
                    <div class="flex">
                        <label class="when_season" for="when_season">
                            　シーズン : 
                        </label>
                        <div class="char_select_form"  action="">
                            <label for="when_season">
                            </label>
                            <select name="when_season" class="cp_ipselect cp_sl01">
                                <option value=''>---</option>
                                <option value="シーズン1">シーズン1</option>
                                <option value="シーズン2">シーズン2</option>
                                <option value="シーズン3">シーズン3</option>
                                <option value="シーズン4">シーズン4</option>
                                <option value="シーズン5">シーズン5</option>
                            </select>
                        </div>
                    </div>
                    <div class="post_form_another">
                        <label for="tag">
                            タグ :　 
                        </label>
                        <div class="tag_input_form"  action="">
                            <input name="tag_1" class="tag_1" id="tag_1" value="{{ old('tag_1') }}" type="text" placeholder="" >
                        </div>
                    </div>
                    <div class="flex">
                    <button type="submit" class="search_button">検索</button>
                </div>
                    </form>
                </div>
            </section>
            {{ $posts->links('pagination::default') }}
        </div>
        <div class="right_section_wrap"></div>
    </div>
    </div>
</div>
@endsection