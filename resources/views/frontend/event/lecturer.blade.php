@extends('frontend.master.master')
@section('main')
<!--main-->

<main>
    <div class="container">
        @if ( count( $errors ) > 0 )
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
        </div>
        @endif
        <!--breadcrumb-->
        <ol class="breadcrumb container">
            <li class="breadcrumb-item">
                <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
                <a href="{{ url('')}}" title="首頁">首頁</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/event')}}" title="課程與活動">課程與活動</a>
            </li>
            <li class="breadcrumb-item active">講師服務</li>
        </ol>

        <!-- banner-main -->
        <div class="banner-single owl-carousel px-0" title="國際新知" style="background: url({{ asset('assets/images/photo/banner-lecturer-1.jpg') }}) no-repeat center;background-size: cover;">
            <h2 class="banner-single__title">講師服務</h2>
        </div>
        <p class="text-center">本中心致力於病人自主權教育推廣，來自各領域的講師都具備專業資格及認證，
            <br> 擁有豐富的病人自主權知識及宣講經驗，善於將理論融入實際情境。
            <br> 透過講師經驗分享，您不只能夠瞭解自身權利，更有機會從此刻起，開始將病人自主權實踐於生活中！
        </p>

        <h2 class="text-center mt-5">講師陣容</h2>

        <div class="row">
            @foreach($lecturer_list as $data)
            <div class="col-12 col-lg-4">
                <a class="item photo-x6__item" title="{{ $data->name }}">
                    <div class="photo-x6__box">
                        <div class="photo-x6__img" alt="{{ $data->name }}" style="background: url(/storage/{{$data->pic}}) no-repeat center; background-size: cover;"></div>
                    </div>
                    <div class="photo-x6__title">{{ $data->name }}</div>
                    <div class="photo-x6__text">{{ $data->title }}</div>
                </a>
            </div>
            @endforeach
        </div>
        <!-- pagination -->
        <nav>
            {{$lecturer_list->links()}}
        </nav>
    </div>
    <section class="service-lecturer">
        <div class="container text-center">
            <h2>哪些時候，您需要講師服務？</h2>
            <div class="row">
                <div class="col">
                    <div class="service-lecturer__icon">
                        <img src="{{ asset('assets/images/icon/icon-event-1.png') }}" class="img-fluid" alt="企業進修" />
                    </div>
                    <div class="service-lecturer__title">企業進修</div>
                </div>
                <div class="col">
                    <div class="service-lecturer__icon">
                        <img src="{{ asset('assets/images/icon/icon-event-2.png') }}" class="img-fluid" alt="醫療機構內訓" />
                    </div>
                    <div class="service-lecturer__title">醫療機構內訓</div>
                </div>
                <div class="col">
                    <div class="service-lecturer__icon">
                        <img src="{{ asset('assets/images/icon/icon-event-3.png') }}" class="img-fluid" alt="社區推廣" />
                    </div>
                    <div class="service-lecturer__title">社區推廣</div>
                </div>
                <div class="col">
                    <div class="service-lecturer__icon">
                        <img src="{{ asset('assets/images/icon/icon-event-4.png') }}" class="img-fluid" alt="校園生命教育" />
                    </div>
                    <div class="service-lecturer__title">校園生命教育</div>
                </div>
                <div class="col">
                    <div class="service-lecturer__icon">
                        <img src="{{ asset('assets/images/icon/icon-event-5.png') }}" class="img-fluid" alt="志工培訓" />
                    </div>
                    <div class="service-lecturer__title">志工培訓</div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-contact">
        <div class="container">

            <h3 class="text-center">歡迎各界機構單位來信邀約，
                <br class="d-lg-none">我們將瞭解您的需求，為您媒合專業講師。
                <br> 如您需要開辦「核心講師認證課程」並且為30人以上之團體，
                <br class="d-lg-none">亦歡迎來信洽詢！</h3>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="service-contact__title-box">
                        <div class="service-contact__title">
                            留下需求與聯絡方式，
                            <br>讓我們即刻為您服務！
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <form method="POST" action="{{ url('/event/lecturer')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="service-contact__form">
                            <label for="name" class="service-contact__form-title">聯絡人姓名</label>
                            <input type="text" name="name" class="service-contact__form-control form-control" title="聯絡人姓名" />
                            <label for="email" class="service-contact__form-title">電子信箱</label>
                            <input type="email" name="email" class="service-contact__form-control form-control" title="電子信箱" />
                            <label for="phone" class="service-contact__form-title">電話號碼</label>
                            <input type="tel" name="phone" class="service-contact__form-control form-control" title="電話號碼" />
                            <label for="body" class="service-contact__form-title">需求簡介</label>
                            <textarea rows="6" name="body" class="service-contact__form-control  form-control" title="需求簡介"></textarea>
                            {{-- <div class="service-contact__form-btn" title="送 出">送 出</div> --}}
                            <button type="submit" class="service-contact__form-btn">送 出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
    
@endsection