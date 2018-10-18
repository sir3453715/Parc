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
                                        <option id="nochoose" value="">不拘</option>
                                        <option id="課程活動" value="2" @if($datas["request"]->category_select == '2')selected @endif>課程活動</option>
                                        <option id="法規政策" value="3" @if($datas["request"]->category_select == '3')selected @endif>法規政策</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label" style="color:white;">次分類</label>
                                    <select id="sub_category" name="sub_category" class="custom-select form-control">
                                        @if($datas["request"]->sub_category == '6')
                                        <option id="專業課程" class="課程活動 cookie" value="6" hidden>專業課程</option>
                                        @endif
                                        @if($datas["request"]->sub_category == '8')
                                        <option id="線上影音課程" class="課程活動 cookie" value="8" hidden>線上影音課程</option>
                                        @endif
                                        @if($datas["request"]->sub_category == '9')
                                        <option id="生命樂活" class="課程活動 cookie" value="9" hidden>生命樂活</option>
                                        @endif
                                        <option id="nochoose2" value="" hidden>不拘</option>
                                        <option id="專業課程" class="課程活動" value="6" hidden>專業課程</option>
                                        <option id="線上影音課程" class="課程活動" value="8" hidden>線上影音課程</option>
                                        <option id="生命樂活" class="課程活動" value="9" hidden>生命樂活</option>
                                        {{-- <option id="法規實務" class="法規政策" value="10" hidden>法規實務</option> --}}
                                        <option id="政策研究" class="法規政策" value="11" hidden @if($datas["request"]->sub_category == '11')selected @endif>政策研究</option>
                                    </select>
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
                    {{$datas["extra_sub_categories"]->appends(Request::except('_token'))->render()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){

            $('select[name="category_select"]').on('change', function() {
                var category_id = $(this).val();
                if(category_id == 2) {
                    $('.課程活動').show();
                    $('.法規政策').hide();
                    $('select[name="sub_category"]').val($('.課程活動').first().val());
                    $('.cookie').hide();  
                    //hide 10,11
                }else if(category_id == 3){
                    $('.課程活動').hide();
                    $('.法規政策').show(); 
                    $('select[name="sub_category"]').val($('.法規政策').first().val());   
                    // $('select[name="sub_category"]').val($('select[name="sub_category"] option:first').val());                
                    //display 6,8,9
                    //hide 10,11
                }
                else{
                    $('.法規政策').hide();
                    $('.課程活動').hide();
                    $('select[name="sub_category"]').val($('#nochoose2').first().val());                
                }
            });
            $('select[name="category_select"]').trigger("change");
            
        });
    </script>
@endsection
