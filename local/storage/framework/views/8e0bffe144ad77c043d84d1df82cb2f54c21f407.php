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
				<li class="active">ใบตรวจเช็ค เครื่องกำเนิดไฟฟ้า</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบตรวจเช็ค เครื่องกำเนิดไฟฟ้า</h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">ใบตรวจเช็ค เครื่องกำเนิดไฟฟ้า</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<form class="" action="xxx" method="post">
							<div class="panel-body form-horizontal">
							<div class="form-group">
								<div class=" col-md-2 col-sm-1 col-xs-4 text-right" ><label class="control-label check">วันที่</label></div>
								<div class="col-md-2 col-sm-3 col-xs-8" >
									<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" >
									</div>
								<div class=" col-md-2 col-sm-2 col-xs-4 text-right" ><label class="control-label check">ผู้ตรวจสอบ</label></div>
								<div class="col-md-2 col-sm-3 col-xs-8" >
									<input class="form-control" type="text" name="" value="ทดสอบ ผู้ตรวจสอบ" readonly>
									</div>

							

								<div class=" col-md-2 col-sm-1 col-xs-4 text-right " ><label class="control-label check">เลขที่</label></div>
								<div class="col-md-2 col-sm-2 col-xs-8" >
									<input class="form-control" type="text" name="No_report" value="<?php echo e($noReport); ?>" readonly>
									</div>
									</div>

							<div class="form-group">
							<div class=" col-md-2 col-sm-2 col-xs-4 text-right" ><label class="control-label check">ชื่อเรือทุ่น</label></div>
								<div class="col-md-2 col-sm-4 col-xs-5" >
									<select class="form-control" name="ship_name" id="machine" style="width:100%">
										<option value=""></option>
										<option value="เรื่อทุ่น 1">เรื่อทุ่น 1</option>
										<option value="เรื่อทุ่น 2">เรื่อทุ่น 2</option>
										<option value="เรื่อทุ่น 3">เรื่อทุ่น 3</option>
									</select>
								</div>
									
								
										
										<div class=" col-md-2 col-sm-2 col-xs-4 text-right" ><label class="control-label check">ประเภท</label></div>
										<div class="col-md-2 col-sm-4 col-xs-8" >
										<select class="form-control" name="">
											<option value="แสงสว่าง">แสงสว่าง</option>
											<option value="เครน">เครน</option>
										</select>
											</div>
											<div class="tablet ">
												<div class="col-md-2 col-sm-2 col-xs-4 text-right check" >
													<label class="control-label text-right ">หมายเลขเครื่องยนต์</label>
												</div>
												<div class="col-md-2 col-sm-4 col-xs-8" >
													<select class="form-control" name="" id="no_machine" style="width:100%">
														<option value=""></option>
														<option value="123">123</option>
														<option value="cr-1234">cr-1234</option>
													</select>
													</div>
													</div>
													<div class="tablet desktop lek">
												<div class=" col-md-2 col-sm-2 col-xs-4 text-right check" ><label class="control-label">ขนาด</label></div>
												<div class="col-md-2 col-sm-4 col-xs-8" >

													<div class="input-group">
                <input type="text" class="form-control" id="weight" name="weight" onkeypress="return check_number(this);">
                <span class="input-group-addon">ตัน</span>
              </div>	</div>
						</div>

						<div class="tablet-status desktop">
						<div class=" col-md-2 col-sm-2 col-xs-4 text-right " ><label class="control-label check">สถานะเครื่องจักร</label></div>
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
					<input class="check" type="radio" id="check_2" name="check" value="after"> <label class="control-label" for="check_2"> หลังปฏิบัติงาน</label>
					<input class="check" type="radio" id="check_3" name="check" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>
				</div>
			</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>ตรวจเช็คก่อนติดเครื่องยนต์</u></h4></label>
					</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 "> ระดับน้ำในหม้อน้ำ</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="boiler_1" name="boiler" value="N" required style="display: block;"> <label for="boiler_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="boiler_2" name="boiler" value="AB" style="display: block;"> <label for="boiler_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="boiler_3" name="boiler" value="I/F"style="display: block;"> <label for="boiler_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="boiler_4" name="boiler" value="R"style="display: block;"> <label for="boiler_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="boiler_5" name="boiler" value="C/O"style="display: block;"> <label for="boiler_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเครื่องอยู่ในเกณฑ์มาตรฐาน</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="engine_1" name="engine" value="N" required style="display: block;"> <label for="engine_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="engine_2" name="engine" value="AB"style="display: block;"> <label for="engine_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="engine_3" name="engine" value="I/F"style="display: block;"> <label for="engine_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="engine_4" name="engine" value="R"style="display: block;"> <label for="engine_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="engine_5" name="engine" value="C/O"style="display: block;"> <label for="engine_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายพานพัดลมหน้าเครื่อง </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="front_belt_1" name="front_belt" value="N" required style="display: block;"> <label for="front_belt_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="front_belt_2" name="front_belt" value="AB"style="display: block;"> <label for="front_belt_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="front_belt_3" name="front_belt" value="I/F"style="display: block;"> <label for="front_belt_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="front_belt_4" name="front_belt" value="R"style="display: block;"> <label for="front_belt_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="front_belt_5" name="front_belt" value="C/O"style="display: block;"> <label for="front_belt_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ท่อยางและเข็มขัดรัดสายทุกตัว</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pipe_rubber_1" name="pipe_rubber" value="N" required style="display: block;"> <label for="pipe_rubber_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pipe_rubber_2" name="pipe_rubber" value="AB"style="display: block;"> <label for="pipe_rubber_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pipe_rubber_3" name="pipe_rubber" value="I/F"style="display: block;"> <label for="pipe_rubber_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pipe_rubber_4" name="pipe_rubber" value="R"style="display: block;"> <label for="pipe_rubber_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="pipe_rubber_5" name="pipe_rubber" value="C/O"style="display: block;"> <label for="pipe_rubber_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ขั้วแบตเตอรี่และเติมน้ำกลั่นอยู่ในเกณฑ์มาตรฐาน </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="terminals_distilled_1" name="terminals_distilled" value="N" required style="display: block;"> <label for="terminals_distilled_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="terminals_distilled_2" name="terminals_distilled" value="AB" style="display: block;"> <label for="terminals_distilled_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="terminals_distilled_3" name="terminals_distilled" value="I/F" style="display: block;"> <label for="terminals_distilled_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="terminals_distilled_4" name="terminals_distilled" value="R" style="display: block;"> <label for="terminals_distilled_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="terminals_distilled_5" name="terminals_distilled" value="C/O" style="display: block;"> <label for="terminals_distilled_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คสภาพทั่วไปรอบเครื่อง</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_general_1" name="check_general" value="N" required style="display: block;"> <label for="check_general_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_general_2" name="check_general" value="AB" style="display: block;"> <label for="check_general_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_general_3" name="check_general" value="I/F" style="display: block;"> <label for="check_general_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_general_4" name="check_general" value="R" style="display: block;"> <label for="check_general_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="check_general_5" name="check_general" value="C/O" style="display: block;"> <label for="check_general_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คสภาพทั่วไปของสายไฟและอุปกรณ์หน้าตู้คอนโทรล</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="wire_controller_1" name="wire_controller" value="N" required style="display: block;"> <label for="wire_controller_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="wire_controller_2" name="wire_controller" value="AB" style="display: block;"> <label for="wire_controller_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="wire_controller_3" name="wire_controller" value="I/F" style="display: block;"> <label for="wire_controller_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="wire_controller_4" name="wire_controller" value="R" style="display: block;"> <label for="wire_controller_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="wire_controller_5" name="wire_controller" value="C/O" style="display: block;"> <label for="wire_controller_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำมันเครื่องและน้ำมันโซล่า</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leakage_1" name="leakage" value="N" required style="display: block;"> <label for="leakage_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leakage_2" name="leakage" value="AB" style="display: block;"> <label for="leakage_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leakage_3" name="leakage" value="I/F" style="display: block;"> <label for="leakage_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="leakage_4" name="leakage" value="R" style="display: block;"> <label for="leakage_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="leakage_5" name="leakage" value="C/O" style="display: block;"> <label for="leakage_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คชุดมอเตอร์ปั้มน้ำทะเลและปริมาณน้ำที่ไหลออก</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="motor_sea_1" name="motor_sea" value="N" required style="display: block;"> <label for="motor_sea_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="motor_sea_2" name="motor_sea" value="AB" style="display: block;"> <label for="motor_sea_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="motor_sea_3" name="motor_sea" value="I/F" style="display: block;"> <label for="motor_sea_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="motor_sea_4" name="motor_sea" value="R" style="display: block;"> <label for="motor_sea_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="motor_sea_5" name="motor_sea" value="C/O" style="display: block;"> <label for="motor_sea_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>ตรวจเช็คติดเครื่องรอบเดินเบา/เร่งเครื่อง/หลังติดเครื่อง์</u></h4></label>
					</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำ</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_water_1" name="leakage_water" value="N" required style="display: block;"> <label for="leakage_water_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_water_2" name="leakage_water" value="AB" style="display: block;"> <label for="leakage_water_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_water_3" name="leakage_water" value="I/F" style="display: block;"> <label for="leakage_water_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_water_4" name="leakage_water" value="R" style="display: block;"> <label for="leakage_water_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="leakage_water_5" name="leakage_water" value="C/O" style="display: block;"> <label for="leakage_water_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำมันเครื่องและน้ำมันโซล่า</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_sola_1" name="leakage_sola" value="N" required style="display: block;"> <label for="leakage_sola_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_sola_2" name="leakage_sola" value="AB" style="display: block;"> <label for="leakage_sola_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_sola_3" name="leakage_sola" value="I/F" style="display: block;"> <label for="leakage_sola_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="leakage_sola_4" name="leakage_sola" value="R" style="display: block;"> <label for="leakage_sola_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="leakage_sola_5" name="leakage_sola" value="C/O" style="display: block;"> <label for="leakage_sola_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คเสียงดังและการสั่นของเครื่องยนต์</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="engine_noise_1" name="engine_noise" value="N" required style="display: block;"> <label for="engine_noise_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="engine_noise_2" name="engine_noise" value="AB" style="display: block;"> <label for="engine_noise_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="engine_noise_3" name="engine_noise" value="I/F" style="display: block;"> <label for="engine_noise_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="engine_noise_4" name="engine_noise" value="R" style="display: block;"> <label for="engine_noise_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="engine_noise_5" name="engine_noise" value="C/O" style="display: block;"> <label for="engine_noise_5"> C/O </label>
								</div>
							</div>

					</div>
					<div class="col-md-6">

							<div class="form-group">
							<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>ตู้ควบคุม (CONTROL PANEL), ระบบการแสดงผล์</u></h4></label>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">เมนเบรคเกอร์ไฟฟ้า</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="breaker_1" name="breaker" value="N" required style="display: block;"> <label for="breaker_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="breaker_2" name="breaker" value="AB" style="display: block;"> <label for="breaker_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="breaker_3" name="breaker" value="I/F" style="display: block;"> <label for="breaker_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="breaker_4" name="breaker" value="R" style="display: block;"> <label for="breaker_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="breaker_5" name="breaker" value="C/O" style="display: block;"> <label for="breaker_5"> C/O </label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>มาตรวัดต่าง ๆ สามารถอ่านได้</u></h4></label>
						</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 "> เกจวัดแรงดันไฟฟ้า 380-440 v</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_1" name="380-440" value="N" required style="display: block;"> <label for="380-440_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_2" name="380-440" value="AB" style="display: block;"> <label for="380-440_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_3" name="380-440" value="I/F" style="display: block;"> <label for="380-440_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_4" name="380-440" value="R" style="display: block;"> <label for="380-440_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="380-440_5" name="380-440" value="C/O" style="display: block;"> <label for="380-440_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดความถี่ไฟฟ้า 50/60 HZ</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_1" name="50/60" value="N" required style="display: block;"> <label for="50/60_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_2" name="50/60" value="AB" style="display: block;"> <label for="50/60_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_3" name="50/60" value="I/F" style="display: block;"> <label for="50/60_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_4" name="50/60" value="R" style="display: block;"> <label for="50/60_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="50/60_5" name="50/60" value="C/O" style="display: block;"> <label for="50/60_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดความร้อน 87-98 C, 189-209 F </label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="heat_gauge_1" name="heat_gauge" value="N" required style="display: block;"> <label for="heat_gauge_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="heat_gauge_2" name="heat_gauge" value="AB" style="display: block;"> <label for="heat_gauge_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="heat_gauge_3" name="heat_gauge" value="I/F" style="display: block;"> <label for="heat_gauge_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="heat_gauge_4" name="heat_gauge" value="R" style="display: block;"> <label for="heat_gauge_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="heat_gauge_5" name="heat_gauge" value="C/O" style="display: block;"> <label for="heat_gauge_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดแรงดันน้ำมันเครื่อง 40 to 88 psi</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="gauge_pressure_1" name="gauge_pressure" value="N" required style="display: block;"> <label for="gauge_pressure_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="gauge_pressure_2" name="gauge_pressure" value="AB" style="display: block;"> <label for="gauge_pressure_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="gauge_pressure_3" name="gauge_pressure" value="I/F" style="display: block;"> <label for="gauge_pressure_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="gauge_pressure_4" name="gauge_pressure" value="R" style="display: block;"> <label for="gauge_pressure_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="gauge_pressure_5" name="gauge_pressure" value="C/O" style="display: block;"> <label for="gauge_pressure_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">แอมมิเตอร์</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="ammitor_1" name="ammitor" value="N" required style="display: block;"> <label for="ammitor_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="ammitor_2" name="ammitor" value="AB" style="display: block;"> <label for="ammitor_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="ammitor_3" name="ammitor" value="I/F" style="display: block;"> <label for="ammitor_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="ammitor_4" name="ammitor" value="R" style="display: block;"> <label for="ammitor_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="ammitor_5" name="ammitor" value="C/O" style="display: block;"> <label for="ammitor_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดชั่วโมง</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="hour_gauge_1" name="hour_gauge" value="N" required style="display: block;"> <label for="hour_gauge_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="hour_gauge_2" name="hour_gauge" value="AB" style="display: block;"> <label for="hour_gauge_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="hour_gauge_3" name="hour_gauge" value="I/F" style="display: block;"> <label for="hour_gauge_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="hour_gauge_4" name="hour_gauge" value="R" style="display: block;"> <label for="hour_gauge_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="hour_gauge_5" name="hour_gauge" value="C/O" style="display: block;"> <label for="hour_gauge_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดรอบ</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="round_gauge_1" name="round_gauge" value="N" required style="display: block;"> <label for="round_gauge_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="round_gauge_2" name="round_gauge" value="AB" style="display: block;"> <label for="round_gauge_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="round_gauge_3" name="round_gauge" value="I/F" style="display: block;"> <label for="round_gauge_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="round_gauge_4" name="round_gauge" value="R" style="display: block;"> <label for="round_gauge_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="round_gauge_5" name="round_gauge" value="C/O" style="display: block;"> <label for="round_gauge_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">สายไฟภายในเครื่องไม่มีเปื่อย, แตก, จุดต่อไม่หลวม</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_inside_1" name="check_inside" value="N" required style="display: block;"> <label for="check_inside_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_inside_2" name="check_inside" value="AB" style="display: block;"> <label for="check_inside_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_inside_3" name="check_inside" value="I/F" style="display: block;"> <label for="check_inside_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_inside_4" name="check_inside" value="R" style="display: block;"> <label for="check_inside_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_inside_5" name="check_inside" value="C/O" style="display: block;"> <label for="check_inside_5"> C/O </label>
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
    $('#no_machine').select2({placeholder: "เลือกหมายเลขเครื่องยนต์"});
		$('#machine').select2({placeholder: "เลือกเรือทุ่น"});
	});

		</script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style media="screen">
.col-md-6{
	font-size:120%;
}
.check{
	font-size:140%;
}
.desktop{
	margin-top: 5rem;
}
@media (max-width: 1023px) {

	.tablet-status{
		margin-top: 10rem;
	}
	.control-label{
		text-align: left !important;
	}
.col-md-6{
	font-size:120%;
}
.check{
	font-size:120%;
}
.radio_check{
	display: block;
}
.tablet{
	margin-top: 5rem;
}
.text-right{
	text-align: left !important;
}
}
@media (max-width: 425px) {
.lek{
	margin-top: 12rem;
}
}
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>