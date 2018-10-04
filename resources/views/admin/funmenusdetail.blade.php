@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">功能管理 Manage Functions</div>
                            <p><span class="fa fa-angle-right"></span>&nbsp;&nbsp;&nbsp;{{ $parentname[0]["MenuName"] }}</p>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-default btn-xs" href="{{ url('/backend/Funmenus/') }}"><strong>返回 Back</strong></a>
                            &nbsp;
                            <a class="btn btn-darkblue btn-xs" href="{{ url('/backend/Funmenus/'.$id.'/create') }}"><strong>新增 Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-primary">
                    <thead>
                        <tr>
                            <td>編號<br>#</td>
                            <td>功能名稱<br>Function Name</td>
                            <td>功能連結<br>Function Link</td>
                            <td>功能簡述<br>Function Description</td>
                            <td>有效<br>Valid</td>
                            <td>創造時間<br>Create Time</td>
                            <td>更新時間<br>Modify Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->FunName }}</td>
                                <td>{{ $data->FunLink }}</td>
                                <td>{{ $data->FunDesc }}</td>
                                <td>
                                    <input type="checkbox" disabled {{ ($data->Valid == 1) ? "checked" : "" }}>
                                </td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td style="text-align: right">
                                    <form method="post" action="{{ url('/backend/Funmenus/'.$id.'/delete/'.$data->id) }}">
                                        <a class="btn btn-xs btn-success" href="{{ url('/backend/Funmenus/'.$id.'/edit/'.$data->id) }}">編輯 Edit</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs"><strong>刪除 Delete</strong></button>
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
