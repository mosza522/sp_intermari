@extends('Layouts.default', ['sTitle' => empty($sTitle)?NULL:$sTitle])
@section('content')

<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
		<li>ใบสั่งขาย</li>
		<li class="active">@if(empty($sRowItem)) เพิ่มใบแจ้งงานท่าสิน @else ใบแจ้งงานท่าสิน : {{ $sRowItem->work_number }} @endif</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">ใบแจ้งงานท่าสิน</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12">
			<form action="{{action('SMD\SMDController@saveThaSin', $sRow->id )}}" method="POST" autocomplete="off">
			{{ csrf_field() }}
				<a id="{{ @$sRowItem->work_number }}"></a>
				<div class="panel @if(empty($sRowItem)) panel-success @elseif( !empty($sRow->deleted_at) || !empty($sRowItem->deleted_at) ) panel-danger @else panel-inverse @endif ">
					<div class="panel-heading">
						@if( !empty($sRowItem) && empty($sRow->deleted_at) && empty($sRowItem->deleted_at) )
						<div class="panel-heading-btn">
							<a href="{{ action('SMD\SMDController@ThaSin',$sRow->id) }}" class="btn btn-sm  btn-icon btn-circle btn-success"><i class="fa fa-plus"></i></a>
							<a href="javascript:;" class="btn btn-sm  btn-icon btn-circle btn-danger cConfirm" rel="{{ action('SMD\SMDController@ItemRemove', array($sRow->id, $sRowItem->id, 'ThaSin')) }}" msg="ยืนยันการลบใบแจ้งงานท่าสิน {{ $sRowItem->work_number }}?" ><i class="fa fa-times"></i></a>
						</div>
						@endif
						<h4 class="panel-title"> @if(empty($sRowItem)) เพิ่มใบแจ้งงานท่าสิน @else ใบแจ้งงานท่าสิน : {{ $sRowItem->work_number }}  {!! empty($sRowItem->work_ref)?'':' <span class="text-success">(คัดลองข้อมูลมาจากใบแจ้งงาน '.$sRowItem->work_ref.' )<span>' !!}  @endif</h4>
					</div>
					<div class="panel-body form-horizontal">
						<div class="row">
						@if( !empty($sRowItem) && empty($sRow->deleted_at) && empty($sRowItem->deleted_at) )
							<div style="position: absolute;right: 20px;z-index: 100">
								@if( $sSWPCLM )
								<a href="{{action('SMD\SMDController@BlackHole', array($sRow->id, $sSWPCLM->id, 'withTrashed'=>request('withTrashed')) )}}" class="btn btn-info btn-xs m-r-5">ใบแจ้งงานแบคโฮ {{ $sSWPCLM->work_number }}</a>
								@else
								<a href="javascript:;" class="btn btn-info btn-xs m-r-5 cConfirm" rel="{{ action('SMD\SMDController@ItemCopy', array($sRow->id, $sRowItem->id, 'ThaSin', 'BlackHole')) }}" msg="ยืนยันการคัดลอกข้อมูลไปแบคโฮ ?">คัดลอกข้อมูลไปแบคโฮ</a>
								@endif
								
								@if( $sSWPTRU )
								<a href="{{action('SMD\SMDController@Truck', array($sRow->id, $sSWPTRU->id, 'withTrashed'=>request('withTrashed')) )}}" class="btn btn-info btn-xs m-r-5">ใบแจ้งงานรถบรรทุก {{ $sSWPTRU->work_number }}</a>
								@else
								<a href="javascript:;" class="btn btn-info btn-xs m-r-5 cConfirm" rel="{{ action('SMD\SMDController@ItemCopy', array($sRow->id, $sRowItem->id, 'ThaSin', 'Truck')) }}" msg="ยืนยันการคัดลอกข้อมูลไปรถบรรทุก ?">คัดลอกข้อมูลไปรถบรรทุก</a>
								@endif
							</div>
							@endif
							<div class="col-md-6 m-t-40">
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
									<label class="col-md-3 control-label">เลขที่ใบแจ้งงานท่าสิน</label>
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
									<label class="col-md-3 control-label">สินค้า</label>
									<div class="row col-md-9 Thasin_List">
										@if( !empty($sRowThasinItem) )
											@foreach($sRowThasinItem AS $rowBH)
										<div class="Thasin_Item">
											<div class="pull-left m-l-10 m-b-5" style="width:81%;">
												<select class="form-control pull-left m-r-5" name="ProductID[]" style="width: 51%;">
													<option value="0" rel="0"> กรุณาเลือกรายการสินค้า</option>
												@if( !empty($rowItem) )
													@foreach($rowItem AS $row)
													<option value="{{ $row->ProductID }}" rel="{{ $row->Weight }}" {{ @$rowBH->ProductID==$row->ProductID?'selected':'' }}>{{ $row->ProductName }}</option>
													@endforeach
												@endif
												</select>
												<input type="text" style="width: 29%;" class="form-control price text-right pull-left m-r-5" name="Weight[]" value="{{ isset($rowBH->Weight)?number_format($rowBH->Weight,3):'0' }}" required/>
												<input type="text" style="width: 15%;" class="form-control price text-center pull-left" placeholder="{{ $sRow->job_unit }}" readonly />
											</div>
											<div class="pull-right m-l-10 m-b-5 Thasinbtn" style="width:13%;padding-top:5px;"></div>
										</div>
											@endforeach
										@else
										<div class="Thasin_Item">
											<div class="pull-left m-l-10 m-b-5" style="width:81%;">
												<select class="form-control pull-left m-r-5" name="ProductID[]" style="width: 51%;">
													<option value="0" rel="0"> กรุณาเลือกรายการสินค้า</option>
												@if( !empty($rowItem) )
													@foreach($rowItem AS $row)
													<?php if( empty($Weight) ) $Weight = $row->Weight; ?>
													<option value="{{ $row->ProductID }}" rel="{{ $row->Weight }}">{{ $row->ProductName }}</option>
													@endforeach
												@endif
												</select>
												<input type="text" style="width: 29%;" class="form-control price text-right pull-left m-r-5" name="Weight[]" value="{{ number_format($Weight,3) }}" required/>
												<input type="text" style="width: 15%;" class="form-control price text-center pull-left" placeholder="{{ $sRow->job_unit }}" readonly />
											</div>
											<div class="pull-right m-l-10 m-b-5 Thasinbtn" style="width:13%;padding-top:5px;"></div>
										</div>
										@endif
									</div>
								</div>
									
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label  m-r-10">
										@if( $sRow->job_transport=='Discharge' ) วันที่ขึ้นสินค้า @endif
										@if( $sRow->job_transport=='Load' ) วันที่ลงสินค้า @endif
										@if( $sRow->job_transport=='Other' ) Other @endif
									</label>
									<div class='col-md-8 input-group date datetimepicker'>
										<input type='text' class="form-control" name="work_date_issue" value="{{ isset($sRowItem->work_date_issue)?date('d-m-Y H:i',strtotime($sRowItem->work_date_issue)):old('work_date_issue') }}" readonly />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">แบคโฮในโกดัง</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_baekho_warehouse">
											<option value="0" {{ @$sRowItem->work_baekho_warehouse=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_baekho_warehouse=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ตาชั่ง</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_scales">
											<option value="0" {{ @$sRowItem->work_scales=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_scales=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">โกรก</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_leach">
											<option value="0" {{ @$sRowItem->work_leach=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_leach=='1' || empty($sRowItem) && $sRow->job_transport=='Load')?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">สายกวาดโกรก</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_leach_sweep">
											<option value="0" {{ @$sRowItem->work_leach_sweep=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_leach_sweep=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>

							</div>

							<div class="col-md-6 m-t-40">
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
												<input type="text" style="width: 55%;" class="form-control pull-left m-r-5 ProductName" value="{{ isset($row->ProductName)?$row->ProductName:'' }}" rel="{{ $row->ProductID }}" readonly />
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
									<label class="col-md-3 control-label">ฝากโกดัง</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_warehouse">
											<option value="0" {{ @$sRowItem->work_warehouse=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_warehouse=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label"></label>
									<div class="row col-md-8 Warehouse_List">
										@if( !empty($sRowThasinWarehouse) )
											@foreach($sRowThasinWarehouse AS $rowBH)
										<div class="Warehouse_Item">
											<div class="pull-left m-l-10 m-b-5" >
												<div>
													<select class="form-control pull-left m-r-5 w100" name="WarehouseID[]">
														<option value="0" >เลือกโกดัง</option>
													@if( !empty($sRowWarehouse) )
														@foreach($sRowWarehouse AS $row)
														<option value="{{ $row->id }}" {{ @$rowBH->WarehouseID==$row->id?'selected':'' }}>{{ $row->WarehouseName }}</option>
														@endforeach
													@endif
													</select>	
													<input type="text" class="form-control price text-right pull-left w100" placeholder="น้ำหนักประเมิน" name="WarehouseWeight[]" value="{{ isset($rowBH->Weight)?number_format($rowBH->Weight,3):'0' }}" />
													<input type="text" class="form-control price text-right pull-left w40 m-l-5" placeholder="ตัน" readonly />
												</div>
												<div class="m-t-5" style="display: inline-block;text-align: left;">
													<input type="text" class="form-control price text-right pull-left w100" placeholder="สายกวาดโกดัง" readonly />
													<select class="form-control pull-left w100 m-l-5" name="Sweep[]">
														<option value="0" {{ @$rowBH->Sweep=='0'?'selected':'' }}>No</option>
														<option value="1" {{ (@$rowBH->Sweep=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
													</select>
													<div class="pull-right m-l-10 m-t-5 Warehousebtn"></div>
												</div>
											</div>
										</div>
											@endforeach
										@else
										<div class="Warehouse_Item">
											<div class="pull-left m-l-10 m-b-5" >
												<div>
													<select class="form-control pull-left m-r-5 w100" name="WarehouseID[]">
														<option value="0" >เลือกโกดัง</option>
													@if( !empty($sRowWarehouse) )
														@foreach($sRowWarehouse AS $row)
														<option value="{{ $row->id }}">{{ $row->WarehouseName }}</option>
														@endforeach
													@endif
													</select>	
													<input type="text" class="form-control price text-right pull-left w100" placeholder="น้ำหนักประเมิน" name="WarehouseWeight[]" />
													<input type="text" class="form-control price text-right pull-left w40 m-l-5" placeholder="ตัน" readonly />
												</div>
												<div class="m-t-5" style="display: inline-block;text-align: left;">
													<input type="text" class="form-control price text-right pull-left w100" placeholder="สายกวาดโกดัง" readonly />
													<select class="form-control pull-left w100 m-l-5" name="Sweep[]">
														<option value="0">No</option>
														<option value="1">Yes</option>
													</select>
													<div class="pull-right m-l-10 m-t-5 Warehousebtn"></div>
												</div>
											</div>
										</div>
										@endif
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ผ่านท่า</label>
									<div class="col-md-9">
										<div class="pull-left">
											<select class="form-control w100" name="work_pass">
												<option value="0" {{ @$sRowItem->work_pass=='0'?'selected':'' }}>No</option>
												<option value="1" {{ (@$sRowItem->work_pass=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
											</select>
										</div>
										<div class="pull-left w100 m-l-5">
											<input type="text" name="work_pass_weight" class="form-control price text-right" placeholder="น้ำหนักประเมิน" value="{{ @number_format($sRowItem->work_pass_weight,3) }}"/>
										</div>
										<div class="pull-left w40">
											<input type="text" class="form-control" value="ตัน" readonly style="border: transparent;background-color: white;color: black;opacity: 1;" />
										</div>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">หมายเหตุ</label>
									<div class="col-md-8">
										<textarea class="form-control" name="work_note" rows="5" style="width:100%;">{{ @$sRowItem->work_note }}</textarea>
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
										<input name="JobItemSWPID" type="hidden" value="{{ @$sRowItem->id }}" >
										<button type="submit" class="btn btn-sm btn-primary m-r-5">@if(empty($sRowItem)) เพิ่มใบแจ้งงานท่าสิน @else ปรับปรุงใบแจ้งงานท่าสิน @endif </button>
										@endif
									</div>
									<div class="col-xs-4 text-right"></div>
								</div>
								
								<div class="col-md-12 text-center m-t-20 text-danger f-w-600">หากมีการใช้งาน แบคโฮและรถบรรทุกภายใต้ใบแจ้งงานท่าสิน ให้ออกใบแจ้งงานแบคโฮและรถบรรทุก จากเมนูมุมขวาบนนี้เท่านั้น<br/>หากออกจากเมนูปกติ ระบบจะมองว่าเป็นคนละงานกัน</div>
							</div>
							
						</div>
					</div>
				</div>
			</form>
			
			
		</div>
		<!-- end col-12 -->
	</div>
	<!-- end row -->
	<div id="xfocus">
		<table style="width: 100%;">
			<tr>
				<td><b>รายการ</b></td>
				<td class="w90 text-right"><b>ยอดตาม S.O.</b></td>
				<td class="w100 text-right"><b>ยอดใบงานอื่น</b></td>
				<td class="w90 text-right"><b>คงเหลือ</b></td>
			</tr>
		@if( !empty($rowItem) )
			@foreach($rowItem AS $row)
			<tr>
				<td>{{ $row->ProductName }}</td>
				<td class="w90 text-right">{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}</td>
				<td class="w90 text-right">{{ isset($sRowWeight[$row->ProductID])?number_format($sRowWeight[$row->ProductID],3):'0.000' }}</td>
				<td class="w90 text-right" id="xFocus{{ $row->ProductID }}" >0</td>
			</tr>
			@endforeach
		@endif
		</table>
	</div>
</div>
@stop




@push('scripts')
<link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<style>
#xfocus {
	display:none;
	font-family: Helvetica, sans-serif;
	word-wrap: break;
	width: 475px;
	background: navajowhite;
	padding: 7px;
	position: absolute;
	z-index: 99999;
	border-radius: 5px;
	border: 2px solid #73AD21;
}
</style>
@endpush



@push('scripts')
<script src="assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
var job_weight;
$(function() {
	$( '.Thasin_List' ).on( "click", ".Thasinbtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			ThasinList();
		}
	});
	$( '.Thasin_List' ).on( "click", ".Thasinbtn .btn-success", function() {
		var _this = $(this).parent().parent().parent();
		_this.find('.Thasin_Item:last').clone().insertAfter(_this.find('.Thasin_Item:last'));
		_this.find('.Thasin_Item:last').last().find('input').val('');
		ThasinList();
	});
	
	$('.panel-body').on('change' , '.Thasin_Item select', function (e) {
		$(this).next().val($(this).find("option:selected").attr('rel'));
	});
	
	ThasinList = function(){
		$( '.Thasin_List .Thasin_Item' ).each(function(index, element) {
			$(this).find('.Thasinbtn a').remove();
			if( $(this).index() != 0 ){
				$(this).find('.Thasinbtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
			}
			if( $(this).parent().find('.Thasin_Item').length-1 == $(this).index( ) ){
				$(this).find('.Thasinbtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
			}
		});
	}
	ThasinList();
	
	$( '.Warehouse_List' ).on( "click", ".Warehousebtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			WarehouseList();
		}
	});
	$( '.Warehouse_List' ).on( "click", ".Warehousebtn .btn-success", function() {
		var _this = $(this).parent().parent().parent().parent();
		_this.last().clone().insertAfter(_this.last()).find('input').val('');
		WarehouseList();
	});
	
	WarehouseList = function(){
		$( '.Warehouse_List .Warehouse_Item' ).each(function(index, element) {
			$(this).find('.Warehousebtn a').remove();
			if( $(this).index() != 0 ){
				$(this).find('.Warehousebtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
			}
			if( $(this).parent().find('.Warehouse_Item').length-1 == $(this).index( ) ){
				$(this).find('.Warehousebtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
			}
		});
	}

	WarehouseList();
	/******************************************************************************************************************/

	$('.datetimepicker').datetimepicker({
		format : 'DD-MM-YYYY HH:mm',
		ignoreReadonly: true
	});

	
	$(document).on('click', '#xfocus', function(event) {
		$('#xfocus').css({'display':'none'});
	});
	
});
											


</script>
@endpush