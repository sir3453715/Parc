@extends('frontend.master.master')
@section('main')
<!--main-->
<main>
<div class="container">
    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
            <a href="{{ url('')}}" title="首頁">首頁</a>
        </li>
        <li class="breadcrumb-item active">我要支持</li>
    </ol>
</div>

<!-- tab-5 -->
<div class="container">
    <section class="bg-white">
        <div class="row justify-content-center p-5">
            <a href="#" class="col-6 col-lg-4 text-center p-2">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-11.png') }}" class="img-fluid" alt="我要捐款" />
                </div>
                <h2>我要捐款</h2>
            </a>
            <a href="{{ url('/donate/story') }}" class="col-6 col-lg-4 text-center p-2">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-12.png') }}" class="img-fluid" alt="分享故事" />
                </div>
                <h2>分享故事</h2>
            </a>
            <a href="#" class="col-6 col-lg-4 text-center p-2">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-13.png') }}" class="img-fluid" alt="成為志工" />
                </div>
                <h2>成為志工</h2>
            </a>
            <a href="#" class="col-6 col-lg-4 text-center p-2">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-14.png') }}" class="img-fluid" alt="成為會員" />
                </div>
                <h2>成為會員</h2>
            </a>
            <a href="{{ url('/donate/inquiry') }}" class="col-6 col-lg-4 text-center p-2">
                <div class="service-lohas__icon">
                    <img src="{{ asset('assets/images/icon/icon-15.png') }}" class="img-fluid" alt="捐款徵信" />
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

    <section class="bg-white">
        <div class="text-center p-5 mx-lg-5">
            <p>生老病死為人生歷程，然而在避諱死亡的社會與文化氛圍裡，「讓生命自然善終」卻成了需要倡議與爭取的課題。在台灣，當一個人成為重症病人或失去意識時，多半由家屬幫病人做決定，卻難以避免家屬對醫療決策意見分歧，或因投身照顧實務的親疏遠近，導致家庭失和。回過頭，我們要問：能不能讓醫療決策的自主權回到病人身上，讓病人有尊嚴地善終？</p>

            <p>《病人自主權利法》在2015年底經立法院三讀通過，標誌著亞洲第一個保障「病人自主權」的里程碑。這部法的核心理念，是讓病人自主意願的表達與善終權利，得到法律保障，讓病人有權利拒絕用加工醫療的方式維持生命，不再使用創傷性的治療，能夠以舒適、寧靜的方式圓滿善終。</p>

            <p>病人自主研究中心將持續著力於病人自主權之大眾宣導、政策研究、教育訓練及醫療院所實行四大業務，整合政府與民間單位協力分工，落實《病人自主權利法》之服務機制，引領社會大眾思考尊嚴善終與生命價值。</p>
        </div>

        <h2 class="title">邀請您共同關懷病人自主權，
            <br class="d-lg-none">您可以這樣支持我們：</h2>

        <div class="text-center m-5 pb-5">
            <p>以定期定額或單筆捐款方式支持病人自主研究中心四大業務執行。
                <a href="#">（線上捐款看更多）</a>
            </p>
            <p>投稿您深刻動人的生命經驗，分享您對醫療現場、臨床決定以及生命道別的私房故事。
                <a href="{{ url('/donate/story')}}">（分享故事看更多）</a>
            </p>
        </div>

        <h2 class="title"> 其他捐款方式</h2>

        <div class="row m-lg-5 pb-5">
            <div class="col-12 col-lg-6">
                <div class="title-black">銀行匯款、轉帳捐款</div>
                <ul>
                    <li>戶名：社團法人台灣生命教育學會</li>
                    <li>匯款帳號：154-10-000492-1</li>
                    <li>收款銀行：華南銀行臺大分行</li>
                    <li>匯款/轉帳成功後請務必來信 service@parc.tw 告知捐款人資料，以便開立收據</li>
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
        </div>
    </section>
</div>

</main>
@endsection