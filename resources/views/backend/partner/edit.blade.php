@extends('admin.master')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>  

	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/partner/edit/{{$datas->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">編輯合作伙伴 Edit Partner</h4>
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
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($datas->active == 1) ? "checked" : "" }}>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：Title -->
									<tr>
										<td class="header-require col-lg-2">標題<br/>Title</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="title" type="text" value="{{ $datas->title }}"  id="title" class="form-control">
												<label class="error" for="title"></label>
											</div>
										</td>
									</tr>
                                    <!-- 欄位：Link -->
									<tr>
										<td class="header-require col-lg-2">連結<br/>Link</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="link" type="text" value="{{ $datas->link }}"  id="link" class="form-control">
												<label class="error" for="link"></label>
											</div>
										</td>
									</tr>
									{{-- 欄位：Pic Upload --}}
                                    <tr>
										<td class="header-require col-lg-2">上傳圖片<br/>Upload Picture</td>
										<td>
											<div class="col-lg-3 nopadding">
                                                <label for="pic"><span style="color:red">*</span>最適尺寸為小於150*150</label>
												<br>
												<img src="/storage/{{$datas->pic}}" height="50">                                                
												<input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
											</div>
										</td>
									</tr>							                                                                                           
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">新增時間<br/>Create Time</td>
                                        <td>{{ $datas->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">上傳時間<br/>Modify Time</td>
                                        <td>{{ $datas->updated_at }}</td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
												<input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												<input type="submit" name="btnUpdate_foot" value="編輯 Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
			location.href='{{ url('backend/partner') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/partner') }}';
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
    </script>
@endsection
