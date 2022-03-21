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
            </div>
        </div>
    </div>
@endsection