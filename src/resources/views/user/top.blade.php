@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper top_page">

    <x-user.ios-prompt></x-user.ios-prompt>
    <x-user.android-prompt></x-user.android-prompt>

    <h1 class="kv"><img src="{{ asset('user/img') }}/top/kv.jpg?q=202107141311" alt="こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン"></h1>
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
        <img src="{{ asset('user/img') }}/top/entry_qr_pctop.png">
    @endisset
    <div class="flow">
        <h2 class="title"><img src="{{ asset('user/img') }}/top/flow_title.png" alt="応募の流れ"></h2>
        <ul class="flow_list">
            <li class="flow_item"><img src="{{ asset('user/img') }}/top/flow_01.png"></li>
            <li class="flow_item"><img src="{{ asset('user/img') }}/top/flow_02.png"></li>
            <li class="flow_item"><img src="{{ asset('user/img') }}/top/flow_03.png"></li>
            <li class="flow_item"><img src="{{ asset('user/img') }}/top/flow_04.png"></li>
        </ul>
    </div>
    @if ($userAgent == 'mobile')
        <div class="entry" id="UA_entry_area_sp">
            <h2 class="title"><img src="{{ asset('user/img') }}/top/entry_title.png" alt="キャンペーン参加"></h2>
            <div class="entry_content">
                <h3 class="subtitle"><img src="{{ asset('user/img') }}/top/entry_subtitle.png" alt="応募要項"></h3>
                <p class="text">応募要項をご確認・ご同意いただいたうえで、<br>チェックボックスにチェックを入れてください。</p>
                <a class="entry_btn box_link" id="guide" onclick="dataLayer.push({event:'gaEvent',params:['top_sp_guide_button', 'click', 'guide']});"><img src="{{ asset('user/img') }}/top/entry_btn.png" alt="応募要項を確認する"></a>
                <div class="entry_line_area">
                    <form action="{{ route('line.login') }}" id="login" method="POST">
                        @csrf
                        <div class="entry_box_participate_age">
                            <input type="checkbox" id="age" name="age">
                            <label for="age" class="entry_participate_checkbox">20歳以上でキャンペーンの応募要項に同意する</label>
                            <div class="entry_box_participate_login">
                                <input type="image" formaction="{{ route('line.login') }}" onclick="dataLayer.push({event:'gaEvent',params:['top_sp-line-login','click', 'line-login']});" src="{{ asset('user/img') }}/top/entry_line_btn.png" alt="LINEでログイン">
                                <img src="{{ asset('user/img') }}/top/entry_line_btn_off.png" alt="LINEでログイン">
                            </div>
                        </div>
                    </form>
                </div>
                <p class="attention_title">アカウントをお持ちでない方は<a href="https://line.me/ja/" target="_blank" rel="noopener noreferrer" onclick="dataLayer.push({event:'gaEvent',params:['top_sp_line_button', 'click', 'line']});">こちら</a></p>
                <p class="attention">※この画面をアプリ内ブラウザで開いている場合は、SafariやChromeなど別のブラウザで開いてください。<br>※cookieをブロックしている場合はブロックを解除してください。詳しくは<a href="https://mobile.suntory.co.jp/cpn/common/cookie/" target="_blank" rel="noopener noreferrer" onclick="dataLayer.push({event:"gaEvent",params:["top_sp_cookie_button", "click", "suntory-ookie"]});">こちら</a></p>
            </div>
        </div>
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
        <div class="campaign_btn_wrapper">
            <a class="campaign_btn box_link" href="#UA_entry_area_sp" onclick="dataLayer.push({event:'gaEvent',params:['top_sp_campaign_button', 'click', 'top_sp']});"><img src="{{ asset('user/img') }}/top/campaign_btn2.png" alt="キャンペーンに参加"></a>
        </div>
    @endif
    <a class="bs_btn box_link" href="https://www.suntory.co.jp/wnb/kodawarisakaba/?utm_source=nomikurabe&utm_medium=bnr&utm_campaign=210712_nomikurabe" target="_blank" rel="noopener noreferrer" onclick="dataLayer.push({event:'gaEvent',params:['top_branb_button','click', 'suntory-brand']});"><img src="{{ asset('user/img') }}/top/campaign_entry_link_bs.png"alt="こだわり酒場のレモンサワー ブランドサイト"></a>
    <div class="fc_btn_wrapper">
        <a class="fc_btn box_link" href="https://kodawarisakaba-fan.com/?utm_source=nomikurabe&utm_medium=bnr&utm_campaign=210712_nomikurabe" target="_blank" rel="noopener noreferrer" onclick="dataLayer.push({event:'gaEvent',params:['top_kadowarisakaba-fan_button', 'click', 'kodawarisakaba_fanclub_top']});"><img src="{{ asset('user/img') }}/top/campaign_entry_link_fc.png" alt="こだわり酒場ファン倶楽部"></a>
    </div>
</div>
@endsection

@push('script')
<script type="application/javascript" src="{{ asset('user/js') }}/js.cookie.min.js"></script>
<script>
    $(function(){
        document.getElementById('guide').onclick = function() {
            win = window.open("{{ route('guide') }}");
        }
    });

    // Detects if device is on iOS
    const isIos = () => {
        const userAgentIos = window.navigator.userAgent.toLowerCase();
        return /iphone|ipod/.test( userAgentIos );
    }

    // Detects if device is on Android
    const isAndroid = () => {
        const userAgentAndroid = window.navigator.userAgent.toLowerCase();
        return /android/.test( userAgentAndroid );
    }

    var hasClosed = $.cookie('is_remove');

    // Detects if device is in standalone mode
    const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);

    // Checks if should display install iOS popup notification:
    if (isIos() && !isInStandaloneMode() && $(".add_home_modal.iOS").length && !hasClosed) {
        $(".add_home_modal.iOS").addClass("fade-in")
    }

    // Checks if should display install Android popup notification:
    if (isAndroid() && !isInStandaloneMode() && $(".add_home_modal.android").length && !hasClosed) {
        $(".add_home_modal.android").addClass("fade-in")
    }

    $(".add_home_modal>.close").click(function(){
        $.cookie('is_remove', true);
        $(".add_home_modal").fadeToggle();
    });
</script>
@endpush
