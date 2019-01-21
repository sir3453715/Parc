@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-title">複製文章</div>
                        </div>
                    </div>
                        <!--<div class="form-inline row">-->
                            <form method="post" action="{{ url('/backend/article/'.Request::segment(3).'/copy') }}">
                                {{ csrf_field() }}
                                    <div class="form-group row" >
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:white;">主分類</label>
                                            <select id="category_select" name="category_select" class="form-control custom-select">
                                                @if(!empty($datas["request"]["category_select"]))
                                                <option value="{{$datas["request"]["category_select"]}}" hidden>{{$datas["request"]->category_select_name}}</option>
                                                @endif
                                                @foreach($datas["categories"] as $category)
                                                    <option id="{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:white;">次分類</label>
                                            @if(!empty($datas["request"]["sub_category"]))
                                            <input type="text" id="sub_category_name" value="{{$datas["request"]["sub_category"]}}" name="{{$datas["request"]->sub_category_name}}" hidden></input>
                                            @endif
                                            <select class="form-control custom-select" name="sub_category" id="sub_category">
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:white;">特別分類</label>
                                            @if(!empty($datas["request"]["extra_sub_category"]))
                                            <input type="text" id="extra_sub_category_name" value="{{$datas["request"]["extra_sub_category"]}}" name="{{$datas["request"]->extra_sub_category_name}}" hidden></input>
                                            @endif
                                            <select class="form-control custom-select" id="extra_sub_category" name="extra_sub_category"> </select> 
                                        </div>
                                        <div class="col-md-2"  style="margin-top: 35px">
                                            <button type="submit" class="btn btn-success btn-xs" class="form-control">
                                                <strong>顯示</strong>
                                            </button>        
                                        </div>                       
                                    </div>
                            </form>
                                <div class="form-group row">
                                    {{-- <label class="control-label" style="color:white;padding-right: 84px;margin-left: 27px;">複製至======></label> --}}
                                    <div class="col-md-3">
                                        <label class="control-label" style="color:white;">主分類</label>
                                        <select id="category_copy" form="copy" name="category_copy" class="form-control custom-select">
                                            <option id="最新消息" value="5">最新消息</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label" style="color:white;">次分類</label>
                                        <select class="form-control custom-select" form="copy" name="sub_category_copy" id="sub_category_copy">
                                                <option id="法規政策動態copy" value="16">法規政策動態</option>
                                                <option id="中心動態copy" value="17">中心動態</option>
                                                <option id="課程與資源動態copy" value="18">課程與資源動態</option>
                                                <option id="國際動態copy" value="19">國際動態</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="margin-top: 35px">
                                        <button type="submit" class="btn btn-danger btn-xs" class="form-control" form="copy" onclick="return confirm('Are you sure?')">
                                            <strong>複製所選</strong>
                                        </button>    
                                    </div>                         
                                </div>
                    </div>
                    <table class="table-responsive-xl table-hover" style="table-layout:fixed;" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">選取 <br/>Choose</th>
                                    <th style="width: 5%">有效否 <br/>Active</th>
                                    <th style="width: 5%">顯示於Banner<br/>On Banner</th>
                                    <th>標題<br/>Title</th>
                                    <th>作者<br/>Author</th>
                                    <th>內文<br/>Content</th>
                                    <th>分類<br/>Category</th>
                                    <th>圖片<br/>Picture</th>
                                    <th>新增時間<br/>Created Time</th>
                                    <th>更新時間<br/>Modify Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="post" id="copy" action="{{ url('/backend/article/news/copy_selected') }}">
                                    {{ csrf_field() }}
                                    @foreach($datas["article"] as $data)
                                        <tr>
                                            <td>
                                                <div class="form-group" >
                                                    <input type="checkbox" form="copy" name="article_copy_id[]" value="{{$data->id}}">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" disabled {{ ($data->active == 1) ? "checked" : "" }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" disabled {{ ($data->display == 1) ? "checked" : "" }}>
                                            </td>
                                            <td class="text" style="max-width: 200px;">
                                                <span style="white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                display: inline-block;
                                                max-width: 100%;">
                                                {{$data->title}}
                                                </span>
                                            </td>
                                            <td><span style="white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                display: inline-block;
                                                max-width: 100%;">
                                                {{ $data->author }}
                                                </span></td>
                                            <td class="text" style="max-width: 200px;">
                                                <span style="white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                display: inline-block;
                                                max-width: 100%;">
                                                {{ strip_tags($data->body) }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $data->sub_category()}}
                                                <br>
                                                {{ $data->extra_sub_category() }}
                                            </td>
                                            <td>
                                                @if($data->pic)
                                                    <img src="/storage/{{$data->pic}}" width="100%" style="padding: 10px;">
                                                @else
                                                    <p>無圖片<br/>No picture</p>
                                                @endif
                                            </td>
                                            <td>{{ $data->created_at->format('Y-m-d h:m') }}</td>
                                            <td>{{ $data->updated_at->format('Y-m-d h:m') }}</td>
                                        </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                </div>

                <div class="col-md-12 text-center no-margin">
                    {{$datas["article"]->appends(Request::except('_token'))->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extjs')


	<script>
	$(document).ready(function() {
		//Back
		$("#btnBackTo2").click(function() {
			location.href='{{ url('backend/category') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/category') }}';
		});
		//初始化需要偵錯的表格
		$('#EditForm').validate();
		//正規表達驗證初始化
		$.validator.addMethod(
			"regex",
			function (value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			}
		);
        //各欄位
    });
		
	//提交與取消按鈕
	function submitForm() {
		if (!!($("#EditForm").valid()) === false) {
			return false;
		} else {
			$(document).ready(function() {
				$.blockUI({ css: {
					border: 'none',
					padding: '15px',
					backgroundColor: '#000',
					'-webkit-border-radius': '10px',
					'-moz-border-radius': '10px',
					opacity: .5,
					color: '#fff'
				}});
			});
		}
	}
	function cancelValidate() {
		$("#EditForm").validate().cancelSubmit = true;
    }
    //button 與 select 顯示邏輯
    function category_function(){
        //
        $("#category_hide").toggle();
        var check=$('#category_hide').css('display');
        if(check=="block"){
            document.getElementById("category_select").selectedIndex=-1;
            document.getElementById("category_select").setAttribute("class","hidden");
            document.getElementById("sub_category").setAttribute("class","hidden");
            document.getElementById("create_category").innerHTML="Choose";
            
            $('select[name="sub_category"]').empty();
            
            $('select[name="extra_sub_category"]').empty();

        }
        else{
            document.getElementById("category_select").selectedIndex=-1;
            document.getElementById("category_select").setAttribute("class","custom-select");
            document.getElementById("sub_category").setAttribute("class","custom-select");
            
            $('select[name="sub_category"]').empty();

            document.getElementById("create_category").innerHTML="New";
            document.getElementById("category_input").value="";
            document.getElementById("category_input_english").value="";
        }
    }
    function sub_category_function(){
        $("#sub_hide").toggle();
        var check=$('#sub_hide').css('display');
        if(check=="block"){
            document.getElementById("sub_category").selectedIndex=-1;
            document.getElementById("sub_category").setAttribute("class","hidden");
            document.getElementById("create_sub_category").innerHTML="Clear";

            $('select[name="extra_sub_category"]').empty();
        }
        else{
            document.getElementById("sub_category").selectedIndex=-1;
            document.getElementById("sub_category").setAttribute("class","custom-select");
            document.getElementById("create_sub_category").innerHTML="New";
            document.getElementById("sub_category_input").value="";
            document.getElementById("sub_category_input_english").value="";
        }
    } 
    function extra_sub_category_function(){
        //
        $("#extra_hide").toggle();
        var check=$('#extra_hide').css('display');
        if(check=="block"){
            //document.getElementById("extra_sub_category").selectedIndex=-1;
            document.getElementById("create_extra_sub_category").innerHTML="Clear";
        }
        else{
            //document.getElementById("extra_sub_category").selectedIndex=-1;
            document.getElementById("create_extra_sub_category").innerHTML="New";
            document.getElementById("extra_sub_category_input").value="";
            document.getElementById("extra_sub_category_input_english").value="";
            document.getElementById("extra_sub_category_description").value="";
        }
    }     
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_select"]').on('change', function() {
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
    
                            $('select[name="sub_category"]').empty();
                            $('select[name="extra_sub_category"]').empty();
                            @if(!empty($datas["request"]["sub_category"]))
                            var sub_category_name_value = $("#sub_category_name").attr('value');
                            var sub_category_name_key = $("#sub_category_name").attr('name')
                            $('select[name="sub_category"]').append('<option id="'+ sub_category_name_value +'" value="'+ sub_category_name_value +' " hidden>'+ sub_category_name_key +'</option>');
                            $("#sub_category_name").attr('value',0);
                            $("#sub_category_name").attr('name','選擇次分類');
                            @endif
                            $.each(data, function(key, value) {
                                $('select[name="sub_category"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
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
                            @if(!empty($datas["request"]["extra_sub_category"]))
                            var extra_sub_category_name_value = $("#extra_sub_category_name").attr('value');
                            var extra_sub_category_name_key = $("#extra_sub_category_name").attr('name')
                            $('select[name="extra_sub_category"]').append('<option id="'+ extra_sub_category_name_value +'" value="'+ extra_sub_category_name_value +' " hidden>'+ extra_sub_category_name_key +'</option>');
                            $("#extra_sub_category_name").attr('value','');
                            $("#extra_sub_category_name").attr('name','選擇特別分類');
                            @endif
                            $.each(data, function(key, value) {
                                $('select[name="extra_sub_category"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
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