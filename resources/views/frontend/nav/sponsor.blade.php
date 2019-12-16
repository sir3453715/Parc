@extends('frontend.master.master')
@section('title')
    <title>病人自主研究中心 | Patient Autonomy Research Center - 友善單位</title>
@endsection
@section('main')
    <!--main-->
    <main class="container">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>

        <!-- 友善單位 -->
        <h2 class="title banner-sponsor__title">友善單位</h2>
        <!-- banner-sponsor -->
        <div class="row px-2 px-lg-0 banner-sponsor">
            @foreach($partner as $data)
            <div class="banner-sponsor__box">
                @isset($data->link)
                    <a href="{{ $data->link }}" target="_blank">
                        <div class=" banner-sponsor__item">
                            <img src="/storage/{{$data->pic}}" alt="{{$data->title}}" class="img-fluid" />
                        </div>
                        <p align="center">{{$data->title}}</p>
                    </a>
                @endisset
                @empty($data->link)
                    <div class=" banner-sponsor__item">
                        <img src="/storage/{{$data->pic}}" alt="{{$data->title}}" class="img-fluid" />
                    </div>
                    <p align="center">{{$data->title}}</p>
                @endempty
            </div>
            @endforeach
        </div>
    </main>
@endsection