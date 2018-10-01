@extends('frontend.master.master')
@section('main')
        <!--main-->
        <main class="container px-0">

                <!--breadcrumb-->
                <ol class="breadcrumb container">
                    <li class="breadcrumb-item">
                        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
                        <a href="{{ url('')}}" title="首頁">首頁</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url ('story/special')}}" title="生命故事">生命故事</a>
                    </li>
                    <li class="breadcrumb-item active" id="active_breadcrumb"></li>
                </ol>

                <!-- banner-main -->
                <div class="banner-main owl-carousel ">
                    @foreach($slider as $data)
                    <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item banner-main__item" title="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;">
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
                        <a class="nav-link" id="special" href="{{ url('/story/special') }}" title="精選特輯">精選特輯</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="love" href="{{ url('/story/love') }}" title="親愛劇場">親愛劇場</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="doctor" href="{{ url('/story/doctor') }}" title="白袍診間">白袍診間</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="life" href="{{ url('/story/life') }}" title="生死迷藏">生死迷藏</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="expert" href="{{ url('/story/expert') }}" title="權威觀點">權威觀點</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="story" href="{{ url('/story/story') }}" title="私房故事">私房故事</a>
                    </li>
                </ul>

                <div class="row">
                    @foreach($article_list as $data)
                    <div class="col-12 col-lg-4">
                        <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x3__item" title="{{$data->title}}">
                            <div class="photo-x3__img" alt="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                            <div class="photo-x3__title">{{$data->title}}</div>
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

                    if( '{{ $type }}' == 'story')
                    {
                        $("#active_breadcrumb").append("私房故事")
                        $("#story").addClass("active");
                    }
                    else if( '{{ $type }}' == 'love')
                    {
                        $("#active_breadcrumb").append("親愛劇場")
                        $("#love").addClass("active");
                    }
                    else if( '{{ $type }}' == 'doctor')
                    {
                        $("#active_breadcrumb").append("白袍診間")
                        $("#doctor").addClass("active");
                    }
                    else if( '{{ $type }}' == 'life')
                    {
                        $("#active_breadcrumb").append("生死迷藏")
                        $("#life").addClass("active");
                    }
                    else if( '{{ $type }}' == 'expert')
                    {
                        $("#active_breadcrumb").append("權威觀點")
                        $("#expert").addClass("active");
                    }
                    else{
                        $("#active_breadcrumb").append("精選特輯")
                        $("#special").addClass("active");
                    }
                });
            </script>
@endsection