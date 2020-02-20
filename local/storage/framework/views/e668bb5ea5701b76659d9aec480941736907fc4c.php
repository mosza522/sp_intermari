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
	<?php
	$stock = App\Models\Machine\Conveyor::orderBy('created_at','desc')->first();
	$code='CV'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
	?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="<?php echo e(url('machine/indexConveyor')); ?>">Home</a></li>
				<li class="active">ใบตรวจเช็ค กว้านและระบบลำเลียง</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบตรวจเช็ค กว้านและระบบลำเลียง</h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">ใบตรวจเช็ค กว้านและระบบลำเลียง</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<form class="" action="<?php echo e(url('machine/Conveyer')); ?>" method="post">
							<?php echo e(csrf_field()); ?>

							<?php
								$boat= App\Models\Master\SMD\Boat::all();
								$Buoy= \App\Models\Master\FTS\Buoy::all();
							?>
							<div class="panel-body form-horizontal">
							<div class="form-group">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label">วันที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
									</div>
									<div class="tablet1">
									<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label">ผู้ตรวจสอบ</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="" value="<?php echo e(Auth::user()->StaffPrefix); ?> <?php echo e(Auth::user()->StaffFirstName); ?> <?php echo e(Auth::user()->StaffLastName); ?>" readonly>
									</div>
									</div>

							
								<div class="tablet2">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label">เลขที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
									</div>
								</div>
									<div class="tablet3 ">
										<div class=" col-md-2 col-sm-5 col-xs-4 text-right desktop" ><label class="control-label">ชื่อเรือใหญ่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-5 desktop" >
									<input class="form-control" type="hidden" name="bigboat" value="<?php echo e($boat_id); ?>" readonly>
									<input class="form-control" type="text" name="" value="<?php echo e($boat_name); ?>" readonly>

									
								</div>
							</div>
									
								
										
										<div class="tablet4">
											<div class=" col-md-2 col-sm-5 col-xs-4 text-right desktop" ><label class="control-label">ชื่อเรือทุ่น</label></div>
														<div class="col-md-2 col-sm-7 col-xs-5 desktop" >
															<select class="form-control" name="boat" id="sm_ship" style="width:100%">
																<option value=""></option>
																<?php $__currentLoopData = $Buoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($element->id); ?>"><?php echo e($element->BuoyName); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
														</div>
														</div>
														<div class="tablet5">
															<div class=" col-md-2 col-sm-5 col-xs-4 text-right desktop" ><label class="control-label ">เลขที่ใบแจ้งงาน</label></div>
															<div class="col-md-2 col-sm-7 col-xs-8 desktop" >
															<input class="form-control" type="text" name="work_no" value="<?php echo e($work_number); ?>" readonly>
															</div>
														</div>
</div>

													</div>
													</div>
