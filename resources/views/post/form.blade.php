@extends('layout')
@section('title', 'コンボ投稿フォーム')
@section('content')


@if (session('err_msg'))
    <p class="text-danger">{{ session('err_msg')  }}</p>
@endif
<div class="post_section_wrap">
    <div class="post_form_section">
        <h2 class="post_form_h2">コンボ投稿</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
        @csrf
        <div class="post_select_form">
            <p class="form_p">キャラクター</p>
            <div class="char_select_form"  action="">
                <select name="char" id="Select1" class="cp_ipselect cp_sl01" onchange="selectboxChange();">
                    <option value="null">---</option>
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
                    <option value="null">---</option>
                    <option value="シーズン1">シーズン1</option>
                    <option value="シーズン2">シーズン2</option>
                    <option value="シーズン3">シーズン3</option>
                    <option value="シーズン4">シーズン4</option>
                    <option value="シーズン5">シーズン5</option>
                </select>
            </div>
        </div>
        <div class="post_select_form">
            <p class="p_arange">ダメージ</p>
            <div class="damage_textarea">
                <input class="normal_input" id="" name="damage" value="{{ old('damage') }}">
            </div> 
        </div>
        <div class="post_info">
            <p class="post_form_upper_p">タイトル</p>
            <input
                class="form_input_long"
                name="title"
                placeholder="例 : 小梅式エイジス表裏"
                value="{{ old('title') }}">
        </div>
        <div class="post_info">
                <p class="post_form_upper_p">レシピ</p>
                <textarea id="combo_content" name="combo_content" value="{{ old('combo_content') }}" type="text" placeholder="例 : 前ジャンプ→大k→中足→波動拳" ></textarea>
        </div>
        <div id="output"></div>
        <div class="post_info">
            <div class="advise_wrap">
                <p class="post_form_upper_p">アドバイス</p>
                <textarea
                    id="advise"
                    name="advise"
                    class="form-control"
                    rows="4"
                >{{ old('advise') }}</textarea>
            </div>
        </div>
        <div class="post_info">
            <div class="twitter_url_wrap">
                <p class="post_form_upper_p">Twitterリンク</p>
                <input
                    id="twitter_url"
                    name="twitter_url"
                    class="form_input_long"
                    rows="4"
                    value="{{ old('twitter_url') }}"
                >
            </div>
        </div>
        <div class="post_info">
            <p class="post_form_upper_p">タグ</p>
            <div class="flex_wrap"  action="">
                <input name="tag_1" class="tag_1" value="{{ old('tag_1') }}" type="text" placeholder="" >
                <input name="tag_2" class="tag_1" value="{{ old('tag_2') }}" type="text" placeholder="" >
                <input name="tag_3" class="tag_1" value="{{ old('tag_3') }}" type="text" placeholder="" >
                <input name="tag_4" class="tag_1" value="{{ old('tag_4') }}" type="text" placeholder="" >
            </div>
        </div>
        <div class="flex">
            <button type="submit" class="submit_button">
                投稿する
            </button>
        </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('投稿してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection