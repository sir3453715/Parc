@extends('admin.master')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form id="form_order" class="form-horizontal" method="post" action="/backend/milestone/order/">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">Order</h4>
					</div>
					<div class="panel-body">
						<div>
							<!-- 表格本體 -->
							<table class="table" cellspacing="0" id="DetailsView1" style="border-collapse:collapse;">
								<tbody>
                                    <!-- 欄位：Order -->
									<tr>
                                        <td class="header-require col-lg-2">拖曳以變更順序</td>
                                        <td>
                                            <div class="col-lg-3 nopadding">
                                                    <div class="form-group">
														<ul id="example" class="list-group">
															@foreach($datas as $data)
																<li id="{{$data->id}}" class="list-group-item list-group-item-light">{{$data->title}}</li>
															@endforeach
														</ul>
														<input type="hidden" id="order" name="order" value=""> 
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
									<!-- 下控制按鈕 -->
									<tr>
										<td>&nbsp;</td>
										<td>
											<div style="text-align: right">
                                                <input type="submit" name="btnUpdate_foot" value="Update" id="btnUpdate_foot" class="btn btn-primary btn-xs" onclick="submitForm();">
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
	<script src="{{ asset('assets/js/jquery.ui.sortable-animation.js')}}"></script>
	<script>
	$(document).ready(function(){
		$('#example').sortable({
		axis: 'y',
		placeholder: "ui-state-highlight",
		animation: 250,
		revert: 250,
		update: function(event, ui) {
			var newOrder = $(this).sortable('toArray');
			console.log(newOrder);
			document.getElementById("order").value=newOrder;
		}
		}); 
		$('#example').disableSelection();

			
		// var sortedIDs = $( "#example" ).sortable( "toArray" );
		// console.log(sortedIDs);
	});
	</script>
@endsection
