@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper other_page">
    <div class="content_area">
        <p class="title">
            <img src="{{ asset('user/img') }}/other/error.png"><br>
            システムエラー
        </p>
        <p class="text">
            もう一度アクセスしてください。<br>
            それでも繋がらない場合は、下記連絡先にご連絡をお願いいたします。<br>
            <br>
            サントリーキャンペーン事務局<br>
            フリーダイヤル 0120-310-754<br>
            受付時間／9：30～17：30<br>
            （土・日・祝日・2021年8月12日（木）を除く）<br>
        </p>
    </div>
</div>

<script src="{{ asset('user/js') }}/iscroll.js"></script>

@endsection
