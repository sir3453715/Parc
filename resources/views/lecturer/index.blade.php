@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">Manage Lecturer</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/lecturer/create') }}"><strong>Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>有效否</td>
                            <td>姓名</td>
                            <td>講師類別</td>
                            <td>類別說明</td>
                            <td>頭銜</td>
                            <td>內文</td>
                            <td>語言</td>
                            <td>Created Time</td>
                            <td>Modify Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($datas as $data)
                                <tr >
                                    <td>{{$data->id}}</td>
                                    <td>
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->category_detail }}</td>
                                    <td>{{ $data->job_title }}</td>
                                    <td>{{ $data->body }}</td>
                                    <td>{{ $data->lang() }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/lecturer/delete/'.$data->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/lecturer/edit/'.$data->id) }}">Edit</a>
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
    <script>
    </script>
@endsection
