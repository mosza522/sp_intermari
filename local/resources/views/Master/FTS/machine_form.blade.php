@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li>Master Data</li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li class="active">เครื่องจักร</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลเครื่องจักร</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">จัดการข้อมูลเครื่องจักร</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="@if(empty($sRow)) {{ action('Master\FTS\MachineController@store') }}@else {{action('Master\FTS\MachineController@update', $sRow->id )}}@endif" method="POST">
								{{ csrf_field() }}
								@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
                                <fieldset>
                                    <legend> @if(empty($sRow)) เพิ่มข้อมูลเครื่องจักร@else แก้ไขข้อเครื่องจักร@endif </legend>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ทุ่น</label>
                                        <div class="col-md-8">
											<select class="form-control" name="DepartmentID" >
											@if( !empty($sRowDepartment) )
												@foreach($sRowDepartment AS $row)
												<option value="{{ $row->id }}" {{ @$sRow->DepartmentID==$row->id?'selected':'' }}>{{ $row->DepartmentName }}</option>
												@endforeach
											@endif
											</select>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ประเภท</label>
                                        <div class="col-md-8">
											<select class="form-control" name="MachineType" >
												<option value="BackHoe" {{ @$sRow->MachineType=='BackHoe'?'selected':'' }}>BackHoe</option>
												<option value="Tractor" {{ @$sRow->MachineType=='Tractor'?'selected':'' }}>Tractor</option>
												<option value="BobCat" {{ @$sRow->MachineType=='BobCat'?'selected':'' }}>BobCat</option>
												<option value="Gennerrator" {{ @$sRow->MachineType=='Gennerrator'?'selected':'' }}>Gennerrator</option>
												<option value="Crane" {{ @$sRow->MachineType=='Crane'?'selected':'' }}>Crane</option>
												<option value="Grab" {{ @$sRow->MachineType=='Grab'?'selected':'' }}>Grab</option>
											</select>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">รหัสเครื่องจักร</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="MachineNunber" placeholder="รหัสเครื่องจักร" value="{{ isset($sRow->MachineNunber)?$sRow->MachineNunber:old('MachineNunber') }}" />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">เครื่องจักร</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="MachineName" placeholder="เครื่องจักร" value="{{ isset($sRow->MachineName)?$sRow->MachineName:old('MachineName') }}" required />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Battery</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="MachineBattery" placeholder="Battery" value="{{ isset($sRow->MachineBattery)?$sRow->MachineBattery:old('MachineBattery') }}"  />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <div class=" col-md-offset-5">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
											<a href="{{ action('Master\FTS\MachineController@index') }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
                                        </div>
                                    </div>
                                </fieldset>
							</form>
							<!-- begin #created-updated -->
							@include('Inc.created-updated')
							<!-- end #created-updated -->
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
