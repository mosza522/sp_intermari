@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่าย{{$sRow->sDivision}}</li>
				<li>เตรียมความพร้อม ({{ $sRow->pageHeader }})</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบแจ้งงาน {{ $sRow->pageHeader }}</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i> ใบแจ้งงาน{{ $sRow->pageHeader }}  {!! empty($sRow->work_ref)?'':' <span class="text-success">(คัดลองข้อมูลมาจากใบแจ้งงาน '.$sRow->work_ref.' )<span>' !!}</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								@include('SWP.Prepare.inc_head_content_'.strtoupper($sRow->work_mode))
								<div class="col-md-12 m-b-20" style="min-height:200px;">
									<div class="p-l-0 text-left pull-right">
										<a href="#modal-foreman" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มโฟร์แมนเข้าไปในรายการปฎิบัติงาน</a>
									</div>
									<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
								</div>
								
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-6 text-left">
											<a href="{{ action($sRow->sPath.'\PrepareController@show', $sRow->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบเตรียมความพร้อม</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		
		
		<!-- #modal-foreman-->
		<div class="modal fade" id="modal-foreman" style="">
			<div class="modal-dialog" style="width: 95%;">
				<div class="modal-content">
					<div class="modal-body">
						<table id="data-table-foreman" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
									<th colspan="3" style="padding: 4px;">
										<select class="form-control myWhere" name="ForemanType" id="ForemanType" >
											<option value=""> ประเภทโฟร์แมน </option>
											<option value="In House">In House</option>
											<option value="Out Source">Out Source</option>
										</select>
										<select class="form-control myWhere" name="Condition" id="Condition" >
											<option value="weight"> เงื่อนไขการเลือกคัดกรองตามน้ำหนัก </option>
											<option value="queue"> เงื่อนไขการเลือกคัดกรองตามคิว </option>
										</select>
									</th>
									<th colspan="2" class="text-center">น้ำหนักสะสม</th>
									<th colspan="3" class="text-center">สถานะคิวงานล่าสุด</th>
									<th colspan="2"></th>
								</tr>
								<tr>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						<a href="javascript:;" class="btn btn-sm btn-primary ForemanInsert">เพิ่มโฟร์แมนเข้าไปในรายการปฎิบัติงาน</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- #modal-foreman-edit-->
		<div class="modal fade" id="modal-foreman-edit" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">
					

						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">โฟร์แมน : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="ForemanName" readonly />
										</div>
									</div>
						
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันเริ่มปฏิบัติงาน : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="workStart" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันหยุดปฏิบัติงาน : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="workFinish" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สถานะการดำเนินงาน : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="workStatus" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="workNote" />
										</div>
									</div>
								</div>
							</fieldset>
						</form>
		
					</div>
					<div class="modal-footer">
						<div class="pull-left">
							<a href="javascript:;" class="btn btn-sm btn-danger ForemanDelete" rel="">ยกเลิกโฟร์แมนในรายการปฎิบัติงานนี้</a>
						</div>
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary ForemanUpdate" rel="">บันทึกข้อมูลการเปลี่ยนแปลงโฟร์แมน</a>
						</div>
					</div>
				</div>
			</div>
		</div>
@stop

@push('scripts')
<link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

@endpush

