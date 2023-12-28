@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper top_page">

    <h1 class="kv"><img src="{{ asset('user/img') }}/top/kv.jpg?q=202107141311" alt="こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン"></h1>
        <img src="{{ asset('user/img') }}/top/close.png" alt="キャンページ終了" class="closeImg">
    <a class="bs_btn box_link" href="https://www.suntory.co.jp/wnb/kodawarisakaba/?utm_source=nomikurabe&utm_medium=bnr&utm_campaign=210712_nomikurabe" target="_blank" rel="noopener noreferrer" onclick="dataLayer.push({event:'gaEvent',params:['close_branb_button','click', 'suntory-brand']});"><img src="{{ asset('user/img') }}/top/campaign_entry_link_bs.png"alt="こだわり酒場のレモンサワー ブランドサイト"></a>
    <div class="fc_btn_wrapper">
        <a class="fc_btn box_link" href="https://kodawarisakaba-fan.com/?utm_source=nomikurabe&utm_medium=bnr&utm_campaign=210712_nomikurabe" target="_blank" rel="noopener noreferrer" onclick="dataLayer.push({event:'gaEvent',params:['close_kadowarisakaba-fan_button', 'click', 'kodawarisakaba_fanclub_top']});"><img src="{{ asset('user/img') }}/top/campaign_entry_link_fc.png" alt="こだわり酒場ファン倶楽部"></a>
    </div>
</div>
@endsection

@push('script')
<script type="application/javascript" src="{{ asset('user/js') }}/js.cookie.min.js"></script>
@endpush
