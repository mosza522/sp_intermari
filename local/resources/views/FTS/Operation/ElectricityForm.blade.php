@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>ใบแจ้งงานทุ่น:  {{ $sRow->work_number }}</li>
				<li>ใบงานเรือใหญ่:  {{ $sRow->Operation_workNumber }}</li>
				<li>บันทึกการทำงานเครื่องกำเนิดไฟฟ้า</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">บันทึกการทำงานเครื่องกำเนิดไฟฟ้า</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>  
								บันทึกการทำงานเครื่องกำเนิดไฟฟ้า
							</h4>
						</div>
						<form action="{{action('FTS\OperationElectricityController@store', array($sRow->OperationID) )}}" method="POST" autocomplete="off">
						{{ csrf_field() }}
						@if( $sRow->id )
						<input type="hidden" name="ElectricityID" value="{{ $sRow->id }}" />
						@endif
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-5">
								<div class="col-md-6">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่เอกสาร</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center pull-left w140 m-r-5" placeholder="Auto" value="{{ isset($sRow->Oil_workNumber)?$sRow->Oil_workNumber:'Auto' }}" readonly />
											<input type="text" class="form-control text-center pull-left w140 {{ isset($sRow->Oil_workDate)?'':'datepicker' }}" name="workDate" value="{{ isset($sRow->Oil_workDate)?date('d-m-Y',strtotime($sRow->Oil_workDate)):date('d-m-Y') }}"  required readonly style="min-width: 70px!important;"  />
										</div>
									</div>
									<div class="form-group m-b-10">
										<label class="col-md-3 control-label">เรือใหญ่</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่ใบงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->Operation_workNumber}}" readonly />
											@if( !empty($sRow->BuoyName) )
											<input type='text' class="form-control text-center w140 pull-left" value="{{ $sRow->BuoyName }}" readonly />
											@endif
										</div>
									</div>
									<div class="form-group m-b-0">
										<label class="col-md-3 control-label">หมายเหตุใบงาน</label>
										<div class="col-md-9">
											<input type='text' class="form-control" value="{{ $sRow->workNote }}" readonly />
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
									
									<div class="form-group m-b-10">
										<label class="col-md-3 control-label">น้ำหนักรวม</label>
										<div class="col-md-9 p-r-5">
											<input type="text" class="form-control text-right pull-left m-r-5 w140" value="{{ isset($sRow->job_weight)?number_format($sRow->job_weight,3):'0' }}" readonly />
											<input type="text" class="form-control text-center w80 pull-left" value="{{ $sRow->job_unit }}" readonly />
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						
						
						<div class="panel-heading" style="background: #84b3e6;">
							<h4 class="panel-title">รายการทำงานเครื่องกำเนิดไฟฟ้า</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="Gennerrator">
								<div class="col-md-12">
									<div class="form-group m-b-10">
										<div class="pull-left m-l-10 " style="width:100%;">
											<div class="pull-left" style="width:50%;">
												<input type="text" style="width: 15%;background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5"  value="" readonly />
												<input type="text" style="width: 53%;background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5"  value="เครื่องกำเนิดไฟฟ้า" readonly />
												<input type="text" style="width: 13%;background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 timepicker" value="เวลาเริ่ม" readonly />
												<input type="text" style="width: 13%;background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 timepicker" value="เวลาเสร็จ" readonly />
											</div>
											<div class="pull-left" style="width:50%;">
												<div class="pull-left m-b-5">
													<input type="text" style="width: 58%;background-color: transparent;border-color: transparent;" class="form-control pull-left  text-center m-r-5"  value="รายละเอียดหักเวลาทำงาน" readonly />
													<input type="text" style="width: 15%;background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 timepicker" value="เวลาเริ่ม" readonly />
													<input type="text" style="width: 15%;background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 timepicker" value="เวลาเสร็จ" readonly />
												</div>
											</div>
										</div>
										@if( !empty($rowMachine) )
											@foreach($rowMachine AS $iNum => $row)
										<div class="pull-left m-l-10 " style="width:100%;">
											<div class="pull-left" style="width:50%;">
												<input type="checkbox" style="width:5%;margin-top: 11px;" class="pull-left text-center m-r-5" name="MachineID[{{ $row->id }}]" value="{{ $row->id }}" {{ isset($arrayUse[$row->id])?'checked':'' }}>
												<input type="text" style="width: 10%;" class="form-control pull-left text-center m-r-5"  value="{{ $iNum+1 }}" readonly />
												<input type="text" style="width: 53%;" class="form-control pull-left m-r-5"  value="{{ $row->MachineName }}" readonly />
												<input type="text" style="width: 13%;" class="form-control pull-left text-center m-r-5 timepicker" name="start_at[{{ $row->id }}]" value="{{ isset($arrayUse[$row->id]['start'])?$arrayUse[$row->id]['start']:'00:00' }}" />
												<input type="text" style="width: 13%;" class="form-control pull-left text-center m-r-5 timepicker" name="finish_at[{{ $row->id }}]" value="{{ isset($arrayUse[$row->id]['finish'])?$arrayUse[$row->id]['finish']:'23:59' }}" />
											</div>
											<div class="pull-left FormClone" style="width:50%;">
											@if( !empty($arrayRebate[$row->id]) )
												@foreach($arrayRebate[$row->id] AS $RebateNo => $row2)
												<div class="pull-left m-b-5 Item">
													<input type="text" style="width: 55%;" class="form-control pull-left m-r-5"  name="Note[{{ $row->id }}][]" value="{{ isset($row2['Note'])?$row2['Note']:'' }}" />
													<input type="text" style="width: 15%;" class="form-control pull-left text-center m-r-5 timepicker" name="restart_at[{{ $row->id }}][]" value="{{ isset($row2['start'])?$row2['start']:'' }}" />
													<input type="text" style="width: 15%;" class="form-control pull-left text-center m-r-5 timepicker" name="refinish_at[{{ $row->id }}][]" value="{{ isset($row2['finish'])?$row2['finish']:'' }}" />
													<div class="pull-right m-b-5 FormBtn" style="width:50px;padding-top:5px;"></div>
												</div>
												@endforeach
											@else
												<div class="pull-left m-b-5 Item">
													<input type="text" style="width: 55%;" class="form-control pull-left m-r-5"  name="Note[{{ $row->id }}][]" value="" />
													<input type="text" style="width: 15%;" class="form-control pull-left text-center m-r-5 timepicker" name="restart_at[{{ $row->id }}][]" value="" />
													<input type="text" style="width: 15%;" class="form-control pull-left text-center m-r-5 timepicker" name="refinish_at[{{ $row->id }}][]" value="" />
													<div class="pull-right m-b-5 FormBtn" style="width:50px;padding-top:5px;"></div>
												</div>
											@endif
											</div>
										</div>
											@endforeach
										@endif
									</div>
									
								</div>
							</fieldset>
				
							<fieldset class="">
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationController@OperationShowBuoy', array($sRow->OperationID)) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าการปฏิบัติงานเรือใหญ่</a>
										</div>
										<div class="col-xs-4 text-center">
											<button type="submit" class="btn btn-sm btn-primary m-r-5">บันทึกการทำงานเครื่องกำเนิดไฟฟ้า</button>
											
										</div>
										<div class="col-xs-4 text-right"></div>
									</div>
								</div>
							</fieldset>
						</div>
						
						</form>
					</div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
@stop

@push('scripts')
<script src="assets/plugins/timepicker/jquery-ui-timepicker.js"></script>
<script>
$(function() {
	FormClone = function(){
		$( '.FormClone' ).each(function(index, element) {
			$(this).find('.Item').last().find('.FormBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
			$( $(this).find('.Item') ).each(function(index, element) {
				$(this).find('.FormBtn a').remove();
				if( index != 0 ){
					$(this).find('.FormBtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
				}
			});
			$(this).find('.Item').last().find('.FormBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
		});
		
	}

	$( '.FormClone' ).on( "click", ".FormBtn .btn-success", function() {
		$('.timepicker').removeClass('hasDatepicker');
        $(this).parent().parent().last().clone().appendTo($(this).parent().parent().parent()).find('input').val('');
		FormClone();
		$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
	});

	$( '.FormClone' ).on( "click", ".FormBtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			FormClone();
		}
	});
	FormClone();
	
	$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
});
</script>
@endpush


@push('css')
<link href="assets/plugins/timepicker/jquery-ui-timepicker.css" rel="stylesheet" />
<style>
.Gennerrator .form-control {
    padding: 6px 4px;
}
</style>
@endpush