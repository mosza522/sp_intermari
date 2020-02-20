@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลทุ่น</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลทุ่น</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">จัดการข้อมูลทุ่น</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="@if(empty($sRow)) {{ action('Master\FTS\BuoyController@store') }}@else {{action('Master\FTS\BuoyController@update', $sRow->id )}}@endif" method="POST">
								{{ csrf_field() }}
								@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
                                <fieldset>
                                    <legend> @if(empty($sRow)) เพิ่มข้อมูลทุ่น@else แก้ไขข้อมูลทุ่น{{$sRow->id}}@endif </legend>
									<!--
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Code</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="BuoyCode" placeholder="BuoyCode" value="{{ isset($sRow->BuoyCode)?$sRow->BuoyCode:old('BuoyCode') }}"/>
                                        </div>
                                    </div>
									-->
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">ทุ่น</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="BuoyName" placeholder="ทุ่น" value="{{ isset($sRow->BuoyName)?$sRow->BuoyName:old('BuoyName') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนหัวหน้าทุ่น ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_1" placeholder="จำนวนหัวหน้าทุ่น" value="{{ isset($sRow->Staff_1)?$sRow->Staff_1:old('Staff_1') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนรองหัวหน้าทุ่น ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_2" placeholder="จำนวนรองหัวหน้าทุ่น" value="{{ isset($sRow->Staff_2)?$sRow->Staff_2:old('Staff_2') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนจนท. ขับเครน ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_3" placeholder="จำนวนจนท. ขับเครน" value="{{ isset($sRow->Staff_3)?$sRow->Staff_3:old('Staff_3') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนพนักงานควบคุมเครื่องจักรกลหนัก ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_4" placeholder="จำนวนพนักงานควบคุมเครื่องจักรกลหนัก" value="{{ isset($sRow->Staff_4)?$sRow->Staff_4:old('Staff_4') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนพนักงานปากเรือ ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_5" placeholder="จำนวนพนักงานปากเรือ" value="{{ isset($sRow->Staff_5)?$sRow->Staff_5:old('Staff_5') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนพนง.บำรุงรักษาเครื่องจักรกลหนัก ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_6" placeholder="จำนวนพนง.บำรุงรักษาเครื่องจักรกลหนัก" value="{{ isset($sRow->Staff_6)?$sRow->Staff_6:old('Staff_6') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนพนักงานช่างไฟฟ้า ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_7" placeholder="จำนวนพนักงานช่างไฟฟ้า" value="{{ isset($sRow->Staff_7)?$sRow->Staff_7:old('Staff_7') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนพนักงาช่างเครื่อง ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_8" placeholder="จำนวนพนักงาช่างเครื่อง" value="{{ isset($sRow->Staff_8)?$sRow->Staff_8:old('Staff_8') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group m-b-5">
                                        <label class="col-md-4 control-label">จำนวนพนักงานช่างเชื่อม ในปฏิบัติงานเรือใหญ่</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Staff_9" placeholder="จำนวนพนักงานช่างเชื่อม" value="{{ isset($sRow->Staff_9)?$sRow->Staff_9:old('Staff_9') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <div class=" col-md-offset-5">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
											<a href="{{ action('Master\FTS\BuoyController@index') }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
                                        </div>
                                    </div>
                                </fieldset>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
@stop

@push('scripts')
<script>
$(function() {
	
});
</script>
@endpush
