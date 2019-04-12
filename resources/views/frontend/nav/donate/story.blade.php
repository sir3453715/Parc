@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 我要支持 - 分享您的生命故事</title>
@endsection
@section('main')
<!--main-->
<!--main-->
<main class="container">
<!--breadcrumb-->
<ol class="breadcrumb container">
    <li class="breadcrumb-item">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
        <a href="{{ url('') }}" title="首頁" tabindex="2">首頁</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/donate') }}" title="我要支持" tabindex="2">我要支持</a>
    </li>
    <li class="breadcrumb-item active">分享您的生命故事</li>
</ol>

<div class="banner-single owl-carousel mb-0" title="分享您的生命故事" style="background: url({{ asset('assets/images/photo/banner-donate-story.jpg') }}) no-repeat center;background-size: cover;">
    <h2 class="banner-single__title">分享您的生命故事</h2>
</div>

<section class="container mb-5">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">

            <h2 class="title">
                歡迎分享您對醫療現場、臨床決定或生命道別的深刻經驗，我們將刊登於<a class="text-rosy-pink" href="{{ url('/story/story') }}">生命故事專欄</a>。
            </h2>

            <h2 class="title">投稿流程</h2>

            <ul class="ul-dot bg-white p-4">
                <li>請以電子郵件，將您的文章以word格式寄到
                    <a href="mailto:service@parc.tw?subject=「私房故事投稿@病主中心生命故事＿您的姓名」">service@parc.tw</a>。</li>
                <li>在標題加註「私房故事投稿@病主中心生命故事＿您的姓名」。</li>
                <li>來稿請在文末註明您的真實身份。如欲使用筆名也請標註。</li>
            </ul>

            <h2 class="title">注意事項</h2>

            <ul class="ul-dot bg-white p-4">
                <li>因篇幅有限，文章字數請於1000-2000字內。</li>
                <li>您可以在文內附上參考資料、網址連結、圖片等，但請注意版權，勿有抄襲、盜用等情事，亦不接受一稿多投。若經舉發，文責自負。</li>
                <li>本中心有權決定是否刊登文章，或進行標題與內文的刪修。若您在一個月內未接到刊登與否的回信，還請另作他用。</li>
            </ul>

            <p class="text-rosy-pink p-5">本中心私房故事投稿並未支付稿酬，但為感謝讀者的支持，歡迎您在信中留下您的通訊地址，若經刊登，我們將寄送感謝狀一只，以致謝意。</p>
        </div>
    </div>
</section>

</main>
@endsection