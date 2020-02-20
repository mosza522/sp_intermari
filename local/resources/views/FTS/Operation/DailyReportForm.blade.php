@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>ใบแจ้งงาน:  {{ $sRow->work_number }}</li>
				<li>DAILY REPORT</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">DAILY REPORT</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i> DAILY REPORT</h4>
						</div>
						
						<form action="{{action('FTS\OperationDailyReportController@store', array($sRow->id) )}}" method="POST" autocomplete="off">
							{{ csrf_field() }}
							@if( !empty($rowDailyReport->id) )
							<input type="hidden" name="DailyReportID" value="{{ $rowDailyReport->id }}" />
							@endif
							
							<div class="panel-body form-horizontal">
								<fieldset class="m-t-10">
									<div class="col-md-6">
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เลขที่เอกสาร</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center pull-left w140 m-r-5" placeholder="Auto" value="{{ isset($rowDailyReport->workNumber)?$rowDailyReport->workNumber:'Auto' }}" readonly />
											</div>
										</div>
										
										<div class="form-group m-b-10">
											<label class="col-md-3 control-label">เรือใหญ่</label>
											<div class="col-md-9">
												<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
											</div>
										</div>
										
										<div class="form-group m-b-10">
											<label class="col-md-3 control-label">วันที่</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center pull-left w140 {{ isset($rowDailyReport->workDate)?'datepicker':'datepicker' }} workDate" name="workDate" value="{{ isset($rowDailyReport->workDate)?date('d-m-Y',strtotime($rowDailyReport->workDate)):date('d-m-Y') }}"  required style="min-width: 70px!important;" {{ isset($rowDailyReport->workDate)?'':'' }}/>
											</div>
										</div>
										
										<div class="form-group m-b-10">
											<label class="col-md-3 control-label">ETC. ON</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center pull-left w140 m-r-10 {{ isset($rowDailyReport->workDateETC)?'datepicker':'datepicker' }}" name="workDateETC1" value="{{ isset($rowDailyReport->workDateETC)?date('d-m-Y',strtotime($rowDailyReport->workDateETC)):date('d-m-Y') }}"  required style="min-width: 70px!important;" {{ isset($rowDailyReport->workDate)?'':'' }}/>
												<input type="text" class="form-control text-center pull-left w80 {{ isset($rowDailyReport->workDateETC)?'':'timepicker' }}" name="workDateETC2" value="{{ isset($rowDailyReport->workDateETC)?date('H:i',strtotime($rowDailyReport->workDateETC)):date('H:i') }}"  required style="min-width:50px!important;" {{ isset($rowDailyReport->workDate1)?'':'' }}/>
											</div>
										</div>
									
										
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เวลาทำงานต่อวัน</label>
											<div class="row col-md-8">
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control text-center" value="{{ @$rowDailyReport->minuteWork2 }}" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="hidden" name="minuteWork" id="minuteWork" value="{{ @$rowDailyReport->minuteWork }}" />
													<input type="text" class="form-control" value="ชั่วโมง:นาที" readonly style="background-color: transparent;border-color: transparent;" />
												</div>
											</div>
										</div>
									
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เวลาหยุดงานต่อวัน</label>
											<div class="row col-md-8">
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control text-center" value="{{ @$rowDailyReport->minuteStop2 }}" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="hidden" name="minuteStop" id="minuteStop" value="{{ @$rowDailyReport->minuteStop }}" />
													<input type="text" class="form-control" value="ชั่วโมง:นาที" readonly style="background-color: transparent;border-color: transparent;" />
												</div>
											</div>
										</div>
									
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">จำนวนต่อวัน</label>
											<div class="row col-md-8">
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control text-center" readonly name="totalTon" id="totalTon" value="{{ @$rowDailyReport->totalTon }}" />
												</div>
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control" value="ตัน" readonly style="background-color: transparent;border-color: transparent;" />
												</div>
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
									
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เลขที่ใบแจ้งงาน</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->work_number}}" readonly />
											</div>
										</div>
										
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เวลาทำงานสะสม</label>
											<div class="row col-md-8">
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control text-center" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control" value="ชั่วโมง:นาที" readonly style="background-color: transparent;border-color: transparent;" />
												</div>
											</div>
										</div>
									
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เวลาหยุดงานสะสม</label>
											<div class="row col-md-8">
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control text-center" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control" value="ชั่วโมง:นาที" readonly style="background-color: transparent;border-color: transparent;" />
												</div>
											</div>
										</div>
									
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เฉลี่ย</label>
											<div class="row col-md-8">
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control text-center" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 40%;">
													<input type="text" class="form-control" value="ตัน/วัน" readonly style="background-color: transparent;border-color: transparent;" />
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 m-t-10">
										<div class="form-group Hatch">
											<div class="pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="background-color: transparent;border-color: transparent;width: 13%;" class="form-control pull-left text-right m-r-5" placeholder="" value="DATE AND TIME	" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.1" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.2" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.3" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.4" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.5" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.6" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="HATCH NO.7" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 10%;" class="form-control pull-left text-right m-r-5" placeholder="" value="TOTAL" />
											</div>

											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="CARGO BOOKING" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch1'])?$Hatch['Cargo']['Hatch1']:'' }}" id="Hatch_Cargo_1" name="Hatch[Cargo][Hatch1]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch2'])?$Hatch['Cargo']['Hatch2']:'' }}" id="Hatch_Cargo_2" name="Hatch[Cargo][Hatch2]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch3'])?$Hatch['Cargo']['Hatch3']:'' }}" id="Hatch_Cargo_3" name="Hatch[Cargo][Hatch3]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch4'])?$Hatch['Cargo']['Hatch4']:'' }}" id="Hatch_Cargo_4" name="Hatch[Cargo][Hatch4]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch5'])?$Hatch['Cargo']['Hatch5']:'' }}" id="Hatch_Cargo_5" name="Hatch[Cargo][Hatch5]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch6'])?$Hatch['Cargo']['Hatch6']:'' }}" id="Hatch_Cargo_6" name="Hatch[Cargo][Hatch6]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5 price2 CalHatch" value="{{ isset($Hatch['Cargo']['Hatch7'])?$Hatch['Cargo']['Hatch7']:'' }}" id="Hatch_Cargo_7" name="Hatch[Cargo][Hatch7]" {{ (empty($Hatch['Cargo']) || @$rowDailyReport->workNo == 1)?'required':'readonly' }} />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Cargo']['Total'])?$Hatch['Cargo']['Total']:'' }}" id="Hatch_Cargo_Total" name="Hatch[Cargo][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="0:00 6:00" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch1'])?$Hatch['Time1']['Hatch1']:0 }}" id="Hatch_Time1_1" name="Hatch[Time1][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch2'])?$Hatch['Time1']['Hatch2']:0 }}" id="Hatch_Time1_2" name="Hatch[Time1][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch3'])?$Hatch['Time1']['Hatch3']:0 }}" id="Hatch_Time1_3" name="Hatch[Time1][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch4'])?$Hatch['Time1']['Hatch4']:0 }}" id="Hatch_Time1_4" name="Hatch[Time1][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch5'])?$Hatch['Time1']['Hatch5']:0 }}" id="Hatch_Time1_5" name="Hatch[Time1][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch6'])?$Hatch['Time1']['Hatch6']:0 }}" id="Hatch_Time1_6" name="Hatch[Time1][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Hatch7'])?$Hatch['Time1']['Hatch7']:0 }}" id="Hatch_Time1_7" name="Hatch[Time1][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time1']['Total'])?$Hatch['Time1']['Total']:0 }}" id="Hatch_Time1_Total" name="Hatch[Time1][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="6:00 12:00" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch1'])?$Hatch['Time2']['Hatch1']:0 }}" id="Hatch_Time2_1" name="Hatch[Time2][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch2'])?$Hatch['Time2']['Hatch2']:0 }}" id="Hatch_Time2_2" name="Hatch[Time2][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch3'])?$Hatch['Time2']['Hatch3']:0 }}" id="Hatch_Time2_3" name="Hatch[Time2][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch4'])?$Hatch['Time2']['Hatch4']:0 }}" id="Hatch_Time2_4" name="Hatch[Time2][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch5'])?$Hatch['Time2']['Hatch5']:0 }}" id="Hatch_Time2_5" name="Hatch[Time2][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch6'])?$Hatch['Time2']['Hatch6']:0 }}" id="Hatch_Time2_6" name="Hatch[Time2][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Hatch7'])?$Hatch['Time2']['Hatch7']:0 }}" id="Hatch_Time2_7" name="Hatch[Time2][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time2']['Total'])?$Hatch['Time2']['Total']:0 }}" id="Hatch_Time2_Total" name="Hatch[Time2][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="12:00 18:00" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch1'])?$Hatch['Time3']['Hatch1']:0 }}" id="Hatch_Time3_1" name="Hatch[Time3][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch2'])?$Hatch['Time3']['Hatch2']:0 }}" id="Hatch_Time3_2" name="Hatch[Time3][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch3'])?$Hatch['Time3']['Hatch3']:0 }}" id="Hatch_Time3_3" name="Hatch[Time3][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch4'])?$Hatch['Time3']['Hatch4']:0 }}" id="Hatch_Time3_4" name="Hatch[Time3][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch5'])?$Hatch['Time3']['Hatch5']:0 }}" id="Hatch_Time3_5" name="Hatch[Time3][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch6'])?$Hatch['Time3']['Hatch6']:0 }}" id="Hatch_Time3_6" name="Hatch[Time3][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Hatch7'])?$Hatch['Time3']['Hatch7']:0 }}" id="Hatch_Time3_7" name="Hatch[Time3][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time3']['Total'])?$Hatch['Time3']['Total']:0 }}" id="Hatch_Time3_Total" name="Hatch[Time3][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="18:00 0:00" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch1'])?$Hatch['Time4']['Hatch1']:0 }}" id="Hatch_Time4_1" name="Hatch[Time4][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch2'])?$Hatch['Time4']['Hatch2']:0 }}" id="Hatch_Time4_2" name="Hatch[Time4][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch3'])?$Hatch['Time4']['Hatch3']:0 }}" id="Hatch_Time4_3" name="Hatch[Time4][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch4'])?$Hatch['Time4']['Hatch4']:0 }}" id="Hatch_Time4_4" name="Hatch[Time4][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch5'])?$Hatch['Time4']['Hatch5']:0 }}" id="Hatch_Time4_5" name="Hatch[Time4][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch6'])?$Hatch['Time4']['Hatch6']:0 }}" id="Hatch_Time4_6" name="Hatch[Time4][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Hatch7'])?$Hatch['Time4']['Hatch7']:0 }}" id="Hatch_Time4_7" name="Hatch[Time4][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Time4']['Total'])?$Hatch['Time4']['Total']:0 }}" id="Hatch_Time4_Total" name="Hatch[Time4][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="TOTAL" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch1'])?$Hatch['Total']['Hatch1']:0 }}" id="Hatch_Total_1" name="Hatch[Total][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch2'])?$Hatch['Total']['Hatch2']:0 }}" id="Hatch_Total_2" name="Hatch[Total][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch3'])?$Hatch['Total']['Hatch3']:0 }}" id="Hatch_Total_3" name="Hatch[Total][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch4'])?$Hatch['Total']['Hatch4']:0 }}" id="Hatch_Total_4" name="Hatch[Total][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch5'])?$Hatch['Total']['Hatch5']:0 }}" id="Hatch_Total_5" name="Hatch[Total][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch6'])?$Hatch['Total']['Hatch6']:0 }}" id="Hatch_Total_6" name="Hatch[Total][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Hatch7'])?$Hatch['Total']['Hatch7']:0 }}" id="Hatch_Total_7" name="Hatch[Total][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Total']['Total'])?$Hatch['Total']['Total']:0 }}" id="Hatch_Total_Total" name="Hatch[Total][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="PREVIOUS" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch1'])?$Hatch['Previous']['Hatch1']:0 }}" id="Hatch_Previous_1" name="Hatch[Previous][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch2'])?$Hatch['Previous']['Hatch2']:0 }}" id="Hatch_Previous_2" name="Hatch[Previous][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch3'])?$Hatch['Previous']['Hatch3']:0 }}" id="Hatch_Previous_3" name="Hatch[Previous][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch4'])?$Hatch['Previous']['Hatch4']:0 }}" id="Hatch_Previous_4" name="Hatch[Previous][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch5'])?$Hatch['Previous']['Hatch5']:0 }}" id="Hatch_Previous_5" name="Hatch[Previous][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch6'])?$Hatch['Previous']['Hatch6']:0 }}" id="Hatch_Previous_6" name="Hatch[Previous][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Hatch7'])?$Hatch['Previous']['Hatch7']:0 }}" id="Hatch_Previous_7" name="Hatch[Previous][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Previous']['Total'])?$Hatch['Previous']['Total']:0 }}" id="Hatch_Previous_Total" name="Hatch[Previous][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="GRAND TOTAL" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch1'])?$Hatch['GrandTotal']['Hatch1']:0 }}" id="Hatch_GrandTotal_1" name="Hatch[GrandTotal][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch2'])?$Hatch['GrandTotal']['Hatch2']:0 }}" id="Hatch_GrandTotal_2" name="Hatch[GrandTotal][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch3'])?$Hatch['GrandTotal']['Hatch3']:0 }}" id="Hatch_GrandTotal_3" name="Hatch[GrandTotal][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch4'])?$Hatch['GrandTotal']['Hatch4']:0 }}" id="Hatch_GrandTotal_4" name="Hatch[GrandTotal][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch5'])?$Hatch['GrandTotal']['Hatch5']:0 }}" id="Hatch_GrandTotal_5" name="Hatch[GrandTotal][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch6'])?$Hatch['GrandTotal']['Hatch6']:0 }}" id="Hatch_GrandTotal_6" name="Hatch[GrandTotal][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Hatch7'])?$Hatch['GrandTotal']['Hatch7']:0 }}" id="Hatch_GrandTotal_7" name="Hatch[GrandTotal][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['GrandTotal']['Total'])?$Hatch['GrandTotal']['Total']:0 }}" id="Hatch_GrandTotal_Total" name="Hatch[GrandTotal][Total]" readonly />
											</div>
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 13%;" class="form-control pull-left text-right m-r-5" value="BALANCE" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch1'])?$Hatch['Balance']['Hatch1']:0 }}" id="Hatch_Balance_1" name="Hatch[Balance][Hatch1]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch2'])?$Hatch['Balance']['Hatch2']:0 }}" id="Hatch_Balance_2" name="Hatch[Balance][Hatch2]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch3'])?$Hatch['Balance']['Hatch3']:0 }}" id="Hatch_Balance_3" name="Hatch[Balance][Hatch3]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch4'])?$Hatch['Balance']['Hatch4']:0 }}" id="Hatch_Balance_4" name="Hatch[Balance][Hatch4]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch5'])?$Hatch['Balance']['Hatch5']:0 }}" id="Hatch_Balance_5" name="Hatch[Balance][Hatch5]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch6'])?$Hatch['Balance']['Hatch6']:0 }}" id="Hatch_Balance_6" name="Hatch[Balance][Hatch6]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Hatch7'])?$Hatch['Balance']['Hatch7']:0 }}" id="Hatch_Balance_7" name="Hatch[Balance][Hatch7]" readonly />
												<input type="text" style="width: 10%;" class="form-control pull-left text-right m-r-5" value="{{ isset($Hatch['Balance']['Total'])?$Hatch['Balance']['Total']:0 }}" id="Hatch_Balance_Total" name="Hatch[Balance][Total]" readonly />
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						
							
							<div class="panel-heading" style="background: #84b3e6;">
								<h4 class="panel-title">Remark</h4>
							</div>
							<div class="panel-body form-horizontal">
								<fieldset class="">
									<div class="col-md-12">
										<div class="form-group Remark">
											<div class="pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="background-color: transparent;border-color: transparent;width: 12%;" class="form-control pull-left text-right m-r-5" placeholder="" value="เวลาเริ่ม" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 12%;" class="form-control pull-left text-right m-r-5" placeholder="" value="เวลาเสร็จ" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 65%;" class="form-control pull-left text-right m-r-5" placeholder="" value="รายละเอียด" />
											</div>
											@if( $rowRemark )
												@foreach( $rowRemark AS $r ) 
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="start_at[]" value="{{ substr($r->start_at,0,5) }}" />
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="finish_at[]"  value="{{ substr($r->finish_at,0,5) }}" />
												<input type="text" style="width: 68%;" class="form-control pull-left m-r-5" name="time_note[]" value="{{ $r->time_note }}" />
												<div class="pull-left m-b-5 RemarkBtn" style="width:6%;padding-top:5px;"></div>
											</div>
												@endforeach
											@endif
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="start_at[]" value="" />
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="finish_at[]"  value="" />
												<input type="text" style="width: 68%;" class="form-control pull-left m-r-5" name="time_note[]" placeholder="" value="" />
												<div class="pull-left m-b-5 RemarkBtn" style="width:6%;padding-top:5px;"></div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							
						
							
							<div class="panel-heading" style="background: #84b3e6;">
								<h4 class="panel-title">บันทึกหยุดงานเรือใหญ่</h4>
							</div>
							<div class="panel-body form-horizontal">
								<fieldset class="">
									<div class="col-md-12">
										<div class="form-group Break"> 
											<div class="pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="background-color: transparent;border-color: transparent;width: 12%;" class="form-control pull-left text-right m-r-5" placeholder="" value="เวลาเริ่ม" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 12%;" class="form-control pull-left text-right m-r-5" placeholder="" value="เวลาเสร็จ" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 12%;" class="form-control pull-left text-right m-r-5" placeholder="" value="เวลาหยุด" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 56%;" class="form-control pull-left text-right m-r-5" placeholder="" value="รายละเอียด" />
											</div>
											@if( $rowStop )
												@foreach( $rowStop AS $r ) 
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="start_at1[]" value="{{ substr($r->start_at,0,5) }}" />
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="finish_at1[]"  value="{{ substr($r->finish_at,0,5) }}" />
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5" name="time_use1[]" value="{{ $r->time_use }}" readonly />
												<input type="text" style="width: 56%;" class="form-control pull-left m-r-5" name="time_note1[]" value="{{ $r->time_note }}" />
												<div class="pull-left m-b-5 RemarkBtn" style="width:6%;padding-top:5px;"></div>
											</div>
												@endforeach
											@endif
											
											<div class="Item pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="start_at1[]" value="" />
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5 timepicker" name="finish_at1[]" placeholder="" value="" />
												<input type="text" style="width: 12%;" class="form-control pull-left text-right m-r-5" name="time_use1[]" placeholder="" value="" readonly />
												<input type="text" style="width: 56%;" class="form-control pull-left m-r-5" name="time_note1[]" placeholder="" value="" />
												<div class="pull-left m-b-5 RemarkBtn" style="width:6%;padding-top:5px;"></div>
											</div>
										</div>
									</div>
								
									<div class="col-md-12">
										<div class="form-group m-t-30 m-b-5">
											<div class="col-xs-4 text-left">
												<a href="{{ action('FTS\OperationController@show', array($sRow->id)) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าการปฏิบัติงานเรือใหญ่</a>
											</div>
											<div class="col-xs-4 text-center">
												<button type="submit" class="btn btn-sm btn-primary m-r-5">Save DAILY REPORT</button>
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
<link href="assets/plugins/timepicker/jquery-ui-timepicker.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

