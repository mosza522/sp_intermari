@extends('Layouts.default')
@section('content')
	@php
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay/$strMonthThai/$strYear";
		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";

	}
	$stock = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
	->leftJoin('ck_Staff', 'ck_Staff.id', '=', 'ck_Master_Fuel_Stock.staff_id')
	->leftJoin('ck_Master_Smd_Boat', 'ck_Master_Smd_Boat.id', '=', 'ck_Master_Fuel_Stock.boat_id')
	->leftJoin('ck_Master_Machine', 'ck_Master_Machine.id', '=', 'ck_Master_Fuel_Stock.machine_id')
	->select('objective','ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type',
	'ck_Master_Fuel.balance','StaffPrefix','StaffFirstName','StaffLastName','BoatName','ck_Master_Fuel_Stock.created_at',
	'ck_Master_Fuel_Stock.created_by','ck_Master_Machine.MachineName','ck_Master_Machine.MachineType','work_no'
	,'tell','payment_type','price_liter','amount_price','customer','ck_Master_Fuel_Stock.balance_after')
	->get();
	@endphp

		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ประวัติอนุมัติน้ำมัน
				if</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ประวัติอนุมัติน้ำมัน </h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">ประวัติอนุมัติน้ำมัน</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
            {{-- <form action="{{url('fuel/index')}}" method="post" onsubmit="return check_before();"> --}}
							{{-- {{ csrf_field() }} --}}
							<div class="panel-body form-horizontal">
								<div class="col-md-2 text-left" >
									<div class="pull-left"><input class="form-control text-center myLike" name="code" type="text" placeholder="เลขที่ใบงาน" style="width:100%">
									</div>
								</div>
								<div class="col-md-2 text-left" >
									<div class="pull-left">
										<select class="form-control  text-center myWhere" name="ck_Master_Fuel_Stock.type" style="width:100%">
											<option value="">ประเภท</option>
											<option value="รับน้ำมันเข้าสต๊อก">รับน้ำมันเข้าสต๊อก</option>
											<option value="จ่ายน้ำมันในบริษัท">จ่ายน้ำมันในบริษัท</option>
											<option value="จ่ายน้ำมันในงาน">จ่ายน้ำมันในงาน</option>
											<option value="จ่ายน้ำมันเรือยนต์">จ่ายน้ำมันเรือยนต์</option>
											<option value="ขายน้ำมัน">ขายน้ำมัน</option>

										</select>
									</div>
								</div>
								<div class="pull-left col-md-8 m-t-5">
									{{-- <label><input type="checkbox" id="onlyTrashed" value="1" > <span style="position: absolute;margin-top: -20px;margin-left: 17px;color: red;">แสดงรายการที่ลบ</span></label> --}}
								</div>
								{{-- <div class="col-md-2 text-right" >
									<div class="btn-group">
					       <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
					       จัดการสต๊อกน้ำมัน <span class="caret"></span></button>
					       <ul class="dropdown-menu" role="menu">
					         <li><a href="{{ url('fuel/stock/receive') }}">รับน้ำมัน</a></li>
					         <li><a href="{{ url('fuel/stock/forwork') }}">จ่ายน้ำมันในงาน</a></li>
									 <li><a href="{{ url('fuel/stock/forcompany') }}">จ่ายน้ำมันในบริษัท</a></li>
									 <li><a href="{{ url('fuel/stock/forboat') }}">จ่ายน้ำมันเรือยนต์</a></li>
									 <li><a href="{{ url('fuel/stock/sell') }}">ขายน้ำมัน</a></li>
					       </ul>
					     </div>
			 				 </div> --}}
								<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
								@foreach ($stock as $element)
									@php

										$Staff = App\Models\Staff\Staff::where('id','=',$element->created_by)->first();

									@endphp
									@if ($element->type=='แก้ไขน้ำมัน(เพิ่ม)')
										<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
												<div class="modal-dialog" role="document"style="width:80%;">
													<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h3 class="text-center">รายละเอียด</h3>
															</div>
																	<div class="modal-body" >

																			<div class="form-group">
																			<div class="col-md-5 master">
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																			<div class="col-md-6 col-sm-8" >
																				<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																				</div>
																				<div class="form-group"></div>
																				<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																					<div class="col-md-6 col-sm-8" >
																						<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																						</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																								<div class="col-md-6 col-sm-8" >
																								<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																								</div>


																		</div>

																		<div class="col-md-5 master">
																			<div class="tablet">
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เพิ่ม</label></div>
																					<div class="col-md-6 col-sm-8" >
																					<div class="input-group">
																				<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																				<span class="input-group-addon">ลิตร</span>
																							</div>
																				</div>
																				</div>
																				<div class="form-group"></div>
																				<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																						<div class="col-md-6 col-sm-8" >
																						<div class="input-group">
																					<input class="form-control" type="text" name="balance" value="{{$element->balance}}" id="balance" onkeypress="" readonly>
																					<span class="input-group-addon">ลิตร</span>
																								</div>
																					</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																		</div>
																		</div>

																	</div>
															</div>

															<div class="modal-footer"  >
																	<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
															</div>

												</div>
										</div>
									</div>
								@elseif($element->type=='แก้ไขน้ำมัน(ลด)')
									<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
											<div class="modal-dialog" role="document"style="width:80%;">
												<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h3 class="text-center">รายละเอียด</h3>
														</div>
																<div class="modal-body" >
																	<div class="form-group">
																	<div class="col-md-5 master">
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																							</div>


																	</div>

																	<div class="col-md-5 master">
																		<div class="tablet">
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนทีลด</label></div>
																				<div class="col-md-6 col-sm-8" >
																				<div class="input-group">
																			<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																			<span class="input-group-addon">ลิตร</span>
																						</div>
																			</div>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																					<div class="col-md-6 col-sm-8" >
																					<div class="input-group">
																				<input class="form-control" type="text" name="balance" value="{{$element->balance}}" id="balance" onkeypress="" readonly>
																				<span class="input-group-addon">ลิตร</span>
																							</div>
																				</div>
																		<div class="form-group"></div>
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																	<div class="col-md-6 col-sm-8" >
																		<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																	</div>
																					</div>

														</div>
