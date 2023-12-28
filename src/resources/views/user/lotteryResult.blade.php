@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper animation_page">
    @if ($result == '3')
        <img src="{{ asset('user/img') }}/result/lotteryWin.gif">
        <form action={{ route('btcForm')}} method='POST'>
            @csrf
            <input class="form" type=image src="{{ asset('user/img') }}/result/btn1.png" onclick="dataLayer.push({event:'gaEvent',params:['lotteryWin_buttun', 'click', 'btc-form']});">
        </form>
    @else
        <img src="{{ asset('user/img') }}/result/lotteryLost.gif">
        <a class="btn" href="{{ route('mypage') }}"><img src="{{ asset('user/img') }}/result/btn2.png"></a>
    @endisset
</div>

@endsection