@endpush

@push('scripts')
<script src="assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/plugins/timepicker/jquery-ui-timepicker.js"></script>
<script>
$(function() {
	Remark = function(){
		$( '.Remark .Item' ).each(function(index, element) {
			$(this).find('.RemarkBtn a').remove();
			if( index != 0 ){
				$(this).find('.RemarkBtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
			}
		});
		$('.Remark .Item').last().find('.RemarkBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
	}

	$( '.Remark' ).on( "click", ".RemarkBtn .btn-success", function() {
		$('.hasDatepicker').removeClass('hasDatepicker');
        $('.Remark .Item').last().clone().appendTo('.Remark');
		$('.Remark .Item').last().find('input').val('');
		Remark();
		$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
	});

	$( '.Remark' ).on( "click", ".RemarkBtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			Remark();
		}
	});
	Remark();
	
	
	
	
	Break = function(){
		$( '.Break .Item' ).each(function(index, element) {
			$(this).find('.RemarkBtn a').remove();
			if( index != 0 ){
				$(this).find('.RemarkBtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
			}
		});
		$('.Break .Item').last().find('.RemarkBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
	}

	$( '.Break' ).on( "click", ".RemarkBtn .btn-success", function() {
		$('.hasDatepicker').removeClass('hasDatepicker');
        $('.Break .Item').last().clone().appendTo('.Break');
		$('.Break .Item').last().find('input').val('');
		Break();
		$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
	});

	$( '.Break' ).on( "click", ".RemarkBtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			Break();
		}
	});
	Break();
	
	
	$('.timepicker').timepicker({'hourGrid': 5,'minuteGrid': 10});
	
	$('.datetimepicker').datetimepicker({
		format : 'DD-MM-YYYY HH:mm',
		ignoreReadonly: true
	});
	
	
	$( '.panel-body' ).on( "change", ".workDate", function() {
		$('#modal-alert').modal('show');
		$('#modal-alert #msg').html('ระบบกำลังดึงข้อมูลจาก Alongside รอสักครู่');
		$('.modal-dialog img' ).remove();
		$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-success');
		setTimeout(function(){
			$('#modal-alert').modal('hide');
		}, 3000);
		
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			data: { 'workDate' : $(this).val() },
			url: '{{ action("FTS\OperationDailyReportController@Alongside", $sRow->id ) }}',
			success: function(result) {
				if( result ){
					$('#modal-alert').modal('show');
					$('#modal-alert #msg').html(result.msg);
					$('.modal-dialog .alert' ).removeClass('alert-success').removeClass('alert-danger').addClass('alert-'+result.status);
					if( result.status == 'success'){
						$.each(result.sHatch, function(Time, Item) {
							$.each(Item, function(Hatch, Valuee) {
								$('#Hatch_'+Time+'_'+Hatch).val(Valuee);
							});
						});
						$('#minuteWork').val(result.sMinute);
					}
					CalHatch();
				}
			}
		});
	});
		
		

	CalHatch = function(){
		
		Hatch_Cargo_1 		= parseFloat($('#Hatch_Cargo_1').val().replace(/,/g,''));
		Hatch_Cargo_2 		= parseFloat($('#Hatch_Cargo_2').val().replace(/,/g,''));
		Hatch_Cargo_3 		= parseFloat($('#Hatch_Cargo_3').val().replace(/,/g,''));
		Hatch_Cargo_4 		= parseFloat($('#Hatch_Cargo_4').val().replace(/,/g,''));
		Hatch_Cargo_5 		= parseFloat($('#Hatch_Cargo_5').val().replace(/,/g,''));
		Hatch_Cargo_6 		= parseFloat($('#Hatch_Cargo_6').val().replace(/,/g,''));
		Hatch_Cargo_7 		= parseFloat($('#Hatch_Cargo_7').val().replace(/,/g,''));
		Hatch_Cargo_Total	= Hatch_Cargo_1+Hatch_Cargo_2+Hatch_Cargo_3+Hatch_Cargo_4+Hatch_Cargo_5+Hatch_Cargo_6+Hatch_Cargo_7;
		$('#Hatch_Cargo_Total').val( frm.AddCommas(Hatch_Cargo_Total.toFixed(2)) );
		
		Hatch_Time1_1 		= parseFloat($('#Hatch_Time1_1').val().replace(/,/g,''));
		Hatch_Time1_2 		= parseFloat($('#Hatch_Time1_2').val().replace(/,/g,''));
		Hatch_Time1_3 		= parseFloat($('#Hatch_Time1_3').val().replace(/,/g,''));
		Hatch_Time1_4 		= parseFloat($('#Hatch_Time1_4').val().replace(/,/g,''));
		Hatch_Time1_5 		= parseFloat($('#Hatch_Time1_5').val().replace(/,/g,''));
		Hatch_Time1_6 		= parseFloat($('#Hatch_Time1_6').val().replace(/,/g,''));
		Hatch_Time1_7 		= parseFloat($('#Hatch_Time1_7').val().replace(/,/g,''));
		Hatch_Time1_Total	= Hatch_Time1_1+Hatch_Time1_2+Hatch_Time1_3+Hatch_Time1_4+Hatch_Time1_5+Hatch_Time1_6+Hatch_Time1_7;
		$('#Hatch_Time1_Total').val( frm.AddCommas(Hatch_Time1_Total.toFixed(2)) );
		
		Hatch_Time2_1 		= parseFloat($('#Hatch_Time2_1').val().replace(/,/g,''));
		Hatch_Time2_2 		= parseFloat($('#Hatch_Time2_2').val().replace(/,/g,''));
		Hatch_Time2_3 		= parseFloat($('#Hatch_Time2_3').val().replace(/,/g,''));
		Hatch_Time2_4 		= parseFloat($('#Hatch_Time2_4').val().replace(/,/g,''));
		Hatch_Time2_5 		= parseFloat($('#Hatch_Time2_5').val().replace(/,/g,''));
		Hatch_Time2_6 		= parseFloat($('#Hatch_Time2_6').val().replace(/,/g,''));
		Hatch_Time2_7 		= parseFloat($('#Hatch_Time2_7').val().replace(/,/g,''));
		Hatch_Time2_Total	= Hatch_Time2_1+Hatch_Time2_2+Hatch_Time2_3+Hatch_Time2_4+Hatch_Time2_5+Hatch_Time2_6+Hatch_Time2_7;
		$('#Hatch_Time2_Total').val( frm.AddCommas(Hatch_Time2_Total.toFixed(2)) );
		
		Hatch_Time3_1 		= parseFloat($('#Hatch_Time3_1').val().replace(/,/g,''));
		Hatch_Time3_2 		= parseFloat($('#Hatch_Time3_2').val().replace(/,/g,''));
		Hatch_Time3_3 		= parseFloat($('#Hatch_Time3_3').val().replace(/,/g,''));
		Hatch_Time3_4 		= parseFloat($('#Hatch_Time3_4').val().replace(/,/g,''));
		Hatch_Time3_5 		= parseFloat($('#Hatch_Time3_5').val().replace(/,/g,''));
		Hatch_Time3_6 		= parseFloat($('#Hatch_Time3_6').val().replace(/,/g,''));
		Hatch_Time3_7 		= parseFloat($('#Hatch_Time3_7').val().replace(/,/g,''));
		Hatch_Time3_Total	= Hatch_Time3_1+Hatch_Time3_2+Hatch_Time3_3+Hatch_Time3_4+Hatch_Time3_5+Hatch_Time3_6+Hatch_Time3_7;
		$('#Hatch_Time3_Total').val( frm.AddCommas(Hatch_Time3_Total.toFixed(2)) );
		
		Hatch_Time4_1 		= parseFloat($('#Hatch_Time4_1').val().replace(/,/g,''));
		Hatch_Time4_2 		= parseFloat($('#Hatch_Time4_2').val().replace(/,/g,''));
		Hatch_Time4_3 		= parseFloat($('#Hatch_Time4_3').val().replace(/,/g,''));
		Hatch_Time4_4 		= parseFloat($('#Hatch_Time4_4').val().replace(/,/g,''));
		Hatch_Time4_5 		= parseFloat($('#Hatch_Time4_5').val().replace(/,/g,''));
		Hatch_Time4_6 		= parseFloat($('#Hatch_Time4_6').val().replace(/,/g,''));
		Hatch_Time4_7 		= parseFloat($('#Hatch_Time4_7').val().replace(/,/g,''));
		Hatch_Time4_Total	= Hatch_Time4_1+Hatch_Time4_2+Hatch_Time4_3+Hatch_Time4_4+Hatch_Time4_5+Hatch_Time4_6+Hatch_Time4_7;
		$('#Hatch_Time4_Total').val( frm.AddCommas(Hatch_Time4_Total.toFixed(2)) );
		
		Hatch_Total_1 		= Hatch_Time1_1+Hatch_Time2_1+Hatch_Time3_1+Hatch_Time4_1;
		Hatch_Total_2 		= Hatch_Time1_2+Hatch_Time2_2+Hatch_Time3_2+Hatch_Time4_2;
		Hatch_Total_3 		= Hatch_Time1_3+Hatch_Time2_3+Hatch_Time3_3+Hatch_Time4_3;
		Hatch_Total_4 		= Hatch_Time1_4+Hatch_Time2_4+Hatch_Time3_4+Hatch_Time4_4;
		Hatch_Total_5 		= Hatch_Time1_5+Hatch_Time2_5+Hatch_Time3_5+Hatch_Time4_5;
		Hatch_Total_6 		= Hatch_Time1_6+Hatch_Time2_6+Hatch_Time3_6+Hatch_Time4_6;
		Hatch_Total_7 		= Hatch_Time1_7+Hatch_Time2_7+Hatch_Time3_7+Hatch_Time4_7;
		Hatch_Total_Total	= Hatch_Total_1+Hatch_Total_2+Hatch_Total_3+Hatch_Total_4+Hatch_Total_5+Hatch_Total_6+Hatch_Total_7;
		$('#Hatch_Total_1').val( frm.AddCommas(Hatch_Total_1) );
		$('#Hatch_Total_2').val( frm.AddCommas(Hatch_Total_2) );
		$('#Hatch_Total_3').val( frm.AddCommas(Hatch_Total_3) );
		$('#Hatch_Total_4').val( frm.AddCommas(Hatch_Total_4) );
		$('#Hatch_Total_5').val( frm.AddCommas(Hatch_Total_5) );
		$('#Hatch_Total_6').val( frm.AddCommas(Hatch_Total_6) );
		$('#Hatch_Total_7').val( frm.AddCommas(Hatch_Total_7) );
		$('#Hatch_Total_Total').val( frm.AddCommas(Hatch_Total_Total.toFixed(2)) );
		$('#totalTon').val( frm.AddCommas(Hatch_Total_Total.toFixed(2)) );
		
		Hatch_Previous_1 		= parseFloat($('#Hatch_Previous_1').val().replace(/,/g,''));
		Hatch_Previous_2 		= parseFloat($('#Hatch_Previous_2').val().replace(/,/g,''));
		Hatch_Previous_3 		= parseFloat($('#Hatch_Previous_3').val().replace(/,/g,''));
		Hatch_Previous_4 		= parseFloat($('#Hatch_Previous_4').val().replace(/,/g,''));
		Hatch_Previous_5 		= parseFloat($('#Hatch_Previous_5').val().replace(/,/g,''));
		Hatch_Previous_6 		= parseFloat($('#Hatch_Previous_6').val().replace(/,/g,''));
		Hatch_Previous_7 		= parseFloat($('#Hatch_Previous_7').val().replace(/,/g,''));
		
		Hatch_GrandTotal_1 		= Hatch_Previous_1+Hatch_Total_1;
		Hatch_GrandTotal_2 		= Hatch_Previous_2+Hatch_Total_2;
		Hatch_GrandTotal_3 		= Hatch_Previous_3+Hatch_Total_3;
		Hatch_GrandTotal_4 		= Hatch_Previous_4+Hatch_Total_4;
		Hatch_GrandTotal_5 		= Hatch_Previous_5+Hatch_Total_5;
		Hatch_GrandTotal_6 		= Hatch_Previous_6+Hatch_Total_6;
		Hatch_GrandTotal_7 		= Hatch_Previous_7+Hatch_Total_7;
		Hatch_GrandTotal_Total	= Hatch_GrandTotal_1+Hatch_GrandTotal_2+Hatch_GrandTotal_3+Hatch_GrandTotal_4+Hatch_GrandTotal_5+Hatch_GrandTotal_6+Hatch_GrandTotal_7;
		$('#Hatch_GrandTotal_1').val( frm.AddCommas(Hatch_GrandTotal_1) );
		$('#Hatch_GrandTotal_2').val( frm.AddCommas(Hatch_GrandTotal_2) );
		$('#Hatch_GrandTotal_3').val( frm.AddCommas(Hatch_GrandTotal_3) );
		$('#Hatch_GrandTotal_4').val( frm.AddCommas(Hatch_GrandTotal_4) );
		$('#Hatch_GrandTotal_5').val( frm.AddCommas(Hatch_GrandTotal_5) );
		$('#Hatch_GrandTotal_6').val( frm.AddCommas(Hatch_GrandTotal_6) );
		$('#Hatch_GrandTotal_7').val( frm.AddCommas(Hatch_GrandTotal_7) );
		$('#Hatch_GrandTotal_Total').val( frm.AddCommas(Hatch_GrandTotal_Total.toFixed(2)) );
		
		Hatch_Balance_1 		= Hatch_Cargo_1-Hatch_GrandTotal_1;
		Hatch_Balance_2 		= Hatch_Cargo_2-Hatch_GrandTotal_2;
		Hatch_Balance_3 		= Hatch_Cargo_3-Hatch_GrandTotal_3;
		Hatch_Balance_4 		= Hatch_Cargo_4-Hatch_GrandTotal_4;
		Hatch_Balance_5 		= Hatch_Cargo_5-Hatch_GrandTotal_5;
		Hatch_Balance_6 		= Hatch_Cargo_6-Hatch_GrandTotal_6;
		Hatch_Balance_7 		= Hatch_Cargo_7-Hatch_GrandTotal_7;
		Hatch_Balance_Total	= Hatch_Balance_1+Hatch_Balance_2+Hatch_Balance_3+Hatch_Balance_4+Hatch_Balance_5+Hatch_Balance_6+Hatch_Balance_7;
		$('#Hatch_Balance_1').val( frm.AddCommas(Hatch_Balance_1) );
		$('#Hatch_Balance_2').val( frm.AddCommas(Hatch_Balance_2) );
		$('#Hatch_Balance_3').val( frm.AddCommas(Hatch_Balance_3) );
		$('#Hatch_Balance_4').val( frm.AddCommas(Hatch_Balance_4) );
		$('#Hatch_Balance_5').val( frm.AddCommas(Hatch_Balance_5) );
		$('#Hatch_Balance_6').val( frm.AddCommas(Hatch_Balance_6) );
		$('#Hatch_Balance_7').val( frm.AddCommas(Hatch_Balance_7) );
		$('#Hatch_Balance_Total').val( frm.AddCommas(Hatch_Balance_Total.toFixed(2)) );
		

	}
		
	$( '.Hatch' ).on( "keyup change", ".CalHatch", function() {
		CalHatch();
	});
});
</script>
@endpush