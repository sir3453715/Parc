@extends('frontend.master.master')
@inject('datePresenter','App\Presenters\datePresenter')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 標籤</title>
@endsection
@section('main')
<!--main-->
<main class="container">

    <!--breadcrumb-->
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
            <a href="{{ url('')}}" title="首頁">首頁</a>
        </li>
        <li class="breadcrumb-item active">#{{ $tag }}</li>
    </ol>

    <div class="title-black mb-3">#{{ $tag }}</div>

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