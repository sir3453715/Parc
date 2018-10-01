@extends('admin.master')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>  

	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/faq/edit/{{$datas["faq"]->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">編輯常見問題 Edit FAQ</h4>
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
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($datas["faq"]->active == 1) ? "checked" : "" }}>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：Question -->
									<tr>
										<td class="header-require col-lg-2">問題<br/>Question</td>
										<td>
											<div class="col-lg-8 nopadding">
													<textarea rows="8" name="question" type="text" id="question" class="form-control">{{ $datas["faq"]->question }}</textarea>
												<label class="error" for="question"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：Answer -->
									<tr>
										<td class=" col-lg-2">答案<br/>Answer</td>
										<td>
											<div class="col-lg-8 nopadding">
												<textarea rows="8" name="answer" type="text" id="answer" class="form-control">{!! $datas["faq"]->answer !!}</textarea>
												<label class="error" for="answer"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：lang -->
									<tr hidden>
										<td class="header-require col-lg-2">語言<br/>Languages</td>
										<td>
											<div class="col-lg-3 nopadding">
												<select class="custom-select form-control" id="lang" name="lang" >
													<option value="{{ $datas["faq"]->lang}} " selected hidden>{{ $datas["faq"]->lang()}}</option>
													@foreach($datas["lang"] as $data)
														<option id="{{$data->name}}" value="{{$data->id}}">{{$data->name}}</option>
													@endforeach   
												</select>
												<label class="error" for="lang"></label>
											</div>
										</td>
									</tr>								                                                                                           
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">新增時間<br/>Create Time</td>
                                        <td>{{ $datas["faq"]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">更新時間<br/>Modify Time</td>
                                        <td>{{ $datas["faq"]->updated_at }}</td>
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
			location.href='{{ url('backend/faq') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/faq') }}';
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
		//ckeditor
		var options = {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        };
        // CKEDITOR.replace('question',options);
        CKEDITOR.replace('answer',options);
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
