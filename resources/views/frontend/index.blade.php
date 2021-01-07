@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 首頁</title>
@endsection
 
@section('main')
<main class="container">
    <a href="#c" title="中央內容區塊" id="AC" accesskey="C" tabindex="2">:::</a>

    <!-- banner-main -->
    <div class="banner-main owl-carousel">
        @foreach($banner as $data)
        <a href="{{$data->link}}" target="_blank" class="item banner-main__item" title="{{$data->title}}(另開視窗)"
           style="background: url('/storage/{{$data->pic}}') no-repeat center; background-size: cover;" tabindex="2">
            <div class="banner-main__label">
                <div class="banner-main__title">{{$data->title}}</div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- 重磅焦點 -->
    <h2 class="title">重磅焦點</h2>
    <div class="photo-x3 owl-carousel">
        @foreach($focus as $data)
        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x3__item" title="{{$data->title}}" tabindex="0">
            <div class="photo-x3__img" style="background: url('/storage/{{$data->pic}}') no-repeat center; background-size: cover;"></div>
         
        </a>
        @endforeach
    </div>

    <!-- 最新消息 -->
    <h2 class="title">最新消息</h2>
    <div class="news-main">
        @foreach($slider as $data)
        <a class="news-main__item" href="{{ url('/'.$data->category_en().'/'.$data->sub_category_en().'/article/'.$data->id) }}" title="{{$data->title}}" tabindex="0">
            <div class="news-main__date">{{ date('Y/m/d', strtotime($data->created_at)) }}</div>
            <div class="news-main__title">{{$data->title}}</div>
        </a>
        @endforeach
        <a class="news-main__more" href="news">
            <span data-text="More">更多消息</span>
        </a>
    </div>

    @if($video != null)
    <!-- 影片上稿區  -->
     
      @desktop
      <div class="row tvcf-main" style="background:url('/assets/images/index/btn-block.png');background-size:contain;">
        <div class="tvcf-main__circle-left"></div>
         <div class="col-12 col-lg-4 tvcf-main__title order-lg-2">
       <div style="margin-right:40px;margin-top:-20px;"><a href="https://parc.tw/event/video/ExpertCourses" target="_blank"><img src="/assets/images/index/expcourse.png" onmouseover="this.src='/assets/images/index/exp-orange.png';" onmouseout="this.src='/assets/images/index/expcourse.png';"></a></div>
       <div style="margin-right:40px;margin-top:20px;"><a href="https://parc.tw/event/course/11" target="_blank"><img src="/assets/images/index/video.png" onmouseover="this.src='/assets/images/index/video-orange.png';" onmouseout="this.src='/assets/images/index/video.png';"></a></div> 
       <div style="margin-right:40px;margin-top:20px;"><a href="https://parc.tw/event/course/DM" target="_blank"><img src="/assets/images/index/dm.png" onmouseover="this.src='/assets/images/index/dm-orange.png';" onmouseout="this.src='/assets/images/index/dm.png';"></a></div> 
        </div>
        @enddesktop

@mobile
  <div class="row tvcf-main" style="background:url('/assets/images/index/btn-block.png');background-size:cover;">
        {{--<div class="tvcf-main__circle-left"></div>--}}
         <div class="col-12 col-lg-4 tvcf-main__title order-lg-2">
       <center><div style="margin-top:-50px;"><a href="https://parc.tw/event/video/ExpertCourses" target="_blank"><img src="/assets/images/index/expcourse.png" width=80%></div></a></center>
        <center><div style="margin-top:10px;"><a href="https://parc.tw/event/course/11" target="_blank"><img src="/assets/images/index/video.png" width=80%></div></a></center> 
        <center><div style="margin-top:10px;margin-bottom:10px;"><a href="https://parc.tw/event/course/DM" target="_blank"><img src="/assets/images/index/dm.png" width=80% ></div></a></center>
        </div>
@endmobile

@tablet
<div class="row tvcf-main" style="background:url('/assets/images/index/btn-block.png');background-size:cover;">
        {{--<div class="tvcf-main__circle-left"></div>--}}
         <div class="col-12 col-lg-4 tvcf-main__title order-lg-2">
       <center><div style="margin-top:-50px;"><a href="https://parc.tw/event/video/ExpertCourses" target="_blank"><img src="/assets/images/index/expcourse.png" width=80%></div></a></center>
        <center><div style="margin-top:10px;"><a href="https://parc.tw/event/course/11" target="_blank"><img src="/assets/images/index/video.png" width=80%></div></a></center> 
        <center><div style="margin-top:10px;margin-bottom:10px;"><a href="https://parc.tw/event/course/DM" target="_blank"><img src="/assets/images/index/dm.png" width=80% ></div></a></center>
        </div>
@endtablet

      
        <div class="col-12 col-lg-8 tvcf-main__box order-lg-1">
        
     <h2>{{ $video->title }}</h2>

            <div class="embed-responsive embed-responsive-16by9" style="margin-top:-30px;">
                <iframe title="{{ $video->title }}" width="100%" height="100%" class="embed-responsive-item"
                        src="https://www.youtube.com/embed/{{ $video->link }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>


        <div class="tvcf-main__circle-right"></div>

    </div>
    @endif
</main>
@endsection