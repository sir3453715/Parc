@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 關於我們 - 大事紀</title>
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
        <li class="breadcrumb-item active">大事紀</li>
    </ol>

    <!-- 病人自主權大事紀 -->
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

        <h2 class="world__title">病人自主權大事紀</h2>

        <div class="year">
            @foreach($milestone as $data)
            <div class="year__item">
                <div class="year__box">
                    <div class="year__no">{{ $data->date->format('Y.m.d') }}</div>
                    <div class="year__title">{{ $data->title }}</div>
                    <div class="year__text">{!! $data->body !!}</div>
                </div>
                <div class="year__img">
                    <img src="/storage/{{ $data->pic }}" class="img-fluid" alt="{{ $data->date->format('Y.m.d') }} {{ $data->title }}" />
                </div>
            </div>
            @endforeach
        </div>

        <div class="world__subtitle">— 我國病主權開創史 —</div>

    </section>

</main>
@endsection