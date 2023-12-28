@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper animation_page">
    <p class="stamp_text">スタンプ発行中…</p>
    @if ($stampType <= 3)
        <img id="image_gif" src="{{ asset('user/img') }}/animation/teiban.gif?time={{ Carbon\Carbon::now()->timestamp }}">
    @elseif ($stampType >= 4 && $stampType <= 7)
        <img id="image_gif" src="{{ asset('user/img') }}/animation/otokomae.gif?time={{ Carbon\Carbon::now()->timestamp }}">
    @elseif ($stampType >= 8 && $stampType <= 11)
        <img id="image_gif" src="{{ asset('user/img') }}/animation/oitashi.gif?time={{ Carbon\Carbon::now()->timestamp }}">
    @elseif ($stampType >= 12)
        <img id="image_gif" src="{{ asset('user/img') }}/animation/shio.gif?time={{ Carbon\Carbon::now()->timestamp }}">
    @endif
</div>

@endsection

@push('script')
<script type="text/javascript">
    setTimeout(function() {
        window.location.href = "{{ route('mypage') }}#stamp_card"
    }, 6.7*1000)
</script>
@endpush
