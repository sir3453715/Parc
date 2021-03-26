@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel-title">活動花絮 分類管理 Manage Activity Terms</div>
                        </div>
                        <div class="col-lg-6" style="text-align: right">
                            <a class="btn btn-success btn-xs" href="{{route('event-term.create')}}"><strong>新增 Create</strong></a>
                        </div>
                        <div class="form-inline">
                            <form class="filter">
                                <div class="form-group" >
                                    <label class="control-label" style="color:white;">關鍵字 <br/>Keyword</label>
                                    <input name="keyword"  type="text" class="form-control" value="{{$keyword}}">
                                </div>
                                <div class="form-group" >
                                    <label class="control-label" style="color:white;">排序 <br/>Sort</label>
                                    <select id="sort" name="sort" class="form-control">
                                        <option value="DESC" {{($sort == 'DESC')?'selected':''}}>降序</option>
                                        <option value="ASC" {{($sort == 'ASC')?'selected':''}}>升序</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-xs" class="form-control">
                                    <strong>篩選</strong>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
{{--                            <th style="width: 5%">選取 <br/>Choose</th>--}}
                            <th>標題<br/>Title</th>
                            <th>排序<br/>Sort</th>
                            <th>新增時間<br/>Created Time</th>
                            <th>更新時間<br/>Modify Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($terms as $term)
                            <tr>
{{--                                <td style="width: 5%;padding: 25px">--}}
{{--                                    <input type="checkbox" form="delete" name="article_delete_id[]" value="{{$term->id}}">--}}
{{--                                </td>--}}
                                <td style="padding: 25px">{{$term->title}}</td>
                                <td>{{$term->sort}}</td>
                                <td>{{$term->created_at }}</td>
                                <td>{{$term->updated_at }}</td>
                                <td>
                                    <form method="post" id="delete_one" action="{{route('event-term.destroy',['id'=>$term->id])}}">
                                        <a class="btn btn-xs btn-success" href="{{route('event-term.edit',['id'=>$term->id])}}">編輯</a>
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
