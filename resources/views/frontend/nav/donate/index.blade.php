@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 我要支持</title>
@endsection
@section('main')
<!--main-->
<main>
<div class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <a href="{{ url('')}}" title="首頁" tabindex="2">首頁</a>
        </li>
        <li class="breadcrumb-item active">我要支持</li>
    </ol>
</div>

<!-- tab-5 -->
<div class="container">
    <section class="bg-white">
        <div class="row justify-content-center p-5">
            <a href="{{ url('/donate#method') }}" title="我要捐款" class="col-6 col-lg-4 text-center p-2">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-11.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>我要捐款</h2>
            </a>
            <a href="{{ url('/donate/story') }}" class="col-6 col-lg-4 text-center p-2" title="分享故事">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-12.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>分享故事</h2>
            </a>
            <a href="{{ url('/404') }}" class="col-6 col-lg-4 text-center p-2" title="成為志工">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-13.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>成為志工</h2>
            </a>
            <a href="{{ url('/404') }}" class="col-6 col-lg-4 text-center p-2" title="愛心義賣">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-13.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>愛心義賣</h2>
            </a>
            <a href="{{ url('/404') }}" class="col-6 col-lg-4 text-center p-2" title="成為會員">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-14.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>成為會員</h2>
            </a>
            <a href="{{ url('/donate/inquiry') }}" class="col-6 col-lg-4 text-center p-2" title="捐款徵信">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-15.png') }}" class="img-fluid" alt="" />
                </div>
                <h2>捐款徵信</h2>
            </a>
        </div>
    </section>
</div>

<div class="banner-donate__bg">
    <section class="container">
        <div class="banner-donate" title="關於我們" style="background: url({{ asset('assets/images/photo/banner-donate-01.jpg') }}) no-repeat center;background-size: cover;"></div>
    </section>
</div>

<div class="container">

    <section class="bg-white" id="method">
        <h2 class="title">全民好命 全民善終 需要您的支持
            {{-- <br class="d-lg-none">您可以這樣支持我們：</h2> --}}

        <h2 class="title">多元捐款方式</h2>

        <div class="row m-lg-5 pb-5">
            <div class="col-12 col-lg-6">
                <div class="title-black">線上捐款</div>
                <li><a href="https://tlea.neticrm.tw/civicrm/contribute/transact?reset=1&id=3" target="_blank" title="線上捐款(另開視窗)">線上捐款</a></li>
            </div>
            <div class="col-12 col-lg-6">
                <div class="title-black">銀行匯款、轉帳捐款</div>
                <ul>
                    <li>戶名：社團法人台灣生命教育學會</li>
                    <li>匯款帳號：154-10-000492-1</li>
                    <li>收款銀行：華南銀行臺大分行</li>
                    <li>匯款/轉帳成功後請務必來信 <a href="donate/story" title="service@parc.tw">service@parc.tw</a> 告知捐款人資料，以便開立收據</li>
                </ul>
            </div>
            <div class="col-12 col-lg-6">
                <div class="title-black">郵局劃撥捐款</div>
                <ul>
                    <li>帳號： 50062201</li>
                    <li>戶名：社團法人台灣生命教育學會</li>
                    <li>通訊欄：請填妥捐款人之基本資料，以利收據之寄發</li>
                </ul>
            </div>
            <div class="col-12 col-lg-6">
                <div class="title-black">定期定額郵局委託轉帳捐款</div>
                <ul>
                    <li>
                        (1)   請於線上下載 <a class="text-rosy-pink" href="https://drive.google.com/open?id=1WVWRA3GBDOjZNETxoCVll_ggioC6gqz-" target="_blank" title="郵局委託轉帳捐款授權書(另開視窗)">「郵局委託轉帳捐款授權書」</a>
                        ，授權書共兩聯，列印出來後請務必蓋上開戶印鑑章，填妥後將正本寄回台灣生命教育學會病人自主研究中心（22099 板橋郵局第30-98號信箱）。
                    </li>
                    <li>
                        (2)   病主中心收到您的授權書後，將主動以電話與您確認，並依照您選擇的方式寄發捐款收據，
                        您亦可來信 <a href="donate/story" title="service@parc.tw">service@parc.tw</a> 查詢。
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>

</main>
@endsection

@section('custom_css')
    <style>
        section:before {
            height: 54px;
            content: "";
            display:block;
        }
    </style>
@endsection