@extends('frontend.master.master')
@section('main')
<!--main-->
<main class="container">

<!--breadcrumb-->
<ol class="breadcrumb container">
    <li class="breadcrumb-item">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
        <a href="{{ url('')}}" title="首頁">首頁</a>
    </li>
    <li class="breadcrumb-item active">法規政策</li>
</ol>

<!-- banner-main -->
<div class="banner-single owl-carousel px-0" title="法規政策" style="background: url({{ asset('assets/images/photo/banner-law-1.jpg') }}) no-repeat center;background-size: cover;">
    <h2 class="banner-single__title">法規政策</h2>
    <div class="banner-single__subtitle">我國病人自主權法理資訊與政策動態即時掌握</div>
</div>

<section>
    <h2 class="title">相關法規</h2>
    @if(count($law_article_list)<12)
        <div class="row">
            @foreach($law_article_list as $data)
            <div class="col-6 col-lg-4">
                <a href="{{ url('law/act/'.$data->id) }}"  id="article{{$data->id}}" class="btn-line article">{{ $data->title }}</a>
            </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @for($i = 0 ; $i<12 ; $i++)
            <div class="col-6 col-lg-4">
                <a href="{{ url('law/act/'.$law_article_list[$i]->id) }}" id="article{{$law_article_list[$i]->id}}" class="btn-line article">{{ $law_article_list[$i]->title }}</a>
            </div>
            @endfor
        </div>
        <div class="row collapse" id="moreLaw">
            @for($i = 12 ; $i<count($law_article_list) ; $i++)
            <div class="col-6 col-lg-4">
                <a href="{{ url('law/act/'.$law_article_list[$i]->id) }}"  id="article{{$law_article_list[$i]->id}}" class="btn-line">{{$law_article_list[$i]->title}}</a>
            </div>
            @endfor               
        </div>
        <div class="btn-more-line">
            <a href="#moreLaw" data-toggle="collapse" class="btn-more-law collapsed">相關法條看更多</a>
        </div> 
    @endif
</section>


<div class="row">
    <h2 class="col-12 title">政策研究</h2>
    @foreach($policy_extra_sub_category as $category)
    <div class="col-12 col-lg-6">
        <div class="item photo-x6__item">
            <div class="photo-x6__box">
                <div class="photo-x6__img" title="{{ $category->name }}" style="background: url(/storage/{{ $category->pic }}) no-repeat center; background-size: cover;"></div>
            </div>
            <div class="photo-x6__title">{{ $category->name }}</div>
            <div class="photo-x6__text">
                <ul>
                    @foreach($policy[$category->en_name] as $article)
                    <li>
                        <a href="{{ url('/'. $article->category_en(). '/'. $article->sub_category_en() .'/article/'. $article->id) }}">{{ $article->title}}</a>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ url('law/policy/'. $category->en_name .'') }}" class="btn-more2">看更多...</a>
            </div>
        </div>
    </div>
    @endforeach
</div>


</main>
    <script type="text/javascript">
        // $(document).ready(function() {
        // });
    </script>
@endsection