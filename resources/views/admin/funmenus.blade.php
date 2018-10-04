@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">功能管理 Manage Functions</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/Funmenus/create') }}"><strong>新增 Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>編號<br>no</td>
                            <td>圖示<br>Icon</td>
                            <td>名稱<br>Menu Name</td>
                            <td>有效<br>Valid</td>
                            <td>順序<br>Orders</td>
                            <td>創造時間<br>Create Time</td>
                            <td>更新時間<br>Modify Time</td>
                            <td>操作<br>Operation</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td><i class='{{ $data->icon }}'></i></td>
                                <td>{{ $data->MenuName }}</td>
                                <td>
                                    <input type="checkbox" disabled {{ ($data->Valid == 1) ? "checked" : "" }}>
                                </td>
                                <td>{{ $data->Corder }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td style="text-align: right">
                                    <form method="post" action="{{ url('/backend/Funmenus/delete/'.$data->id) }}">
                                        <a class="btn btn-xs btn-primary" href="{{ url('/backend/Funmenus/'.$data->id) }}">內容 Details</a>
                                        <a class="btn btn-xs btn-success" href="{{ url('/backend/Funmenus/edit/'.$data->id) }}">編輯 Edit</a>
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