</div>
														<div class="modal-footer"  >
																<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
														</div>

											</div>
									</div>
								</div>
								@elseif($element->type=='รับน้ำมัน')
									<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
											<div class="modal-dialog" role="document"style="width:80%;">
												<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h3 class="text-center">รายละเอียด</h3>
														</div>
																<div class="modal-body" >
																	<div class="form-group">
																	<div class="col-md-5 master">
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																							</div>


																	</div>

																	<div class="col-md-5 master">
																		<div class="tablet">
																		<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="No_report" value="{{$element->code}}" readonly>
																			</div>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">จำนวนที่รับ</label></div>
																					<div class="col-md-8 col-sm-8" >
																					<div class="input-group">
																				<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																				<span class="input-group-addon">ลิตร</span>
																							</div>
																				</div>
																				<div class="form-group"></div>
																				<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																						<div class="col-md-8 col-sm-8" >
																						<div class="input-group">
																					<input class="form-control" type="text" name="balance" value="{{$element->balance_after}}" id="balance" onkeypress="" readonly>
																					<span class="input-group-addon">ลิตร</span>
																								</div>
																					</div>
																			<div class="form-group"></div>
																			<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																		</div>
																					</div>

														</div>
</div>
														<div class="modal-footer"  >
																<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
														</div>

											</div>
									</div>
								</div>
								@elseif($element->type=='จ่ายน้ำมันในงาน')
									<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
											<div class="modal-dialog" role="document"style="width:80%;">
												<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h3 class="text-center">รายละเอียด</h3>
														</div>
																<div class="modal-body" >
																	<div class="form-group">
																	<div class="col-md-5 master">
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																							</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เบิก</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<div class="input-group">
																						<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																						<span class="input-group-addon">ลิตร</span>
																									</div>
																						</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																								<div class="col-md-6 col-sm-8" >
																								<div class="input-group">
																							<input class="form-control" type="text" name="balance" value="{{$element->balance_after}}" id="balance" onkeypress="" readonly>
																							<span class="input-group-addon">ลิตร</span>
																										</div>
																							</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้เบิก</label></div>
																					<div class="col-md-6 col-sm-8" >
																						<input class="form-control" type="text" name="date" value="{{$element->StaffPrefix}} {{$element->StaffFirstName}} {{$element->StaffLastName}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																				</div>

																	</div>

																	<div class="col-md-5 master">
																		<div class="tablet">
																		<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="No_report" value="{{$element->code}}" readonly>
																			</div>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ใบงาน</label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="No_report" value="{{$element->work_no}}" readonly>
																		</div>
																		<div class="form-group"></div>
																		<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อเครื่องจักร</label></div>
																	<div class="col-md-8 col-sm-8" >
																		<input class="form-control" type="text" name="date" value="{{$element->MachineType}} - {{$element->MachineName}}" readonly>

																	</div>
																		<div class="form-group"></div>
																					<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">วัตถุประสงค์</label></div>
																							<div class="col-md-8 col-sm-8" >
																								<textarea class="form-control"  name="object" rows="8" readonly>{{$element->objective}}</textarea>
																							</div>
																					</div>

														</div>
