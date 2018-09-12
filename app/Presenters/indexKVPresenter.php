<?php
namespace App\Presenters;

class indexKVPresenter{
    public function createTableHeader($type){
        if($type == 'kv'){
            return 
            '
            <tr>
                <th style="width: 5%">Active</th>
                <th style="width: 5%">Order</th>
                <th>標題<br/>Title</th>
                <th>作者<br/>Author</th>
                <th>內文<br/>Content</th>
                <th>圖片<br/>Picture</th>
                <th style="width: 20%">連結<br/>Link</th>
                <th>語言<br/>Language</th>
                <th>新增時間<br/>Create Time</th>
                <th>更新時間<br/>Modify Time</th>
                <th></th>
            </tr>
            ';
        }
        else{
            return 
            '
            <th style="width: 5%">有效<br/>Active</th>
            <th style="width: 5%">順序<br/>Order</th>
            <th>作者<br/>Author</th>
            <th>內文<br/>Content</th>
            <th>圖片<br/>Picture</th>
            <th>語言<br/>Language</th>
            <th>新增時間<br/>Create Time</th>
            <th>更新時間<br/>Modify Time</th>
            <th></th>
            ';
        }
    }
    public function createTableContent($type){
        if($type == 'kv'){
            '
            <tr>
                <td>{{ $data->id }}</td>
                <td>
                    <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
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
                    @if($data->pic)
                        <img src="/storage/{{$data->pic}}" height="100">
                    @else
                        <p>no pic</p>
                    @endif
                </td>
                <td>{{ $data->link }}</td>
                <td>{{ $data->order }}</td>
                <td>{{ $data->lang() }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
                <td style="text-align: right">
                    <form method="post" action="{{ url("/backend/article/delete/".$data->id) }} ">
                        {{-- <a class="btn btn-xs btn-primary" href="{{ url("/backend/article/".$data->id) }}">Details</a> --}}
                        <a class="btn btn-xs btn-success" href="{{ url("/backend/article/".Request::segment(3)."/edit/".$data->id) }}">Edit</a>
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm("Are you sure?")"><strong>Delete</strong></button>
                    </form>
                </td>
            </tr>
            ';
        }
        else{
            // '
            // <tr>
            //     <td>{{ $data->id }}</td>
            //     <td>
            //         <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
            //     </td>
            //     <td>{{ $data->author }}</td>
            //     <td style="
            //     display: block;
            //     white-space: nowrap;
            //     overflow: hidden;
            //     text-overflow: ellipsis;
            //     max-width: 200px;
            //     max-height: 200px;
            //     {{-- word-wrap: break-word; --}}
            //     ">
            //         {{ strip_tags($data->body) }}
            //     </td>
            //     <td>
            //         @if($data->pic)
            //             <img src="/storage/{{$data->pic}}" height="100">
            //         @else
            //             <p>no pic</p>
            //         @endif
            //     </td>
            //     <td>{{ $data->order }}</td>
            //     <td>{{ $data->lang() }}</td>
            //     <td>{{ $data->created_at }}</td>
            //     <td>{{ $data->updated_at }}</td>
            //     <td style="text-align: right">
            //         <form method="post" action="{{ url('/backend/article/delete/'.$data->id) }} ">
            //             {{-- <a class="btn btn-xs btn-primary" href="{{ url('/backend/article/'.$data->id) }}">Details</a> --}}
            //             <a class="btn btn-xs btn-success" href="{{ url('/backend/article/'.Request::segment(3).'/edit/'.$data->id) }}">Edit</a>
            //             {{ csrf_field() }}
            //             {{ method_field('DELETE') }}
            //             <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
            //         </form>
            //     </td>
            // </tr>
            // ';
        }
    }
}