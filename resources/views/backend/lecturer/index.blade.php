@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">管理講師 Manage Lecturer</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/lecturer/order') }}"><strong>順序 Order</strong></a>
                            <a class="btn btn-success btn-xs" href="{{ url('backend/lecturer/create') }}"><strong>新增 Add</strong></a>
                        </div>
                        <div class="form-inline">
                            <form method="post" action="{{ url('/backend/lecturer') }}">
                                    {{ csrf_field() }}
                                <div class="form-group" >
                                <label class="control-label" style="color:white;">姓名 <br/>Name</label>
                                    <input name="name" type="text" class="form-control" value="{{$datas["cookie"]->name ? $datas["cookie"]->name : "" }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-xs" class="form-control">
                                        <strong>顯示</strong>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">順序<br/>Order</th>
                            <th style="width: 5%">有效<br/>Active</th>
                            <th>姓名<br/>Name</th>
                            <th>頭銜<br/>Title</th>
                            {{-- <th>內文<br/>Content</th> --}}
                            <th>圖片<br/>Picture</th>
                            {{-- <th>語言<br/>Language</th> --}}
                            <th>新增時間<br/>Created Time</th>
                            <th>更新時間<br/>Modify Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($datas["lecturer"] as $data)
                                <tr height="50">
                                    <td style="width: 5%">{{ $data->order }}</td>
                                    <td style="width: 5%">
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{ strip_tags($data->title) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($data->pic)
                                            <img src="/storage/{{$data->pic}}" width="100%" style="padding: 10px;">
                                        @else
                                            <p>無圖片<br/>No picture</p>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $data->lang() }}</td> --}}
                                    <td>{{ $data->created_at->format('Y-m-d h:m') }}</td>
                                    <td>{{ $data->updated_at->format('Y-m-d h:m') }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/lecturer/delete/'.$data->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/lecturer/edit/'.$data->id) }}">編輯</a>
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
                    {{$datas["lecturer"]->render()}}
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
