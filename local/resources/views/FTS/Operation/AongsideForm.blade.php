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
				<li>LIST OF ALONGSIDE</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ALONGSIDE</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i> LIST OF LIGHTER ALONGSIDE</h4>
						</div>
						
						<form action="{{action('FTS\OperationAlongsideController@store', array($sRow->OperationID) )}}" method="POST" autocomplete="off">
							{{ csrf_field() }}
							@if( !empty($rowAlongside->id) )
							<input type="hidden" name="AlongsideID" value="{{ $rowAlongside->id }}" />
							@endif
							<input type="hidden" name="ItemID" value="{{ $sRow->ItemID }}" />
							<input type="hidden" name="sDelete" id="sDelete"/>
							<input type="hidden" name="workDate" value="{{ isset($rowAlongside->workDate)?date('d-m-Y',strtotime($rowAlongside->workDate)):date('d-m-Y') }}" />

							<div class="panel-body form-horizontal">
								<fieldset class="m-t-10">
									<div class="col-md-6">
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">เลขที่ใบแจ้งงาน</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->workNumber}}" readonly />
												@if( !empty($sRow->BuoyName) )
												<input type='text' class="form-control text-center w140 pull-left" value="{{ $sRow->BuoyName }}" readonly />
												@endif
											</div>
										</div>
										<div class="form-group m-b-10">
											<label class="col-md-3 control-label">เรือใหญ่</label>
											<div class="col-md-9">
												<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">การขนถ่ายปัจจุบัน</label>
											<div class="col-md-9">
												<input type="text" class="form-control text-right w140 pull-left m-r-5" id="Loading" name="Loading" value="{{ @number_format($rowAlongside->Loading) }}" style="padding-right: 7px;" readonly />
											</div>
										</div>
									</div>
									<div class="col-md-12 m-t-20">
										<div class="form-group Alongside">
											<div class="pull-left m-l-10 m-b-5"style="width:100%;">
												<input type="text" style="background-color: transparent;border-color: transparent;width: 16%;" class="form-control pull-left text-center m-r-5"  value="Name of Lighter" readonly />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 16%;" class="form-control pull-left text-center m-r-5" value="{{ $sRow->Alongside }}" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 8%;" class="form-control pull-left text-center m-r-5" value="P'/KGS" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 8%;" class="form-control pull-left text-center m-r-5" value="M/TONS." />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 8%;" class="form-control pull-left text-center m-r-5" value="Marks" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 11%;" class="form-control pull-left text-center m-r-5" value="Alongside" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 11%;" class="form-control pull-left text-center m-r-5" value="Commenced" />
												<input type="text" style="background-color: transparent;border-color: transparent;width: 11%;" class="form-control pull-left text-center m-r-5" value="Completed" />
											</div>
											@if( $rowLighter->count() )
												@foreach( $rowLighter AS $index => $l )
											<div class="Item pull-left m-b-15" style="width:100%;border-bottom: 2px solid #aaa;">
												<div class="ItemMain" style="display: inline-block;width:100%">
													<input type="hidden" name="AlongsideLighterID[{{ $l->id }}]" value="{{ $l->id }}" />
													<input type="text" style="width: 4%;border: transparent;" class="form-control pull-left text-center b" value="#{{ $index+1 }}" />
													<input type="text" style="width: 14%;" class="form-control pull-left m-r-5" value="{{ $l->LighterID }}" name="LighterID[{{ $l->id }}]" required/>
													<input type="text" style="width: 14%;" class="form-control pull-left text-center m-r-5 " value="{{ $l->Consignee }}" name="Consignee[{{ $l->id }}]" placeholder="{{ $sRow->Alongside }}"/>
													<input type="text" style="width: 8%;" class="form-control pull-left text-center m-r-5" value="{{ $l->KGS }}" name="KGS[{{ $l->id }}]" placeholder="P'/KGS"/>
													<input type="text" style="width: 8%;padding-right: 7px; font-weight: bold;" class="form-control pull-left text-right m-r-5 Loading" value="{{ $l->TONS }}" name="TONS[{{ $l->id }}]" placeholder="M/TONS" readonly />
													<input type="text" style="width: 8%;" class="form-control pull-left text-center m-r-5" value="{{ $l->Marks }}" name="Marks[{{ $l->id }}]" placeholder="Marks"/>
													<input type="text" style="width: 11%;" class="form-control pull-left text-center m-r-5 datetimepicker" value="{{ date('d-m-Y H:i',strtotime($l->Alongside)) }}" name="Alongside[{{ $l->id }}]" required/>
													<input type="text" style="width: 11%;" class="form-control pull-left text-center m-r-5 datetimepicker" value="{{ date('d-m-Y H:i',strtotime($l->Commenced)) }}" name="Commenced[{{ $l->id }}]" required/>
													<input type="text" style="width: 11%;" class="form-control pull-left text-center m-r-5 datetimepicker" value="{{ date('d-m-Y H:i',strtotime($l->Completed)) }}" name="Completed[{{ $l->id }}]" required/>
													<div class="pull-right m-b-5 AlongsideBtn" style="width:6%;padding-top:5px;"></div>
												</div>
												<div class="ItemList m-b-10" style="display: inline-block;width:100%">
													<input type="text" style="width: 4%;border: transparent;" class="form-control pull-left" />
													<select class="form-control pull-left m-r-5" style="width: 14%;" name="ProductID[{{ $l->id }}]" required>
														@if( $rowItem->count() )
															@foreach($rowItem AS $r)
																<option value="{{ $r->ProductID }}" {{ $r->ProductID==$l->ProductID?'selected':'' }}>{{ $r->ProductName }}</option>
															@endforeach
														@endif
													</select>
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch1 }}" placeholder="HATCH 1" name="Hatch1[{{ $l->id }}]"/>
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch2 }}" placeholder="HATCH 2" name="Hatch2[{{ $l->id }}]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch3 }}" placeholder="HATCH 3" name="Hatch3[{{ $l->id }}]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch4 }}" placeholder="HATCH 4" name="Hatch4[{{ $l->id }}]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch5 }}" placeholder="HATCH 5" name="Hatch5[{{ $l->id }}]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch6 }}" placeholder="HATCH 6" name="Hatch6[{{ $l->id }}]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" value="{{ $l->Hatch7 }}" placeholder="HATCH 7" name="Hatch7[{{ $l->id }}]" />
													<input type="text" style="width: 8%;background-color: burlywood;color: white;font-weight: bold;padding-right: 7px;" class="form-control pull-left text-right m-r-5" name="MaxLoad[{{ $l->id }}]" value="{{ $l->MaxLoad }}" placeholder="จำนวนบรรทุก" readonly />
												</div>
											</div>
												@endforeach
											@endif
											<div class="Item pull-left m-b-15" style="width:100%;border-bottom: 2px solid #aaa;">
												<div class="ItemMain" style="display: inline-block;width:100%">
													<input type="hidden" name="AlongsideLighterID[]" />
													<input type="text" style="width: 4%;border: transparent;" class="form-control pull-left text-center b" placeholder="##" />
													<input type="text" style="width: 14%;" class="form-control pull-left m-r-5" name="LighterID[]" required/>
													<input type="text" style="width: 14%;" class="form-control pull-left text-center m-r-5 " name="Consignee[]" placeholder="{{ $sRow->Alongside }}"/>
													<input type="text" style="width: 8%;" class="form-control pull-left text-center m-r-5" name="KGS[]" placeholder="P'/KGS"/>
													<input type="text" style="width: 8%;padding-right: 7px;font-weight: bold;" class="form-control pull-left text-right m-r-5 Loading" name="TONS[]" placeholder="M/TONS" readonly/>
													<input type="text" style="width: 8%;" class="form-control pull-left text-center m-r-5" name="Marks[]" placeholder="Marks"/>
													<input type="text" style="width: 11%;" class="form-control pull-left text-center m-r-5 datetimepicker" name="Alongside[]" placeholder="Alongside" required/>
													<input type="text" style="width: 11%;" class="form-control pull-left text-center m-r-5 datetimepicker" name="Commenced[]" placeholder="Commenced" required/>
													<input type="text" style="width: 11%;" class="form-control pull-left text-center m-r-5 datetimepicker" name="Completed[]" placeholder="Completed" required/>
													<div class="pull-right m-b-5 AlongsideBtn" style="width:6%;padding-top:5px;"></div>
												</div>
												<div class="ItemList m-b-10" style="display: inline-block;width:100%">
													<input type="text" style="width: 4%;border: transparent;" class="form-control pull-left" />
													<select class="form-control pull-left m-r-5" style="width: 14%;" name="ProductID[]" required>
														@if( $rowItem )
															@foreach($rowItem AS $r)
																<option value="{{ $r->ProductID }}">{{ $r->ProductName }}</option>
															@endforeach
														@endif
													</select>
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 1" name="Hatch1[]"/>
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 2" name="Hatch2[]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 3" name="Hatch3[]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 4" name="Hatch4[]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 5" name="Hatch5[]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 6" name="Hatch6[]" />
													<input type="number" style="width: 8%;background-color: aliceblue;" class="form-control pull-left text-right m-r-5 CalHatch" placeholder="HATCH 7" name="Hatch7[]" />
													<input type="text" style="width: 8%;background-color: burlywood;color: white;font-weight: bold;padding-right: 7px;" class="form-control pull-left text-right m-r-5" name="MaxLoad[]" placeholder="จำนวนบรรทุก" readonly />
												</div>
											</div>
										</div>
									</div>
									
					
									
									
									<div class="col-md-12">
										<div class="form-group m-t-30 m-b-5">
											<div class="col-xs-4 text-left">
												<a href="{{ action('FTS\OperationController@OperationShowBuoy', array($sRow->id)) }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าการปฏิบัติงานเรือใหญ่</a>
											</div>
											<div class="col-xs-4 text-center">
												<button type="submit" class="btn btn-sm btn-primary m-r-5">Save Alongside</button>
												
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
<link href="assets/plugins/datetimepicker/build/jquery.datetimepicker.min.css" rel="stylesheet" />
@endpush


