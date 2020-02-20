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
	$char=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
	,'W','X','Y','Z');
	$noReport=$char[rand(0,25)].substr(microtime(),2,5);
	?>

		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ใบรายงานการตรวจเช็ค CRANE</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบรายงานการตรวจเช็ค CRANE</h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">ใบรายงานการตรวจเช็ค CRANE</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<form class="" action="xxx" method="post">
							<div class="panel-body form-horizontal">
							<div class="form-group">
								<div class=" col-md-2 col-sm-1 col-xs-4 text-right head" ><label class="control-label">วันที่</label></div>
								<div class="col-md-2 col-sm-3 col-xs-8" >
									<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" >
									</div>
								<div class=" col-md-2 col-sm-2 col-xs-4 text-right head" ><label class="control-label">ผู้ตรวจสอบ</label></div>
								<div class="col-md-2 col-sm-3 col-xs-8" >
									<input class="form-control" type="text" name="" value="ทดสอบ ผู้ตรวจสอบ" readonly>
									</div>

							

								<div class=" col-md-2 col-sm-1 col-xs-4 text-right head" ><label class="control-label">เลขที่</label></div>
								<div class="col-md-2 col-sm-2 col-xs-8" >
									<input class="form-control" type="text" name="No_report" value="<?php echo e($noReport); ?>" readonly>
									</div>
									</div>

							<div class="form-group">
							<div class=" col-md-2 col-sm-2 col-xs-4 text-right head" ><label class="control-label">ชื่อเรือทุ่น</label></div>
								<div class="col-md-2 col-sm-4 col-xs-5" >
									<select class="form-control" name="ship_name" id="machine" style="width:100%">
										<option value=""></option>
										<option value="เรื่อทุ่น 1">เรื่อทุ่น 1</option>
										<option value="เรื่อทุ่น 2">เรื่อทุ่น 2</option>
										<option value="เรื่อทุ่น 3">เรื่อทุ่น 3</option>
									</select>
								</div>
									
								
										
										<div class="col-md-2 col-sm-2 col-xs-4 text-right head" >
											<label class="control-label">รหัสเครน รุ่น</label>
										</div>
										<div class="col-md-2 col-sm-4 col-xs-8" >
											<select class="form-control" name="" id="no_machine" style="width:100%">
												<option value=""></option>
												<option value="123">123</option>
												<option value="cr-1234">cr-1234</option>
											</select>
											</div>


											<div class="tablet">
												<div class=" col-md-2 col-sm-2 col-xs-4 text-right head" ><label class="control-label">ขนาด</label></div>
													<div class="col-md-2 col-sm-4 col-xs-8" >

														<div class="input-group">
									<input type="text" class="form-control" id="weight" name="weight" onkeypress="return check_number(this);">
									<span class="input-group-addon">ตัน</span>
								</div>
								</div>
								</div>
								<div class=" desktop tablet">
								<div class=" col-md-2 col-sm-2 col-xs-4 text-right head" ><label class="control-label ">สถานะเครื่องจักร</label></div>
								<div class="col-md-2 col-sm-4 col-xs-8" >
								<select class="form-control" name="status" id="status" style="width:100%" required >
									<option value="ปกติ">ปกติ</option>
									<option value="ชำรุด">ชำรุด</option>
								</select>
								</div>
												</div>

				</div>


													</div>
													</div>
