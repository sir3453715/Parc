@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 首頁</title>
@endsection
@section('main')
        <!--main-->
        <main class="container">
            <a href="#c" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
            <!-- banner-main -->
            <div class="banner-main owl-carousel ">
                @foreach($banner as $data)
                <a href="{{$data->link}}" target="_blank" class="item banner-main__item" title="{{$data->title}}(另開視窗)" style="background: url(/storage/{{$data->pic}}) no-repeat center;background-size: cover;" tabindex="2">
                    <div class="banner-main__label">
                        <div class="banner-main__title">{{$data->title}}</div>
                        {{--<div class="banner-main__subtitle">{{$data->body}}</div>--}}
                    </div>
                </a>
                @endforeach
            </div>

            <!-- 重磅焦點 -->
            <h2 class="title">重磅焦點</h2>
            <!-- photo-x3 -->
            <div class="photo-x3 owl-carousel">
                @foreach($slider as $data)
                <a href="{{ url('/'. $data->category_en(). '/'. $data->sub_category_en() .'/article/'. $data->id) }}" class="item photo-x3__item" title="{{$data->title}}" tabindex="0">
                    <div class="photo-x3__img" alt="{{$data->title}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                    <div class="photo-x3__title">{{$data->title}}</div>
                </a>
                @endforeach
            </div>

            <!-- banner-icon -->
            <!-- <div class="row justify-content-center px-2 px-lg-0">
                <a href="{{ url('/about')}}" class="col-6 col-lg-4 banner-icon" title="什麼是病人自主權利法">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-01.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">什麼是病人自主權利法</div>
                </a>
                <a href="{{ url('/exercise')}}" class="col-6 col-lg-4 banner-icon" title="我要簽署">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-02.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">我要簽署</div>
                </a>
                <a href="{{ url('/donate') }}" class="col-6 col-lg-4 banner-icon" title="我要支持">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-03.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">我要支持</div>
                </a>
            </div> -->

            <!-- banner-lector -->
            <!-- <div class="banner-lector owl-carousel">
                @foreach($quote as $data)
                <a class="item banner-lector__item" tabindex="0">
                    <div class="banner-lector__img" alt="{{$data->body}}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                        <div class="banner-lector__box">
                        <div class="banner-lector__title">{{$data->body}}</div>
                        <div class="banner-lector__name"> - {{$data->author}}</div>
                    </div>
                </a>
                @endforeach
            </div> -->

            <!-- 我們的服務 -->
            <!-- <h2 class="title">我們的服務</h2>
            <!-- banner-icon -->
            <!-- <div class="row px-2 px-lg-0">
                <a href="{{ url('/story') }}" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-04.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">生命故事</div>
                    <div class="banner-icon__subtitle">聚集各界感動人心的故事，探問生命課題，啟發善終思考。</div>
                </a>
                <a href="{{ url('/event') }}" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-05.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">課程與資源</div>
                    <div class="banner-icon__subtitle">各類專業課程、生命育樂活動及跨界創作專案，精彩登場。</div>
                </a>
                <a href="{{ url('/law') }}" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-06.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">法規政策</div>
                    <div class="banner-icon__subtitle">提供我國《病人自主權利法》最新動態及研究文獻。</div>
                </a>
                <a href="{{ url('/trend') }}" class="col-6 col-lg-3 banner-icon">
                    <div class="banner-icon__img">
                        <img src="{{ asset('assets/images/icon/icon-07.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="banner-icon__title">全球脈動</div>
                    <div class="banner-icon__subtitle">掌握各國病人自主權的發展現況，建立海外合作關係。</div>
                </a>
            </div> -->

            <!-- 最新消息 -->
            <h2 class="title">最新消息</h2>
            <div class="news-main">
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">中心動態</div>
                    <div class="news-main__title">【從電影《與神同行》談《病人自主權利法》 楊玉欣鼓勵思考如何好好活</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">中心動態</div>
                    <div class="news-main__title">《病人自主權利法》政策施行座談會</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">課程與活動動態</div>
                    <div class="news-main__title">「生命自主．掌握善終」 病人自主權利法政策施行第二次座談會</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">法規政策動態</div>
                    <div class="news-main__title">【新聞稿】「簽AD・有保庇」 病人自主權利法上路倒數三個月 善終不再只是想像</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">中心動態</div>
                    <div class="news-main__title">媒體報導 | 康健雜誌-圓滿人生，自己掌握！你一定要認識《病主法》</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">法規政策動態</div>
                    <div class="news-main__title">【新聞稿】「病主元年・全民好命運動」</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">國際動態</div>
                    <div class="news-main__title">心智能力受損評估 臨床實務交流會</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">課程與活動動態</div>
                    <div class="news-main__title">【新聞稿】「簽AD・有保庇」 病人自主權利法上路倒數三個月 善終不再只是想像</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">課程與活動動態</div>
                    <div class="news-main__title">【新聞稿】「簽AD・有保庇」 病人自主權利法上路倒數三個月 善終不再只是想像</div>
                </a>
                <a class="news-main__item">
                    <div class="news-main__date">2019/09/25</div>
                    <div class="news-main__category">課程與活動動態</div>
                    <div class="news-main__title">【新聞稿】「簽AD・有保庇」 病人自主權利法上路倒數三個月 善終不再只是想像</div>
                </a>
                <a class="news-main__more">
                    <span data-text="More">更多消息</span>
                </a>
            </div>

            @if($video != null)
            <!-- 影片上稿區  -->
            <div class="row tvcf-main">
                <div class="tvcf-main__circle-left"></div>
                <div class="col-12 col-lg-4 tvcf-main__title order-lg-2">
                    <h2>{{ $video->title }}</h2>
                </div>
                <div class="col-12 col-lg-8 tvcf-main__box order-lg-1">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe title="{{ $video->title }}" width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->link }}" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="tvcf-main__circle-right"></div>
            </div>
            @endif

            <!-- 合作單位 -->
            <h2 class="title">合作單位</h2>
            <!-- banner-sponsor -->
            <div class="row px-2 px-lg-0 banner-sponsor">
                @foreach($partner as $data)
                <div class="banner-sponsor__box">
                    @isset($data->link)
                        <a href="{{ $data->link }}" target="_blank">
                            <div class=" banner-sponsor__item">
                                <img src="/storage/{{$data->pic}}" alt="{{$data->title}}" class="img-fluid" title="{{$data->title}}" />
                            </div>
                            <p align="center">{{$data->title}}</p>
                        </a>
                    @endisset
                    @empty($data->link)
                        <div class=" banner-sponsor__item">
                            <img src="/storage/{{$data->pic}}" alt="{{$data->title}}" class="img-fluid" title="{{$data->title}}" />
                        </div>
                        <p align="center">{{$data->title}}</p>
                    @endempty
                </div>
                @endforeach
            </div>
        </main>
@endsection