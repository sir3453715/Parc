@extends('admin.master')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>  

	<div class="row">
		<div class="col-xl-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/lecturer/edit/{{$datas["lecturer"]->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">編輯講師 Edit Lecturer</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
                                    <!-- 欄位：Active -->
									<tr>
                                        <td class="col-lg-2">有效<br/>Active</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($datas["lecturer"]->active == 1) ? "checked" : "" }}>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：Name -->
									<tr>
										<td class="header-require col-lg-2">姓名<br/>Name</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="name" type="text" value="{{ $datas["lecturer"]->name }}"  id="name" class="form-control">
												<label class="error" for="name"></label>
											</div>
										</td>
									</tr>
									{{-- <!-- 欄位：Job Title -->
									<tr>
										<td class="col-lg-2">職稱<br/>Job title</td>
										<td>
											<div class="col-lg-8 nopadding">
												<textarea name="title" type="text" id="title" class="form-control">{!! $datas["lecturer"]->title !!}</textarea>
												<label class="error" for="title"></label>
											</div>
										</td>
									</tr>	 --}}
									<!-- 欄位：Job Title -->
									<tr>
										<td class="col-lg-2">職稱與敘述<br/>Job title & Description</td>
										<td>
											<div class="col-lg-8 nopadding">
												<textarea name="title" type="text" id="title" class="form-control tooltips ckeditor">{!! $datas["lecturer"]->title !!}</textarea>
												<label class="title" for="title"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：lang -->
									<tr hidden>
										<td class="header-require col-lg-2">語言<br/>Languages</td>
										<td>
											<div class="col-lg-3 nopadding">
												<select class="custom-select form-control" id="lang" name="lang" >
													<option value="{{ $datas["lecturer"]->lang}} " selected hidden>{{ $datas["lecturer"]->lang()}}</option>
													@foreach($datas["lang"] as $data)
														<option id="{{$data->name}}" value="{{$data->id}}">{{$data->name}}</option>
													@endforeach   
												</select>
												<label class="error" for="lang"></label>
											</div>
										</td>
									</tr>
									{{-- 欄位：Pic Upload --}}
                                    <tr>
										<td class="header-require col-lg-2">上傳圖片<br/>Picture</td>
										<td>
											<div class="col-lg-3 nopadding">
                                                <label for="upload_pic"><span style="color:red">*</span>最適尺寸為810*463</label>
												<br>
												@if ($datas["lecturer"]->pic)
													<img src="/storage/{{$datas["lecturer"]->pic}}" height="150">                                                
												@else 
													<p>未上傳圖片 Picture not uploaded</p>
												@endif
												<input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
											</div>
										</td>
									</tr>										                                                                                           
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">新增時間 Create Time</td>
                                        <td>{{ $datas["lecturer"]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">更新時間 Modify Time</td>
                                        <td>{{ $datas["lecturer"]->updated_at }}</td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
												<input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												<input type="submit" name="btnUpdate_foot" value="修改 Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
			location.href='{{ url('backend/lecturer') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/lecturer') }}';
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
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };    
        CKEDITOR.replace( 'body',options );
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
@endsection
