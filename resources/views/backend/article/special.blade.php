@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">精選特輯</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/article/'.Request::segment(3).'/create') }}"><strong>Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Active</td>
                            <td>Display</td>
                            <td>優先顯示</td>
                            <td>Title</td>
                            <td>Author</td>
                            <td>Body</td>
                            <td>Category</td>
                            <td>Picture</td>
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
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" disabled {{ ($data->display == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" disabled {{ ($data->order == 0) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $data->title }}</td>
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
                                        {{ $data->sub_category()}}
                                        <br>
                                        {{ $data->extra_sub_category() }}
                                    </td>
                                    <td>
                                        @if($data->pic)
                                            <img src="/storage/{{$data->pic}}" height="100">
                                        @else
                                            <p>no pic</p>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/article/delete/'.$data->id) }} ">
                                            {{-- <a class="btn btn-xs btn-primary" href="{{ url('/backend/article/'.$data->id) }}">Details</a> --}}
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/article/'.Request::segment(3).'/edit/'.$data->id) }}">Edit</a>
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
            </div>
        </div>
    </div>
@endsection
