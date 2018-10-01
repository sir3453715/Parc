@extends('admin.master')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/indexKV/video">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
                        <h4 class="panel-title">編輯首頁影片 Modify Key Video</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
                                    <!-- 欄位：title -->
									<tr>
										<td class="header-require col-lg-2">標題<br/>Title</td>
										<td>
											<div class="col-lg-4 nopadding">
												<input name="title" type="text" value="{{ $data!=null ? $data->title : old('title') }}"  id="title" class="form-control" placeholder="限制9字以內">
												<label class="error" for="title"></label>
											</div>
										</td>
                                    </tr>
                                    <!-- 欄位：Link -->
									<tr>
										<td class="header-require col-lg-2">Youtube網址<br/>Youtube URL</td>
										<td>
											<div class="col-lg-4 nopadding">
												<input name="link" type="text" value="{{ $data!=null ? 'https://www.youtube.com/watch?v='.$data->link : old('link') }}"  id="link" class="form-control">
												<label class="error" for="link"></label>
											</div>
											<iframe hidden width=100% id="video_iframe" height="315" src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
										</td>
                                    </tr>
                                    <!-- 欄位：lang -->
									<tr hidden>
                                        <td class="header-require col-lg-2">語言<br/>Languages</td>
                                        <td>
                                            <div class="col-lg-4 nopadding">
                                                <select class="custom-select form-control" id="lang" name="lang" >
                                                <option value="0" selected hidden>中文</option>
                                                </select>
                                                <label class="error" for="lang"></label>
                                            </div>
                                        </td>
                                    </tr>                                                                       
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
												<input type="submit" name="btnUpdate_foot" value="送出 Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
			$('#link').on('change', function() {
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
			$('#link').trigger("change");

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