</div>
														<div class="modal-footer"  >
																<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
														</div>

											</div>
									</div>
								</div>
							@elseif($element->type=='จ่ายน้ำมันในบริษัท')
								<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
										<div class="modal-dialog" role="document"style="width:80%;">
											<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h3 class="text-center">รายละเอียด</h3>
													</div>
															<div class="modal-body" >
																<div class="form-group">
																<div class="col-md-5 master">
																	<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																	<div class="col-md-6 col-sm-8" >
																		<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																		</div>
																		<div class="form-group"></div>
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																			<div class="col-md-6 col-sm-8" >
																				<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																				</div>
																				<div class="form-group"></div>
																				<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																						<div class="col-md-6 col-sm-8" >
																						<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																						</div>
																				<div class="form-group"></div>
																				<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เบิก</label></div>
																						<div class="col-md-6 col-sm-8" >
																						<div class="input-group">
																					<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																					<span class="input-group-addon">ลิตร</span>
																								</div>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<div class="input-group">
																						<input class="form-control" type="text" name="balance" value="{{$element->balance_after}}" id="balance" onkeypress="" readonly>
																						<span class="input-group-addon">ลิตร</span>
																									</div>
																						</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้เบิก</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$element->StaffPrefix}} {{$element->StaffFirstName}} {{$element->StaffLastName}}" readonly>
																				</div>
																				<div class="form-group"></div>
																				<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																			<div class="col-md-6 col-sm-8" >
																				<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																			</div>

																</div>

																<div class="col-md-5 master">
																	<div class="tablet">
																	<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
																	<div class="col-md-8 col-sm-8" >
																		<input class="form-control" type="text" name="No_report" value="{{$element->code}}" readonly>
																		</div>
																		</div>
																		<div class="form-group"></div>
																		<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อเครื่องจักร</label></div>
																	<div class="col-md-8 col-sm-8" >
																		<input class="form-control" type="text" name="date" value="{{$element->MachineType}} - {{$element->MachineName}}" readonly>

																	</div>
																	<div class="form-group"></div>
																				<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">วัตถุประสงค์</label></div>
																						<div class="col-md-8 col-sm-8" >
																							<textarea class="form-control"  name="object" rows="8" readonly>{{$element->objective}}</textarea>
																						</div>
																				</div>

													</div>
