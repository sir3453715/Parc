@extends('frontend.master.master')
@section('main')
        <!--main-->
        <main class="container">
            <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
            <!-- banner-main -->
            <div class="banner-main owl-carousel ">
                @foreach($banner as $data)
                <a href="{{$data->link}}" target="_blank" class="item banner-main__item" title="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;">
                    <div class="banner-main__label">
                    <div class="banner-main__title">{{$data->title}}</div>
                        <div class="banner-main__subtitle">{!!$data->body!!}</div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- 最新消息 -->
            <h2 class="title">最新消息</h2>
            <!-- photo-x3 -->
            <div class="photo-x3 owl-carousel">
                @foreach($slider as $data)
                <a href="#" class="item photo-x3__item" title="{{$data->title}}">
                    <div class="photo-x3__img" alt="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                    <div class="photo-x3__title">{{$data->title}}</div>
                </a>
                @endforeach
            </div>
            <!-- banner-icon -->
            <div class="row justify-content-center px-2 px-lg-0">
                <a href="#" class="col-6 col-lg-4 banner-icon" title="什麼是病人自主權利法">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-01.png') }}" alt="什麼是病人自主權利法" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">什麼是病人自主權利法</div>
                </a>
                <a href="#" class="col-6 col-lg-4 banner-icon" title="如何行使權利">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-02.png') }}" alt="如何行使權利" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">如何行使權利</div>
                </a>
                <a href="#" class="col-6 col-lg-4 banner-icon" title="我要支持">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-03.png') }}" alt="我要支持" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">我要支持</div>
                </a>
            </div>

            <!-- banner-lector -->
            <div class="banner-lector owl-carousel">
                @foreach($quote as $data)
                <a href="#" class="item banner-lector__item">
                    <div class="banner-lector__img" alt="{!!$data->body!!}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                        <div class="banner-lector__box">
                        <div class="banner-lector__title">{!!$data->body!!}</div>
                        <div class="banner-lector__name"> - {{$data->author}}</div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- 我們的服務 -->
            <h2 class="title">我們的服務</h2>
            <!-- banner-icon -->
            <div class="row px-2 px-lg-0">
                <a href="#" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-04.png') }}" alt="生命故事" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">生命故事</div>
                    <div class="banner-icon__subtitle">聚集各界感動人心的故事，探問生命課題，啟發善終思考。</div>
                </a>
                <a href="#" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-05.png') }}" alt="課程與活動" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">課程與活動</div>
                    <div class="banner-icon__subtitle">各類專業課程、生命育樂活動及跨界創作專案，精彩登場。</div>
                </a>
                <a href="#" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-06.png') }}" alt="法規政策" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">法規政策</div>
                    <div class="banner-icon__subtitle">提供我國《病人自主權利法》最新動態及研究文獻。</div>
                </a>
                <a href="#" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-07.png') }}" alt="全球脈動" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">全球脈動</div>
                    <div class="banner-icon__subtitle">掌握各國病人自主權的發展現況，建立海外合作關係。</div>
                </a>
            </div>

            <!-- 執行長談病人自主權  -->
            <div class="row tvcf-main">
                <div class="tvcf-main__circle-left"></div>
                <div class="col-12 col-lg-4 tvcf-main__title order-lg-2">
                    <h2>執行長談病人自主權</h2>
                </div>
                <div class="col-12 col-lg-8 tvcf-main__box order-lg-1">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe title="執行長談病人自主權" width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/hEpnD4nqz2s" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="tvcf-main__circle-right"></div>
            </div>


            <!-- 合作單位 -->
            <h2 class="title">合作單位</h2>
            <!-- banner-sponsor -->
            <div class="row px-2 px-lg-0 banner-sponsor">
                @foreach($partner as $data)
                <div class="col-4 col-lg-3">
                    <div class=" banner-sponsor__item">
                        <img src="/storage/{{$data->pic}}" alt="{{$data->title}}" class="img-fluid" title="{{$data->title}}" />
                    </div>
                </div>
                @endforeach
            </div>
        </main>
@endsection