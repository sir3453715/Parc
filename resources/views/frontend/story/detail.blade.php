@extends('frontend.master.master')
@inject('datePresenter','App\Presenters\datePresenter')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - {{$article->title}}</title>
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

                @if ($category != 'event' && $category != 'story' && $category != 'law')
                    <li class="breadcrumb-item">
                        <a href="{{ url('/'.$article->category_en().'/') }}" title="{{$article->category()}}" tabindex="2">{{$article->category()}}</a>
                    </li>
                @else
                    <li class="breadcrumb-item">
                        <a title="{{$article->category()}}" tabindex="2">{{$article->category()}}</a>
                    </li>
                @endif

                @if($category != 'love')
                <li class="breadcrumb-item">
                    <a href="{{ url('/'.$article->category_en().'/'.$article->sub_category_en()) }}" title="{{$article->sub_category()}}" tabindex="2">{{$article->sub_category()}}</a>
                </li>
                @endif
                @if($article->extra_sub_category_en())
                <li class="breadcrumb-item">
                    <a href="{{ url('/'.$article->category_en().'/'.$article->sub_category_en().'/'.$article->extra_sub_category_en()) }}" title="{{$article->extra_sub_category()}}" tabindex="2">{{$article->extra_sub_category()}}</a>
                </li>
                @endif
                <li class="breadcrumb-item active">{{$article->title}}</li>
            </ol>

            <!-- banner-main -->
            <div class="banner-right">
                <div class="banner-right__box">
                    <h2 class="banner-right__title">{{$article->sub_category()}}</h2>
                </div>
                @if($sub_category == "video" && $article->video_url != null )
                <!-- video -->
              
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe title="{{ $article->title }}" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $article->video_url }}?rel=0" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                @else
                    <div class="banner-right__img" title="{{$article->title}}" style="background: url(/storage/{{$article->pic}}) no-repeat center;background-size: cover;"></div>
                @endif
            </div>

            <h2 class="title mb-0">{{$article->title}}</h2>
            <div class="info-bar">
                <img alt="" src="{{ asset('assets/images/icon/icon-clock.svg') }}" class="info-bar__icon img-fluid" />
                <span class="info-bar__text">{{$datePresenter->getChineseMonth($article->created_at->month).' '.$article->created_at->day.','.$article->created_at->year}} </span>
                <img alt="" src="{{ asset('assets/images/icon/icon-tab.svg') }}" class="info-bar__icon img-fluid" />
                
                @if($article->tags!=null)
                @php
                $tags_splitted=explode(',',$article->tags)
                @endphp
                @foreach ($tags_splitted as $tag_splitted )
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
                @if($article->lock == 1)
                <div class="col-12 col-lg-10 ckedit" oncontextmenu="return false" oncopy="return false" oncut="return false" onpaste="return false"
                style="-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; -webkit-touch-callout: default ;-webkit-touch-callout: none;">
                @else
                <div class="col-12 col-lg-10 ckedit">
                @endif
                    {!! $article->body !!}
                </div>
            </section>

        </main>
@endsection