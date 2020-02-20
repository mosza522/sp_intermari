@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายท่าสินวัฒนา</li>
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
										<a href="#modal-StaffNew" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มพนักงานปฏิบัติงาน</a>
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
		
		
		
		

		
		
		<!-- #EquipmentNew-->
		<div class="modal fade" id="modal-StaffNew" style="">
			<div class="modal-dialog" style="width: 95%;">
				<div class="modal-content">
					<div class="modal-body">
						<table id="data-table-staff" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
									<th colspan="3" style="padding: 4px;">
										<!--<select class="form-control" name="DepartmentID" id="DepartmentID" >
											<option value="0"> กรุณาเลือกแผนกทุ่นในการปฏิบัติงาน </option>
										@if( !empty($rowDivision) )
											@foreach($rowDivision AS $row)
											<option value="{{ $row->id }}">{{ $row->DepartmentName }}</option>
											@endforeach
										@endif
										</select>-->
									</th>
									<th colspan="2" class="text-center">น้ำหนักทุ่นสะสม</th>
									<th colspan="3" class="text-center">สถานะคิวงานล่าสุด</th>
									<th></th>
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
								</tr>
							</thead>
						</table>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						<a href="javascript:;" class="btn btn-sm btn-primary StaffSave" rel="">เพิ่มพนักงานปฏิบัติงาน</a>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		<!-- #EquipmentEdit-->
		<div class="modal fade" id="modal-StaffEdit" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">
						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									<div class="form-group m-b-10">
										<label class="col-md-3 control-label">แผนก(ทุ่น) : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="DepartmentName" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">พนักงาน : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="StaffName" readonly />
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
							<a href="javascript:;" class="btn btn-sm btn-danger StaffDelete" rel="">ยกเลิกพนักงานปฏิบัติงานนี้</a>
						</div>
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary StaffSave" rel="">บันทึกข้อมูลการเปลี่ยนแปลง</a>
						</div>
					</div>
				</div>
			</div>
		</div>
@stop


@push('scripts')
<script>
$(function() {
		oTable = $('#data-table').DataTable({
		"sDom": "tr", 
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		iDisplayLength: 60,
		scrollY: ''+($(window).height()-250)+'px',
        ajax: {
			url: '{{ action("SWP\PrepareStaffController@postDatatable", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
			{data: 'id', title :'แก้ไข', className: 'text-center action w70', orderable: false},
            {data: 'StaffName', title :'ชื่อ - นามสกุล', className: 'text-left w175', orderable: false},
            {data: 'DivisionName', title :'ฝ่าย', className: 'text-left w175', orderable: false},
            {data: 'DepartmentName', title :'แผนก', className: 'text-left w175', orderable: false},
            {data: 'PositionName', title :'ตำแหน่ง', className: 'text-left w175', orderable: false},
            //{title :'น้ำหนักสะสม/เดือน', className: 'text-right w110', orderable: false},
            //{title :'น้ำหนักสะสม/ปี', className: 'text-right w110', orderable: false},
            {data: 'workStatus', title :'สถานะ', className: 'text-center w70', orderable: false},
            {data: 'workNote', title :'หมายเหตุ', className: 'text-w150 w200', orderable: false},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: true},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-StaffEdit" rel="'+aData['id']+'" class="btn btn-xs btn-primary StaffEdit" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
			);
		},
		footerCallback: function( tfoot, data, start, end, display ) {
			//console.log(oData);
		
		}
    });
	
	

	oTableStaff = $('#data-table-staff').DataTable({
		"sDom": "tr", 
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		iDisplayLength: 100,
		scrollY: ''+($(window).height()-250)+'px',
        ajax: {
			url: '{{ action("SWP\PrepareStaffController@postDatatableWithWeight", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				d.DepartmentID	= $('#modal-StaffNew #DepartmentID').val();
				oData = d;
			},
            method: 'POST'
        },
        columns: [
            {data: 'StaffID', title :'#', className: 'text-center w20 input', orderable: false},
            {data: 'StaffName', title :'พนักงาน', className: 'text-left w150', orderable: false},
            {data: 'PositionName', title :'ตำแหน่ง', className: 'text-left w175', orderable: false},
            {data: 'WeightMonthly', title :'เดือน', className: 'text-right w50', orderable: true},
            {data: 'WeightYearly', title :'ปี', className: 'text-right w50', orderable: true},
            {data: 'LastWork', title :'วันที่เริ่ม', className: 'text-center w110', orderable: true},
            {data: 'LastJob', title :'เลขที่ใบสั่งขาย', className: 'text-center w80', orderable: false},
            {data: 'LastEnd', title :'วันที่เสร็จ', className: 'text-center w110', orderable: false},
            {data: 'StaffStatus', title :'สถานะ', className: 'text-center w90', orderable: true},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			var rowId = aData['StaffID'];
			$('td:first-child', nRow).html('<input class="StaffID" value="'+rowId+'" type="checkbox" >');
		}
    });
	$('#modal-StaffNew #DepartmentID').on('change', function(e){
		oTableStaff.draw();
	});
	
	
	$( '#modal-StaffNew' ).on( "click", '.StaffSave', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			StaffID = [];
			$('#modal-StaffNew .StaffID:checked').each(function () {
				StaffID.push($(this).val());
			});
			
			if( StaffID.length ){
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: { 'StaffID' : StaffID.join() },
					url: '{{ action("SWP\PrepareStaffController@AjaxInsert", $sRow->id) }}',
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
								$('#modal-StaffNew #DepartmentID').val('');
								$('#modal-StaffNew .StaffID:checked').attr('checked', false);
								$('#modal-StaffNew').modal('hide');
								oTable.draw(false);
								oTableStaff.draw(false);
							}
						}
					}
				});
			}
		}
	});
  
	
	$( '#data-table' ).on( "click", '.StaffEdit', function() {
		if( $(this).parent().data('aData').StaffName ){
			$('#modal-StaffEdit #BuoyName').val($(this).parent().data('aData').BuoyName);
			$('#modal-StaffEdit #DepartmentName').val($(this).parent().data('aData').DepartmentName);
			$('#modal-StaffEdit #StaffName').val($(this).parent().data('aData').StaffName);
			$('#modal-StaffEdit #workNote').val($(this).parent().data('aData').workNote);
			$('#modal-StaffEdit .StaffSave').attr('rel', $(this).parent().data('aData').id);
			$('#modal-StaffEdit .StaffDelete').attr('rel', $(this).parent().data('aData').id);
			if( $(this).parent().data('aData').workStatus == 0 ){
				$('#modal-StaffEdit .StaffDelete').hide();
			}else{
				$('#modal-StaffEdit .StaffDelete').show();
			}
		}
	});
	
	
	$( '#modal-StaffEdit' ).on( "click", '.StaffSave', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel'), 'workNote' : $('#modal-StaffEdit #workNote').val()  },
				url: '{{ action("SWP\PrepareStaffController@AjaxUpdate", $sRow->id) }}',
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
							$('#modal-StaffEdit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	$( '#modal-StaffEdit' ).on( "click", '.StaffDelete', function() {
		if(confirm('ยืนยันการทำรายการ\nยกเลิกพนักงานปฏิบัติงานนี้?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel') },
				url: '{{ action("SWP\PrepareStaffController@AjaxDelete", $sRow->id) }}',
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
							$('#modal-StaffEdit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});
});
</script>
@endpush