@push('scripts')
<script src="assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
$(function() {
	
	$('.datetimepicker').datetimepicker({
		format : 'DD-MM-YYYY HH:mm',
		ignoreReadonly: true
	});
	
	oTable = $('#data-table').DataTable({
		"sDom": "tr", 
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		iDisplayLength: 50,
		order: [[ 0, "desc" ]],
		scrollY: ''+($(window).height()-250)+'px',
        ajax: {
			url: '{{ action("SWP\PrepareForemanController@postDatatable", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
			{data: 'id', title :'แก้ไข', className: 'text-center action w60', orderable: false},
            {data: 'ForemanType', title :'ประเภทโฟร์แมน', className: 'text-center w100', orderable: false},
            {data: 'ForemanName', title :'โฟร์แมน', className: 'text-center w150', orderable: false},
            {data: 'WeightMonthly', title :'น้ำหนักสะสม/เดือน', className: 'text-right w110', orderable: false},
            {data: 'WeightYearly', title :'น้ำหนักสะสม/ปี', className: 'text-right w110', orderable: true},
            {data: 'workStart', title :'วันเริ่มปฏิบัติงาน', className: 'text-center w100', orderable: false},
            {data: 'workFinish', title :'วันหยุดปฏิบัติงาน', className: 'text-center w100', orderable: false},
            {data: 'workNote', title :'หมายเหตุ', className: 'text-center w200', orderable: false},
            {data: 'workStatus2', title :'สถานะ', className: 'text-center w100', orderable: false},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: false},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-foreman-edit" rel="'+aData['id']+'" class="btn btn-xs btn-primary ForemanModalUpdate" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
			);
		}
    });

	
	oTableForeman = $('#data-table-foreman').DataTable({
		"sDom": "tr", 
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		iDisplayLength: 50,
		scrollY: ''+($(window).height()-250)+'px',
        ajax: {
			url: '{{ action("SWP\PrepareForemanController@postDatatableWithWeight", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				$('.myWhere').each(function() {
					if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
						d.Where[$(this).attr('name')] = $.trim($(this).val());
					}
				});
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
            {data: 'id', title :'#', className: 'text-center w20 input', orderable: false},
            {data: 'ForemanType', title :'ประเภทโฟร์แมน', className: 'text-center w100', orderable: false},
            {data: 'ForemanName', title :'โฟร์แมน', className: 'text-center w200', orderable: false},
            {data: 'WeightMonthly', title :'น้ำหนักสะสม/เดือน', className: 'text-right w110', orderable: false},
            {data: 'WeightYearly', title :'น้ำหนักสะสม/ปี', className: 'text-right w110', orderable: true},
            {data: 'LastWork', title :'วันที่เริ่ม', className: 'text-center w110', orderable: true},
            {data: 'LastJob', title :'เลขที่ใบสั่งขาย', className: 'text-center w80', orderable: false},
            {data: 'LastEnd', title :'วันที่เสร็จ', className: 'text-center w110', orderable: false},
            {data: 'ForemanStatus', title :'สถานะ', className: 'text-center w100', orderable: true},
            {data: 'ForemanNote', title :'หมายเหตุ', className: 'text-center w300', orderable: true},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			var rowId = aData['id'];
			if( rowId != 0 ){
				$('td:first-child', nRow).html('<input name="ForemanID" value="'+rowId+'" type="radio" >');
				$('td', nRow).css("font-weight", "bold");
			}
		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTableForeman.draw();
	});
	
	$( '#modal-foreman' ).on( "click", '.ForemanInsert', function() {
		if( $("#modal-foreman input[type='radio']:checked").val() === undefined ){
			alert('กรุณาเลือกโฟร์แมนในรายการปฎิบัติงาน');
		}else{
			
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'ForemanID' : $("#modal-foreman input[type='radio']:checked").val() },
				url: '{{ action("SWP\PrepareForemanController@AjaxInsert", $sRow->id) }}',
				success: function(result) {
					if( result ){
						$('#modal-alert').modal('show');
						$('#modal-alert #msg').html(result.msg);
						$('.modal-dialog img' ).attr('src', 'assets/img/'+result.status+'.png');
						$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-'+result.status);
						setTimeout(function(){
							$('#modal-alert').modal('hide');
						}, 5000);
						if( result.status == 'Success' ){
							oTable.draw(false);
							oTableForeman.draw(false);
						}
						$('#modal-foreman').modal('hide');
					}
				}
			});
			$("#modal-foreman input[type='radio']:checked").prop('checked', false)
		}
	});
	
	$( '#data-table' ).on( "click", '.ForemanModalUpdate', function() {
		if( $(this).parent().data('aData').ForemanName ){
			$('#modal-foreman-edit #ForemanName').val($(this).parent().data('aData').ForemanName);
			$('#modal-foreman-edit #workStart').val($(this).parent().data('aData').workStart);
			$('#modal-foreman-edit #workFinish').val($(this).parent().data('aData').workFinish);
			$('#modal-foreman-edit #workStatus').val($(this).parent().data('aData').workStatus2);
			$('#modal-foreman-edit #workNote').val($(this).parent().data('aData').workNote);
			$('#modal-foreman-edit .ForemanUpdate').attr('rel', $(this).parent().data('aData').id);
			$('#modal-foreman-edit .ForemanDelete').attr('rel', $(this).parent().data('aData').id);
			if( $(this).parent().data('aData').workStatus == 1 ){
				$('#modal-foreman-edit .ForemanDelete').hide();
				$('#modal-foreman-edit #workStart').parent().parent().show();
				$('#modal-foreman-edit #workStart2').parent().parent().hide();
			}else{
				$('#modal-foreman-edit .ForemanDelete').show();
				$('#modal-foreman-edit #workStart').parent().parent().hide();
				$('#modal-foreman-edit #workStart2').parent().parent().show();
			}
			
			if( $(this).parent().data('aData').workStatus == 0 ){
				$('#modal-foreman-edit .ForemanUpdate').hide();
				$('#modal-foreman-edit .ForemanDelete').hide();
			}else{
				$('#modal-foreman-edit .ForemanUpdate').show();
				$('#modal-foreman-edit .ForemanDelete').show();
			}
		}
	});
	
	$( '#modal-foreman-edit' ).on( "click", '.ForemanUpdate', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel'), 'workNote' : $('#modal-foreman-edit #workNote').val() },
				url: '{{ action("SWP\PrepareForemanController@AjaxUpdate", $sRow->id) }}',
				success: function(result) {
					if( result ){
						$('#modal-alert').modal('show');
						$('#modal-alert #msg').html(result.msg);
						$('.modal-dialog img' ).attr('src', 'assets/img/'+result.status+'.png');
						$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-'+result.status);
						setTimeout(function(){
							$('#modal-alert').modal('hide');
						}, 5000);
						if( result.status == 'Success' ){
							oTable.draw(false);
							$('#modal-foreman-edit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	$( '#modal-foreman-edit' ).on( "click", '.ForemanDelete', function() {
		if(confirm('ยืนยันการทำรายการ\nยกเลิกโฟร์แมนในรายการปฎิบัติงานนี้ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel') },
				url: '{{ action("SWP\PrepareForemanController@AjaxDelete", $sRow->id) }}',
				success: function(result) {
					if( result ){
						$('#modal-alert').modal('show');
						$('#modal-alert #msg').html(result.msg);
						$('.modal-dialog img' ).attr('src', 'assets/img/'+result.status+'.png');
						$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-'+result.status);
						setTimeout(function(){
							$('#modal-alert').modal('hide');
						}, 5000);
						if( result.status == 'Success' ){
							oTable.draw(false);
							$('#modal-foreman-edit').modal('hide');
						}
					}
				}
			});
		}
	});
});
</script>
@endpush