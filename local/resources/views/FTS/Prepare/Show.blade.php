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
			<h1 class="page-header">
				@if( $sRow->work_type == 'StevieDore' )
				ใบแจ้งงานสตีวีโดว์
				@else
				ใบแจ้งงานทุ่น
				@endif
			</h1>
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
								@include('FTS.Prepare.inc_head_content')
								

								@if( $sRow->work_type == 'Buoy' )
								<div class="col-md-12 m-t-40" style="min-height:200px;">
									<div class="p-l-0 text-left pull-right">
										<a href="#modal-buoy" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มทุ่นเข้าไปในรายการปฎิบัติงาน</a>
									</div>
									<table id="data-table" class="table table-striped table-bordered" width="100%" ></table>
								</div>
								@endif
								
								
								@if( empty($sRow->deleted_at) )
								<div class="col-md-12">
									<div class="form-group m-b-5 m-t-25">
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\PrepareController@index') }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้ารายการใบแจ้งงานทุ่น, สตีวีโดว์</a>
										</div>
										<div class="col-xs-4 text-center">
										</div>
										<div class="col-xs-4 text-right">
											<div class="btn-group dropup m-r-5 m-b-5">
												<a href="javascript:;" class="btn btn-success">เตรียมความพร้อม</a>
												<a href="javascript:;" data-toggle="dropdown" class="btn btn-success dropdown-toggle">
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu pull-right" style="background-color: burlywood;">
													<li><a href="{{ action('FTS\PrepareSweepController@index', $sRow->id) }}/{{ $sRow->OperationID }}" >สายกวาด</a></li>
													<li><a href="{{ action('FTS\PrepareForemanController@index', $sRow->id) }}/{{ $sRow->OperationID }}">โฟร์แมน</a></li>
													@if( $sRow->work_type != 'Buoy' )
													<li><a href="{{ action('FTS\PrepareMachineController@index',  $sRow->id) }}/{{ $sRow->OperationID }}">เครื่องจักรและอุปกรณ์</a></li>
													<li><a href="{{ action('FTS\PrepareStaffController@index', $sRow->id) }}/{{ $sRow->OperationID }}">พนักงาน</a></li>
													@endif
												</ul>
											</div>
										</div>
									</div>
								</div>
								@endif
							</fieldset>
						</div>
					</div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		
		
		

		
		
		
		
	@if( $sRow->work_type == 'Buoy' )
		<!-- #modal-buoy-->
		<div class="modal fade" id="modal-buoy" style="">
			<div class="modal-dialog" style="width: 95%;">
				<div class="modal-content">
					<div class="modal-body">
						<table id="data-table-buoy" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
									<th colspan="3"></th>
									<th colspan="2" class="text-center">น้ำหนักสินค้าสะสม</th>
									<th colspan="2" class="text-center">น้ำหนักทุ่นสะสม</th>
									<th colspan="3" class="text-center">สถานะคิวงานล่าสุด</th>
									<th colspan="3"></th>
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
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						<a href="javascript:;" class="btn btn-sm btn-primary BuoyInsert">เพิ่มทุ่นเข้าไปในรายการปฎิบัติงาน</a>
					</div>
				</div>
			</div>
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
											<input type="text" class="form-control text-center datetimepicker" id="workStart" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันหยุดปฏิบัติงาน : </label>
										<div class="col-md-7">
											<input type="text" class="form-control text-center" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สถานะการดำเนินงาน : </label>
										<div class="col-md-7">
											<input type="text" class="form-control text-center" id="workStatus" readonly />
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
						<div class="pull-left">
							<a href="javascript:;" class="btn btn-sm btn-danger BuoyDelete" rel="">ยกเลิกทุ่นในรายการปฎิบัติงานนี้</a>
						</div>
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary BuoyUpdate" rel="">บันทึกข้อมูลการเปลี่ยนแปลงทุ่น</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
@stop


@push('scripts')
<link href="assets/plugins/datetimepicker/build/jquery.datetimepicker.min.css" rel="stylesheet" />
<style>

.dataTables_scrollBody {
	min-height : 300px;
}
</style>
@endpush

@push('scripts')
@if( $sRow->work_type == 'Buoy' )
	<script src="assets/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
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
			iDisplayLength: 50,
			order: [[ 0, "desc" ]],
			scrollY: '630px',
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
				if( aData['workStatus'] == 1 || aData['workStatus'] == 0 ){
					$('td:first-child', nRow).data('aData',  aData);
					$('td:first-child', nRow).html(''
						+ '<a href="#modal-buoy-edit" rel="'+aData['id']+'" class="btn btn-xs btn-primary BuoyModalUpdate" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
					);
				}else{
					$('td:first-child', nRow).html('-');
				}
				
				$('td:eq(1)', nRow).html(''
					+ '<div class="btn-group m-r-5 ">'
					+ '	<a href="javascript:;" data-toggle="dropdown" class="btn btn-xs btn-default dropdown-toggle"> '+aData['workNumber']+'  </a>'
					+ '		<ul class="dropdown-menu pull-right" style="border-radius: 3px;min-width: 120px;padding: 0px 0;text-align: center;">'
					+ '			<li><a style="font-weight: 300;color: #fff; background: #008a8a;" href="{{ action("FTS\PrepareMachineController@index", $sRow->id) }}/'+aData['id']+'/">เครื่องจักร</a></li>'
					+ '			<li><a style="font-weight: 300;color: #fff; background: #008a8a;" href="{{ action("FTS\PrepareStaffController@index", $sRow->id) }}/'+aData['id']+'/">พนักงาน</a></li>'
					+ '		</ul>'
					+ '</div>'
				);
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
				$('#modal-buoy-edit #workStart').val($(this).parent().data('aData').workStart);
				$('#modal-buoy-edit #workFinish').val($(this).parent().data('aData').workFinish);
				$('#modal-buoy-edit #workStatus').val($(this).parent().data('aData').workStatus2);
				$('#modal-buoy-edit #workNote').val($(this).parent().data('aData').workNote);
				$('#modal-buoy-edit .BuoyUpdate').attr('rel', $(this).parent().data('aData').id);
				$('#modal-buoy-edit .BuoyDelete').attr('rel', $(this).parent().data('aData').id);
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
	
		$('.datetimepicker').datetimepicker('destroy');
		$('.datetimepicker').datetimepicker({format:'d-m-Y H:i'});
	});
	</script>
	@endif
@endpush