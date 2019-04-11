@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">管理合作伙伴 Manage Partners</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/partner/order') }}"><strong>順序 Order</strong></a>
                            <a class="btn btn-success btn-xs" href="{{ url('backend/partner/create') }}"><strong>新增 Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">順序<br/>Order</th>
                            <th style="width: 5%">有效<br/>Active</th>
                            <th>標題<br/>Title</th>
                            <th>連結<br/>Link</th>
                            <th>圖片<br/>Picture</th>
                            <th>新增時間<br/>Created Time</th>
                            <th>修改時間<br/>Modify Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($datas as $data)
                                <tr >
                                    <td style="width: 5%">{{ $data->order }}</td>
                                    <td style="width: 5%">
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->link }}</td>
                                    <td>
                                        @if($data->pic)
                                            <img src="/storage/{{$data->pic}}" width="100%" style="padding: 10px;">
                                        @else
                                            <p>無圖片<br/>No picture</p>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at->format('Y-m-d h:m') }}</td>
                                    <td>{{ $data->updated_at->format('Y-m-d h:m') }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/partner/delete/'.$data->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/partner/edit/'.$data->id) }}">編輯</a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>刪除</strong></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
