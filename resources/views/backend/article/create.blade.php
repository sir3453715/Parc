@extends('admin.master')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>  

	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/article/{{Request::segment(3)}}/create">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">新增文章 Create Article</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
                                    <!-- 欄位：active -->
									<tr>
                                        <td class="header-require col-lg-2">有效<br/>Active</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="active" type="checkbox" id="active" class="form-control" checked>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：display -->
                                    @if(Request::segment(3)!=="trend" && Request::segment(3)!=="law" )
									<tr class="hide_at_law">
                                        <td class="header-require col-lg-2">顯示於Banner <br/>Display on Banner</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="display" type="checkbox" id="display" class="form-control">
                                                <label class="error" for="display"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr class="hide_at_law">
                                        <td class="header-require col-lg-2">顯示於重磅焦點</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="focus" type="checkbox" id="focus" class="form-control">
                                                <label class="error" for="focus"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Special -->
                                    @if(Request::segment(3)=="story")
                                        <tr>
                                            <td class="header-require col-lg-2">加入精選特輯<br/>Add to special section</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                    <input name="special" type="checkbox" id="special" class="form-control">
                                                    <label class="error" for="special"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    {{-- <!-- 欄位：Order -->
                                    <tr>
                                        <td class="header-require col-lg-2">優先顯示於精選特輯<br/>Prior to display on special section</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="order" type="checkbox" id="order" class="form-control">
                                                <label class="error" for="order"></label>
                                            </div>
                                        </td>
                                    </tr> --}}
                                    @endif
                                    <!-- 欄位：category -->
									<tr>
                                        <td class="header-require col-lg-2">分類<br/>Category</td>
                                        <td>
                                            <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <input type="text" value="" id="categorygg" name="category" hidden></option>
                                                        <select class="custom-select form-control" name="sub_category">
                                                            <option value="" selected disabled hidden>次分類</option>
                                                        </select>
                                                        <select id="extra_sub_category" class="custom-select form-control" name="extra_sub_category">
                                                        </select>
                                                    </div>
                                                <label class="error" for="category"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：title -->
									<tr>
										<td class="header-require col-lg-2">標題<br/>Title</td>
										<td>
											<div class="col-lg-6 nopadding">
													<input name="title" type="text" id="title" class="form-control" value="{{ old('title') }}" placeholder="建議17字以內">
												<label class="error" for="title"></label>
											</div>
										</td>
                                    </tr>
                                    <!-- 欄位：Description -->                                    
                                    <tr class="hide_at_law">
                                        <td class="col-lg-2">敘述<br/>Description</td>
                                        <td>
                                            <div class="col-lg-6 nopadding">
                                                <textarea rows="2" name="description" id="description" class="form-control" placeholder="建議56字以內">{{ old('description') }}</textarea>
                                                <label class="error" for="description"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Author -->
									<tr class="hide_at_law">
										<td class="header-require col-lg-2">作者<br/>Author</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="author" type="text" id="author" class="form-control" value="{{ old('author') }}">
												<label class="error" for="author"></label>
											</div>
										</td>
                                    </tr>
									<!-- 欄位：body -->                                    
                                    <tr>
                                        <td class="col-lg-2">內文<br/>Content</td>
                                        <td>
                                            <div class="col-lg-8 nopadding">
                                                <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                                                <label class="error" for="body"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- 欄位：Pic Upload --}}
                                    <tr class="hide_at_law">
                                        <td class="header-require col-lg-2">上傳圖片<br/>Upload Picture</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <label for="upload_pic"><span style="color:red">*</span>最適尺寸為2878*1380</label>
                                                <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Video URL -->
                                    @if(Request::segment(3)=="event")
                                        <tr id="video_url_table">
                                            <td class="header-require col-lg-2">Youtube網址<br/>Youtube URL</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                    <input name="video_url" type="text" id="video_url" class="form-control">
                                                    <label class="error" for="video_url"></label>
                                                </div>
                                                <iframe hidden width=100% id="video_iframe" height="315" src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                                            </td>
                                        </tr>
                                    @endif
                                    <!-- 欄位：tags -->
									<tr class="hide_at_law">
                                        <td class="header-require col-lg-2">標籤<br/>Tags</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <input name="tags" type="text" id="tags" class="form-control" placeholder="mytag1,mytag2" value="{{ old('tags') }}">
                                                <label class="error" for="tags"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <!-- 欄位：Expiry Date -->
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
                                    @endif --}}
                                    <!-- 欄位：lang -->
									{{-- <tr class="hide_at_law"> --}}
									<tr hidden>
                                        <td class="header-require col-lg-2">語言<br/>Languages</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <select name="lang" class="custom-select form-control">
                                                    @foreach($datas['lang'] as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label class="error" for="lang"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：lock -->
                                    @if(Request::segment(3)=="story")
                                        <tr>
                                            <td class="header-require col-lg-2">鎖右鍵複製文章功能<br/>Prevent copying content</td>
                                            <td>
                                                <div class="col-lg-3 nopadding">
                                                    <input name="lock" type="checkbox" id="lock" class="form-control">
                                                    <label class="error" for="lock"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif                                                                                                           
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
                                                <input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												<input type="submit" name="btnUpdate_foot" value="新增 Publish" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
        $('#video_url').on('change', function() {
            var url_string = $(this).val(); //window.location.href
            if (is_url(url_string)) {
                var url = new URL(url_string);
                var v = url.searchParams.get("v");
                $('#video_iframe').removeAttr("hidden");
                $("#video_iframe").attr("src","https://www.youtube.com/embed/"+v+"?rel=0&amp;showinfo=0");
            }
            else{
                $("#video_iframe").attr("hidden","");
            }
            
        });
        switch("{{Request::segment(3)}}"){
            case "story":
                var category_id=1;
                // document.getElementById("category").value = 1;
                // $("#category").val(1);
                $("#categorygg").attr("value","1");
                break;
            case "event":
                var category_id=2;
                $("#categorygg").attr("value","2");
                break;
            case "law":
                var category_id=3;
                $("#categorygg").attr("value","3");
                break;
            case "trend":
                var category_id=4;
                $("#categorygg").attr("value","4");
                break;
            case "news":
                var category_id=5;
                $("#categorygg").attr("value","5");
                break;
            case "love":
                var category_id=6;
                $("#categorygg").attr("value","6");
                break;
        }
        
        if(category_id) {
            $.ajax({
                url: '/backend/article/create/ajax/'+category_id,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="sub_category"]').empty();
                    $('select[name="extra_sub_category"]').empty()
                    $.each(data, function(key, value) {
                        $('select[name="sub_category"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    $('select[name="sub_category"]').trigger("change");
                }
            });
        }else{
            $('select[name="sub_category"]').empty();
        }
        $('select[name="sub_category"]').on('change', function() {
            var sub_category_id = $(this).val();
            if(sub_category_id) {
                $.ajax({
                    url: '/backend/article/create/ajax/'+category_id+'/'+sub_category_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="extra_sub_category"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="extra_sub_category"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                        if ($('#extra_sub_category').children().length > 0 ) {
                            $('#extra_sub_category').removeClass("hidden");
                        }
                        else{
                            $('#extra_sub_category').addClass("hidden");
                        }
                    }
                });
                if(sub_category_id == 8){
                    $('#video_url_table').show();
                }
                else{
                    $('#video_url_table').hide();
                    $('#video_url').val("");
                    $('#video_url').trigger("change");
                }
                if(sub_category_id == 10){
                    $('.hide_at_law').hide();
                }
                else{
                    $('.hide_at_law').show();
                }
            }else{
                $('select[name="extra_sub_category"]').empty();
            }
        });
    });
    function is_url(str)
    {
        regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
            if (regexp.test(str))   
                return true
            else    
                return false;
    }
</script>
@endsection
