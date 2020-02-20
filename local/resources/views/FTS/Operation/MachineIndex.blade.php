@extends('Layouts.default')
@section('data-table')
	<div class="col-md-12 m-t-25">
		<div class="p-l-0 text-left pull-right">
			<a href="#modal-EquipmentNew" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มรายการเครื่องจักรเสียหาย</a>
		</div>
		<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
	</div>
@stop

@section('pageHeader')
รายการบันทึกเครื่องจักรเสียหายระหว่างปฏิบัติงาน
@stop

@section('content')
	@include('FTS.Operation._inc_content_index')
		<!-- #EquipmentNew-->
		<div class="modal fade" id="modal-EquipmentNew" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">
						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันที่ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center datepicker" id="workDate" readonly value="{{ date('d-m-Y') }}" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เครื่องจักร : </label>
										<div class="col-md-6">
											<select class="form-control" name="MachineID" id="MachineID" >
												<option value=""> กรุณาเลือกเครื่องจักร</option>
											@if( !empty($rowMachine) )
												@foreach($rowMachine AS $MachineType => $MachineName)
												<optgroup label="{{ $MachineType }}">
													@foreach($MachineName AS $MachineID => $Name)
													<option value="{{ $MachineID }}">{{ $Name }}</option>
													@endforeach
												</optgroup>
												@endforeach
											@endif
											</select>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">อาการ และ สาเหตุ : </label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="workSymptom" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">การแก้ไข : </label>
										<div class="col-md-4">
											<select class="form-control" id="workEdit" >
												<option value="1"> แก้ไขได้</option>
												<option value="0"> แก้ไขไม่ได้</option>
											</select>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">รายละเอียดการแก้ไข : </label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="workDetails" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สถานะ : </label>
										<div class="col-md-4">
											<select class="form-control" id="workStatus" >
												<option value="1">ใช้งานได้</option>	
												<option value="0">ใช้งานไมได้ส่งซ่อม</option>
											</select>
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
							<a href="javascript:;" class="btn btn-sm btn-primary EquipmentSave" rel="">เพิ่มรายการเครื่องจักรเสียหาย</a>
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
			url: '{{ action("FTS\OperationMachineController@postDatatable",$sRow->id) }}',
			data: function ( d ) { },
            method: 'POST'
        },
        columns: [
            {data: 'workNumber', title :'เลขที่เอกสาร', className: 'text-center w80', orderable: true},
            {data: 'workDate', title :'วันที่', className: 'text-center w60', orderable: true},
            {data: 'MachineName', title :'เครื่องจักร', className: 'text-center w125', orderable: false},
            {data: 'workSymptom', title :'<center>อาการ และ สาเหตุ</center>', className: 'w225', orderable: false},
            {data: 'workEdit2', title :'การแก้ไข', className: 'text-center w100', orderable: false},
            {data: 'workDetails', title :'<center>รายละเอียดการแก้ไข</center>', className: 'w225', orderable: false},
            {data: 'workStatus2', title :'สถานะ', className: 'text-center w100', orderable: false},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: false},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false}
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			if( aData['deleted_at1'] || aData['deleted_at2'] ){
				$('td', nRow).css('background-color', 'khaki');
			}
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-EquipmentUpdate" rel="'+aData['id']+'" class="btn btn-xs btn-primary EquipmentUpdate" style="margin:0px;" data-toggle="modal" style="margin:0px;">'+aData['workNumber']+'</a> '
			);
		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});

	$( '#modal-EquipmentNew' ).on( "click", '.EquipmentSave', function() {
		if( $('#modal-EquipmentNew #MachineID').val() ){
			if(confirm('ยืนยันการทำรายการ ?') == true){
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: { 
						'MachineID' 	: $('#modal-EquipmentNew #MachineID').val(), 
						'workDate' 		: $('#modal-EquipmentNew #workDate').val(), 
						'workSymptom' 	: $('#modal-EquipmentNew #workSymptom').val(), 
						'workDetails' 	: $('#modal-EquipmentNew #workDetails').val(), 
						'workEdit' 		: $('#modal-EquipmentNew #workEdit').val(), 
						'workStatus' 	: $('#modal-EquipmentNew #workStatus').val()
					},
					url: '{{ action("FTS\OperationMachineController@store",$sRow->id) }}',
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
									window.location.href = '{{ action("FTS\OperationMachineController@index",$sRow->id) }}';
								@else
									$('#modal-EquipmentNew').modal('show');
									oTable.draw(false);
									$('#modal-EquipmentNew').modal('hide');
									$('#modal-EquipmentNew #workSymptom').val('');
									$('#modal-EquipmentNew #workDetails').val('');
									$('#modal-EquipmentNew').find('select').val('');
									
								@endif
							}
						}
					}
				});
			}
		}
	});
	
	@if( isset($resource) && $resource == 'create' )
		$('#modal-EquipmentNew').modal('show');
	@endif
});
</script>
@endpush