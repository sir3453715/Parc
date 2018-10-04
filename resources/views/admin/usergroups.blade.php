@extends('admin.master')

@section('content')
	<!-- 列表段 -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-dark">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">群組管理 Manage Groups</div>
						</div>
						<div class="col-md-6" style="text-align: right">
							<a class="btn btn-darkblue btn-xs" href="{{ url('/backend/Usergroups/create') }}"><strong>新增 Add</strong></a>
						</div>
					</div>
				</div>
				<table class="table table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>編號<br>no</th>
							<th>群組名稱<br>Group Name</th>
							<th>有效<br>Valid</th>
							<th>創造時間<br>Create Time</th>
							<th>更新時間<br>Modify Time</th>
							<th><br></th>
						</tr>
					</thead>
					<tbody>
						@foreach($tables as $data)
							<tr>
								<td>{{ $data->id }}</td>
								<td>{{ $data->Name }}</td>
								<td><input type="checkbox" {{ ($data->Valid == 1) ? 'checked' : '' }} disabled></td>
								<td>{{ $data->created_at }}</td>
								<td>{{ $data->updated_at }}</td>
								<td style="text-align: right">
									<form method="post" action="{{ url('/backend/Usergroups/'.$data->id) }}">
										<a class="btn btn-warning btn-xs" href="{{ url('/backend/Usergroups/edit/'.$data->id) }}">
											<strong>編輯 Edit</strong>
										</a>
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger btn-xs"><strong>刪除 Delete</strong></button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
