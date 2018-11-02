@extends('frontend.master.master')
@section('title')
<title>病人自主研究中心 | Patient Autonomy Research Center - 搜尋結果</title>
@endsection
@section('main')
<style>
        .gsc-webResult.gsc-result,
        .gsc-control-cse {
            background-color: transparent !important;
            border: none !important;
        }
    </style>
        <!--main-->
        <main class="container">

                <!--breadcrumb-->
                <ol class="breadcrumb container">
                    <li class="breadcrumb-item">
                        <a href="#C" title="中央內容區塊" id="AC" accesskey="C" name="C" tabindex="2">:::</a>
                        <a href="{{ url('')}}" title="首頁" tabindex="2">首頁</a>
                    </li>
                    <li class="breadcrumb-item active">搜尋結果</li>
                </ol>
    
                <div class="title-black mb-3">搜尋結果</div>
    
                <div class="row">
                    <div class="col-12">
                        <script>
                            (function() {
                                var cx = '017593280929212757294:y9-dkbcicm8';
                                var gcse = document.createElement('script');
                                gcse.type = 'text/javascript';
                                gcse.async = true;
                                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                                var s = document.getElementsByTagName('script')[0];
                                s.parentNode.insertBefore(gcse, s);
                            })();
                        </script>
                        <gcse:search></gcse:search>
                    </div>
                </div>
            </main>
@endsection