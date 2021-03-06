<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WH3577T');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />

   <meta property="og:title" content="病人自主研究中心">
    <meta property="og:description" content="病主中心｜為愛自主 全民幸福">
    <meta property="og:image" content="/assets/images/photo/parc.jpg">

    {{-- <title>病人自主研究中心 | Patient Autonomy Research Center</title> --}}
    <title>病人自主研究中心 | Patient Autonomy Research Center - About Us</title>
    <link rel="icon" href="{{ asset('assets/ico/favicon.ico') }}">

    <!-- CSS -->
    {{-- <link rel="stylesheet" href="css/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/all.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">

    {{-- script --}}
    <!-- JavaScript -->
    <script src="{{ asset('assets/lib/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap-datepicker/locales/bootstrap-datepicker.zh-tw.min.js') }}"></script>
    <script src="{{ asset('assets/js/base.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>

    <!--<link rel="stylesheet" href="css/all.min.css">-->
</head>
    <body>
        <a href="#C" title="Navigate to main content" tabindex="1" style="color:rgb(248,248,248);">Navigate to main content</a>
        <noscript style="background-color:white;z-index: 5000;position: absolute;">
            您的瀏覽器不支援JavaScript功能，若網頁功能無法正常使用時，請開啟瀏覽器JavaScript狀態
            <br>
            Sorry, your browser does not support JavaScript.Please enable Javascript in your browser settings.
        </noscript>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe title="google_tag_manager" src="https://www.googletagmanager.com/ns.html?id=GTM-WH3577T"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

            {{-- navigation bar --}}
            <!--header-->
<header data-spy="affix" data-offset-top="100">
        <div class="container">
            <!--menu-bar-->
            <div class="menu-bar d-lg-none">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-nav" aria-expanded="true">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- logo-m -->
                <a href="/" title="病人自主研究中心" tabindex="2" class="logo-m">
                    <img alt="病人自主研究中心" title="回首頁" src="{{ asset('assets/images/icon/logo-m.svg') }}" class="img-fluid">
                    <strong style="display: none;">病人自主研究中心</strong>
                </a>                 
            </div>
            @mobile
            <!-- 我要捐款 -->
               <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=3" title="我要捐款" class="btn-fixed btn-donation" tabindex="4" target="_blank">
                 <img src="{{ asset('assets/images/icon/donate_icon.png') }}" class="d-none d-lg-block" alt="我要捐款">
                   <span class="d-lg-none">我要<br>捐款</span>
            </a>
            @endmobile
 
              @tablet
            <!-- 我要捐款 -->
               <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=3" title="我要捐款" class="btn-fixed btn-donation" tabindex="4" target="_blank">
                 <img src="{{ asset('assets/images/icon/donate_icon.png') }}" class="d-none d-lg-block" alt="我要捐款">
                   <span class="d-lg-none">我要<br>捐款</span>
            </a>
            @endtablet

 
            <!-- main-nav -->
            <div class="menu collapse" id="main-nav">
                <!-- nav-main -->
                <div class="nav-main order-lg-2">
                    <div class="row">
                        <!-- logo -->
                        <h1 class="col-0 col-lg-4 ">
                            <a href="{{ url('') }}" title="病人自主研究中心" tabindex="2" class="logo">
                                <img alt="病人自主研究中心" title="回首頁" src="{{ asset('assets/images/icon/parc-logo.png') }}" class="img-fluid" style="margin-top:"-10px;"/>
                                <strong style="display: none;">病人自主研究中心</strong>
                            </a>
                        </h1>
                        <ul class="col-12 col-lg-8 nav justify-content-end">
                           {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('/love') }}" title="愛．活動" tabindex="2">愛．活動</a>
                            </li> --}}





<li class="nav-item">
                                <a class="nav-link" href="{{ url('/about') }}" title="關於我們" tabindex="2">關於我們</a>
</li>



<li class="nav-item">                      


          
<a class="nav-link" href="{{ url('/news') }}" title="最新消息" tabindex="2">最新消息</a>
                               
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" title="課程與資源" tabindex="2">課程與資源</a>
                                <a href="#nav-event" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-event">
                                    <div class="sub-nav__box">
                                        
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/video/ExpertCourses') }}" title="課程系列" tabindex="2">課程系列</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/cert') }}" title="時數認證申請" tabindex="2">時數認證申請</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/course') }}" title="文宣出版品" tabindex="2">文宣出版品</a>
                                        </div>
                                       
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/video/PatientInstructions') }}" title="衛教影片" tabindex="2">衛教影片</a>
                                        </div>

                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/lohas/ACP') }}" title="ACP工具下載" tabindex="2">ACP工具下載</a>
                                        </div>
                                       
                                       
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" title="生命故事" tabindex="2">生命故事</a>
                                <a href="#nav-story" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-story">
                                    <div class="sub-nav__box">
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/special') }}" title="精選特輯" tabindex="2">精選特輯</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/love') }}" title="親愛劇場" tabindex="2">親愛劇場</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/doctor') }}" title="白袍診間" tabindex="2">白袍診間</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/life') }}" title="生死迷藏" tabindex="2">生死迷藏</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/expert') }}" title="各界觀點" tabindex="2">各界觀點</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/story') }}" title="ACP諮商現場" tabindex="2">ACP諮商現場</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" title="法規政策" tabindex="2">法規政策</a>
                                <a href="#nav-law" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-law">
                                    <div class="sub-nav__box">
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/law/act') }}" title="相關法規" tabindex="2">相關法規</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/law/policy/meeting') }}" title="政策研究" tabindex="2">政策研究</a>
                                        </div>
                                           <div class="sub-nav__item">
                                            <a href="{{ url('/trend') }}" title="全球脈動" tabindex="2">全球脈動</a>
                                        </div>

                                    </div>
                                </div>
                            </li>
           