</div>


			<div class="panel-body form-horizontal">
				<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
				<div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center" ><label class="control-label">การตรวจเช็ค  </label>
					<?php if($InspectionType=='B'): ?>
					<input class="check" id="check_1" type="checkbox" name="check[]" value="before" checked> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
					<input class="check" id="check_2" type="checkbox" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
				<?php elseif($InspectionType=='A'): ?>
					<input class="check" id="check_1" type="checkbox" name="check[]" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
					<input class="check" id="check_2" type="checkbox" name="check[]" value="after" checked> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>

						<?php endif; ?>
				</div>
			</div>
			<div class="col-md-2">

			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คระบบกว้าน</h4></label>
				</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 "> กว้านหัวเรือ ซ้าย</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_L_1" name="winch_L" value="N" required><span class="radio_check"></span><label for="winch_L_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_L_2" name="winch_L" value="AB"><span class="radio_check"></span><label for="winch_L_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_L_3" name="winch_L" value="I/F"><span class="radio_check"></span><label for="winch_L_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_L_4" name="winch_L" value="R"><span class="radio_check"></span><label for="winch_L_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="winch_L_5" name="winch_L" value="C/O"><span class="radio_check"></span><label for="winch_L_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กลาง</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_C_1" name="winch_C" value="N" required><span class="radio_check"></span><label for="winch_C_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_C_2" name="winch_C" value="AB"><span class="radio_check"></span><label for="winch_C_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_C_3" name="winch_C" value="I/F"><span class="radio_check"></span><label for="winch_C_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_C_4" name="winch_C" value="R"><span class="radio_check"></span><label for="winch_C_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="winch_C_5" name="winch_C" value="C/O"><span class="radio_check"></span><label for="winch_C_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ขวา</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_R_1" name="winch_R" value="N" required><span class="radio_check"></span><label for="winch_R_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_R_2" name="winch_R" value="AB"><span class="radio_check"></span><label for="winch_R_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_R_3" name="winch_R" value="I/F"><span class="radio_check"></span><label for="winch_R_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_R_4" name="winch_R" value="R"><span class="radio_check"></span><label for="winch_R_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="winch_R_5" name="winch_R" value="C/O"><span class="radio_check"></span><label for="winch_R_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">สปริงไลน์ หัว</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_head_1" name="spring_head" value="N" required><span class="radio_check"></span><label for="spring_head_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_head_2" name="spring_head" value="AB"><span class="radio_check"></span><label for="spring_head_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_head_3" name="spring_head" value="I/F"><span class="radio_check"></span><label for="spring_head_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_head_4" name="spring_head" value="R"><span class="radio_check"></span><label for="spring_head_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="spring_head_5" name="spring_head" value="C/O"><span class="radio_check"></span><label for="spring_head_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ท้าย</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_end_1" name="spring_end" value="N" required><span class="radio_check"></span><label for="spring_end_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_end_2" name="spring_end" value="AB"><span class="radio_check"></span><label for="spring_end_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_end_3" name="spring_end" value="I/F"><span class="radio_check"></span><label for="spring_end_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="spring_end_4" name="spring_end" value="R"><span class="radio_check"></span><label for="spring_end_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="spring_end_5" name="spring_end" value="C/O"><span class="radio_check"></span><label for="spring_end_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กว้านท้ายเรือ ซ้าย</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_L_1" name="winch_end_L" value="N" required><span class="radio_check"></span><label for="winch_end_L_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_L_2" name="winch_end_L" value="AB"><span class="radio_check"></span><label for="winch_end_L_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_L_3" name="winch_end_L" value="I/F"><span class="radio_check"></span><label for="winch_end_L_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_L_4" name="winch_end_L" value="R"><span class="radio_check"></span><label for="winch_end_L_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="winch_end_L_5" name="winch_end_L" value="C/O"><span class="radio_check"></span><label for="winch_end_L_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กลาง</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_C_1" name="winch_end_C" value="N" required><span class="radio_check"></span><label for="winch_end_C_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_C_2" name="winch_end_C" value="AB"><span class="radio_check"></span><label for="winch_end_C_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_C_3" name="winch_end_C" value="I/F"><span class="radio_check"></span><label for="winch_end_C_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_C_4" name="winch_end_C" value="R"><span class="radio_check"></span><label for="winch_end_C_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="winch_end_C_5" name="winch_end_C" value="C/O"><span class="radio_check"></span><label for="winch_end_C_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ขวา</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_R_1" name="winch_end_R" value="N" required><span class="radio_check"></span><label for="winch_end_R_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_R_2" name="winch_end_R" value="AB"><span class="radio_check"></span><label for="winch_end_R_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_R_3" name="winch_end_R" value="I/F"><span class="radio_check"></span><label for="winch_end_R_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="winch_end_R_4" name="winch_end_R" value="R"><span class="radio_check"></span><label for="winch_end_R_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="winch_end_R_5" name="winch_end_R" value="C/O"><span class="radio_check"></span><label for="winch_end_R_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คลูกยางกันกระแทกรอบตัวเรือ</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="shockproof_around_1" name="shockproof_around" value="N" required><span class="radio_check"></span><label for="shockproof_around_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="shockproof_around_2" name="shockproof_around" value="AB"><span class="radio_check"></span><label for="shockproof_around_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="shockproof_around_3" name="shockproof_around" value="I/F"><span class="radio_check"></span><label for="shockproof_around_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="shockproof_around_4" name="shockproof_around" value="R"><span class="radio_check"></span><label for="shockproof_around_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="shockproof_around_5" name="shockproof_around" value="C/O"><span class="radio_check"></span><label for="shockproof_around_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กว้านสมอเรือ</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="anchor_1" name="anchor" value="N" required><span class="radio_check"></span><label for="anchor_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="anchor_2" name="anchor" value="AB"><span class="radio_check"></span><label for="anchor_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="anchor_3" name="anchor" value="I/F"><span class="radio_check"></span><label for="anchor_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="anchor_4" name="anchor" value="R"><span class="radio_check"></span><label for="anchor_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="anchor_5" name="anchor" value="C/O"><span class="radio_check"></span><label for="anchor_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กว้านยก Loading Jib BC 1 TOWER A</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_A_1" name="hoist_A" value="N" required><span class="radio_check"></span><label for="hoist_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_A_2" name="hoist_A" value="AB"><span class="radio_check"></span><label for="hoist_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_A_3" name="hoist_A" value="I/F"><span class="radio_check"></span><label for="hoist_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_A_4" name="hoist_A" value="R"><span class="radio_check"></span><label for="hoist_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="hoist_A_5" name="hoist_A" value="C/O"><span class="radio_check"></span><label for="hoist_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">กว้านยก Loading Jib BC 1 TOWER B </label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_B_1" name="hoist_B" value="N" required><span class="radio_check"></span><label for="hoist_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_B_2" name="hoist_B" value="AB"><span class="radio_check"></span><label for="hoist_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_B_3" name="hoist_B" value="I/F"><span class="radio_check"></span><label for="hoist_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="hoist_B_4" name="hoist_B" value="R"><span class="radio_check"></span><label for="hoist_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="hoist_B_5" name="hoist_B" value="C/O"><span class="radio_check"></span><label for="hoist_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คระบบสายพานลำเลียง</h4></label>
					<label class="col-md-12 col-sm-12 col-xs-12"><h4>TOWER A</h4></label>
				</div>
				<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดเกียรสวิง ซ้าย-ขวา</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_A_1" name="gear_swing_LR_A" value="N" required><span class="radio_check"></span><label for="gear_swing_LR_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_A_2" name="gear_swing_LR_A" value="AB"><span class="radio_check"></span><label for="gear_swing_LR_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_A_3" name="gear_swing_LR_A" value="I/F"><span class="radio_check"></span><label for="gear_swing_LR_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_A_4" name="gear_swing_LR_A" value="R"><span class="radio_check"></span><label for="gear_swing_LR_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="gear_swing_LR_A_5" name="gear_swing_LR_A" value="C/O"><span class="radio_check"></span><label for="gear_swing_LR_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดเกียรดึงปลายท่อพ่น  เข้า-ออก </label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_A_1" name="gear_pull_A" value="N" required><span class="radio_check"></span><label for="gear_pull_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_A_2" name="gear_pull_A" value="AB"><span class="radio_check"></span><label for="gear_pull_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_A_3" name="gear_pull_A" value="I/F"><span class="radio_check"></span><label for="gear_pull_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_A_4" name="gear_pull_A" value="R"><span class="radio_check"></span><label for="gear_pull_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="gear_pull_A_5" name="gear_pull_A" value="C/O"><span class="radio_check"></span><label for="gear_pull_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">สายพาน BC1</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_A_1" name="belt_BC1_A" value="N" required><span class="radio_check"></span><label for="belt_BC1_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_A_2" name="belt_BC1_A" value="AB"><span class="radio_check"></span><label for="belt_BC1_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_A_3" name="belt_BC1_A" value="I/F"><span class="radio_check"></span><label for="belt_BC1_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_A_4" name="belt_BC1_A" value="R"><span class="radio_check"></span><label for="belt_BC1_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="belt_BC1_A_5" name="belt_BC1_A" value="C/O"><span class="radio_check"></span><label for="belt_BC1_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">สายพาน BC2</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_A_1" name="belt_BC2_A" value="N" required><span class="radio_check"></span><label for="belt_BC2_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_A_2" name="belt_BC2_A" value="AB"><span class="radio_check"></span><label for="belt_BC2_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_A_3" name="belt_BC2_A" value="I/F"><span class="radio_check"></span><label for="belt_BC2_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_A_4" name="belt_BC2_A" value="R"><span class="radio_check"></span><label for="belt_BC2_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="belt_BC2_A_5" name="belt_BC2_A" value="C/O"><span class="radio_check"></span><label for="belt_BC2_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบลูกกลิ้ง BC1</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_A_1" name="roller_BC1_A" value="N" required><span class="radio_check"></span><label for="roller_BC1_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_A_2" name="roller_BC1_A" value="AB"><span class="radio_check"></span><label for="roller_BC1_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_A_3" name="roller_BC1_A" value="I/F"><span class="radio_check"></span><label for="roller_BC1_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_A_4" name="roller_BC1_A" value="R"><span class="radio_check"></span><label for="roller_BC1_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="roller_BC1_A_5" name="roller_BC1_A" value="C/O"><span class="radio_check"></span><label for="roller_BC1_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบลูกกลิ้ง BC2</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_A_1" name="roller_BC2_A" value="N" required><span class="radio_check"></span><label for="roller_BC2_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_A_2" name="roller_BC2_A" value="AB"><span class="radio_check"></span><label for="roller_BC2_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_A_3" name="roller_BC2_A" value="I/F"><span class="radio_check"></span><label for="roller_BC2_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_A_4" name="roller_BC2_A" value="R"><span class="radio_check"></span><label for="roller_BC2_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="roller_BC2_A_5" name="roller_BC2_A" value="C/O"><span class="radio_check"></span><label for="roller_BC2_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">รอกทางผ่านลวดสลิง</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_A_1" name="sling_wire_A" value="N" required><span class="radio_check"></span><label for="sling_wire_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_A_2" name="sling_wire_A" value="AB"><span class="radio_check"></span><label for="sling_wire_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_A_3" name="sling_wire_A" value="I/F"><span class="radio_check"></span><label for="sling_wire_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_A_4" name="sling_wire_A" value="R"><span class="radio_check"></span><label for="sling_wire_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="sling_wire_A_5" name="sling_wire_A" value="C/O"><span class="radio_check"></span><label for="sling_wire_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบสภาพลวดสลิงยก BC 1</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_A_1" name="check_sling_BC1_A" value="N" required><span class="radio_check"></span><label for="check_sling_BC1_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_A_2" name="check_sling_BC1_A" value="AB"><span class="radio_check"></span><label for="check_sling_BC1_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_A_3" name="check_sling_BC1_A" value="I/F"><span class="radio_check"></span><label for="check_sling_BC1_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_A_4" name="check_sling_BC1_A" value="R"><span class="radio_check"></span><label for="check_sling_BC1_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="check_sling_BC1_A_5" name="check_sling_BC1_A" value="C/O"><span class="radio_check"></span><label for="check_sling_BC1_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบสภาพลวดสลิงดึงปลายท่อพ่น</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_A_1" name="check_sling_pull_A" value="N" required><span class="radio_check"></span><label for="check_sling_pull_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_A_2" name="check_sling_pull_A" value="AB"><span class="radio_check"></span><label for="check_sling_pull_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_A_3" name="check_sling_pull_A" value="I/F"><span class="radio_check"></span><label for="check_sling_pull_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_A_4" name="check_sling_pull_A" value="R"><span class="radio_check"></span><label for="check_sling_pull_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="check_sling_pull_A_5" name="check_sling_pull_A" value="C/O"><span class="radio_check"></span><label for="check_sling_pull_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดวาล์ว ปิด - เปิด กระบอกลม ปาก HOPPER</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_A_1" name="valve_hopper_A" value="N" required><span class="radio_check"></span><label for="valve_hopper_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_A_2" name="valve_hopper_A" value="AB"><span class="radio_check"></span><label for="valve_hopper_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_A_3" name="valve_hopper_A" value="I/F"><span class="radio_check"></span><label for="valve_hopper_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_A_4" name="valve_hopper_A" value="R"><span class="radio_check"></span><label for="valve_hopper_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="valve_hopper_A_5" name="valve_hopper_A" value="C/O"><span class="radio_check"></span><label for="valve_hopper_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุด กระบอกลม ปิด-เปิด ปาก HOPPER</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="cylinder_hopper_A_1" name="cylinder_hopper_A" value="N" required><span class="radio_check"></span><label for="cylinder_hopper_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="cylinder_hopper_A_2" name="cylinder_hopper_A" value="AB"><span class="radio_check"></span><label for="cylinder_hopper_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="cylinder_hopper_A_3" name="cylinder_hopper_A" value="I/F"><span class="radio_check"></span><label for="cylinder_hopper_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="cylinder_hopper_A_4" name="cylinder_hopper_A" value="R"><span class="radio_check"></span><label for="cylinder_hopper_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="cylinder_hopper_A_5" name="cylinder_hopper_A" value="C/O"><span class="radio_check"></span><label for="cylinder_hopper_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">เหล็กตระแกรงบน HOPPER</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_A_1" name="grille_hopper_A" value="N" required><span class="radio_check"></span><label for="grille_hopper_A_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_A_2" name="grille_hopper_A" value="AB"><span class="radio_check"></span><label for="grille_hopper_A_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_A_3" name="grille_hopper_A" value="I/F"><span class="radio_check"></span><label for="grille_hopper_A_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_A_4" name="grille_hopper_A" value="R"><span class="radio_check"></span><label for="grille_hopper_A_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="grille_hopper_A_5" name="grille_hopper_A" value="C/O"><span class="radio_check"></span><label for="grille_hopper_A_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คระบบสายพานลำเลียง</h4></label>
					<label class="col-md-12 col-sm-12 col-xs-12"><h4>TOWER B</h4></label>
				</div>
				<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดเกียรสวิง ซ้าย-ขวา</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_B_1" name="gear_swing_LR_B" value="N" required><span class="radio_check"></span><label for="gear_swing_LR_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_B_2" name="gear_swing_LR_B" value="AB"><span class="radio_check"></span><label for="gear_swing_LR_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_B_3" name="gear_swing_LR_B" value="I/F"><span class="radio_check"></span><label for="gear_swing_LR_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_swing_LR_B_4" name="gear_swing_LR_B" value="R"><span class="radio_check"></span><label for="gear_swing_LR_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="gear_swing_LR_B_5" name="gear_swing_LR_B" value="C/O"><span class="radio_check"></span><label for="gear_swing_LR_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดเกียรดึงปลายท่อพ่น  เข้า-ออก </label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_B_1" name="gear_pull_B" value="N" required><span class="radio_check"></span><label for="gear_pull_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_B_2" name="gear_pull_B" value="AB"><span class="radio_check"></span><label for="gear_pull_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_B_3" name="gear_pull_B" value="I/F"><span class="radio_check"></span><label for="gear_pull_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="gear_pull_B_4" name="gear_pull_B" value="R"><span class="radio_check"></span><label for="gear_pull_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="gear_pull_B_5" name="gear_pull_B" value="C/O"><span class="radio_check"></span><label for="gear_pull_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">สายพาน BC1</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_B_1" name="belt_BC1_B" value="N" required><span class="radio_check"></span><label for="belt_BC1_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_B_2" name="belt_BC1_B" value="AB"><span class="radio_check"></span><label for="belt_BC1_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_B_3" name="belt_BC1_B" value="I/F"><span class="radio_check"></span><label for="belt_BC1_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC1_B_4" name="belt_BC1_B" value="R"><span class="radio_check"></span><label for="belt_BC1_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="belt_BC1_B_5" name="belt_BC1_B" value="C/O"><span class="radio_check"></span><label for="belt_BC1_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">สายพาน BC2</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_B_1" name="belt_BC2_B" value="N" required><span class="radio_check"></span><label for="belt_BC2_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_B_2" name="belt_BC2_B" value="AB"><span class="radio_check"></span><label for="belt_BC2_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_B_3" name="belt_BC2_B" value="I/F"><span class="radio_check"></span><label for="belt_BC2_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="belt_BC2_B_4" name="belt_BC2_B" value="R"><span class="radio_check"></span><label for="belt_BC2_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="belt_BC2_B_5" name="belt_BC2_B" value="C/O"><span class="radio_check"></span><label for="belt_BC2_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบลูกกลิ้ง BC1</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_B_1" name="roller_BC1_B" value="N" required><span class="radio_check"></span><label for="roller_BC1_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_B_2" name="roller_BC1_B" value="AB"><span class="radio_check"></span><label for="roller_BC1_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_B_3" name="roller_BC1_B" value="I/F"><span class="radio_check"></span><label for="roller_BC1_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC1_B_4" name="roller_BC1_B" value="R"><span class="radio_check"></span><label for="roller_BC1_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="roller_BC1_B_5" name="roller_BC1_B" value="C/O"><span class="radio_check"></span><label for="roller_BC1_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ระบบลูกกลิ้ง BC2</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_B_1" name="roller_BC2_B" value="N" required><span class="radio_check"></span><label for="roller_BC2_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_B_2" name="roller_BC2_B" value="AB"><span class="radio_check"></span><label for="roller_BC2_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_B_3" name="roller_BC2_B" value="I/F"><span class="radio_check"></span><label for="roller_BC2_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="roller_BC2_B_4" name="roller_BC2_B" value="R"><span class="radio_check"></span><label for="roller_BC2_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="roller_BC2_B_5" name="roller_BC2_B" value="C/O"><span class="radio_check"></span><label for="roller_BC2_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">รอกทางผ่านลวดสลิง</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_B_1" name="sling_wire_B" value="N" required><span class="radio_check"></span><label for="sling_wire_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_B_2" name="sling_wire_B" value="AB"><span class="radio_check"></span><label for="sling_wire_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_B_3" name="sling_wire_B" value="I/F"><span class="radio_check"></span><label for="sling_wire_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="sling_wire_B_4" name="sling_wire_B" value="R"><span class="radio_check"></span><label for="sling_wire_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="sling_wire_B_5" name="sling_wire_B" value="C/O"><span class="radio_check"></span><label for="sling_wire_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบสภาพลวดสลิงยก BC 1</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_B_1" name="check_sling_BC1_B" value="N" required><span class="radio_check"></span><label for="check_sling_BC1_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_B_2" name="check_sling_BC1_B" value="AB"><span class="radio_check"></span><label for="check_sling_BC1_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_B_3" name="check_sling_BC1_B" value="I/F"><span class="radio_check"></span><label for="check_sling_BC1_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_BC1_B_4" name="check_sling_BC1_B" value="R"><span class="radio_check"></span><label for="check_sling_BC1_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="check_sling_BC1_B_5" name="check_sling_BC1_B" value="C/O"><span class="radio_check"></span><label for="check_sling_BC1_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบสภาพลวดสลิงดึงปลายท่อพ่น</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_B_1" name="check_sling_pull_B" value="N" required><span class="radio_check"></span><label for="check_sling_pull_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_B_2" name="check_sling_pull_B" value="AB"><span class="radio_check"></span><label for="check_sling_pull_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_B_3" name="check_sling_pull_B" value="I/F"><span class="radio_check"></span><label for="check_sling_pull_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_sling_pull_B_4" name="check_sling_pull_B" value="R"><span class="radio_check"></span><label for="check_sling_pull_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="check_sling_pull_B_5" name="check_sling_pull_B" value="C/O"><span class="radio_check"></span><label for="check_sling_pull_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ชุดวาล์ว ปิด - เปิด กระบอกลม ปาก HOPPER</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_B_1" name="valve_hopper_B" value="N" required><span class="radio_check"></span><label for="valve_hopper_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_B_2" name="valve_hopper_B" value="AB"><span class="radio_check"></span><label for="valve_hopper_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_B_3" name="valve_hopper_B" value="I/F"><span class="radio_check"></span><label for="valve_hopper_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="valve_hopper_B_4" name="valve_hopper_B" value="R"><span class="radio_check"></span><label for="valve_hopper_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="valve_hopper_B_5" name="valve_hopper_B" value="C/O"><span class="radio_check"></span><label for="valve_hopper_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">เหล็กตระแกรงบน HOPPER</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_B_1" name="grille_hopper_B" value="N" required><span class="radio_check"></span><label for="grille_hopper_B_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_B_2" name="grille_hopper_B" value="AB"><span class="radio_check"></span><label for="grille_hopper_B_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_B_3" name="grille_hopper_B" value="I/F"><span class="radio_check"></span><label for="grille_hopper_B_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="grille_hopper_B_4" name="grille_hopper_B" value="R"><span class="radio_check"></span><label for="grille_hopper_B_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="grille_hopper_B_5" name="grille_hopper_B" value="C/O"><span class="radio_check"></span><label for="grille_hopper_B_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คลวดยกรถ BOBCAT</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bobcat_1" name="bobcat" value="N" required><span class="radio_check"></span><label for="bobcat_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bobcat_2" name="bobcat" value="AB"><span class="radio_check"></span><label for="bobcat_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bobcat_3" name="bobcat" value="I/F"><span class="radio_check"></span><label for="bobcat_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bobcat_4" name="bobcat" value="R"><span class="radio_check"></span><label for="bobcat_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="bobcat_5" name="bobcat" value="C/O"><span class="radio_check"></span><label for="bobcat_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คลวดยกรถ BACHOLE</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bachole_1" name="bachole" value="N" required><span class="radio_check"></span><label for="bachole_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bachole_2" name="bachole" value="AB"><span class="radio_check"></span><label for="bachole_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bachole_3" name="bachole" value="I/F"><span class="radio_check"></span><label for="bachole_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="bachole_4" name="bachole" value="R"><span class="radio_check"></span><label for="bachole_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="bachole_5" name="bachole" value="C/O"><span class="radio_check"></span><label for="bachole_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คลวดยกรถ TRACTOR</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="tractor_1" name="tractor" value="N" required><span class="radio_check"></span><label for="tractor_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="tractor_2" name="tractor" value="AB"><span class="radio_check"></span><label for="tractor_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="tractor_3" name="tractor" value="I/F"><span class="radio_check"></span><label for="tractor_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="tractor_4" name="tractor" value="R"><span class="radio_check"></span><label for="tractor_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="tractor_5" name="tractor" value="C/O"><span class="radio_check"></span><label for="tractor_5"> C/O </label>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คสะเก็น</label>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_saken_1" name="check_saken" value="N" required><span class="radio_check"></span><label for="check_saken_1"> N </label>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_saken_2" name="check_saken" value="AB"><span class="radio_check"></span><label for="check_saken_2"> AB </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_saken_3" name="check_saken" value="I/F"><span class="radio_check"></span><label for="check_saken_3"> I/F </label>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<input type="radio" id="check_saken_4" name="check_saken" value="R"><span class="radio_check"></span><label for="check_saken_4"> R </label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<input type="radio" id="check_saken_5" name="check_saken" value="C/O"><span class="radio_check"></span><label for="check_saken_5"> C/O </label>
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
	font-size: 17px;
}
.col-md-1{
	font-size: 14px;
}
.col-md-2{
	font-size: 14px;
}
.check{
	font-size: 17px;
}
.control-label{
	font-size: 17px;
}
h4{
	text-decoration: underline;
}
@media (max-width: 1023px) {
	.col-md-6{
		font-size: 14px;
	}
	.check{
		font-size: 14px;
	}
.status{
	margin-top: 10rem;
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
.text-right{
	text-align: left !important;
}
.radio_check{
	display: block;
}
.control-label{
	font-size:12px;
	text-align: left !important;
}
}
@media (min-width: 1024px) {
.desktop{
	margin-top: 1rem;
}
.radio_check{
	display: block;
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
	// $('#ship').select2({placeholder: "เลือกเรือใหญ่"});
	$('#sm_ship').select2({placeholder: "เลือกเรือทุ่น"});
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