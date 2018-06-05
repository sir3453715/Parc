<div class="leftpanel">
	<div class="logopanel" style="cursor:pointer;">
        <!--<img src="assets/images/nav_logo.png" style="height: 73px;">-->
		<h1> <?php echo env('APP_NAME')?> </h1>
	</div>
	<!-- logopanel -->
	<div class="leftpanelinner">
		<!-- This is only visible to small devices -->
		<div class="visible-xs hidden-sm hidden-md hidden-lg">
			<div class="media userlogged nomargin">
				<div class="media-body">
					<h4>{{ $username }}</h4>
					<span>Login</span>
				</div>
			</div>
		</div>
        <h5 class="sidebartitle">Navigation</h5>
		<ul id="navLeftMenu" class="nav nav-pills nav-stacked nav-bracket">
			<!-- 選單區段 -->
			<li class='nav-link' id="Dashboard"><a href='{{ url('backend/') }}' class="dashboard"><i class='fa fa-dashboard'></i><span>DashBoard</span></a></li>
            @foreach($leftmenu as $data)
                <li class='nav-parent'><a href='' class='parent-name'><i class='{{ $data->icon }}'></i><span>{{ $data->menuname }}</span></a><ul class='children'>
                @for($i = 0; $i< count(explode(",",$data->submenuname)); $i++)
                    <li id='{{ str_replace("/", "_", explode(",",$data->submenulink)[$i]) }}' data-level='two'>
                        <a href='{{ url('backend/'.explode(",",$data->submenulink)[$i]) }}'>
                            <i class='fa fa-caret-right'></i>
                            <span>{{ explode(",",$data->submenuname)[$i] }}</span>
                        </a>
                    </li>
                @endfor
                </ul></li>
            @endforeach
		</ul>
	</div>
	<!-- leftpanelinner -->
</div>
