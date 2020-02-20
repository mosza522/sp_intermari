<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Vector Map</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<base href="<?php echo e(asset('')); ?>">
	
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
	<link href="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
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
		<?php echo $__env->make('Inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=index">Dashboard v1</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=index_v2">Dashboard v2</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<span class="badge pull-right">10</span>
							<i class="fa fa-inbox"></i> 
							<span>Email</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=email_inbox">Inbox v1</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=email_inbox_v2">Inbox v2</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=email_compose">Compose</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=email_detail">Detail</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-suitcase"></i>
						    <span>UI Elements</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_general">General</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_typography">Typography</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_tabs_accordions">Tabs & Accordions</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_unlimited_tabs">Unlimited Nav Tabs</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_modal_notification">Modal & Notification</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_widget_boxes">Widget Boxes</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_media_object">Media Object</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_buttons">Buttons</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_icons">Icons</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_simple_line_icons">Simple Line Icons</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_ionicons">Ionicons</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_tree">Tree View</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=ui_language_bar_icon">Language Bar & Icon</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-file-o"></i>
						    <span>Form Stuff</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_elements">Form Elements</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_plugins">Form Plugins</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_slider_switcher">Form Slider + Switcher</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_validation">Form Validation</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_wizards">Wizards</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_wizards_validation">Wizards + Validation</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_wysiwyg">WYSIWYG</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_editable">X-Editable</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=form_multiple_upload">Multiple File Upload</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-th"></i>
						    <span>Tables  <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_basic">Basic Tables</a></li>
							<li class="has-sub">
							    <a href="javascript:;"><b class="caret pull-right"></b> Managed Tables</a>
							    <ul class="sub-menu">
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage">Default</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_autofill">Autofill</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_buttons">Buttons</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_colreorder">ColReorder</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_fixed_columns">Fixed Column</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_fixed_header">Fixed Header</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_keytable">KeyTable</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_responsive">Responsive</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_rowreorder">RowReorder <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_scroller">Scroller</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_select">Select</a></li>
							        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=table_manage_combine">Extension Combination</a></li>
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
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=email_system">System Template</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=email_newsletter">Newsletter Template</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-area-chart"></i>
						    <span>Chart <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=chart-flot">Flot Chart</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=chart-morris">Morris Chart</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=chart-js">Chart JS</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=chart-d3">d3 Chart <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
						</ul>
					</li>
					<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=calendar"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
					<li class="has-sub active">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-map-marker"></i>
					        <span>Map</span>
					    </a>
						<ul class="sub-menu">
							<li class="active"><a href="map_vector">Vector Map</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=map_google">Google Map</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-camera"></i>
						    <span>Gallery</span>
						</a>
					    <ul class="sub-menu">
					        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=gallery">Gallery v1</a></li>
					        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=gallery_v2">Gallery v2</a></li>
					    </ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-cogs"></i>
						    <span>Page Options <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_blank">Blank Page</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_footer">Page with Footer</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_without_sidebar">Page without Sidebar</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_right_sidebar">Page with Right Sidebar</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_minified_sidebar">Page with Minified Sidebar</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_two_sidebar">Page with Two Sidebar</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_line_icons">Page with Line Icons</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_ionicons">Page with Ionicons</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_full_height">Full Height Content</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_wide_sidebar">Page with Wide Sidebar</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_light_sidebar">Page with Light Sidebar</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_mega_menu">Page with Mega Menu</a></li>
                            <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_top_menu">Page with Top Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_boxed_layout">Page with Boxed Layout <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_mixed_menu">Page with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_boxed_layout_with_mixed_menu">Boxed Layout with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=page_with_transparent_sidebar">Page with Transparent Sidebar <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-gift"></i>
						    <span>Extra</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=extra_timeline">Timeline</a></li>
						    <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=extra_coming_soon">Coming Soon Page</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=extra_search_results">Search Results</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=extra_invoice">Invoice</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=extra_404_error">404 Error Page</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=extra_profile">Profile Page</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-key"></i>
					        <span>Login & Register</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=login">Login</a></li>
					        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=login_v2">Login v2</a></li>
					        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=login_v3">Login v3</a></li>
					        <li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=register_v3">Register v3</a></li>
					    </ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-medkit"></i>
					        <span>Helper</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=helper_css">Predefined CSS Classes</a></li>
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
											<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Menu 3.1</a></li>
											<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Menu 3.2</a></li>
										</ul>
									</li>
									<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Menu 2.2</a></li>
									<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Menu 2.3</a></li>
								</ul>
							</li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Menu 1.2</a></li>
							<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Menu 1.3</a></li>
						</ul>
					</li>
			        <!-- begin sidebar minify button -->
					<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content content-full-width content-inverse-mode">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Home</a></li>
				<li><a href="<?php echo e(asset(Config::get('app.admin_path'))); ?>/template/?file=javascript:;">Map</a></li>
				<li class="active">Vector Map</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Vector Map <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<div class="map">
                <div id="world-map"></div>
                <div class="map-float-table width-sm hidden-xs p-15">
                    <h4 class="m-t-0"><i class="fa fa-map-marker text-danger m-r-5"></i> Vector Map</h4>
                    <div data-scrollbar="true" class="height-md">
                        <table class="table table-inverse">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Total Visitors</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Vatican City</td>
                                    <td><span class="text-success">9,820 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Monaco</td>
                                    <td>1,920</td>
                                </tr>
                                <tr>
                                    <td>Nauru</td>
                                    <td><span class="text-danger">1,346 <i class="fa fa-arrow-down"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Tuvalu</td>
                                    <td><span class="text-success">6,543 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>San Marino</td>
                                    <td><span class="text-success">7,321 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Liechtenstein</td>
                                    <td>3,434</td>
                                </tr>
                                <tr>
                                    <td>Marshall Islands</td>
                                    <td>1,922</td>
                                </tr>
                                <tr>
                                    <td>Saint Kitts and Nevis</td>
                                    <td><span class="text-danger">9,812 <i class="fa fa-arrow-down"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Maldives</td>
                                    <td><span class="text-danger">4,182 <i class="fa fa-arrow-down"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Malta</td>
                                    <td>9,188</td>
                                </tr>
                                <tr>
                                    <td>Grenada</td>
                                    <td>11,198</td>
                                </tr>
                                <tr>
                                    <td>Saint Vincent</td>
                                    <td><span class="text-success">9,101 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Barbados</td>
                                    <td><span class="text-success">9,192 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Antigua and Barbuda</td>
                                    <td><span class="text-success">5,282 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Seychelles</td>
                                    <td><span class="text-success">8,283 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Palau</td>
                                    <td><span class="text-danger">1,222 <i class="fa fa-arrow-down"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Andorra</td>
                                    <td>146</td>
                                </tr>
                                <tr>
                                    <td>Saint Lucia</td>
                                    <td>3,923</td>
                                </tr>
                                <tr>
                                    <td>Federated States</td>
                                    <td>9,827</td>
                                </tr>
                                <tr>
                                    <td>Singapore</td>
                                    <td>7,293</td>
                                </tr>
                                <tr>
                                    <td>Kiribati</td>
                                    <td>9,238</td>
                                </tr>
                                <tr>
                                    <td>Tonga</td>
                                    <td>6,422</td>
                                </tr>
                                <tr>
                                    <td>Dominica</td>
                                    <td><span class="text-success">3,341 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Mauritius</td>
                                    <td><span class="text-success">532 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>Bahrain</td>
                                    <td><span class="text-success">8,754 <i class="fa fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td>São Tomé and Príncipe</td>
                                    <td>5,742</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
		<?php echo $__env->make('Inc.theme-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
	<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/js/map-vector.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			MapVector.init();
		});
	</script>
</body>
</html>
