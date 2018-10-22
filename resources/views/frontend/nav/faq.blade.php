@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 常見問題</title>
@endsection
@section('main')
<!--main-->
<main class="container">
        <!--breadcrumb-->
        <ol class="breadcrumb container">
            <li class="breadcrumb-item">
                <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C">:::</a>
                <a href="{{ url('') }}" title="首頁">首頁</a>
            </li>
            <li class="breadcrumb-item active">常見問題</li>
        </ol>
        <section>
            <div class="title-pattern">常見問題精選集</div>

            <div id="faq" class="faq">
                @foreach($faq_list as $data)
                <div class="faq__item">
                <a href="#a{{$loop->iteration}}" data-toggle="collapse" class="faq__q">
                <span>Q{{$loop->iteration}}.</span>{!! $data->question !!}</a>
                    <div id="a{{$loop->iteration}}" class="faq__a collapse" data-parent="#faq">
                        {!! $data->answer !!}
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    </main>
@endsection