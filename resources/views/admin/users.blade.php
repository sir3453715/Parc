@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-dark">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">使用者管理 Manage Users</div>
						</div>
						<div class="col-md-6" style="text-align: right">
							<a class="btn btn-darkblue btn-xs" href="{{ url('/backend/Users/create') }}"><strong>新增 Add</strong></a>
						</div>
					</div>
				</div>
				<table class="table table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>編號<br>no</th>
							<th>暱稱<br>Nickname</th>
							<th>名稱<br>Username</th>
							<th>創造時間<br>Create Time</th>
							<th>更新時間<br>Modify Time</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($tables as $data)
							<tr>
								<td>{{ $data->id }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->email }}</td>
								<td>{{ $data->created_at }}</td>
								<td>{{ $data->updated_at }}</td>
								<td style="text-align: right">
									<form method="post" action="{{ url('/backend/Users/'.$data->id) }}">
										<a class="btn btn-warning btn-xs" href="{{ url('/backend/Users/edit/'.$data->id) }}">
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
