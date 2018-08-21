@extends('frontend.master.master')
@section('main')
<!--main-->
<main class="container">
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
            <a href="{{ url('') }}" title="首頁">首頁</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/donate') }}" title="我要支持">我要支持</a>
        </li>
        <li class="breadcrumb-item active">捐款徵信</li>
    </ol>

    <div class="banner-single owl-carousel mb-0" title="分享您的生命故事" style="background: url({{ asset('assets/images/photo/banner-donate-inquiry.jpg') }}) no-repeat center;background-size: cover;">
        <h2 class="banner-single__title">捐款查詢</h2>
    </div>

    <section class="inquiry row">
        <div class="col-12 col-lg-6 order-1 order-lg-0">
            <div class="inquiry__info">
                <div>
                    若有任何捐款服務問題，
                    <br> 歡迎來信洽詢
                    <a href="mailto:service@parc.tw">service@parc.tw</a>，
                    <br> 我們將為您服務。
                    <br> 捐款資料更新至：
                    <span class="inquiry__update">{{ $last_updated->format('Y-m-d') }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 order-0 order-lg-1">
            <form method="POST" action="{{ url('/donate/inquiry')}}" enctype="multipart/form-data" class="inquiry__form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">姓名/公司行號名稱</label>
                    <input type="text" class="form-control" name="name" title="姓名/公司行號名稱" value="{{$cookie->name ? $cookie->name : "" }}" />
                </div>
                <div class="form-group">
                    <label for="email">電子信箱 </label>
                    <input type="email" class="form-control" name="email" title="電子信箱" value="{{$cookie->email ? $cookie->email : "" }}"  />
                </div>
                <div class="form-group">
                    <label for="startDate">捐款日期區間 </label>
                    <div class="form-row input-daterange align-items-center">
                        <div class="col">
                            <label for="startDate" class="d-none">起始日期</label>
                            <input type="text" name="date_start" class="form-control" placeholder="起始日期" title="起始日期" value="{{$cookie->date_start ? $cookie->date_start : "" }}" >
                        </div>
                        <i class="fa fa-minus"></i>
                        <div class="col">
                            <label for="endDate" class="d-none">結束日期</label>
                            <input type="text" name="date_end" class="form-control" placeholder="結束日期" title="結束日期" value="{{$cookie->date_end ? $cookie->date_end : "" }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="receipt">收據編號</label>
                    <input type="text" class="form-control" name="receipt_id" title="收據編號" value="{{$cookie->receipt_id ? $cookie->receipt_id : "" }}"  />
                </div>
                <button type="submit" class="inquiry__submit" title="查 詢">查 詢</button>
            </form>
        </div>
    </section>

    <section class="inquiry__result">
        <div class="inquiry__title">查詢結果</div>

        <div class="inquiry">
            <table class="css-table">
                <thead>
                    <tr>
                        <th>收據編號</th>
                        <th>捐款人姓名</th>
                        <th>捐款日期</th>
                        <th>捐款金額</th>
                    </tr>
                </thead>
                <tbody>
                    @if($donate_list != null)
                    @foreach($donate_list as $data)
                    <tr>
                        <td>
                            <label>　收據編號：</label>{{ $data->receipt_id }}</td>
                        <td>
                            <label>捐款人姓名：</label>{{ $data->name }}</td>
                        <td>
                            <label>　捐款日期：</label>{{ $data->transaction_time }}</td>
                        <td>
                            <label>　捐款金額：</label>${{ $data->amount }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</main>
<script src="{{ asset('assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap-datepicker/locales/bootstrap-datepicker.zh-TW.min.js') }}"></script>
<script src="{{ asset('assets/js/donate-inquiry.js') }}"></script>

@endsection