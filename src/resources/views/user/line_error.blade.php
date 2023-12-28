@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper other_page">
	<div class="content_area">
		<p class="title">
			<img src="{{ asset('user/img') }}/other/error.png"><br>
			LINEログインエラー
		</p>
		<p class="text">
			応募には、サントリーアカウントのフォローが必要です。<br>
			改めてマイページからLINEログインを行いアカウントフォローをお願いします。<br>
			<br>
            <a href="{{ route('top') }}">>トップベージへ</a><br>
			<br>
			※サントリーアカウントをブロックしている方は、ブロックを解除してからログインを行ってください。
		</p>
	</div>
</div>

<script src="{{ asset('user/js') }}/iscroll.js"></script>

@endsection
