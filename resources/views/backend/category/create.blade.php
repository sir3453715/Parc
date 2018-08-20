@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form id="form_category_create" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/category/create/">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">Create Category</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
                                    <!-- 欄位：category -->
									<tr>
                                        <td class="header-require col-lg-2">主分類</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                        <select size="6" id="category_select" name="category_select" class="custom-select">
                                                            @foreach($datas["categories"] as $category)
                                                                <option id="{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <button type="button" name="create_category" id="create_category" class="btn btn-primary btn-xs" onclick="category_function()">New</button> --}}
                                                        <div id="category_hide" style="display: none;">
                                                            <label for="category_input">category_input:</label>
                                                            <input type="text" class="form-control" id="category_input" name="category_input" placeholder="Input category name">
                                                            <label for="category_input_english">category_input_english:</label>
                                                            <input type="text" class="form-control" id="category_input_english" name="category_input_english" placeholder="Input english category name">
                                                        </div>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：sub category -->
									<tr>
                                        <td class="header-require col-lg-2">次分類</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">

                                                        <select size="6" class="custom-select" name="sub_category" id="sub_category" hidden>
                                                            
                                                        </select>
                                                        <button type="button" name="create_sub_category" id="create_sub_category" class="btn btn-primary btn-xs" onclick="sub_category_function()">New</button>
                                                        <div id="sub_hide" style="display: none;">
                                                            <label for="sub_category_input">sub_category_input:</label>
                                                            <input type="text" class="form-control" id="sub_category_input" name="sub_category_input" placeholder="Input Sub_category name">
                                                            <label for="sub_category_input_english">sub_category_input_english:</label>
                                                            <input type="text" class="form-control" id="sub_category_input_english" name="sub_category_input_english" placeholder="Input english sub_category name">
                                                            <label for="order">Order</label>
                                                            <input type="number" class="form-control" name="sub_order" id="sub_order" value="0">
                                                        </div>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：extra sub category -->
									<tr>
                                        <td class="header-require col-lg-2">其他分類</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                            <select size="6" class="custom-select" id="extra_sub_category" name="extra_sub_category" hidden>
                                                                    <option value="" selected disabled hidden>其他分類</option>
                                                                </select>
                                                        <button type="button" name="create_extra_sub_category" id="create_extra_sub_category" class="btn btn-primary btn-xs" onclick="extra_sub_category_function()">New</button>
                                                        <br>
                                                        <div id="extra_hide" style="display: none;">

                                                            <label for="extra_sub_category_input">extra_sub_category_input:</label>
                                                            <input type="text" class="form-control" id="extra_sub_category_input" name="extra_sub_category_input" placeholder="Input Extra_Sub_category name">
                                                            
                                                            <label for="extra_sub_category_input_english">extra_sub_category_input_english:</label>
                                                            <input type="text" class="form-control" id="extra_sub_category_input_english" name="extra_sub_category_input_english" placeholder="Input english extra sub category name">
                                                            
                                                            <label for="extra_sub_category_description">extra_sub_category_description:</label>
                                                            <textarea id="extra_sub_category_description" name="extra_sub_category_description" form="form_category_create" placeholder="Descripition here"></textarea>
                                                            
                                                            <label for="pic">Upload your picture</label>
                                                            <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">

                                                            <label for="order">Order</label>
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
                                                <input type="submit" name="btnUpdate_foot" value="Create" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
                                                <input type="button" name="btnBackTo2_foot" value="Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
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

            

        });
    </script>
@endsection
