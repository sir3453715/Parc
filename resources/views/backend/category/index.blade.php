@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-title">管理分類 Manage Category</div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <a class="btn btn-darkblue btn-xs" href="{{ url('backend/category/create') }}"><strong>新增 Add</strong></a>
                        </div>
                        <div class="form-inline">
                            <form method="post" action="{{ url('/backend/category/') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label" style="color:white;">主分類</label>
                                    <select id="category_select" name="category_select" class="custom-select form-control">
                                        <option id="nochoose" value="nochoose">不拘</option>
                                        @foreach($datas["categories"] as $category)
                                            <option id="{{$category->name}}" value="{{$category->id}}"{{ ($datas["request"]->category_select == $category->id ) ? 'selected' : ''  }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label" style="color:white;">次分類</label>
                                    <select id="sub_category" name="sub_category" class="custom-select form-control"></select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-xs" class="form-control">
                                        <strong>顯示</strong>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>順序<br/>Order</td>
                            <td>分類<br/>Category type</td>
                            <td>名稱<br/>Name</td>
                            <td>英文名稱<br/>English Name</td>
                            <td>圖片<br/>Picture</td>
                            <td>上層分類<br/>Category Group</td>
                            <td>新增時間<br/>Create Time</td>
                            <td>更新時間<br/>Modify Time</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" id="delete" action="{{ url('/backend/category/delete_selected') }}">
                            {{ csrf_field() }}
                            @foreach($datas["extra_sub_categories"] as $extra_sub_category)
                                <tr>
                                    <td>{{ $extra_sub_category->order }}</td>
                                    <td>特別分類</td>
                                    <td>{{ $extra_sub_category->name }}</td>
                                    <td>{{ $extra_sub_category->en_name }}</td>
                                    <td>
                                        @if($extra_sub_category->pic)
                                            <img src="/storage/{{$extra_sub_category->pic}}" height="100">
                                        @else
                                            <p>無圖片<br/>No picture</p>
                                        @endif
                                    </td>
                                    <td>{{ $extra_sub_category->sub_category()->first()->category()->value('name') }}/{{ $extra_sub_category->sub_category()->value('name') }} </td>
                                    <td>{{ $extra_sub_category->created_at->format('Y-m-d h:m') }}</td>
                                    <td>{{ $extra_sub_category->updated_at->format('Y-m-d h:m') }}</td>
                                    <td style="text-align: right">
                                        <form method="post" action="{{ url('/backend/category/extra_sub_category/delete/'.$extra_sub_category->id) }} ">
                                            <a class="btn btn-xs btn-success" href="{{ url('/backend/category/extra_sub_category/edit/'.$extra_sub_category->id) }}">編輯</a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('是否確定刪除? Are you sure?')"><strong>刪除</strong></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="col-md-12 text-center no-margin">
                    {{$datas["extra_sub_categories"]->render()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){

            $('select[name="category_select"]').on('change', function() {
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
    
                           
                            $('select[name="sub_category"]').empty();

                            $('select[name="extra_sub_category"]').empty()
                            $.each(data, function(key, value) {
                                $('select[name="sub_category"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
                            if ($('#sub_category').children().length > 0 ) {
                                $('#sub_category').removeAttr("hidden");
                            }
                            else{
                                $('select[name="sub_category"]').append('<option id="no_choose_sub_category" value="">不拘</option>');
                            }
                            if ($('#extra_sub_category').children().length > 0 ) {
                                $('#extra_sub_category').removeAttr("hidden");
                            }
                            else{
                                $('#extra_sub_category').attr("hidden","");
                            }
                            $('select[name="sub_category"]').trigger("change");

                        }
                    });
                }else{
                    $('select[name="sub_category"]').empty();
                }
            });
            $('select[name="sub_category"]').on('change', function() {
                var sub_category_id = $(this).val();
                var category_id = $('select[name="category_select"]').val();
                if(sub_category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id+'/'+sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="extra_sub_category"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="extra_sub_category"]').append('<option disabled id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
                            if ($('#extra_sub_category').children().length > 0 ) {
                                $('#extra_sub_category').removeAttr("hidden");
                            }
                            else{
                                $('#extra_sub_category').attr("hidden","");
                            }
                            //set category default value
                        }
                    });
                }else{
                    $('select[name="extra_sub_category"]').empty();
                }
                
            });
            $('select[name="category_select"]').trigger("change");
            $('select[name="sub_category"]').trigger("change");

            
        });
    </script>
@endsection