</div>


			<div class="panel-body form-horizontal">
				<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
				<div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center check" ><label class="control-label">การตรวจเช็ค  </label>

					<input class="check" type="radio" id="check_1" name="check" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
					<input class="check" type="radio" id="check_2" name="check" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
					<input class="check" type="radio" id="check_3" name="check" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>
				</div>
			</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คภายนอกตัวเครน</h4></label>
					</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 "> ตรวจสอบตะขอเครนพร้อมอัดจารบี</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook_1" name="crane_hook" value="N" required><span class="radio_check"></span><label for="crane_hook_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook_2" name="crane_hook" value="AB"><span class="radio_check"></span><label for="crane_hook_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook_3" name="crane_hook" value="I/F"><span class="radio_check"></span><label for="crane_hook_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook_4" name="crane_hook" value="R"><span class="radio_check"></span><label for="crane_hook_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="crane_hook_5" name="crane_hook" value="C/O"><span class="radio_check"></span><label for="crane_hook_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบลวดสลิงมุมพร้อมทาจารบี</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_1" name="sling" value="N" required><span class="radio_check"></span><label for="sling_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_2" name="sling" value="AB"><span class="radio_check"></span><label for="sling_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_3" name="sling" value="I/F"><span class="radio_check"></span><label for="sling_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_4" name="sling" value="R"> <span class="radio_check"></span><label for="sling_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="sling_5" name="sling" value="C/O"><span class="radio_check"></span><label for="sling_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบลวดสลิงเบส - เลียพร้อมทาจาระบี</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_bass_1" name="sling_bass" value="N" required><span class="radio_check"></span><label for="sling_bass_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_bass_2" name="sling_bass" value="AB"><span class="radio_check"></span><label for="sling_bass_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_bass_3" name="sling_bass" value="I/F"><span class="radio_check"></span><label for="sling_bass_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling_bass_4" name="sling_bass" value="R"><span class="radio_check"></span><label for="sling_bass_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="sling_bass_5" name="sling_bass" value="C/O"><span class="radio_check"></span><label for="sling_bass_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบรอกปลายมุม และน๊อตล๊อคสลัก</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="end_corner_1" name="end_corner" value="N" required><span class="radio_check"></span><label for="end_corner_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="end_corner_2" name="end_corner" value="AB"><span class="radio_check"></span><label for="end_corner_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="end_corner_3" name="end_corner" value="I/F"><span class="radio_check"></span><label for="end_corner_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="end_corner_4" name="end_corner" value="R"><span class="radio_check"></span><label for="end_corner_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="end_corner_5" name="end_corner" value="C/O"><span class="radio_check"></span><label for="end_corner_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบรอกหัวเครน และน๊อตล๊อคสลัก </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="head_crane_1" name="head_crane" value="N" required><span class="radio_check"></span><label for="head_crane_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="head_crane_2" name="head_crane" value="AB"><span class="radio_check"></span><label for="head_crane_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="head_crane_3" name="head_crane" value="I/F"><span class="radio_check"></span><label for="head_crane_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="head_crane_4" name="head_crane" value="R"><span class="radio_check"></span><label for="head_crane_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="head_crane_5" name="head_crane" value="C/O"><span class="radio_check"></span><label for="head_crane_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบชุดกล้อง CCTV</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cctv_1" name="cctv" value="N" required><span class="radio_check"></span><label for="cctv_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cctv_2" name="cctv" value="AB"><span class="radio_check"></span><label for="cctv_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cctv_3" name="cctv" value="I/F"><span class="radio_check"></span><label for="cctv_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cctv_4" name="cctv" value="R"><span class="radio_check"></span><label for="cctv_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="cctv_5" name="cctv" value="C/O"><span class="radio_check"></span><label for="cctv_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คทำความสะอาดแผงระบายความร้อน หัวเครน และใต้คนขับ</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cooling_panel_1" name="cooling_panel" value="N" required><span class="radio_check"></span><label for="cooling_panel_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cooling_panel_2" name="cooling_panel" value="AB"><span class="radio_check"></span><label for="cooling_panel_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cooling_panel_3" name="cooling_panel" value="I/F"><span class="radio_check"></span><label for="cooling_panel_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="cooling_panel_4" name="cooling_panel" value="R"><span class="radio_check"></span><label for="cooling_panel_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="cooling_panel_5" name="cooling_panel" value="C/O"><span class="radio_check"></span><label for="cooling_panel_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำมันเครื่องและน้ำมันโซล่า</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_oli_sola_1" name="leak_oli_sola" value="N" required><span class="radio_check"></span><label for="leak_oli_sola_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_oli_sola_2" name="leak_oli_sola" value="AB"><span class="radio_check"></span><label for="leak_oli_sola_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_oli_sola_3" name="leak_oli_sola" value="I/F"><span class="radio_check"></span><label for="leak_oli_sola_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_oli_sola_4" name="leak_oli_sola" value="R"><span class="radio_check"></span><label for="leak_oli_sola_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="leak_oli_sola_5" name="leak_oli_sola" value="C/O"><span class="radio_check"></span><label for="leak_oli_sola_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คการรั่วซึมของน้ำมันไฮโดลิค กระบอกและสายทั่วไป</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_hydrolic_1" name="leak_hydrolic" value="N" required><span class="radio_check"></span><label for="leak_hydrolic_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_hydrolic_2" name="leak_hydrolic" value="AB"><span class="radio_check"></span><label for="leak_hydrolic_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_hydrolic_3" name="leak_hydrolic" value="I/F"><span class="radio_check"></span><label for="leak_hydrolic_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leak_hydrolic_4" name="leak_hydrolic" value="R"><span class="radio_check"></span><label for="leak_hydrolic_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="leak_hydrolic_5" name="leak_hydrolic" value="C/O"><span class="radio_check"></span><label for="leak_hydrolic_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ทำความสะอาดแผงระบายความร้อน แอร์</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="clean_cooling_1" name="clean_cooling" value="N" required><span class="radio_check"></span><label for="clean_cooling_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="clean_cooling_2" name="clean_cooling" value="AB"><span class="radio_check"></span><label for="clean_cooling_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="clean_cooling_3" name="clean_cooling" value="I/F"><span class="radio_check"></span><label for="clean_cooling_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="clean_cooling_4" name="clean_cooling" value="R"><span class="radio_check"></span><label for="clean_cooling_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="clean_cooling_5" name="clean_cooling" value="C/O"><span class="radio_check"></span><label for="clean_cooling_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ทาจารบี ลวดมุม และ ลวดเบส - เลีย</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="grease_wire_1" name="grease_wire" value="N" required><span class="radio_check"></span><label for="grease_wire_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="grease_wire_2" name="grease_wire" value="AB"><span class="radio_check"></span><label for="grease_wire_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="grease_wire_3" name="grease_wire" value="I/F"><span class="radio_check"></span><label for="grease_wire_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="grease_wire_4" name="grease_wire" value="R"><span class="radio_check"></span><label for="grease_wire_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="grease_wire_5" name="grease_wire" value="C/O"><span class="radio_check"></span><label for="grease_wire_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">อัดจารบีรอก </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="compress_grease_1" name="compress_grease" value="N" required><span class="radio_check"></span><label for="compress_grease_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="compress_grease_2" name="compress_grease" value="AB"><span class="radio_check"></span><label for="compress_grease_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="compress_grease_3" name="compress_grease" value="I/F"><span class="radio_check"></span><label for="compress_grease_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="compress_grease_4" name="compress_grease" value="R"><span class="radio_check"></span><label for="compress_grease_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="compress_grease_5" name="compress_grease" value="C/O"><span class="radio_check"></span><label for="compress_grease_5"> C/O </label>
							</div>
						</div>


					</div>
					<div class="col-md-6">

							<div class="form-group">
							<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คภายในตัวเครน</h4></label>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันไฮโดรลิค</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="oli_hydrolic_1" name="oli_hydrolic" value="N" required><span class="radio_check"></span><label for="oli_hydrolic_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="oli_hydrolic_2" name="oli_hydrolic" value="AB"><span class="radio_check"></span><label for="oli_hydrolic_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="oli_hydrolic_3" name="oli_hydrolic" value="I/F"><span class="radio_check"></span><label for="oli_hydrolic_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="oli_hydrolic_4" name="oli_hydrolic" value="R"><span class="radio_check"></span><label for="oli_hydrolic_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="oli_hydrolic_5" name="oli_hydrolic" value="C/O"><span class="radio_check"></span><label for="oli_hydrolic_5"> C/O </label>
							</div>
						</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเกียร์ สวิง</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_1" name="oli_gear" value="N" required><span class="radio_check"></span><label for="oli_gear_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_2" name="oli_gear" value="AB"><span class="radio_check"></span><label for="oli_gear_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_3" name="oli_gear" value="I/F"><span class="radio_check"></span><label for="oli_gear_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_4" name="oli_gear" value="R"><span class="radio_check"></span><label for="oli_gear_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="oli_gear_5" name="oli_gear" value="C/O"><span class="radio_check"></span><label for="oli_gear_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเกียร์ มุม</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_corner_1" name="oli_gear_corner" value="N" required><span class="radio_check"></span><label for="oli_gear_corner_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_corner_2" name="oli_gear_corner" value="AB"><span class="radio_check"></span><label for="oli_gear_corner_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_corner_3" name="oli_gear_corner" value="I/F"><span class="radio_check"></span><label for="oli_gear_corner_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_corner_4" name="oli_gear_corner" value="R"><span class="radio_check"></span><label for="oli_gear_corner_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="oli_gear_corner_5" name="oli_gear_corner" value="C/O"><span class="radio_check"></span><label for="oli_gear_corner_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเกียร์ เบส - เลีย</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_bass_1" name="oli_gear_bass" value="N" required><span class="radio_check"></span><label for="oli_gear_bass_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_bass_2" name="oli_gear_bass" value="AB"><span class="radio_check"></span><label for="oli_gear_bass_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_bass_3" name="oli_gear_bass" value="I/F"><span class="radio_check"></span><label for="oli_gear_bass_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="oli_gear_bass_4" name="oli_gear_bass" value="R"><span class="radio_check"></span><label for="oli_gear_bass_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="oli_gear_bass_5" name="oli_gear_bass" value="C/O"><span class="radio_check"></span><label for="oli_gear_bass_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วซึมของน้ำมันไฮโดรลิค, ปั๊ม, ข้อต่อสาย</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leak_hy_pump_1" name="leak_hy_pump" value="N" required><span class="radio_check"></span><label for="leak_hy_pump_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leak_hy_pump_2" name="leak_hy_pump" value="AB"><span class="radio_check"></span><label for="leak_hy_pump_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leak_hy_pump_3" name="leak_hy_pump" value="I/F"><span class="radio_check"></span><label for="leak_hy_pump_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leak_hy_pump_4" name="leak_hy_pump" value="R"><span class="radio_check"></span><label for="leak_hy_pump_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="leak_hy_pump_5" name="leak_hy_pump" value="C/O"><span class="radio_check"></span><label for="leak_hy_pump_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ดรัมสลิง (WINCH MOUNT)</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="winch_mount_1" name="winch_mount" value="N" required><span class="radio_check"></span><label for="winch_mount_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="winch_mount_2" name="winch_mount" value="AB"><span class="radio_check"></span><label for="winch_mount_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="winch_mount_3" name="winch_mount" value="I/F"><span class="radio_check"></span><label for="winch_mount_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="winch_mount_4" name="winch_mount" value="R"><span class="radio_check"></span><label for="winch_mount_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="winch_mount_5" name="winch_mount" value="C/O"><span class="radio_check"></span><label for="winch_mount_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">อัดจารบี แขนเครน และหัวตรัมสลิง</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="greas_hand_crane_1" name="greas_hand_crane" value="N" required><span class="radio_check"></span><label for="greas_hand_crane_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="greas_hand_crane_2" name="greas_hand_crane" value="AB"><span class="radio_check"></span><label for="greas_hand_crane_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="greas_hand_crane_3" name="greas_hand_crane" value="I/F"><span class="radio_check"></span><label for="greas_hand_crane_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="greas_hand_crane_4" name="greas_hand_crane" value="R"><span class="radio_check"></span><label for="greas_hand_crane_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="greas_hand_crane_5" name="greas_hand_crane" value="C/O"><span class="radio_check"></span><label for="greas_hand_crane_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตู้ควบคุมระบบเครน Electronic cabinet</h4></label>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตำแหน่งอุปกรณ์,การจับยึดสายไฟและชุดควบคุม</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="position_device_1" name="position_device" value="N" required><span class="radio_check"></span><label for="position_device_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="position_device_2" name="position_device" value="AB"><span class="radio_check"></span><label for="position_device_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="position_device_3" name="position_device" value="I/F"><span class="radio_check"></span><label for="position_device_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="position_device_4" name="position_device" value="R"><span class="radio_check"></span><label for="position_device_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="position_device_5" name="position_device" value="C/O"><span class="radio_check"></span><label for="position_device_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">หน้าปัด(DISPLAY MPC)</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="display_mpc_1" name="display_mpc" value="N" required><span class="radio_check"></span><label for="display_mpc_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="display_mpc_2" name="display_mpc" value="AB"><span class="radio_check"></span><label for="display_mpc_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="display_mpc_3" name="display_mpc" value="I/F"><span class="radio_check"></span><label for="display_mpc_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="display_mpc_4" name="display_mpc" value="R"><span class="radio_check"></span><label for="display_mpc_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="display_mpc_5" name="display_mpc" value="C/O"><span class="radio_check"></span><label for="display_mpc_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12"><h4>หน้าปัดควบคุมเครน( CONTROL PANEL)</h4></label>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 "> ปุ่มควบคุมต่างๆ</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="control_panel_1" name="control_panel" value="N" required><span class="radio_check"></span><label for="control_panel_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="control_panel_2" name="control_panel" value="AB"><span class="radio_check"></span><label for="control_panel_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="control_panel_3" name="control_panel" value="I/F"><span class="radio_check"></span><label for="control_panel_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="control_panel_4" name="control_panel" value="R"><span class="radio_check"></span><label for="control_panel_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="control_panel_5" name="control_panel" value="C/O"><span class="radio_check"></span><label for="control_panel_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 "> แสงสว่างภายในปลอกเครน</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="lighting_1" name="lighting" value="N" required><span class="radio_check"></span><label for="lighting_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="lighting_2" name="lighting" value="AB"><span class="radio_check"></span><label for="lighting_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="lighting_3" name="lighting" value="I/F"><span class="radio_check"></span><label for="lighting_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="lighting_4" name="lighting" value="R"><span class="radio_check"></span><label for="lighting_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="lighting_5" name="lighting" value="C/O"><span class="radio_check"></span><label for="lighting_5"> C/O </label>
						</div>
					</div>

							</div>
						<div class="form-group">
							<div class="col-md-12 check">

							</div>
							</div>
						<div class="form-group">
							<div class="col-md-12 check text-center">
								ปัญหา / ข้อเสนอแนะ / รายการเปลี่ยนอะไหล่ / การแก้ไข :<br>
								<textarea name="note" class="form-control" rows="5"></textarea>
							</div>
							<div class="col-md-12">
								<label class="text-right check">หมายเหตุ  : ความหมายตัวอักษรย่อ</label><br>
								<label class="text-right check">N	=	Normal			สภาวะปกติ	</label><br>
								<label class="text-right check">AB	=	AbNormal			ไม่ปกติต้องซ่อมด่วน	</label><br>
								<label class="text-right check">I/F	=	Inspection/Fixed			ตรวจเช็คและแก้ไขเบื้องต้น	</label><br>
								<label class="text-right check">R	=	Replaced			สมควรเปลี่ยน	</label><br>
								<label class="text-right check">C/O	=	Clean / OK			ทำความสะอาด / ดำเนินการแล้ว	</label>
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
		font-size:120%;
	}
	.check{
		font-size:140%;
	}
	.head{
		font-size:140%;
	}
	.desktop{
		margin-top: 5rem;
	}
@media (max-width: 1023px) {
.control-label{
	text-align: left !important;
}
.tablet{
	margin-top: 5rem;
}
.text-right{
	text-align: left !important;
}
.radio_check{
	display: block;
}
.head{
	font-size:120%;
	text-align: left !important;
}
}
@media (max-width: 1280px) {

}
.radio_check{
	display: block;
}
h4 {
    text-decoration: underline;
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
	$('#no_machine').select2({placeholder: "เลือกรหัสเครน"});
	$('#machine').select2({placeholder: "เลือกเรือทุ่น"});
	});

	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>