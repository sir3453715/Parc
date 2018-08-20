@extends('frontend.master.master')
@inject('datePresenter','App\Presenters\datePresenter')
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
                <li class="breadcrumb-item active">合作交流</li>
            </ol>

            <!-- banner-main -->
            <div class="banner-single owl-carousel px-0" title="合作交流" style="background: url({{ asset('assets/images/photo/banner-exchange-1.jpg') }}) no-repeat center;background-size: cover;">
                <h2 class="banner-single__title">合作交流</h2>
            </div>

            <div class="row">
                @foreach($article_list as $data)
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
            <!-- pagination -->
            <nav>
                {{$article_list->links()}}
            </nav>
        </main>
@endsection