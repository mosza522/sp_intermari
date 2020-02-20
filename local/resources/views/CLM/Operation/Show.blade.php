@extends('Layouts.default')
@section('content')
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายขนถ่ายสินค้าท่าเรือ</li>
				<li>ใบแจ้งงาน:  {{ $sRow->work_number }}</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">การปฏิบัติงานเรือใหญ่ (แบคโฮ)</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i>  การปฏิบัติงานเรือใหญ่</h4>
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
								</div>
								
								<div class="col-md-6">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">
											@if( $sRow->job_transport=='Discharge' ) ท่าขึ้นสินค้า @endif
											@if( $sRow->job_transport=='Load' ) ท่าลงสินค้า @endif
											@if( $sRow->job_transport=='Other' ) Other @endif
										</label>
										<div class="col-md-9">
											<input type="text" class="form-control pull-left m-r-5 w225" value="{{ $sRow->HarborName }}" readonly />
											<input type="text" class="form-control text-center pull-left w165" value="{{ empty($sRow->work_date_issue)?'-':date('d-m-Y H:i',strtotime($sRow->work_date_issue)) }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-0">
										<label class="col-md-3 control-label">สินค้า</label>
										<div class="row col-md-9 Product_List">
											@if( !empty($rowItem) )
												@foreach($rowItem AS $row)
											<div class="Product_Item">
												<div class="pull-left m-l-10 m-b-5">
													<input type="text" class="form-control pull-left w225 m-r-5"  value="{{ $row->ProductName }}" readonly />
													<input type="text" class="form-control text-right w110 pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}" readonly />
													<input type="text"  class="form-control text-center w50 pull-left" value="{{ $sRow->job_unit }}" readonly />
												</div>
											</div>
												@endforeach
											@endif
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">น้ำหนักรวม</label>
										<div class="col-md-9 p-r-5">
											<input type="text" class="form-control text-right pull-left m-r-5 w140" value="{{ isset($sRow->job_weight)?number_format($sRow->job_weight,3):'0' }}" readonly />
											<input type="text" class="form-control text-center w80 pull-left" value="{{ $sRow->job_unit }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="3" style="width:93%;" readonly >{{ isset($sRow->work_note)?$sRow->work_note:'' }}</textarea>
										</div>
									</div>
									
								</div>
								<div class="col-md-12">
									<div class="form-group m-b-5 m-t-25">
										<div class="col-xs-4 text-left">
											<a href="{{ action('CLM\OperationController@index') }}" class="btn btn-sm btn-success m-l-10">กลับไปหน้ารายการ การปฏิบัติงานเรือใหญ่</a>
										</div>
									</div>
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


@push('scripts')
<script>
$(function() {
	
}
</script>
@endpush