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
                            <a class="btn btn-success btn-xs" href="{{route('love-event.create')}}"><strong>新增 Create</strong></a>
                        </div>
                        <div class="form-inline">
                            <form method="GET" >
                                <div class="form-group" >
                                    <label class="control-label" style="color:white;">關鍵字 <br/>Keyword</label>
                                    <input name="keyword"  type="text" class="form-control" value="{{isset($_GET['keyword'])?$_GET['keyword']:''}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">分類 <br/>Sub Category</label>
                                    <select name="term" class="form-control">
                                        <option value=""></option>
                                        <optgroup label="最新消息">
                                            <option value="1" {{ (isset($_GET['term']) && $_GET['term'] == 1 )?'selected':''}}>最新消息</option>
                                        </optgroup>
                                        <optgroup label="報名資訊">
                                            <option value="2" {{ (isset($_GET['term']) && $_GET['term'] == 2 )?'selected':''}}>報名資訊</option>
                                        </optgroup>
                                        <optgroup label="活動花絮">
                                            @foreach($terms as $term)
                                                <option value="{{$term->id}}" {{ (isset($_GET['term']) && $_GET['term'] == $term->id )?'selected':''}}>{{$term->title}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">起始日期 <br/>Date Start</label>
                                    <input name="date_start"  type="date" class="form-control" value="{{isset($_GET['date_start'])?$_GET['date_start']:''}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">結束日期 <br/>Date End</label>
                                    <input name="date_end" type="date" class="form-control" value="{{isset($_GET['date_end'])?$_GET['date_end']:''}}">
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
                            <th >排序 <br/>sort</th>
                            <th>標題<br/>Title</th>
                            <th>作者<br/>Author</th>
                            <th>分類<br/>Category</th>
                            <th>圖片<br/>Picture</th>
                            <th>新增時間<br/>Created Time</th>
                            <th>更新時間<br/>Modify Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <form method="post" id="delete" action="{{ route('love-event.delete-selected') }}">
                                {{ csrf_field() }}
                            </form>
                            @foreach($events as $event)
                                <tr>
                                    <td style="width: 5%">
                                        <input type="checkbox" form="delete" name="delete_ids[]" value="{{$event->id}}">
                                    </td>
                                    <td style="width: 5%">
                                        <input type="checkbox" disabled {{ ($event->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$event->sort}}
                                        </span>
                                    </td>
                                    <td class="text" style="max-width: 200px;">
                                        <span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{$event->title}}
                                        </span>
                                    </td>
                                    <td><span style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: inline-block;
                                        max-width: 100%;">
                                        {{ $event->author }}
                                        </span></td>
                                    <td>
                                        {!! $event->EventTermsTitle() !!}
                                    </td>
                                    <td>
                                        @if($event->pic)
                                            <img src="/storage/{{$event->pic}}" width="100%" style="padding: 10px;">
                                        @else
                                            <p>無圖片<br/>No picture</p>
                                        @endif
                                    </td>
                                    <td>{{ $event->created_at->format('Y-m-d h:m') }}</td>
                                    <td>{{ $event->updated_at->format('Y-m-d h:m') }}</td>
                                    <td style="text-align: right">
                                        <form method="post" id="delete_one" action="{{route('love-event.destroy',['id'=>$event->id])}}">
                                            <a class="btn btn-xs btn-success" href="{{route('love-event.edit',['id'=>$event->id])}}">編輯</a>
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
                    {{$events->appends(Request::except('_token'))->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
