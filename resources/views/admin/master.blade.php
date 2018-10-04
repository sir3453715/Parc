<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.uc.head')
</head>
@if(Session::has('msg'))
	<script>alert('{{Session::get('msg')}}')</script>
@endif
<body>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status"><i class="fa fa-spinner fa-spin"></i></div>
	</div>
	<section>
		@include('admin.uc.leftmenu')
		<!-- leftpanel -->
		<div class="mainpanel">
			@include('admin.uc.header')
			<!-- headerbar -->
			@include('admin.uc.pageheader')
			<div class="contentpanel">
				@include('common.errors')
				@include('common.success')
				@yield('content')
				<!-- row -->
			</div>
			<!-- contentpanel -->
		</div>
		<!-- mainpanel -->
	</section>
	@include('admin.uc.foot')
</body>
@yield('extjs')
<script>
$(document).ready(function() {
	var funname = $.cookie('bread-children');
	var funmenu = $.cookie('bread-parent');
	var funid = $.cookie('children-id');

	if (funmenu == 'Dashboard')
	{
		var $node = $('#Dashboard');
		$node.addClass('active');
	}
	else
	{
		var $node = $('#' + funid)
		$node.addClass('active');
		$node.parents('ul').parents('li').addClass('nav-active active');
		$node.parents('ul').css('display', 'block');
	}

	if (funmenu != null)
	{
		$('.breadcrumb').append("<li>" + funmenu + "</li>");
	}

	if (funname != null)
	{
		$('.breadcrumb').append("<li>" + funname + "</li>");
	}
});

$('.dashboard').click(function(){
	$.cookie('children-id', 0, { path:'/'});
	$.cookie('bread-parent', '系統首頁', { path:'/'});
	$.cookie('bread-children', null, { path:'/'});
});

$('.children li a').click(function(){
	var funid = $(this).parents('li').attr('id');
	var funname = $(this).children('span').text();
	var funmenu = $(this).parents('li').children('.parent-name').children('span').text();
	$.cookie('children-id', funid, { path:'/'});
	$.cookie('bread-parent', funmenu, { path:'/'});
	$.cookie('bread-children', funname, { path:'/'});
})
</script>
</html>
