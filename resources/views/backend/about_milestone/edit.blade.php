@extends('admin.master')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>  

	<div class="row">
		<div class="col-lg-10">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/about_milestone/edit/{{$datas["milestone"]->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">Edit Milestone</h4>
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
                                            <input name="id" type="hidden" value="{{ $datas["milestone"]->id }}" id="id" />
                                            {{ $datas["milestone"]->id }}
                                        </td>
                                    </tr>
                                    <!-- 欄位：Active -->
									<tr>
                                        <td class="col-lg-2">Active</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($datas["milestone"]->active == 1) ? "checked" : "" }}>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：Title -->
									<tr>
										<td class="header-require col-lg-2">Title</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="title" type="text" value="{{ $datas["milestone"]->title }}"  id="title" class="form-control">
												<label class="error" for="title"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：Body -->
									<tr>
										<td class=" col-lg-2">Body</td>
										<td>
											<div class="col-lg-8 nopadding">
												<textarea name="body" type="text" id="body" class="form-control tooltips ckeditor">{!! $datas["milestone"]->body !!}</textarea>
												<label class="error" for="body"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：Date -->
									<tr>
										<td class="header-require col-lg-2">Date:</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="date" type="date" value="{{ $datas["milestone"]->date->format('Y-m-d') }}"  id="date" class="form-control">
												<label class="error" for="date"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：lang -->
									<tr>
										<td class="header-require col-lg-2">Languages</td>
										<td>
											<div class="col-lg-3 nopadding">
												<select class="custom-select form-control" id="lang" name="lang" >
													<option value="{{ $datas["milestone"]->lang}} " selected hidden>{{ $datas["milestone"]->lang()}}</option>
													@foreach($datas["lang"] as $data)
														<option id="{{$data->name}}" value="{{$data->id}}">{{$data->name}}</option>
													@endforeach   
												</select>
												<label class="error" for="lang"></label>
											</div>
										</td>
									</tr>
									<!-- 欄位：Order -->
									<tr>
										<td class="header-require col-lg-2">Order</td>
										<td>
											<div class="col-lg-3 nopadding">
													<input name="order" type="order" value="{{ $datas["milestone"]->order }}"  id="order" class="form-control">
												<label class="error" for="order"></label>
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
												@if ($datas["milestone"]->pic)
													<img src="/storage/{{$datas["milestone"]->pic}}" height="150">                                                
												@else 
													you no pic!
												@endif
												<input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
											</div>
										</td>
									</tr>										                                                                                           
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">Create Time</td>
                                        <td>{{ $datas["milestone"]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">Modify Time</td>
                                        <td>{{ $datas["milestone"]->updated_at }}</td>
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
			location.href='{{ url('backend/about_milestone') }}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{ url('backend/about_milestone') }}';
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
