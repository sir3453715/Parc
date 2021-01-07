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
               <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=9" title="我要捐款" class="btn-fixed btn-donation" tabindex="4" target="_blank">
                 <img src="{{ asset('assets/images/icon/donate_icon.png') }}" class="d-none d-lg-block" alt="我要捐款">
                   <span class="d-lg-none">我要<br>捐款</span>
            </a>
            @endmobile
 
              @tablet
            <!-- 我要捐款 -->
               <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=9" title="我要捐款" class="btn-fixed btn-donation" tabindex="4" target="_blank">
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