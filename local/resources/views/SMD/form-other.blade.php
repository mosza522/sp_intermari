@extends('Layouts.default', ['sTitle' => empty($sTitle)?NULL:$sTitle])
@section('content')

<div id="xfocus"></div>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
		<li>ใบสั่งขาย</li>
		<li class="active">@if(empty($sRowItem)) เพิ่มใบแจ้งงานอื่น ๆ @else ใบแจ้งงานอื่น ๆ : {{ $sRowItem->work_number }} @endif</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">ใบแจ้งงานอื่น ๆ</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12">
			<form action="{{action('SMD\SMDController@saveOther', $sRow->id )}}" method="POST" autocomplete="off">
			{{ csrf_field() }}
				<a id="{{ @$sRowItem->work_number }}"></a>
				<div class="panel @if(empty($sRowItem)) panel-success @elseif( !empty($sRow->deleted_at) || !empty($sRowItem->deleted_at) ) panel-danger @else panel-inverse @endif ">
					<div class="panel-heading">
						@if( !empty($sRowItem) && empty($sRow->deleted_at) && empty($sRowItem->deleted_at) )
						<div class="panel-heading-btn">
							<a href="{{ action('SMD\SMDController@Other',$sRow->id) }}" class="btn btn-sm  btn-icon btn-circle btn-success"><i class="fa fa-plus"></i></a>
							<a href="javascript:;" class="btn btn-sm  btn-icon btn-circle btn-danger cConfirm" rel="{{ action('SMD\SMDController@ItemRemove', array($sRow->id, $sRowItem->id, 'Other')) }}" msg="ยืนยันการลบใบแจ้งงานอื่น {{ $sRowItem->work_number }}?" ><i class="fa fa-times"></i></a>
						</div>
						@endif
						<h4 class="panel-title"> @if(empty($sRowItem)) เพิ่มใบแจ้งงานอื่น ๆ @else ใบแจ้งงานอื่น ๆ : {{ $sRowItem->work_number }} @endif</h4>
					</div>
					<div class="panel-body form-horizontal">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">เลขที่ใบสั่งขาย</label>
									<div class="row col-md-9">
										<div class="pull-left m-l-10" style="width: 32%;">
											<input type="text" class="form-control text-center" name="job_number" placeholder="Auto" value="{{ isset($sRow->job_number)?$sRow->job_number:old('job_number') }}" readonly />
										</div>
										<div class="pull-left m-l-10" style="width: 32%;">
											<input type="text" class="form-control text-center" name="job_number" value="{{ isset($sRow->created_at)?date('d-m-Y',strtotime($sRow->created_at)):date('d-m-Y') }}" readonly />
										</div>
									</div>
								</div>
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">เลขที่ใบแจ้งงานอื่น ๆ</label>
									<div class="row col-md-9">
										<div class="pull-left m-l-10" style="width: 32%;">
											<input type="text" class="form-control text-center" placeholder="Auto" value="{{ isset($sRowItem->work_number)?$sRowItem->work_number:'Auto' }}" readonly style="background-color: moccasin;font-weight: bold;"/>
										</div>
										<div class="pull-left m-l-10" style="width: 32%;">
											<input type="text" class="form-control text-center" name="job_number" value="{{ isset($sRowItem->created_at)?date('d-m-Y',strtotime($sRowItem->created_at)):date('d-m-Y') }}" readonly style="background-color: moccasin;font-weight: bold;"/>
										</div>
									</div>
								</div>
					
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ลูกค้า</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{ $sRow->OwnerName }}" readonly />
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">เรือใหญ่</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ประเภทงาน</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{ $sRow->job_transport }}" readonly />
									</div>
								</div>
						
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label m-r-10">ETA/วันที่เรือใหญ่</label>
									<div class='col-md-8 input-group date'>
										<input type='text' class="form-control" value="{{ isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):'' }}" readonly />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">รายละเอียดงาน</label>
									<div class="col-md-9">
										<textarea class="form-control" name="work_note" rows="5" style="width:100%;">{{ @$sRowItem->work_note }}</textarea>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ประเภทสินค้า</label>
									<div class="row col-md-4">
										<input type="text" class="form-control text-center pull-left m-l-10" value="{{ @$sRow->job_category=='1'?'เทกอง':'' }} {{ @$sRow->job_category=='2'?'เครื่องจักร':'' }} {{ @$sRow->job_category=='3'?'ชิ้น':'' }} " readonly />
									</div>
								</div>
								<div class="form-group m-b-5">
									<label class="col-md-3 control-label">สินค้า</label>
									<div class="row col-md-9">
									@if( !empty($rowItem) )
										@foreach($rowItem AS $row)
										<div>
											<div class="pull-left m-l-10  m-b-5">
												<input type="text" style="width: 55%;" class="form-control pull-left m-r-5" value="{{ isset($row->ProductName)?$row->ProductName:'' }}" readonly />
												<input type="text" style="width: 25%;" class="form-control price text-right pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}" readonly />
												<input type="text" style="width: 15%;" class="form-control price text-center pull-left" value="{{ $sRow->job_unit }}" readonly />
											</div>
										</div>
										@endforeach
									@endif
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">น้ำหนักรวม</label>
									<div class="col-md-8">
										<input type="text" class="form-control price text-right pull-left m-r-5 w100" value="{{ number_format($sRow->job_weight,3) }}" readonly />
										<input type="text" class="form-control price text-center pull-left w80" value="{{ $sRow->job_unit }}" readonly />
									</div>
								</div>
							
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">มูลค่า</label>
									<div class="col-md-3">
										<input type="text" class="form-control text-center price text-right w100" placeholder="มูลค่า" name="work_price" value="{{ @number_format($sRowItem->work_price,2) }}"  />
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ฝ่ายที่รับผิดชอบ</label>
									<div class="col-md-4">
										<div class="checkbox"><label><input type="checkbox" name="work_buoy" value="1" {{ @$sRowItem->work_buoy==1?'checked':'' }} >ทุ่น</label></div>
										<div class="checkbox"><label><input type="checkbox" name="work_ship" value="1" {{ @$sRowItem->work_ship==1?'checked':'' }} >เรือ</label></div>
										<div class="checkbox"><label><input type="checkbox" name="work_blackhole" value="1" {{ @$sRowItem->work_blackhole==1?'checked':'' }} >แบคโอ</label></div>
										<div class="checkbox"><label><input type="checkbox" name="work_thasin" value="1" {{ @$sRowItem->work_thasin==1?'checked':'' }} >ท่าสิน</label></div>
										<div class="checkbox"><label><input type="checkbox" name="work_truck" value="1" {{ @$sRowItem->work_truck==1?'checked':'' }} >รถบรรทุก</label></div>
									</div>
								</div>
							
							</div>
							
							<div class="col-md-12">
								<div class="form-group m-t-30 m-b-5">
									<div class="col-xs-4 text-left">
										<a href="{{ action('SMD\SMDController@edit',$sRow->id) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบสั่งขาย</a>
									</div>
									<div class="col-xs-4 text-center">
										@if( empty($sRow->deleted_at) && empty($sRowItem->deleted_at) )
										<input name="JobItemOtherID" type="hidden" value="{{ @$sRowItem->id }}" >
										<button type="submit" class="btn btn-sm btn-primary m-r-5">@if(empty($sRowItem)) เพิ่มใบแจ้งงานอื่น ๆ @else ปรับปรุงใบแจ้งงานอื่น ๆ @endif </button>
										@endif
									</div>
									<div class="col-xs-4 text-right"></div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</form>
			
			
		</div>
		<!-- end col-12 -->
	</div>
	<!-- end row -->
</div>
@stop