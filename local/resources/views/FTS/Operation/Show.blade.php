@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>ใบแจ้งงาน:  {{ $sRow->work_number }}</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">การปฏิบัติงานเรือใหญ่</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>  
								การปฏิบัติงานเรือใหญ่
							</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								<div class="col-md-6">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่ใบแจ้งงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->work_number }}" readonly />
											<input type="text" class="form-control text-center w140 pull-left" value="{{ date('d-m-Y',strtotime($sRow->created_at)) }}" readonly />
										</div>
									</div>
									<div class="form-group m-b-10">
										<label class="col-md-3 control-label">เรือใหญ่</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ประเภทงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140" value="{{ $sRow->job_transport }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ETA/วันที่เรือใหญ่</label>
										<div class="col-md-9">
											<input type='text' class="form-control text-center w140" value="{{ isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta') }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สายกวาดทะเล</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ $sRow->work_sealine=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_sealine=='0'?'No':'Yes' }}</a></div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="3" readonly >{{ isset($sRow->work_note)?$sRow->work_note:'' }}</textarea>
										</div>
									</div>
									
									
								</div>
								
								<div class="col-md-6">

									<div class="form-group m-b-0">
										<label class="col-md-3 control-label">สินค้า</label>
										<div class="row col-md-9 Product_List">
											@if( !empty($rowItem) )
												@foreach($rowItem AS $row)
											<div class="Product_Item">
												<div class="pull-left m-l-10 m-b-5">
													<input type="text" style="width:55%;" class="form-control pull-left m-r-5"  value="{{ $row->ProductName }}" readonly />
													<input type="text" style="width:30%;" class="form-control text-right pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}" readonly />
													<input type="text" style="width:12%;" class="form-control text-center pull-left" value="{{ $sRow->job_unit }}" readonly />
												</div>
											</div>
												@endforeach
											@endif
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">น้ำหนักรวม</label>
										<div class="col-md-9 p-r-5">
											<input type="text" class="form-control text-right pull-left m-r-5 w140" value="{{ isset($sRow->job_weight)?number_format($sRow->job_weight,3):'0' }}" readonly />
											<input type="text" class="form-control text-center w80 pull-left" value="{{ $sRow->job_unit }}" readonly />
										</div>
									</div>
									
									@if( $sRow->work_type == 'Buoy' )
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">อัตราการขนถ่าย</label>
										<div class="col-md-9 p-r-5">
											<input type="text" class="form-control text-right pull-left m-r-5 w140" value="{{ isset($sRow->work_load)?number_format($sRow->work_load,3):'0' }}" readonly />
											<input type="text" class="form-control text-center w80 pull-left" value="{{ $sRow->job_unit }}/วัน" readonly />
										</div>
									</div>
									@else
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">Grab</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ $sRow->work_grab=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_grab=='0'?'No':'Yes' }}</a></div>
									</div>
									@endif
									
									@if( $sRow->work_type == 'Buoy' )
									<div class="form-group m-b-5 m-t-20">
										<label class="col-md-3 control-label"></label>
										<div class="col-md-9">
											<a href="{{ action('FTS\OperationDailyReportController@index', $sRow->id) }}" class="btn btn-sm btn-primary w140">Daily Report</a>
											<a href="{{ action('FTS\OperationDailyReportController@create', $sRow->id) }}" class="btn btn-sm btn-info w140">New Daily Report</a>
										</div>
									</div>
									@endif
									
								</div>
								
								<div class="col-md-12" style="min-height:200px;">
									<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
								</div>
								
								<div class="col-md-12">
									<div class="form-group m-b-5 m-t-25">
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationController@index') }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้ารายการ การปฏิบัติงานเรือใหญ่</a>
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
		
		

		<!-- #modal-buoy-edit-->
		<div class="modal fade" id="modal-buoy-edit" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">
					

						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ใบงาน : </label>
										<div class="col-md-7">
											<input type="text" class="form-control text-center" id="workNumber" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ทุ่น : </label>
										<div class="col-md-7">
											<input type="text" class="form-control text-center" id="BuoyName" readonly />
										</div>
									</div>
						
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันเริ่มปฏิบัติงาน : </label>
										<div class="col-md-7">
											<input type="text" class="form-control text-center" id="workStart" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันหยุดปฏิบัติงาน : </label>
										<div class="col-md-7">
											<input type="text" class="form-control text-center datetimepicker" id="workFinish" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สถานะการดำเนินงาน : </label>
										<div class="col-md-7">
											<select class="form-control" id="workStatus" >
												<option value="1">รอดำเนินการ</option>
												<option value="2">กำลังดำเนินการ</option>
												<option value="3">ดำเนินการเสร็จ</option>
											</select>
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" id="workNote" />
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="modal-footer">
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary BuoyUpdate" rel="">บันทึกข้อมูล</a>
						</div>
					</div>
				</div>
			</div>
		</div>
@stop


@push('scripts')
<link href="assets/plugins/datetimepicker/build/jquery.datetimepicker.min.css" rel="stylesheet" />
@endpush


@push('scripts')
<script src="assets/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script>
$(function() {
	oTable = $('#data-table').DataTable({
		"sDom": "tr", 
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
		iDisplayLength: 10,
		order: [[ 0, "desc" ]],
        ajax: {
			url: '{{ action("FTS\PrepareBuoyController@postDatatable", $sRow->id) }}',
			data: function ( d ) {
				d.Where={};
				d.workStatus = 1;
			},
            method: 'POST'
        },
        columns: [
			{data: 'id', title :'ดำเนินการ', className: 'text-center action w70', orderable: false},
            {data: 'workNumber', title :'ใบงาน', className: 'text-center w80 input', orderable: false},
            {data: 'BuoyName', title :'ทุ่น', className: 'text-center w90', orderable: false},
            {data: 'workStart', title :'วันเริ่มปฏิบัติงาน', className: 'text-center w100', orderable: false},
            {data: 'workFinish', title :'วันหยุดปฏิบัติงาน', className: 'text-center w100', orderable: false},
            {data: 'workStatus2', title :'สถานะการดำเนินงาน', className: 'text-center w120', orderable: false},
            {data: 'workNote', title :'หมายเหตุ', className: 'text-center', orderable: false}
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-buoy-edit" rel="'+aData['id']+'" class="btn btn-xs btn-primary BuoyModalUpdate" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
			);
			
			if( aData['workStatus'] == 1 ){
				$('td:eq(1)', nRow).html('<a class="btn btn-xs btn-info btnInfo" style="margin:0px;">'+aData['workNumber']+'</a>');
			}else{
				$('td:eq(1)', nRow).html('<a href="{{ action('FTS\OperationController@index') }}/'+aData['id']+'/buoy" class="btn btn-xs btn-info" style="margin:0px;">'+aData['workNumber']+'</a>');
			}
		}
    });
	
	
	$( '#data-table' ).on( "click", '.BuoyModalUpdate', function() {
		if( $(this).parent().data('aData').workNumber ){
			$('#modal-buoy-edit #workNumber').val($(this).parent().data('aData').workNumber);
			$('#modal-buoy-edit #BuoyName').val($(this).parent().data('aData').BuoyName);
			$('#modal-buoy-edit #workStart').val($(this).parent().data('aData').workStart);
			$('#modal-buoy-edit #workFinish').val($(this).parent().data('aData').workFinish);
			$('#modal-buoy-edit #workStatus').val($(this).parent().data('aData').workStatus);
			$('#modal-buoy-edit #workNote').val($(this).parent().data('aData').workNote);
			$('#modal-buoy-edit .BuoyUpdate').attr('rel', $(this).parent().data('aData').id);
			$('#modal-buoy-edit .BuoyInfo').attr('rel', $(this).parent().data('aData').id);
		}
	});
	$( '#data-table' ).on( "click", '.btnInfo', function() {
		alert('ต้องเลือกสถานะการดำเนินงานเป็นกำลังดำเนินการก่อน');
	});
			
	$( '#modal-buoy-edit' ).on( "click", '.BuoyUpdate', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel'), 'workFinish' : $('#modal-buoy-edit #workFinish').val(), 'workStatus' : $('#modal-buoy-edit #workStatus').val(), 'workNote' : $('#modal-buoy-edit #workNote').val() },
				url: '{{ action("FTS\PrepareBuoyController@AjaxUpdate", $sRow->id) }}',
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
							$('#modal-buoy-edit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	$('.datetimepicker').datetimepicker('destroy');
	$('.datetimepicker').datetimepicker({format:'d-m-Y H:i'});
});
</script>
@endpush