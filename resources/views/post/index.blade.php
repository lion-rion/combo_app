@extends('layout')
@section('title','ブログ一覧')
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
                <!--
                <h1>検索条件を入力してください</h1>
                <form action="{{ url('/serch')}}" method="post">
                {{ csrf_field()}}
                {{method_field('get')}}
                <div class="form-group">
                    <label>名前</label>
                    <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="name">
                </div>
                <div class="form-group">
                    <label>年齢</label>
                    <input type="text" class="form-control col-md-5" placeholder="年齢を入力してください" name="age" value="{{ old("name")}}">
                </div>

                <div class="form-group">
                    <label>年齢の条件</label>
                    <select class="form-control col-md-5" name="age_condition">
                    <option selected value="0">選択...</option>
                    <option value="1">以上</option>
                    <option value="2">以下</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>性別</label>
                    <select class="form-control col-md-5" name="sex">
                    <option selected value="0">選択...</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary col-md-5">検索</button>
                </form>
            -->
            
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
</script>
@endsection