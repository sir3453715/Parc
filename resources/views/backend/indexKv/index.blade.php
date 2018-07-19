@extends('admin.master')
@inject('indexKVPresenter','App\Presenters\indexKVPresenter')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            @if(Request::segment(3)== "kv")
                                <div class="panel-title">Manage Key Visual</div>
                            @else
                                <div class="panel-title">Manage Quote</div>
                            @endif
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/indexKV/'.Request::segment(3).'/create') }}"><strong>Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        {!! $indexKVPresenter->createTableHeader(Request::segment(3)) !!}
                    </thead>
                    <tbody>
                        {{ csrf_field() }}
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>
                                    <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                </td>
                                @if(Request::segment(3)== "kv")
                                    <td>{{ $data->title }}</td>
                                @endif
                                <td>{{ $data->author }}</td>
                                <td style="
                                display: block;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 200px;
                                max-height: 200px;
                                {{-- word-wrap: break-word; --}}
                                ">
                                    {{ strip_tags($data->body) }}
                                </td>
                                <td>
                                    @if($data->pic)
                                        <img src="/storage/{{$data->pic}}" height="100">
                                    @else
                                        <p>no pic</p>
                                    @endif
                                </td>
                                @if(Request::segment(3)== "kv")
                                    <td>{{ $data->link }}</td>
                                @endif
                                <td>{{ $data->order }}</td>
                                <td>{{ $data->lang() }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td style="text-align: right">
                                    <form method="post" action="{{ url('/backend/indexKV/delete/'.$data->id) }} ">
                                        {{-- <a class="btn btn-xs btn-primary" href="{{ url('/backend/article/'.$data->id) }}">Details</a> --}}
                                        <a class="btn btn-xs btn-success" href="{{ url('/backend/indexKV/'.Request::segment(3).'/edit/'.$data->id) }}">Edit</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
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
