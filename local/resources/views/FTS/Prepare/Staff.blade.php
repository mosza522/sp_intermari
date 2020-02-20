@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>
					@if( $rowItem->work_type == 'StevieDore' )
					ใบแจ้งงานสตีวีโดว์
					@else
					ใบแจ้งงานทุ่น
					@endif
					:  {{ $rowItem->work_number }}
				</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายชื่อพนักงานปฏิบัติงานเรือใหญ่</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>
								@if( $rowItem->work_type == 'StevieDore' )
								ใบแจ้งงานสตีวีโดว์
								@else
								ใบแจ้งงานทุ่น
								@endif
								:  {{ $rowItem->work_number }}
							</h4>
						</div>
						<div class="panel-body form-horizontal">
                            <form class="form-horizontal" action="{{action('FTS\PrepareStaffController@update', array($rsOperation->ItemID, $rsOperation->id) )}}" method="POST">
								{{ csrf_field() }}<input name="_method" type="hidden" value="PUT">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label">เลขที่ใบแจ้งงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $rowItem->work_number }}" readonly />
											<input type="text" class="form-control text-center w140 pull-left" value="{{ date('d-m-Y',strtotime($rowItem->created_at)) }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-10">
										<label class="col-md-2 control-label">ใบงานเรือใหญ่</label>
										<div class="col-md-9">
											<input type="text" class="form-control w290" value="{{ $rsOperation->workNumber }}{{ empty($rsOperation->BuoyName)?'':', ทุ่น'.$rsOperation->BuoyName }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label">ตำแหน่ง</label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">1.) หัวหน้าทุ่น</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_1)?$rsOperation->Staff_1:'' }}" name="Staff_01" value="{{ $rsOperation->Staff_01 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา  <span style="color: red;"></span></div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">2.) รองหัวหน้าทุ่น</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_2)?$rsOperation->Staff_2:'' }}" name="Staff_02" value="{{ $rsOperation->Staff_02 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">3.) จนท. ขับเครน</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_3)?$rsOperation->Staff_3:'' }}" name="Staff_03" value="{{ $rsOperation->Staff_03 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">4.) พนักงานควบคุมเครื่องจักรกลหนัก</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_4)?$rsOperation->Staff_4:'' }}" name="Staff_04" value="{{ $rsOperation->Staff_04 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">5.) พนักงานปากเรือ</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_5)?$rsOperation->Staff_5:'' }}" name="Staff_05" value="{{ $rsOperation->Staff_05 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">6.) พนง.บำรุงรักษาเครื่องจักรกลหนัก</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_6)?$rsOperation->Staff_6:'' }}" name="Staff_06" value="{{ $rsOperation->Staff_06 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">7.) ช่างไฟฟ้า</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_7)?$rsOperation->Staff_7:'' }}" name="Staff_07" value="{{ $rsOperation->Staff_07 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">8.) ช่างเครื่อง</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_8)?$rsOperation->Staff_8:'' }}" name="Staff_08" value="{{ $rsOperation->Staff_08 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-9">
											<div class="pull-left w300 m-t-7 b">9.) ช่างเชื่อม</div>
											<div class="pull-left w40 m-t-7 m-l-10">จำนวน</div>
											<div class="pull-left w60">
												<input type="text" class="form-control text-center input-sm" placeholder="{{ isset($rsOperation->Staff_9)?$rsOperation->Staff_9:'' }}" name="Staff_09" value="{{ $rsOperation->Staff_09 }}" required/>
											</div>
											<div class="pull-left w60 m-t-7 m-l-10">อัตรา</div>
										</div>
									</div>
									
									@if(  $rowItem->work_type == 'StevieDore' || (  $rowItem->work_type == 'Buoy' && !empty($rsOperation)  ) )
									<div class="form-group m-b-10">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-5">
									@if(  empty($rowItem->deleted_at) )
										@if( empty($rsOperation->Staff_01) )
											@if( $rowItem->work_type == 'Buoy' )
											<button type="submit" class="btn btn-sm btn-primary" >จัดสรรรายชื่อพนักงานตามอัตราที่กำหนด</button>
											@else
											<button type="submit" class="btn btn-sm btn-primary" >บันทึกข้อมูลจำนวนพนักงานปฏิบัติงานเรือใหญ่</button>
											@endif
										@else
											<button type="submit" class="btn btn-sm btn-primary" >ปรับปรุงข้อมูลจำนวนพนักงานปฏิบัติงานเรือใหญ่</button>
										@endif
									@endif
											<br/><span style="color: red;"></span>
										</div>
									</div>
									@endif
								</div>
								
								@if( !empty($rsOperation->Staff_01) )
								<div class="col-md-12 m-t-5" style="min-height:200px;">
									<div class="p-l-0 text-left pull-right">
										<a href="#modal-StaffNew" class="btn btn-sm btn-primary" data-toggle="modal">เพิ่มพนักงานปฏิบัติงานเรือใหญ่</a>
									</div>
									<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
								</div>
								@endif
								
								
								
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-6 text-left">
											<a href="{{ action('FTS\PrepareController@show', $rowItem->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบเตรียมความพร้อม</a>
										</div>
										<div class="col-xs-6 text-right"></div>
									</div>
								</div>
								
							</fieldset>
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
										<select class="form-control" name="DepartmentID" id="DepartmentID" >
											<option value="0"> กรุณาเลือกแผนกทุ่นในการปฏิบัติงานเรือใหญ่ </option>
										@if( !empty($rowDivision) )
											@foreach($rowDivision AS $row)
											<option value="{{ $row->id }}">{{ $row->DepartmentName }}</option>
											@endforeach
										@endif
										</select>
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
						<a href="javascript:;" class="btn btn-sm btn-primary StaffSave" rel="">เพิ่มพนักงานปฏิบัติงานเรือใหญ่</a>
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
							<a href="javascript:;" class="btn btn-sm btn-danger StaffDelete" rel="">ยกเลิกพนักงานปฏิบัติงานเรือใหญ่นี้</a>
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
			url: '{{ action("FTS\PrepareStaffController@postDatatable", array($rsOperation->ItemID, $rsOperation->id)) }}',
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
            {data: 'DivisionName', title :'ฝ่าย', className: 'text-left w150', orderable: false},
            {data: 'DepartmentName', title :'แผนก', className: 'text-left w150', orderable: false},
            {data: 'PositionName', title :'ตำแหน่ง', className: 'text-left w150', orderable: false},
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
			url: '{{ action("FTS\PrepareStaffController@postDatatableWithWeight", array($rsOperation->ItemID, $rsOperation->id)) }}',
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
					data: { 'StaffID' : StaffID.join() , 'OperationID' : {{ $rsOperation->id }} },
					url: '{{ action("FTS\PrepareStaffController@AjaxInsert", $rowItem->id) }}',
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
				url: '{{ action("FTS\PrepareStaffController@AjaxUpdate", $rowItem->id) }}',
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
		if(confirm('ยืนยันการทำรายการ\nยกเลิกพนักงานปฏิบัติงานเรือใหญ่นี้?') == true){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: { 'id' : $(this).attr('rel') },
				url: '{{ action("FTS\PrepareStaffController@AjaxDelete", $rowItem->id) }}',
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