</div>
													<div class="modal-footer"  >
															<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
													</div>

										</div>
								</div>
							</div>
								@elseif($element->type=='จ่ายน้ำมันเรือยนต์')
									<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
											<div class="modal-dialog" role="document"style="width:80%;">
												<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h3 class="text-center">รายละเอียด</h3>
														</div>
																<div class="modal-body" >
																	<div class="form-group">
																	<div class="col-md-5 master">
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																							</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เบิก</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<div class="input-group">
																						<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																						<span class="input-group-addon">ลิตร</span>
																									</div>
																						</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																								<div class="col-md-6 col-sm-8" >
																								<div class="input-group">
																							<input class="form-control" type="text" name="balance" value="{{$element->balance_after}}" id="balance" onkeypress="" readonly>
																							<span class="input-group-addon">ลิตร</span>
																										</div>
																							</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้เบิก</label></div>
																					<div class="col-md-6 col-sm-8" >
																						<input class="form-control" type="text" name="date" value="{{$element->StaffPrefix}} {{$element->StaffFirstName}} {{$element->StaffLastName}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																				</div>

																	</div>

																	<div class="col-md-5 master">
																		<div class="tablet">
																		<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="No_report" value="{{$element->code}}" readonly>
																			</div>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อเรือ</label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{$element->BoatName}}" readonly>

																		</div>
																		<div class="form-group"></div>
																					<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">วัตถุประสงค์</label></div>
																							<div class="col-md-8 col-sm-8" >
																								<textarea class="form-control"  name="object" rows="8" readonly>{{$element->objective}}</textarea>
																							</div>
																					</div>

														</div>
</div>
														<div class="modal-footer"  >
																<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
														</div>

											</div>
									</div>
								</div>
								@elseif($element->type=='ขายน้ำมัน')
									<div class="modal fade" id="myModal{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
											<div class="modal-dialog" role="document"style="width:80%;">
												<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h3 class="text-center">รายละเอียด</h3>
														</div>
																<div class="modal-body">
																	<div class="form-group">
																	<div class="col-md-5 master">
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<input class="form-control" type="text" name="date" value="{{DateThai($element->created_at)}}" readonly>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ประเภท</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$element->type}}" readonly>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<input class="form-control" type="text" name="" value="{{$element->name}}" id="" onkeypress="" readonly	>
																							</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่ขาย</label></div>
																							<div class="col-md-6 col-sm-8" >
																							<div class="input-group">
																						<input class="form-control" type="text" name="amount" value="{{$element->amount}}" id="amount" onkeypress="" readonly>
																						<span class="input-group-addon">ลิตร</span>
																									</div>
																						</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันคงเหลือ</label></div>
																								<div class="col-md-6 col-sm-8" >
																								<div class="input-group">
																							<input class="form-control" type="text" name="balance" value="{{$element->balance_after}}" id="balance" onkeypress="" readonly>
																							<span class="input-group-addon">ลิตร</span>
																										</div>
																							</div>
																						<div class="form-group"></div>
																						<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ราคาต่อลิตร</label></div>
																						<div class="col-md-6 col-sm-8" >
																						<div class="input-group">
																					<input class="form-control" type="text" name="amount" value="{{$element->price_liter}}" id="amount" onkeypress="" readonly>
																					<span class="input-group-addon">บาท</span>
																								</div>
																					</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">รวมเป็นเงิน</label></div>
																					<div class="col-md-6 col-sm-8" >
																					<div class="input-group">
																				<input class="form-control" type="text" name="amount" value="{{$element->amount_price}}" id="amount" onkeypress="" readonly>
																				<span class="input-group-addon">บาท</span>
																							</div>
																				</div>
																					<div class="form-group"></div>
																					<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ชื่อผู้บันทึก</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<input class="form-control" type="text" name="date" value="{{$Staff->StaffPrefix}} {{$Staff->StaffFirstName}} {{$Staff->StaffLastName}}" readonly>
																				</div>
{{--  --}}
																	</div>

																	<div class="col-md-5 master">
																		<div class="tablet">
																		<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
																		<div class="col-md-8 col-sm-8" >
																			<input class="form-control" type="text" name="No_report" value="{{$element->code}}" readonly>
																			</div>
																			</div>
																			<div class="form-group"></div>
																			<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อลูกค้า</label></div>
																			<div class="col-md-8 col-sm-8" >
																				<input class="form-control" type="text" name="date" value="{{$element->customer}}" readonly>

																			</div>
																		<div class="form-group"></div>
																					<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เบอร์โทร</label></div>
																							<div class="col-md-8 col-sm-8" >
																								{{-- <textarea class="form-control"  name="object" rows="8" readonly>{{$element->tell}}</textarea> --}}
																								<input class="form-control" type="text" name="date" value="{{$element->tell}}" readonly>
																							</div>
																		<div class="form-group"></div>
																					<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">การชำระเงิน</label></div>
																							<div class="col-md-8 col-sm-8" >
																								<input class="form-control" type="text" name="date" value="{{$element->payment_type}}" readonly>
																								{{-- <textarea class="form-control"  name="object" rows="8" readonly>{{$element->payment_type}}</textarea> --}}
																							</div>
																					</div>
																					</div>
																				</div>
														<div class="modal-footer"  >
																<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
														</div>

											</div>
									</div>
								</div>
								@endif
								@endforeach

						{{-- </form> --}}


			 <div class="panel-body form-horizontal">

						</div>
