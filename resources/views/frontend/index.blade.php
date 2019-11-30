@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 首頁</title>
@endsection

@section('main')
<main class="container">
    <a href="#c" title="中央內容區塊" id="AC" accesskey="C" tabindex="2">:::</a>

    <!-- banner-main -->
    <div class="banner-main owl-carousel">
        @foreach($banner as $data)
        <a href="{{$data->link}}" target="_blank" class="item banner-main__item" title="{{$data->title}}(另開視窗)"
           style="background: url('/storage/{{$data->pic}}') no-repeat center; background-size: cover;" tabindex="2">
            <div class="banner-main__label">
                <div class="banner-main__title">{{$data->title}}</div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- 重磅焦點 -->
    <h2 class="title">重磅焦點</h2>
    <div class="photo-x3 owl-carousel">
        @foreach($focus as $data)
        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x3__item" title="{{$data->title}}" tabindex="0">
            <div class="photo-x3__img" style="background: url('/storage/{{$data->pic}}') no-repeat center; background-size: cover;"></div>
            <div class="photo-x3__title">{{$data->title}}</div>
        </a>
        @endforeach
    </div>

    <!-- 最新消息 -->
    <h2 class="title">最新消息</h2>
    <div class="news-main">
        @foreach($slider as $data)
        <a class="news-main__item" href="{{ url('/'.$data->category_en().'/'.$data->sub_category_en().'/article/'.$data->id) }}" title="{{$data->title}}" tabindex="0">
            <div class="news-main__date">{{ date('Y/m/d', strtotime($data->created_at)) }}</div>
            <div class="news-main__title">{{$data->title}}</div>
        </a>
        @endforeach
        <a class="news-main__more" href="news">
            <span data-text="More">更多消息</span>
        </a>
    </div>

    @if($video != null)
    <!-- 影片上稿區  -->
    <div class="row tvcf-main">
        <div class="tvcf-main__circle-left"></div>
        <div class="col-12 col-lg-4 tvcf-main__title order-lg-2">
            <h2>{{ $video->title }}</h2>
        </div>
        <div class="col-12 col-lg-8 tvcf-main__box order-lg-1">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe title="{{ $video->title }}" width="100%" height="100%" class="embed-responsive-item"
                        src="https://www.youtube.com/embed/{{ $video->link }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <div class="tvcf-main__circle-right"></div>
    </div>
    @endif
</main>
@endsection