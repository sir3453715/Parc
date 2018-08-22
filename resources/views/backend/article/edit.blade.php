@extends('admin.master')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>  

	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/article/{{Request::segment(3)}}/edit/{{$datas["article"]->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">{{ ($datas["article"] == "") ? "Create " : "Modify " }}Article</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
									<!-- 欄位：no -->
                                    <tr>
                                        <td class="col-lg-2">no</td>
                                        <td>
                                            <input name="id" type="hidden" value="{{ $datas["article"]->id }}" id="serno" />
                                            {{ $datas["article"]->id }}
                                        </td>
                                    </tr>
                                    <!-- 欄位：active -->
									<tr>
                                        <td class="header-require col-lg-2">Active</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($datas["article"]->active == 1) ? "checked" : "" }}>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：Special -->
                                    @if(Request::segment(3)=="story")
                                        <tr>
                                            <td class="header-require col-lg-2">加入精選特輯</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                    <input name="special" type="checkbox" id="special" class="form-control" {{($datas["article"]->special == "1") ? 'checked' : '' }}>
                                                    <label class="error" for="special"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    <!-- 欄位：Order -->
                                    <tr>
                                        <td class="header-require col-lg-2">優先顯示於精選特輯</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="order" type="checkbox" id="order" class="form-control" {{($datas["article"]->order == "0") ? 'checked' : '' }}>
                                                <label class="error" for="order"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    <!-- 欄位：category -->
									<tr>
                                        <td class="header-require col-lg-2">Category</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                        <select size="6" name="category" class="custom-select" hidden>
                                                            <option selected disabled hidden>主分類</option>
                                                            @foreach($datas["categories"] as $category)
                                                                <option id="main_{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select size="6" class="custom-select" name="sub_category">
                                                            <option value="">次分類</option>
                                                            @foreach($datas["sub_categories"] as $sub_category)
                                                                <option id="{{$sub_category->name}}" value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select size="6" class="custom-select" id="extra_sub_category" name="extra_sub_category" hidden>
                                                            <option value="" selected disabled hidden>其他分類</option>
                                                            @foreach($datas["extra_sub_categories"] as $extra_sub_category)
                                                                <option id="{{$extra_sub_category->name}}" value="{{$extra_sub_category->id}}">{{$extra_sub_category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                <label class="error" for="category"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @if($datas["copy"]!=null)
                                    <!-- 欄位：category2 -->
									<tr>
                                        <td class="header-require col-lg-2">Category2</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
                                                        <select size="6" name="category2" class="custom-select" hidden>
                                                            <option selected disabled hidden>主分類</option>
                                                            @foreach($datas["categories"] as $category2)
                                                                <option id="main_{{$category2->name}}" value="{{$category2->id}}">{{$category2->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select size="6" class="custom-select" name="sub_category2">
                                                            <option value="">次分類</option>
                                                            @foreach($datas["sub_categories"] as $sub_category2)
                                                                <option id="{{$sub_category2->name}}" value="{{$sub_category2->id}}">{{$sub_category2->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select size="6" class="custom-select" id="extra_sub_category2" name="extra_sub_category2" hidden>
                                                            <option value="" selected disabled hidden>其他分類</option>
                                                            @foreach($datas["extra_sub_categories"] as $extra_sub_category2)
                                                                <option id="{{$extra_sub_category2->name}}" value="{{$extra_sub_category2->id}}">{{$extra_sub_category2->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                <label class="error" for="category2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    <!-- 欄位：title -->
									<tr>
										<td class="header-require col-lg-2">Title</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="title" type="text" value="{{ $datas["article"]->title }}"  id="name" class="form-control">
												<label class="error" for="title"></label>
											</div>
										</td>
                                    </tr>
                                    <!-- 欄位：Description -->                                    
                                    <tr>
                                        <td class="col-lg-2">Description</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <textarea name="description" id="description" class="form-control">{!! $datas["article"]->description !!}</textarea>
                                                <label class="error" for="description"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Author -->
									<tr>
										<td class="header-require col-lg-2">Author</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="author" type="text" value="{{ $datas["article"]->author }}"  id="author" class="form-control">
												<label class="error" for="author"></label>
											</div>
										</td>
                                    </tr>
									<!-- 欄位：body -->                                    
                                    <tr>
                                        <td class="col-lg-2">Body</td>
                                        <td>
                                            <div class="col-lg-8 nopadding">
                                                <textarea name="body" id="body" class="form-control">{!! $datas["article"]->body !!}</textarea>
                                                <label class="error" for="body"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- 欄位：Pic Upload --}}
                                    <tr>
                                        <td class="header-require col-lg-2">Picture</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <label for="upload_pic">Upload your picture</label>
                                                <br>
                                                @if ($datas["article"]->pic)
                                                <img src="/storage/{{$datas["article"]->pic}}" height="150">                                                
                                                @else 
                                                    you no pic!
                                                @endif
                                                <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Video URL -->
                                    @if(Request::segment(3)=="event")
                                        <tr>
                                            <td class="header-require col-lg-2">Video URL</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                        <input name="video_url" type="text" value="{{ $datas["article"]->video_url }}"  id="video_url" class="form-control">
                                                    <label class="error" for="video_url"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <!-- 欄位：tags -->
									<tr>
                                        <td class="header-require col-lg-2">Tags</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <input name="tags" type="text" value="{{ $datas["article"]->tags }}"  id="tags" class="form-control">
                                                <label class="error" for="tags"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Expiry Date -->
                                    @if(Request::segment(3)=="event")
                                        <tr>
                                            <td class="header-require col-lg-2">Expiry Date:</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                    <input name="expiry_date" type="date" value="{{ $datas["article"]->expiry_date }}"  id="expiry_date" class="form-control">
                                                    <label class="error" for="expiry_date"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <!-- 欄位：lang -->
									<tr>
                                        <td class="header-require col-lg-2">Languages</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <select class="custom-select form-control" id="lang" name="lang" >
                                                        <option value="" selected disabled hidden>Choose Language</option>
                                                        @foreach($datas["lang"] as $data)
                                                            <option id="{{$data->name}}" value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach   
                                                </select>
                                                <label class="error" for="lang"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：lock -->
                                    @if(Request::segment(3)=="story")
                                        <tr>
                                            <td class="header-require col-lg-2">Lock</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                    <input name="lock" type="checkbox" id="lock" class="form-control" {{($datas["article"]->lock == 1) ? "checked" : "" }}>
                                                    <label class="error" for="lock"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <!-- 欄位：display -->
									<tr>
                                        <td class="header-require col-lg-2">Display</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="display" type="checkbox" id="display" class="form-control" {{($datas["article"]->display == 1) ? "checked" : "" }}>
                                                <label class="error" for="display"></label>
                                            </div>
                                        </td>
                                    </tr>                                                                                                             
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">Create Time</td>
                                        <td>{{ $datas["article"]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">Modify Time</td>
                                        <td>{{ $datas["article"]->updated_at }}</td>
                                    </tr>
                                    <!-- 欄位：last edited -->                                    
                                    <tr>
                                        <td class="col-lg-2">Last Edited</td>
                                        <td>{{ $datas["article"]->user() }}</td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
                                                <input type="button" name="btnBackTo2_foot" value="Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												<input type="submit" name="btnUpdate_foot" value="Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
			location.href='{{url()->previous()}}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{url()->previous()}}';
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
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        };
        CKEDITOR.replace('body',options);

        
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
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //set default lang
            document.getElementById("{{$datas["article"]->lang()}}").selected = "true";
            $('select[name="category"]').on('change', function() {
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
                            //set category default value
                            document.getElementById("{{$datas["article"]->sub_category()}}").selected = "true";
                        }
                    });
                }else{
                    $('select[name="sub_category"]').empty();
                }
            });
            $('select[name="sub_category"]').on('change', function() {
                var sub_category_id = $(this).val();
                var category_id = $('select[name="category"]').val();
                if(sub_category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id+'/'+sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="extra_sub_category"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="extra_sub_category"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
                            if ($('#extra_sub_category').children().length > 0 ) {
                                $('#extra_sub_category').removeAttr("hidden");
                            }
                            else{
                                $('#extra_sub_category').attr("hidden","");
                            }
                            //set category default value
                            @if($datas["article"]->extra_sub_category())
                            document.getElementById("{{$datas["article"]->extra_sub_category()}}").selected = "true";
                            @endif
                            // document.getElementById("{{$datas["article"]->extra_sub_category()}}").selected = "true";
                        }
                    });
                }else{
                    $('select[name="extra_sub_category"]').empty();
                }
                
            });
            $('select[name="category"]').val('{{$datas["article"]->category}}').change();
            $('select[name="sub_category"]').val('{{$datas["article"]->sub_category}}').change();


            @if($datas["copy"])
            // category2
            //set default lang
            document.getElementById("{{$datas["copy"]->lang()}}").selected = "true";
            $('select[name="category2"]').on('change', function() {
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
    
                            
                            $('select[name="sub_category2"]').empty();
                            $('select[name="extra_sub_category2"]').empty()
                            $.each(data, function(key, value) {
                                $('select[name="sub_category2"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
                            //set category default value
                            document.getElementById("{{$datas["copy"]->sub_category()}}").selected = "true";
                        }
                    });
                }else{
                    $('select[name="sub_category2"]').empty();
                }
            });
            $('select[name="sub_category2"]').on('change', function() {
                var sub_category_id = $(this).val();
                var category_id = $('select[name="category2"]').val();
                if(sub_category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id+'/'+sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="extra_sub_category2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="extra_sub_category2"]').append('<option id="'+ value +'" value="'+ key +'">'+ value +'</option>');
                            });
                            if ($('#extra_sub_category2').children().length > 0 ) {
                                $('#extra_sub_category2').removeAttr("hidden");
                            }
                            else{
                                $('#extra_sub_category2').attr("hidden","");
                            }
                            //set category default value
                            @if($datas["copy"]->extra_sub_category())
                            document.getElementById("{{$datas["copy"]->extra_sub_category()}}").selected = "true";
                            @endif
                            // document.getElementById("{{$datas["article"]->extra_sub_category()}}").selected = "true";
                        }
                    });
                }else{
                    $('select[name="extra_sub_category2"]').empty();
                }
                
            });
            $('select[name="category2"]').val('{{$datas["copy"]->category}}').change();
            $('select[name="sub_category2"]').val('{{$datas["copy"]->sub_category}}').change();
            @endif
            

        });
    </script>
@endsection
