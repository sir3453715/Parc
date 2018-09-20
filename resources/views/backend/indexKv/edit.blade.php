@extends('admin.master')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<form id="EditForm" enctype="multipart/form-data" class="form-horizontal" method="post" action="/backend/indexKV/{{Request::segment(3)}}/edit/{{$datas["indexKV"]->id}}">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
                        @if(Request::segment(3)=="kv")
                        <h4 class="panel-title">編輯主視覺 Modify Key Visual</h4>
                        @else
                        <h4 class="panel-title">編輯引言 Modify Quote</h4>
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
                                                <input name="active" type="checkbox" id="active" class="form-control" {{($datas["indexKV"]->active == 1) ? "checked" : "" }}>
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
													<input name="title" type="text" value="{{ $datas["indexKV"]->title }}"  id="name" class="form-control" placeholder="建議17字以內">
												<label class="error" for="title"></label>
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
													<input name="author" type="text" value="{{ $datas["indexKV"]->author }}"  id="author" class="form-control">
												<label class="error" for="author"></label>
											</div>
										</td>
									</tr>
									@endif
									<!-- 欄位：body -->                                    
                                    <tr>
                                        <td class="col-lg-2">內文<br/>Content</td>
                                        <td>
                                            <div class="col-lg-4 nopadding">
                                                <textarea name="body" id="body" rows="8" class="form-control" placeholder="建議56字以內">{!! $datas["indexKV"]->body !!}</textarea>
                                                <label class="body" for="body"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 欄位：Link -->
                                    @if(Request::segment(3)=="kv")
									<tr>
										<td class="header-require col-lg-2">連結<br/>Link</td>
										<td>
											<div class="col-lg-4 nopadding">
													<input name="link" type="text" value="{{ $datas["indexKV"]->link }}"  id="link" class="form-control">
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
                                                <option value="{{$datas["indexKV"]->lang}}" selected hidden>{{$datas["indexKV"]->lang()}}</option>
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
                                                <input type="number" class="form-control" name="order" id="order" value="{{ $datas["indexKV"]->order }}">
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
                                                @if ($datas["indexKV"]->pic)
                                                <img src="/storage/{{$datas["indexKV"]->pic}}" height="150">                                                
                                                @else 
                                                    you no pic!
                                                @endif
                                                <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
                                            </div>
                                        </td>
                                    </tr>                                                                                  
									<!-- 欄位：time -->                                    
                                    <tr>
                                        <td class="col-lg-2">新增時間<br/>Create Time</td>
                                        <td>{{ $datas["indexKV"]->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2">修改時間<br/>Modify Time</td>
                                        <td>{{ $datas["indexKV"]->updated_at }}</td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
                                                <input type="button" name="btnBackTo2_foot" value="返回 Back" id="btnBackTo2_foot" class="btn btn-default btn-xs">
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
        });
    </script>
@endsection
