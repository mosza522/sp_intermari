@extends('Layouts.default')
@section('data-table')
	<div class="col-md-12 m-t-25">
		<div class="p-l-0 text-left pull-right">
			<a href="#modal-StaffNew" class="btn btn-sm btn-primary" data-toggle="modal">ปรับปรุงรายชื่อพนักงาน</a>
		</div>
		<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
	</div>
@stop

@section('pageHeader')
รายการปรับปรุงรายชื่อพนักงาน
@stop

@section('content')
	@include('FTS.Operation._inc_content_index')
		<!-- #StaffNew-->
		<div class="modal fade" id="modal-StaffNew" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">
						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันที่ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center datetimepicker" id="workDate" readonly value="{{ date('d-m-Y') }}" style="min-width: 150px !important;width: 150px;" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สถานะ : </label>
										<div class="col-md-4">
											<select class="form-control" id="workStatus" style="min-width: 150px !important;width: 150px;" />
												<option value="">เลือกสถานะ </option>
												<option value="1">เข้างาน</option>
												<option value="0">ออกงาน</option>
											</select>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ชื่อ - นามสกุล : </label>
										<div class="col-md-9">
											<select class="form-control" id="StaffID" ></select>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ : </label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="workNote" />
										</div>
									</div>
									
								</div>
							</fieldset>
						</form>
		
					</div>
					<div class="modal-footer">
						<div class="pull-left"></div>
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary StaffSave" rel="">ปรับปรุงรายชื่อพนักงาน</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
@stop



@push('scripts')
<script src="assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
$(function() {
		oTable = $('#data-table').DataTable({
		"sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>", 
		order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		//scrollY: ''+($(window).height()-370)+'px',
		iDisplayLength: 10,
        ajax: {
			url: '{{ action("FTS\OperationStaffController@postDatatable",$sRow->id) }}',
			data: function ( d ) { },
            method: 'POST'
        },
        columns: [
            {data: 'workNumber', title :'เลขที่เอกสาร', className: 'text-center w80', orderable: true},
            {data: 'workDate', title :'วันที่ - เวลา', className: 'text-center w120', orderable: true},
            {data: 'StaffName', title :'ชื่อ - นามสกุล', className: 'text-center w200', orderable: false},
            {data: 'DepartmentName', title :'แผนก', className: 'text-center w150', orderable: false},
            {data: 'PositionName', title :'ตำแหน่ง', className: 'text-center w150', orderable: false},
            {data: 'workStatus2', title :'สถานะ', className: 'text-center w60', orderable: false},
            {data: 'workNote', title :'หมายเหตุ', className: 'text-center w200', orderable: false},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: false},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false}
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			if( aData['deleted_at1'] || aData['deleted_at2'] ){
				$('td', nRow).css('background-color', 'khaki');
			}/*
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-StaffUpdate" rel="'+aData['id']+'" class="btn btn-xs btn-primary StaffUpdate" style="margin:0px;" data-toggle="modal" style="margin:0px;">'+aData['workNumber']+'</a> '
			);*/
		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});

    $( '#modal-StaffNew' ).on( "change", '#workStatus', function() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: { 'workStatus' : $(this).val() },
			url: '{{ action("FTS\OperationStaffController@jsonStaff",$sRow->id) }}',
            success: function(result) {
                $("#modal-StaffNew #StaffID optgroup").remove();
                $.each(result, function(PositionName, sRowStaff) {
                    var optGroup=$('<optgroup />').attr('label','#' + PositionName).appendTo('#modal-StaffNew #StaffID');
                    $.each(sRowStaff, function(StaffID, item) {
                        $(optGroup).append( $('<option />').html(item).attr('value', StaffID) );
                    });
                });
            }
        });
    });
	
	$( '#modal-StaffNew' ).on( "click", '.StaffSave', function() {
		if( $('#modal-StaffNew #StaffID').val() ){
			if(confirm('ยืนยันการทำรายการ ?') == true){
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: { 
						'StaffID' 		: $('#modal-StaffNew #StaffID').val(), 
						'workDate' 		: $('#modal-StaffNew #workDate').val(), 
						'workStatus' 	: $('#modal-StaffNew #workStatus').val(), 
						'workNote' 		: $('#modal-StaffNew #workNote').val()
					},
					url: '{{ action("FTS\OperationStaffController@store",$sRow->id) }}',
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
								@if( isset($resource) && $resource == 'create' )
									window.location.href = '{{ action("FTS\OperationStaffController@index",$sRow->id) }}';
								@else
									$('#modal-StaffNew').modal('show');
									oTable.draw(false);
									$('#modal-StaffNew').modal('hide');
									$('#modal-StaffNew #workNote').val('');
									$('#modal-StaffNew #workStatus').val('');
									$("#modal-StaffNew #StaffID optgroup").remove();
								@endif
							}
						}
					}
				});
			}
		}
	});
	
	@if( isset($resource) && $resource == 'create' )
		$('#modal-StaffNew').modal('show');
	@endif
	$('.datetimepicker').datetimepicker({
		format : 'DD-MM-YYYY HH:mm',
		ignoreReadonly: true
	});
});
</script>
@endpush


@push('css')
<link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
@endpush