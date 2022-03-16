@extends('layout')
@section('title', 'ブログ投稿')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ブログ投稿フォーム</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
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