@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>
					@if( $sRow->work_type == 'StevieDore' )
					ใบแจ้งงานสตีวีโดว์
					@else
					ใบแจ้งงานทุ่น
					@endif
					:  {{ $sRow->work_number }}
				</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบเตรียมความพร้อมทุ่น</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>  
								@if( $sRow->work_type == 'StevieDore' )
								ใบแจ้งงานสตีวีโดว์
								@else
								ใบแจ้งงานทุ่น
								@endif
								:  {{ $sRow->work_number }}
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
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ลูกค้า</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="{{ $sRow->OwnerName }}" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เรือใหญ่</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ETA/วันที่เรือใหญ่</label>
										<div class="col-md-9">
											<input type='text' class="form-control text-center w140" value="{{ isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta') }}" readonly />
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
													<input type="text" class="form-control pull-left w225 m-r-5"  value="{{ $row->ProductName }}" readonly />
													<input type="text" class="form-control text-right w110 pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}" readonly />
													<input type="text"  class="form-control text-center w50 pull-left" value="{{ $sRow->job_unit }}" readonly />
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
								</div>
								
								<div class="col-md-12 m-b-20" style="min-height:200px;">
									<div class="p-l-0 text-left pull-right">
										<a href="#modal-buoy" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มทุ่นเข้าไปในรายการปฎิบัติงาน</a>
									</div>
									<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
								</div>
								
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-6 text-left">
											<a href="{{ action('FTS\PrepareController@show', $sRow->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบเตรียมความพร้อม</a>
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
			url: '{{ action("FTS\PrepareBuoyController@postDatatable", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
			{data: 'id', title :'แก้ไข', className: 'text-center action w70', orderable: false},
            {data: 'workNumber', title :'ใบงานเรือใหญ่', className: 'text-center w80 input', orderable: false},
            {data: 'BuoyName', title :'ทุ่น', className: 'text-center w90', orderable: false},
            {data: 'workStart', title :'วันเริ่มปฏิบัติงาน', className: 'text-center w100', orderable: false},
            {data: 'workFinish', title :'วันหยุดปฏิบัติงาน', className: 'text-center w100', orderable: false},
            {data: 'workStatus2', title :'สถานะการดำเนินงาน', className: 'text-center w120', orderable: false},
            {data: 'workNote', title :'หมายเหตุ', className: 'text-center w200', orderable: false},
            {data: 'workStaff', title :'พนักงาน', className: 'text-center w80', orderable: false},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: false},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:first-child', nRow).data('aData',  aData);
			$('td:first-child', nRow).html(''
				+ '<a href="#modal-buoy-edit" rel="'+aData['id']+'" class="btn btn-xs btn-primary BuoyModalUpdate" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
			);
			
			if( aData['workStatus'] == 1 ){
				$('td:eq(1)', nRow).html(''
					+ '<a href="{{ action('FTS\PrepareStaffController@index', $sRow->id) }}/'+aData['id']+'" class="btn btn-xs btn-warning" style="margin:0px;">'+aData['workNumber']+'</a> '
				);
			}
		}
    });

	
	oTableBuoy = $('#data-table-buoy').DataTable({
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
			url: '{{ action("FTS\PrepareBuoyController@postDatatableWithWeight", $sRow->SmdID) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
            {data: 'DepartmentID', title :'#', className: 'text-center w20 input', orderable: false},
            {data: 'BuoyName', title :'ทุ่น', className: 'text-center w80', orderable: false},
            {data: 'ProductName', title :'สินค้า', className: 'text-left w200', orderable: false},
            {data: 'WMonthly', title :'เดือน', className: 'text-right w50', orderable: true},
            {data: 'WYearly', title :'ปี', className: 'text-right w50', orderable: true},
            {data: 'WeightMonthly', title :'เดือน', className: 'text-right w50', orderable: true},
            {data: 'WeightYearly', title :'ปี', className: 'text-right w50', orderable: true},
            {data: 'LastWork', title :'วันที่เริ่ม', className: 'text-center w110', orderable: true},
            {data: 'LastJob', title :'เลขที่ใบสั่งขาย', className: 'text-center w80', orderable: false},
            {data: 'LastEnd', title :'วันที่เสร็จ', className: 'text-center w110', orderable: false},
            {data: 'BuoyStatus', title :'สถานะ', className: 'text-center w90', orderable: true},
            {data: 'QueueJob', title :'คิวงานถัดไป ที่ยังไม่ถึงวันดำเนินการ', className: 'text-center w500', orderable: false},
            {data: 'BuoyNote', title :'หมายเหตุ', className: 'text-center w250', orderable: true},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			var rowId = aData['DepartmentID'];
			if( rowId != 0 ){
				$('td:first-child', nRow).html('<input name="DepartmentID" value="'+rowId+'" type="radio" >');
				$('td', nRow).css("font-weight", "bold");
			}
		}
    });
	
	$( '#modal-buoy' ).on( "click", '.BuoyInsert', function() {
		if( $("#modal-buoy input[type='radio']:checked").val() === undefined ){
			alert('กรุณาเลือกเทุ่นในรายการปฎิบัติงาน');
		}else{
			
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'DepartmentID' : $("#modal-buoy input[type='radio']:checked").val() },
				url: '{{ action("FTS\PrepareBuoyController@AjaxInsert", $sRow->id) }}',
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
							oTableBuoy.draw(false);
						}
						$('#modal-buoy').modal('hide');
					}
				}
			});
			$("#modal-buoy input[type='radio']:checked").prop('checked', false)
		}
	});
	
	$( '#data-table' ).on( "click", '.BuoyModalUpdate', function() {
		if( $(this).parent().data('aData').workNumber ){
			$('#modal-buoy-edit #workNumber').val($(this).parent().data('aData').workNumber);
			$('#modal-buoy-edit #BuoyName').val($(this).parent().data('aData').BuoyName);
			$('#modal-buoy-edit #workStart').val($(this).parent().data('aData').workStart2);
			$('#modal-buoy-edit #workStart2').val($(this).parent().data('aData').workStart2);
			$('#modal-buoy-edit #workFinish').val($(this).parent().data('aData').workFinish2);
			$('#modal-buoy-edit #workFinish2').val($(this).parent().data('aData').workFinish2);
			$('#modal-buoy-edit #workStatus').val($(this).parent().data('aData').workStatus2);
			$('#modal-buoy-edit #workNote').val($(this).parent().data('aData').workNote);
			$('#modal-buoy-edit .BuoyUpdate').attr('rel', $(this).parent().data('aData').id);
			$('#modal-buoy-edit .BuoyDelete').attr('rel', $(this).parent().data('aData').id);
			if( $(this).parent().data('aData').workStatus == 1 ){
				$('#modal-buoy-edit .BuoyDelete').hide();
				$('#modal-buoy-edit #workStart').parent().parent().show();
				$('#modal-buoy-edit #workStart2').parent().parent().hide();
			}else{
				$('#modal-buoy-edit .BuoyDelete').show();
				$('#modal-buoy-edit #workStart').parent().parent().hide();
				$('#modal-buoy-edit #workStart2').parent().parent().show();
			}
			
			if( $(this).parent().data('aData').workStatus == 0 ){
				$('#modal-buoy-edit .BuoyUpdate').hide();
				$('#modal-buoy-edit .BuoyDelete').hide();
			}else{
				$('#modal-buoy-edit .BuoyUpdate').show();
				$('#modal-buoy-edit .BuoyDelete').show();
			}
		}
	});
	
	$( '#modal-buoy-edit' ).on( "click", '.BuoyUpdate', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel'), 'workStart' : $('#modal-buoy-edit #workStart').val(), 'workNote' : $('#modal-buoy-edit #workNote').val() },
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
	
	$( '#modal-buoy-edit' ).on( "click", '.BuoyDelete', function() {
		if(confirm('ยืนยันการทำรายการ\nยกเลิกทุ่นในรายการปฎิบัติงานนี้ ?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel') },
				url: '{{ action("FTS\PrepareBuoyController@AjaxDelete", $sRow->id) }}',
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
});
</script>
@endpush