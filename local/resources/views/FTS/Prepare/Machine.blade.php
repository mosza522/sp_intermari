@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>ใบแจ้งงานสตีวีโดว์ :  {{ $sRow->work_number }}
				</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบเตรียมความพร้อม เครื่องจักร และ อุปกรณ์</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>
								ใบแจ้งงานสตีวีโดว์ :  {{ $sRow->work_number }}
							</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								@include('FTS.Prepare.inc_head_content')
								
								<div class="col-md-12 m-t-40" style="min-height:200px;">
									<div class="p-l-0 text-left pull-right">
										<a href="#modal-EquipmentNew" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มเครื่องจักร และ อุปกรณ์ไปในรายการปฎิบัติงาน</a>
									</div>
									<table id="data-table" class="table table-striped table-bordered" width="100%">
									</table>
								</div>
								
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-6 text-left">
											<a href="{{ action('FTS\PrepareController@show', $sRow->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบเตรียมความพร้อม</a>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		
		
		<!-- #EquipmentNew-->
		<div class="modal fade" id="modal-EquipmentNew" style="">
			<div class="modal-dialog" style="width:800px;">
				<div class="modal-content">
					<div class="modal-body">
						<table id="data-table-equipment" class="table table-striped table-bordered" width="100%"></table>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						<a href="javascript:;" class="btn btn-sm btn-primary EquipmentSave">เพิ่มเครื่องจักรเข้าไปในรายการปฎิบัติงาน</a>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- #EquipmentEdit-->
		<div class="modal fade" id="modal-EquipmentEdit" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">
						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ทุ่น : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="BuoyName" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ประเภท : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="MachineType" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-10">
										<label class="col-md-3 control-label">เครื่องจักร : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="MachineName" readonly />
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
							<a href="javascript:;" class="btn btn-sm btn-danger EquipmentDelete" rel="">ยกเลิกเครื่องจักรและอุปกรณ์นี้</a>
						</div>
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary EquipmentSave" rel="">บันทึกข้อมูลการเปลี่ยนแปลง</a>
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
	var oTable;
	var oTableEquipment;
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
			url: '{{ action("FTS\PrepareMachineController@postDatatable", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				d.OperationID	= {{ $sRow->OperationID }};
				oData = d;
			},
            method: 'POST'
        },
        columns: [
			{data: 'id', title :'แก้ไข', className: 'text-center action w70', orderable: false},
            {data: 'BuoyName', title :'ทุ่น', className: 'text-center w90', orderable: false},
            {data: 'MachineType', title :'ประเภท', className: 'text-center w100', orderable: false},
            {data: 'MachineName', title :'เครื่องจักร', className: 'text-center w150', orderable: false},
            {data: 'workNote', title :'หมายเหตุ', className: 'text-center', orderable: false},
            {data: 'workStatus2', title :'สถานะ', className: 'text-center w120', orderable: false},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: false},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-EquipmentEdit" rel="'+aData['id']+'" class="btn btn-xs btn-primary EquipmentEdit" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
			);
		}
    });

	oTableEquipment = $('#data-table-equipment').DataTable({
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
			url: '{{ action("FTS\PrepareMachineController@postDatatableWithWeight", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				$('.myWhere').each(function() {
					if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
						d.Where[$(this).attr('name')] = $.trim($(this).val());
					}
				});
			},
            method: 'POST'
        },
        columns: [
            {data: 'id', title :'#', className: 'text-center w20 input', orderable: false},
            {data: 'DepartmentName', title :'ทุ่น', className: 'text-center w100'},
            {data: 'MachineType', title :'ประเภท', className: 'text-center w100'},
            {data: 'MachineNunber', title :'รหัสเครื่องจักร', className: 'text-center w100'},
            {data: 'MachineName', title :'<center>เครื่องจักร</center>', className: 'text-left w350'},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			var rowId = aData['id'];
			if( rowId != 0 ){
				$('td:first-child', nRow).html('<input name="MachineID" value="'+rowId+'" type="radio" >');
				$('td', nRow).css("font-weight", "bold");
			}
		}
    });
	
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTableEquipment.draw();
	});

	$( '#modal-EquipmentNew' ).on( "click", '.EquipmentSave', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'OperationID' : {{ $sRow->OperationID }}, 'MachineID' : $("#modal-EquipmentNew input[type='radio']:checked").val() },
				url: '{{ action("FTS\PrepareMachineController@AjaxInsert", $sRow->id) }}',
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
							$('#modal-EquipmentNew').modal('hide');
							$('#modal-EquipmentNew #BuoyID').val('');
							$("#modal-EquipmentNew #MachineID optgroup").remove();
							$('#modal-EquipmentNew #workNote').val('');
						}
					}
				}
			});
		}
	});
	
	
	$( '#data-table' ).on( "click", '.EquipmentEdit', function() {
		if( $(this).parent().data('aData').BuoyName ){
			$('#modal-EquipmentEdit #BuoyName').val($(this).parent().data('aData').BuoyName);
			$('#modal-EquipmentEdit #MachineType').val($(this).parent().data('aData').MachineType);
			$('#modal-EquipmentEdit #MachineName').val($(this).parent().data('aData').MachineName);
			$('#modal-EquipmentEdit #workNote').val($(this).parent().data('aData').workNote);
			$('#modal-EquipmentEdit .EquipmentSave').attr('rel', $(this).parent().data('aData').id);
			$('#modal-EquipmentEdit .EquipmentDelete').attr('rel', $(this).parent().data('aData').id);
			if( $(this).parent().data('aData').workStatus == 0 ){
				$('#modal-EquipmentEdit .EquipmentDelete').hide();
			}else{
				$('#modal-EquipmentEdit .EquipmentDelete').show();
			}
		}
	});
	
	$( '#modal-EquipmentEdit' ).on( "click", '.EquipmentSave', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel'), 'workNote' : $('#modal-EquipmentEdit #workNote').val()  },
				url: '{{ action("FTS\PrepareMachineController@AjaxUpdate", $sRow->id) }}',
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
							$('#modal-EquipmentEdit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	
	
	$( '#modal-EquipmentEdit' ).on( "click", '.EquipmentDelete', function() {
		if(confirm('ยืนยันการทำรายการ\nยกเลิกเครื่องจักรและอุปกรณ์นี้?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel') },
				url: '{{ action("FTS\PrepareMachineController@AjaxDelete", $sRow->id) }}',
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
							$('#modal-EquipmentEdit').modal('hide');
						}
					}
				}
			});
		}
	});
});
</script>
@endpush