@push('scripts')
<script src="assets/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script>
$(function() {
	var sDelete = [];
	Alongside = function(){
		$( '.Alongside .Item' ).each(function(index, element) {
			$(this).find('.AlongsideBtn a').remove();
			if( index != 0 ){
				$(this).find('.AlongsideBtn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
			}
		});
		$('.Alongside .Item').last().find('.AlongsideBtn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
	}

	$( '.Alongside' ).on( "click", ".AlongsideBtn .btn-success", function() {
		$('.datetimepicker').datetimepicker('destroy');
        $('.Alongside .Item').last().clone().appendTo('.Alongside');
		$('.Alongside .Item').last().find('input').val('');
		Alongside();
		$('.datetimepicker').datetimepicker({format:'d-m-Y H:i'});
	});

	$( '.Alongside' ).on( "click", ".AlongsideBtn .btn-danger", function() {
		if( $(this).parent().parent().find('input:eq(0)').val() != '' ){
			sDelete.push( $(this).parent().parent().find('input:eq(0)').val() );
		}
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().parent().remove();
			Alongside();
			$('#sDelete').val( sDelete.join() );
		}
	});
	Alongside();
	
	$('.datetimepicker').datetimepicker('destroy');
	$('.datetimepicker').datetimepicker({format:'d-m-Y H:i'});
	
	
	

	$( '.Alongside' ).on( "keyup change", ".CalHatch", function() {
		Hatch1 		= isNaN(parseFloat($(this).parent().find('input:eq(1)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(1)').val().replace(/,/g,''));
		Hatch2 		= isNaN(parseFloat($(this).parent().find('input:eq(2)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(2)').val().replace(/,/g,''));
		Hatch3 		= isNaN(parseFloat($(this).parent().find('input:eq(3)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(3)').val().replace(/,/g,''));
		Hatch4 		= isNaN(parseFloat($(this).parent().find('input:eq(4)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(4)').val().replace(/,/g,''));
		Hatch5 		= isNaN(parseFloat($(this).parent().find('input:eq(5)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(5)').val().replace(/,/g,''));
		Hatch6 		= isNaN(parseFloat($(this).parent().find('input:eq(6)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(6)').val().replace(/,/g,''));
		Hatch7 		= isNaN(parseFloat($(this).parent().find('input:eq(7)').val().replace(/,/g,'')))?0:parseFloat($(this).parent().find('input:eq(7)').val().replace(/,/g,''));
		HatchTotal	= Hatch1+Hatch2+Hatch3+Hatch4+Hatch5+Hatch6+Hatch7;
		$(this).parent().prev().find('input:eq(5)').val( frm.AddCommas(HatchTotal) );

		var Loading = 0;
		$( '.Loading' ).each(function(index, element) {
			Loading += isNaN(parseFloat($(this).val().replace(/,/g,'')))?0:parseFloat($(this).val().replace(/,/g,''));
		});
		$('#Loading').val( frm.AddCommas(Loading) );
		
	});
});
</script>
@endpush


@push('css')
<style>
.Alongside input,.Alongside select {
	font-size: 11px;
}
.form-control {
    padding: 6px 4px;
}
</style>
@endpush