<!DOCTYPE html>
<html lang="en">

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
        <noscript><iframe title="google_tag_manager" src="https://www.googletagmanager.com/ns.html?id=GTM-MRNRS9B"
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
            <a href="/" title="Patient Autonomy Research Center" tabindex="2" class="logo-m">
                <img alt="Patient Autonomy Research Center" title="to index" src="{{ asset('assets/images/icon/logo-m.svg') }}" class="img-fluid" />
                <strong style="display: none;">Patient Autonomy Research Center</strong>
            </a>                 
        </div>
        <!-- 我要捐款 -->
        <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=3" target="_blank" rel="noopener noreferrer" title="I am willing to donate(in new window)" class="btn-donation" tabindex="4">我要<br>捐款</a>
        <!-- GoTop -->
        {{-- <a href="#" title="回到頂端" class="btn-gotop" tabindex="-1">
            <i class="fa fa-caret-up"></i>
        </a> --}}
        <!-- main-nav -->
        <div class="menu collapse" id="main-nav">
            <!-- nav-main -->
            <div class="nav-main order-lg-2">
                <div class="row">
                    <!-- logo -->
                    <h1 class="col-0 col-lg-4 ">
                        <a href="{{ url('') }}" title="Patient Autonomy Research Center" tabindex="2" class="logo">
                            <img alt="Patient Autonomy Research Center" title="to index" src="{{ asset('assets/images/icon/logo.svg') }}" class="img-fluid" />
                            <strong style="display: none;">Patient Autonomy Research Center</strong>
                        </a>
                    </h1>
                    <ul class="col-12 col-lg-8 nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('story/special') }}" title="Life Story" tabindex="2">生命故事</a>
                            <a href="#nav-story" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                            <div class="sub-nav collapsed collapse" id="nav-story">
                                <div class="sub-nav__box">
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/story/special') }}" title="Editors' choice" tabindex="2">精選特輯</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/story/love') }}" title="Family and love" tabindex="2">親愛劇場</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/story/doctor') }}" title="Words from doctors" tabindex="2">白袍診間</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/story/life') }}" title="Life and death" tabindex="2">生死迷藏</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/story/expert') }}" title="Experts' viewpoint" tabindex="2">權威觀點</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/story/story') }}" title="Stories" tabindex="2">私房故事</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/event') }}" title="Lectures and events" tabindex="2">課程與活動</a>
                            <a href="#nav-event" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                            <div class="sub-nav collapsed collapse" id="nav-event">
                                <div class="sub-nav__box">
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/event/course') }}" title="Professional lessons" tabindex="2">專業課程</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/event/lecturer') }}" title="Lecturer service" tabindex="2">講師服務</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/event/video') }}" title="Online video lessons" tabindex="2">線上影音課程</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/event/lohas') }}" title="Lohas" tabindex="2">生命樂活</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/law') }}" title="Laws and policies" tabindex="2">法規政策</a>
                            <a href="#nav-law" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                            <div class="sub-nav collapsed collapse" id="nav-law">
                                <div class="sub-nav__box">
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/law/act') }}" title="Laws" tabindex="2">法規實務</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/law/policy') }}" title="Policies" tabindex="2">政策研究</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/trend') }}" title="World movement" tabindex="2">全球脈動</a>
                            <a href="#nav-trend" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                            <div class="sub-nav collapsed collapse" id="nav-trend">
                                <div class="sub-nav__box">
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/trend/international') }}" title="World news" tabindex="2">國際新知</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/trend/exchange') }}" title="World collaboration" tabindex="2">合作交流</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/trend/ngo') }}" title="International NGOs" tabindex="2">國際NGO</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('/trend/world') }}" title="World trend" tabindex="2">世界趨勢</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/news') }}" title="Latest news" tabindex="2">最新消息</a>
                            <a href="#nav-news" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                            <div class="sub-nav collapsed collapse" id="nav-news">
                                <div class="sub-nav__box">
                                    <div class="sub-nav__item">
                                        <a href="{{ url('news/center') }}" title="Center movement" tabindex="2">中心動態</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('news/law') }}" title="Law and policy movement" tabindex="2">法規政策動態</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('news/event') }}" title="Lecture and events movement" tabindex="2">課程與活動動態</a>
                                    </div>
                                    <div class="sub-nav__item">
                                        <a href="{{ url('news/international') }}" title="World movement" tabindex="2">國際動態</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- nav-tool -->
            <div class="nav-tool order-lg-1 ">
                <ul class="nav justify-content-lg-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#U" id="AU" name="U" title="Top right corner function section" accesskey="U" tabindex="1">:::</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" title="線上諮詢">線上諮詢</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/sitemap') }}" title="Sitemap" tabindex="1">網站導覽</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}" title="About Us" tabindex="1">關於我們</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/exercise') }}" title="Exercise your rights" tabindex="1">行使權利</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/donate') }}" title="Support and donation" tabindex="1">我要支持</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/faq') }}" title="Frequently asked questions" tabindex="1">常見問題</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about-en') }}" title="English" tabindex="1">English</a>
                    </li>
                    <li class="nav-item search">
                        <form action="{{ url('search')}}" method="get" name="search-form" id="search-form" title="Search" >
                            <label for="S" class="d-none">Search: </label>
                            <input type="text" id="S" accesskey="S" name="q" placeholder="Enter keyword" title="Search" value="{{ old('q')}}" tabindex="1">
                            <div class="fa fa-search" onclick="document.getElementById('search-form').submit();" title="Search" tabindex="1"></div>
                            <input type="submit" value="Submit" class="btn-submit" title="Submit">
                        </form>
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
    
    
        <h2 class="world__title-r">What Patient Autonomy Is</h2>
    
        <p class="text-center m-5">
            The core concept of patient autonomy is that a patient has the right to make their own medical decisions. This is closely related to three human values: Respecting patient autonomy in healthcare; safeguarding patients' rights to a good death; and promoting a harmonious physician-patient relationship. Through advancements in modern medicine, we have become able to extend our lifespans with the help of various medical treatments when we are terminally ill or have lost consciousness. However, these extensions may come at the expense of quality of life and dignity. This also brings pain to family members when they need to make medical decisions for us. For these reasons, we advocate that patients should have the right to refuse treatment and to have a dignified end of life. It is our hope that society will empower patients, and respect and trust patients' autonomous wishes. We also hope that everyone will think more deeply about having dignity at the end of life, and that the concept will form a new cultural atmosphere and way of nurturing life.
        </p>
    
        <h2 class="world__title-r">Patient Right to Autonomy Act: an Introduction</h2>
    
        <p class="text-center m-5">
            Patient autonomy has been implemented in many countries in the West for a long time, and it is seen as a universal human right. After passing the Patient Right to Autonomy Act near the end of 2015, Taiwan became the leader in Asia in implementing patient autonomy. The core concept of the Act is to ensure legal protection for the patient's right to autonomous wishes and to a dignified end. Through signing an Advance Decision, everyone will be able to make medical decisions for themselves before they become terminally ill, and thus spare themselves and their loved ones from pain.
        </p>
    
        <h2 class="world__title-r">Patient Autonomy Research Center: About Us</h2>
        <p class="text-center m-5">Honorary Consultant to the Legislative Yuan Yang Yu-hsin realizes the importance of serving the "last leg of life's journey", and of keeping life education and good end of life care as core concepts. For these reasons, she fought for a long-term organization specifically responsible for fighting for these benefits on behalf of the people. Therefore, in 2017, the Patient Autonomy Research Center was established. Our goals are to become a bridge between the medical field and the general public, by engaging the public with a series of creative activities that get people to think about patient autonomy and then take action.</p>
        <p class="text-center m-5">Our long-term vision is to continue promoting life education and the concept of having a dignified end, now that the Patient Right to Autonomy Act has formally come into effect. These new ways of thinking about the end of life will make Taiwan a good example for other Asian societies to follow.</p>
        
        <h2 class="world__title-r">Our Mission</h2>
        <p class="text-center m-5">Our work focuses on policy research, educational training, implementation in medical facilities, and public promotion. Through planning, coordinating, communicating, and promoting with various parties, we hope to integrate and maximize the efforts of agencies from both the governmental sector and the private sector to promote the Patient Right to Autonomy Act. By doing so, the public will be encouraged to think about the value of both a dignified end and of life.</p>
    
        <h2 class="world__title">We welcome people from all fields to contact us and share their views.<br>You can reach us via the methods below.</h2>
        <div class="world__box">
            <p class="mb-4"><b>Patient Autonomy Research Center</b></p>
            <p><b>Email：</b><a href="#">service@parc.tw</a></p>
            <p><b>Address:</b> No.1, Sec. 4, Roosevelt Rd., Zhongzheng Dist., Taipei City 100, Taiwan (R.O.C.)</p>
            <p><b> 　　　 　 </b>Liberal Education Classroom Building  Life Education Center.</p>
        </div>
    
    
    </section>
    
    </main>
            <!--footer-->
            <!--footer-->
