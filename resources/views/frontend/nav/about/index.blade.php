@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 關於我們 - 認識病主中心</title>
@endsection
@section('main')
<!--main-->
<main class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <a href="{{ url('') }}" title="首頁" tabindex="2">首頁</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/about') }}" title="關於我們" tabindex="2">關於我們</a>
        </li>
        <li class="breadcrumb-item active">認識病主中心</li>
    </ol>

    <div class="banner-single owl-carousel px-0" title="關於我們"
        style="background: url({{ asset('assets/images/photo/new-banner-about.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title-tl">關於我們</h2>
    </div>

    <section class="container world">

        <div class="row justify-content-center m-2">
            <a href="{{ url('/about') }}" class="col-6 col-lg-3 text-center " title="認識病主中心">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-1.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>認識病主中心</h2>
            </a>
            <a href="{{ url('/about/ceo') }}" class="col-6 col-lg-3 text-center " title="執行長的話">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-2.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>執行長的話</h2>
            </a>
            <a href="{{ url('/about/organization') }}" class="col-6 col-lg-3 text-center " title="我們的任務">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-3.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>我們的任務</h2>
            </a>
            <a href="{{ url('/about/history') }}" class="col-6 col-lg-3 text-center " title="大事紀">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/new-icon-about-4.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>大事紀</h2>
            </a>
        </div>
        <div class="mt-5 pt-4 mx-3 mx-md-auto" style="max-width:700px;">
            <img src="{{ asset('assets/images/photo/new-about-logo-banner.png') }}" class="img-fluid" alt="" />
            <h2 class="text-left mt-5" style="font-weight: bold; font-size: 32px; color:#EE7760">106年成立</h2>

            <p class="text-left" style="font-size: 20px">
                隸屬社團法人台灣生命教育學會，延續學會創辦人孫效智教授的生命教育理念。由楊玉欣委員領軍，專注推動全民醫療自主權、弱勢人權、善終權、及相關生命教育內涵的公益組織。
            </p>
            <p>
                <a href="http://www.tlea.org.tw" class="text-left"  target="_blank" style="text-decoration: none; border-bottom: solid 1px; color:#EE7760; line-height: 30px; padding-bottom: 5px; font-size: 20px;">
                認識台灣生命教育學會 >>
                </a>
            </p>
            <p class="text-left" style="font-size: 20px">
                楊玉欣委員長期關懷身心障礙及弱勢議題，因自身罹患罕見疾病，對於弱勢族群失去主體性、難以自主的處境，深刻理解。為此，楊玉欣委員成立「病人自主研究中心」，倡議病人自主理念、推展《病人自主權利法》之落實，並致力彌平社會弱勢族群在健康、醫療、社會保護與生命教育方面的資訊落差與資源不均、破除結構性排除，並督促國家政策的落實。
            </p>
            <p class="text-left" style="font-size: 20px">
                期望透過四大服務項目：教育訓練、弱勢服務、大眾宣導、政策研究，增強病人自主權之配套措施、弭平不公平，並啟發社會大眾對病中處境與生死議題的思考與對話。在超高齡社會來臨的當下，集眾人之力引領台灣成為亞洲社會典範。
            </p>
        </div>
        <div>
            <h2 class="text-center mt-5 pt-5" style="font-weight: bold; font-size: 32px; color:#EE7760">我們的服務對象｜人人受惠</h2>
            <div class="icon-card-wrapper row mt-5">
                <!-- card1  -->
                <div class="icon-card col-md-3 p-3">
                    <img src="{{ asset('assets/images/icon/new-icon-about-8.png') }}" class="img-fluid" alt="" />
                    <h3 class="font-weight-bold mt-3" style="font-size:22px;">弱勢族群/身障</h3>
                    <div class="cus-deco mb-3" style="width:80px; height:3px; background:#EC7070; margin: auto;"></div>
                    <p class="mb-0" style="font-size: 18px;">建構權利通道</p>
                    <p class="mb-0" style="font-size: 18px;">提升權利知能</p>
                    <p class="mb-0" style="font-size: 18px;">提供補助/資源</p>
                    <p class="mb-0" style="font-size: 18px;">打造綜合解決方案</p>
                </div>
                <!-- card-2 -->
                <div class="icon-card col-md-3 p-3">
                    <img src="{{ asset('assets/images/icon/new-icon-about-7.png') }}" class="img-fluid" alt="" />
                    <h3 class="font-weight-bold mt-3" style="font-size:22px;">醫療院所/人員</h3>
                    <div class="cus-deco mb-3" style="width: 80px; height:3px; background: #EC7070; margin: auto;"></div>
                    <p class="mb-0" style="font-size: 18px;">提供認證課程</p>
                    <p class="mb-0" style="font-size: 18px;">舉辦深度教育訓練</p>
                    <p class="mb-0" style="font-size: 18px;">串聯機構合作</p>
                    <p class="mb-0" style="font-size: 18px;">建構醫病溝通改善方案</p>
                </div>
                <div class="icon-card col-md-3 p-3">
                    <img src="{{ asset('assets/images/icon/new-icon-about-6.png') }}" class="img-fluid" alt="" />
                    <h3 class="font-weight-bold mt-3" style="font-size:22px;">社福機構/人員</h3>
                    <div class="cus-deco mb-3" style="width:80px;height:3px; background:#EC7070; margin: auto;"></div>
                    <p class="mb-0" style="font-size: 18px;">提供認證課程</p>
                    <p class="mb-0" style="font-size: 18px;">舉辦深度教育訓練</p>
                    <p class="mb-0" style="font-size: 18px;">統籌資源媒合</p>
                    <p class="mb-0" style="font-size: 18px;">串聯機構合作</p>
                </div>
                <div class="icon-card col-md-3 p-3">
                    <img src="{{ asset('assets/images/icon/new-icon-about-5.png') }}" class="img-fluid" alt="" />
                    <h3 class="font-weight-bold mt-3" style="font-size:22px;">社會大眾/政府</h3>
                    <div class="cus-deco mb-3" style="width:80px;height:3px; background:#EC7070; margin: auto;"></div>
                    <p class="mb-0" style="font-size: 18px;">政策研究</p>
                    <p class="mb-0" style="font-size: 18px;">改革制度</p>
                    <p class="mb-0" style="font-size: 18px;">傳播權利知能</p>
                    <p class="mb-0" style="font-size: 18px;">提升生死識能</p>
                </div>
            </div>
        </div>

        <div class="mt-md-5 pt-4">
            <h2 class="text-center mt-5 pt-4" style="font-weight: bold; font-size: 32px; color:#EE7760">我們的特色</h2>
            <div class="text-card-wrapper text-left row mt-4 mx-3 mx-md-auto">
                <div class="text-card col-lg-4 p-2">
                    <div style="padding: 1rem 2rem; min-height: 170px;border: 3px solid #EB6266; border-radius: 15px;">
                        <div class="font-weight-bold mb-2" style="font-size: 30px;color: #264454;">全台獨家</div>
                        <div style="font-size: 18px;">國內唯一專責推動研究<br>病人自主權利法的單位</div>
                    </div>
                </div>

                <div class="text-card col-lg-4 p-2">
                    <div style="padding: 1rem 2rem; min-height: 170px;border: 3px solid #EB6266; border-radius: 15px;">
                        <div class="font-weight-bold mb-2" style="font-size: 30px;color: #264454;">最貼近需求的方案</div>
                        <div style="font-size: 18px;">執行長「感同身受」的視野<br>帶領團隊以人為本，打造以服務對象之全人全家庭需求為核心的創新解決方案。</div>
                    </div>
                </div>

                <div class="text-card col-lg-4 p-2">
                    <div style="padding: 1rem 2rem; min-height: 170px;border: 3px solid #EB6266; border-radius: 15px;">
                        <div class="font-weight-bold mb-2" style="font-size: 30px;color: #264454;">跨領域溝通網</div>
                        <div style="font-size: 18px;">以問題解決為中心，連動學術、臨床、社會福利、及媒體等，透過跨界溝通、經驗及專業的挹注，提升服務價值。</div>
                    </div>
                </div>

                <div class="text-card col-lg-4 p-2">
                    <div style="padding: 1rem 2rem; min-height: 170px;border: 3px solid #EB6266; border-radius: 15px;">
                        <div class="font-weight-bold mb-2" style="font-size: 30px;color: #264454;">超前解決社會難題</div>
                        <div style="font-size: 18px;">本中心率先看見問題：生死溝通、醫療決策、尊嚴善終等問題，預見未來社會困境，並提出現今尚未能供應之解決方案。</div>
                    </div>
                </div>

                <div class="text-card col-lg-8 p-2">
                    <div class="d-flex flex-wrap" style="padding: 1rem 2rem; min-height: 170px;border: 3px solid #EB6266; border-radius: 15px;">
                        <div class="font-weight-bold col-12 col-md-4 p-0" style="font-size: 30px;color: #264454;">專業權威團隊＋夥伴聯盟</div>
                        <div class="col-12 col-md-8 p-0 p-md-1" style="font-size: 18px;">由臺大生命教育中心主任暨病主法起草者孫效智教授，及立法院榮譽顧問楊玉欣委員共同領軍病主中心四大任務專業團隊。並藉由病主夥伴聯盟整合所有合作單位，實現共力與創新。</div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-center mt-5 pt-5" style="font-weight: bold; font-size: 32px; color:#EE7760">組織架構</h2>
            <img class="mt-4 pt-2 img-fluid" src="{{ asset('assets/images/photo/new-org-map.png') }}" alt="" />
        </div>

        <div class="mt-5 pt-5 d-none d-md-block">
            <div class="font-weight-bold d-flex align-items-center justify-content-center" style="font-size: 30px; padding-bottom: 35px;"> <img class="mr-2 img-fluid" src="{{ asset('assets/images/icon/new-info-icon.png') }}"alt="" />什麼是病人自主權利法</div>
            <a href="https://parc.tw/event/course/article/266" style="padding: 15px 30px; border: solid 3px #c4465b; border-radius: 35px; background: #EE7760; color: #fff; font-weight: 500; letter-spacing: 5px; font-size: 18px; text-decoration: none !important;">了解更多</a>
        </div>

        <div class="mt-5 pt-5 d-block d-md-none">
            <div class="font-weight-bold d-flex align-items-center justify-content-center" style="font-size: 24px; padding-bottom: 30px;"> <img class="mr-2 img-fluid" style="width:30px" src="{{ asset('assets/images/icon/new-info-icon.png') }}"alt="" />什麼是病人自主權利法</div>
            <a href="https://parc.tw/event/course/article/266" style=" padding: 10px 20px; border: solid 3px #c4465b; border-radius: 30px; background: #EE7760; color: #fff; font-weight: 500; text-decoration: none !important;">了解更多</a>
        </div>

    </section>

</main>
@endsection