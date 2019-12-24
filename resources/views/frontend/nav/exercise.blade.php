@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 我要簽署</title>
@endsection
@section('main')
<main class="container">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" tabindex="2">:::</a>
            <a href="{{ url('')}}" title="首頁" tabindex="2">首頁</a>
        </li>
        <li class="breadcrumb-item active">我要簽署</li>
    </ol>

    <div class="bg-white py-1 mb-5">
        <div class="title-pattern">即刻簽AD，行使病人自主權</div>
        <section class="exercise">
            <div class="exercise__step-title">如何進行</div>
            <div class="p-lg-5">
                <img src="{{ asset('assets/images/icon/exercise-step2.png') }}" class="d-none d-lg-block img-fluid" alt="1:具備條件: 完全行為能力人: 已婚或20歲以上成年人(除受監護宣告者之外) 2:預約ACP:至醫療機構掛號預立醫療諮商(ACP) 3:進行ACP:帶著您的二親等內家屬及醫療委任代理人，前往醫療機構進行預立醫療照護諮商 4:簽屬AD:簽署預立醫療決定(AD)" />
                <img src="{{ asset('assets/images/icon/exercise-step2v.png') }}" class="d-lg-none img-fluid" alt="1:具備條件: 完全行為能力人: 已婚或20歲以上成年人(除受監護宣告者之外) 2:預約ACP:至醫療機構掛號預立醫療諮商(ACP) 3:進行ACP:帶著您的二親等內家屬及醫療委任代理人，前往醫療機構進行預立醫療照護諮商 4:簽屬AD:簽署預立醫療決定(AD)" />

                <div class="exercise__acp">
                    <div class="exercise__acp-item">
                        <a href="https://parc.tw/law/policy/article/271" target="_blank" class="exercise__acp-pic exercise__acp-pic01"></a>
                    </div>
                    <div class="exercise__acp-item">
                        <a href="{{ url('story/story') }}" target="_blank" class="exercise__acp-pic exercise__acp-pic02"></a>
                    </div>
                    <div class="exercise__acp-item">
                        <a href="https://parc.tw/law/policy/article/240" target="_blank" class="exercise__acp-pic exercise__acp-pic03"></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection