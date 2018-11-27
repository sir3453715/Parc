@extends('frontend.master.master')
@inject('datePresenter','App\Presenters\datePresenter')
@section('title')
<title id="active_title">病人自主研究中心 | Patient Autonomy Research Center - 最新消息</title>
@endsection
@section('main')
        <!--main-->
        <main class="container px-0">

                <!--breadcrumb-->
                <ol class="breadcrumb container">
                    <li class="breadcrumb-item">
                        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
                        <a href="{{ url('')}}" title="首頁" tabindex="2">首頁</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url ('news')}}" title="最新消息" tabindex="2">最新消息</a>
                    </li>
                    <li class="breadcrumb-item active" id="active_breadcrumb"></li>
                    <h2 class="d-none" id="h2"></h2>
                </ol>

                <!-- banner-main -->
                <div class="banner-main owl-carousel ">
                    @foreach($slider as $data)
                    <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item banner-main__item" title="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;" tabindex="3">
                        <div class="banner-main__label">
                            <div class="banner-main__title">{{$data->title}}</div>
                            <div class="banner-main__subtitle">{{$data->description}}</div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- tabs -->
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" id="center" href="{{ url('/news/center') }}" title="中心動態">中心動態</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="law" href="{{ url('/news/law') }}" title="法規政策動態">法規政策動態</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="event" href="{{ url('/news/event') }}" title="課程與活動動態">課程與活動動態</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="international" href="{{ url('/news/international') }}" title="國際動態">國際動態</a>
                    </li>
                </ul>

                <div class="row">
                    @foreach($article_list as $data)
                    <div class="col-12 col-lg-4">
                        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x6__item" title="{{ $data->title }}">
                            <div class="photo-x6__box">
                                <div class="photo-x6__img" alt="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                            </div>
                            <div class="photo-x6__title">{{$data->title}}</div>
                            <div class="photo-x6__text">
                                {{$data->description}}
                                <br>
                                <br> {{$datePresenter->getChineseMonth($data->created_at->month).' '.$data->created_at->day.','.$data->created_at->year}} by {{$data->author}}
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- pagination -->
                <nav>
                    {{$article_list->links()}}
                </nav>
            </main>
            <script type="text/javascript">
                $(document).ready(function() {
                    if( '{{Request::path()}}' == 'news/law')
                    {
                        $("#active_breadcrumb").append("法規政策動態")
                        $("#h2").append("法規政策動態")
                        $("#active_title").append(" - 法規政策動態")
                        $("#law").addClass("active");
                    }
                    else if( '{{Request::path()}}' == 'news/event')
                    {
                        $("#active_breadcrumb").append("課程與活動動態")
                        $("#h2").append("課程與活動動態")
                        $("#active_title").append(" - 課程與活動動態")
                        $("#event").addClass("active");
                    }
                    else if( '{{Request::path()}}' == 'news/international')
                    {
                        $("#active_breadcrumb").append("國際動態")
                        $("#h2").append("國際動態")
                        $("#active_title").append(" - 國際動態")
                        $("#international").addClass("active");
                    }
                    else{
                        $("#active_breadcrumb").append("中心動態")
                        $("#h2").append("中心動態")
                        $("#active_title").append(" - 中心動態")
                        $("#center").addClass("active");
                    }
                });
            </script>
@endsection