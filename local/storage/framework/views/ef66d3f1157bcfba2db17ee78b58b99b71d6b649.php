<?php $__env->startSection('content'); ?>
	<?php
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
	?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">รายงานการตรวจเช็คสภาพเครื่องจักรกล</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">รายงานการตรวจเช็คสภาพเครื่องจักรกล </h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">รายงานการตรวจเช็คสภาพเครื่องจักรกล</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<form action="<?php echo e(url('machine/MachineCondition')); ?>" method="post" onsubmit="return check_before();">
							<div class="panel-body form-horizontal">
							<div class="form-group">
						<div class=" col-md-2 col-sm-2 col-xs-4 text-right check" ><label class="control-label">วันที่</label></div>
						<div class="col-md-2 col-sm-4 col-xs-8" >
							<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" required>
							</div>

							<div class=" col-md-2 col-sm-2 col-xs-4 text-right check" ><label class="control-label">ชื่อผู้ตรวจสอบ</label></div>
							<div class="col-md-2 col-sm-4 col-xs-8" >
								<input class="form-control" type="text" name="create_by" value="ทดสอบ ผู้ตรวจสอบ" readonly>
								</div>
								<div class="tablet">
									<div class=" col-md-2 col-sm-2 col-xs-4 text-right check " ><label class="control-label">เลขที่</label></div>
									<div class="col-md-2 col-sm-4 col-xs-8" >
										<input class="form-control" type="text" name="No_report" value="abc123" readonly>
										</div>
								</div>

									
										

  <!-- Modal -->
  
										
										<div class="desktop">
											<div class=" col-md-2 col-sm-2 col-xs-4 text-right check" ><label class="control-label">ชื่อเครื่องจักร</label></div>
											<div class="col-md-2 col-sm-4 col-xs-8" >
												<select class="form-control" name="machine" id="machine" style="width:100%;" >
													<option value=""></option>
													<option value="CRANE 1">CRANE 1</option>
													<option value="CRANE 2">CRANE 2</option>
													<option value="CRANE 3">CRANE 3</option>
												</select>
											</div>
											</div>
											<div class="desktop technician">
												<div class="col-md-2 col-sm-2 col-xs-4 text-right" >
												<label class="control-label check">มิเตอร์ชั่วโมง</label>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-8" >
												<input class="form-control" type="text" name="hour" id="mitor" value="" onkeypress="return check_number(this);">
												</div>
												<div class=" col-md-2 col-sm-2 col-xs-4 check text-right control-label" ><label>ช่างผู้ตรวจสอบ</label></div>
											<div class="col-md-2 col-sm-4 col-xs-8" >
												<select class="form-control" name="technician" id="technician" style="width:100%" required >
													<option value=""></option>
													<option value="นาย ทดสอบ 1">นาย ทดสอบ 1</option>
													<option value="นาย ทดสอบ 2">นาย ทดสอบ 2</option>
													<option value="นาย ทดสอบ 3">นาย ทดสอบ 3</option>
												</select>
											</div>
											</div>
											<div class="status status-tab">
												<div class=" col-md-2 col-sm-2 col-xs-4 text-right check" ><label class="control-label">สถานะเครื่องจักร</label></div>
													<div class="col-md-2 col-sm-4 col-xs-8" >
												<select class="form-control" name="status" id="status" style="width:100%" required >
													<option value="ปกติ">ปกติ</option>
													<option value="ชำรุด">ชำรุด</option>
												</select>
												</div>
											</div>
												
													

				<!-- Modal -->
				
				

													</div>
