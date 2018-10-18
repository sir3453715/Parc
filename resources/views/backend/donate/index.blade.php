@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading" style="background-color:#1d2939">
                        <div class="row">
                    <div class="col-md-6">
                        <div class="panel-title" >匯入Excel檔</div>
                        <form method="POST" action="/backend/donate/create" enctype="multipart/form-data">
                            {{--create a token for laravel security check--}}
                            {{csrf_field()}}
                            {{-- Excel Upload --}}
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="excel" id="excel">
                            </div>
                            <button type="submit" class="btn btn-success btn-xs"><strong>匯入 Import</strong></button>
                        </form>
                    </div>
                        </div>
                </div>
            </div>
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">Manage Donation</div>
                        </div>
                        {{-- <div class="form-inline" class="col-md-6" style="text-align: right">
                                <form method="POST" action="/backend/donate/create" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="excel" id="excel">
                                    </div>
                                    <button type="submit" class="btn btn-darkblue btn-xs"><strong>Upload</strong></button>
                                </form>
                        </div> --}}
                        <div class="form-inline">
                                <form method="post" id="show" action="{{ url('/backend/donate') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group" >
                                        
                                        <label class="control-label" style="color:white;">收據編號<br/>Receipt ID</label>
                                        <input name="receipt_id"  type="text" class="form-control" value="{{$cookie->receipt_id ? $cookie->receipt_id : "" }}">
                                        
                                        <label class="control-label" style="color:white;">姓名<br/>Name</label>
                                        <input name="name"  type="text" class="form-control" value="{{$cookie->name ? $cookie->name : "" }}">
                                        
                                        <label class="control-label" style="color:white;">開始日期<br/>Date Start</label>
                                        <input name="date_start"  type="date" class="form-control" value="{{$cookie->date_start ? $cookie->date_start : "" }}">
                                        <label class="control-label" style="color:white;">結束日期<br/>Date End</label>
                                        <input name="date_end" type="date" class="form-control" value="{{$cookie->date_end ? $cookie->date_end : "" }}">
                                    </div>
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-danger btn-xs" class="form-control">
                                            <strong>篩選</strong>
                                        </button>
                                        {{-- @if(!$cookie->show_all)
                                            <button type="submit" form="show" name="show_all" id="show_all" value="something" class="btn btn-success btn-xs"><strong>顯示一頁</strong></button>
                                        @else
                                            <button type="submit" form="show" name="show_all" id="show_all" value="" class="btn btn-success btn-xs"><strong>分頁</strong></button>
                                        @endif --}}
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>姓名<br/>Name</th>
                            <th>電子郵件<br/>Email</th>
                            <th>電話<br/>Phone</th>
                            <th>入款日期<br/>Transaction Date</th>
                            <th>收據編號<br/>Receipt ID</th>
                            <th>金額<br/>Amount</th>
                            <th>建立日期<br/>Created Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr height="50">
                                <td>{{ $data->name }}</td>
                                <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$data->email}}
                                        </span>
                                </td>
                                <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$data->phone}}
                                        </span>
                                </td>
                                <td>{{ $data->transaction_time }}</td>
                                <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$data->receipt_id}}
                                        </span>
                                </td>
                                <td>{{ $data->amount }}</td>
                                <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$data->created_at}}
                                        </span>
                                </td>
                                <td style="text-align: right">
                                    <form method="post" action="{{ url('/backend/donate/delete/'.$data->id) }} ">
                                        <a class="btn btn-xs btn-success" href="{{ url('/backend/donate/edit/'.$data->id) }}">編輯</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('是否確定刪除? Are you sure?')"><strong>刪除</strong></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12 text-center no-margin">
                        {{$datas->appends(Request::except('_token'))->render()}}
                        {{-- @if(!$cookie->show_all)
                            {{$datas->render()}}
                            <button type="submit" form="show" name="show_all" id="show_all" value="something" class="btn btn-success btn-xs" <strong>顯示一頁</strong></button>
                        @else
                            <button type="submit" form="show" name="show_all" id="show_all" value="" class="btn btn-success btn-xs" <strong>分頁</strong></button>
                        @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
