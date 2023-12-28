@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper other_page">
    <div class="content_area">
        <p class="title">
            <img src="{{ asset('user/img') }}/other/error.png">
        </p>
        <p class="text center">
            現在アクセスが集中しています。<br>
            時間を置いて再度アクセスをお試し下さい。
        </p>
    </div>
</div>

@endsection
