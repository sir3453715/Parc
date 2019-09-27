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

    <div class="banner-single owl-carousel px-0" title="關於我們" style="background: url({{ asset('assets/images/photo/banner-about.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title-tl">關於我們</h2>
    </div>

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

        <h2 class="world__title">認識病主中心</h2>

        <p class="text-center m-5">
            有感於服務「生命最後一哩路」的重要性，並以「生命教育」與「善終關懷」為核心價值，立法院榮譽顧問楊玉欣體認到，
            爭取民眾福祉需要可長可久的專責單位，因而於106年初籌建「病人自主研究中心」，以搭建醫護界與社會大眾的橋樑自許，
            期望透過系列創意活動來開啟全民的思考與行動。我們的長程願景，是期望能在《病人自主權利法》正式施行後，
            持續不輟地以創新的思維，讓生命教育和善終觀念在社會上不斷地萌芽成長，引領臺灣成為亞洲社會的典範。                
        </p>
    </section>

</main>
@endsection