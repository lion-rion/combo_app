@extends('layout')
@section('title', 'ブログ編集')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ブログ編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}"> <!--IDを隠して飛ばしてあげる必要がある -->
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $post->title }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                    本文
                </label>
                <textarea
                    id="combo_content"
                    name="combo_content"
                    class="form-control"
                    rows="4"
                >{{ $post->combo_content }}</textarea>
                @if ($errors->has('combo_content'))
                    <div class="text-danger">
                        {{ $errors->first('comob_content') }}
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
                >{{ $post->advise }}</textarea>
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
                >{{ old('when_season') }}</textarea>
                @if ($errors->has('when_season'))
                    <div class="text-danger">
                        {{ $errors->first('when_season5') }}
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
                >{{ $post->twitter_url }}</textarea>
                @if ($errors->has('twitter_url'))
                    <div class="text-danger">
                        {{ $errors->first('twitter_url') }}
                    </div>
                @endif
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