@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-10">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/donate/edit/{{$donate->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">Edit Donation</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
									<!-- 欄位：No -->
                                    <tr>
                                        <td class="col-lg-2">#</td>
                                        <td>
                                            <input name="id" type="hidden" value="{{ $donate->id }}" id="id" />
                                            {{ $donate->id }}
                                        </td>
                                    </tr>
                                    <!-- 欄位：Name -->
									<tr>
										<td class="header-require col-lg-2">Name</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="name" type="text" value="{{ $donate->name }}"  id="name" class="form-control">
												<label class="error" for="name"></label>
											</div>
										</td>
									</tr>						                                                                                           
                                    <!-- 欄位：Email -->
									<tr>
										<td class="header-require col-lg-2">Email</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="email" type="text" value="{{ $donate->email }}"  id="email" class="form-control">
												<label class="error" for="email"></label>
											</div>
										</td>
									</tr>						                                                                                           
                                    <!-- 欄位：Phone -->
									<tr>
										<td class="header-require col-lg-2">Phone</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="phone" type="text" value="{{ $donate->phone }}"  id="phone" class="form-control">
												<label class="error" for="phone"></label>
											</div>
										</td>
									</tr>						                                                                                           
                                    <!-- 欄位：Transaction time -->
									<tr>
										<td class="header-require col-lg-2">Transaction Time</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="transaction_time" type="date" value="{{ $donate->transaction_time }}"  id="transaction_time" class="form-control">
												<label class="error" for="transaction_time"></label>
											</div>
										</td>
									</tr>						                                                                                           
                                    <!-- 欄位：ReceiptID -->
									<tr>
										<td class="header-require col-lg-2">ReceiptID</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="receipt_id" type="text" value="{{ $donate->receipt_id }}"  id="receipt_id" class="form-control">
												<label class="error" for="receipt_id"></label>
											</div>
										</td>
									</tr>						                                                                                           
                                    <!-- 欄位：Amount -->
									<tr>
										<td class="header-require col-lg-2">Amount</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="amount" type="text" value="{{ $donate->amount }}"  id="amount" class="form-control">
												<label class="error" for="amount"></label>
											</div>
										</td>
									</tr>						                                                                                           
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">Create Time</td>
                                        <td>{{ $donate->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">Modify Time</td>
                                        <td>{{ $donate->updated_at }}</td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
													<input type="submit" name="btnUpdate_foot" value="Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
			location.href='{{ url('backend/milestone') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/milestone') }}';
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
