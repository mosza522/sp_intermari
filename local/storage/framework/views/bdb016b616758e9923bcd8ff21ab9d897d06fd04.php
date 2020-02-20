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
	$work_no=\App\Models\SMD\SmdItem::all();
	$boat= App\Models\Master\SMD\Boat::all();
	$machine= \App\Models\Master\Machine::orderBy('MachineType')->get();
	$staff=\App\Models\Staff\Staff::where('DivisionID',4)->get();
	?>
	<?php
	$stock = App\Models\Machine\MachineCondition::orderBy('created_at','desc')->first();
	$code='MC'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
	if(count($stock)<1){
		$code.='000';
	}
	elseif(substr($stock->code,2,6)!=(substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2))){
		$code.='000';
	}
	else{
		$num=number_format(substr($stock->code,8));
		$num++;
		if(strlen($num)==1){
			$code.="00";
			$code.=$num;
		}
		elseif(strlen($num)==2) {
			$code.="0";
			$code.=$num;
		}else{
			$code.=$num;
		}
	}
	$machine_name=\App\Models\Master\Machine::Join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Master_Machine.DepartmentID')
				->select('ck_Master_Machine.id', 'DepartmentName','MachineHourMeter', 'MachineType', 'MachineName', 'MachineNunber', 'MachineUsage', 'MachineStatus', 'ck_Master_Machine.deleted_at')
				->where('ck_Master_Machine.DivisionID', '6')
				->where('ck_Master_Machine.id',$id)
					 ->first();
	?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<?php if(!isset($check_approve)): ?>
				<li><a href="<?php echo e(action('FTS\MachineController@checkInspection')); ?>">ตรวจเช็คเครื่องจักร</a></li>
			<?php else: ?>
				<li><a href="<?php echo e(action('FTS\MachineController@approveInspection')); ?>">อนุมัติการตรวจเช็ค</a></li>
			<?php endif; ?>
				<li class="active">รายงานการตรวจเช็คสภาพเครื่องจักรกล</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->

			<h1 class="page-header">การตรวจเช็คสภาพเครื่องจักรกล </h1>


			<!-- end page-header -->

			<div class="panel panel-inverse lesswidth">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">การตรวจเช็คสภาพเครื่องจักรกล</h4>
			    </div>
				<div class="panel-body" style="">
					<?php if(!isset($check_approve)): ?>
						<div class="row" style="padding: 0px 2px 0 0;">
						<form action="<?php echo e(action('Machine\MachineConditionController@store')); ?>" method="post" onsubmit="return check_before();">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="prepare_id" value="<?php echo e($prepare_id); ?>">
							<div class="panel-body form-horizontal">

						<div class="form-group">
						<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">วันที่</label></div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
							<input type="hidden" name="real_date" value="<?php echo e(Carbon\Carbon::now()); ?>">
							</div>
							<div class="tablet1">
							<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อผู้ตรวจสอบ</label></div>
							<div class="col-md-2 col-sm-7 col-xs-8" >
								<input class="form-control" type="text" name="create_by" value="<?php echo e(Auth::user()->StaffPrefix); ?> <?php echo e(Auth::user()->StaffFirstName); ?> <?php echo e(Auth::user()->StaffLastName); ?>" readonly>
								</div>
								</div>
								<div class="tablet2">
									<div class=" col-md-2 col-sm-5 col-xs-4 text-right check " ><label class="control-label">เลขที่</label></div>
									<div class="col-md-2 col-sm-7 col-xs-8" >
										<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
										</div>
								</div>

									
										

  <!-- Modal -->
  
										
										<div class="desktop tablet3">

											<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเครื่องจักร</label></div>
											<div class="col-md-2 col-sm-7 col-xs-8" >
												<input class="form-control" type="hidden" name="machine" id="machine" value="<?php echo e($id); ?>" readonly required>
												<input class="form-control" type="text" name="" id="" value="<?php echo e($machine_name->MachineName); ?>" readonly required>
												
											</div>

											</div>
											<div class="desktop">
												<div class="tablet4">
												<div class="col-md-2 col-sm-5 col-xs-4 text-right" >
												<label class="control-label check">มิเตอร์ชั่วโมง</label>
											</div>
											<div class="col-md-2 col-sm-7 col-xs-8" >
												<input class="form-control" type="text" name="hour" id="mitor" value="<?php echo e($machine_name->MachineHourMeter); ?>" onkeypress="return check_number(this);"required>
												</div>
												</div>
											</div>
											<div class="desktop">
												<div class="tablet5">
												<div class=" col-md-2 col-sm-5 col-xs-4 check text-right control-label" ><label>ช่างผู้ตรวจสอบ</label></div>
											<div class="col-md-2 col-sm-7 col-xs-8" >
												<select class="form-control select2" name="technician" id="technician" style="width:100%" required>
													<option value=""></option>
													<?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($data->id); ?>"><?php echo e($data->StaffPrefix); ?> <?php echo e($data->StaffFirstName); ?> <?php echo e($data->StaffLastName); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
											</div>
										</div>
											<div class="status status-tab tablet6">
												<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเรือใหญ่</label></div>
													<div class="col-md-2 col-sm-7 col-xs-8" >
														<input class="form-control" type="text" name="" id="" value="<?php echo e($boat_name); ?>" readonly>
														<input class="form-control" type="hidden" name="bigboat" id="bigboat" value="<?php echo e($boat_id); ?>" readonly>
														
												</div>
											</div>
											<div class="status status-tab tablet7">
												<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">เลขที่ใบแจ้งงาน</label></div>
													<div class="col-md-2 col-sm-7 col-xs-8" >
														<input type="text" class="form-control" id="job_number" name="job_number" value="<?php echo e($work_number); ?>" readonly>
														
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
					<?php if($InspectionType=='B'): ?>
						<input type="checkbox" id="check_1" name="check[]" value="before" checked> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
						<input type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>

					<?php elseif($InspectionType=='A'): ?>
						<input type="checkbox" id="check_1" name="check[]" value="before" > <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
						<input type="checkbox" id="check_2" name="check[]" value="after" checked> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>

					<?php endif; ?>

					</div>
				</div>
				<div class="col-md-2">

				</div>
				<div class="col-md-8">

						<div class="form-group">
							<label class="col-md-12"><h4><u>ระบบเครื่องยนต์</u></h4></label>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6">ระดับน้ำมันเครื่อง</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" name="oil" id="oli_1" value="ปกติ"required><label for="oli_1">ปกติ</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" name="oil" id="oli_2" value="ขาด"><label for="oli_2">ขาด</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-6 ">น้ำมันเครื่องรั่วซึม</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" name="oil_leak" id="leak-1" value="มี"required><label for="leak-1">มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" name="oil_leak" id="leak-2" value="ไม่มี"><label for="leak-2">ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพกรองอากาศ</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" name="filter" id="filter-1" value="ดี"required><label for="filter-1">ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" name="filter" id="filter-2" value="ไม่ดี"><label for="filter-2">ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพท่ออากาศ</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="pipe-1" name="pipe" value="ดี"required><label for="pipe-1">ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="pipe-2" name="pipe" value="ไม่ดี"> <label for="pipe-2">ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ควายยากง่ายในการสตาร์ท</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="start-1" name="start" value="ง่าย"required> <label for="start-1">ง่าย</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="start-2" name="start" value="ยาก"> <label for="start-2">ยาก</label>
							</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เสียงผิดปกติของเครื่องยนต์</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="noise-1" name="noise" value="มี"required> <label for="noise-1">มี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="noise-2" name="noise" value="ไม่มี"> <label for="noise-2">ไม่มี</label>
							</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6">สีควันไอเสีย</label>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<select class="form-control" name="smoke" id="machine"required style="width:70%">
									<option value="ขาว">ขาว</option>
									<option value="เทา">เทา</option>
									<option value="ดำ">ดำ</option>
								</select>
							</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">หม้อพักไอเสีย</label>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="exhaust-1" name="exhaust" value="ดี"required><label for="exhaust-1"> ดี</label>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="radio" id="exhaust-2" name="exhaust" value="ไม่ดี"required><label for="exhaust-2"> ไม่ดี</label>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-12"><h4> <u>ระบบระบายความร้อน</u></h4></label>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำในหม้อน้ำและหม้อพัก</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="water_level-1" name="water_level" value="ปกติ"required><label for="water_level-1"> ปกติ</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="water_level-2" name="water_level" value="ขาด"><label for="water_level-2"> ขาด</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">น้ำยาหล่อเย็น</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="cooling-1" name="cooling" value="มี"required><label for="cooling-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="cooling-2" name="cooling" value="ไม่มี"><label for="cooling-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพท่อยางหม้อน้ำ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="boiler_pipe-1" name="boiler_pipe" value="ดี"required><label for="boiler_pipe-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="boiler_pipe-2" name="boiler_pipe" value="ไม่ดี"><label for="boiler_pipe-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพฝาปิดหม้อน้ำ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="boiler_lid-1" name="boiler_lid" value="ดี"required><label for="boiler_lid-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="boiler_lid-2" name="boiler_lid" value="ไม่ดี"> <label for="boiler_lid-2">ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพหม้อน้ำ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="boiler_condition-1" name="boiler_condition" value="ดี"required> <label for="boiler_condition-1">ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="boiler_condition-2" name="boiler_condition" value="ไม่ดี"><label for="boiler_condition-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-12"><h4><u>ระบบไฮดรอลิกส์</u></h4></label>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันไฮดรอลิกส์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_level-1" name="hydro_level" value="ปกติ"required><label for="hydro_level-1"> ปกติ</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_level-2" name="hydro_level" value="ขาด"><label for="hydro_level-2"> ขาด</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายและท่อไฮดรอลิกส์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_pipe-1" name="hydro_pipe" value="ดี"required><label for="hydro_pipe-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_pipe-2" name="hydro_pipe" value="ไม่ดี"><label for="hydro_pipe-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั๊มไฮดรอลิกส์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_leak-1" name="hydro_leak" value="มี"required><label for="hydro_leak-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_leak-2" name="hydro_leak" value="ไม่มี"> <label for="hydro_leak-2">ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั้มเซอร์โว</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_servo-1" name="hydro_servo" value="มี"required><label for="hydro_servo-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_servo-2" name="hydro_servo" value="ไม่มี"><label for="hydro_servo-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่คอลโทรลวาล์ว</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_control-1" name="hydro_control" value="มี"required><label for="hydro_control-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_control-2" name="hydro_control" value="ไม่มี"><label for="hydro_control-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ชุดสวิงมอเตอร์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_swingmotor-1" name="hydro_swingmotor" value="มี"required><label for="hydro_swingmotor-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_swingmotor-2" name="hydro_swingmotor" value="ไม่มี"><label for="hydro_swingmotor-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั๊มหัวใจ (รถแบ็คโฮ)</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="heart_backhole-1" name="heart_backhole" value="มี" required><label for="heart_backhole-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="heart_backhole-2" name="heart_backhole" value="ไม่มี"> <label for="heart_backhole-2">ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่มอเตอร์ตัวเดิน</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_motor-1" name="hydro_motor" value="มี" required><label for="hydro_motor-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_motor-2" name="hydro_motor" value="ไม่มี"><label for="hydro_motor-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่คอลโทรลมือ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_hand_control-1" name="hydro_hand_control" value="มี" required><label for="hydro_hand_control-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_hand_control-2" name="hydro_hand_control" value="ไม่มี"><label for="hydro_hand_control-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบคอลโทรลมือ</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hand_control-1" name="hand_control" value="เบา" required><label for="hand_control-1"> เบา</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hand_control-2" name="hand_control" value="หนัก"><label for="hand_control-2"> หนัก</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">เสียงปั้มไฮดรอลิกส์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_noise-1" name="hydro_noise" value="มี" required><label for="hydro_noise-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_noise-2" name="hydro_noise" value="ไม่มี"><label for="hydro_noise-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพออยไฮดรอลิกส์</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_physical-1" name="hydro_physical" value="ดี" required><label for="hydro_physical-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_physical-2" name="hydro_physical" value="ไม่ดี"><label for="hydro_physical-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกยกบูม</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_boom-1" name="hydro_boom" value="ดี" required><label for="hydro_boom-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_boom-2" name="hydro_boom" value="ไม่ดี"><label for="hydro_boom-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกอาร์ม</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_arm-1" name="hydro_arm" value="ดี" required><label for="hydro_arm-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_arm-2" name="hydro_arm" value="ไม่ดี"><label for="hydro_arm-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกบุ้งกี้</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_bung-1" name="hydro_bung" value="ดี" required><label for="hydro_bung-1"> ดี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_bung-2" name="hydro_bung" value="ไม่ดี"><label for="hydro_bung-2"> ไม่ดี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">การอัดจาระบีจุดหมุนทุกจุด</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_grease-1" name="hydro_grease" value="มี" required><label for="hydro_grease-1"> มี</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_grease-2" name="hydro_grease" value="ไม่มี"><label for="hydro_grease-2"> ไม่มี</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">นิปเปิลอัดจาระบี</label>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_nipple-1" name="hydro_nipple" value="ปกติ" required><label for="hydro_nipple-1"> ปกติ</label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3">
									<input type="radio" id="hydro_nipple-2" name="hydro_nipple" value="ชำรุด"><label for="hydro_nipple-2"> ชำรุด</label>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-12"><h4><u>ระบบไฟฟ้า</u></h4></label>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">หน้าจอมอนิเตอร์</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="monitor-1" name="monitor" value="ดี" required><label for="monitor-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="monitor-2" name="monitor" value="ไม่ดี"><label for="monitor-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">เกจความร้อน</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="heat_gauge-1" name="heat_gauge" value="ดี" required><label for="heat_gauge-1">ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="heat_gauge-2" name="heat_gauge" value="ไม่ดี"><label for="heat_gauge-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดระดับน้ำมันโซล่า</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="sola_gauge-1" name="sola_gauge" value="ดี" required><label for="sola_gauge-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="sola_gauge-2" name="sola_gauge" value="ไม่ดี"><label for="sola_gauge-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">เกจ์ไฟชาร์ท</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="charge_gauge-1" name="charge_gauge" value="ดี" required><label for="charge_gauge-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="charge_gauge-2" name="charge_gauge" value="ไม่ดี"><label for="charge_gauge-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">มิเตอร์ชั่วโมง</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="hour_mitor-1" name="hour_mitor" value="ดี" required><label for="hour_mitor-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="hour_mitor-2" name="hour_mitor" value="ไม่ดี"><label for="hour_mitor-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายไฟตัวรถ</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="wire-1" name="wire" value="ดี" required><label for="wire-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="wire-2" name="wire" value="ไม่ดี"><label for="wire-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพแบตเตอรี่</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="battery-1" name="battery" value="ดี" required><label for="battery-1"> ดี</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="battery-2" name="battery" value="ไม่ดี"><label for="battery-2"> ไม่ดี</label>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำกลั่นในแบตเตอรี่</label>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="radio" id="distilled_water-1" name="distilled_water" value="ดี" required><label for="distilled_water-1"> ดี</label>
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
											<input type="radio" id="chain-1" name="chain" value="ดี" required><label for="chain-1"> ดี</label>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="chain-2" name="chain" value="ไม่ดี"><label for="chain-2"> ไม่ดี</label>
										</div>
										</div>
										<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">บูชข้อโว,ล้อนำ,สป๊อกเก็ต</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="spokket-1" name="spokket" value="ดี" required><label for="spokket-1"> ดี</label>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="spokket-2" name="spokket" value="ไม่ดี"><label for="spokket-2"> ไม่ดี</label>
										</div>
										</div>
										<div class="form-group">
										<label class="col-md-6 col-sm-6 col-xs-6 ">กระทะล้อ,ยาง,น๊อตล้อ</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="tire-1" name="tire" value="ดี" required><label for="tire-1"> ดี</label>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="tire-2" name="tire" value="ไม่ดี"><label for="tire-2"> ไม่ดี</label>
										</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 col-sm-6 col-xs-6 ">ค้อน,สายยาง,กระบอกอัด</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="hammer-1" name="hammer" value="มี" required><label for="hammer-1"> มี</label>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="hammer-2" name="hammer" value="ไม่มี"><label for="hammer-2"> ไม่มี</label>
										</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 col-sm-6 col-xs-6 ">ถังจาระบี,กุญแจล็อค</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="key_lock-1" name="key_lock" value="มี" required><label for="key_lock-1"> มี</label>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="key_lock-2" name="key_lock" value="ไม่มี"><label for="key_lock-2"> ไม่มี</label>
										</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสีหัวเก๋งและตัวถังรถ</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="body-1" name="body" value="ดี"><label for="body-1"> ดี</label>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input type="radio" id="body-2" name="body" value="ไม่ดี"><label for="body-2"> ไม่ดี</label>
										</div>
										</div>
						</div>
				<div class="col-md-2">

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

