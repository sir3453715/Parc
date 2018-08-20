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
                            <button type="submit" class="btn btn-darkblue btn-xs"><strong>匯入</strong></button>
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
                                        
                                        <label class="control-label" style="color:white;">收據編號</label>
                                        <input name="receipt_id"  type="text" class="form-control" value="{{$cookie->receipt_id ? $cookie->receipt_id : "" }}">
                                        
                                        <label class="control-label" style="color:white;">姓名</label>
                                        <input name="name"  type="text" class="form-control" value="{{$cookie->name ? $cookie->name : "" }}">
                                        
                                        <label class="control-label" style="color:white;">開始日期</label>
                                        <input name="date_start"  type="date" class="form-control" value="{{$cookie->date_start ? $cookie->date_start : "" }}">
                                        ~
                                        <label class="control-label" style="color:white;">結束日期</label>
                                        <input name="date_end" type="date" class="form-control" value="{{$cookie->date_end ? $cookie->date_end : "" }}">
                                    </div>
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-danger btn-xs" class="form-control">
                                            <strong>篩選</strong>
                                        </button>
                                        @if(!$cookie->show_all)
                                            <button type="submit" form="show" name="show_all" id="show_all" value="something" class="btn btn-success btn-xs"><strong>顯示一頁</strong></button>
                                        @else
                                            <button type="submit" form="show" name="show_all" id="show_all" value="" class="btn btn-success btn-xs"><strong>分頁</strong></button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>聯絡人姓名</td>
                            <td>電子郵件</td>
                            <td>電話</td>
                            <td>入款日期</td>
                            <td>收據編號</td>
                            <td>金額</td>
                            <td>建立日期</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->transaction_time }}</td>
                                <td>{{ $data->receipt_id }}</td>
                                <td>{{ $data->amount }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td style="text-align: right">
                                    <form method="post" action="{{ url('/backend/donate/delete/'.$data->id) }} ">
                                        <a class="btn btn-xs btn-success" href="{{ url('/backend/donate/edit/'.$data->id) }}">Edit</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12 text-center no-margin">
                        @if(!$cookie->show_all)
                            {{$datas->render()}}
                            <button type="submit" form="show" name="show_all" id="show_all" value="something" class="btn btn-success btn-xs" <strong>顯示一頁</strong></button>
                        @else
                            <button type="submit" form="show" name="show_all" id="show_all" value="" class="btn btn-success btn-xs" <strong>分頁</strong></button>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
