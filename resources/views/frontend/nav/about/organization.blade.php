@extends('frontend.master.master')
@section('main')
<!--main-->
<main class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
            <a href="{{ url('') }}" title="首頁">首頁</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/about') }}" title="關於我們">關於我們</a>
        </li>
        <li class="breadcrumb-item active">組織簡介</li>
    </ol>

    <section class="container world">

            <div class="row justify-content-center m-2">
            <a href="{{ url('/about') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-1.png') }}" class="img-fluid" alt="認識病主" />
                </div>
                <h2>認識病主</h2>
            </a>
            <a href="{{ url('/about/ceo') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-2.png') }}" class="img-fluid" alt="執行長的話" />
                </div>
                <h2>執行長的話</h2>
            </a>
            <a href="{{ url('/about/organization') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-3.png') }}" class="img-fluid" alt="組織簡介" />
                </div>
                <h2>組織簡介</h2>
            </a>
            <a href="{{ url('/about/history') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-about-4.png') }}" class="img-fluid" alt="大事紀" />
                </div>
                <h2>大事紀</h2>
            </a>
        </div>

            <h2 class="world__title m-5">組織簡介</h2>

            <p class="text-center m-5">有感於服務「生命最後一哩路」的重要性，並以「生命教育」與「善終關懷」為核心價值，立法院榮譽顧問楊玉欣體認到，爭取民眾福祉需要可長可久的專責單位，因而於106年初籌建「病人自主研究中心」，以搭建醫護界與社會大眾的橋樑自許，期望透過系列創意活動來開啟全民的思考與行動。</p>

            <p class="text-center m-5">我們的長程願景，是期望能在《病人自主權利法》正式施行後，持續不輟地以創新的思維，讓生命教育和善終觀念在社會上不斷地萌芽成長，引領臺灣成為亞洲社會的典範。</p>


            <h2 class="world__title m-5">組織架構</h2>

            <h3 class="m-5">由立法院榮譽顧問楊玉欣擔任執行長，統籌業務及協調各方溝通，帶領團隊成員實踐理念。</h3>

            <div class="p-5">
                <img src="{{ asset('assets/images/icon/about-organization.png') }}" class="img-fluid" alt="組織架構" />
            </div>

            <h2 class="world__title m-5">四大任務與使命</h2>
            <p class="text-center m-5">我們致力於政策研究、教育訓練、醫療院所施行及大眾宣導等任務，透過與各方統籌、協調、溝通與推動，希望整合政府與民間不同層級屬性之單位，協力分工發揮綜效， 普及推廣《病人自主權利法》，引領社會大眾思考尊嚴善終與生命價值。
            </p>
            <div class="p-5">
                <img src="{{ asset('assets/images/icon/about-organization-4C.png') }}" class="img-fluid" alt="四大任務與使命" />
            </div>
        </section>
    </main>
@endsection