</div>


			<div class="panel-body form-horizontal">
				<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
				<div class="form-group">
				<div class="col-md-12 text-center check">

					<label class="control-label">การตรวจเช็ค</label>

						<input type="checkbox" id="check_1" name="check" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
						<input type="checkbox" id="check_2" name="check" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>

					</div>
				</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-md-12"><h4><u>ระบบเครื่องยนต์</u></h4></label>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6">ระดับน้ำมันเครื่อง</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" name="oil" id="oli_1" value="ปกติ" required><label for="oli_1">ปกติ</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" name="oil" id="oli_2" value="ขาด"><label for="oli_2">ขาด</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">น้ำมันเครื่องรั่วซึม</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" name="oil_leak" id="leak-1" value="มี" required><label for="leak-1">มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" name="oil_leak" id="leak-2" value="ไม่มี"><label for="leak-2">ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพกรองอากาศ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" name="filter" id="filter-1" value="ดี" required><label for="filter-1">ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" name="filter" id="filter-2" value="ไม่ดี"><label for="filter-2">ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพท่ออากาศ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="pipe-1" name="pipe" value="ดี" required><label for="pipe-1">ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="pipe-2" name="pipe" value="ไม่ดี"> <label for="pipe-2">ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">ควายยากง่ายในการสตาร์ท</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="start-1" name="start" value="ง่าย" required> <label for="start-1">ง่าย</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="start-2" name="start" value="ยาก"> <label for="start-2">ยาก</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">เสียงผิดปกติของเครื่องยนต์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="noise-1" name="noise" value="มี" required> <label for="noise-1">มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="noise-2" name="noise" value="ไม่มี"> <label for="noise-2">ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6">สีควันไอเสีย</label>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<select class="form-control" name="smoke" id="machine" required>
										<option value="ขาว">ขาว</option>
										<option value="เทา">เทา</option>
										<option value="ดำ">ดำ</option>
									</select>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">หม้อพักไอเสีย</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="exhaust-1" name="exhaust" value="ดี" required><label for="exhaust-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="exhaust-2" name="exhaust" value="ไม่ดี" required><label for="exhaust-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-12"><h4> <u>ระบบระบายความร้อน</u></h4></label>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำในหม้อน้ำและหม้อพัก</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="water_level-1" name="water_level" value="ปกติ" required><label for="water_level-1"> ปกติ</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="water_level-2" name="water_level" value="ขาด"><label for="water_level-2"> ขาด</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">น้ำยาหล่อเย็น</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="cooling-1" name="cooling" value="มี" required><label for="cooling-1"> มี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="cooling-2" name="cooling" value="ไม่มี"><label for="cooling-2"> ไม่มี</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพท่อยางหม้อน้ำ</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="boiler_pipe-1" name="boiler_pipe" value="ดี" required><label for="boiler_pipe-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="boiler_pipe-2" name="boiler_pipe" value="ไม่ดี"><label for="boiler_pipe-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพฝาปิดหม้อน้ำ</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="boiler_lid-1" name="boiler_lid" value="ดี" required><label for="boiler_lid-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="boiler_lid-2" name="boiler_lid" value="ไม่ดี"> <label for="boiler_lid-2">ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพหม้อน้ำ</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="boiler_condition-1" name="boiler_condition" value="ดี" required> <label for="boiler_condition-1">ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="boiler_condition-2" name="boiler_condition" value="ไม่ดี"><label for="boiler_condition-2"> ไม่ดี</label>
									</div>
									</div>
							</div>

						<div class="col-md-4">
							<div class="form-group">
							<label class="col-md-12"><h4><u>ระบบไฮดรอลิกส์</u></h4></label>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันไฮดรอลิกส์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_level-1" name="hydro_level" value="ปกติ" required><label for="hydro_level-1"> ปกติ</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_level-2" name="hydro_level" value="ขาด"><label for="hydro_level-2"> ขาด</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายและท่อไฮดรอลิกส์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_pipe-1" name="hydro_pipe" value="ดี" required><label for="hydro_pipe-1"> ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_pipe-2" name="hydro_pipe" value="ไม่ดี"><label for="hydro_pipe-2"> ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั๊มไฮดรอลิกส์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_leak-1" name="hydro_leak" value="มี" required><label for="hydro_leak-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_leak-2" name="hydro_leak" value="ไม่มี"> <label for="hydro_leak-2">ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั้มเซอร์โว</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_servo-1" name="hydro_servo" value="มี" required><label for="hydro_servo-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_servo-2" name="hydro_servo" value="ไม่มี"><label for="hydro_servo-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่คอลโทรลวาล์ว</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_control-1" name="hydro_control" value="มี" required><label for="hydro_control-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_control-2" name="hydro_control" value="ไม่มี"><label for="hydro_control-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ชุดสวิงมอเตอร์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_swingmotor-1" name="hydro_swingmotor" value="มี" required><label for="hydro_swingmotor-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_swingmotor-2" name="hydro_swingmotor" value="ไม่มี"><label for="hydro_swingmotor-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั๊มหัวใจ (รถแบ็คโฮ)</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="heart_backhole-1" name="heart_backhole" value="มี"required><label for="heart_backhole-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="heart_backhole-2" name="heart_backhole" value="ไม่มี"> <label for="heart_backhole-2">ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่มอเตอร์ตัวเดิน</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_motor-1" name="hydro_motor" value="มี"required><label for="hydro_motor-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_motor-2" name="hydro_motor" value="ไม่มี"><label for="hydro_motor-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่คอลโทรลมือ</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_hand_control-1" name="hydro_hand_control" value="มี"required><label for="hydro_hand_control-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_hand_control-2" name="hydro_hand_control" value="ไม่มี"><label for="hydro_hand_control-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบคอลโทรลมือ</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hand_control-1" name="hand_control" value="เบา"required><label for="hand_control-1"> เบา</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hand_control-2" name="hand_control" value="หนัก"><label for="hand_control-2"> หนัก</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">เสียงปั้มไฮดรอลิกส์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_noise-1" name="hydro_noise" value="มี"required><label for="hydro_noise-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_noise-2" name="hydro_noise" value="ไม่มี"><label for="hydro_noise-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพออยไฮดรอลิกส์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_physical-1" name="hydro_physical" value="ดี"required><label for="hydro_physical-1"> ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_physical-2" name="hydro_physical" value="ไม่ดี"><label for="hydro_physical-2"> ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกยกบูม</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_boom-1" name="hydro_boom" value="ดี"required><label for="hydro_boom-1"> ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_boom-2" name="hydro_boom" value="ไม่ดี"><label for="hydro_boom-2"> ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกอาร์ม</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_arm-1" name="hydro_arm" value="ดี"required><label for="hydro_arm-1"> ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_arm-2" name="hydro_arm" value="ไม่ดี"><label for="hydro_arm-2"> ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกบุ้งกี้</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_bung-1" name="hydro_bung" value="ดี"required><label for="hydro_bung-1"> ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_bung-2" name="hydro_bung" value="ไม่ดี"><label for="hydro_bung-2"> ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">การอัดจาระบีจุดหมุนทุกจุด</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_grease-1" name="hydro_grease" value="มี"required><label for="hydro_grease-1"> มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_grease-2" name="hydro_grease" value="ไม่มี"><label for="hydro_grease-2"> ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">นิปเปิลอัดจาระบี</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_nipple-1" name="hydro_nipple" value="ปกติ"required><label for="hydro_nipple-1"> ปกติ</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="hydro_nipple-2" name="hydro_nipple" value="ชำรุด"><label for="hydro_nipple-2"> ชำรุด</label>
							</div>
							</div>

						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="col-md-12"><h4><u>ระบบไฟฟ้า</u></h4></label>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">หน้าจอมอนิเตอร์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="monitor-1" name="monitor" value="ดี"required><label for="monitor-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="monitor-2" name="monitor" value="ไม่ดี"><label for="monitor-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">เกจความร้อน</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="heat_gauge-1" name="heat_gauge" value="ดี"required><label for="heat_gauge-1">ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="heat_gauge-2" name="heat_gauge" value="ไม่ดี"><label for="heat_gauge-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดระดับน้ำมันโซล่า</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="sola_gauge-1" name="sola_gauge" value="ดี"required><label for="sola_gauge-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="sola_gauge-2" name="sola_gauge" value="ไม่ดี"><label for="sola_gauge-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">เกจ์ไฟชาร์ท</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="charge_gauge-1" name="charge_gauge" value="ดี"required><label for="charge_gauge-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="charge_gauge-2" name="charge_gauge" value="ไม่ดี"><label for="charge_gauge-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">มิเตอร์ชั่วโมง</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hour_mitor-1" name="hour_mitor" value="ดี"required><label for="hour_mitor-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hour_mitor-2" name="hour_mitor" value="ไม่ดี"><label for="hour_mitor-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายไฟตัวรถ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="wire-1" name="wire" value="ดี"required><label for="wire-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="wire-2" name="wire" value="ไม่ดี"><label for="wire-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพแบตเตอรี่</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="battery-1" name="battery" value="ดี"required><label for="battery-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="battery-2" name="battery" value="ไม่ดี"><label for="battery-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำกลั่นในแบตเตอรี่</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="distilled_water-1" name="distilled_water" value="ดี"required><label for="distilled_water-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="distilled_water-2" name="distilled_water" value="ไม่ดี"><label for="distilled_water-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-12"><h4><u>ระบบช่วงล่าง/ระบบโครงสร้าง</u></h4></label>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">ข้อโซ่, โรลเลอร์,แคเรีย</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="chain-1" name="chain" value="ดี"required><label for="chain-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="chain-2" name="chain" value="ไม่ดี"><label for="chain-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">บูชข้อโว,ล้อนำ,สป๊อกเก็ต</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="spokket-1" name="spokket" value="ดี"required><label for="spokket-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="spokket-2" name="spokket" value="ไม่ดี"><label for="spokket-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">กระทะล้อ,ยาง,น๊อตล้อ</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="tire-1" name="tire" value="ดี"required><label for="tire-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="tire-2" name="tire" value="ไม่ดี"><label for="tire-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">ค้อน,สายยาง,กระบอกอัด</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="hammer-1" name="hammer" value="มี"required><label for="hammer-1"> มี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="hammer-2" name="hammer" value="ไม่มี"><label for="hammer-2"> ไม่มี</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">ถังจาระบี,กุญแจล็อค</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="key_lock-1" name="key_lock" value="มี"required><label for="key_lock-1"> มี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="key_lock-2" name="key_lock" value="ไม่มี"><label for="key_lock-2"> ไม่มี</label>
									</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสีหัวเก๋งและตัวถังรถ</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="body-1" name="body" value="ดี"required><label for="body-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="body-2" name="body" value="ไม่ดี"><label for="body-2"> ไม่ดี</label>
									</div>
									</div>

							</div>
							<div class="form-group">
							<div class="col-md-12">
								<center>
									<button class="btn btn-primary" type="submit" name="button">เสร็จสิ้น</button>
									<button class="btn btn-danger" onclick="if(!confirm('ล้างค่าทั้งหมด'))return false;" type="reset" name="button">ยกเลิก</button>
								</center>
							</div>
							</div>
							</form>
						</div>
