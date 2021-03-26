@extends('frontend.master.master')
@push('custom-styles')
    <link href="{{ asset('css/love-event.css') }}" rel="stylesheet">
@endpush

@section('title')
    <title>病人自主研究中心 | Patient Autonomy Research Center - 愛．活動 - 愛-專業課程</title>
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
            <li class="breadcrumb-item">
                <a href="{{ route('love-event')}}" title="愛．活動" tabindex="2">愛．活動</a>
            </li>
            <li class="breadcrumb-item active" id="active_breadcrumb"></li>
            <h2 class="d-none" id="h2"></h2>
        </ol>

        <!-- banner-main -->
        <div class="banner-main owl-carousel px-0">
{{--            @foreach($slider as $data)--}}
{{--                <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item banner-main__item" title="{{ $data->title }}" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;" tabindex="3">--}}
{{--                    <div class="banner-main__label">--}}
{{--                        <div class="banner-main__title">{{ $data->title }}</div>--}}
{{--                        <div class="banner-main__subtitle">{{ $data->description }}</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}
        </div>

        <!-- tabs -->
        <ul class="nav justify-content-center">
{{--            @foreach($course_extra_sub_category as $category)--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="nav-{{ $category->en_name }}" href="{{ url('love/love-course/'.$category->en_name) }}" title="{{ $category->name }}">{{$category->name}}</a>--}}
{{--                </li>--}}
{{--            @endforeach--}}
        </ul>

        <h3>最新消息</h3>
        <div id="news" class="row">
            @for($i=1;$i<=6;$i++)
            @foreach($events as $event)
                <div class="col-12 col-lg-4">
                    <a href="{{route('event-news',['id'=>$event->id])}}" class="item photo-x6__item" title="{{ $event->title }}" target="_blank">
                        <div class="photo-x6__box">
                            <div class="photo-x6__img" alt="{{ $event->title }}" style="background: url(/storage/{{$event->pic}}) no-repeat center; background-size: cover;"></div>
                        </div>
                        <div class="photo-x6__title">{{ $event->title }}</div>
                        <div class="photo-x6__text">
                            {{$event->description}}
                        </div>
                    </a>
                </div>
            @endforeach
            @endfor
        </div>
        <h3>報名資訊</h3>
        <div id="join" class="row">
            @for($i=1;$i<=6;$i++)
            @foreach($events as $event)
                <div class="col-12 col-lg-4">
                    <a href="{{route('event-join',['id'=>$event->id])}}" class="item photo-x6__item" title="{{ $event->title }}" target="_blank">
                        <div class="photo-x6__box">
                            <div class="photo-x6__img" alt="{{ $event->title }}" style="background: url(/storage/{{$event->pic}}) no-repeat center; background-size: cover;"></div>
                        </div>
                        <div class="photo-x6__title">{{ $event->title }}</div>
                        <div class="photo-x6__text">
                            {{$event->description}}
                        </div>
                    </a>
                </div>
            @endforeach
            @endfor
        </div>
        <h3>活動花絮</h3>
        <div id="event"  class="row">
            @for($i=1;$i<=6;$i++)
            @foreach($events as $event)
                <div class="col-12 col-lg-4">
                    <a href="{{route('event-post',['id'=>$event->id])}}" class="item photo-x6__item" title="{{ $event->title }}" target="_blank">
                        <div class="photo-x6__box">
                            <div class="photo-x6__img" alt="{{ $event->title }}" style="background: url(/storage/{{$event->pic}}) no-repeat center; background-size: cover;"></div>
                        </div>
                        <div class="photo-x6__title">{{ $event->title }}</div>
                        <div class="photo-x6__text">
                            {{$event->description}}
                        </div>
                    </a>
                </div>
            @endforeach
            @endfor
        </div>
        <!-- pagination -->
{{--        <nav>--}}
{{--            {{$article_list->links()}}--}}
{{--        </nav>--}}
    </main>
@endsection