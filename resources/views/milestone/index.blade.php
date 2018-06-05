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
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/milestone/order') }}"><strong>Order</strong></a>
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/milestone/create') }}"><strong>Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>有效否</td>
                            <td>Order</td>
                            <td>Title</td>
                            <td>Body</td>
                            <td>Date</td>
                            <td>pic</td>
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
                                    <td>{{ $data->order }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->body }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->pic }}</td>
                                    <td>{{ $data->lang() }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/milestone/delete/'.$data->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/milestone/edit/'.$data->id) }}">Edit</a>
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
