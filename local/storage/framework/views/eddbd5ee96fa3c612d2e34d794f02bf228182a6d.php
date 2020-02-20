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
	// $char=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
	// ,'W','X','Y','Z');
	// $noReport=$char[rand(0,25)].substr(microtime(),2,5);
	$boat= App\Models\Master\SMD\Boat::all();
	?>
	<?php
	$stock = App\Models\Machine\Grab::orderBy('created_at','desc')->first();
	$code='Gr'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
	if(count($stock)<1 ){
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
	$id=Session::get('id');
	$job_number=Session::get('MachineNumber');
	$grab=\App\Models\Master\Machine::Join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Master_Machine.DepartmentID')->select('ck_Master_Machine.id', 'DepartmentName', 'MachineType', 'MachineName', 'MachineNunber', 'MachineUsage', 'MachineStatus', 'ck_Master_Machine.deleted_at')
				->where('ck_Master_Machine.DivisionID', '6')
				->where('ck_Master_Machine.id',$id)
					 ->first();
					 dd($id);
	?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="<?php echo e(action('FTS\MachineController@inspection')); ?>">ตรวจเช็คเครื่องจักร</a></li>
				<li class="active">การตรวจเช็ค GRAB</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">การตรวจเช็ค GRAB</h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">การตรวจเช็ค GRAB</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<form class="" action="<?php echo e(url('machine/Grab')); ?>" method="post" onsubmit="return check_before()">
							<?php echo e(csrf_field()); ?>

							<?php
								$machine= \App\Models\Master\Machine::where('MachineType','Grab')->get();
								$Buoy= \App\Models\Master\FTS\Buoy::all();
							?>
							<div class="panel-body form-horizontal">
							<div class="form-group">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">วันที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly >
									</div>
									<div class="tablet1">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ผู้ตรวจสอบ</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="" value="<?php echo e(Auth::user()->StaffPrefix); ?> <?php echo e(Auth::user()->StaffFirstName); ?> <?php echo e(Auth::user()->StaffLastName); ?>" readonly>
									</div>
									</div>

							
								<div class="tablet2">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head " ><label class="control-label">เลขที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="No_report" value="<?php echo e($code); ?>" readonly>
									</div>
									</div>
									<div class="desktop">
									<div class="tablet3">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ชื่อเรือทุ่น</label></div>
								<div class="col-md-2 col-sm-7 col-xs-5" >
									<input class="form-control" type="text" name="No_report" value="" readonly>
									</div>
									</div>
								</div>
									
										

										
										<div class="desktop tabletEx">
										<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเรือใหญ่</label></div>
											<div class="col-md-2 col-sm-7 col-xs-8" >
												<select class="form-control" name="bigboat" id="bigboat" style="width:100%">
													<option value=""></option>
													<?php $__currentLoopData = $boat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($element->id); ?>"><?php echo e($element->BoatName); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
										</div>
									</div>
										<div class="desktop">
										<div class="tablet4">
										<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ประเภท</label></div>
										<div class="col-md-2 col-sm-7 col-xs-8" >
											<select class="form-control" name="type" require>
												<option value="รีโมท">รีโมท</option>
												<option value="กระตุก">กระตุก</option>
												<option value="4rope">4rope</option>

											</select>

											</div>
										</div>
									</div>
									<div class="desktop2">
											<div class="tablet5">
												<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label head">หมายเลข GRAB</label></div>
												<div class="col-md-2 col-sm-7 col-xs-8" >
													<select class="multiple form-control" name="Grab_id" style="width:100%" required>
														<option value=""></option>
														<?php $__currentLoopData = $machine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($data->id); ?>"><?php echo e($data->MachineName); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
													</div>
													</div>
													</div>
													<div class="desktop2">
													<div class="tablet6">
												<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ขนาด</label></div>
												<div class="col-md-2 col-sm-7 col-xs-8" >
													<div class="input-group">
                <input type="text" class="form-control" id="weight" name="weight" onkeypress="return check_number(this);">
                <span class="input-group-addon">ตัน</span>
              				</div>
											</div>
										</div>
										</div>
										<div class="desktop2">
										<div class="tablet7">
											<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">เลขที่ใบแจ้งงาน</label></div>
											<div class="col-md-2 col-sm-7 col-xs-8" >
												<input class="form-control" type="text" name="work_no" value="" readonly>
											</div>
									</div>
									</div>
</div>
									</div>
													</div>
</div>


			<div class="panel-body form-horizontal">
				<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
				<div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center check" ><label class="control-label">การตรวจเช็ค</label>

					<input class="check" id="check_1" type="checkbox" name="check[]" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
					<input class="check" id="check_2" type="checkbox" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
				</div>
			</div>
				<div class="col-md-6">
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 "> ห่วงเหล็กสำหรับติดตะขอเครน ซ้าย/ขวา</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook-1" name="crane_hook" value="N" required ><span class="radio_check"></span> <label for="crane_hook-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook-2" name="crane_hook" value="AB"><span class="radio_check"></span> <label for="crane_hook-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook-3" name="crane_hook" value="I/F"><span class="radio_check"></span> <label for="crane_hook-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="crane_hook-4" name="crane_hook" value="R"><span class="radio_check"></span> <label for="crane_hook-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="crane_hook-5" name="crane_hook" value="C"><span class="radio_check"></span> <label for="crane_hook-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">สเก็นและสลักล๊อคปลิ้น ซ้าย/ขวา</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="skirt-1" name="skirt" value="N" required><span class="radio_check"></span> <label for="skirt-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="skirt-2" name="skirt" value="AB"><span class="radio_check"></span> <label for="skirt-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="skirt-3" name="skirt" value="I/F"><span class="radio_check"></span> <label for="skirt-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="skirt-4" name="skirt" value="R"><span class="radio_check"></span> <label for="skirt-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="skirt-5" name="skirt" value="C"><span class="radio_check"></span> <label for="skirt-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ลวดสลิงและไจ ลวดสลิง ซ้าย/ขวา </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling-1" name="sling" value="N" required><span class="radio_check"></span> <label for="sling-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling-2" name="sling" value="AB"><span class="radio_check"></span> <label for="sling-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling-3" name="sling" value="I/F"> <span class="radio_check"></span><label for="sling-3">I/F</label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="sling-4" name="sling" value="R"><span class="radio_check"></span> <label for="sling-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="sling-5" name="sling" value="C"><span class="radio_check"></span> <label for="sling-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกไฮโดลิคโช้ค ซ้าย/ขวา </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock-1" name="hydrolic_shock" value="N" required><span class="radio_check"></span> <label for="hydrolic_shock-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock-2" name="hydrolic_shock" value="AB"><span class="radio_check"></span> <label for="hydrolic_shock-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock-3" name="hydrolic_shock" value="I/F"><span class="radio_check"></span> <label for="hydrolic_shock-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock-4" name="hydrolic_shock" value="R"><span class="radio_check"></span> <label for="hydrolic_shock-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="hydrolic_shock-5" name="hydrolic_shock" value="C"><span class="radio_check"></span> <label for="hydrolic_shock-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">กระบอกไฮโดลิคโช้ค กลาง </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock_mid-1" name="hydrolic_shock_mid" value="N" required><span class="radio_check"></span> <label for="hydrolic_shock_mid-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock_mid-2" name="hydrolic_shock_mid" value="AB"><span class="radio_check"></span> <label for="hydrolic_shock_mid-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock_mid-3" name="hydrolic_shock_mid" value="I/F"><span class="radio_check"></span> <label for="hydrolic_shock_mid-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="hydrolic_shock_mid-4" name="hydrolic_shock_mid" value="R"><span class="radio_check"></span> <label for="hydrolic_shock_mid-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="hydrolic_shock_mid-5" name="hydrolic_shock_mid" value="C"><span class="radio_check"></span> <label for="hydrolic_shock_mid-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดวาล์วคอนโทรลไฮโดรลิค </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="valve_hydraulic-1" name="valve_hydraulic" value="N" required><span class="radio_check"></span> <label for="valve_hydraulic-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="valve_hydraulic-2" name="valve_hydraulic" value="AB"><span class="radio_check"></span> <label for="valve_hydraulic-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="valve_hydraulic-3" name="valve_hydraulic" value="I/F"><span class="radio_check"></span> <label for="valve_hydraulic-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="valve_hydraulic-4" name="valve_hydraulic" value="R"><span class="radio_check"></span> <label for="valve_hydraulic-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="valve_hydraulic-5" name="valve_hydraulic" value="C"><span class="radio_check"></span> <label for="valve_hydraulic-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ลูกกลิ้งชุดบล็อคพลูเล่ </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pule-1" name="pule" value="N" required><span class="radio_check"></span> <label for="pule-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pule-2" name="pule" value="AB"><span class="radio_check"></span> <label for="pule-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pule-3" name="pule" value="I/F"><span class="radio_check"></span> <label for="pule-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="pule-4" name="pule" value="R"><span class="radio_check"></span> <label for="pule-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="pule-5" name="pule" value="C"><span class="radio_check"></span> <label for="pule-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">รอกทางผ่านสลิง ซ้าย/ขวา </label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="reel_hook-1" name="reel_hook" value="N" required><span class="radio_check"></span> <label for="reel_hook-1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="reel_hook-2" name="reel_hook" value="AB"><span class="radio_check"></span> <label for="reel_hook-2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="reel_hook-3" name="reel_hook" value="I/F"><span class="radio_check"></span> <label for="reel_hook-3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="reel_hook-4" name="reel_hook" value="R"><span class="radio_check"></span> <label for="reel_hook-4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="reel_hook-5" name="reel_hook" value="C"><span class="radio_check"></span> <label for="reel_hook-5"> C </label>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบแนวเชื่อมตามจุดต่างๆ</label>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_connect_1" name="check_connect" value="N" required><span class="radio_check"></span> <label for="check_connect_1"> N </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_connect_2" name="check_connect" value="AB"><span class="radio_check"></span> <label for="check_connect_2"> AB </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_connect_3" name="check_connect" value="I/F"><span class="radio_check"></span> <label for="check_connect_3"> I/F </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<input type="radio" id="check_connect_4" name="check_connect" value="R"><span class="radio_check"></span> <label for="check_connect_4"> R </label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="radio" id="check_connect_5" name="check_connect" value="C"><span class="radio_check"></span> <label for="check_connect_5"> C </label>
							</div>
						</div>

					</div>
					<div class="col-md-6">
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบพื้นพิวรอบตัวไม่ให้มีความคม</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_skin_1" name="check_skin" value="N" required><span class="radio_check"></span> <label for="check_skin_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_skin_2" name="check_skin" value="AB"><span class="radio_check"></span> <label for="check_skin_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_skin_3" name="check_skin" value="I/F"><span class="radio_check"></span> <label for="check_skin_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_skin_4" name="check_skin" value="R"><span class="radio_check"></span> <label for="check_skin_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_skin_5" name="check_skin" value="C"><span class="radio_check"></span> <label for="check_skin_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบการปิดสนิดของปาก</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="close_valve_1" name="close_valve" value="N" required><span class="radio_check"></span> <label for="close_valve_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="close_valve_2" name="close_valve" value="AB"><span class="radio_check"></span> <label for="close_valve_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="close_valve_3" name="close_valve" value="I/F"><span class="radio_check"></span> <label for="close_valve_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="close_valve_4" name="close_valve" value="R"><span class="radio_check"></span> <label for="close_valve_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="close_valve_5" name="close_valve" value="C"><span class="radio_check"></span> <label for="close_valve_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบชุดควบคุมไฟฟ้าและสายไฟ</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_wire_1" name="check_wire" value="N" required><span class="radio_check"></span> <label for="check_wire_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_wire_2" name="check_wire" value="AB"><span class="radio_check"></span> <label for="check_wire_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_wire_3" name="check_wire" value="I/F"><span class="radio_check"></span> <label for="check_wire_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_wire_4" name="check_wire" value="R"><span class="radio_check"></span> <label for="check_wire_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_wire_5" name="check_wire" value="C"><span class="radio_check"></span> <label for="check_wire_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบบูชและลูกปืนของจุดหมุนทุกจุด</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_boot_bullet_1" name="check_boot_bullet" value="N" required><span class="radio_check"></span> <label for="check_boot_bullet_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_boot_bullet_2" name="check_boot_bullet" value="AB"><span class="radio_check"></span> <label for="check_boot_bullet_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_boot_bullet_3" name="check_boot_bullet" value="I/F"><span class="radio_check"></span> <label for="check_boot_bullet_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_boot_bullet_4" name="check_boot_bullet" value="R"><span class="radio_check"></span> <label for="check_boot_bullet_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_boot_bullet_5" name="check_boot_bullet" value="C"><span class="radio_check"></span> <label for="check_boot_bullet_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบระยะห่างน๊อตกันกระแทกหัวแกร็บ</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_nut_1" name="check_nut" value="N" required><span class="radio_check"></span> <label for="check_nut_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_nut_2" name="check_nut" value="AB"><span class="radio_check"></span> <label for="check_nut_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_nut_3" name="check_nut" value="I/F"><span class="radio_check"></span> <label for="check_nut_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_nut_4" name="check_nut" value="R"><span class="radio_check"></span> <label for="check_nut_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_nut_5" name="check_nut" value="C"><span class="radio_check"></span> <label for="check_nut_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบน้ำมันไฮโดรลิคและไล่ลมในระบบล็อคปาก</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_hydraulic_1" name="check_hydraulic" value="N" required><span class="radio_check"></span> <label for="check_hydraulic_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_hydraulic_2" name="check_hydraulic" value="AB"><span class="radio_check"></span> <label for="check_hydraulic_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_hydraulic_3" name="check_hydraulic" value="I/F"><span class="radio_check"></span> <label for="check_hydraulic_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_hydraulic_4" name="check_hydraulic" value="R"><span class="radio_check"></span> <label for="check_hydraulic_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_hydraulic_5" name="check_hydraulic" value="C"> <span class="radio_check"></span><label for="check_hydraulic_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบแผ่นรองเขี้ยวแกร็บ ซ้าย/ขวา </label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_pad_1" name="check_pad" value="N" required><span class="radio_check"></span> <label for="check_pad_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_pad_2" name="check_pad" value="AB"><span class="radio_check"></span> <label for="check_pad_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_pad_3" name="check_pad" value="I/F"><span class="radio_check"></span> <label for="check_pad_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_pad_4" name="check_pad" value="R"><span class="radio_check"></span> <label for="check_pad_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_pad_5" name="check_pad" value="C"><span class="radio_check"></span> <label for="check_pad_5"> C </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">อัดและทาจาระบีตามจุดต่าง ๆ </label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_grease_1" name="check_grease" value="N" required><span class="radio_check"></span> <label for="check_grease_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_grease_2" name="check_grease" value="AB"><span class="radio_check"></span> <label for="check_grease_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_grease_3" name="check_grease" value="I/F"><span class="radio_check"></span> <label for="check_grease_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="check_grease_4" name="check_grease" value="R"><span class="radio_check"></span> <label for="check_grease_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="check_grease_5" name="check_grease" value="C"><span class="radio_check"></span> <label for="check_grease_5"> C </label>
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
								<label class="text-right check">C	=	Clean			ทำความสะอาด	</label>
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
    $('#technician').select2();
		$('#machine').select2({
			placeholder: "เลือกเรือทุ่น"
		});
		$('.multiple').select2({
		placeholder: "เลือกหมายเลข GRAB"
		});
		$('#bigboat').select2({
			placeholder: "เลือกเรือใหญ่"
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
.desktop2{
	margin-top: 10rem;
}
.radio_check{
	display: block;
}
@media (max-width: 1023px) {
	.tablet-status{
		margin-top: 10rem;
	}
	.control-label{
		text-align: left !important;
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
	margin-top: 20rem;
}
.tablet5{
	margin-top: 24rem;
}
.tablet6{
	margin-top: 28rem;
}
.tablet7{
	margin-top: 32rem;
}
.tabletEx{
	margin-top: 16rem;
}
.check{
	font-size:120% !important;
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
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>