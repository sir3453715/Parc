@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-xl-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/contact_form/create">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">新增聯絡名單 Create Contact Form</h4>
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
                                                <input name="active" type="checkbox" id="active" class="form-control" checked>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：Name -->
									<tr>
										<td class="header-require col-lg-2">姓名<br/>Name</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}">
												<label class="error" for="name"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：Email -->
									<tr>
										<td class="col-lg-2">電子信箱<br/>Email</td>
										<td>
											<div class="col-lg-8 nopadding">
												<input name="email" type="text" id="email" class="form-control" value="{{ old('email') }}">
												<label class="error" for="email"></label>
											</div>
										</td>
									</tr>	
									<!-- 欄位：Phone -->
									<tr>
										<td class="col-lg-2">電話<br/>Phone</td>
										<td>
											<div class="col-lg-8 nopadding">
												<input name="phone" type="text" id="phone" class="form-control" value="{{ old('phone') }}">
												<label class="error" for="phone"></label>
											</div>
										</td>
									</tr>	
									<!-- 欄位：Body -->
									<tr>
										<td class=" col-lg-2">內文<br/>Content</td>
										<td>
											<div class="col-lg-8 nopadding">
												<textarea rows="8" name="body" type="text" id="body" class="form-control">{{ old('body') }}</textarea>
												<label class="error" for="body"></label>
											</div>
										</td>
									</tr>								                                                                                           
									<!-- 下控制按鈕 -->
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
			location.href='{{ url('backend/contact_form') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/contact_form') }}';
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
@endsection
