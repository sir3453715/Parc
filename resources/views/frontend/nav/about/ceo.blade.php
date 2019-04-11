@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 關於我們 - 執行長的話</title>
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
        <li class="breadcrumb-item active">執行長的話</li>
    </ol>

    <section class="container world">

        <div class="row justify-content-center m-2">
            <a href="{{ url('/about') }}" class="col-6 col-lg-3 text-center " title="認識病主中心">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-1.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>認識病主中心</h2>
            </a>
            <a href="{{ url('/about/ceo') }}" class="col-6 col-lg-3 text-center " title="執行長的話">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-2.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>執行長的話</h2>
            </a>
            <a href="{{ url('/about/organization') }}" class="col-6 col-lg-3 text-center " title="組織架構">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-3.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>組織架構</h2>
            </a>
            <a href="{{ url('/about/history') }}" class="col-6 col-lg-3 text-center " title="大事紀">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-4.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>大事紀</h2>
            </a>
        </div>

        <h2 class="world__title m-5">執行長的話</h2>

        <div class="item banner-lector__item mb-5 ">
            <div class="banner-lector__box d-flex flex-column justify-content-center">
                <h2 class="banner-lector__title text-left">楊玉欣</h2>
                <div class="text-right">病人自主研究中心 - 執行長</div>
            </div>
            <div class="banner-lector__img" style="background: url({{ asset('assets/images/photo/index-lector-01.png') }}) no-repeat center; background-size: cover;"></div>
        </div>

        <h2 class="text-center m-5">「讓問題成為創造價值的契機。」</h2>
                <p class="text-center m-5">
                    儘管罕見疾病困鎖了身體，卻拘綁不了靈魂。她為弱勢族群代言發聲，從而長出堅韌的翅膀，成為罕病天使。<br>
                    2012年擔任不分區立委，將弱勢價值、友善環境、病人自主、生命教育等具高度人文精神的議題帶入立法院，推動許多重大的修立法及弱勢創新政策。<br>
                    她熱愛創新價值的思考與實踐，相信每一個生命受造的目的是成為這個世界的一份禮物，因此她有一個夢，讓弱勢者享有尊嚴、自主、發展與貢獻的機會。
                </p>

                <h2 class="world__title-r m-5">生命的奧秘，在信心與盼望中經歷愛</h2>
                <p class="text-center m-5">生命如波瀾起落，許多時刻，我們深深覺得活著真好，卻在哪些時候，我們惘然感到此生不如歸去？每當駐足在生命的重要關口，在每一個心思意念、言語及行動的抉擇中，你是否都選擇了愛的一方？</p>
              
                <h2 class="world__title-r m-5">必死的人生，如何讓死亡再創生命高峰？</h2>
                <p class="text-center m-5">你如何思考死亡？這件事離我們並不遙遠，帶上這個思考，可以改變我們看待世界的眼光，將這趟人生旅程過得更清明、更有感。我們從此開始關照：在生命終點之前，應該做些什麼？哪些被我們遺落的關係需要拾起與和解？哪些人值得深深感激，哪些愛還未開口表達？若此虔誠地叩問內心，你終將明白：生命是一份禮物，活著的每時每刻都值得慶祝，而死亡更蘊含著一種永恆的祝福，只因曾經展現的愛與關懷，都將成為後世心靈文化的養分。因此，如何讓死亡成為再創生命高峰的契機？我們必須回頭思考：活著，要帶給世界什麼？</p>

                <h2 class="world__title-r m-5">一路愛到掛，創新社會價值</h2>
                <p class="text-center m-5">什麼時候，生命意義與價值會成為你最在乎的課題？現在就邀請你，跟我們一起探索生命的意義，思考生命的尊嚴，啟動生命最後一哩路的企劃，進而勾勒出每一個生命階段的價值藍圖與具體行動。《病人自主權利法》不只是醫療政策的改革，更是一場感恩生命、為愛自主的社會運動。讓愛領路，讓行動即刻展開，我們熱切地歡迎你共創美好的新生活！</p>


    </section>

</main>
@endsection