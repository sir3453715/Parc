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
    <li class="breadcrumb-item">
        <a href="{{ url('/law')}}" title="法規政策">法規政策</a>
    </li>
    <li class="breadcrumb-item active">法規實務</li>
</ol>

<!-- banner-main -->
<div class="banner-single owl-carousel px-0" title="法規實務" style="background: url({{ asset('assets/images/photo/banner-law-1.jpg') }}) no-repeat center;background-size: cover;">
    <h2 class="banner-single__title">法規實務</h2>
</div>

<h3 class="text-center">
    《病人自主權利法》（簡稱《病主法》）是臺灣第一部以病人為主體的醫療法規，也
    <br>
    是全亞洲第一部完整保障病人自主權利的專法，核心理念在於保障病人醫療自主、善
    <br>
    終權益，同時促進醫病關係更加和諧，可謂超越個人性的保障，擴及家庭與整體社會的權益。
    <br>
    <br>
    《病主法》確保病人享有知情、選擇與決定的自主權利，透過完成
    <br>
    「預立醫療照護諮商」與簽署「預立醫療決定」，民眾事先做好重症時的醫療決策，
    <br>
    在特定臨床條件下得以拒絕延長生命的醫療方式，圓滿善終，預防親友摯愛受苦。    
</h3>
<div class="btn-more-line">
    <a href="{{ url('/event/video')}}" class="btn-more">前往線上影音課程</a>
</div>

<section>
    <h2 class="title">相關法規</h2>
    @if(count($law_article_list)<12)
        <div class="row">
            @foreach($law_article_list as $data)
            <div class="col-6 col-lg-4">
                <a href="javascript:showArticle({{$data->id}});" id="article{{$data->id}}" class="article btn-line">{{ $data->title }}</a>
            </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @for($i = 0 ; $i<12 ; $i++)
            <div class="col-6 col-lg-4">
                <a href="javascript:showArticle({{$data->id}});" id="article{{$law_article_list[$i]->id}}" class="article btn-line">{{ $law_article_list[$i]->title }}</a>
            </div>
            @endfor
        </div>
        <div class="row collapse" id="moreLaw">
            @for($i = 12 ; $i<count($law_article_list) ; $i++)
            <div class="col-6 col-lg-4">
                <a id="article{{$law_article_list[$i]->id}}" class="article btn-line">{{$law_article_list[$i]->title}}</a>
            </div>
            @endfor               
        </div>
        <div class="btn-more-line">
            <a href="#moreLaw" data-toggle="collapse" class="btn-more-law collapsed">相關法條看更多</a>
        </div> 
    @endif
</section>

    @foreach($law_article_list as $data)
    <section class="law" id="law{{$data->id}}" style="display:none;">   
        <div class="law__title">{{$data->title}}</div>
    <div class="law__content" id="law__content" >{!! $data->body !!}</div>
    </section>
    @endforeach

</main>
    <script type="text/javascript">
        $(document).ready(function() {
            @if(count($law_article_list)>0 && $type == null)
            showArticle({{$law_article_list[0]->id}});
            @endif
            @if($type != null)
            showArticle({{$type}});
            @endif
        });
        function showArticle(id){
            $(".article").removeClass("active");
            $("#article"+id).addClass("active");
            $(".law").hide();
            $("#law"+id).show();
        }
    </script>
@endsection