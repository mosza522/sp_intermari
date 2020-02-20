@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">กลุ่มผู้ใช้งานแต่ละฝ่าย</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">กลุ่มผู้ใช้งานแต่ละฝ่าย</h1>
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
                            <h4 class="panel-title">จัดการกลุ่มผู้ใช้งานแต่ละฝ่าย</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="@if(empty($sRow)) {{ action('Master\PositionController@store') }}@else {{action('Master\PositionController@update', $sRow->id )}}@endif" method="POST">
								{{ csrf_field() }}
								@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
								
                                <fieldset>
                                    <legend>@if(empty($sRow)) เพิ่มกลุ่มผู้ใช้งานแต่ละฝ่าย @else แก้ไขกลุ่มผู้ใช้งานแต่ละฝ่าย #{{$sRow->PositionCode}}@endif</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">รหัสกลุ่ม (3 หลัก)</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="PositionCode" placeholder="PositionCode" value="{{ isset($sRow->PositionCode)?$sRow->PositionCode:old('PositionCode') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">กลุ่ม,ฝ่าย</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="PositionName" placeholder="ฝ่าย" value="{{ isset($sRow->PositionName)?$sRow->PositionName:old('PosiTitle') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">รายละเอียด</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="PositionDesc" placeholder="รายละเอียดของฝ่ายหรือกลุ่มเมนูที่เกี่ยวของ" value="{{ isset($sRow->PositionDesc)?$sRow->PositionDesc:old('PositionDesc') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Save</button>
											<a href="{{ action('Master\PositionController@index') }}" class="btn btn-sm btn-default"> Cancel</a>
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
