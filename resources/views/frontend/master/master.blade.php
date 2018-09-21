<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126140124-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-126140124-1');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <title>病人自主研究中心 | Patient Autonomy Research Center</title>
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