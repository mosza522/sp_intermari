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
				<li>บันทึกการใช้น้ำมันแบคโฮ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">บันทึกการใช้น้ำมันแบคโฮ</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>  
								บันทึกการใช้น้ำมันแบคโฮ
							</h4>
						</div>
						
						<form action="{{action('FTS\OperationOilBackhoeController@store', array($sRow->OperationID) )}}" method="POST" autocomplete="off">
							{{ csrf_field() }}
							@if( !empty($rowOilBackhoe->id) )
							<input type="hidden" name="OilBackhoeID" value="{{ $rowOilBackhoe->id }}" />
							@endif
							
								
							<div class="panel-body form-horizontal">
								<fieldset class="m-t-5">
									<div class="col-md-6">
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เลขที่เอกสาร</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center pull-left w140 m-r-5" placeholder="Auto" value="{{ isset($rowOilBackhoe->workNumber)?$rowOilBackhoe->workNumber:'Auto' }}" readonly />
												<input type="text" class="form-control text-center pull-left w140 {{ isset($rowOilBackhoe->workDate)?'':'datepicker' }}" name="workDate" value="{{ isset($rowOilBackhoe->workDate)?date('d-m-Y',strtotime($rowOilBackhoe->workDate)):date('d-m-Y') }}"  required readonly style="min-width: 70px!important;"  />
											</div>
										</div>
										<div class="form-group m-b-10">
											<label class="col-md-3 control-label">เรือใหญ่</label>
											<div class="col-md-9">
												<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
											</div>
										</div>
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เลขที่ใบแจ้งงาน</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->workNumber}}" readonly />
												@if( !empty($sRow->BuoyName) )
												<input type='text' class="form-control text-center w140 pull-left" value="{{ $sRow->BuoyName }}" readonly />
												@endif
											</div>
										</div>
										<div class="form-group m-b-0">
											<label class="col-md-3 control-label">หมายเหตุใบแจ้งงาน</label>
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
														<input type="text" style="width:30%;" class="form-control text-right pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'' }}" readonly />
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
												<input type="text" class="form-control text-right pull-left m-r-5 w140" value="{{ isset($sRow->job_weight)?number_format($sRow->job_weight,3):'' }}" readonly />
												<input type="text" class="form-control text-center w80 pull-left" value="{{ $sRow->job_unit }}" readonly />
											</div>
										</div>
										
									</div>
								</fieldset>
							</div>
						
							<div class="panel-heading" style="background: #84b3e6;">
								<h4 class="panel-title">รายการใช้น้ำมันแบคโฮ</h4>
							</div>
							<div class="panel-body form-horizontal">
								<fieldset class="Gennerrator">
									<div class="col-md-12">
										<div class="form-group m-b-10">
											<div class="pull-left m-l-10 " style="width:100%;">
												<span class="pull-left text-center" style="width:18%;">เครื่องจักร</span>
												<span class="pull-left text-center" style="width:8%;">ระดับน้ำมัน<br>เริ่มงาน</span>
												<span class="pull-left text-center" style="width:8%;">ปริมาณน้ำมัน<br>เริ่มงาน</span>
												<span class="pull-left text-center" style="width:8%;">มิเตอร์ ชม.<br>เริ่มงาน</span>
												<span class="pull-left text-center" style="width:8%;">น้ำมัน<br>เติมเพิ่ม</span>
												<span class="pull-left text-center" style="width:8%;">ระดับน้ำมัน<br>เสร็จงาน</span>
												<span class="pull-left text-center" style="width:8%;">ปริมาณน้ำมัน<br>เสร็จงาน</span>
												<span class="pull-left text-center" style="width:8%;">มิเตอร์ ชม.<br>เสร็จงาน</span>
												<span class="pull-left text-center" style="width:8%;">น้ำมันที่ใช้</span>
												<span class="pull-left text-center" style="width:8%;">ชั่วโมงทำงาน</span>
												<span class="pull-left text-center" style="width:8%;">ลิตร/ชั่วโมง</span>
											</div>
											

											@if( !empty($rowMachine) )
												@foreach($rowMachine AS $iNum => $row)
											<div class="pull-left m-t-5 " style="width:100%;">
												<input type="checkbox" style="width:3%;margin-top: 10px;" class="pull-left text-center" name="MachineID[{{ $row->id }}]" value="{{ $row->id }}" {{ isset($sRowItem[$row->id])?'checked':'' }}>
												<input type="text" style="width: 16%;" class="form-control pull-left m-r-5" value="{{ $row->MachineName }}" readonly />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5 CelOil" name="level_start[{{ $row->id }}]"  value="{{ isset($sRowItem[$row->id]['level_start'])?$sRowItem[$row->id]['level_start']:'' }}" placeholder="cm" />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5 CelOil" name="volume_start[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['volume_start'])?$sRowItem[$row->id]['volume_start']:'' }}" placeholder="ลิตร" />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5 CelOil" name="meter_start[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['meter_start'])?$sRowItem[$row->id]['meter_start']:'' }}" placeholder="" />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5" name="oil_fill[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['oil_fill'])?$sRowItem[$row->id]['oil_fill']:'' }}" placeholder="ลิตร" readonly/>
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5 CelOil" name="level_end[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['level_end'])?$sRowItem[$row->id]['level_end']:'' }}" placeholder="cm" />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5 CelOil" name="volume_end[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['volume_end'])?$sRowItem[$row->id]['volume_end']:'' }}" placeholder="ลิตร" />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5 CelOil" name="meter_end[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['meter_end'])?$sRowItem[$row->id]['meter_end']:'' }}" placeholder="" />
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5" name="oil_use[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['oil_use'])?$sRowItem[$row->id]['oil_use']:'' }}" placeholder="ลิตร" readonly/>
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5" name="hour_use[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['hour_use'])?$sRowItem[$row->id]['hour_use']:'' }}" placeholder="ชั่วโมง" readonly/>
												<input type="number" style="width: 7.5%;" class="form-control pull-left text-center m-r-5" name="average_use[{{ $row->id }}]" value="{{ isset($sRowItem[$row->id]['average_use'])?$sRowItem[$row->id]['average_use']:'' }}" placeholder="" readonly/>
											
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
												<button type="submit" class="btn btn-sm btn-primary m-r-5">บันทึกการใช้นำมันแบคโฮ</button>
												
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
	$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
	
	

	$( '.Gennerrator' ).on( "keyup change", ".CelOil", function() {
		volume_start	= isNaN(parseFloat($(this).parent().find('input:eq(3)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(3)').val().replace(/,/g,''));
		meter_start		= isNaN(parseFloat($(this).parent().find('input:eq(4)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(4)').val().replace(/,/g,''));
		volume_end		= isNaN(parseFloat($(this).parent().find('input:eq(7)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(7)').val().replace(/,/g,''));
		meter_end		= isNaN(parseFloat($(this).parent().find('input:eq(8)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(8)').val().replace(/,/g,''));
		oil_use			= volume_start-volume_end;
		hour_use		= meter_start-meter_end;
		average_use		= oil_use/hour_use;
		
		$(this).parent().find('input:eq(9)').val(oil_use);
		$(this).parent().find('input:eq(10)').val(hour_use);
		$(this).parent().find('input:eq(11)').val(average_use.toFixed(2));
	
	});
	
});
</script>
@endpush


@push('css')
<link href="assets/plugins/timepicker/jquery-ui-timepicker.css" rel="stylesheet" />
<style>
.PickOil .form-control, .FuelOil .form-control {
    padding: 6px 4px;
}
</style>
@endpush