<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MRNRS9B');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    {{-- <title>病人自主研究中心 | Patient Autonomy Research Center</title> --}}
    @yield('title')
    <link rel="icon" href="{{ asset('assets/ico/favicon.ico') }}">

    <!-- CSS -->
    {{-- <link rel="stylesheet" href="css/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/all.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">

    {{-- script --}}
    @include('frontend.master.script')

    <!--<link rel="stylesheet" href="css/all.min.css">-->
</head>
    <body>
        <a href="#C" title="跳到主要內容區塊" tabindex="1" style="color:rgb(248,248,248);">跳到主要內容區塊</a>
        <noscript style="background-color:white;z-index: 5000;position: absolute;">
            您的瀏覽器不支援JavaScript功能，若網頁功能無法正常使用時，請開啟瀏覽器JavaScript狀態
            <br>
            Sorry, your browser does not support JavaScript.Please enable Javascript in your browser settings.
        </noscript>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRNRS9B"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <div class="wrap">
            <!-- circle -->
            <div class="circle">
                <div class="container">
                    <div class="circle-box">
                        <div class="circle-main"></div>
                    </div>
                </div>
            </div>
            {{-- navigation bar --}}
            @include('frontend.master.nav')
            <!--main-->
            @yield('main')
            <!--footer-->
            @include('frontend.master.footer')
    </body>
</html>