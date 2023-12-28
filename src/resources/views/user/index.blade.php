@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper top_page">
    <h1 class="kv"><img src="{{ asset('user/img') }}/top/kv.jpg" alt="こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン"></h1>
    <div class="info">
        <h2 class="title"><img src="{{ asset('user/img') }}/top/info_title.png" alt="キャンページ概要"></h2>
        <p class="content">
            <img src="{{ asset('user/img') }}/top/info_content.png" class="pc"
                alt="
                こだわり酒場のレモンサワーを買って
                スタンプを3個集めて抽選しよう！
                「3兄弟直伝！至高の楽しみ方セット」が
                1,000名様に当たります！
                飲み比べで当選確率アップ！！
                対象商品4種中
                2種スタンプで当選確率2倍！
                3種スタンプで当選確率3倍に！
                こだわり酒場のレモンサワー
                3兄弟、飲み比べてチャレンジ！">
            <img src="{{ asset('user/img') }}/top/info_content_sp.png" class="sp"
                alt="
                こだわり酒場のレモンサワーを買って
                スタンプを3個集めて抽選しよう！
                「3兄弟直伝！至高の楽しみ方セット」が
                1,000名様に当たります！
                飲み比べで当選確率アップ！！
                対象商品4種中
                2種スタンプで当選確率2倍！
                3種スタンプで当選確率3倍に！
                こだわり酒場のレモンサワー
                3兄弟、飲み比べてチャレンジ！">
        </p>
    </div>
    @if ($userAgent == 'pc')
        <div id="UA_entry_pc"></div>
        <img src="{{ asset('user/img') }}/top/entry_qr_pcindex.png">
    @endif
    <div class="introduction">
        <h2 class="title"><img src="{{ asset('user/img') }}/top/introduction_title.png" alt="賞品紹介"></h2>
        <p class="subtitle"><img src="{{ asset('user/img') }}/top/introduction_subtitle.png" alt="3兄弟直伝！至高の楽しみ方セット"></p>
        <figure class="img"><img src="{{ asset('user/img') }}/top/introduction_img.png" alt=""></figure>
        <ul class="list">
            <li>サントリー天然水スパークリング 500ml</li>
            <li>こだわり酒場のレモンサワーの素 500ml瓶</li>
            <li>こだわり酒場のレモンサワーの素〈濃いめ〉 500ml瓶</li>
            <li>こだわり酒場 オリジナルタンブラー</li>
        </ul>
    </div>
    <div class="product">
        <h2 class="title"><img src="{{ asset('user/img') }}/top/product_title.png" alt="対象商品"></h2>
        <p class="content">
            <img src="{{ asset('user/img') }}/top/product_content.png"
                alt="
                こだわり酒場のレモンサワー
                こだわり酒場のレモンサワー〈キリッと男前〉
                こだわり酒場のレモンサワー〈追い足しレモン〉
                350ml缶 / 500ml缶 /
                350ml 6缶パック / 500ml 6缶パック
                こだわり酒場のレモンサワー〈夏の塩レモン〉
                350ml缶 / 500ml缶">
        </p>
    </div>
    @if ($userAgent == 'mobile')
        <div id="UA_entry_btn"></div>
        <div class="campaign_btn_wrapper">
        <a class="campaign_btn box_link" href="https://kodawarisakabacp.jp/?fromid=line_landing" onclick="dataLayer.push({event:'gaEvent',params:['kadowarisakabacp_20210712_index_sp_button','click', 'kadowarisakabacp_20210712_top_sp']});"><img src="{{ asset('user/img') }}/top/campaign_btn1.png" alt="キャンペーンに進む"></a>
        </div>
    @endif
</div>

@endsection
