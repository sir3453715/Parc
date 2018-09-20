@extends('admin.master')
@inject('indexKVPresenter','App\Presenters\indexKVPresenter')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-6">
                            @if(Request::segment(3)== "kv")
                                <div class="panel-title">管理首頁主視覺 Manage Key Visual</div>
                            @else
                                <div class="panel-title">管理首頁引言 Manage Quote</div>
                            @endif
                        </div>
                        <div class="col-lg-6" style="text-align: right">
                            <a class="btn btn-success btn-xs" href="{{ url('backend/indexKV/'.Request::segment(3).'/create') }}"><strong>新增 Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        {!! $indexKVPresenter->createTableHeader(Request::segment(3)) !!}
                    </thead>
                    <tbody>
                        {{ csrf_field() }}
                        @foreach($datas as $data)
                            <tr>
                                <td style="width: 5%">
                                    <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                </td>
                                <td>{{ $data->order }}</td>
                                @if(Request::segment(3)== "kv")
                                    <td>{{ $data->title }}</td>
                                @endif
                                @if(Request::segment(3)== "quote")
                                    <td>{{ $data->author }}</td>
                                @endif
                                <td class="text" style="max-width: 200px;">
                                    <span style="white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    display: inline-block;
                                    max-width: 100%;">
                                    {{ strip_tags($data->body) }}
                                    </span>
                                </td>
                                <td>
                                    @if($data->pic)
                                        <img src="/storage/{{$data->pic}}" width="100%" style="padding: 10px;">
                                    @else
                                        <p>無圖片 No picture</p>
                                    @endif
                                </td>
                                @if(Request::segment(3)== "kv")
                                <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{ strip_tags($data->link) }}
                                        </span>
                                    </td>                                
                                @endif
                                <td>{{ $data->lang() }}</td>
                                <td>{{ $data->created_at->format('Y-m-d h:m') }}</td>
                                <td>{{ $data->updated_at->format('Y-m-d h:m') }}</td>
                                <td style="text-align: right">
                                    <form method="post" action="{{ url('/backend/indexKV/delete/'.$data->id) }} ">
                                        {{-- <a class="btn btn-xs btn-primary" href="{{ url('/backend/article/'.$data->id) }}">Details</a> --}}
                                        <a class="btn btn-xs btn-success" href="{{ url('/backend/indexKV/'.Request::segment(3).'/edit/'.$data->id) }}">編輯</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('是否確定刪除? Are you sure?')"><strong>刪除</strong></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
