<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Wizards</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<base href="{{ asset('') }}">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		@include('Inc.header')
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							Sean Ngu
							<small>Front end developer</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=index">Dashboard v1</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=index_v2">Dashboard v2</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<span class="badge pull-right">10</span>
							<i class="fa fa-inbox"></i> 
							<span>Email</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_inbox">Inbox v1</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_inbox_v2">Inbox v2</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_compose">Compose</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_detail">Detail</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-suitcase"></i>
						    <span>UI Elements</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_general">General</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_typography">Typography</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_tabs_accordions">Tabs & Accordions</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_unlimited_tabs">Unlimited Nav Tabs</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_modal_notification">Modal & Notification</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_widget_boxes">Widget Boxes</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_media_object">Media Object</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_buttons">Buttons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_icons">Icons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_simple_line_icons">Simple Line Icons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_ionicons">Ionicons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_tree">Tree View</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_language_bar_icon">Language Bar & Icon</a></li>
						</ul>
					</li>
					<li class="has-sub active">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-file-o"></i>
						    <span>Form Stuff</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_elements">Form Elements</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_plugins">Form Plugins</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_slider_switcher">Form Slider + Switcher</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_validation">Form Validation</a></li>
							<li class="active"><a href="form_wizards">Wizards</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_wizards_validation">Wizards + Validation</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_wysiwyg">WYSIWYG</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_editable">X-Editable</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_multiple_upload">Multiple File Upload</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-th"></i>
						    <span>Tables  <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_basic">Basic Tables</a></li>
							<li class="has-sub">
							    <a href="javascript:;"><b class="caret pull-right"></b> Managed Tables</a>
							    <ul class="sub-menu">
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage">Default</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_autofill">Autofill</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_buttons">Buttons</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_colreorder">ColReorder</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_fixed_columns">Fixed Column</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_fixed_header">Fixed Header</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_keytable">KeyTable</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_responsive">Responsive</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_rowreorder">RowReorder <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_scroller">Scroller</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_select">Select</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_combine">Extension Combination</a></li>
							    </ul>
							</li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-envelope"></i>
					        <span>Email Template</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_system">System Template</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_newsletter">Newsletter Template</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-area-chart"></i>
						    <span>Chart <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-flot">Flot Chart</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-morris">Morris Chart</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-js">Chart JS</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-d3">d3 Chart <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
						</ul>
					</li>
					<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=calendar"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-map-marker"></i>
					        <span>Map</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=map_vector">Vector Map</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=map_google">Google Map</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-camera"></i>
						    <span>Gallery</span>
						</a>
					    <ul class="sub-menu">
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=gallery">Gallery v1</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=gallery_v2">Gallery v2</a></li>
					    </ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-cogs"></i>
						    <span>Page Options <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_blank">Blank Page</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_footer">Page with Footer</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_without_sidebar">Page without Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_right_sidebar">Page with Right Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_minified_sidebar">Page with Minified Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_two_sidebar">Page with Two Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_line_icons">Page with Line Icons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_ionicons">Page with Ionicons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_full_height">Full Height Content</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_wide_sidebar">Page with Wide Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_light_sidebar">Page with Light Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_mega_menu">Page with Mega Menu</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_top_menu">Page with Top Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_boxed_layout">Page with Boxed Layout <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_mixed_menu">Page with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_boxed_layout_with_mixed_menu">Boxed Layout with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_transparent_sidebar">Page with Transparent Sidebar <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-gift"></i>
						    <span>Extra</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_timeline">Timeline</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_coming_soon">Coming Soon Page</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_search_results">Search Results</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_invoice">Invoice</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_404_error">404 Error Page</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_profile">Profile Page</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-key"></i>
					        <span>Login & Register</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=login">Login</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=login_v2">Login v2</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=login_v3">Login v3</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=register_v3">Register v3</a></li>
					    </ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-medkit"></i>
					        <span>Helper</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=helper_css">Predefined CSS Classes</a></li>
					    </ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-align-left"></i> 
						    <span>Menu Level</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
						            <b class="caret pull-right"></b>
						            Menu 1.1
						        </a>
								<ul class="sub-menu">
									<li class="has-sub">
										<a href="javascript:;">
										    <b class="caret pull-right"></b>
										    Menu 2.1
										</a>
										<ul class="sub-menu">
											<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 3.1</a></li>
											<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 3.2</a></li>
										</ul>
									</li>
									<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 2.2</a></li>
									<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 2.3</a></li>
								</ul>
							</li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 1.2</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 1.3</a></li>
						</ul>
					</li>
			        <!-- begin sidebar minify button -->
					<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Home</a></li>
				<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Form Stuff</a></li>
				<li class="active">Wizards</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Wizards <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Form Wizards</h4>
                        </div>
                        <div class="panel-body">
                            <form action="/" method="POST">
								<div id="wizard">
									<ol>
										<li>
										    Identification 
										    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
										</li>
										<li>
										    Contact Information
										    <small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small>
										</li>
										<li>
										    Login
										    <small>Phasellus lacinia placerat neque pretium condimentum.</small>
										</li>
										<li>
										    Completed
										    <small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
										</li>
									</ol>
									<!-- begin wizard step-1 -->
									<div>
                                        <fieldset>
                                            <legend class="pull-left width-full">Identification</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" name="firstname" placeholder="John" class="form-control" />
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>Middle Initial</label>
														<input type="text" name="middle" placeholder="A" class="form-control" />
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" name="lastname" placeholder="Smith" class="form-control" />
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-1 -->
									<!-- begin wizard step-2 -->
									<div>
										<fieldset>
											<legend class="pull-left width-full">Contact Information</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-6 -->
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Phone Number</label>
														<input type="text" name="phone" placeholder="123-456-7890" class="form-control" />
													</div>
                                                </div>
                                                <!-- end col-6 -->
                                                <!-- begin col-6 -->
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Email Address</label>
														<input type="text" name="email" placeholder="someone@example.com" class="form-control" />
													</div>
                                                </div>
                                                <!-- end col-6 -->
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-2 -->
									<!-- begin wizard step-3 -->
									<div>
										<fieldset>
											<legend class="pull-left width-full">Login</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <div class="controls">
                                                            <input type="text" name="username" placeholder="johnsmithy" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Pasword</label>
                                                        <div class="controls">
                                                            <input type="password" name="password" placeholder="Your password" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Confirm Pasword</label>
                                                        <div class="controls">
                                                            <input type="password" name="password2" placeholder="Confirmed password" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-6 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
									</div>
									<!-- end wizard step-3 -->
									<!-- begin wizard step-4 -->
									<div>
									    <div class="jumbotron m-b-0 text-center">
                                            <h1>Login Successfully</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                            <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
                                        </div>
									</div>
									<!-- end wizard step-4 -->
								</div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
		
		
        <!-- begin theme-panel -->
		@include('Inc.theme-panel')
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
	<script src="assets/js/form-wizards.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			FormWizard.init();
		});
	</script>
</body>
</html>
