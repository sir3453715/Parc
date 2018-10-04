@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" class="form-horizontal" method="post" action="{{ url('/backend/Users/store') }}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">{{ ($operdata == "") ? "新增使用者 Create User " : "更新使用者 Modify User " }}</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
									<!-- 欄位：no -->
									@if ($operdata == "")
										<input type="hidden" name="mode" value="insert" />
										<!-- Insert Mode -->
									@else
										<!-- Edit Mode -->
										<tr>
											<td class="col-lg-2">編號<br>no</td>
											<td>
												<input name="id" type="hidden" value="{{ $operdata->id }}" id="serno" />
												{{ $operdata->id }}
											</td>
										</tr>
									@endif
									<!-- 欄位：Nickname -->
									<!-- ALL Mode -->
									<tr>
										<td class="header-require col-lg-2">暱稱<br>Nickname</td>
										<td>
											<div class="col-lg-3 nopadding">
												@if ($operdata == "")
													<input name="name" type="text" value="" maxlength="20" id="name" class="form-control">
												@else
													<input name="name" type="text" value="{{ $operdata->name }}" maxlength="20" id="name" class="form-control">
												@endif
												<label class="error" for="name"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：Username -->
									@if ($operdata == "")
										<!-- Insert Mode -->
										<tr>
											<td class="header-require col-lg-2">帳戶名稱<br>Username</td>
											<td>
												<div class="col-lg-3 nopadding">
													<input name="email" type="text" value="" maxlength="100" id="email" class="form-control">
													<label class="error" for="email"></label>
												</div>
											</td>
										</tr>
									@else
										<!-- Edit Mode -->
										<tr class="Grid_Item">
											<td class="col-lg-2">帳戶名稱<br>Username</td>
											<td>
												{{ $operdata->email }}
											</td>
										</tr>
									@endif
									<!-- 欄位：Password -->
									@if ($operdata == "")
										<!-- Insert Mode -->
										<tr>
											<td class="header-require col-lg-2">密碼<br>Password</td>
											<td>
												<div class="col-lg-3 nopadding">
													<input name="password" type="password" value="" maxlength="20" id="password" class="form-control">
													<label class="error" for="password"></label>
												</div>
											</td>
										</tr>
									@else
										<!-- Edit Mode -->
										<tr>
											<td class="col-lg-2">密碼<br>Password</td>
											<td>
												<div class="col-lg-3 nopadding">
													<input name="password" type="password" value="" maxlength="20" id="password" class="form-control tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Leave it blank if you don't want to change password">
													<label class="error" for="password"></label>
												</div>
											</td>
										</tr>
									@endif

									<!-- 欄位：Create Time -->
									@if ($operdata == "")
										<!-- Insert Mode -->
									@else
										<!-- Edit Mode -->
										<tr>
											<td class="col-lg-2">創造時間<br>Create Time</td>
											<td>{{ $operdata->created_at }}</td>
										</tr>
									@endif
									<!-- 欄位：Modify Time -->
									@if ($operdata == "")
										<!-- Insert Mode -->
									@else
										<!-- Edit Mode -->
										<tr>
											<td class="col-lg-2">更新時間<br>Modify Time</td>
											<td>{{ $operdata->updated_at }}</td>
										</tr>
									@endif

									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
												<input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												@if ($operdata == "")
													<!-- Insert Mode -->
													<input type="submit" name="btnUpdate_foot" value="創造 Create" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
												@else
													<!-- Edit Mode -->
													<input type="submit" name="btnUpdate_foot" value="更新 Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
												@endif
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
			location.href='{{ url('backend/Users') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/Users') }}';
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
		$('#name').rules("add", {
			required: true,
			minlength: 1,
			maxlength: 20,
			messages: {
				required: "Nickname length must between 1-20",
				minlength: "Nickname length must between 1-20",
				maxlength: "Nickname length must between 1-20"
			}
		});
		@if ($operdata == "")
		//Insert Mode
		$('#email').rules("add", {
			required: true,
			email: true,
			minlength: 1,
			maxlength: 100,
			messages: {
				required: "Username length must between 1-100",
				email: "Username must be an email address",
				minlength: "Username length must between 1-100",
				maxlength: "Username length must between 1-100"
			}
		});
		@else
		//Edit Mode
		@endif
		@if ($operdata == "")
		//Insert Mode
		$('#password').rules("add", {
			required: true,
			minlength: 1,
			maxlength: 20,
			messages: {
				required: "Password length must between 1-20",
				minlength: "Password length must between 1-20",
				maxlength: "Password length must between 1-20"
			}
		});
		@else
		//Edit Mode
		$('#password').rules("add", {
			required: false,
			minlength: 0,
			maxlength: 20,
			messages: {
				required: "Password length must between 0-20",
				minlength: "Password length must between 0-20",
				maxlength: "Password length must between 0-20"
			}
		});
		@endif
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
