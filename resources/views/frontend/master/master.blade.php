<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <title>病人自主研究中心 | Patient Autonomy Research Center</title>
    <link rel="icon" href="favicon.ico">

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
            <!--header-->
            <header data-spy="affix" data-offset-top="100">
                <div class="container text-right">
                    <!-- nav-tool -->
                    <div class="nav-tool">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="#U" id="AU" name="U" title="右上方功能區塊" accesskey="U" tabindex="1">:::</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="consult.html" title="線上諮詢">線上諮詢</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sitemap.html" title="網站導覽">網站導覽</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html" title="關於我們">關於我們</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="exercise.html" title="行使權利">行使權利</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="donate.html" title="我要支持">我要支持</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="faq.html" title="常見問題">常見問題</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" title="English">English</a>
                            </li>
                            <div class="nav-item search">
                                <form action="search.html" method="get" name="search-form" id="search-form" title="搜尋">
                                    <input type="text" id="search" name="search" placeholder="關鍵字搜尋" title="關鍵字">
                                    <div class="fa fa-search" onclick="document.getElementById('search-form').submit();" title="搜尋"></div>
                                    <input type="submit" value="Submit" class="btn-submit" title="Submit">
                                </form>
                            </div>
                        </ul>
                    </div>
                    {{-- navigation bar --}}
                    @include('frontend.master.nav')
                </div>
            </header>
            <!--main-->
            @yield('main')
            <!--footer-->
            @include('frontend.master.footer')
    </body>
</html>