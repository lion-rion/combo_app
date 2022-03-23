@extends('layout')
@section('title', 'コンボ投稿')
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
                <div class="post_form_another">
                    <div class="form-group">
                        <label for="title">
                            タイトル : 
                        </label>
                        <input
                            id="combo_title"
                            name="title"
                            class="form-control"
                            placeholder="例 : 小梅式エイジス表裏"
                            value="{{ old('title') }}"
                            
                        >
                        @if ($errors->has('title'))
                            <div class="text-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="post_form_combo">
                    <div class="form-group">
                        <label for="combo_content">
                            　レシピ : 
                        </label>
                        <input name="combo_content" id="combo_content" value="{{ old('combo_content') }}" type="text" placeholder="例 : 前ジャンプ→大k→中足→波動拳" >
                        @if ($errors->has('combo_content'))
                            <div class="text-danger">
                                {{ $errors->first('combo_content') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="output"></div>
                <div class="post_form_another">
                    <div class="form-group">
                        <div class="advise_wrap">
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
                </div>
                <div class="post_form_another">
                    <div class="form-group">
                        <div class="twitter_url_wrap">
                            <label for="twitter_url">
                                Twitterリンク : 
                            </label>
                            <input
                                id="twitter_url"
                                name="twitter_url"
                                class="form-control"
                                rows="4"
                                value="{{ old('twitter_url') }}"
                            >
                            @if ($errors->has('twitter_url'))
                                <div class="text-danger">
                                    {{ $errors->first('twitter_url') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="post_form_another">
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
                <div class="post_form_another">
                    <label for="tag">
                        タグ : 
                    </label>
                    <div class="tag_input_form"  action="">
                        <input name="tag_1" id="tag_1" value="{{ old('tag_1') }}" type="text" placeholder="" >
                        <input name="tag_1" id="tag_1" value="{{ old('tag_1') }}" type="text" placeholder="" >
                        <input name="tag_1" id="tag_1" value="{{ old('tag_1') }}" type="text" placeholder="" >
                        <input name="tag_1" id="tag_1" value="{{ old('tag_1') }}" type="text" placeholder="" >
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