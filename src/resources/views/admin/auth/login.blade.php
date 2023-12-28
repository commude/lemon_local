@extends('admin.layouts.admin_auth')

@section('title', '管理者ログイン')

@section('content')
<p class="title_adlogin" align="center">
    こだわり酒場のレモンサワー<br>
    3兄弟の店の味！飲み比べキャンペーン
</p>
<hr color="#E8ECEE">
<!-- フォーム START -->
<div id="form_adlogin" align="center">
    <form action="{{ route('admin.login') }}" method="POST" id="adLogin" name="adLogin" autocomplete="off">
        @csrf
        <p class="title_input">ID</p>
        <div class="box_input_adlogin">
            <label class="lable_input">
                <input type="text" name="email" id="uid" autocomplete="off" value="{{ request()->old('email') }}">
            </label>
            @error('email')
            <p class="err_adlogin">{{ $message }}</p>
            @enderror
        </div>
        <p class="title_input">パスワード</p>
        <div class="box_input_adlogin">
            <label class="lable_input">
                <input type="password" name="password" id="pwd" autocomplete="off">
            </label>
            @error('password')
            <p class="err_adlogin">{{ $message }}</p>
            @enderror
        </div>

        <div class="box_input_adlogin">
            <div class="g-recaptcha" data-sitekey="{{ config('app.recaptcha.site_key') }}"></div>
            @error('g-recaptcha-response')
            <p class="err_adlogin">{{ $message }}</p>
            @enderror
        </div>

        <input type="image" src="{{ asset('admin/images') }}/admin_login_btn.jpg" alt="ログイン"><BR><BR>
    </form>
</div>
<!-- フォーム END -->
@endsection
