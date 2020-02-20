@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่าย{{ $sRow->sDivision }}</li>
				<li>ปฏิบัติงาน ({{ $sRow->pageHeader }})</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบแจ้งงาน {{ $sRow->pageHeader }}</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i> ใบแจ้งงาน{{ $sRow->pageHeader }}</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								<div class="col-md-12">
									@include('SWP.Prepare.inc_head_content_'.strtoupper($sRow->work_mode))
								
									<div class="col-md-6  m-t-10">
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label"></label>
											<div class="col-md-9">
												<a href="{{ action($sRow->sPath.'\PrepareController@index') }}" class="btn btn-sm btn-success">กลับไปหน้าใบงาน{{ $sRow->sDivision }}</a>
											</div>
										</div>
									</div>
								</div>
								@if( empty($sRow->deleted_at) )
									
								
								<div class="col-md-12 m-t-20">
									<div class="form-group m-b-5 m-t-25">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-center">
										</div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\PlanController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">แผนการขนถ่ายสินค้า</a>
										</div>
									</div>
									
									@if( $sRow->work_status_swp != 0 )
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\ExportController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">รายงานประจำวันการส่งออกสินค้า</a>
										</div>
									</div>
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\ImportController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">รายงานประจำวันการนำเข้าสินค้า</a>
										</div>
									</div>
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\ExportWarehouseController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">รายงานประจำวันขนส่งสินค้าออกจากโกดัง</a>
										</div>
									</div>
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\ForemanController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">รายงานการปฏิบัติงานหน้าท่า (Foreman)</a>
										</div>
									</div>
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\EventController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">แจ้งเหตุการณ์หน้าท่า</a>
										</div>
									</div>
									
									<div class="form-group m-b-5 m-t-5">
										<div class="col-xs-4 text-left"></div>
										<div class="col-xs-4 text-right"></div>
										<div class="col-xs-4 text-right">
											<a href="{{ action('SWP\Operation\FuelController@index', $sRow->id) }}" class="btn btn-sm btn-success w250">รายการเบิกน้ำมัน</a>
										</div>
									</div>
									@endif
									
								</div>
								
								
								
								@endif
							</fieldset>
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
$(function() {
	
}
</script>
@endpush