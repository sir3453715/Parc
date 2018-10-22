@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 關於我們 - 認識病主</title>
@endsection
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
        <li class="breadcrumb-item active">認識病主</li>
    </ol>

    <div class="banner-single owl-carousel px-0" title="關於我們" style="background: url({{ asset('assets/images/photo/banner-about.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title-tl">關於我們</h2>
    </div>

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

        <h2 class="world__title">認識病人自主</h2>

        <p class="text-center m-5">病人自主的核心概念是病人自主權（Patient Autonomy），緊扣三項人文價值：尊重病人醫療自主、保障病人善終權益、促進醫病關係和諧。當代醫療科技進步，當我們罹患重症或失去意識，靠著各種醫療處置能夠不斷延長生命，卻可能失去生命的品質與尊嚴，也讓家人為了幫我們做出醫療決定而承受痛苦
            為此，我們主張病人應享有拒絕醫療、尊嚴善終的權利，期許社會為病人賦權 ，尊重並相信病人的自主意願，讓生命尊嚴的省思深化到每個人的心中，使善 終觀念成為新興的文化氛圍與生命素養。
        </p>

        <h2 class="world__title">您可以在這些地方認識病人自主</h2>

        <div class="row justify-content-center m-2">
            <a href="{{ url('/story/special') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-04.png') }}" class="img-fluid" alt="生命故事" />
                </div>
                <h2>生命故事</h2>
            </a>
            <a href="{{ url('/law') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-06.png') }}" class="img-fluid" alt="法規政策" />
                </div>
                <h2>法規政策</h2>
            </a>
            <a href="{{ url('/exercise') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-02.png') }}" class="img-fluid" alt="行使權利" />
                </div>
                <h2>行使權利</h2>
            </a>
            <a href="{{ url('/event/video') }}" class="col-6 col-lg-3 text-center ">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-08.png') }}" class="img-fluid" alt="線上影音" />
                </div>
                <h2>線上影音</h2>
            </a>
        </div>

        <h2 class="world__title">病主自主權利法簡介</h2>

        <p class="text-center m-5">歐、美許多國家實行病人自主權已久，視為普世人權，臺灣自2015年底通過《 病人自主權利法》後，成為亞洲實踐病人自主權的先導國家。這部法的核心理 念，是讓病人自主意願的表達與善終權利，得到法律上的保障，透過事先簽署
            「預立醫療決定」，每個人都能提早為自己做好重症時的醫療決策，預防自己 與親友摯愛承受痛苦。
        </p>

    </section>

</main>
@endsection