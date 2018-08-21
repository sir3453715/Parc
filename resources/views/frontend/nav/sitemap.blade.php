@extends('frontend.master.master')
@section('main')
<!--main-->
<main class="container">
<!--breadcrumb-->
<ol class="breadcrumb container">
    <li class="breadcrumb-item">
        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
        <a href="{{ url('') }}" title="首頁">首頁</a>
    </li>
    <li class="breadcrumb-item active">網站導覽</li>
</ol>


<section class="sitemap">
    <div class="title-black">網站導覽
        <p>本網站依無障礙網頁設計原則而建置，網站的主要樣版內容
            <br>分為三個大區塊 (皆設有定位點)：</p>
    </div>

    <div class="container row">
        <a href="#" class="col-12 sitemap__item">
            <i class="fa fa-circle"></i> Alt+U　上方定位點(U) - 上方導覽連結區。</a>
        <a href="#" class="col-12 sitemap__item">
            <i class="fa fa-circle"></i> Alt+C　內容區塊定位點(C) - 此區塊呈現各網頁的網頁內容。</a>
        <a href="#" class="col-12 sitemap__item">
            <i class="fa fa-circle"></i> Alt+S　網站搜尋(S) - 網站搜尋。</a>
        <a href="#" class="col-12 sitemap__item">
            <i class="fa fa-circle"></i> Alt+Z　下方區塊定位點(Z) - 下方功能區塊。</a>
        <a href="{{ url('/story/special') }}" class="col-12 sitemap__title">1.生命故事</a>
        <a href="{{ url('/story/special') }}" class="col-6 col-lg-3 sitemap__item">1-1 精選特輯</a>
        <a href="{{ url('/story/love') }}" class="col-6 col-lg-3 sitemap__item">1-2 親愛劇場</a>
        <a href="{{ url('/story/doctor') }}" class="col-6 col-lg-3 sitemap__item">1-3 白袍診間</a>
        <a href="{{ url('/story/life') }}" class="col-6 col-lg-3 sitemap__item">1-4 權威觀點</a>
        <a href="{{ url('/story/expert') }}" class="col-6 col-lg-3 sitemap__item">1-5 私房故事</a>

        <a href="{{ url('/event') }}" class="col-12 sitemap__title">2.課程與活動</a>
        <a href="{{ url('/event/course') }}" class="col-6 col-lg-3 sitemap__item">2-1 專業課程</a>
        {{-- spit out course 2,6 --}}
        @foreach($event_course_list as $data)
        <a href="{{ url('/event/course/'.$data->en_name) }}" class="col-6 col-lg-3 sitemap__item">2-1-{{$loop->iteration}} {{ $data->name }}</a>
        @endforeach
        <a href="{{ url('/event/lecturer') }}" class="col-6 col-lg-3 sitemap__item">2-2 講師服務</a>
        <a href="{{ url('/event/video') }}" class="col-6 col-lg-3 sitemap__item">2-3 線上影音課程</a>
        {{-- spit out video 2,8 --}}
        @foreach($event_video_list as $data)
        <a href="{{ url('/event/video/'.$data->en_name) }}" class="col-6 col-lg-3 sitemap__item">2-3-{{$loop->iteration}} {{ $data->name }}</a>
        @endforeach
        <a href="{{ url('/event/lohas') }}" class="col-6 col-lg-3 sitemap__item">2-4 生命樂活</a>
        {{-- spit out lohas 2,9 --}}
        @foreach($event_lohas_list as $data)
        <a href="{{ url('/event/lohas/'.$data->en_name) }}" class="col-6 col-lg-3 sitemap__item">2-4-{{$loop->iteration}} {{ $data->name }}</a>
        @endforeach

        <a href="{{ url('/law') }}" class="col-12 sitemap__title">3.法規政策</a>
        <a href="{{ url('/law/act') }}" class="col-6 col-lg-3 sitemap__item">3-1 法規實務</a>
        <a href="{{ url('/law/policy') }}" class="col-6 col-lg-3 sitemap__item">3-2 政策研究</a>
        {{-- spit out policy 3,11 --}}
        @foreach($event_lohas_list as $data)
        <a href="{{ url('/law/policy/'.$data->en_name) }}" class="col-6 col-lg-3 sitemap__item">3-2-{{$loop->iteration}} {{ $data->name }}</a>
        @endforeach

        <a href="{{ url('/trend') }}" class="col-12 sitemap__title">4.全球脈動</a>
        <a href="{{ url('/trend/international') }}" class="col-6 col-lg-3 sitemap__item">4-1 國際新知</a>
        <a href="{{ url('/trend/exchange') }}" class="col-6 col-lg-3 sitemap__item">4-2 合作交流</a>
        <a href="{{ url('/trend/ngo') }}" class="col-6 col-lg-3 sitemap__item">4-3 國際NGO</a>
        <a href="{{ url('/trend/world') }}" class="col-6 col-lg-3 sitemap__item">4-4 世界趨勢</a>

        <a href="{{ url('/news/center') }}" class="col-12 sitemap__title">5.最新消息</a>
        <a href="{{ url('/news/center') }}" class="col-6 col-lg-3 sitemap__item">5-1 中心動態</a>
        <a href="{{ url('/news/law') }}" class="col-6 col-lg-3 sitemap__item">5-2 法規政策動態</a>
        <a href="{{ url('/news/event') }}" class="col-6 col-lg-3 sitemap__item">5-3 課程與活動動態</a>
        <a href="{{ url('/news/international') }}" class="col-6 col-lg-3 sitemap__item">5-4 國際動態</a>

        <a href="{{ url('/about') }}" class="col-12 sitemap__title">6.關於我們</a>
        <a href="{{ url('/about') }}" class="col-6 col-lg-3 sitemap__item">6-1 認識病主</a>
        <a href="{{ url('/about/ceo') }}" class="col-6 col-lg-3 sitemap__item">6-2 執行長的話</a>
        <a href="{{ url('/about/organization') }}" class="col-6 col-lg-3 sitemap__item">6-3 組織簡介</a>
        <a href="{{ url('/about/history') }}" class="col-6 col-lg-3 sitemap__item">6-4 大事紀</a>

        <a href="{{ url('/exercise') }}" class="col-12 sitemap__title">7.行使權利</a>

        <a href="{{ url('/faq') }}" class="col-12 sitemap__title">8.常見問題 </a>

        <a href="{{ url('/donate') }}" class="col-12 sitemap__title">9.我要支持 </a>
        <a href="#" class="col-6 col-lg-3 sitemap__item">9-1 我要捐款</a>
        <a href="#" class="col-6 col-lg-3 sitemap__item">9-2 成為志工</a>
        <a href="{{ url('/donate/story') }}" class="col-6 col-lg-3 sitemap__item">9-3 分享故事</a>
        <a href="#" class="col-6 col-lg-3 sitemap__item">9-4 成為會員</a>
        <a href="{{ url('/donate/inquiry') }}" class="col-6 col-lg-3 sitemap__item">9-5 捐款徵信</a>

        <a href="#" class="col-12 sitemap__title">追蹤我們</a>
        <a href="#" class="col-6 col-lg-3 sitemap__item">
            <img src="{{ asset('assets/images/icon/btn-facebook.png') }}" alt="facebook" />
        </a>
        <a href="#" class="col-6 col-lg-3 sitemap__item">
            <img src="{{ asset('assets/images/icon/btn-line.png') }}" alt="line" />
        </a>
        <a href="#" class="col-6 col-lg-3 sitemap__item">
            <img src="{{ asset('assets/images/icon/btn-youtube.png') }}" alt="youtube" />
        </a>
    </div>
</section>

</main>
@endsection