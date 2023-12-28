@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper other_page">
    <div class="content_area">
        <p class="title">
            <img src="{{ asset('user/img') }}/other/error.png"><br>
            リクエストエラー
        </p>
        <p class="text">
            リクエスト先のアクセス権がありません。
        </p>
    </div>
</div>

<script src="{{ asset('user/js') }}/iscroll.js"></script>

@endsection