<?php else: ?>
	<?php
	$datas=\App\Models\Machine\MachineCondition::leftJoin('ck_Master_Machine','ck_Master_Machine_MachineCondition.machine_id','=','ck_Master_Machine.id')
	->leftJoin('ck_Staff','ck_Master_Machine_MachineCondition.technician_id','=','ck_Staff.id')
	->select('ck_Master_Machine_MachineCondition.*','MachineName','StaffPrefix','StaffFirstName','StaffLastName')
	->where('ck_Master_Machine_MachineCondition.code',$code_no )
	->where('ck_Master_Machine_MachineCondition.machine_id',$id )
	->first();
	$staff=\App\Models\Machine\MachineCondition::leftJoin('ck_Staff','ck_Master_Machine_MachineCondition.created_by','=','ck_Staff.id')
	->where('ck_Master_Machine_MachineCondition.code',$code_no)
	->where('ck_Master_Machine_MachineCondition.machine_id',$id )
	->select('StaffPrefix','StaffFirstName','StaffLastName')
	->first();
	?>
	<div class="row" style="padding: 0px 2px 0 0;" id="check_approve">
		<input type="hidden" name="prepare_id" value="<?php echo e($prepare_id); ?>">
		<div class="panel-body form-horizontal">

	<div class="form-group">
	<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">วันที่</label></div>
	<div class="col-md-2 col-sm-7 col-xs-8" >
		<input class="form-control" type="text" name="date" value="<?php echo e(DateThai($datas->created_at)); ?>" readonly>
		<input type="hidden" name="real_date" value="<?php echo e($datas->created_at); ?>">
		</div>
		<div class="tablet1">
		<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อผู้ตรวจสอบ</label></div>
		<div class="col-md-2 col-sm-7 col-xs-8" >
			<input class="form-control" type="text" name="create_by" value="<?php echo e($staff->StaffPrefix); ?> <?php echo e($staff->StaffFirstName); ?> <?php echo e($staff->StaffLastName); ?>" readonly>
			</div>
			</div>
			<div class="tablet2">
				<div class=" col-md-2 col-sm-5 col-xs-4 text-right check " ><label class="control-label">เลขที่</label></div>
				<div class="col-md-2 col-sm-7 col-xs-8" >
					<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
					</div>
			</div>

				
					

