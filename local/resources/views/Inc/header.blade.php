		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="{{ asset(Config::get('app.admin_path')) }}/" class="navbar-brand"><span class="navbar-logo"></span> S.P. Inter Marine</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<!--@include('Inc.notifications')-->
					<li class="dropdown navbar-user">
						<a href="system/profile/" class="dropdown-toggle" data-toggle="dropdown">
							<img src="@if(empty(Auth::user()->emp_pic)) assets/img/user-13.jpg @else Picture/Employee/{{ Auth::user()->emp_pic }} @endif" alt="" /> 
							<span class="hidden-xs">{!! Auth::user()->StaffPrefix.Auth::user()->StaffFirstName.' '.Auth::user()->StaffLastName !!}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/system/profile/">Edit Profile</a></li>
							<li class="divider"></li>
							<li><a href="logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>