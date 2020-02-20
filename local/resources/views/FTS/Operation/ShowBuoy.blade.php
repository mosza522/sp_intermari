@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li>ใบแจ้งงาน:  {{ $sRow->work_number }}</li>
				<li>ใบงานเรือใหญ่:  {{ $sRow->workNumber }}</li>
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
								การปฏิบัติงานเรือใหญ่ ใบงาน :  {{ $sRow->workNumber }}
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
										<label class="col-md-3 control-label">เลขที่ใบงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->workNumber}}" readonly />
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
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สายกวาดทะเล</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ $sRow->work_sealine=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_sealine=='0'?'No':'Yes' }}</a></div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุใบแจ้งงาน</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="3" style="width:93%;" readonly >{{ isset($sRow->work_note)?$sRow->work_note:'' }}</textarea>
										</div>
									</div>
									
								</div>

								
								<div class="col-md-12">
									<div class="form-group m-b-5 m-t-25">
										@if( !empty($sRow->BuoyName) )
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationController@show', $sRow->ItemID) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบแจ้งงาน : {{ $sRow->work_number }}</a>
										</div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('FTS\OperationElectricityController@index', $sRow->id) }}" class="btn btn-sm btn-primary  w250">รายการการทำงานเครื่องกำเนิดไฟฟ้า</a>
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationElectricityController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">บันทึกการทำงานเครื่องกำเนิดไฟฟ้า</a>
										</div>
										@else
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationController@index') }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้ารายการ การปฏิบัติงานเรือใหญ่</a>
										</div>
										@endif
									</div>
									
									@if( !empty($sRow->BuoyName) )
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('FTS\OperationCraneController@index', $sRow->id) }}" class="btn btn-sm btn-primary  w250">รายการปฏิบัติงานเครน</a>
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationCraneController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">บันทึกการปฏิบัติงานเครน</a>
										</div>
									</div>
									@endif
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('FTS\OperationMachineController@index', $sRow->id) }}" class="btn btn-sm btn-primary  w250">รายการเครื่องจักรเสียหายระหว่างปฏิบัติงาน</a>
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationMachineController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">บันทึกเครื่องจักรเสียหายระหว่างปฏิบัติงาน</a>
										</div>
									</div>
									
									@if( !empty($sRow->BuoyName) )
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('FTS\OperationOilBuoyController@index', $sRow->id) }}" class="btn btn-sm btn-primary  w250">รายการ การใช้น้ำมันของทุ่น</a>
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationOilBuoyController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">บันทึกการใช้น้ำมันของทุ่น</a>
										</div>
									</div>
									@endif
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('FTS\OperationOilBackhoeController@index', $sRow->id) }}" class="btn btn-sm btn-primary  w250">รายการ การใช้น้ำมันของแบคโฮ</a>
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationOilBackhoeController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">บันทึกการใช้น้ำมันของแบคโฮ</a>
										</div>
									</div>
									
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('FTS\OperationStaffController@index', $sRow->id) }}" class="btn btn-sm btn-primary  w250">รายการปรับปรุงรายชื่อพนักงาน</a>
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationStaffController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">ปรับปรุงรายชื่อพนักงานปฏิบัติงานเรือใหญ่</a>
										</div>
									</div>
									
									@if( !empty($sRow->BuoyName) )
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right">
										</div>
										<div class="col-xs-4 text-left">
											<a href="{{ action('FTS\OperationAlongsideController@create', $sRow->id) }}" class="btn btn-sm btn-success w250">บันทึกข้อมูล Alongside</a>
										</div>
									</div>
									@endif
								</div>
							</fieldset>
						</div>
					</div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
@stop