<!-- Modal -->

					
					<div class="desktop tablet3">

						<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเครื่องจักร</label></div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input class="form-control" type="hidden" name="machine" id="machine" value="<?php echo e($id); ?>" readonly required>
							<input class="form-control" type="text" name="" id="" value="<?php echo e($machine_name->MachineName); ?>" readonly required>
							
						</div>

						</div>
						<div class="desktop">
							<div class="tablet4">
							<div class="col-md-2 col-sm-5 col-xs-4 text-right" >
							<label class="control-label check">มิเตอร์ชั่วโมง</label>
						</div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input class="form-control" type="text" name="hour" id="mitor" value="<?php echo e($machine_name->MachineHourMeter); ?>" onkeypress="return check_number(this);"required>
							</div>
							</div>
						</div>
						<div class="desktop">
							<div class="tablet5">
							<div class=" col-md-2 col-sm-5 col-xs-4 check text-right control-label" ><label>ช่างผู้ตรวจสอบ</label></div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input class="form-control" type="text" name="" id="" value="<?php echo e($datas->StaffPrefix); ?> <?php echo e($datas->StaffFirstName); ?> <?php echo e($datas->StaffLastName); ?>" readonly>

							
						</div>
						</div>
					</div>
						<div class="status status-tab tablet6">
							<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเรือใหญ่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="" id="" value="<?php echo e($boat_name); ?>" readonly>
									<input class="form-control" type="hidden" name="bigboat" id="bigboat" value="<?php echo e($boat_id); ?>" readonly>
									
							</div>
						</div>
						<div class="status status-tab tablet7">
							<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">เลขที่ใบแจ้งงาน</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input type="text" class="form-control" id="job_number" name="job_number" value="<?php echo e($work_number); ?>" readonly>
									
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
<?php if($InspectionType=='B'): ?>
	<input type="checkbox" id="check_1" name="check[]" value="before" checked> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
	<input type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>

