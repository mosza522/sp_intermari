@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายท่าสินวัฒนา</li>
				<li>การปฏิบัติงาน ({{ $sRow->pageHeader }})</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายการเบิกน้ำมัน</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"> รายการเบิกน้ำมัน ใบแจ้งงาน  {{ $sRow->work_number }} </h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								<div class="col-md-12 m-b-10" style="min-height:300px;">
									<div class="p-l-0 text-left pull-right m-b-5">
										<a href="#divModal" id="ModalCreated" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มรายการเบิกน้ำมัน</a>
									</div>
									<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
								</div>
								
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-6 text-left">
											<a href="{{ action($sRow->sPath.'\PrepareController@show', $sRow->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าการปฏิบัติงาน</a>
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
		
		<!-- #modal-divModal-->
		<div class="modal fade" id="divModal" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">

						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
								
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่การเบิก : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" placeholder="AUTO" id="FuelCode" readonly/>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เครื่องจักร : </label>
										<div class="col-md-6">
											<select class="form-control" id="MachineID">
												<option value="">เลือกเครื่องจักร</option>
												@foreach ($sRowMachine as $row)
													<option value="{{$row->id}}">{{$row->MachineName}}</option>
												@endforeach
											</select>
										</div>
									</div>
						
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เบอร์ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="FuelNumber" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ระดับน้ำมันก่อนเติม : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="FuelBefore" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">จำนวนน้ำมันคงเหลือ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="FuelBalance" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ชื่อผู้เบิก : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="PickerName" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วัตถุประสงค์ : </label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="Objective" />
										</div>
									</div>
									
								</div>
							</fieldset>
						</form>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						<a href="javascript:;" class="btn btn-sm btn-primary Created">เพิ่มรายการเบิกน้ำมัน</a>
					</div>
				</div>
			</div>
		</div>
		
		

		
		<!-- #modal-divModalEdit-->
		<div class="modal fade" id="divModalEdit" style="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body form-horizontal">

						<form autocomplete="off">
							<fieldset class="m-t-10">
								<div class="col-md-12">
								
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่การเบิก : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" placeholder="AUTO" id="FuelCode" readonly/>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เครื่องจักร : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="MachineName" readonly/>
										</div>
									</div>
						
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เบอร์ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="FuelNumber" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ระดับน้ำมันก่อนเติม : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="FuelBefore" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">จำนวนน้ำมันคงเหลือ : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="FuelBalance" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ชื่อผู้เบิก : </label>
										<div class="col-md-6">
											<input type="text" class="form-control text-center" id="PickerName" />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วัตถุประสงค์ : </label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="Objective" />
										</div>
									</div>
									
								</div>
							</fieldset>
						</form>
					</div>
					<div class="modal-footer">
						<div class="pull-left">
							<a href="javascript:;" class="btn btn-sm btn-danger Destroy">ลบรายการเบิกน้ำมัน</a>
						</div>
						<div class="pull-right">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
							<a href="javascript:;" class="btn btn-sm btn-primary Updated">บันทึกข้อมูลการเปลี่ยนแปลง</a>
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
		iDisplayLength: 50,
		order: [[ 0, "desc" ]],
		scrollY: ''+($(window).height()-250)+'px',
        ajax: {
			url: '{{ action("SWP\Operation\FuelController@postDatatable", $sRow->id) }}',
			data: function ( d ) {  
				d.Where={};
				d.onlyTrashed	= $('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
			{data: 'id', title :'แก้ไข', className: 'text-center action w60' },
            {data: 'FuelCode', title :'เลขที่การเบิก', className: 'text-center w80', orderable: false},
            {data: 'StatusName', title :'สถานะ', className: 'text-center w80', orderable: false},
            {data: 'MachineName', title :'เครื่องจักร', className: 'text-center w150', orderable: false},
            {data: 'FuelNumber', title :'เบอร์', className: 'text-center w100', orderable: false},
            {data: 'FuelBefore', title :'ระดับน้ำมันก่อนเติม', className: 'text-center w110', orderable: false},
            {data: 'FuelBalance', title :'จำนวนน้ำมันคงเหลือ', className: 'text-center w110', orderable: false},
            {data: 'Objective', title :'วัตถุประสงค์', className: 'text-center w200', orderable: false},
            {data: 'PickerName', title :'ชื่อผู้เบิก', className: 'text-center w150', orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			if( aData['Status'] == '1' ){
				$('td:first-child', nRow).data('aData',  aData);
				$('td:first-child', nRow).html(''
					+ '<a href="#divModalEdit" rel="'+aData['id']+'" class="btn btn-xs btn-primary divModalUpdate" style="margin:0px;" data-toggle="modal"><i class="fa fa-eye"></i> ดำเนินการ</a> '
				);
			}
		}
    });
	
	
	$( 'div' ).on( "click", '#ModalCreated', function() {
		$("#divModal input").val('');
	});
	
	$( '#divModal' ).on( "click", '.Created', function() {
		if( $("#divModal #MachineID").val() == '' ){
			alert('กรุณาเลือกเครื่องจักร');
		}else{
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 
					'MachineID' : $("#divModal #MachineID").val(),
					'FuelNumber' : $("#divModal #FuelNumber").val(),
					'FuelBefore' : $("#divModal #FuelBefore").val(),
					'FuelBalance' : $("#divModal #FuelBalance").val(),
					'Objective' : $("#divModal #Objective").val(),
					'PickerName' : $("#divModal #PickerName").val()
				},
				url: '{{ action("SWP\Operation\FuelController@store", $sRow->id) }}',
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
						}
						$('#divModal').modal('hide');
					}
				}
			});
			$("#divModal input").val('');
		}
	});
	
	

	$( '#data-table' ).on( "click", '.divModalUpdate', function() {
		if( $(this).parent().data('aData').FuelCode ){
			$('#divModalEdit #MachineName').val($(this).parent().data('aData').MachineName);
			$('#divModalEdit #FuelCode').val($(this).parent().data('aData').FuelCode);
			$('#divModalEdit #FuelNumber').val($(this).parent().data('aData').FuelNumber);
			$('#divModalEdit #FuelBefore').val($(this).parent().data('aData').FuelBefore);
			$('#divModalEdit #FuelBalance').val($(this).parent().data('aData').FuelBalance);
			$('#divModalEdit #Objective').val($(this).parent().data('aData').Objective);
			$('#divModalEdit #PickerName').val($(this).parent().data('aData').PickerName);
			$('#divModalEdit').attr('rel', $(this).parent().data('aData').id);
		}
	});
	
	
	
	
	$( '#divModalEdit' ).on( "click", '.Updated', function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$.ajax({
				type: 'PUT',
				dataType: 'JSON',
				data: { 
					'id' : $("#divModalEdit").attr('rel'),
					'FuelNumber' : $("#divModalEdit #FuelNumber").val(),
					'FuelBefore' : $("#divModalEdit #FuelBefore").val(),
					'FuelBalance' : $("#divModalEdit #FuelBalance").val(),
					'Objective' : $("#divModalEdit #Objective").val(),
					'PickerName' : $("#divModalEdit #PickerName").val()
				},
				url: '{{ action("SWP\Operation\FuelController@update", array($sRow->id,0)) }}',
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
							$('#divModalEdit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	
	$( '#divModalEdit' ).on( "click", '.Destroy', function() {
		if(confirm('ยืนยันการทำรายการ\nลบรายการเบิกน้ำมัน ?') == true){
			$.ajax({
				type: 'DELETE',
				dataType: 'JSON',
				data: { 'id' : $("#divModalEdit").attr('rel') },
				url: '{{ action("SWP\Operation\FuelController@update", array($sRow->id,0)) }}',
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
							$('#divModalEdit').modal('hide');
						}
					}
				}
			});
		}
	});
	
	
					
});
</script>
@endpush