@desktop
<div style="margin-top:10px;"><a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=9" title="我要捐款" tabindex="2" target="_blank"><img src="/assets/images/index/donation.png" height="auto" width=140px class="img-fluid"></a></div>
@enddesktop 

                        </ul>

                    </div>

                </div>    

                 
                <!-- nav-tool -->
                <div class="nav-tool order-lg-1" style="width:674.3px,height:62px;">
              
                    <ul class="nav justify-content-lg-end">
                        <li class="nav-item" style="font-size:1.15em;">
                            <a class="nav-link" href="#U" id="AU" name="U" title="右上方功能區塊" accesskey="U" tabindex="1">:::</a>
                        </li>

                        
                        <li class="nav-item" style="font-size:1.15em;">
                            <a class="nav-link" href="{{ url('/exercise') }}" title="我要簽署" tabindex="1">我要簽署</a>
                        </li>
                     
                        <li class="nav-item" style="font-size:1.15em;">
                            <a class="nav-link" href="{{ url('/faq') }}" title="常見問題" tabindex="1">常見問題</a>
                        </li>
                        <li class="nav-item" style="font-size:1.15em;">
                            <a class="nav-link" href="{{ url('/sponsor') }}" title="友善單位">友善單位</a>
                        </li>
                        <li class="nav-item" style="font-size:1.15em;">
                            <a class="nav-link" href="{{ url('/about-en') }}" title="English" tabindex="1">English</a>
                        </li>
                        <li class="nav-item search" style="font-size:1.15em;">
                            <form action="{{ url('search')}}" method="get" name="search-form" id="search-form" title="搜尋" >
                                <label for="S" class="d-none">關鍵字搜尋: </label>
                                <input type="text" id="S" accesskey="S" name="q" placeholder="關鍵字搜尋" title="關鍵字" value="{{ old('q')}}" tabindex="1">
                                <div class="fa fa-search" onclick="document.getElementById('search-form').submit();" title="搜尋" tabindex="1"></div>
                                <input type="submit" value="Submit" class="btn-submit" title="Submit">
                            </form>
                        </p>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
            <!--main-->
<!--main-->
<main class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="Main content" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <a href="{{ url('') }}" title="HOME" tabindex="2">HOME</a>
        </li>               
        <li class="breadcrumb-item active">About Us</li>
    </ol>
    
    <div class="banner-single owl-carousel px-0" title="About Us" style="background: url({{ asset('assets/images/photo/banner-about.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title-tl">About Us</h2>
    </div>

    <section class="container world">


        <h2 class="world__title-r">Patient Right to Autonomy Act</h2>

        <p class="text-center m-5">
            The core concept of patient autonomy is that a patient has the right to make their own medical decisions. This is closely related to three human values: Respecting patient autonomy in healthcare; safeguarding patients' rights to a good death; and promoting a harmonious physician-patient relationship. Patient autonomy has been implemented in many countries in the West for a long time, and it is seen as a universal human right. After passing the Patient Right to Autonomy Act near the end of 2015, Taiwan became the leader in Asia in implementing patient autonomy. The core concept of the Act is to ensure legal protection for the patient's right to autonomous wishes and to a dignified end. Through signing an Advance Decision, everyone will be able to make medical decisions for themselves before they become terminally ill, and thus spare themselves and their loved ones from pain.
        </p>

        <h2 class="world__title-r">Introduction to Patient Right to Autonomy Act</h2>

        <p class="text-center m-5">
            <a class="world__link" href="https://parc.tw/law/policy/article/344" target="_blank">Interpretation of the “Patient Right to Autonomy Act</a>
            <a class="world__link" href="https://parc.tw/law/act/228" target="_blank">Full Document of Patient Right to Autonomy Act</a>
            <a class="world__link" href="https://parc.tw/law/policy/article/293" target="_blank">Summary of Patient Right to Autonomy Act in PPT</a>

        </p>

        <h2 class="world__title-r">Patient Autonomy Research Center: About Us</h2>
        <p class="text-center m-5">Honorary Consultant to the Legislative Yuan Yang Yu-Hsin realizes the importance of serving the "last leg of life's journey", and of keeping life education and good end of life care as core concepts. For these reasons, she fought for a long-term organization specifically responsible for fighting for these benefits on behalf of the people. Therefore, in 2017, the Patient Autonomy Research Center was established. Our goals are to become a bridge between the medical field and the general public, by engaging the public with a series of creative activities that get people to think about patient autonomy and then take action.</p>
        <p class="text-center m-5">Our long-term vision is to continue promoting life education and the concept of having a dignified end, now that the Patient Right to Autonomy Act has formally come into effect. These new ways of thinking about the end of life will make Taiwan a good example for other Asian societies to follow.</p>

        <h2 class="world__title-r">Our Mission</h2>
        <p class="text-center m-5">Our work focuses on policy research, educational training, implementation in medical facilities, and public promotion. Through planning, coordinating, communicating, and promoting with various parties, we hope to integrate and maximize the efforts of agencies from both the governmental sector and the private sector to promote the Patient Right to Autonomy Act. By doing so, the public will be encouraged to think about the value of both a dignified end and of life.</p>

        <h2 class="world__title">We welcome people from all fields to contact us and share their views.<br>You can reach us via the methods below.</h2>
        <div class="world__box">
            <p class="mb-4"><b>Patient Autonomy Research Center</b></p>
            <p><b>Email：</b><a href="#">service@parc.tw</a></p>
            <p><b>Address:</b> P.O.BOX 30-98 NewTaipei City Government, New Taipei City 22099, Taiwan (R.O.C.)</p>
        </div>


    </section>
    
    </main>
            <!--footer-->
   