<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>{{ $sTitle or 'S.P. Inter Marine Co.,Ltd.' }}</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<base href="{{ asset('') }}">
	{{--================= SELECT2 =====================  --}}
<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<link href="assets\plugins\select2\dist\css\select2.min.css" rel="stylesheet" />
<script src="assets\plugins\select2\dist\js\select2.min.js"></script>
{{--================= END SELECT2 =====================  --}}
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets/css/font/fonts.css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
  	<link href="assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />@stack('css')

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
	<!-- @if( empty($PageContainer) )
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-container">
	@else
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-sidebar-minified ">
	@endif
	-->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-container">
		<!-- begin #header -->
		@include('Inc.header')
		<!-- end #header -->

		<!-- begin #sidebar -->
		@include('Inc.sidebar')
		<!-- end #sidebar -->

		<!-- begin #content -->
		@yield('content')
		<!-- end #content -->

	@if( empty($PageContainer) )
		<!-- begin #footer -->
		@include('Inc.footer')
		<!-- end #footer -->
	@endif

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->



	<!-- begin #modal-alert -->
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog">
			<div class="modal-content" style="margin-top: 15%;">
				<div class="modal-header">
					<center><img src="assets/img/{{ session('alert.status')?session('alert.status'):'success' }}.png" width="150" class="m-b-10 m-t-10 "></center>
					<div class="alert alert-{{ session('alert.status')?session('alert.status'):'success' }} m-b-0">
						<div><span id="msg">{!! session('alert.msg') !!}</span></div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end #modal-alert -->

	<!-- ================== BEGIN BASE JS ================== -->
	{{-- <script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script> --}}
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
	<script src="assets/plugins/masked-input/masked-input.min.js"></script>
	<!-- ================== END BASE JS ================== -->


	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<script src="assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			@if (session('alert'))
				$('#modal-alert').modal('show');
				setTimeout(function(){
					$('#modal-alert').modal('hide');
				}, 5000);
			@endif
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('table').on('click', '.cDelete', function() {
				if(confirm('Are you sure?') == true){
					$.ajax({
						url: $(this).attr('rel'),
						type: 'DELETE',
						dataType: "JSON",
						success: function(result) {
							$('#modal-alert').modal('show');
							$('#modal-alert #msg').html(result.msg);
							$('.modal-dialog img' ).attr('src', 'assets/img/'+result.status+'.png');
							$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-'+result.status);
							$('#data-table').dataTable()._fnAjaxUpdate();
							setTimeout(function(){
								$('#modal-alert').modal('hide');
							}, 4000);
						}
					});
				}
			});
			$('body').on('click', '.cConfirm', function() {
				var msg = $(this).attr('msg')?$(this).attr('msg'):'ยืนยันการทำรายการ ?';
				if(confirm(msg) == true){
					$.ajax({
						url: $(this).attr('rel'),
						type: 'POST',
						dataType: "JSON",
						success: function(result) {
							if( result ){
								$('#modal-alert').modal('show');
								$('#modal-alert #msg').html(result.msg);
								$('.modal-dialog img' ).attr('src', 'assets/img/'+result.status+'.png');
								$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-'+result.status);

								if( result.redirect ){
									setTimeout(function(){
										window.location.href = result.redirect;
										}, 1500);
								}else{
									if (typeof oTable === 'undefined') {
										setTimeout(function(){
											$('#modal-alert').modal('hide');
										}, 3000);
										if( result.status == 'success' ){
											setTimeout(function(){
												location.reload();
											}, 3100);
										}
									}else{
										setTimeout(function(){
											$('#modal-alert').modal('hide');
										}, 1000);
										if( result.status == 'success' ){
											oTable.draw(false);
										}
									}
								}
							}
						}
					});
				}
			});
		});

		$('.mask_Time').mask("99:99");
		$('.datepicker').datepicker({
			showButtonPanel: true,
			todayHighlight: true,
            changeYear: true,
			closeText: 'Clear',
			dateFormat: 'dd-mm-yy',
			yearRange: "1950:+2",
			//defaultDate: '+543y',
			onClose: function (dateText, inst) {
				if ($(window.event.srcElement).hasClass('ui-datepicker-close')) {
					document.getElementById(this.id).value = '';
				}
			}
		});

		var frm	= {}; // Form
		frm.LoadForm=function(selector){
			var form = {};
			var a = {};
			$('.'+selector).each(function(){
				var self = $(this);
				var name = self.attr('name');

				if( name.substr(-2) == '[]' ){
					n = name.replace('[]', '');
					if(isNaN(a[n])){a[n]= 0;}else{a[n]++;}
					name = n+'['+a[n]+']';
				}

				if(self.is('input:text')){
					if( self.is(".price") || self.is(".num") ){
						form[name] = frm.Trim(self.val().replace(/,/g, ''));
					}else{
						form[name] = frm.Trim(self.val());
					}
				}else if(self.is('textarea')){
					form[name] = frm.Trim(self.val());
				}else if(self.is('input:checkbox')){
					if(self.is(':checked')){
						if(form[name]){
							if(jQuery.isArray(form[name]) == false){
								inum = 1;
								form[name] = [form[name]];
								form[name][inum++] = self.val();
							}else{
								form[name][inum++] = self.val();
							}
						}else{
							form[name] = $('input[name='+name+']:checked').val();
						}
					}
				}else if(self.is('input:radio')){
					form[name] = frm.GetRadio(name);
				}else{
					form[name] = self.val();
				}
			});
			return form;
		}
		frm.LTrim=function(str){
			if (str==null){
				return null;
			}
			for(var i=0; str.charAt(i)==" "; i++);
			return str.substring(i,str.length);
		}

		frm.RTrim=function(str){
			if (str==null){
				return null;
			}
			for(var i=str.length-1;str.charAt(i)==" ";i--);
			return str.substring(0,i+1);
		}

		frm.Trim=function(str){
			return frm.LTrim(frm.RTrim(str));
		}

		frm.AddCommas=function(nStr){
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}
		frm.FormatPrice=function(numset, decimal=2){
			if(!numset) return '0';
			var num = parseFloat(numset.replace(/,/g,''));
			if(isNaN(num)){
				return '0';
			}else{
				return frm.AddCommas(num.toFixed(decimal));
			}
		}

		frm.FormatNum=function(numset){
			if(!numset) return '0';
			var num = parseFloat(numset.replace(/,/g,''));
			if(isNaN(num)){
				return '0';
			}else{
				return frm.AddCommas(num);
			}
		}

		$('input').on('keyup keypress', function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) {
				e.preventDefault();
				return false;
			}
		});


		$(document).on('change', '.price2',function() { $(this).val(frm.FormatPrice($(this).val(),2));});
		$(document).on('change', '.price',function() { $(this).val(frm.FormatPrice($(this).val(),3));});
		$(document).on('change', '.num',  function() { $(this).val(frm.FormatNum($(this).val()));});
	</script>
	@stack('scripts')
</body>
</html>
