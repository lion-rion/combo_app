@extends('layout')
@section('title', 'ブログ投稿')
@section('content')


<div class="main_content_wrap">
    @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg')  }}</p>
    @endif
    
    <div class="content_wrap">
        <div class="ranking_section_wrap"></div>
        <div class="post_section_wrap">
            <div class="post_form_section">
                <h2 class="post_form_h2">コンボ投稿</h2>
                <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
                @csrf
                <div class="post_form_char">
                    <p class="form_p">キャラクター : </p>
                    <div class="char_select_form"  action="">
                        <label for="char">
                        </label>
                        <select name="char" id="Select1" class="cp_ipselect cp_sl01" onchange="selectboxChange();">
                            <option value="null">---</option>
                            <option value="リュウ">リュウ</option>
                            <option value="ケン">ケン</option>
                            <option value="春麗">春麗</option>
                            <option value="ラシード">ラシード</option>
                            <option value="バーディー">バーディー</option>
                        </select>
                    </div>
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
                        <label for="title">
                            タイトル : 
                        </label>
                        <textarea
                            id="combo_title"
                            name="title"
                            class="form-control"
                            
                        >{{ old('title') }}</textarea>
                        @if ($errors->has('title'))
                            <div class="text-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="post_form_char">
                    <div class="form-group">
                        <label for="combo_content">
                            　レシピ : 
                        </label>
                        <textarea name="combo_content" id="combo_content" type="text" placeholder="" >{{ old('combo_content') }}</textarea>
                        @if ($errors->has('combo_content'))
                            <div class="text-danger">
                                {{ $errors->first('combo_content') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="output"></div>
                <div class="post_form_char">
                    <div class="form-group">
                        <label for="advise">
                            アドバイス :
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
                </div>
                <div class="post_form_char">
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
                <div class="post_form_char">
                    <label for="when_season">
                        シーズン : 
                    </label>
                    <div class="char_select_form"  action="">
                        <label for="when_season">
                        </label>
                        <select name="when_season" class="cp_ipselect cp_sl01">
                            <option value="null">---</option>
                            <option value="シーズン1">シーズン1</option>
                            <option value="シーズン2">シーズン2</option>
                            <option value="シーズン3">シーズン3</option>
                            <option value="シーズン4">シーズン4</option>
                            <option value="シーズン5">シーズン5</option>
                        </select>
                    </div>
                </div>
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