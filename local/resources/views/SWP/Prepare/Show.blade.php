@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่าย{{ $sRow->sDivision }}</li>
				<li>เตรียมความพร้อม ({{ $sRow->pageHeader }})</li>
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
							<h4 class="panel-title"><i class="fa fa-rebel"></i> ใบแจ้งงาน{{ $sRow->pageHeader }}  {!! empty($sRow->work_ref)?'':' <span class="text-success">(คัดลองข้อมูลมาจากใบแจ้งงาน '.$sRow->work_ref.' )<span>' !!}</h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								@include('SWP.Prepare.inc_head_content_'.strtoupper($sRow->work_mode))
								
								@if( empty($sRow->deleted_at) )
								<div class="col-md-12">
									<div class="form-group m-b-5 m-t-25">
										<div class="col-xs-4 text-left">
											<a href="{{ action($sRow->sPath.'\PrepareController@index') }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบงาน{{ $sRow->sDivision }}</a>
										</div>
										
										@if( substr_count($sRow->work_ref, 'SWP') > 0 )
										<div class="col-xs-8 f-w-600 m-t-5">
											ใบแจ้งงานนี้คัดลองข้อมูลมาจากใบแจ้งท่าสิน {{$sRow->work_ref}} ให้เตรียมความพร้อมจากใบงานที่ระบุไว้
										</div>
										@else
										<div class="col-xs-4 text-center">
										</div>
										<div class="col-xs-4 text-right">
											<div class="btn-group dropup m-r-5 m-b-5">
												<a href="javascript:;" class="btn btn-success">เตรียมความพร้อม</a>
												<a href="javascript:;" data-toggle="dropdown" class="btn btn-success dropdown-toggle">
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu pull-right" style="background-color: burlywood;">
												
												</ul>
												<ul class="dropdown-menu pull-right" style="background-color: burlywood;">
													@if( $sRow->work_mode != 'TRU' )
													<li><a href="{{ action($sRow->sPath.'\PrepareSweepController@index', $sRow->id) }}" >สายกวาด</a></li>
													@endif
													<li><a href="{{ action($sRow->sPath.'\PrepareForemanController@index', $sRow->id) }}">โฟร์แมน</a></li>
													<li><a href="{{ action($sRow->sPath.'\PrepareMachineController@index',  $sRow->id) }}">เครื่องจักรและอุปกรณ์</a></li>
													<li><a href="{{ action($sRow->sPath.'\PrepareStaffController@index', $sRow->id) }}">พนักงาน</a></li>
												</ul>
											</div>
										</div>
										@endif
										
									</div>
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