@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper animation_page">
	<img src="{{ asset('user/img') }}/result/lottery_anim.gif">
</div>
<div class=form_data>
    <form action="{{ route('lotteryResult') }}" method="POST">
        @csrf
        <input id="result" name="result">
        <input type="submit" id="winSubmit">
    </form>
</div>
<script type="text/javascript">
    setTimeout(function() {
        document.getElementById( "result" ).value = '<?php echo $result; ?>'
        document.getElementById("winSubmit").click();
    }, 4*1000)
</script>

@endsection
