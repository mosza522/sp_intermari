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
			<h1 class="page-header">แผนการขนถ่ายสินค้า</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"> แผนการขนถ่ายสินค้า ใบแจ้งงาน  {{ $sRow->work_number }} </h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
							
								<div class="col-md-12  m-b-30">
									<div class="col-md-6">
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label b">ประเภทงาน</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center w140 b" value="{{ $sRow->job_transport }}" readonly />
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
												<input type='text' class="form-control text-center w140 datepicker" id="job_date_eta" value="{{ isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta') }}" readonly style="min-width:0px!important"/>
											</div>
										</div>
										
									</div>
									
									<div class="col-md-6">
										<div class="form-group m-b-0">
											<label class="col-md-3 control-label">สินค้า</label>
											<div class="row col-md-9 Product_List">
											<?php $volume = 0; ?>
												@if( !empty($rowItem) )
													@foreach($rowItem AS $row)
												<div class="Product_Item">
													<div class="pull-left m-l-10 m-b-5">
														<input type="text" style="width:55%;" class="form-control pull-left m-r-5"  value="{{ $row->ProductName }}" readonly />
														<input type="text" style="width:30%;" class="form-control text-right pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}" readonly />
														<input type="text" style="width:12%;" class="form-control text-center pull-left" value="{{ $sRow->job_unit }}" readonly />
													</div>
												</div>
													<?php $volume = $volume+$row->Weight; ?>
													@endforeach
												@endif
											</div>
										</div>
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">ปริมาณ</label>
											<div class="col-md-9">
												<input type='text' id="workVolume" name="workVolume" class="form-control text-right w140" value="{{ number_format($volume) }}" readonly />
											</div>
										</div>
									</div>
								</div>
							
								<div class="col-md-6 Plan" style="margin: auto;float: none;">
									<form action="{{action('SWP\Operation\PlanController@store', array($sRow->id) )}}" method="POST" autocomplete="off">
										{{ csrf_field() }}
										
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">วันเริ่มงาน</label>
											<div class="col-md-7">
												<input type='text' class="form-control text-center w140 datepicker CalPlan" id="workStart" name="workStart" value="{{ isset($sPlan->workStart)?date('d-m-Y',strtotime($sPlan->workStart)):'' }}" readonly style="min-width:0px!important"/>
											</div>
										</div>
										
										@if( $sRow->job_transport=='Discharge' )
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">จำนวนเครื่องจักร</label>
											<div class="col-md-7">
												<input type='number' class="form-control text-center w140 CalPlan" id="workMachines" name="workMachines" value="{{ isset($sPlan->workMachines)?$sPlan->workMachines:'' }}" />
											</div>
										</div>
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">เป้าหมายการขนถ่ายสินค้าต่อวัน</label>
											<div class="col-md-7">
												<input type='text' class="form-control text-center w140" id="workGoal" name="workGoal" value="{{ isset($sPlan->workGoal)?$sPlan->workGoal:'' }}" readonly />
											</div>
										</div>
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">จำนวนวันที่ทำการขนถ่ายสินค้า</label>
											<div class="col-md-7">
												<input type='text' class="form-control text-center w140" id="workDay" name="workDay" value="{{ isset($sPlan->workDay)?$sPlan->workDay:'' }}" readonly />
											</div>
										</div>
										@else
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">จำนวนวันที่ทำการขนถ่ายสินค้า</label>
											<div class="col-md-7">
												<input type='text' class="form-control text-center w140" id="workDay" name="workDay" value="{{ isset($sPlan->workDay)?$sPlan->workDay:'' }}" readonly />
											</div>
										</div>
										
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">เป้าหมายการขนถ่ายสินค้าต่อวัน</label>
											<div class="col-md-7">
												<input type='text' class="form-control text-center w140" id="workGoal" name="workGoal" value="{{ isset($sPlan->workGoal)?$sPlan->workGoal:'' }}" readonly />
											</div>
										</div>
										@endif
										
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label">วันจบงาน</label>
											<div class="col-md-7">
												<input type='text' class="form-control text-center w140 datepicker CalPlan" id="workEnd" name="workEnd" value="{{ isset($sPlan->workEnd)?date('d-m-Y',strtotime($sPlan->workEnd)):'' }}" readonly style="min-width:0px!important"/>
											</div>
										</div>
										
										<div class="form-group m-b-20">
											<label class="col-md-5 control-label">สถานะการทำงาน</label>
											<div class="col-md-7">
												<select class="form-control w140" name="work_status_swp" id="work_status_swp" >
													<option value="0" {{ @$sRow->work_status_swp=='0'?'selected':'' }}>รอดำเนินการ</option>
													<option value="1" {{ @$sRow->work_status_swp=='1'?'selected':'' }}>กำลังดำเนินการ</option>
													<option value="2" {{ @$sRow->work_status_swp=='2'?'selected':'' }}>จบงาน</option>
												</select>
											</div>
										</div>
										
										<div class="form-group m-b-5">
											<label class="col-md-5 control-label"></label>
											<div class="col-md-7">
												<button type="submit" class="btn btn-sm btn-primary m-r-5">บันทึกแผนการขนถ่าย</button>
											</div>
										</div>
										
									</form>
								</div>
								
								<div class="col-md-12">
									<div class="form-group m-t-30 m-b-5">
										<div class="col-xs-6 text-left">
											<a href="{{ action($sRow->sPath.'\OperationController@show', $sRow->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าการปฏิบัติงาน</a>
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
<script>

@if( $sRow->job_transport=='Discharge' )
	$( '.Plan' ).on( "keyup change", ".CalPlan", function() {
		workMachines 	= $('#workMachines').val().replace(/,/g,'');
		workVolume 		= $('#workVolume').val().replace(/,/g,'');
		workGoal		= workMachines*1200;
		workDay			= Math.round(workVolume/workGoal);
		workStart 		= $('#workStart').datepicker('getDate');
		if( workDay && workStart){
			workStart.setDate(workStart.getDate() + workDay);
			$('#workEnd').datepicker('setDate', workStart);
		}
		$('#workGoal').val( frm.AddCommas(workGoal) );
		$('#workDay').val( frm.AddCommas(workDay) );
	});
@else
	$( '.Plan' ).on( "keyup change", ".CalPlan", function() {
		workStart = $('#workStart').datepicker('getDate');
		job_date_eta = $('#job_date_eta').datepicker('getDate');
		job_date_eta.setDate(job_date_eta.getDate() - 2);
		$('#workEnd').datepicker('setDate', job_date_eta);
		
	});
@endif

</script>
@endpush