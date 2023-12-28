<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('admin') }}/css/lemonsour_admin.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body bgcolor="#F9F9FC">
    <div id="box_adlogin_main" align="center">
        <div id="box_adlogin">
            @yield('content')
        </div>
    </div>
</body>
</html>
