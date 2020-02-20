@extends('Layouts.default', ['sTitle' => empty($sTitle)?NULL:$sTitle])
@section('content')

<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
		<li>ใบสั่งขาย</li>
		<li class="active">@if(empty($sRowItem)) เพิ่มใบแจ้งงานแบคโฮ @else ใบแจ้งงานแบคโฮ : {{ $sRowItem->work_number }} @endif</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">ใบแจ้งงานแบคโฮ</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-md-12">

			<form action="{{action('SMD\SMDController@saveBlackHole', $sRow->id )}}" method="POST" autocomplete="off">
			{{ csrf_field() }}
				<a id="{{ @$sRowItem->work_number }}"></a>
				<div class="panel @if(empty($sRowItem)) panel-success @elseif( !empty($sRow->deleted_at) || !empty($sRowItem->deleted_at) ) panel-danger @else panel-inverse @endif ">
					<div class="panel-heading">
						@if( !empty($sRowItem) && empty($sRow->deleted_at) && empty($sRowItem->deleted_at) )
						<div class="panel-heading-btn">
							<a href="{{ action('SMD\SMDController@BlackHole',$sRow->id) }}" class="btn btn-sm  btn-icon btn-circle btn-success"><i class="fa fa-plus"></i></a>
							<a href="javascript:;" class="btn btn-sm  btn-icon btn-circle btn-danger cConfirm" rel="{{ action('SMD\SMDController@ItemRemove', array($sRow->id, $sRowItem->id, 'BlackHole')) }}" msg="ยืนยันการลบใบแจ้งงานแบคโฮ {{ $sRowItem->work_number }}?" ><i class="fa fa-times"></i></a>
						</div>
						@endif
						<h4 class="panel-title"> @if(empty($sRowItem)) เพิ่มใบแจ้งงานแบคโฮ @else ใบแจ้งงานแบคโฮ : {{ $sRowItem->work_number }} {!! empty($sRowItem->work_ref)?'':' <span class="text-success">(คัดลองข้อมูลมาจากใบแจ้งงาน '.$sRowItem->work_ref.' )<span>' !!} @endif</h4>
					</div>
					<div class="panel-body form-horizontal">
						<div class="row">
						@if( !empty($sRowItem) && empty($sRow->deleted_at) && empty($sRowItem->deleted_at) && !$sRowItem->work_ref )
								<div style="position: absolute;right: 20px;z-index: 100">
									<a href="javascript:;" class="btn btn-info btn-xs m-r-5 cConfirm" rel="{{ action('SMD\SMDController@ItemCopy', array($sRow->id, $sRowItem->id, 'BlackHole', 'Truck')) }}" msg="ยืนยันการคัดลอกข้อมูลไปรถบรรทุก ?">คัดลอกข้อมูลไปรถบรรทุก</a>
								</div>
							@endif
							
							<div class="col-md-6  m-t-5">

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
									<label class="col-md-3 control-label">เลขที่ใบแจ้งงานแบคโฮ</label>
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
								
								<div class="form-group m-b-5">
									<label class="col-md-3 control-label">สินค้า</label>
									<div class="row col-md-9 Blackhole_List">
										@if( !empty($sRowBlackholeItem) )
											@foreach($sRowBlackholeItem AS $rowBH)
										<div class="Blackhole_Item">
											<div class="pull-left m-l-10 m-b-5" style="width:81%;">
												<select class="form-control pull-left m-r-5" name="ProductID[]" style="width: 51%;" required>
													<option value="0" rel="0"> กรุณาเลือกรายการสินค้า</option>
												@if( !empty($rowItem) )
													@foreach($rowItem AS $row)
													<option value="{{ $row->ProductID }}" rel="0" {{ @$rowBH->ProductID==$row->ProductID?'selected':'' }}>{{ $row->ProductName }}</option>
													@endforeach
												@endif
												</select>
												<input type="text" style="width: 29%;" class="form-control price text-right pull-left m-r-5 xfocus FocusBH" name="Weight[]" value="{{ isset($rowBH->Weight)?number_format($rowBH->Weight,3):'0' }}"  autocomplete="off" required/>
												<input type="text" style="width: 15%;" class="form-control price text-center pull-left" placeholder="{{ $sRow->job_unit }}" readonly />
											</div>
											<div class="pull-right m-l-10 m-b-5 Blackholebtn" style="width:13%;padding-top:5px;"></div>
										</div>
											@endforeach
										@else
										<div class="Blackhole_Item">
											<div class="pull-left m-l-10 m-b-5" style="width:81%;">
												<select class="form-control pull-left m-r-5" name="ProductID[]" style="width: 51%;" required>
													<option value="0" rel="0"> กรุณาเลือกรายการสินค้า</option>
												@if( !empty($rowItem) )
													@foreach($rowItem AS $row)
													<?php if( empty($Weight) ) $Weight = $row->Weight; ?>
													<option value="{{ $row->ProductID }}" rel="0">{{ $row->ProductName }}</option>
													@endforeach
												@endif
												</select>
												<input type="text" style="width: 29%;" class="form-control price text-right pull-left m-r-5 xfocus FocusBH" name="Weight[]" value="{{ number_format($Weight,3) }}" required/>
												<input type="text" style="width: 15%;" class="form-control price text-center pull-left" placeholder="{{ $sRow->job_unit }}" readonly />
											</div>
											<div class="pull-right m-l-10 m-b-5 Blackholebtn" style="width:13%;padding-top:5px;"></div>
										</div>
										@endif
									</div>
								</div>

								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">แบคโฮหน้าท่า</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_backhoe">
											<option value="0" {{ @$sRowItem->work_backhoe=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_backhoe=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">สายกวาดหน้าท่า</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_sweep_line">
											<option value="0" {{ @$sRowItem->work_sweep_line=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_sweep_line=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">BOBCAT</label>
									<div class="col-md-8">
										<select class="form-control w100" name="work_bobcat">
											<option value="0" {{ @$sRowItem->work_bobcat=='0'?'selected':'' }}>No</option>
											<option value="1" {{ (@$sRowItem->work_bobcat=='1' || empty($sRowItem))?'selected':'' }}>Yes</option>
										</select>
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
							</div>

							<div class="col-md-6" style="padding-top:55px;">
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
									<label class="col-md-3 control-label">
										@if( $sRow->job_transport=='Discharge' ) ท่าขึ้นสินค้า @endif
										@if( $sRow->job_transport=='Load' ) ท่าลงสินค้า @endif
										@if( $sRow->job_transport=='Other' ) Other @endif
									</label>
									<div class="col-md-8">
										<input type="text" class="form-control AutoComplete" data-Models="Master\SMD\Harbor" data-Field="HarborName" placeholder="ท่าขึ้นสินค้า" value="{{ isset($sRowItem->HarborName)?$sRowItem->HarborName:old('HarborName') }}" required />
										<input name="HarborID" type="hidden" value="{{ isset($sRowItem->HarborID)?$sRowItem->HarborID:'' }}" >
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label m-r-10">วันที่ขึ้นสินค้า</label>
									<div class='col-md-7 input-group date datetimepicker'>
										<input type='text' class="form-control" name="work_date_issue" value="{{ isset($sRowItem->work_date_issue)?date('d-m-Y H:i',strtotime($sRowItem->work_date_issue)):old('work_date_issue') }}" readonly />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">ฝ่ายที่รับผิดชอบ {{ @$sRowItem->work_contractor }}</label>
									<div class="col-md-8">
										<select class="form-control w200" name="work_contractor">
											<option value="CLM" {{ @$sRowItem->work_contractor=='CLM'?'selected':'' }}>สำนักงานใหญ่</option>
											<option value="SWP" {{ @$sRowItem->work_contractor=='SWP'?'selected':'' }}>ท่าสินวัฒนา</option>
										</select>
									</div>
								</div>
								
								<div class="form-group m-b-10">
									<label class="col-md-3 control-label">หมายเหตุ</label>
									<div class="col-md-8">
										<textarea class="form-control" name="work_note" rows="4" style="width:100%;">{{ @$sRowItem->work_note }}</textarea>
									</div>
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
									<input name="JobItemCLMID" type="hidden" value="{{ @$sRowItem->id }}" >
									<button type="submit" class="btn btn-sm btn-primary m-r-5">@if(empty($sRowItem)) เพิ่มใบแจ้งงานแบคโฮ @else ปรับปรุงใบแจ้งงานแบคโฮ @endif </button>
									@endif
								</div>
								<div class="col-xs-4 text-right"></div>
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
	$('.AutoComplete' ).autocomplete({
		minLength: 1,
		source: function( request, response ) {
            var Field 	= this.element.attr('data-Field');
            var Models 	= this.element.attr('data-Models')?this.element.attr('data-Models'):true;
			$.ajax({
				type	: 'POST',
				url		: '{{ action("AutocompleteController@getSearch") }}',
				dataType: "json",
				data	: { Models: Models, Field: Field, query: request.term, Id: this.element.attr('id') },
				success	: function( data ) {
					response( $.map( data, function( result ) {
						return {label: result.value, value: result.value, id: result.id}
					}));
				}
			});
		},
		select: function( event, ui ) {
			$(this).next().val(ui.item.id);
		},
		change: function( event, ui ){
			if( !ui.item ){
				$(this).val('');
				$(this).next().val('');
			}
		}
	});

	/******************************************************************************************************************/
	$( '.Blackhole_List' ).on( "click", ".Blackholebtn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			BlackholeList();
		}
	});
	$( '.Blackhole_List' ).on( "click", ".Blackholebtn .btn-success", function() {
		var _this = $(this).parent().parent().parent();
		_this.find('.Blackhole_Item:last').clone().insertAfter(_this.find('.Blackhole_Item:last'));
		_this.find('.Blackhole_Item:last').last().find('input').val('');
		
		BlackholeList();
	});
	
	$('.panel-body').on('change' , '.Blackhole_Item select', function (e) {
		$(this).next().val($(this).find("option:selected").attr('rel'));
	});
	
	BlackholeList = function(){
		$( '.Blackhole_List .Blackhole_Item' ).each(function(index, element) {
			$(this).find('.Blackholebtn a').remove();
			if( $(this).index() != 0 ){
				$(this).find('.Blackholebtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
			}
			if( $(this).parent().find('.Blackhole_Item').length-1 == $(this).index( ) ){
				$(this).find('.Blackholebtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
			}
		});
	}

	BlackholeList();
	/******************************************************************************************************************/

	$('.datetimepicker').datetimepicker({
		format : 'DD-MM-YYYY HH:mm',
		ignoreReadonly: true
	});

	$(document).on('keyup', '.FocusBH', function(event) {
		FocusBH();
	});
	$(document).on('click', '.FocusBH', function(event) {
		FocusBH();
		var right = ($(window).width() - ($(this).prev().offset().left + $(this).prev().outerWidth()))-200;
		$('#xfocus').css( {top:$(this).offset().top+35, right: right, 'display':'block'});
	});
	
	$(document).on('click', '#xfocus', function(event) {
		$('#xfocus').css({'display':'none'});
	});
	
});

FocusBH = function(){
	var Product = @if( empty($sRowWeight) ) new Array(); @else  {!! json_encode($sRowWeight) !!} ; @endif
	$( '.FocusBH' ).each(function(index, element) {
		ProductID 	= $(this).prev().val();
		ProductVal 	= parseFloat($(this).val().replace(/,/g, ''));
		ProductVal 	= isNaN(ProductVal)?0:ProductVal;
		
		if( Product[ProductID] ){
			Product[ProductID] = Product[ProductID] + ProductVal;
		}else{
			Product[ProductID] = ProductVal;
		}
	});
	

	$( '.ProductName' ).each(function(index, element) {
		val1 = isNaN(Product[$(this).attr('rel')])?0:Product[$(this).attr('rel')];
		val2 = frm.AddCommas((parseFloat($(this).next().val().replace(/,/g, ''))-val1).toFixed(3));
		$('#xFocus'+$(this).attr('rel')).html(val2);
	});	
}

</script>
@endpush