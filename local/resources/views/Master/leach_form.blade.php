@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลโกรก</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลโกรก</h1>
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
                            <h4 class="panel-title">จัดการข้อมูลโกรก</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="@if(empty($sRow)) {{ action('Master\LeachController@store') }}@else {{action('Master\LeachController@update', $sRow->id )}}@endif" method="POST">
								{{ csrf_field() }}
								@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
                                <fieldset>
                                    <legend> @if(empty($sRow)) เพิ่มข้อมูลโกรก @else แก้ไขข้อมูลโกรก{{$sRow->id}}@endif </legend>
									<!--
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Code</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="LeachCode" placeholder="LeachCode" value="{{ isset($sRow->LeachCode)?$sRow->LeachCode:old('LeachCode') }}"/>
                                        </div>
                                    </div>
									-->
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ข้อมูลโกรก</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="LeachName" placeholder="ข้อมูลโกรก" value="{{ isset($sRow->LeachName)?$sRow->LeachName:old('LeachName') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <div class=" col-md-offset-5">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
											<a href="{{ action('Master\LeachController@index') }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
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
