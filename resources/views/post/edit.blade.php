@extends('layout')
@section('title', 'ブログ編集')
@section('content')
<div class="main_content_wrap">
    <div class="content_wrap">
        <div class="post_section_wrap">
            <div class="post_form_section">
        <h2 class="post_form_h2">コンボ編集フォーム</h2>
            <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}"><!--隠してidを飛ばす必要がある-->
                <div class="post_select_form">
                    <p class="form_p">キャラクター</p>
                    <div class="char_select_form"  action="">
                        <select name="char" id="Select1" class="cp_ipselect cp_sl01" onchange="selectboxChange();">
                            <option value="{{ $post->char }}">{{ $post->char }}</option>
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
                            <option value="{{ $post->when_season }}">{{ $post->when_season }}</option>
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
                        <input class="normal_input" id="" name="damage" value="{{ $post->damage }}">
                    </div> 
                </div>
                <div class="post_info">
                    <p class="post_form_upper_p">タイトル</p>
                    <input
                        class="form_input_long"
                        name="title"
                        placeholder="例 : 小梅式エイジス表裏"
                        value="{{ $post->title }}">
                </div>
                <div class="post_info">
                        <p class="post_form_upper_p">レシピ</p>
                        <textarea id="combo_content" name="combo_content" value="" type="text" placeholder="例 : 前ジャンプ→大k→中足→波動拳" >{{ $post->combo_content }}</textarea>
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
                        >{{ $post->advise }}</textarea>
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
                            value="{{ $post->twitter_url }}"
                        >
                    </div>
                </div>
                <div class="post_info">
                    <p class="post_form_upper_p">タグ</p>
                    <div class="flex_wrap"  action="">
                        <input name="tag_1" class="tag_1" value="{{ $post->tag_1 }}" type="text" placeholder="" >
                        <input name="tag_2" class="tag_1" value="{{ $post->tag_2 }}" type="text" placeholder="" >
                        <input name="tag_3" class="tag_1" value="{{ $post->tag_3 }}" type="text" placeholder="" >
                        <input name="tag_4" class="tag_1" value="{{ $post->tag_4 }}" type="text" placeholder="" >
                    </div>
                </div>
                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('posts') }}">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary">
                        更新する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}

</script>
@endsection