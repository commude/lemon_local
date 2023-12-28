<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('admin/css') }}/lemonsour_admin_user.css" rel="stylesheet" type="text/css">
    @stack('styles')
    <link href="{{ asset('admin/css') }}/jquery-ui.css" rel="stylesheet">
</head>
<body>
    <x-admin.side type="{{ $page }}"/>

    @yield('content')

    @include('admin.components.script')
    @stack('scripts')
</body>
</html>
