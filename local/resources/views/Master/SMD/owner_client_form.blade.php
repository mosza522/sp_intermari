@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลผู้ติดต่อ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลผู้ติดต่อ</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
				
				
					<form  action="@if(empty($sRow)) {{ action('Master\SMD\OwnerClientController@store', array($sOwner->id)) }}@else {{action('Master\SMD\OwnerClientController@update', array($sOwner->id,$sRow->id ))}}@endif" method="POST">
						{{ csrf_field() }}
						@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
						
						<!-- begin panel -->
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								</div>
								<h4 class="panel-title">ข้อมูลผู้ติดต่อของลูกค้า :: {{ $sOwner->OwnerName }}</h4>
							</div>
							<div class="panel-body form-horizontal" >
                                <fieldset>
                                    <legend>รายละเอียด</legend>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">ชื่อผู้ติดต่อ</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientName" placeholder="ชื่อผู้ติดต่อ" value="{{ isset($sRow->ClientName)?$sRow->ClientName:old('ClientName') }}" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">โทรศัพท์</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientTel" placeholder="โทรศัพท์" value="{{ isset($sRow->ClientTel)?$sRow->ClientTel:old('ClientTel') }}" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ที่อยู่เลขที่</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientAddress" placeholder="ที่อยู่เลขที่" value="{{ isset($sRow->ClientAddress)?$sRow->ClientAddress:old('ClientAddress') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">แขวง/ตําบล</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientTambon" placeholder="แขวง/ตําบล" value="{{ isset($sRow->ClientTambon)?$sRow->ClientTambon:old('ClientTambon') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">จังหวัด</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientProvince" placeholder="จังหวัด" value="{{ isset($sRow->ClientProvince)?$sRow->ClientProvince:old('ClientProvince') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">E-Mail</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientMail" placeholder="E-Mail" value="{{ isset($sRow->ClientMail)?$sRow->ClientMail:old('ClientMail') }}" />
											</div>
										</div>
									</div>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">ตำแหน่งของผู้ติดต่อ</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientPosition" placeholder="ตำแหน่งของผู้ติดต่อ" value="{{ isset($sRow->ClientPosition)?$sRow->ClientPosition:old('ClientPosition') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">หน้าที่ความรับผิดชอบ</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientResponsibility" placeholder="หน้าที่ความรับผิดชอบ" value="{{ isset($sRow->ClientResponsibility)?$sRow->ClientResponsibility:old('ClientResponsibility') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ถนน</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientRoad" placeholder="ถนน" value="{{ isset($sRow->ClientRoad)?$sRow->ClientRoad:old('ClientRoad') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">เขต/อําเภอ</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientAmphoe" placeholder="เขต/อําเภอ" value="{{ isset($sRow->ClientAmphoe)?$sRow->ClientAmphoe:old('ClientAmphoe') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">รหัสไปรษณีย์</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="ClientPostCode" placeholder="รหัสไปรษณีย์" value="{{ isset($sRow->ClientPostCode)?$sRow->ClientPostCode:old('ClientPostCode') }}" />
											</div>
										</div>
									</div>
									
									
    
									<div class="col-md-12 m-t-10">
										<div class="form-group">
											<center>
												@if(empty($sShow))
												<button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
												@endif
												<a href="{{ action('Master\SMD\OwnerController@edit', array($sOwner->id)) }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
											</center>
										</div>
									</div>
                                </fieldset>
							</div>
						</div>
						<!-- end panel -->
					
					

					</form>
					
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
@stop
