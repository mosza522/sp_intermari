<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Typography</title>
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
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-header-fixed page-sidebar-fixed">
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
					<li class="has-sub active">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-suitcase"></i>
						    <span>UI Elements</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_general">General</a></li>
							<li class="active"><a href="ui_typography">Typography</a></li>
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
					<li class="has-sub">
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
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_wizards">Wizards</a></li>
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
				<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">UI Elements</a></li>
				<li class="active">Typography</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Typography <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Headings</h4>
                        </div>
                        <div class="panel-body">
							<h1>h1. Heading 1</h1>
							<h2>h2. Heading 2</h2>
							<h3>h3. Heading 3</h3>
							<h4>h4. Heading 4</h4>
							<h5>h5. Heading 5</h5>
							<h6>h6. Heading 6</h6>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-2">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">small, semiBold, Bold, Italic</h4>
                        </div>
                        <div class="panel-body">
							<p><small>This line of text is meant to be treated as fine print.</small></p>
							<h4><span class="semi-bold">rendered as semi bold text</span></h4>
							<h4><strong>rendered as bold text</strong></h4>
							<h4><em>rendered as italicized text</em></h4>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-3">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Alignment Classes</h4>
                        </div>
                        <div class="panel-body">
							<p class="text-left">Left aligned text.</p>
							<p class="text-center">Center aligned text.</p>
							<p class="text-right">Right aligned text.</p>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-4">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Emphasis classes</h4>
                        </div>
                        <div class="panel-body">
							<p class="muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
							<p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
							<p class="text-danger">Donec ullamcorper nulla non metus auctor fringilla.</p>
							<p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
							<p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-5">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Unordered List</h4>
                        </div>
                        <div class="panel-body">
							<ul>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Integer molestie lorem at massa</li>
								<li>Facilisis in pretium nisl aliquet</li>
								<li>Nulla volutpat aliquam velit
									<ul>
										<li>Phasellus iaculis neque</li>
										<li>Purus sodales ultricies</li>
										<li>Vestibulum laoreet porttitor sem</li>
										<li>Ac tristique libero volutpat at</li>
									</ul>
								</li>
								<li>Faucibus porta lacus fringilla vel</li>
								<li>Aenean sit amet erat nunc</li>
								<li>Eget porttitor lorem</li>
							</ul>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-6">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Ordered List</h4>
                        </div>
                        <div class="panel-body">
							<ol>
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Integer molestie lorem at massa</li>
								<li>Facilisis in pretium nisl aliquet</li>
								<li>Nulla volutpat aliquam velit</li>
								<li>Faucibus porta lacus fringilla vel</li>
								<li>Aenean sit amet erat nunc</li>
								<li>Eget porttitor lorem</li>
							</ol>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-7">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Unstyled & Inline List</h4>
                        </div>
                        <div class="panel-body">
							<ul class="list-unstyled">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Integer molestie lorem at massa</li>
								<li>Facilisis in pretium nisl aliquet</li>
								<li>Nulla volutpat aliquam velit</li>
								<li>Faucibus porta lacus fringilla vel</li>
								<li>Aenean sit amet erat nunc</li>
								<li>Eget porttitor lorem</li>
							</ul>
							<ul class="list-inline">
								<li>Lorem ipsum dolor sit amet</li>
								<li>Consectetur adipiscing elit</li>
								<li>Integer molestie lorem at massa</li>
							</ul>
                        </div>
                    </div>
                    <!-- end panel -->
			    </div>
			    <!-- end col-6 -->
			    <!-- begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-typography-8">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Body Copy</h4>
                        </div>
                        <div class="panel-body">
                            <p>
								Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, 
								nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
							</p>
							<p>
								Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus
								 auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. 
								 Donec ullamcorper nulla non metus auctor fringilla.
							</p>
							<p>
								Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. 
								Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
							</p>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-typography-9">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Lead body copy</h4>
                        </div>
                        <div class="panel-body">
                            <p class="lead">
                                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
                            </p>
						</div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-typography-10">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Abbreviation</h4>
                        </div>
                        <div class="panel-body">
                            <p>An abbreviation of the word attribute is  <abbr title="attribute">attr</abbr></p>
							<p><abbr title="HyperText Markup Language" class="initialism">HTML</abbr> is the best thing since sliced bread.</p>
						</div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-typography-11">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Addresses</h4>
                        </div>
                        <div class="panel-body">
                            <address>
								<strong>Twitter, Inc.</strong><br />
								795 Folsom Ave, Suite 600<br />
								San Francisco, CA 94107<br />
								<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
							<address>
							<strong>Full Name</strong><br />
								<a href="mailto:#">first.last@example.com</a>
							</address>
						</div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-typography-12">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Blockquote</h4>
                        </div>
                        <div class="panel-body">
                            <blockquote>
							  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							  	<small>Someone famous <cite title="Source Title">Source Title</cite></small>
							</blockquote>
							<blockquote class="pull-right">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							  	<small>Someone famous <cite title="Source Title">Source Title</cite></small>
							</blockquote>
						</div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-13">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Description List</h4>
                        </div>
                        <div class="panel-body">
							<dl>
								<dt>Description lists</dt>
								<dd>A description list is perfect for defining terms.</dd>
								<dt>Euismod</dt>
								<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
								<dd>Donec id elit non mi porta gravida at eget metus.</dd>
								<dt>Malesuada porta</dt>
								<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
							</dl>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-14">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Horizontal Description List</h4>
                        </div>
                        <div class="panel-body">
							<dl class="dl-horizontal">
								<dt>Description lists</dt>
								<dd>A description list is perfect for defining terms.</dd>
								<dt>Euismod</dt>
								<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
								<dd>Donec id elit non mi porta gravida at eget metus.</dd>
								<dt>Malesuada porta</dt>
								<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
							</dl>
                        </div>
                    </div>
                    <!-- end panel -->
			    </div>
			    <!-- end col-6 -->
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
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
