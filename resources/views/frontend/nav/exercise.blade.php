@extends('frontend.master.master')
@section('main')
<!--main-->
<main class="container">
<!--breadcrumb-->
<ol class="breadcrumb container">
    <li class="breadcrumb-item">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
        <a href="{{ url('')}}" title="首頁">首頁</a>
    </li>
    <li class="breadcrumb-item active">行使權利</li>
</ol>

<div class="bg-white py-1 mb-5">
    <div class="title-pattern">即刻簽AD，行使病人自主權</div>
    <!-- STEP 1 -->
    <section class="row exercise">
        <div class="col-12 col-lg-4 exercise__1-1">
            <div class="exercise__img">
                <img src="{{ asset('assets/images/icon/icon-16.png') }}" class="img-fluid" alt="遇到人生善終問題" />
            </div>
            <div class="exercise__title">遇到人生善終問題</div>
            <a href="{{ url('/story/special') }}" class="exercise__subtitle">他們的生命故事</a>
        </div>
        <div class="col-12 col-lg-4 exercise__1-2">
            <div class="exercise__step-no">Step 1</div>
            <div class="exercise__step-title">事前準備</div>
            <div class="exercise__img">
                <img src="{{ asset('assets/images/icon/icon-17.png') }}" class="img-fluid" alt="瞭解什麼是病人自主權利法" />
            </div>
            <div class="exercise__title">瞭解什麼是病人自主權利法</div>
            <a href="{{ url('/event/video') }}" class="exercise__subtitle">前往線上影音課程</a>
        </div>
        <div class="col-12 col-lg-4 exercise__1-3">
            <div class="exercise__img">
                <img src="{{ asset('assets/images/icon/icon-18.png') }}" class="img-fluid" alt="與家人敞開心胸充分討論" />
            </div>
            <div class="exercise__title">與家人敞開心胸充分討論</div>
        </div>
    </section>

    <!-- STEP 2 -->
    <section class="exercise">
        <div class="exercise__step-no">Step 2</div>
        <div class="exercise__step-title">如何進行</div>
        <div class="p-lg-5">
            <img src="{{ asset('assets/images/icon/exercise-step2.png') }}" class="d-none d-lg-block img-fluid" alt="Step 2" />
            <img src="{{ asset('assets/images/icon/exercise-step2V.png') }}" class="d-lg-none img-fluid" alt="Step 2" />

            <div class="exercise__acp">
                <a href="" class="exercise__acp-btn">預約ACP</a>
            </div>
        </div>
    </section>
</div>

</main>
@endsection