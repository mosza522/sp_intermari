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
				<li>บันทึกการใช้น้ำมันทุ่น</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">บันทึกการใช้น้ำมันทุ่น</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>  
								บันทึกการใช้น้ำมันทุ่น
							</h4>
						</div>
						<form action="{{action('FTS\OperationOilBuoyController@store', array($sRow->OperationID) )}}" method="POST" autocomplete="off">
						{{ csrf_field() }}
						@if( !empty($rowOilBuoy->id) )
						<input type="hidden" name="OilBuoyID" value="{{ $rowOilBuoy->id }}" />
						@endif
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-5">
								<div class="col-md-6">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่เอกสาร</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center pull-left w140 m-r-5" placeholder="Auto" value="{{ isset($rowOilBuoy->workNumber)?$rowOilBuoy->workNumber:'Auto' }}" readonly />
											<input type="text" class="form-control text-center pull-left w140 {{ isset($rowOilBuoy->workDate)?'':'datepicker' }}" name="workDate" value="{{ isset($rowOilBuoy->workDate)?date('d-m-Y',strtotime($rowOilBuoy->workDate)):date('d-m-Y') }}"  required readonly style="min-width: 70px!important;"  />
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
						

					<form action="{{action('FTS\OperationOilBuoyController@store', array($sRow->OperationID) )}}" method="POST" autocomplete="off">
					{{ csrf_field() }}
					@if( $sRow->id )
					<input type="hidden" name="OilBuoyID" value="{{ @$rowOilBuoy->id }}" />
					@endif
			
						<div class="panel-heading" style="background: #84b3e6;">
							<h4 class="panel-title b">รายการรับน้ำมัน</h4>
						</div>
						
						<div class="panel-body form-horizontal">
							<fieldset class="">
								<div class="col-md-8">
									<div class="form-group PickOil">
										<div class="pull-left m-l-10 m-b-0">
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100" value="เวลา" readonly />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w300" placeholder="" value="ผู้จ่ายน้ำมัน" />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100" placeholder="" value="จำนวน (ลิตร)" />
										</div>
									@if( !empty($rowPick) )
										@foreach($rowPick AS $iNum => $row)
										<div class="Item pull-left m-l-10 m-b-5">
											<input type="text" class="form-control pull-left text-center m-r-5 w100 timepicker" name="timePick[]" value="{{ substr($row->time_at,0,5) }}" />
											<input type="text" class="form-control pull-left text-center m-r-5 w300" name="dispenser[]"  value="{{ $row->dispenser }}" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="amount[]" value="{{ $row->amount }}" />
											<div class="pull-right m-b-5 PickOilBtn w100" style="padding-top:5px;"></div>
										</div>
										@endforeach
									@endif
										<div class="Item pull-left m-l-10 m-b-5">
											<input type="text" class="form-control pull-left text-center m-r-5 w100 timepicker" name="timePick[]" value="" />
											<input type="text" class="form-control pull-left text-center m-r-5 w300" name="dispenser[]"  value="" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="amount[]" value="" />
											<div class="pull-right m-b-5 PickOilBtn w100" style="padding-top:5px;"></div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
				
								
						<div class="panel-heading" style="background: #84b3e6;">
							<h4 class="panel-title b">รายการจ่ายน้ำมัน</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="">
								<div class="col-md-12">
									<div class="form-group FuelOil">
										<div class="pull-left m-l-10 m-b-0">
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100"  value="เวลา" readonly />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w200" placeholder="" value="ผู้รับน้ำมัน" />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100" placeholder="" value="มิเตอร์หัวจ่ายก่อน" />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100" placeholder="" value="มิเตอร์หัวจ่ายหลัง" />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100" placeholder="" value="จำนวน (ลิตร)" />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100" placeholder="" value="ประเภทงาน" />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w300" placeholder="" value="รายระเอียด" />
										</div>
									@if( !empty($rowFuel) )
										@foreach($rowFuel AS $iNum => $row)
										<div class="Item pull-left m-l-10 m-b-5">
											<input type="text" class="form-control pull-left text-center m-r-5 w100 timepicker" name="time_at[]" value="{{ substr($row->time_at,0,5) }}" />
											<input type="text" class="form-control pull-left text-center m-r-5 w200" name="bearer[]" value="{{ $row->bearer }}" />
											<input type="number" class="form-control pull-left text-right m-r-5 w100 meter" name="meter_before[]" value="{{ $row->meter_before }}" />
											<input type="number" class="form-control pull-left text-right m-r-5 w100 meter" name="meter_after[]" value="{{ $row->meter_after }}" />
											<input type="number" class="form-control pull-left text-right m-r-5 w100" name="meter_amount[]" value="{{ $row->meter_amount }}"  readonly />
											<input type="text" class="form-control pull-left text-center m-r-5 w100" name="jobtype[]" value="{{ $row->jobtype }}" />
											<input type="text" class="form-control pull-left text-left m-r-5 w300" name="jobdetail[]" value="{{ $row->jobdetail }}" />
											<div class="pull-right m-b-5 FuelOilBtn w70" style="padding-top:5px;"></div>
										</div>
										@endforeach
									@endif
										<div class="Item pull-left m-l-10 m-b-5">
											<input type="text" class="form-control pull-left text-center m-r-5 w100 timepicker" name="time_at[]" value="" />
											<input type="text" class="form-control pull-left text-center m-r-5 w200" name="bearer[]" value="" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price meter" name="meter_before[]" value="" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price meter" name="meter_after[]" value="" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="meter_amount[]" value=""  readonly />
											<input type="text" class="form-control pull-left text-center m-r-5 w100" name="jobtype[]" value="" />
											<input type="text" class="form-control pull-left text-left m-r-5 w300" name="jobdetail[]" value="" />
											<div class="pull-right m-b-5 FuelOilBtn w70" style="padding-top:5px;"></div>
										</div>
									</div>
								</div>
							</fieldset>
							<hr />
							<fieldset class="">
								<div class="col-md-9" style="width:600px">
									<div class="form-group">
										<div class="pull-left m-l-10 m-b-0">
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w175 b" value="" readonly />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100 b" value="ก่อนเริ่มงาน" readonly />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100 b" value="หลังเสร็จงาน" readonly />
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-center m-r-5 w100 b" value="ใช้น้ำมัน(ลิตร)" readonly />
										</div>
										<div class="pull-left m-l-10 m-b-5">
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-right m-r-5 w175"  value="ระดับน้ำมัน SOUNDING" readonly />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="sounding_before" value="{{ @$rowOilBuoy->sounding_before }}" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="sounding_after" value="{{ @$rowOilBuoy->sounding_after }}" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="sounding_amount" value="{{ @$rowOilBuoy->sounding_amount }}" />
										</div>
										<div class="pull-left m-l-10 m-b-5">
											<input type="text" style="background-color: transparent;border-color: transparent;" class="form-control pull-left text-right m-r-5 w175"  value="เลขมิเตอร์น้ำมันเครื่องปั่นไฟ" readonly />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="generator_before" value="{{ @$rowOilBuoy->generator_before }}" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="generator_after" value="{{ @$rowOilBuoy->generator_after }}" />
											<input type="text" class="form-control pull-left text-right m-r-5 w100 price" name="generator_amount" value="{{ @$rowOilBuoy->generator_amount }}" />
										</div>
									</div>
								</div>
							</fieldset>
				
							<fieldset class="">
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationController@OperationShowBuoy', array($sRow->OperationID)) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าการปฏิบัติงานเรือใหญ่</a>
										</div>
										<div class="col-xs-4 text-center"></div>
										<div class="col-xs-4 text-right">
											<button type="submit" class="btn btn-sm btn-primary m-r-5">บันทึกการใช้น้ำมันทุ่น</button>
										</div>
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
	PickOil = function(){
		$( '.PickOil .Item' ).each(function(index, element) {
			$(this).find('.PickOilBtn a').remove();
			if( index != 0 ){	$(this).find('.PickOilBtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );	}
		});
		$('.PickOil .Item').last().find('.PickOilBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
	}

	$( '.PickOil' ).on( "click", ".PickOilBtn .btn-success", function() {
        $('.PickOil .Item').last().clone().appendTo('.PickOil');
		$('.PickOil .Item').last().find('input').val('');
		PickOil();
	});

	$( '.PickOil' ).on( "click", ".PickOilBtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){	$(this).parent().parent().remove();	PickOil();	}
	});


	FuelOil = function(){
		$( '.FuelOil .Item' ).each(function(index, element) {
			$(this).find('.FuelOilBtn a').remove();
			if( index != 0 ){	$(this).find('.FuelOilBtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );	}
		});
		$('.FuelOil .Item').last().find('.FuelOilBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
	}

	$( '.FuelOil' ).on( "click", ".FuelOilBtn .btn-success", function() {
        $('.FuelOil .Item').last().clone().appendTo('.FuelOil');
		$('.FuelOil .Item').last().find('input').val('');
		FuelOil();
	});

	$( '.FuelOil' ).on( "click", ".FuelOilBtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){	$(this).parent().parent().remove();	FuelOil();	}
	});


	$( '.FuelOil' ).on( "keyup", ".meter", function() {
		if( $(this).attr('name') == 'meter_before[]' ){
			meter_before	= isNaN(parseInt($(this).val().replace(/,/g,'')))?0:parseInt($(this).val().replace(/,/g,''));
			meter_after		= isNaN(parseInt($(this).next().val().replace(/,/g,'')))?0:parseInt($(this).next().val().replace(/,/g,''));
			meter_amount	= meter_before-meter_after;
			$(this).next().next().val(meter_amount);
		}else{
			meter_before	= isNaN(parseInt($(this).prev().val().replace(/,/g,'')))?0:parseInt($(this).prev().val().replace(/,/g,''));
			meter_after		= isNaN(parseInt($(this).val().replace(/,/g,'')))?0:parseInt($(this).val().replace(/,/g,''));
			meter_amount	= meter_before-meter_after;
			$(this).next().val(meter_amount);
		}
	});
	
	
	PickOil();
	FuelOil();
	//$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
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