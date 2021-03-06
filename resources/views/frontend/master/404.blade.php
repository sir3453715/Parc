@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 網頁建構中</title>
@endsection
@section('main')
<!--main-->
<main class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <a href="{{ url('')}}" title="首頁" tabindex="2">首頁</a>
        </li>
        <li class="breadcrumb-item active">網頁建構中</li>
    </ol>

    <div class="c container">

        <div class="c1"></div>

        <div class="c2">
            <div class="c2-main">
                <div class="c2-main-img">
                    <img src="{{ asset('assets/images/icon/icon-404.png') }}" class="img-fluid" alt="網頁建構中"/>
                </div>
                <div class="c2-title">網頁建構中</div>
                <div class="c2-subtitle">敬請期待</div>
            </div>
        </div>

        <a href="{{ url('')}}" class="c3">
            <p>回首頁</p>
        </a>
    </div>
</main>
@endsection