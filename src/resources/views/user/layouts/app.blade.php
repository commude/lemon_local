<!DOCTYPE html>
<html lang="ja">
<head>
    @if(config('app.add_robot_txt'))
        <meta name="robots" content="noindex,nofollow">
    @endif

    <meta charset="UTF-8" />
	<meta name="description" content="こだわり酒場のレモンサワーを買ってスタンプを3つ集めて抽選！「3兄弟直伝！至高の楽しみ方セット」が1,000名様に当たる！キャンペーン期間：2021年8月31日（火）23：59まで" />
	<meta name="keywords" content="サントリー,SUNTORY,こだわり酒場のレモンサワー,キリっと男前,追い足しレモン,夏の塩レモン,飲み比べキャンペーン" />
	<meta name="copyright" content="copyright:Suntory Holdings Limited">
	<link rel="canonical" href="{{ config('app.url') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<!--[if IE]><meta http-equiv="Imagetoolbar" content="no"/><![endif]-->

    <title>@yield('title')</title>

    <!-- Open Graph protocol metadata start-->
	<meta property="og:type" content="website">
	<meta property="og:title" content="こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー">
	<meta property="og:image" content="{{ asset('user/img/ogp') }}/timeline.jpg">
	<meta property="og:description" content="こだわり酒場のレモンサワーを買ってスタンプを3つ集めて抽選！「3兄弟直伝！至高の楽しみ方セット」が1,000名様に当たる！キャンペーン期間：2021年8月31日（火）23：59まで">
	<meta property="og:url" content="{{ config('app.url') }}">
	<meta property="og:site_name" content="こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@suntory">
	<meta name="twitter:image:src" content="{{ asset('user/img/ogp') }}/twcard.jpg">
    <meta name="format-detection" content="telephone=no">
	<!-- Open Graph protocol metadata end-->

    <!--複製改変移植使用禁止--><script type="text/javascript" src="{{ asset('user/ssi') }}/sun_common/sun_navi/responsive/js/head.js" charset="UTF-8"></script><!--/複製改変移植使用禁止-->

	<!-- css -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('user/css') }}/common.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('user/css') }}/screen_sp.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('user/css') }}/quagga.css" />

    <!-- favicon -->
    <meta name="msapplication-TileImage" content="/msapplication-TileImage.png" />
    <meta name="msapplication-TileColor" content="#fff"/>
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" />
    <!--[if lte IE 8]>
        <script type="text/javascript" src="./lib/html5/html5shiv-printshiv.js"></script>
        <script type="text/javascript" src="./lib/html5/css3-mediaqueries.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/ie8.css" media="screen" />
    <![endif]-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @stack('pwa-meta')
</head>
<body>
    <div id="suntoryCommonWrapper">
        <!--複製改変移植使用禁止--><div id="suntoryCommonHeader"><script type="text/javascript" src="{{ asset('user/ssi') }}/sun_common/sun_navi/responsive/js/header.js" charset="UTF-8"></script></div><!--/複製改変移植使用禁止-->
        <div id="suntory_contents">

            @yield('content')

        </div><!--/suntory_contents-->
        <!--複製改変移植使用禁止--><div id="suntoryCommonFooter"><script type="text/javascript" src="{{ asset('user/ssi') }}/sun_common/sun_navi/responsive/js/footer.js" charset="UTF-8"></script></div><!--/複製改変移植使用禁止-->
        <!-- == Tag Manager Variables ========================== -->
        <script>var __tagManagerPageCategory = 'Liquors';</script>
        <!-- == /Tag Manager Variables ========================== -->
        <!-- == Yahoo Tag Manager ============================== -->
        <script type="text/javascript">
            (function () {
                var tagjs = document.createElement("script");
                var s = document.getElementsByTagName("script")[0];
                tagjs.async = true;
                tagjs.src = "//s.yjtag.jp/tag.js#site=N8ZK8Ew";
                s.parentNode.insertBefore(tagjs, s);
            }());
        </script>
        <noscript>
        <iframe src="//b.yjtag.jp/iframe?c=N8ZK8Ew" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </noscript>
        <!-- == /Yahoo Tag Manager ============================== -->
        <!-- == Google Tag Manager ============================== -->
        <script>var dataLayer = [{pageCategory: __tagManagerPageCategory}];</script>
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TX8CMW"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TX8CMW');</script>
        <!-- == /Google Tag Manager ============================== -->
    </div><!--/suntoryCommonWrapper-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function() {
            var windowH = $(window).height(),
            scrollY = $(window).scrollTop();
            $('.card').each(function() {
            var elPosition = $(this).offset().top;
            if (scrollY > elPosition - windowH * 0.7) {
                $(this).addClass("card-on");
            }
            });
        });
    </script>
    @stack('script')
</body>
</html>
