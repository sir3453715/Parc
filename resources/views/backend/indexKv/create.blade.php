@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/indexKV/{{Request::segment(3)}}/create">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
                        @if(Request::segment(3)=="kv")
                        <h4 class="panel-title">新增主視覺 Create Key Visual</h4>
                        @else
                        <h4 class="panel-title">新增引言 Create Quote</h4>
                        @endif
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
                                            <div class="col-lg-4 nopadding">
                                                <input name="active" type="checkbox" id="active" class="form-control" checked>
                                                <label class="error" for="active"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <!-- 欄位：title -->
                                    @if(Request::segment(3)=="kv")
									<tr>
										<td class="header-require col-lg-2">標題<br/>Title</td>
										<td>
											<div class="col-lg-4 nopadding">
												<input name="title" type="text" id="name" class="form-control" value="{{ old('title') }}" placeholder="建議17字以內">
												<label class="title" for="title"></label>
											</div>
										</td>
                                    </tr>
                                    @endif
									<!-- 欄位：Author -->
									@if(Request::segment(3)=="quote")
									<tr>
										<td class="header-require col-lg-2">作者<br/>Author</td>
										<td>
											<div class="col-lg-4 nopadding">
													<input name="author" type="text" id="author" class="form-control" value="{{ old('author') }}">
												<label class="error" for="author"></label>
											</div>
										</td>
									</tr>
									@endif
									<!-- 欄位：body -->
									@if(Request::segment(3)=="kv")
                                    <tr>
                                        <td class="col-lg-2">內文<br/>Content</td>
                                        <td>
                                            <div class="col-lg-4 nopadding">
                                                <label class="body" for="body"></label>
                                                <textarea rows="8" name="body" id="body" class="form-control" placeholder="建議56字以內">{{ old('body') }}</textarea>
                                            </div>
                                        </td>
                                    </tr>
									@endif    
									@if(Request::segment(3)=="quote")                                
                                    <tr>
                                        <td class="col-lg-2">內文<br/>Content</td>
                                        <td>
                                            <div class="col-lg-4 nopadding">
                                                <label class="body" for="body"></label>
                                                <textarea rows="8" name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                                            </div>
                                        </td>
									</tr>
									@endif
                                    <!-- 欄位：Link -->
                                    @if(Request::segment(3)=="kv")
									<tr>
										<td class="header-require col-lg-2">連結<br/>Link</td>
										<td>
											<div class="col-lg-4 nopadding">
													<input name="link" type="text" id="link" class="form-control" value="{{ old('link') }}">
												<label class="error" for="link"></label>
											</div>
										</td>
                                    </tr>
                                    @endif
                                    <!-- 欄位：lang -->
									<tr hidden>
                                        <td class="header-require col-lg-2">語言<br/>Languages</td>
                                        <td>
                                            <div class="col-lg-4 nopadding">
                                                <select class="custom-select form-control" id="lang" name="lang" >
                                                <option value="0" hidden>中文</option>
                                                    @foreach($datas["lang"] as $data)
                                                        <option id="{{$data->name}}" value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach   
                                                </select>
                                                <label class="error" for="lang"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Order --}}
                                    <tr>
										<td class="header-require col-lg-2">順序<br/>Order</td>
										<td>
											<div class="col-lg-4 nopadding">
                                                <input type="number" class="form-control" name="order" id="order" value="0">
												<label class="error" for="order"></label>
											</div>
										</td>
                                    </tr>
                                    {{-- 欄位：Pic Upload --}}
                                    <tr>
                                        <td class="header-require col-lg-2">上傳圖片<br/>Upload Picture</td>
                                        <td>
                                            <div class="col-lg-4 nopadding">
												@if(Request::segment(3)=="kv")
												<label for="upload_pic"><span style="color:red">*</span>最適尺寸為2878*1380</label>
												@else
                                                <label for="upload_pic"><span style="color:red">*</span>最適尺寸為1905*942</label>
												@endif
												<br>
                                                <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
                                            </div>
                                        </td>
                                    </tr>                                                                                  
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
                                                <input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
												<input type="submit" name="btnUpdate_foot" value="送出 Submit" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
			location.href='{{url('backend/indexKV/kv')}}';
		});
		$("#btnBackTo2_foot").click(function() {
			location.href='{{url('backend/indexKV/'.Request::segment(3))}}';
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

    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>
@endsection