<footer class="footer text-center text-lg-left affix" data-spy="affix" data-offset-top="100">
    <div class="container footer-more">
        <a href="#Z" id="AZ" title="Bottom function section" accesskey="Z" name="Z">:::</a>
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img src="{{ asset('assets/images/icon/logo-footer.svg') }}" class="logo img-fluid" alt="Patient Autonomy Research Center Logo" />
            </div>
            <div class="col-12 col-lg-4 text-center">
                <div class="footer-title">即刻行動</div>
                <a href="{{ url('/donate/story') }}" title="Share your story" class="footer-link">分享故事</a> /
                <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=3" target="_blank" rel="noopener noreferrer" title="我要捐款(另開視窗)" class="footer-link">我要捐款</a> /
                <a href="https://tlea.neticrm.tw/civicrm/profile/create?gid=15&reset=1" target="_blank" rel="noopener noreferrer" title="訂閱電子報(另開視窗)" class="footer-link">訂閱電子報</a>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <div class="footer-title">追蹤我們</div>
                <a href="https://www.facebook.com/parc.tw/" title="facebook(new window)" class="footer-social" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/icon/icon-facebook.svg') }}" class="img-fluid" alt="" target="_blank" rel="noopener noreferrer"/>
                </a>
                {{-- <a href="#" title="line" class="footer-social" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/icon/icon-line.svg') }}" class="img-fluid" alt=""/>
                </a> --}}
                <a href="https://www.youtube.com/channel/UCkJWN2WEhzH_EA5QM65GchQ" title="youtube (new window)" class="footer-social" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/icon/icon-youtube.svg') }}" class="img-fluid" alt=""/>
                </a>
            </div>
        </div>
    </div>
    <div class="container footer-copyright">
        <a href="mailto:service@parc.tw">電子信箱 : service@parc.tw</a>
        <div>中心地址 : 10617 台北市大安區羅斯福路四段1號
            <br class="d-lg-none"> 博雅教學館 生命教育中心</div>
        <div>病人自主研究中心 PARC © 2018. All Rights Reserved.</div>
    </div>
    <div class="container">
        <!-- GoTop -->
        <a href="#" title="To top" class="btn-gotop">
            <i class="fa fa-caret-up"></i>
        </a>
    </div>
</footer>
</div>
    </body>
</html>