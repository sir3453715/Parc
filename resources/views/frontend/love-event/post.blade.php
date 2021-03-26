@extends('frontend.master.master')
@inject('datePresenter','App\Presenters\datePresenter')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - {{$event->title}}</title>
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
                @foreach($terms as $term)
                    <li class="breadcrumb-item">
                        @if($term == '最新消息' )
                            <a href="/love-event#news" title="{{$term}}" tabindex="2">{{$term}}</a>
                        @elseif($term == '報名資訊' )
                            <a href="/love-event#join" title="{{$term}}" tabindex="2">{{$term}}</a>
                        @else
                            <a href="/love-event#event" title="{{$term}}" tabindex="2">{{$term}}</a>
                        @endif
                    </li>
                @endforeach

                <li class="breadcrumb-item active">{{$event->title}}</li>
            </ol>

            <!-- banner-main -->
            <div class="banner-right">
                <div class="banner-right__box">
                    <h2 class="banner-right__title">{{$terms[0]}}</h2>
                </div>
                <div class="banner-right__img" title="{{$event->title}}" style="background: url(/storage/{{$event->pic}}) no-repeat center;background-size: cover;"></div>
            </div>

            <h2 class="title mb-0">{{$event->title}}</h2>
            <div class="info-bar">
                <img alt="" src="{{ asset('assets/images/icon/icon-clock.svg') }}" class="info-bar__icon img-fluid" />
                <span class="info-bar__text">{{$datePresenter->getChineseMonth($event->created_at->month).' '.$event->created_at->day.','.$event->created_at->year}} </span>
                <img alt="" src="{{ asset('assets/images/icon/icon-tab.svg') }}" class="info-bar__icon img-fluid" />
                
                @if($event->tags!=null)
                    @foreach (explode(',', $event->tags) as $tag_splitted )
                    <a href="{{ url('tag/'.$tag_splitted) }}"><span class="info-bar__text">#{{$tag_splitted}}</span></a>
                    @endforeach
                @endif
            </div>
            <div class="social-bar">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" title="臉書分享(另開視窗)"target="_blank" rel="noopener noreferrer" >
                    <img alt="" src="{{ asset('assets/images/icon/icon-facebook-s.svg') }}" class="img-fluid" />
                </a>
                <a href="https://social-plugins.line.me/lineit/share?url={{Request::url()}}" title="Line分享(另開視窗)" target="_blank" rel="noopener noreferrer" >
                    <img alt="" src="{{ asset('assets/images/icon/icon-line-s.svg') }}" class="img-fluid" />
                </a>
                <a href="https://plus.google.com/share?url={{Request::url()}}" target="_blank" title="Google+分享(另開視窗)" rel="noopener noreferrer">
                    <img alt="" src="{{ asset('assets/images/icon/icon-google-s.svg') }}" class="img-fluid" />
                </a>
                <a href="http://twitter.com/share?url={{Request::url()}}" target="_blank" title="Twitter分享(另開視窗)" rel="noopener noreferrer">
                    <img alt="" src="{{ asset('assets/images/icon/icon-twitter-s.svg') }}" class="img-fluid" />
                </a>
            </div>

            <section class="row justify-content-center py-5">
                @if($event->lock == 1)
                <div class="col-12 col-lg-10 ckedit" oncontextmenu="return false" oncopy="return false" oncut="return false" onpaste="return false"
                style="-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; -webkit-touch-callout: default ;-webkit-touch-callout: none;">
                @else
                <div class="col-12 col-lg-10 ckedit">
                @endif
                    {!! $event->body !!}
                </div>
            </section>

        </main>
@endsection