@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">管理常見問題 Manage FAQ</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/faq/order') }}"><strong>順序 Order</strong></a>
                            <a class="btn btn-success btn-xs" href="{{ url('backend/faq/create') }}"><strong>新增 Add</strong></a>
                        </div>
                    </div>
                </div>
                <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">順序<br/>Order</th>
                            <th style="width: 5%">有效<br/>Active</th>
                            <th style="width: 30%">問題<br/>Question</th>
                            <th style="width: 30%">答案<br/>Answer</th>
                            {{-- <th>語言<br/>Languages</th> --}}
                            <th>新增時間<br/>Created Time</th>
                            <th>更新時間<br/>Modify Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($datas as $data)
                                <tr height="50">
                                    <td style="width: 5%">{{ $data->order }}</td>
                                    <td style="width: 5%">
                                        <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td style="width: 30%" class="text" style="max-width: 200px;">
                                            <span style="white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: inline-block;
                                            max-width: 100%;">
                                            {{ strip_tags($data->question) }}
                                            </span>
                                    </td>
                                    <td style="width: 30%" class="text" style="max-width: 200px;">
                                            <span style="white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: inline-block;
                                            max-width: 100%;">
                                            {{ strip_tags($data->answer) }}
                                            </span>
                                    </td>
                                    {{-- <td>{{ $data->question }}</td>
                                    <td>{{ $data->answer }}</td> --}}
                                    {{-- <td>{{ $data->lang() }}</td> --}}
                                    <td>{{ $data->created_at->format('Y-m-d h:m') }}</td>
                                    <td>{{ $data->updated_at->format('Y-m-d h:m') }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/faq/delete/'.$data->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/faq/edit/'.$data->id) }}">編輯</a>
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
    <script>
    </script>
@endsection
