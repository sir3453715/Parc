@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 法規政策 - 政策研究</title>
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
            <a title="法規政策" tabindex="2">法規政策</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/law/policy')}}" title="政策研究" tabindex="2">政策研究</a>
        </li>
        <li class="breadcrumb-item active" id="active_breadcrumb"></li>
    </ol>

    <!-- banner-main -->
    <div class="banner-single owl-carousel px-0" title="政策研究" style="background: url({{ asset('assets/images/photo/banner-law-1.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title">政策研究</h2>
    </div>

    <h3 class="text-center">
        為保障生命最後一哩路，我們致力推廣生命教育以及尊嚴善終。
        <br>
        透過政策研究，我們匯整各方專家之病人自主權研究意見，並汲取醫療現場的實務經驗，
        <br>
        我們期盼政府政策縝密周延，更為貼近國人生活與生命經驗，充分保障國人生命。
        <br>
        本單元不僅彙整各方專家意見，持續蒐集我國病人自主權專文，
        <br>
        同時紀錄政策配套措施之進展，有關病人自主權之動態我們即時掌握。
        <hr>                
    </h3>
    <!-- tabs -->
    <ul class="nav justify-content-center">
        @foreach($policy_extra_sub_category as $category)
        <li class="nav-item">
            <a class="nav-link" id="nav-{{ $category->en_name }}" href="{{ url('law/policy/'.$category->en_name) }}" title="{{ $category->name }}">{{$category->name}}</a>
        </li>
        @endforeach
    </ul>

    <div class="row">
        <p class="col-12 text-center py-4">
            @foreach($policy_extra_sub_category as $category)
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
            @foreach($policy_extra_sub_category as $category)
            @if($type == $category->en_name)
            $("#active_breadcrumb").append("{{$category->name}}");
            $("#nav-{{ $category->en_name }}").addClass("active");
                @break
            @endif
            @endforeach
        });
    </script>
@endsection