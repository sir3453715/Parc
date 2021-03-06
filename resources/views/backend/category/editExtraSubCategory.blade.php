@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/category/extra_sub_category/edit/{{$extra_sub_category->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">編輯分類 Edit Category</h4>
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
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($extra_sub_category->active == 1) ? "checked" : "" }}>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
									</tr>
									<!-- 欄位：name -->
									<tr>
											<td class="header-require col-lg-2">上層分類<br/>Category Group</td>
											<td>
												<div class="col-lg-3 nopadding">
													<p>{{$extra_sub_category->sub_category()->first()->category()->value('name') }}/{{ $extra_sub_category->sub_category()->value('name') }} <p/>
													<label class="error" for="name"></label>
												</div>
											</td>
										</tr> 
                                    <!-- 欄位：name -->
									<tr>
										<td class="header-require col-lg-2">名稱<br/>Name</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="name" type="text" value="{{ $extra_sub_category->name }}"  id="name" class="form-control">
												<label class="error" for="name"></label>
											</div>
										</td>
                                    </tr>
									<!-- 欄位：engname -->
									<tr>
                                        <td class="header-require col-lg-2">英文名稱<br/>English Name</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <input name="en_name" type="text" value="{{ $extra_sub_category->en_name }}"  id="en_name" class="form-control">
                                                <label class="error" for="en_name"></label>
                                            </div>
                                        </td>
									</tr>
									<!-- 欄位：Description -->
									<tr>
										<td class="header-require col-lg-2">敘述<br/>Description</td>
										<td>
											<div class="col-lg-3 nopadding">
											<textarea class="form-control" id="extra_sub_category_description" name="extra_sub_category_description" form="EditForm">{{$extra_sub_category->description}}</textarea>
												<label class="error" for="extra_sub_category_description"></label>
											</div>
										</td>
									</tr>
									@if ($extra_sub_category->pic)
									{{-- 欄位：Pic Upload --}}
                                    <tr>
										<td class="header-require col-lg-2">上傳圖片<br/>Upload Picture<br/><span style="color:red">*</span>最適尺寸為540*360</td>
										<td>
											<div class="col-lg-3 nopadding">
												<label for="pic"></label>
												<br>
												@if ($extra_sub_category->pic)
												<img src="/storage/{{$extra_sub_category->pic}}" height="150">                                                
												@endif
												<input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
											</div>
										</td>
									</tr>
									@endif
									<!-- 欄位：Order -->
									<tr>
										<td class="header-require col-lg-2">順序<br/>Order</td>
										<td>
											<div class="col-lg-3 nopadding">
											<input class="form-control" type="number" id="order" name="order" form="EditForm" value="{{$extra_sub_category->order}}">
												<label class="error" for="order"></label>
											</div>
										</td>
									</tr>                                                                                                    
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">新增時間<br/>Create Time</td>
                                        <td>{{ $extra_sub_category->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">更新時間<br/>Modify Time</td>
                                        <td>{{ $extra_sub_category->updated_at }}</td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
												<input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												<input type="submit" name="btnUpdate_foot" value="更新 Modify" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
    </script>
@endsection
