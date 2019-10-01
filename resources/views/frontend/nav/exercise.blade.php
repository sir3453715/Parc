@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 我要簽署</title>
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
    <li class="breadcrumb-item active">我要簽署</li>
    <h2 class="d-none" id="h2">我要簽署</h2>
</ol>

<div class="bg-white py-1 mb-5">
    <div class="title-pattern">即刻簽AD，行使病人自主權</div>
    <!-- STEP 1 -->


    <!-- STEP 2 -->
    <section class="exercise">
        {{-- <div class="exercise__step-no">Step 2</div> --}}
        <div class="exercise__step-title">如何進行</div>
        <div class="p-lg-5">
            <img src="{{ asset('assets/images/icon/exercise-step2.png') }}" class="d-none d-lg-block img-fluid" alt="1:具備條件: 完全行為能力人: 已婚或20歲以上成年人(除受監護宣告者之外) 2:預約ACP:至醫療機構掛號預立醫療諮商(ACP) 3:進行ACP:帶著您的二親等內家屬及醫療委任代理人，前往醫療機構進行預立醫療照護諮商 4:簽屬AD:簽署預立醫療決定(AD)" />
            <img src="{{ asset('assets/images/icon/exercise-step2v.png') }}" class="d-lg-none img-fluid" alt="1:具備條件: 完全行為能力人: 已婚或20歲以上成年人(除受監護宣告者之外) 2:預約ACP:至醫療機構掛號預立醫療諮商(ACP) 3:進行ACP:帶著您的二親等內家屬及醫療委任代理人，前往醫療機構進行預立醫療照護諮商 4:簽屬AD:簽署預立醫療決定(AD)" />

            <div class="exercise__acp">
                {{-- <a href="{{ url('404')}}" class="exercise__acp-btn">預約ACP</a> --}}
                {{--<p class="exercise__acp-btn">預約ACP</a>--}}
                <div class="exercise__acp-item">
                    <a href="https://parc.tw/law/policy/article/271" target="_blank" class="exercise__acp-pic exercise__acp-pic01"></a>
                </div>
                <div class="exercise__acp-item">
                    <a href="#" target="_blank" class="exercise__acp-pic exercise__acp-pic02"></a>
                </div>
                <div class="exercise__acp-item">
                    <a href="https://parc.tw/law/policy/article/240" target="_blank" class="exercise__acp-pic exercise__acp-pic03"></a>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="row exercise">--}}
            {{--<div class="col-12 col-lg-4 exercise__1-1">--}}
                {{--<div class="exercise__img">--}}
                    {{--<img src="{{ asset('assets/images/icon/icon-16.png') }}" class="img-fluid" alt="遇到人生善終問題" />--}}
                {{--</div>--}}
                {{--<div class="exercise__title">遇到人生善終問題</div>--}}
                {{--<a href="{{ url('/story/special') }}" class="exercise__subtitle">他們的生命故事</a>--}}
            {{--</div>--}}
            {{--<div class="col-12 col-lg-4 exercise__1-2">--}}
                {{-- <div class="exercise__step-no">Step 1</div> --}}
                {{--<div class="exercise__step-title">更多工具包</div>--}}
                {{--<div class="exercise__img">--}}
                    {{--<img src="{{ asset('assets/images/icon/icon-17.png') }}" class="img-fluid" alt="大師解說病主法" />--}}
                {{--</div>--}}
                {{--<div class="exercise__title">大師解說病主法</div>--}}
                {{--<a href="{{ url('/event/video') }}" class="exercise__subtitle">前往線上影音課程</a>--}}
            {{--</div>--}}
            {{--<div class="col-12 col-lg-4 exercise__1-3">--}}
                {{--<div class="exercise__img">--}}
                    {{--<img src="{{ asset('assets/images/icon/icon-18.png') }}" class="img-fluid" alt="與家人敞開心胸充分討論" />--}}
                {{--</div>--}}
                {{--<div class="exercise__title">與家人敞開心胸充分討論</div>--}}
                {{--<a href="{{ url('/story/story') }}" class="exercise__subtitle">諮商實景</a>--}}
            {{--</div>--}}
        {{--</section>--}}
</div>

</main>
@endsection