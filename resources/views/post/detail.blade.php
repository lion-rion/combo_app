@extends('layout')
@section('title','ブログ詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $post->title }}</h2>
      <span>作成日:{{ $post->created_at}}</span>
      <p>{{$post->combo_content}}</p>
  </div>
</div>
@endsection