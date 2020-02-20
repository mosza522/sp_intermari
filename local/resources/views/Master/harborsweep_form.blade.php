@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลสายกวาดหน้าท่า</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลสายกวาดหน้าท่า</h1>
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
                            <h4 class="panel-title">จัดการข้อมูลสายกวาดหน้าท่า</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="@if(empty($sRow)) {{ action('Master\SMD\HarborSweepController@store') }}@else {{action('Master\SMD\HarborSweepController@update', $sRow->id )}}@endif" method="POST">
								{{ csrf_field() }}
								@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
                                <fieldset>
                                    <legend> @if(empty($sRow)) เพิ่มข้อมูลสายกวาดหน้าท่า @else แก้ไขข้อมูลสายกวาดหน้าท่า{{$sRow->id}}@endif </legend>
									<!--
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Code</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="HarborSweepCode" placeholder="HarborSweepCode" value="{{ isset($sRow->HarborSweepCode)?$sRow->HarborSweepCode:old('HarborSweepCode') }}"/>
                                        </div>
                                    </div>
									-->
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ข้อมูลสายกวาดหน้าท่า</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="HarborSweepName" placeholder="ข้อมูลสายกวาดหน้าท่า" value="{{ isset($sRow->HarborSweepName)?$sRow->HarborSweepName:old('HarborSweepName') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <div class=" col-md-offset-5">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
											<a href="{{ action('Master\SMD\HarborSweepController@index') }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
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
