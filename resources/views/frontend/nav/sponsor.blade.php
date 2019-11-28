@extends('frontend.master.master')
@section('title')
    <title>病人自主研究中心 | Patient Autonomy Research Center - 友善單位</title>
@endsection
@section('main')
    <!--main-->
    <main class="container">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>

        <!-- 合作單位 -->
        <h2 class="title banner-sponsor__title">友善單位</h2>
        <!-- banner-sponsor -->
        <div class="row px-2 px-lg-0 banner-sponsor">
            @foreach($partner as $data)
            <div class="banner-sponsor__box">
                <div class=" banner-sponsor__item">
                    <img src="/storage/{{$data->pic}}" alt="{{$data->title}}" class="img-fluid" />
                </div>
            </div>
            @endforeach
        </div>
    </main>
@endsection