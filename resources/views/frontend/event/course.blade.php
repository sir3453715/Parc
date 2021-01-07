@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 課程與資源 - 專業課程</title>
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
            <a title="課程與資源" tabindex="2">課程與資源</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/event/course')}}" title="文宣出版品" tabindex="2">文宣出版品</a>
        </li>
        <li class="breadcrumb-item active" id="active_breadcrumb"></li>
        <h2 class="d-none" id="h2"></h2>
    </ol>

    <!-- banner-main -->
    <div class="banner-main owl-carousel px-0">
        @foreach($slider as $data)
        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item banner-main__item" title="{{ $data->title }}" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;" tabindex="3">
            <div class="banner-main__label">
                <div class="banner-main__title">{{ $data->title }}</div>
                <div class="banner-main__subtitle">{{ $data->description }}</div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- tabs -->
    <ul class="nav justify-content-center">
        @foreach($course_extra_sub_category as $category)
        <li class="nav-item">
            <a class="nav-link" id="nav-{{ $category->en_name }}" href="{{ url('event/course/'.$category->en_name) }}" title="{{ $category->name }}">{{$category->name}}</a>
        </li>
        @endforeach
    </ul>

    <div class="row">
        <p class="col-12 text-center py-4">
            @foreach($course_extra_sub_category as $category)
            @if($type == $category->en_name)
                {{$category->description}}
                @break
            @endif
            @endforeach
        </p>
        @foreach($article_list as $data)
        <div class="col-12 col-lg-4">
            <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x6__item" title="{{ $data->title }}">
                <div class="photo-x6__box">
                    <div class="photo-x6__img" alt="{{ $data->title }}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                </div>
                <div class="photo-x6__title">{{ $data->title }}</div>
                <div class="photo-x6__text">
                    {{$data->description}}
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <!-- pagination -->
    <nav>
        {{$article_list->links()}}
    </nav>
    <script type="text/javascript">
        $(document).ready(function() {
            @foreach($course_extra_sub_category as $category)
            @if($type == $category->en_name)
            $("#active_breadcrumb").append("{{$category->name}}");
            $("#h2").append("{{$category->name}}");
            $("#nav-{{ $category->en_name }}").addClass("active");
                @break
            @endif
            @endforeach
        });
    </script>
@endsection