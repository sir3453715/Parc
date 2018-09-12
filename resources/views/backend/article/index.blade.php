@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel-title">管理文章 Manage Articles</div>
                        </div>
                        <div class="col-lg-6" style="text-align: right">
                            <a class="btn btn-success btn-xs" href="{{ url('backend/article/'.Request::segment(3).'/create') }}"><strong>新增 Create</strong></a>
                        </div>
                        <div class="form-inline">
                            <form method="post" action="{{ url('/backend/article/'.Request::segment(3)) }}">
                                    {{ csrf_field() }}
                                    <div class="form-group" >
                                    <label class="control-label" style="color:white;">標題 <br/>Title</label>
                                        <input name="title"  type="text" class="form-control" value="">
                                    </div>
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">顯示於Banner <br/>Display on banner</label>
                                    <select name="display" class="form-control">
                                        <option value=""  {{ ($datas["cookie"]->display == "") ? 'selected' : ''  }}>不拘</option>
                                        <option value="1" {{ ($datas["cookie"]->display == "1") ? 'selected' : '' }}>是 Yes</option>
                                        <option value="0" {{ ($datas["cookie"]->display == "0") ? 'selected' : '' }}>否 No</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label" style="color:white;">次分類 <br/>Sub Category</label>
                                    <select name="sub_category" class="form-control">
                                        <option value=""  {{ ($datas["cookie"]->sub_category == "") ? 'selected' : ''  }}>不拘</option>
                                        @foreach($datas["sub_category"] as $data)
                                        <option value="{{ $data->id }}" {{ ($datas["cookie"]->sub_category == $data->id ) ? 'selected' : ''  }}>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">起始日期 <br/>Date Start</label>
                                    <input name="date_start"  type="date" class="form-control" value="{{$datas["cookie"]->date_start ? $datas["cookie"]->date_start : "" }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">結束日期 <br/>Date End</label>
                                    <input name="date_end" type="date" class="form-control" value="{{$datas["cookie"]->date_end ? $datas["cookie"]->date_end : "" }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-xs" class="form-control">
                                            <strong>顯示</strong>
                                        </button>
                                        <button type="submit" class="btn btn-danger btn-xs" class="form-control" form="delete" onclick="return confirm('是否確定刪除? Are you sure?')">
                                            <strong>刪除所選</strong>
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">選取 <br/>Choose</th>
                            <th style="width: 5%">有效否 <br/>Active</th>
                            <th style="width: 5%">顯示於Banner<br/>On Banner</th>
                            <th>標題<br/>Title</th>
                            <th>作者<br/>Author</th>
                            {{-- <th>內文<br/>Content</th> --}}
                            <th>分類<br/>Category</th>
                            <th>圖片<br/>Picture</th>
                            <th>新增時間<br/>Created Time</th>
                            <th>更新時間<br/>Modify Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" id="delete" action="{{ url('/backend/article/delete_selected') }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                            @foreach($datas["article"] as $data)
                                <tr>
                                    <td style="width: 5%">
                                        <input type="checkbox" form="delete" name="article_delete_id[]" value="{{$data->id}}">
                                    </td>
                                    <td style="width: 5%">
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td style="width: 5%">
                                        <input type="checkbox" disabled {{ ($data->display == 1) ? "checked" : "" }}>
                                    </td>
                                    <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$data->title}}
                                        </span>
                                    </td>
                                    <td><span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{ $data->author }}
                                        </span></td>
                                    {{-- <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{ strip_tags($data->body) }}
                                        </span>
                                    </td> --}}
                                    <td>
                                        {{ $data->sub_category()}}
                                        <br>
                                        {{ $data->extra_sub_category() }}
                                    </td>
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
                                        <form method="post" id="delete_one" action="{{ url('/backend/article/delete/'.$data->id) }}">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/article/'.Request::segment(3).'/edit/'.$data->id) }}">編輯</a>
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
                    {{$datas["article"]->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
