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
        <li class="breadcrumb-item">
            <a href="{{ url('trend/')}}" title="全球脈動">全球脈動</a>
        </li>
        <li class="breadcrumb-item active">世界趨勢</li>
    </ol>

    <section class="container world">
        <h2 class="world__title">拒絕醫療權的世界趨勢</h2>

        <div class="year">
            @foreach($milestone as $data)
            <div class="year__item">
                <div class="year__box">
                    <div class="year__no">{{ $data->date->year }}</div>
                    <div class="year__title">{{ $data->title }}
                    </div>
                    <div class="year__text">{!! $data->body !!}</div>
                </div>
                <div class="year__img">
                    <img src="/storage/{{ $data->pic }}" class="img-fluid" alt="{{ $data->title }}" />
                </div>
            </div>
            @endforeach
        </div>

        <div class="world__subtitle">「拒絕醫療是病人的基本權利，
            <br class="d-lg-none">也符合醫學倫理。」</div>
        <div class="world__text">世界醫學會
            <br>The World Medical Association</div>
    </section>

</main>
@endsection