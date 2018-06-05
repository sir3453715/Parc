@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">Manage Category</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/category/create') }}"><strong>Add</strong></a>
                        </div>
                        <div class="form-inline">
                            <form method="post" action="{{ url('/backend/category') }}">
                                {{ csrf_field() }}
                                <div class="form-group" >
                                    <label class="control-label" style="color:white;">選擇分類</label>
                                    <select name="category" class="form-control" id="filter_value">
                                        @if(!empty($datas["cookie"]["category"]))
                                            <option value="{{$datas["cookie"]["category"]}}" hidden>{{$datas["cookie"]["category"]}}</option>
                                        @endif
                                            <option value="主分類">主分類</option>
                                            <option value="次分類">次分類 </option>
                                            <option value="特別分類">特別分類 </option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <button type="submit" class="btn btn-danger btn-xs" class="form-control">
                                        <strong>顯示</strong>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-xs" class="form-control" form="delete" onclick="return confirm('Are you sure?')">
                                        <strong>刪除所選</strong>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td></td>
                            <td>分類</td>
                            <td>名稱</td>
                            <td>英文名稱</td>
                            <td>Active</td>
                            <td>上層分類</td>
                            <td>Create Time</td>
                            <td>Modify Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" id="delete" action="{{ url('/backend/category/delete_selected') }}">
                            {{ csrf_field() }}
                            @if($datas["condition"]["category"])
                                @foreach($datas["categories"] as $data)
                                    <tr>
                                        <td>
                                            <div class="form-group" >
                                                <input type="checkbox" form="delete" name="category_delete_id[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>主分類</td>
                                        <td>
                                            {{ $data->name }} 
                                            @if($data->sub_category->first()!=null) 
                                                <button type="button" onclick="myFunction({{$data->sub_category()->value("category_id")}})" id="show_sub_category{{$data->id}}" class="btn btn-success btn-xs">展開</button>
                                            @endif
                                        </td>
                                        <td>{{ $data->en_name }}</td>
                                        <td>
                                            <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                        </td>
                                        <td> - </td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                        <td style="text-align: right">
                                            <form method="post" action="{{ url('/backend/category/category/delete/'.$data->id) }} ">
                                                <a class="btn btn-xs btn-success" href="{{ url('/backend/category/category/edit/'.$data->id) }}">Edit</a>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                            </form>
                                        </td>
                                    </tr>
                                @foreach($data->sub_category as $sub_category)
                                    <tr id="sub_category_display{{$data->sub_category()->value("category_id")}}"class="sub_category_display{{$data->sub_category()->value("category_id")}}" style="display: none;background-color: #FCFFA4;">
                                        <td>
                                            <div class="form-group" >
                                                <input type="checkbox" form="delete" name="sub_category_delete_id[]" value="{{$sub_category->id}}">
                                            </div>
                                        </td>
                                        <td>次分類</td>
                                        <td>
                                            {{ $sub_category->name }}
                                            @if($sub_category->extra_sub_category->first()!=null) 
                                                <button type="button" onclick="myFunction2({{$sub_category->id}})" id="show_extra_sub_category{{$sub_category->id}}" class="btn btn-primary btn-xs">展開</button>
                                            @endif
                                        </td>
                                        <td>{{ $sub_category->en_name }}</td>
                                        <td>
                                            <input type="checkbox" disabled {{ ($sub_category->active == 1) ? "checked" : "" }}>
                                        </td>
                                        <td>{{ $sub_category->category()->value('name') }} </td>
                                        <td>{{ $sub_category->created_at }}</td>
                                        <td>{{ $sub_category->updated_at }}</td>
                                        <td style="text-align: right">
                                            <form method="post" action="{{ url('/backend/category/sub_category/delete/'.$sub_category->id) }} ">
                                                <a class="btn btn-xs btn-success" href="{{ url('/backend/category/sub_category/edit/'.$sub_category->id) }}">Edit</a>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @foreach($sub_category->extra_sub_category as $extra_sub_category)
                                        <tr id="extra_sub_category_display{{$sub_category->id}}" class="extra_sub_category_display{{$sub_category->id}}" style="display: none;background-color: #D0FFA4;">
                                            <td>
                                                <div class="form-group" >
                                                    <input type="checkbox" form="delete" name="extra_sub_category_delete_id[]" value="{{$extra_sub_category->id}}">
                                                </div>
                                            </td>
                                            <td>特別分類</td>
                                            <td>{{ $extra_sub_category->name }}</td>
                                            <td>{{ $extra_sub_category->en_name }}</td>
                                            <td>
                                                <input type="checkbox" disabled {{ ($extra_sub_category->active == 1) ? "checked" : "" }}>
                                            </td>
                                            <td>{{ $extra_sub_category->sub_category()->value('name') }} </td>
                                            <td>{{ $extra_sub_category->created_at }}</td>
                                            <td>{{ $extra_sub_category->updated_at }}</td>
                                            <td style="text-align: right">
                                                <form method="post" action="{{ url('/backend/category/extra_sub_category/delete/'.$extra_sub_category->id) }} ">
                                                    <a class="btn btn-xs btn-success" href="{{ url('/backend/category/extra_sub_category/edit/'.$extra_sub_category->id) }}">Edit</a>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach     
                            @endforeach
                        @endif
                        @if($datas["condition"]["sub_category"])
                            {{-- {{dd($datas["sub_categories"])}} --}}
                            @foreach($datas["sub_categories"] as $sub_category)
                                <tr id="sub_category_display{{$sub_category->value("category_id")}}"class="sub_category_display{{$sub_category->value("category_id")}}">
                                    <td>
                                        <div class="form-group" >
                                            <input type="checkbox" form="delete" name="sub_category_delete_id[]" value="{{$sub_category->id}}">
                                        </div>
                                    </td>
                                    <td>次分類</td>
                                    <td>
                                        {{ $sub_category->name }}
                                        @if($sub_category->extra_sub_category->first()!=null) 
                                            <button type="button" onclick="myFunction2({{$sub_category->id}})" id="show_extra_sub_category{{$sub_category->id}}" class="btn btn-primary btn-xs">展開</button>
                                        @endif
                                    </td>
                                    <td>{{ $sub_category->en_name }}</td>
                                    <td>
                                        <input type="checkbox" disabled {{ ($sub_category->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $sub_category->category()->value('name') }} </td>
                                    <td>{{ $sub_category->created_at }}</td>
                                    <td>{{ $sub_category->updated_at }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/category/sub_category/delete/'.$sub_category->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/category/sub_category/edit/'.$sub_category->id) }}">Edit</a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                        </form>
                                    </td>
                                </tr>
                                @foreach($sub_category->extra_sub_category as $extra_sub_category)
                                        <tr id="extra_sub_category_display{{$sub_category->id}}" class="extra_sub_category_display{{$sub_category->id}}" style="display: none;background-color: #D0FFA4;">
                                            <td>
                                                <div class="form-group" >
                                                    <input type="checkbox" form="delete" name="extra_sub_category_delete_id[]" value="{{$extra_sub_category->id}}">
                                                </div>
                                            </td>
                                            <td>特別分類</td>
                                            <td>{{ $extra_sub_category->name }}</td>
                                            <td>{{ $extra_sub_category->en_name }}</td>
                                            <td>
                                                <input type="checkbox" disabled {{ ($extra_sub_category->active == 1) ? "checked" : "" }}>
                                            </td>
                                            <td>{{ $extra_sub_category->sub_category()->value('name') }} </td>
                                            <td>{{ $extra_sub_category->created_at }}</td>
                                            <td>{{ $extra_sub_category->updated_at }}</td>
                                            <td style="text-align: right">
                                                <form method="post" action="{{ url('/backend/category/extra_sub_category/delete/'.$extra_sub_category->id) }} ">
                                                    <a class="btn btn-xs btn-success" href="{{ url('/backend/category/extra_sub_category/edit/'.$extra_sub_category->id) }}">Edit</a>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            @endforeach
                        @endif
                        @if($datas["condition"]["extra_sub_category"])
                            @foreach($datas["extra_sub_categories"] as $extra_sub_category)
                                <tr>
                                    <td>
                                        <div class="form-group" >
                                            <input type="checkbox" form="delete" name="extra_sub_category_delete_id[]" value="{{$extra_sub_category->id}}">
                                        </div>
                                    </td>
                                    <td>特別分類</td>
                                    <td>{{ $extra_sub_category->name }}</td>
                                    <td>{{ $extra_sub_category->en_name }}</td>
                                    <td>
                                        <input type="checkbox" disabled {{ ($extra_sub_category->active == 1) ? "checked" : "" }}>
                                    </td>
                                    <td>{{ $extra_sub_category->sub_category()->value('name') }} </td>
                                    <td>{{ $extra_sub_category->created_at }}</td>
                                    <td>{{ $extra_sub_category->updated_at }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/category/extra_sub_category/delete/'.$extra_sub_category->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/category/extra_sub_category/edit/'.$extra_sub_category->id) }}">Edit</a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><strong>Delete</strong></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            
        }
        );
        function myFunction($id){
            //alert("hello");
            if( $("#sub_category_display"+$id).hasClass("sub_category_display"+$id)){
                $(".sub_category_display"+$id).show(500);
                $(".sub_category_display"+$id).removeClass("sub_category_display"+$id).addClass('sub_category_hide'+$id);
                $("#show_sub_category"+$id).html('收回');
            }
            else{
                $(".sub_category_hide"+$id).hide(200);
                $(".sub_category_hide"+$id).removeClass("sub_category_hide"+$id).addClass('sub_category_display'+$id);
                $("#show_sub_category"+$id).html('展開');
            }
        }
        function myFunction2($id){
            //alert("hello");
            if( $("#extra_sub_category_display"+$id).hasClass("extra_sub_category_display"+$id)){
                $(".extra_sub_category_display"+$id).show(500);
                $(".extra_sub_category_display"+$id).removeClass("extra_sub_category_display"+$id).addClass('extra_sub_category_hide'+$id);
                $("#show_extra_sub_category"+$id).html('收回');
            }
            else{
                $(".extra_sub_category_hide"+$id).hide(200);
                $(".extra_sub_category_hide"+$id).removeClass("extra_sub_category_hide"+$id).addClass('extra_sub_category_display'+$id);
                $("#show_extra_sub_category"+$id).html('展開');
            }
        }
    </script>
@endsection
