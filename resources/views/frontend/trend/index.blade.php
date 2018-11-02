@extends('frontend.master.master')
@inject('datePresenter','App\Presenters\datePresenter')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 全球脈動</title>
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
                <li class="breadcrumb-item active">全球脈動</li>
            </ol>

            <!-- banner-main -->
            <div class="banner-single owl-carousel px-0" title="全球脈動" style="background: url({{ asset('assets/images/photo/banner-international-1.jpg') }}) no-repeat center;background-size: cover;">
                <h2 class="banner-single__title">全球脈動</h2>
            </div>

            <!-- 國際新知 -->
            <section>
                <h2 class="title">國際新知</h2>
                <h3 class="text-center">放眼全球，提供國際病人自主權的最新進展，
                    <br>深入導讀並展示各國的法律、政策、教育、醫療等各層面觀點，幫助讀者汲取新知。</h3>

                <div class="row">
                    @foreach($international_article_list as $data)
                    <div class="col-12 col-lg-4">
                        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x6__item" title="{{$data->title}}">
                            <div class="photo-x6__box">
                                <div class="photo-x6__img" alt="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                            </div>
                            <div class="photo-x6__title">{{$data->title}}</div>
                            <div class="photo-x6__text">
                                {{$datePresenter->getChineseMonth($data->created_at->month).' '.$data->created_at->day.','.$data->created_at->year}} by {{$data->author}}
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="btn-more-line">
                    <a href="{{ url('trend/international')}}" class="btn-more">觀看更多</a>
                </div>
            </section>

            <!-- 合作交流 -->
            <section>
                <h2 class="title">合作交流</h2>
                <h3 class="text-center">積極拓展海外友誼鏈結，與國際組織、專家學者熱忱交流，
                    <br>簽訂合作備忘，為病人自主權的推廣積聚更多能量。</h3>

                <div class="row">
                    @foreach($exchange_article_list as $data)
                    <div class="col-12 col-lg-4">
                        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x6__item" title="{{$data->title}}">
                            <div class="photo-x6__box">
                                <div class="photo-x6__img" alt="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                            </div>
                            <div class="photo-x6__title">{{$data->title}}</div>
                            <div class="photo-x6__text">
                                {{$datePresenter->getChineseMonth($data->created_at->month).' '.$data->created_at->day.','.$data->created_at->year}} by {{$data->author}}
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="btn-more-line">
                    <a href="{{ url('trend/exchange')}}" class="btn-more">觀看更多</a>
                </div>
            </section>

            <section class="container my-5">
                <div class="row">
                    <div class="order-lg-0 col-12 col-lg-6 mt-5 mt-lg-0 embed-responsive embed-responsive-16by9" style="background: url({{ asset('assets/images/photo/banner-trend-x1.jpg') }}) no-repeat center;background-size: cover;">
                        <div class="embed-responsive-item" ></div>
                    </div>
                    <div class="order-lg-1 col-12 col-lg-6 text-center px-0">
                        <h2 class="title">國際NGO</h2>
                        <h3 class="subtitle">收羅世界各地關注尊嚴善終的NGO組織，<br>端詳病人自主理念在不同文化社會底下綻放的樣貌。</h3>
                        <div class="btn-more-line m-lg-5">
                                <a href="{{ url('trend/ngo')}}" class="btn-more">觀看更多</a>
                        </div>
                    </div>
                    <div class="order-lg-3 col-12 col-lg-6 mt-5 mt-lg-0 embed-responsive embed-responsive-16by9" style="background: url({{ asset('assets/images/photo/banner-trend-x2.jpg') }}) no-repeat center;background-size: cover;">
                        <div class="embed-responsive-item" ></div>
                    </div>
                    <div class="order-lg-2 col-12 col-lg-6 text-center px-0">
                        <h2 class="title">世界趨勢</h2>
                        <h3 class="subtitle">綜覽國際病人自主權的發展歷程，<br>藉由各國法制化的演變，洞察全世界拒絕醫療權的前瞻趨勢。</h3>
                        <div class="btn-more-line m-lg-5">
                                <a href="{{ url('trend/world')}}" class="btn-more">觀看更多</a>
                        </div>
                    </div>                   
                </div>
            </section>
        </main>
@endsection