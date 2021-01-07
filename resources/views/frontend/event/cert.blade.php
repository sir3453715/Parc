<!DOCTYPE html>

<html lang="zh-Hant-TW">
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

<a href="#C" title="跳到主要內容區塊" tabindex="1" style="color:rgb(248,248,248);position:absolute;border:0;">跳到主要內容區塊</a>
    <noscript style="background-color:white;z-index: 5000;position: absolute;">
        您的瀏覽器不支援JavaScript功能，若網頁功能無法正常使用時，請開啟瀏覽器JavaScript狀態
        <br>
        Sorry, your browser does not support JavaScript.Please enable Javascript in your browser settings.
    </noscript>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe title="google_tag_manager" src="https://www.googletagmanager.com/ns.html?id=GTM-WH3577T"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    
        
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
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <a href="https://parc.tw" title="首頁" tabindex="2">首頁</a>
        </li>
        <li class="breadcrumb-item">
            <a title="課程與資源" tabindex="2">課程與資源</a>
        </li>
        <li class="breadcrumb-item">
            <a href="https://parc.tw/event/cert" title="時數認證申請" tabindex="2">時數認證申請</a>
        </li>
        <h2 class="d-none" id="h2"></h2>
    </ol>

<div class="banner-single owl-carousel mb-0" title="時數認證申請" style="background: url(/assets/images/photo/banner-cert.png) no-repeat center;background-size: cover;">
    <h2 class="banner-single__title">時數認證申請</h2>
</div>

<h2 class="title" style="font-size:26px">病主法全攻略線上課程時數認證申請</h2>

@mobile
<p align="center"><img alt="" src="/assets/images/photo/20200512.png" style="height:auto;width:50%" /></p>
<table cellspacing="0" class="MsoTableGrid" style="background:666666; border-collapse:collapse; border:none; width:100%">
	<tbody>
		<tr>
			<td style="height:auto; vertical-align:top; width:100%">
                    <p><span style="font-size:20px"><strong>認證項目：</strong>預立醫療照護諮商人員訓練時數／繼續教育積分</span></p>
			<p><span style="font-size:20px"><strong>申請資格：</strong>醫師、護理人員、心理師、社工人員(其他職類人員尚未開放)</span></p>

			<p><span style="font-size:20px"><strong>申請條件（符合其中一項即可）：</strong></span></p>
                             
			<ul>
				<p><li><span style="font-size:20px">於長照數位學習平台選修「病主法全攻略線上課程」並通過課程者</span></li></p>
                         
				
				<p><li><span style="font-size:20px">於護理師護士公會全聯會雲端學習中心選修「預立醫療照護諮商人員訓練課程」並通過課程者</span></li></p>
	
</ul>
		<p style="margin-left:20px"><span style="font-size:20px"><strong>前往申請：</strong><a href="https://tlea.neticrm.tw/civicrm/event/register?reset=1&id=11" target="_blank" style="color:#2f81b7">醫師點我申請【4小時認證】</a></span></p>
                        <p style="margin-left:120px"><span style="font-size:20px"><a href="https://tlea.neticrm.tw/civicrm/event/register?reset=1&id=10" target="_blank" style="color:#2f81b7">護理人員、社心人員點我申請【6小時認證】</a></span></p>
<p style="margin-left:10px"><span style="font-size:20px"><strong>【提交申請後，審核時間約1-3工作天，請留意您的Email信箱】</strong></span></p>
 <br>
<br>

			<p align=right><strong><span style="font-size:18px">▶︎<a href="https://parc.tw/event/video/ExpertCourses" target="_blank" style="color:blue">瞭解更多</a></strong></span></p>
<hr>
@endmobile

@tablet
<p align="center"><img alt="" src="/assets/images/photo/20200512.png" style="height:auto;width:50%" /></p>
<table cellspacing="0" class="MsoTableGrid" style="background:666666; border-collapse:collapse; border:none; width:100%">
	<tbody>
		<tr>
			<td style="height:auto; vertical-align:top; width:100%">
                    <p><span style="font-size:20px"><strong>認證項目：</strong>預立醫療照護諮商人員訓練時數／繼續教育積分</span></p>
			<p><span style="font-size:20px"><strong>申請資格：</strong>醫師、護理人員、心理師、社工人員(其他職類人員尚未開放)</span></p>

			<p><span style="font-size:20px"><strong>申請條件（符合其中一項即可）：</strong></span></p>
                             
			<ul>
				<p><li><span style="font-size:20px">於長照數位學習平台選修「病主法全攻略線上課程」並通過課程者</span></li></p>
                         
				
				<p><li><span style="font-size:20px">於護理師護士公會全聯會雲端學習中心選修「預立醫療照護諮商人員訓練課程」並通過課程者</span></li></p>
			
</ul>

			
		<p style="margin-left:20px"><span style="font-size:20px"><strong>前往申請：</strong><a href="https://tlea.neticrm.tw/civicrm/event/register?reset=1&id=11" target="_blank" style="color:#2f81b7">醫師點我申請【4小時認證】</a></span></p>
                        <p style="margin-left:120px"><span style="font-size:20px"><a href="https://tlea.neticrm.tw/civicrm/event/register?reset=1&id=10" target="_blank" style="color:#2f81b7">護理人員、社心人員點我申請【6小時認證】</a></span></p>
