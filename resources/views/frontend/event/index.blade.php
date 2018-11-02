@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 課程與活動</title>
@endsection
@section('main')
<!--main-->
<main class="container">
        <!--breadcrumb-->
        <ol class="breadcrumb container">
            <li class="breadcrumb-item">
                <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
                <a href="{{ url('') }}" title="首頁" tabindex="2">首頁</a>
            </li>
            <li class="breadcrumb-item active">課程與活動</li>
        </ol>
        <!-- banner-main -->
        <div class="banner-main owl-carousel ">
            @foreach($slider as $data)
            <a href="{{ url(''. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item banner-main__item" title="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;" tabindex="3">
                <div class="banner-main__label">
                    <div class="banner-main__title">{{$data->title}}</div>
                    <div class="banner-main__subtitle">{{$data->description}}</div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- 專業課程 -->
        <h2 class="title">專業課程</h2>
        <!-- photo-x3 -->
        <div class="photo-x3 owl-carousel mb-1">
            @foreach($course_article_list as $data)
            <a href="{{ url(''. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x3__item" title="{{ $data->title }}">
                <div class="photo-x3__img" alt="{{ $data->title }}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                <div class="photo-x3__title">{{ $data->title }}</div>
            </a>
            @endforeach
        </div>
        <div class="btn-more-line">
            <a href="{{ url('event/course') }}" class="btn-more">專業課程看更多</a>
        </div>

        <!-- 講師服務 -->
        <h2 class="title">講師服務</h2>
        <!-- photo-x3 -->
        <div class="photo-x3 owl-carousel mb-1">
            @foreach($lecturer_list as $data)
            <a class="item photo-x3__item" title="{{ $data->name }}">
                <div class="photo-x3__img" alt="{{ $data->name }}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
            <div class="photo-x3__title">{{ $data->name }} <br>{!! $data->title !!}</div>
            </a>
            @endforeach
        </div>
        <div class="btn-more-line">
            <a href="{{ url('event/lecturer') }}" class="btn-more">前往講師服務</a>
        </div>

        <!-- 線上影音課程 -->
        <h2 class="title">線上影音課程</h2>
        <!-- photo-x3 -->
        <div class="photo-x3 owl-carousel mb-1">
            @foreach($video_article_list as $data)
            <a href="{{ url(''. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x3__item" title="{{ $data->title }}">
                <div class="photo-x3__img" alt="{{ $data->title }}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                <div class="photo-x3__title">{{ $data->title }}</div>
            </a>
            @endforeach
        </div>
        <div class="btn-more-line">
            <a href="{{ url('event/video') }}" class="btn-more">前往線上影音課程</a>
        </div>


        <!-- 生命樂活 -->
        <h2 class="title">生命樂活</h2>
        <div class="row justify-content-center text-center mb-5">
            @foreach($lohas_extra_sub_category as $category)
            <div class="col-12 col-lg-6 service-lohas__item">
                <div class="service-lohas__icon">
                    <img src="/storage/{{ $category->pic }}" class="img-fluid" alt="{{ $category->name }}">
                </div>
                <div class="service-lohas__box">
                    <div class="service-lohas__title">{{ $category->name }}</div>
                    <ul>
                        @foreach($lohas[$category->en_name] as $article)
                        <li>
                            <a href="{{ url('/'. $article->category_en(). '/'. $article->sub_category_en() .'/article/'. $article->id) }}">{{ $article->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ url('event/lohas/'.$category->en_name) }}" class="service-lohas__btn-more">看更多...</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="btn-more-line">
            <a href="{{ url('event/lohas') }}" class="btn-more">生命樂活看更多</a>
        </div>

    </main>
@endsection