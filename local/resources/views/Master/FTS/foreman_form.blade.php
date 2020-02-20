@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลโฟร์แมน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลโฟร์แมน</h1>
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
                            <h4 class="panel-title">จัดการข้อมูลโฟร์แมน</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="@if(empty($sRow)) {{ action('Master\FTS\ForemanController@store') }}@else {{action('Master\FTS\ForemanController@update', $sRow->id )}}@endif" method="POST">
								{{ csrf_field() }}
								@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
                                <fieldset>
                                    <legend> @if(empty($sRow)) เพิ่มข้อมูลโฟร์แมน@else แก้ไขข้อมูลโฟร์แมน{{$sRow->id}}@endif </legend>
									<!--
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Code</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="ForemanCode" placeholder="ForemanCode" value="{{ isset($sRow->ForemanCode)?$sRow->ForemanCode:old('ForemanCode') }}"/>
                                        </div>
                                    </div>
									-->
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">โฟร์แมน</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="ForemanName" placeholder="โฟร์แมน" value="{{ isset($sRow->ForemanName)?$sRow->ForemanName:old('ForemanName') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ประเภท</label>
                                        <div class="col-md-8">
											<select class="form-control" name="ForemanType" >
												<option value="In House" {{ @$sRow->ForemanType=='In House'?'selected':'' }}>In House</option>
												<option value="Out Source" {{ @$sRow->ForemanType=='Out Source'?'selected':'' }}>Out Source</option>
											</select>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <div class=" col-md-offset-5">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
											<a href="{{ action('Master\FTS\ForemanController@index') }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
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
