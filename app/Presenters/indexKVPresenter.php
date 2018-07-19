<?php
namespace App\Presenters;

class indexKVPresenter{
    public function createTableHeader($type){
        if($type == 'kv'){
            return 
            '
            <tr>
                <td>#</td>
                <td>Active</td>
                <td>Title</td>
                <td>Author</td>
                <td>Body</td>
                <td>Picture</td>
                <td>Link</td>
                <td>Order</td>
                <td>Language</td>
                <td>Create Time</td>
                <td>Modify Time</td>
                <td></td>
            </tr>
            ';
        }
        else{
            return 
            '
            <td>#</td>
            <td>Active</td>
            <td>Author</td>
            <td>Body</td>
            <td>Picture</td>
            <td>Order</td>
            <td>Language</td>
            <td>Create Time</td>
            <td>Modify Time</td>
            <td></td>
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