</div>
					<table id="DashboardFarm" class="table table-striped table-bordered"></table>
				</div>
			</div>


		</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style media="screen">
.col-md-6{
	font-size:140%;
}
.col-md-3{
	font-size:140%;
}
.check{
	font-size:140%;
}
.desktop{
	 margin-top: 5rem;
 }
 .status{
 	 margin-top: 10rem;
  }
</style>
<style media="screen">
@media (max-width: 1023px) {
	.control-label{
		text-align: left !important;
	}
	.status-tab{
		margin-top: 16rem;
	 }
 .tablet{
		margin-top: 5rem;
	}
	.col-md-3{
		font-size:120%;
	}
	.check{
		/*white-space: nowrap;*/
		font-size:120% !important;
	}
	.radio_check{
		display: block;
	}
	.text-right{
		text-align: left !important;
	}
	.technician{
		margin-top: 10rem;
	}
}
@media (max-width: 425px) {
	.move{
		margin-top: 5rem;
	}
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript">
		function modal2() {
		document.getElementById('technician_text').value=document.getElementById('technician').value;
		}
		function modal() {
		document.getElementById('machine_name').value=document.getElementById('machine').value;
		}
		function check_number(salary) {
		var vchar = String.fromCharCode(event.keyCode);
		if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
		salary.onKeyPress=vchar;

		}
		// $(document).ready(function() {
		//     $('.technician').select2();
		// 		$('.machine').select2();
		// });
		$(document).ready(function() {
	$('#technician').select2({
		placeholder: "เลือกช่างผู้ตรวจสอบ"
	});
	$('#machine').select2({
		placeholder: "เลือกชื่อเครื่องจักร"
	});
	});
function check_before() {
	if(!(document.getElementById('check_1').checked || document.getElementById('check_2').checked)){
		alert('กรุณากรอกข้อมูลให้ครบ');
		document.getElementById('check_1').focus();
		return false;
	}
}
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>