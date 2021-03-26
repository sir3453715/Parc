<div class="leftpanel">
	<div class="logopanel">
        <img alt="病人自主研究中心" src="http://parc.tw/assets/images/icon/logo.svg" class="img-fluid" >
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
        <h5 class="sidebartitle">導航列</h5>
		<ul id="navLeftMenu" class="nav nav-pills nav-stacked nav-bracket">
			<!-- 選單區段 -->
			<li class='nav-link' id="Dashboard"><a href='{{ url('backend/') }}' class="dashboard"><i class='fa fa-dashboard'></i><span>系統首頁</span></a></li>
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
			<li class="nav-parent">
				<a href="" class="parent-name">
					<i class="fa fa-graduation-cap"></i><span>愛．活動</span>
				</a>
				<ul class="children">
					<li id="love_event_video" data-level="two">
						<a href="{{route('love-event.video')}}">
							<i class="fa fa-caret-right"></i>
							<span>活動影片管理</span>
						</a>
					</li>
					<li id="love_event_article" data-level="two">
						<a href="{{route('love-event.index')}}">
							<i class="fa fa-caret-right"></i>
							<span>文章管理</span>
						</a>
					</li>
					<li id="activity_term" data-level="two">
						<a href="{{route('event-term.index')}}">
							<i class="fa fa-caret-right"></i>
							<span>活動花絮分類管理</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- leftpanelinner -->
</div>
