@extends('layout')
@section('title','ブログ一覧')
@section('content')
<!--
<form name="form1" action="">
    <select id="Select1" onchange="selectboxChange();">
      <option>---</option>
      <option>要</option>
      <option>要素2</option>
      <option>要素3</option>
      <option>要素4</option>
      <option>要素5</option>
    </select>

</form>
<div id="output"></div>
<input type="button" value="button" onclick="btnChk()">
<input type="button" value="ご挨拶" onClick="alt();">
-->
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
                    </section>
                    <section class="post-info">
                        <!--ユーザーネーム（今後urlで飛べるように設定）-->
                        <div class="char_wrap">
                            <p class="char_p">【{{ $post->char}}】</p>
                            <p class="damage">ダメージ : {{ $post->damage }}</p>
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
                    <!--タグからリンクに飛べるようにしたほうがいい。後日やる予定-->
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
            
        </div>
        
        <div class="right_section_wrap"></div>
    </div>
    
</div>
</div>
<script>
    function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
    }
    function alt() {
        alert("ようこそJavaScriptのページへ！\nこのサンプルは初心者でも簡単にJavaScriptが使えるように応援しています。");
    }
</script>
@endsection