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
                    <img alt="病人自主研究中心" title="回首頁" src="{{ asset('assets/images/icon/logo-m.svg') }}" class="img-fluid" />
                    <strong style="display: none;">病人自主研究中心</strong>
                </a>                 
            </div>
            <!-- 我要捐款 -->
            <a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=3" target="_blank" rel="noopener noreferrer" title="我要捐款(另開視窗)" class="btn-donation" tabindex="4">我要<br>捐款</a>
            <!-- GoTop -->
            <a href="#" title="回到頂端" class="btn-gotop" tabindex="-1">
                <i class="fa fa-caret-up"></i>
            </a>
            <!-- main-nav -->
            <div class="menu collapse" id="main-nav">
                <!-- nav-main -->
                <div class="nav-main order-lg-2">
                    <div class="row">
                        <!-- logo -->
                        <h1 class="col-0 col-lg-4 ">
                            <a href="{{ url('') }}" title="病人自主研究中心" tabindex="2" class="logo">
                                <img alt="病人自主研究中心" title="回首頁" src="{{ asset('assets/images/icon/logo.svg') }}" class="img-fluid" />
                                <strong style="display: none;">病人自主研究中心</strong>
                            </a>
                        </h1>
                        <ul class="col-12 col-lg-8 nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('story/special') }}" title="生命故事" tabindex="2">生命故事</a>
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
                                            <a href="{{ url('/story/expert') }}" title="權威觀點" tabindex="2">權威觀點</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/story/story') }}" title="私房故事" tabindex="2">私房故事</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/event') }}" title="課程與活動" tabindex="2">課程與活動</a>
                                <a href="#nav-event" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-event">
                                    <div class="sub-nav__box">
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/course') }}" title="專業課程" tabindex="2">專業課程</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/lecturer') }}" title="講師服務" tabindex="2">講師服務</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/video') }}" title="線上影音課程" tabindex="2">線上影音課程</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/event/lohas') }}" title="生命樂活" tabindex="2">生命樂活</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/law') }}" title="法規政策" tabindex="2">法規政策</a>
                                <a href="#nav-law" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-law">
                                    <div class="sub-nav__box">
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/law/act') }}" title="法規實務" tabindex="2">法規實務</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/law/policy') }}" title="政策研究" tabindex="2">政策研究</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/trend') }}" title="全球脈動" tabindex="2">全球脈動</a>
                                <a href="#nav-trend" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-trend">
                                    <div class="sub-nav__box">
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/trend/international') }}" title="國際新知" tabindex="2">國際新知</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/trend/exchange') }}" title="合作交流" tabindex="2">合作交流</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/trend/ngo') }}" title="國際NGO" tabindex="2">國際NGO</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('/trend/world') }}" title="世界趨勢" tabindex="2">世界趨勢</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/news') }}" title="最新消息" tabindex="2">最新消息</a>
                                <a href="#nav-news" class="nav-plus collapsed" data-toggle="collapse"><i class="fa fa-chevron-right" title="展開/折疊選項"></i></a>
                                <div class="sub-nav collapsed collapse" id="nav-news">
                                    <div class="sub-nav__box">
                                        <div class="sub-nav__item">
                                            <a href="{{ url('news/center') }}" title="中心動態" tabindex="2">中心動態</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('news/law') }}" title="法規政策動態" tabindex="2">法規政策動態</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('news/event') }}" title="課程與活動動態" tabindex="2">課程與活動動態</a>
                                        </div>
                                        <div class="sub-nav__item">
                                            <a href="{{ url('news/international') }}" title="國際動態" tabindex="2">國際動態</a>
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
                            <a class="nav-link" href="#U" id="AU" name="U" title="右上方功能區塊" accesskey="U" tabindex="1">:::</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#" title="線上諮詢">線上諮詢</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/sitemap') }}" title="網站導覽" tabindex="1">網站導覽</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}" title="關於我們" tabindex="1">關於我們</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/exercise') }}" title="行使權利" tabindex="1">行使權利</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/donate') }}" title="我要支持" tabindex="1">我要支持</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/faq') }}" title="常見問題" tabindex="1">常見問題</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about-en') }}" title="English" tabindex="1">English</a>
                        </li>
                        <li class="nav-item search">
                            <form action="{{ url('search')}}" method="get" name="search-form" id="search-form" title="搜尋" >
                                <label for="S" class="d-none">關鍵字搜尋: </label>
                                <input type="text" id="S" accesskey="S" name="q" placeholder="關鍵字搜尋" title="關鍵字" value="{{ old('q')}}" tabindex="1">
                                <div class="fa fa-search" onclick="document.getElementById('search-form').submit();" title="搜尋" tabindex="1"></div>
                                <input type="submit" value="Submit" class="btn-submit" title="Submit">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>