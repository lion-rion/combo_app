@extends('layout')
@section('title', 'ブログ投稿')
@section('content')


<div class="main_content_wrap">
    @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg')  }}</p>
    @endif
    <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
    <div class="content_wrap">
        <div class="ranking_section_wrap"></div>
        <div class="post_section_wrap">
            <div class="post_form_section">
                <h2 class="post_form_h2">コンボ投稿</h2>
                @csrf
                <div class="post_form_char">
                    <p class="form_p">キャラクター : </p>
                    <form class="char_select_form" name="form1" action="">
                        <select id="Select1" class="cp_ipselect cp_sl01" onchange="selectboxChange();">
                        <option>---</option>
                        <option>リュウ</option>
                        <option>ケン</option>
                        <option>春麗</option>
                        <option>ラシード</option>
                        <option>バーディー</option>
                        </select>
                    </form>
                    <p>ダメージ : </p>
                    <div class="damage_textarea">
                        <textarea
                            id="damage_textarea"
                            name="damage"
                        >{{ old('damage') }}</textarea>
                        @if ($errors->has('damage'))
                            <div class="text-danger">
                                {{ $errors->first('damage') }}
                            </div>
                        @endif
                    </div> 
                </div>
                <div class="post_form_char">
                    <div class="form-group">
                        <label for="combo_content">
                            タイトル : 
                        </label>
                        <textarea
                            id="combo_content"
                            name="combo_content"
                            class="form-control"
                            
                        >{{ old('combo_content') }}</textarea>
                        @if ($errors->has('combo_content'))
                            <div class="text-danger">
                                {{ $errors->first('combo_content') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="output"></div>
            </div>
        </div>
    </div>
</div>
<textarea name="" id="a" cols="30" rows="10"></textarea>
<div class="col-md-8 col-md-offset-2">
    
        
        
        <div class="form-group">
            <label for="combo_content">
                本文
            </label>
            <textarea
                id="combo_content"
                name="combo_content"
                class="form-control"
                rows="4"
            >{{ old('combo_content') }}</textarea>
            @if ($errors->has('combo_content'))
                <div class="text-danger">
                    {{ $errors->first('combo_content') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="advise">
                アドバイス
            </label>
            <textarea
                id="advise"
                name="advise"
                class="form-control"
                rows="4"
            >{{ old('advise') }}</textarea>
            @if ($errors->has('advise'))
                <div class="text-danger">
                    {{ $errors->first('advise') }}
                </div>
            @endif
        </div> 
        <!--
        <div class="form-group">
            <label for="season5">
                BOOL
            </label>
            <textarea
                id="season5"
                name="season5"
                class="form-control"
                rows="4"
            >{{ old('season5') }}</textarea>
            @if ($errors->has('season5'))
                <div class="text-danger">
                    {{ $errors->first('season5') }}
                </div>
            @endif
        </div>
        -->
        <div class="form-group">
            <label for="twitter_url">
                twitter
            </label>
            <textarea
                id="twitter_url"
                name="twitter_url"
                class="form-control"
                rows="4"
            >{{ old('twitter_url') }}</textarea>
            @if ($errors->has('twitter_url'))
                <div class="text-danger">
                    {{ $errors->first('twitter_url') }}
                </div>
            @endif
        </div>
        <label for="when_season">
            when_season
        </label>
        <textarea
            id="when_season"
            name="when_season"
            class="form-control"
            rows="4"
        >{{ old('when_season') }}</textarea>
        <label for="char">
            char
        </label>
        <textarea
            id="char"
            name="char"
            class="form-control"
            rows="4"
        >{{ old('char') }}</textarea>
        <div class="mt-5">
            <a class="btn btn-secondary" href="{{ route('posts') }}">
                キャンセル
            </a>
            <button type="submit" class="btn btn-primary">
                投稿する
            </button>
        </div>
    </form>
</div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection