@extends('layout')

@section('content')
<div class="main_content_wrap">
    @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg')  }}</p>
    @endif
    <div class="content_wrap">
        <div class="ranking_section_wrap"></div>
        <div class="post_section_wrap">
            <div class="post_section">
                <h1>検索条件を入力してください</h1>
                <form action="{{ url('/serch')}}" method="post">
                {{ csrf_field()}}
                {{method_field('get')}}
                <div class="form-group">
                    <label>キャラ</label>
                    <select class="form-control col-md-5" name="char">
                        <option value="">...</option>
                        <option value="リュウ">リュウ</option>
                        <option value="ケン">ケン</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="title">
                </div>
                <div class="form-group">
                    <label>ダメージ</label>
                    <input type="text" class="form-control col-md-5" placeholder="dameを入力してください" name="damage" value="{{ old("damage")}}">
                </div>
                <button type="submit" class="btn btn-primary col-md-5">検索</button>
                </form>
            </div>
        </div>
    </div>
@endsection