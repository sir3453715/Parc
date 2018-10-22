@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 全球脈動 - 國際NGO</title>
@endsection
@section('main')
<!--main-->
<main class="container">
        <!--breadcrumb-->
        <ol class="breadcrumb container">
            <li class="breadcrumb-item">
                <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
                <a href="{{ url('')}}" title="首頁">首頁</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('trend/')}}" title="全球脈動">全球脈動</a>
            </li>
            <li class="breadcrumb-item active">國際NGO</li>
        </ol>
        <!-- ngo-map -->
        <section class="ngo-map my-5">
            <img src="{{ asset('assets/images/photo/ngo-map.png') }}" class="img-fluid" alt="NGO世界地圖" />
        </section>

        <!-- 各地區簡介 -->
        <hr>
        <section>
            <h2 class="title">日 本</h2>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/jp-sdwd.png') }}" class="img-fluid" alt="日本尊嚴死協會">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://www.songenshi-kyokai.com/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>日本尊嚴死協會</h2>
                            </a>
                            <h6>(Japan Society for Dying With Dignity)</h6>
                            <h6>主張簽署預立醫療指示，保障善終權日本最大病人自主權NGO會員人數超過10萬</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/jp-npo.png') }}" class="img-fluid" alt="千葉居家照護 市民網絡">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://www.npo-pure.npo-jp.net/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>千葉居家照護 市民網絡</h2>
                            </a>
                            <h6>(NPO PURE)</h6>
                            <h6>以千葉大學福祉環境中心為基地全國性的居家癌症緩和醫療支援中心，尊重患者意願，以最少的痛苦提供居家安寧服務諮詢</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <h2 class="title">南 韓</h2>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/kr-cri.png') }}" class="img-fluid" alt="南韓國際照護權組織">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://www.carerights.org/sub/about.php" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>南韓國際照護權組織</h2>
                            </a>
                            <h6>(Care Rights International)</h6>
                            <h6>2012年創立於首爾推廣並捍衛年長病人的臨終自主權AD推廣及諮詢、聯合國NGO橫向合作</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/kr-iad.png') }}" class="img-fluid" alt="南韓預立醫療指示立法推動會">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="https://www.facebook.com/sasilmo/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>南韓預立醫療指示立法推動會</h2>
                            </a>
                            <h6>(Korean Initiative for Advance Directive)</h6>
                            <h6>致力於推動預立醫療指示之立法提供AD推廣及諮詢服務</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <h2 class="title">香 港</h2>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/hk-pe.png') }}" class="img-fluid" alt="美善生命計畫">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://enable.hku.hk/tch/main/main.aspx?str_section=journey" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>美善生命計畫</h2>
                            </a>
                            <h6>(香港大學行為健康教研中心)</h6>
                            <h6>推廣大眾對於善終自主權之認識，推動生死教育的社會意識運動並以香港大學為中心推動各項相關研究計畫</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <h2 class="title">中國大陸</h2>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/cn-lwpa.png') }}" class="img-fluid" alt="北京生前預囑推廣協會">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://www.xzyzy.com/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>北京生前預囑推廣協會</h2>
                            </a>
                            <h6> </h6>
                            <h6>於2013年成立，前身為「選擇與尊嚴」公益網，中國大陸第一家推廣「尊嚴死」的NGO 致力於相關緩和醫療學科、機構和制度的建立與推廣</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <h2 class="title">新加坡</h2>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/sg-hc.png') }}" class="img-fluid" alt="新加坡慈懷理事會">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="https://singaporehospice.org.sg/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>新加坡慈懷理事會</h2>
                            </a>
                            <h6>(Singapore Hospice Council)</h6>
                            <h6>新加坡各級醫院施行安寧照護之代表團體推廣安寧照護，並支持醫師、護士、照護者、志工的訓練新加坡於國際安寧界的發聲單位</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/sg-hca.png') }}" class="img-fluid" alt="HCA Hospice Care">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="https://www.hca.org.sg/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>HCA Hospice Care</h2>
                            </a>
                            <h6>(HCA)</h6>
                            <h6>成立於1989年，提供居家安寧照護之慈善團體，免費提供醫師、護士、社工、志工到家探訪之服務</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <h2 class="title">泰 國</h2>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/th-thaps.png') }}" class="img-fluid" alt="泰國安寧照護社群">
                    </div>                     
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://www.thaps.or.th/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>泰國安寧照護社群</h2>
                            </a>
                            <h6>(Thai Palliative Care Society : THAPS)</h6>
                            <h6>曾舉辦工作坊推廣預立醫療指示概念供安寧照護人士法律上之相關諮詢</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service-lohas__item">
                    <div class="service-lohas__icon">
                        <img src="{{ asset('assets/images/icon/th-hd.png') }}" class="img-fluid" alt="平靜善終">
                    </div>
                    <div class="service-lohas__box">
                        <div class="service-lohas__title">
                            <a href="http://happydeathday.co/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                <h2>平靜善終</h2>
                            </a>
                            <h6>(Happy Deathday)</h6>
                            <h6>曾辦過泰國最大規模之安寧照護推廣活動，集結泰國境內30餘個NGO共同策劃展覽</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
                <h2 class="title">印 度</h2>
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-12 col-lg-6 service-lohas__item">
                        <div class="service-lohas__icon">
                            <img src="{{ asset('assets/images/icon/in-pi.png') }}" class="img-fluid" alt="Pallium India">
                        </div>
                        <div class="service-lohas__box">
                            <div class="service-lohas__title">
                                <a href="https://palliumindia.org/about/about-pallium-india/" title="(另開視窗)" target="_blank" rel="noopener noreferrer">
                                    <h2>Pallium India</h2>
                                </a>
                                <h6> </h6>
                                <h6>致力於推廣減緩病人痛苦及安寧照護在醫療體系的落實與印度中央政府有多項安寧照護與AD推廣的合作</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection