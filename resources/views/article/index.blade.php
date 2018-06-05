@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">Manage Articles</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/article/create') }}"><strong>Add</strong></a>
                        </div>
                        <div class="form-inline">
                                <form method="post" action="{{ url('/backend/article') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group" >
                                        <label class="control-label" style="color:white;">選擇主分類</label>
                                        <select name="category" class="form-control" id="filter_value">
                                            @if(!empty($datas["cookie"]["category"]))
                                                <option value="{{$datas["cookie"]["category"]}}" hidden>{{$datas["cookie"]->session()->get('category_name')}}</option>
                                            @endif
                                            <option value="0">全部</option>
                                            @foreach($datas["category"] as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                            <label class="control-label" style="color:white;">Title</label>
                                            <input name="title"  type="text" class="form-control" value="">

                                            <label class="control-label" style="color:white;">Date Start</label>
                                            <input name="date_start"  type="date" class="form-control" value="">
                                            ~
                                            <label class="control-label" style="color:white;">Date End</label>
                                            <input name="date_end" type="date" class="form-control" value="">
                                    </div>
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-danger btn-xs" class="form-control">
                                            <strong>顯示</strong>
                                        </button>
                                        <button type="submit" class="btn btn-danger btn-xs" class="form-control" form="delete" onclick="return confirm('Are you sure?')">
                                            <strong>刪除所選</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td></td>
                            <td>#</td>
                            <td>Active</td>
                            <td>Title</td>
                            <td>Body</td>
                            <td>Category</td>
                            <td>Language</td>
                            <td>Create Time</td>
                            <td>Modify Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" id="delete" action="{{ url('/backend/article/delete_selected') }}">
                            {{ csrf_field() }}
                            @foreach($datas["article"] as $data)
                                <tr>
                                    <td>
                                        <div class="form-group" >
                                            <input type="checkbox" form="delete" name="article_delete_id[]" value="{{$data->id}}">
                                        </div>
                                    </td>
                                    <td>{{ $data->id }}</td>
                                    <td>
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->body }}</td>
                                    <td>
                                        {{ $data->category() }}
                                        {{ $data->sub_category()}}
                                        {{ $data->extra_sub_category() }}
                                    </td>
                                    <td>{{ $data->lang() }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/article/delete/'.$data->id) }} ">
                                            <a class="btn btn-xs btn-primary" href="{{ url('/backend/article/'.$data->id) }}">Details</a>
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/article/edit/'.$data->id) }}">Edit</a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
                <div class="col-md-12 text-center no-margin">
                    {{$datas["article"]->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