<?php elseif($InspectionType=='A'): ?>
	<input type="checkbox" id="check_1" name="check[]" value="before" > <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
	<input type="checkbox" id="check_2" name="check[]" value="after" checked> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>

<?php endif; ?>

</div>
</div>
<div class="col-md-2">

</div>
<div class="col-md-8">

	<div class="form-group">
		<label class="col-md-12"><h4><u>ระบบเครื่องยนต์</u></h4></label>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6">ระดับน้ำมันเครื่อง</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" name="oil" id="oli_1" value="ปกติ"required
			<?php echo e($datas->oil == "ปกติ" ? "checked" : ""); ?>><label for="oli_1">ปกติ</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" name="oil" id="oli_2" value="ขาด"
			<?php echo e($datas->oil == "ขาด" ? "checked" : ""); ?>><label for="oli_2">ขาด</label>
		</div>
		</div>
		<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">น้ำมันเครื่องรั่วซึม</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" name="oil_leak" id="oil_leak-1" value="มี"required
			<?php echo e($datas->oil_leak == "มี" ? "checked" : ""); ?>><label for="oil_leak-1">มี</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" name="oil_leak" id="oil_leak-2" value="ไม่มี"
			<?php echo e($datas->oil_leak == "ไม่มี" ? "checked" : ""); ?>><label for="oil_leak-2">ไม่มี</label>
		</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพกรองอากาศ</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" name="filter" id="filter-1" value="ดี"required
			<?php echo e($datas->filter == "ดี" ? "checked" : ""); ?>><label for="filter-1">ดี</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" name="filter" id="filter-2" value="ไม่ดี"
			<?php echo e($datas->filter == "ไม่ดี" ? "checked" : ""); ?>><label for="filter-2">ไม่ดี</label>
		</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพท่ออากาศ</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="pipe-1" name="pipe" value="ดี"required
			<?php echo e($datas->pipe == "ดี" ? "checked" : ""); ?>><label for="pipe-1">ดี</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="pipe-2" name="pipe" value="ไม่ดี"
			<?php echo e($datas->pipe == "ไม่ดี" ? "checked" : ""); ?>> <label for="pipe-2">ไม่ดี</label>
		</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ควายยากง่ายในการสตาร์ท</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="start-1" name="start" value="ง่าย"required
			<?php echo e($datas->start == "ง่าย" ? "checked" : ""); ?>> <label for="start-1">ง่าย</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="start-2" name="start" value="ยาก"
			<?php echo e($datas->start == "ยาก" ? "checked" : ""); ?>> <label for="start-2">ยาก</label>
		</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เสียงผิดปกติของเครื่องยนต์</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="noise-1" name="noise" value="มี"required
			<?php echo e($datas->noise == "มี" ? "checked" : ""); ?>> <label for="noise-1">มี</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="noise-2" name="noise" value="ไม่มี"
			<?php echo e($datas->noise == "ไม่มี" ? "checked" : ""); ?>> <label for="noise-2">ไม่มี</label>
		</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6">สีควันไอเสีย</label>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<select class="form-control" name="smoke" id="machine"required style="width:70%">
				<option value="ขาว" <?php echo e($datas->smoke == "ขาว" ? "selected" : ""); ?>>ขาว</option>
				<option value="เทา" <?php echo e($datas->smoke == "เทา" ? "selected" : ""); ?>>เทา</option>
				<option value="ดำ" <?php echo e($datas->smoke == "ดำ" ? "selected" : ""); ?>>ดำ</option>
			</select>
		</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">หม้อพักไอเสีย</label>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="exhaust-1" name="exhaust" value="ดี"required
			<?php echo e($datas->exhaust == "ดี" ? "checked" : ""); ?>><label for="exhaust-1"> ดี</label>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="radio" id="exhaust-2" name="exhaust" value="ไม่ดี"
			<?php echo e($datas->exhaust == "ไม่ดี" ? "checked" : ""); ?>><label for="exhaust-2"> ไม่ดี</label>
		</div>
		</div>
		<div class="form-group">
			<label class="col-md-12"><h4> <u>ระบบระบายความร้อน</u></h4></label>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำในหม้อน้ำและหม้อพัก</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="water_level-1" name="water_level" value="ปกติ"required
				<?php echo e($datas->water_level == "ปกติ" ? "checked" : ""); ?>><label for="water_level-1"> ปกติ</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="water_level-2" name="water_level" value="ขาด"
				<?php echo e($datas->water_level == "ขาด" ? "checked" : ""); ?>><label for="water_level-2"> ขาด</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">น้ำยาหล่อเย็น</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="cooling-1" name="cooling" value="มี"required
				<?php echo e($datas->cooling == "มี" ? "checked" : ""); ?>><label for="cooling-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="cooling-2" name="cooling" value="ไม่มี"
				<?php echo e($datas->cooling == "ไม่มี" ? "checked" : ""); ?>><label for="cooling-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพท่อยางหม้อน้ำ</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="boiler_pipe-1" name="boiler_pipe" value="ดี"required
				<?php echo e($datas->boiler_pipe == "ดี" ? "checked" : ""); ?>><label for="boiler_pipe-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="boiler_pipe-2" name="boiler_pipe" value="ไม่ดี"
				<?php echo e($datas->boiler_pipe == "ไม่ดี" ? "checked" : ""); ?>><label for="boiler_pipe-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพฝาปิดหม้อน้ำ</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="boiler_lid-1" name="boiler_lid" value="ดี"required
				<?php echo e($datas->boiler_lid == "ดี" ? "checked" : ""); ?>><label for="boiler_lid-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="boiler_lid-2" name="boiler_lid" value="ไม่ดี"
				<?php echo e($datas->boiler_lid == "ไม่ดี" ? "checked" : ""); ?>> <label for="boiler_lid-2">ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพหม้อน้ำ</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="boiler_condition-1" name="boiler_condition" value="ดี"required
				<?php echo e($datas->boiler_condition == "ดี" ? "checked" : ""); ?>> <label for="boiler_condition-1">ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="boiler_condition-2" name="boiler_condition" value="ไม่ดี"
				<?php echo e($datas->boiler_condition == "ไม่ดี" ? "checked" : ""); ?>><label for="boiler_condition-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
			<label class="col-md-12"><h4><u>ระบบไฮดรอลิกส์</u></h4></label>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันไฮดรอลิกส์</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_level-1" name="hydro_level" value="ปกติ"required
				<?php echo e($datas->hydro_level == "ปกติ" ? "checked" : ""); ?>><label for="hydro_level-1"> ปกติ</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_level-2" name="hydro_level" value="ขาด"
				<?php echo e($datas->hydro_level == "ขาด" ? "checked" : ""); ?>><label for="hydro_level-2"> ขาด</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายและท่อไฮดรอลิกส์</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_pipe-1" name="hydro_pipe" value="ดี"required
				<?php echo e($datas->hydro_pipe == "ดี" ? "checked" : ""); ?>><label for="hydro_pipe-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_pipe-2" name="hydro_pipe" value="ไม่ดี"
				<?php echo e($datas->hydro_pipe == "ไม่ดี" ? "checked" : ""); ?>><label for="hydro_pipe-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั๊มไฮดรอลิกส์</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_leak-1" name="hydro_leak" value="มี"required
				<?php echo e($datas->hydro_leak == "มี" ? "checked" : ""); ?>><label for="hydro_leak-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_leak-2" name="hydro_leak" value="ไม่มี"
				<?php echo e($datas->hydro_leak == "ไม่มี" ? "checked" : ""); ?>> <label for="hydro_leak-2">ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั้มเซอร์โว</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_servo-1" name="hydro_servo" value="มี"required
				<?php echo e($datas->hydro_servo == "มี" ? "checked" : ""); ?>><label for="hydro_servo-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_servo-2" name="hydro_servo" value="ไม่มี"
				<?php echo e($datas->hydro_servo == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_servo-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่คอลโทรลวาล์ว</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_control-1" name="hydro_control" value="มี"required
				<?php echo e($datas->hydro_control == "มี" ? "checked" : ""); ?>><label for="hydro_control-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_control-2" name="hydro_control" value="ไม่มี"
				<?php echo e($datas->hydro_control == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_control-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ชุดสวิงมอเตอร์</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_swingmotor-1" name="hydro_swingmotor" value="มี"required
				<?php echo e($datas->hydro_swingmotor == "มี" ? "checked" : ""); ?>><label for="hydro_swingmotor-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_swingmotor-2" name="hydro_swingmotor" value="ไม่มี"
				<?php echo e($datas->hydro_swingmotor == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_swingmotor-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่ปั๊มหัวใจ (รถแบ็คโฮ)</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="heart_backhole-1" name="heart_backhole" value="มี" required
				<?php echo e($datas->heart_backhole == "มี" ? "checked" : ""); ?>><label for="heart_backhole-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="heart_backhole-2" name="heart_backhole" value="ไม่มี"
				<?php echo e($datas->heart_backhole == "ไม่มี" ? "checked" : ""); ?>> <label for="heart_backhole-2">ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่มอเตอร์ตัวเดิน</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_motor-1" name="hydro_motor" value="มี" required
				<?php echo e($datas->hydro_motor == "มี" ? "checked" : ""); ?>><label for="hydro_motor-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_motor-2" name="hydro_motor" value="ไม่มี"
				<?php echo e($datas->hydro_motor == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_motor-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วไหลของน้ำมันที่คอลโทรลมือ</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_hand_control-1" name="hydro_hand_control" value="มี" required
				<?php echo e($datas->hydro_hand_control == "มี" ? "checked" : ""); ?>><label for="hydro_hand_control-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_hand_control-2" name="hydro_hand_control" value="ไม่มี"
				<?php echo e($datas->hydro_hand_control == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_hand_control-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบคอลโทรลมือ</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hand_control-1" name="hand_control" value="เบา" required
				<?php echo e($datas->hand_control == "เบา" ? "checked" : ""); ?>><label for="hand_control-1"> เบา</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hand_control-2" name="hand_control" value="หนัก"
				<?php echo e($datas->hand_control == "หนัก" ? "checked" : ""); ?>><label for="hand_control-2"> หนัก</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">เสียงปั้มไฮดรอลิกส์</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_noise-1" name="hydro_noise" value="มี" required
				<?php echo e($datas->hydro_noise == "มี" ? "checked" : ""); ?>><label for="hydro_noise-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_noise-2" name="hydro_noise" value="ไม่มี"
				<?php echo e($datas->hydro_noise == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_noise-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพออยไฮดรอลิกส์</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_physical-1" name="hydro_physical" value="ดี" required
				<?php echo e($datas->hydro_physical == "ดี" ? "checked" : ""); ?>><label for="hydro_physical-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_physical-2" name="hydro_physical" value="ไม่ดี"
				<?php echo e($datas->hydro_physical == "ไม่ดี" ? "checked" : ""); ?>><label for="hydro_physical-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกยกบูม</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_boom-1" name="hydro_boom" value="ดี" required
				<?php echo e($datas->hydro_boom == "ดี" ? "checked" : ""); ?>><label for="hydro_boom-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_boom-2" name="hydro_boom" value="ไม่ดี"
				<?php echo e($datas->hydro_boom == "ไม่ดี" ? "checked" : ""); ?>><label for="hydro_boom-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกอาร์ม</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_arm-1" name="hydro_arm" value="ดี" required
				<?php echo e($datas->hydro_arm == "ดี" ? "checked" : ""); ?>><label for="hydro_arm-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_arm-2" name="hydro_arm" value="ไม่ดี"
				<?php echo e($datas->hydro_arm == "ไม่ดี" ? "checked" : ""); ?>><label for="hydro_arm-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกบุ้งกี้</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_bung-1" name="hydro_bung" value="ดี" required
				<?php echo e($datas->hydro_bung == "ดี" ? "checked" : ""); ?>><label for="hydro_bung-1"> ดี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_bung-2" name="hydro_bung" value="ไม่ดี"
				<?php echo e($datas->hydro_bung == "ไม่ดี" ? "checked" : ""); ?>><label for="hydro_bung-2"> ไม่ดี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">การอัดจาระบีจุดหมุนทุกจุด</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_grease-1" name="hydro_grease" value="มี" required
				<?php echo e($datas->hydro_grease == "มี" ? "checked" : ""); ?>><label for="hydro_grease-1"> มี</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_grease-2" name="hydro_grease" value="ไม่มี"
				<?php echo e($datas->hydro_grease == "ไม่มี" ? "checked" : ""); ?>><label for="hydro_grease-2"> ไม่มี</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">นิปเปิลอัดจาระบี</label>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_nipple-1" name="hydro_nipple" value="ปกติ" required
				<?php echo e($datas->hydro_nipple == "ปกติ" ? "checked" : ""); ?>><label for="hydro_nipple-1"> ปกติ</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<input type="radio" id="hydro_nipple-2" name="hydro_nipple" value="ชำรุด"
				<?php echo e($datas->hydro_nipple == "ชำรุด" ? "checked" : ""); ?>><label for="hydro_nipple-2"> ชำรุด</label>
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-12"><h4><u>ระบบไฟฟ้า</u></h4></label>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">หน้าจอมอนิเตอร์</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="monitor-1" name="monitor" value="ดี" required
					<?php echo e($datas->monitor == "ดี" ? "checked" : ""); ?>><label for="monitor-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="monitor-2" name="monitor" value="ไม่ดี"
					<?php echo e($datas->monitor == "ไม่ดี" ? "checked" : ""); ?>><label for="monitor-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">เกจความร้อน</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="heat_gauge-1" name="heat_gauge" value="ดี" required
					<?php echo e($datas->heat_gauge == "ดี" ? "checked" : ""); ?>><label for="heat_gauge-1">ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="heat_gauge-2" name="heat_gauge" value="ไม่ดี"
					<?php echo e($datas->heat_gauge == "ไม่ดี" ? "checked" : ""); ?>><label for="heat_gauge-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดระดับน้ำมันโซล่า</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="sola_gauge-1" name="sola_gauge" value="ดี" required
					<?php echo e($datas->sola_gauge == "ดี" ? "checked" : ""); ?>><label for="sola_gauge-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="sola_gauge-2" name="sola_gauge" value="ไม่ดี"
					<?php echo e($datas->sola_gauge == "ไม่ดี" ? "checked" : ""); ?>><label for="sola_gauge-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">เกจ์ไฟชาร์ท</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="charge_gauge-1" name="charge_gauge" value="ดี" required
					<?php echo e($datas->charge_gauge == "ดี" ? "checked" : ""); ?>><label for="charge_gauge-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="charge_gauge-2" name="charge_gauge" value="ไม่ดี"
					<?php echo e($datas->charge_gauge == "ไม่ดี" ? "checked" : ""); ?>><label for="charge_gauge-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">มิเตอร์ชั่วโมง</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="hour_mitor-1" name="hour_mitor" value="ดี" required
					<?php echo e($datas->hour_mitor == "ดี" ? "checked" : ""); ?>><label for="hour_mitor-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="hour_mitor-2" name="hour_mitor" value="ไม่ดี"
					<?php echo e($datas->hour_mitor == "ไม่ดี" ? "checked" : ""); ?>><label for="hour_mitor-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายไฟตัวรถ</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="wire-1" name="wire" value="ดี" required
					<?php echo e($datas->wire == "ดี" ? "checked" : ""); ?>><label for="wire-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="wire-2" name="wire" value="ไม่ดี"
					<?php echo e($datas->wire == "ไม่ดี" ? "checked" : ""); ?>><label for="wire-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพแบตเตอรี่</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="battery-1" name="battery" value="ดี" required
					<?php echo e($datas->battery == "ดี" ? "checked" : ""); ?>><label for="battery-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="battery-2" name="battery" value="ไม่ดี"
					<?php echo e($datas->battery == "ไม่ดี" ? "checked" : ""); ?>><label for="battery-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
				<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำกลั่นในแบตเตอรี่</label>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="distilled_water-1" name="distilled_water" value="ดี" required
					<?php echo e($datas->distilled_water == "ดี" ? "checked" : ""); ?>><label for="distilled_water-1"> ดี</label>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<input type="radio" id="distilled_water-2" name="distilled_water" value="ไม่ดี"
					<?php echo e($datas->distilled_water == "ไม่ดี" ? "checked" : ""); ?>><label for="distilled_water-2"> ไม่ดี</label>
				</div>
				</div>
				<div class="form-group">
					<label class="col-md-12"><h4><u>ระบบช่วงล่าง/ระบบโครงสร้าง</u></h4></label>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ข้อโซ่, โรลเลอร์,แคเรีย</label>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="chain-1" name="chain" value="ดี" required
						<?php echo e($datas->chain == "ดี" ? "checked" : ""); ?>><label for="chain-1"> ดี</label>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="chain-2" name="chain" value="ไม่ดี"
						<?php echo e($datas->chain == "ไม่ดี" ? "checked" : ""); ?>><label for="chain-2"> ไม่ดี</label>
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">บูชข้อโว,ล้อนำ,สป๊อกเก็ต</label>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="spokket-1" name="spokket" value="ดี" required
						<?php echo e($datas->spokket == "ดี" ? "checked" : ""); ?>><label for="spokket-1"> ดี</label>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="spokket-2" name="spokket" value="ไม่ดี"
						<?php echo e($datas->spokket == "ไม่ดี" ? "checked" : ""); ?>><label for="spokket-2"> ไม่ดี</label>
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กระทะล้อ,ยาง,น๊อตล้อ</label>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="tire-1" name="tire" value="ดี" required
						<?php echo e($datas->tire == "ดี" ? "checked" : ""); ?>><label for="tire-1"> ดี</label>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="tire-2" name="tire" value="ไม่ดี"
						<?php echo e($datas->tire == "ไม่ดี" ? "checked" : ""); ?>><label for="tire-2"> ไม่ดี</label>
					</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ค้อน,สายยาง,กระบอกอัด</label>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="hammer-1" name="hammer" value="มี" required
						<?php echo e($datas->hammer == "มี" ? "checked" : ""); ?>><label for="hammer-1"> มี</label>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="hammer-2" name="hammer" value="ไม่มี"
						<?php echo e($datas->hammer == "ไม่มี" ? "checked" : ""); ?>><label for="hammer-2"> ไม่มี</label>
					</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ถังจาระบี,กุญแจล็อค</label>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="key_lock-1" name="key_lock" value="มี" required
						<?php echo e($datas->key_lock == "มี" ? "checked" : ""); ?>><label for="key_lock-1"> มี</label>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="key_lock-2" name="key_lock" value="ไม่มี"
						<?php echo e($datas->key_lock == "ไม่มี" ? "checked" : ""); ?>><label for="key_lock-2"> ไม่มี</label>
					</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสีหัวเก๋งและตัวถังรถ</label>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="body-1" name="body" value="ดี" required
						<?php echo e($datas->body == "ดี" ? "checked" : ""); ?>><label for="body-1"> ดี</label>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<input type="radio" id="body-2" name="body" value="ไม่ดี"
						<?php echo e($datas->body == "ไม่ดี" ? "checked" : ""); ?>><label for="body-2"> ไม่ดี</label>
					</div>
					</div>
	</div>

		<div class="form-group">
		<div class="col-md-12 text-center">
				<a href="<?php echo e(url('fts/machine/approve/'.$datas->code.'/'.$id)); ?>" class="btn btn-success" >อนุมัติ</a>
				<a href="<?php echo e(url('fts/machine/notapprove/'.$datas->code.'/'.$id)); ?>" class="btn btn-danger"  >ไม่อนุมัติ</a>

		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12 text-center">
				<a href="<?php echo e(url('fts/machine/machinecondition/report/'.$datas->id)); ?>" class="btn btn-info" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> รายงาน</a>
				</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#check_approve").find("input,radio,checkbox,select,textarea").attr("disabled", "disabled");
</script>
<?php endif; ?>

					
				</div>
			</div>


		</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style media="screen">
.select2-offscreen,
.select2-offscreen:focus {
  // Keep original element in the same spot
  // So that HTML5 valiation message appear in the correct position
  left: auto !important;
  top: auto !important;
}
.col-md-6{
	font-size:17px;
}
.col-md-3{
	font-size:17px;
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
 .tablet1{
		margin-top: 4rem;
	}
	.tablet2{
		 margin-top: 8rem;
	 }
	 .tablet3{
		 margin-top: 12rem;
	 }
	 .tablet4{
		 margin-top: 16rem;
	 }
	 .tablet5{
		 margin-top: 20rem;
	 }
	 .tablet6{
		 margin-top: 24rem;
	 }
	 .tablet7{
		 margin-top: 28rem;
	 }
	 .col-md-6{
 		font-size:14px;
 	}
 	.col-md-3{
 		font-size:14px;
 	}
	.check{
		/*white-space: nowrap;*/
		font-size:14px;
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
		// $(document).ready(function() {
	$('#technician').select2({
		placeholder: "เลือกช่างผู้ตรวจสอบ"
	});
	// $('#machine').select2({
	// 	placeholder: "เลือกชื่อเครื่องจักร"
	// });
  //
	// });
	// $('#job_number').select2({
	// 	placeholder: "เลือกใบงาน"
	// });
	// $('#bigboat').select2({
	// 	placeholder: "เลือกเรือใหญ่"
	// });
	var temp=$('#mitor').val();
function check_before() {
	if(!(document.getElementById('check_1').checked || document.getElementById('check_2').checked)){
		alert('กรุณากรอกข้อมูลให้ครบ');
		document.getElementById('check_1').focus();
		return false;
	}
	if(document.getElementById('mitor').value<temp && document.getElementById('check_1').checked){
		alert('การตรวจเช็คก่อนปฏิบัติงาน มิเตอร์ชั่วโมงไม่สามารถน้อยกว่าค่าเดิมได้');
		document.getElementById('mitor').focus();
		return false;
	}
	if(document.getElementById('mitor').value<=temp && document.getElementById('check_2').checked){
		alert('การตรวจเช็คหลังปฏิบัติงาน มิเตอร์ชั่วโมงต้องมากกว่าค่าเดิม');
		document.getElementById('mitor').focus();
		return false;
	}
	if ( $("#technician option:selected").val() === "" ) {
		alert('กรุณาเลือกช่างผู้ตรวจสอบ');
		return false;
   }

}
// $("#machine").change(function(){
// 	$.ajax({
// 		url: "",
// 		type: "POST",
// 		data:{id : $("#machine").val()},
// 		dataType: "html",
// 		success: function(response) {
// 			$("#mitor").val(response);
// 			temp=response;
// 	}
// 	});
// });
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>