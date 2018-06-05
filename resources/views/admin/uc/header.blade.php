<div class="headerbar">
	<a class="menutoggle"><i class="fa fa-bars"></i></a>
	<label class="hidden-xs" style="float:left; margin-left:5px"><h4>{{ $username }}</h4></label>
	<form action="/backend/logout" method="post">
        {!! csrf_field() !!}
		<div class="header-right">
			<div class="btn-group" style="">
				<button type="submit" class="btn btn-danger btn-sm">
					<i class="glyphicon glyphicon-log-out"></i> Logout
				</button>
			</div>
		</div>
	</form>
	<!-- header-right -->
</div>
