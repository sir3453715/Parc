@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form id="form_category_create" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/category/create/">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">新增分類 Create Category</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
                                    <!-- 欄位：category -->
									<tr>
                                        <td class="header-require col-lg-2">主分類<br/>Category</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                        <select id="category_select" name="category_select" class="custom-select form-control">
                                                            @foreach($datas["categories"] as $category)
                                                                <option id="{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：sub category -->
									<tr>
                                        <td class="header-require col-lg-2">次分類<br/>Sub Category</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                        <select class="custom-select form-control" name="sub_category" id="sub_category"></select>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：extra sub category -->
									<tr>
                                        <td class="header-require col-lg-2">特殊分類<br/>Extra Sub Category</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                            {{-- <select size="6" class="custom-select" id="extra_sub_category" name="extra_sub_category" hidden>
                                                                <option value="" disabled hidden>特殊分類</option>
                                                            </select> --}}
                                                        {{-- <button type="button" name="create_extra_sub_category" id="create_extra_sub_category" class="btn btn-primary btn-xs" onclick="extra_sub_category_function()">New</button> --}}
                                                        <br>
                                                        <div id="extra_hide">

                                                            <label for="extra_sub_category_input">特殊分類名稱<br/>Extra Sub Category Name</label>
                                                            <input type="text" class="form-control" id="extra_sub_category_input" name="extra_sub_category_input" placeholder="輸入特殊分類名稱">
                                                            
                                                            <label for="extra_sub_category_input_english">特殊分類英文名稱<br/>Extra Sub Category English Name</label>
                                                            <input type="text" class="form-control" id="extra_sub_category_input_english" name="extra_sub_category_input_english" placeholder="輸入英文分類名稱">
                                                            
                                                            <label for="extra_sub_category_description">說明<br/>Description</label>
                                                            <textarea id="extra_sub_category_description" class="form-control" name="extra_sub_category_description" form="form_category_create" placeholder="輸入說明文字"></textarea>
                                                            
                                                            <label for="pic">上傳圖片<br/>Upload Picture</label>
                                                            <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">

                                                            <label for="order">順序<br/>Order</label>
                                                            <input type="number" class="form-control" name="order" id="order" value="0">
                                                        </div>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
                                                <input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
                                                <input type="submit" name="btnUpdate_foot" value="新增 Create" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- panel-body -->
				</div>
			</form>
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
            // document.getElementById("create_sub_category").innerHTML="Clear";

            $('select[name="extra_sub_category"]').empty();
        }
        else{
            document.getElementById("sub_category").selectedIndex=-1;
            document.getElementById("sub_category").setAttribute("class","custom-select");
            // document.getElementById("create_sub_category").innerHTML="New";
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
            // document.getElementById("create_extra_sub_category").innerHTML="Clear";
        }
        else{
            //document.getElementById("extra_sub_category").selectedIndex=-1;
            // document.getElementById("create_extra_sub_category").innerHTML="New";
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

                            $('select[name="extra_sub_category"]').empty()
                            $.each(data, function(key, value) {
                                $('select[name="sub_category"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
                            if ($('#sub_category').children().length > 0 ) {
                                $('#sub_category').removeAttr("hidden");
                            }
                            else{
                                $('#sub_category').attr("hidden","");
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