<p style="margin-left:10px"><span style="font-size:20px"><strong>【提交申請後，審核時間約1-3工作天，請留意您的Email信箱】</strong></span></p>
 <br>
<br>

			<p align=right><strong><span style="font-size:18px">▶︎<a href="https://parc.tw/event/video/ExpertCourses" target="_blank" style="color:blue">瞭解更多</a></strong></span></p>
<hr>
   
@endtablet

@desktop

<table cellspacing="0" class="MsoTableGrid" style="background:666666; border-collapse:collapse; border:none; width:100%">
	<tbody>
		<tr>
<td style="vertical-align:top;height:auto;width:25%">
			<p><img alt="" src="/assets/images/photo/20200512.png" style="height:auto;width:100%" /></p>
			</td>



			<td style="height:auto; vertical-align:top; width:100%">
                    <p style="margin-left:20px;margin-top:10px"><span style="font-size:20px"><strong>認證項目：</strong>預立醫療照護諮商人員訓練時數／繼續教育積分</span></p>
			<p style="margin-left:20px"><span style="font-size:20px"><strong>申請資格：</strong>醫師、護理人員、心理師、社工人員(其他職類人員尚未開放)</span></p>

			<p style="margin-left:20px"><span style="font-size:20px"><strong>申請條件（符合其中一項即可）：</strong></span></p>
                             
			<ul>
				<p style="margin-left:20px"><li><span style="font-size:20px">於長照數位學習平台選修「病主法全攻略線上課程」並通過課程者</span></li></p>
                         
				
				<p style="margin-left:20px"><li><span style="font-size:20px">於護理師護士公會全聯會雲端學習中心選修「預立醫療照護諮商人員訓練課程」並通過課程者</span></li></p>
			
</ul>

		<p style="margin-left:20px"><span style="font-size:20px"><strong>前往申請：</strong><a href="https://tlea.neticrm.tw/civicrm/event/register?reset=1&id=11" target="_blank" style="color:#2f81b7">醫師點我申請【4小時認證】</a></span></p>
                        <p style="margin-left:120px"><span style="font-size:20px"><a href="https://tlea.neticrm.tw/civicrm/event/register?reset=1&id=10" target="_blank" style="color:#2f81b7">護理人員、社心人員點我申請【6小時認證】</a></span></p>
                <p style="margin-left:10px"><span style="font-size:20px"><strong>【提交申請後，審核時間約1-3工作天，請留意您的Email信箱】</strong></span></p>
<br>
<br>

			<p align=right><strong><span style="font-size:18px">▶︎<a href="https://parc.tw/event/video/ExpertCourses" target="_blank" style="color:blue">瞭解更多</a></strong></span></p>

			
</td>
		</tr>
	</tbody>
</table>

<hr>   
@enddesktop


</main>
        <!--footer-->
      <footer class="footer text-center text-lg-left" data-spy="affix" data-offset-top="100">
    <div class="container footer-more">
       
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img src="{{ asset('assets/images/icon/parc-logo.png') }}" class="logo img-fluid" alt="病人自主Logo"/>
            </div>
            <div class="col-12 col-lg-5 footer-copyright style="margin-top:30px;">
                <a href="mailto:service@parc.tw">電子信箱 : service@parc.tw</a>
                <div>中心地址 : 22099 新北市政府郵局第30-98號信箱</div>
                <div>病人自主研究中心PARC © 2018. All Rights Reserved.</div>
                <!-- <div class="footer-title">即刻行動</div>
                <a href="#" title="分享故事" class="footer-link">分享故事</a> /
                <a href="#" title="我要捐款" class="footer-link">我要捐款</a> /
                <a href="#" title="訂閱電子報" class="footer-link">訂閱電子報</a> -->
            </div>
            <div class="col-12 col-lg-3 text-center">
                <div class="footer-title">追蹤我們</div>         

                <p><a href="https://www.facebook.com/parc.tw/" target="_blank" title="病人自主中心粉絲專頁(另開視窗)" class="footer-FB" rel="noopener noreferrer" >
                    <img src="{{ asset('/assets/images/photo/fb.png') }}" width=40px height=41px>
                </a>
                <a href="https://lin.ee/5ySHOyq" target="_blank" title="加入Line好友(另開視窗)" class="footer-FB" rel="noopener noreferrer" >
                    <img src="{{ asset('/assets/images/photo/line.png') }}" width=40px height=40px>
                </a>
                 <a href="https://www.youtube.com/channel/UCkJWN2WEhzH_EA5QM65GchQ" target="_blank" title="前往病人自主中心Youtube頻道(另開視窗)" class="footer-FB" rel="noopener noreferrer">
                    <img src="{{ asset('/assets/images/photo/youtube.png') }}">
                </a>




            </div>
        </div>
    </div>
    <div class="container">
        <!-- GoTop -->
        <a href="#" title="至頂端" class="btn-gotop">
            <i class="fa fa-caret-up"></i>
        </a>
    </div>
</footer>
</div>