</div>

				</div>
			</div>


		</div>

@stop
@push('css')
<style media="screen">
	@media (max-width: 1023px) {
		.tablet{
			margin-top: 6rem;
		}
	}
</style>
@endpush
@push('scripts')
	<script type="text/javascript">
		function check_number(salary) {
		var vchar = String.fromCharCode(event.keyCode);
		if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
		salary.onKeyPress=vchar;

		}
	</script>
	<script>
	$(function() {
		modal=''
			oTable = $('#data-table').DataTable({
			"sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
					order: [[ 5, "asc" ]],
	        processing: true,
	        serverSide: true,
	        scroller: true,
			scrollCollapse: true,
	        scrollX: true,
	        stateSave: true,
			//scrollY: ''+($(window).height()-370)+'px',
			iDisplayLength: 10,
	        ajax: {
				url: '{{ action("Fuel\FuelApproveController@postDatatable") }}',
				data: function ( d ) {
					d.Where={};
					$('#btn-Excel').css("display", "none");
					if( $('#Search').val() == '' )	$('#btn-Excel').css("display", "initial");
					$('.myWhere').each(function() {
						if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
							d.Where[$(this).attr('name')] = $.trim($(this).val());
							if( $('#Search').val() == '' )	$('#btn-Excel').css("display", "initial");
						}
					});
					d.Like={};
					$('.myLike').each(function() {
						if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
							d.Like[$(this).attr('name')] = $.trim($(this).val());
						}
					});
					d.onlyTrashed=$('#onlyTrashed').is(':checked');
					oData = d;
				},
	            method: 'POST'
	        },
	        columns: [
	            {data: 'code', title :'เลขที่', className: 'text-center w90', defaultContent: '-',},
	            {data: 'typeStock', title :'ประเภท' ,className:'w200', defaultContent: '-'},
	            {data: 'name', title :'ถังน้ำมัน', className:'w100', defaultContent: '-',},
							{data: 'amount', title :'จำนวน', className:'w100', defaultContent: '-',},
							{data: 'approve_status', title :'สถานะการอนุมัติ', className:'w100', defaultContent: '-',},
							{data: 'updated_at', title :'วันที่อนุมัติ', className:'w150', defaultContent: '-',},
							{data: 'id', title :'แก้ไข', className: 'text-center action w200',},


	        ],
			rowCallback: function(nRow, aData, dataIndex){
				if( aData['deleted_at'] ){
					$('td', nRow).css('background-color', 'khaki');
				}
				$('td:last-child', nRow).html(''
				+ '<a href="" data-toggle="modal" data-target="#myModal'+aData['id']+'" class="btn btn-xs btn-primary" style="margin:0px;"> รายละเอียด</a> '
				+ '<a href="{{ action("Fuel\FuelstockController@indexApprove") }}/'+aData['id']+'/del" class="btn btn-xs btn-danger" style="margin:0px;" onclick="return confirm(\'are you sure ?\');"><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
				);

				@if (session('RecordID'))
					if( aData['id'] == '{{session('RecordID')}}' )	$('td', nRow).effect("highlight", {}, 4000);
				@endif

			}
	    });
		$('.myWhere,.myLike,.myType,#onlyTrashed').on('change', function(e){
			oTable.draw();
		});
		// $('#onlyTrashed').on('change', function(e){
		// 	oTable.draw();
		// });
	});
	</script>
@endpush
