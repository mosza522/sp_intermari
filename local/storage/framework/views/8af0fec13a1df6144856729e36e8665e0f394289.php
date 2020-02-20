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
	$machine_name=\App\Models\Master\Machine::Join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Master_Machine.DepartmentID')
				->select('ck_Master_Machine.id', 'DepartmentName', 'MachineType', 'MachineName', 'MachineNunber', 'MachineUsage', 'MachineStatus', 'ck_Master_Machine.deleted_at')
				->where('ck_Master_Machine.id',$id)
					 ->first();
	?>
	<?php
	$stock = App\Models\Machine\Crane::orderBy('created_at','desc')->first();
	$code='CR'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
				<?php if(!isset($check_approve)): ?>
				<li><a href="<?php echo e(action('FTS\MachineController@checkInspection')); ?>">ตรวจเช็คเครื่องจักร</a></li>
			<?php else: ?>
				<li><a href="<?php echo e(action('FTS\MachineController@approveInspection')); ?>">อนุมัติการตรวจเช็ค</a></li>
			<?php endif; ?>
				<li class="active">เพิ่มใบรายงานการตรวจเช็ค CRANE</li>
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
			        <h4 class="panel-title">เพิ่มใบรายงานการตรวจเช็ค CRANE</h4>
			    </div>
				<div class="panel-body" style="" id="check_approve">
					<?php if(!isset($check_approve)): ?>
					<div class="row" style="padding: 0px 2px 0 0;">
						<form action="<?php echo e(action('Machine\CraneController@store')); ?>" method="post" onsubmit="return check_before();">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="prepare_id" value="<?php echo e($prepare_id); ?>">
							<?php
								$machine= \App\Models\Master\Machine::where('MachineType','Crane')->get();
								$Buoy= \App\Models\Master\FTS\Buoy::all();
							?>
							<div class="panel-body form-horizontal">
							<div class="form-group">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">วันที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
									</div>
									<div class="tablet1">
										<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ผู้ตรวจสอบ</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="" value="<?php echo e(Auth::user()->StaffPrefix); ?> <?php echo e(Auth::user()->StaffFirstName); ?> <?php echo e(Auth::user()->StaffLastName); ?>" readonly>
									</div>
									</div>

							
									<div class="tablet2">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">เลขที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
									</div>
									</div>
									<div class="tablet3 desktop1">
							<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ชื่อเรือทุ่น</label></div>
								<div class="col-md-2 col-sm-7 col-xs-5" >
									<select class="form-control" name="ship_name" id="machine" style="width:100%" required>
										<option value=""></option>
										<?php $__currentLoopData = $Buoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($element->id); ?>"><?php echo e($element->BuoyName); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								</div>
									
								
										
										<div class="tablet4 desktop1">
										<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ชื่อเรือใหญ่</label></div>
											<div class="col-md-2 col-sm-7 col-xs-8" >
												<input type="hidden" class="form-control" name="bigboat" value="<?php echo e($boat_id); ?>" required readonly>
												<input type="text" class="form-control" name="" value="<?php echo e($boat_name); ?>" required readonly>

												
										</div>
										</div>
										<div class="tablet5 desktop1">
										<div class="col-md-2 col-sm-5 col-xs-4 text-right head" >
											<label class="control-label">รหัสเครน รุ่น</label>
										</div>
										<div class="col-md-2 col-sm-7 col-xs-8" >
											<input type="hidden" class="form-control" name="crane_no" value="<?php echo e($id); ?>" required readonly>
											<input type="text" class="form-control" name="" value="<?php echo e($machine_name->MachineName); ?>" required readonly>
											
											</div>
										</div>

											<div class="tablet6 desktop2">
												<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ขนาด</label></div>
													<div class="col-md-2 col-sm-7 col-xs-8" >

														<div class="input-group">
									<input type="text" class="form-control" id="weight" name="weight" onkeypress="return check_number(this);" required>
									<span class="input-group-addon">ตัน</span>
								</div>
								</div>
								</div>
								<div class=" desktop2 tablet7">
									<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">เลขที่ใบแจ้งงาน</label></div>
										<div class="col-md-2 col-sm-7 col-xs-8" >
											<input type="text" class="form-control" id="work_no" name="work_no" value="<?php echo e($work_number); ?>" readonly>

											
									</div>
												</div>

				</div>





			<div class="panel-body form-horizontal">
				<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
				<div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center check" ><label class="control-label">การตรวจเช็ค  </label>

					<input class="check" type="checkbox" id="check_1" name="check[]" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
					<input class="check" type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
					<input class="check" type="checkbox" id="check_3" name="check[]" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>
					<?php if($InspectionType=='B'): ?>
										<script type="text/javascript">
											$( "#check_1" ).trigger( "click" );
										</script>
					<?php elseif($InspectionType=='A'): ?>
						<script type="text/javascript">
							$( "#check_2" ).trigger( "click" )
						</script>
					<?php else: ?>
						<script type="text/javascript">
						$( "#check_3" ).trigger( "click" );
						</script>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-2">

			</div>
				<div class="col-md-8">
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
					</div>
<?php else: ?>
	<div class="row" style="padding: 0px 2px 0 0;">
		<input type="hidden" name="prepare_id" value="<?php echo e($prepare_id); ?>">
			<?php
			$datas=\App\Models\Machine\Crane::leftJoin('ck_Master_Machine','ck_Master_Machine_Crane.crane_id','=','ck_Master_Machine.id')
			->leftJoin('ck_Staff','ck_Master_Machine_Crane.created_by','=','ck_Staff.id')
			->leftJoin('ck_Master_Fts_Buoy','ck_Master_Machine_Crane.boat_name','=','ck_Master_Fts_Buoy.id')
			->select('ck_Master_Machine_Crane.*','MachineName','StaffPrefix','StaffFirstName','StaffLastName','BuoyName')
			->where('ck_Master_Machine_Crane.code',$code_no)
			->where('ck_Master_Machine_Crane.id',$id)
			->first();
			?>

			<div class="panel-body form-horizontal">
			<div class="form-group">
				<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">วันที่</label></div>
				<div class="col-md-2 col-sm-7 col-xs-8" >
					<input class="form-control" type="text" name="date" value="<?php echo e($datas->created_at); ?>" readonly>
					</div>
					<div class="tablet1">
						<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ผู้ตรวจสอบ</label></div>
				<div class="col-md-2 col-sm-7 col-xs-8" >
					<input class="form-control" type="text" name="" value="<?php echo e($datas->StaffPrefix); ?> <?php echo e($datas->StaffFirstName); ?> <?php echo e($datas->StaffLastName); ?>" readonly>
					</div>
					</div>

			
					<div class="tablet2">
				<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">เลขที่</label></div>
				<div class="col-md-2 col-sm-7 col-xs-8" >
					<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
					</div>
					</div>
					<div class="tablet3 desktop1">
			<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ชื่อเรือทุ่น</label></div>
				<div class="col-md-2 col-sm-7 col-xs-5" >
					<input class="form-control" type="text" name="No_report" value="<?php echo e($datas->BuoyName); ?>" readonly>

					
				</div>
				</div>
					
				
						
						<div class="tablet4 desktop1">
						<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ชื่อเรือใหญ่</label></div>
							<div class="col-md-2 col-sm-7 col-xs-8" >
								
								<input type="text" class="form-control" name="" value="<?php echo e($boat_name); ?>" required readonly>

								
						</div>
						</div>
						<div class="tablet5 desktop1">
						<div class="col-md-2 col-sm-5 col-xs-4 text-right head" >
							<label class="control-label">รหัสเครน รุ่น</label>
						</div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input type="hidden" class="form-control" name="crane_no" value="<?php echo e($id); ?>" required readonly>
							<input type="text" class="form-control" name="" value="<?php echo e($machine_name->MachineName); ?>" required readonly>
							
							</div>
						</div>

							<div class="tablet6 desktop2">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">ขนาด</label></div>
									<div class="col-md-2 col-sm-7 col-xs-8" >

										<div class="input-group">
					<input type="text" class="form-control" id="weight" name="weight" value="<?php echo e($datas->size); ?>" onkeypress="return check_number(this);" required>
					<span class="input-group-addon">ตัน</span>
				</div>
				</div>
				</div>
				<div class=" desktop2 tablet7">
					<div class=" col-md-2 col-sm-5 col-xs-4 text-right head" ><label class="control-label">เลขที่ใบแจ้งงาน</label></div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input type="text" class="form-control" id="work_no" name="work_no" value="<?php echo e($work_number); ?>" readonly>

							
					</div>
								</div>

</div>





<div class="panel-body form-horizontal">
<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
<div class="form-group">
<div class="col-md-12 col-sm-12 col-xs-12 text-center check" ><label class="control-label">การตรวจเช็ค  </label>


	<?php if($InspectionType=='B'): ?>
		<input class="check" type="checkbox" id="check_1" name="check[]" value="before" checked> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
		<input class="check" type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
		<input class="check" type="checkbox" id="check_3" name="check[]" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>

	<?php elseif($InspectionType=='A'): ?>
		<input class="check" type="checkbox" id="check_1" name="check[]" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
		<input class="check" type="checkbox" id="check_2" name="check[]" value="after"checked> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
		<input class="check" type="checkbox" id="check_3" name="check[]" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>

	<?php else: ?>
		<input class="check" type="checkbox" id="check_1" name="check[]" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
		<input class="check" type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2">หลังปฏิบัติงาน</label>
		<input class="check" type="checkbox" id="check_3" name="check[]" value="period"checked> <label class="control-label" for="check_3">ตามรอบ</label>

	<?php endif; ?>
</div>
</div>
<div class="col-md-2">

</div>
<div class="col-md-8">
	<div class="form-group">
		<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คภายนอกตัวเครน</h4></label>
	</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 "> ตรวจสอบตะขอเครนพร้อมอัดจารบี</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="crane_hook_1" name="crane_hook" value="N" required <?php echo e($datas->crane_hook == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="crane_hook_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="crane_hook_2" name="crane_hook" value="AB"<?php echo e($datas->crane_hook == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="crane_hook_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="crane_hook_3" name="crane_hook" value="I/F"<?php echo e($datas->crane_hook == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="crane_hook_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="crane_hook_4" name="crane_hook" value="R"<?php echo e($datas->crane_hook == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="crane_hook_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="crane_hook_5" name="crane_hook" value="C/O"<?php echo e($datas->crane_hook == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="crane_hook_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบลวดสลิงมุมพร้อมทาจารบี</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_1" name="sling" value="N" required><span class="radio_check" <?php echo e($datas->sling == "N" ? "checked" : ""); ?>></span><label for="sling_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_2" name="sling" value="AB"><span class="radio_check"<?php echo e($datas->sling == "AB" ? "checked" : ""); ?>></span><label for="sling_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_3" name="sling" value="I/F"><span class="radio_check"<?php echo e($datas->sling == "I/F" ? "checked" : ""); ?>></span><label for="sling_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_4" name="sling" value="R"> <span class="radio_check"<?php echo e($datas->sling == "R" ? "checked" : ""); ?>></span><label for="sling_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="sling_5" name="sling" value="C/O"><span class="radio_check"<?php echo e($datas->sling == "C/O" ? "checked" : ""); ?>></span><label for="sling_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบลวดสลิงเบส - เลียพร้อมทาจาระบี</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_bass_1" name="sling_bass" value="N" required <?php echo e($datas->sling_bass == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="sling_bass_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_bass_2" name="sling_bass" value="AB"<?php echo e($datas->sling_bass == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="sling_bass_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_bass_3" name="sling_bass" value="I/F"<?php echo e($datas->sling_bass == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="sling_bass_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="sling_bass_4" name="sling_bass" value="R"<?php echo e($datas->sling_bass == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="sling_bass_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="sling_bass_5" name="sling_bass" value="C/O"<?php echo e($datas->sling_bass == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="sling_bass_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบรอกปลายมุม และน๊อตล๊อคสลัก</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="end_corner_1" name="end_corner" value="N" required <?php echo e($datas->end_corner == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="end_corner_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="end_corner_2" name="end_corner" value="AB"<?php echo e($datas->end_corner == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="end_corner_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="end_corner_3" name="end_corner" value="I/F"<?php echo e($datas->end_corner == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="end_corner_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="end_corner_4" name="end_corner" value="R"<?php echo e($datas->end_corner == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="end_corner_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="end_corner_5" name="end_corner" value="C/O"<?php echo e($datas->end_corner == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="end_corner_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบรอกหัวเครน และน๊อตล๊อคสลัก </label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="head_crane_1" name="head_crane" value="N" required <?php echo e($datas->head_crane == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="head_crane_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="head_crane_2" name="head_crane" value="AB"<?php echo e($datas->head_crane == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="head_crane_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="head_crane_3" name="head_crane" value="I/F"<?php echo e($datas->head_crane == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="head_crane_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="head_crane_4" name="head_crane" value="R"<?php echo e($datas->head_crane == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="head_crane_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="head_crane_5" name="head_crane" value="C/O"<?php echo e($datas->head_crane == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="head_crane_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจสอบชุดกล้อง CCTV</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cctv_1" name="cctv" value="N" required <?php echo e($datas->cctv == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cctv_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cctv_2" name="cctv" value="AB"<?php echo e($datas->cctv == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cctv_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cctv_3" name="cctv" value="I/F"<?php echo e($datas->cctv == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cctv_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cctv_4" name="cctv" value="R"<?php echo e($datas->cctv == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cctv_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="cctv_5" name="cctv" value="C/O"<?php echo e($datas->cctv == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cctv_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คทำความสะอาดแผงระบายความร้อน หัวเครน และใต้คนขับ</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cooling_panel_1" name="cooling_panel" value="N" required <?php echo e($datas->cooling_panel == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cooling_panel_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cooling_panel_2" name="cooling_panel" value="AB"<?php echo e($datas->cooling_panel == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cooling_panel_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cooling_panel_3" name="cooling_panel" value="I/F"<?php echo e($datas->cooling_panel == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cooling_panel_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="cooling_panel_4" name="cooling_panel" value="R"<?php echo e($datas->cooling_panel == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cooling_panel_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="cooling_panel_5" name="cooling_panel" value="C/O"<?php echo e($datas->cooling_panel == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="cooling_panel_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำมันเครื่องและน้ำมันโซล่า</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_oli_sola_1" name="leak_oli_sola" value="N" required <?php echo e($datas->leak_oli_sola == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_oli_sola_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_oli_sola_2" name="leak_oli_sola" value="AB"<?php echo e($datas->leak_oli_sola == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_oli_sola_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_oli_sola_3" name="leak_oli_sola" value="I/F"<?php echo e($datas->leak_oli_sola == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_oli_sola_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_oli_sola_4" name="leak_oli_sola" value="R"<?php echo e($datas->leak_oli_sola == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_oli_sola_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="leak_oli_sola_5" name="leak_oli_sola" value="C/O"<?php echo e($datas->leak_oli_sola == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_oli_sola_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คการรั่วซึมของน้ำมันไฮโดลิค กระบอกและสายทั่วไป</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_hydrolic_1" name="leak_hydrolic" value="N" required <?php echo e($datas->leak_hydrolic == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hydrolic_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_hydrolic_2" name="leak_hydrolic" value="AB"<?php echo e($datas->leak_hydrolic == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hydrolic_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_hydrolic_3" name="leak_hydrolic" value="I/F"<?php echo e($datas->leak_hydrolic == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hydrolic_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leak_hydrolic_4" name="leak_hydrolic" value="R"<?php echo e($datas->leak_hydrolic == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hydrolic_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="leak_hydrolic_5" name="leak_hydrolic" value="C/O"<?php echo e($datas->leak_hydrolic == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hydrolic_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ทำความสะอาดแผงระบายความร้อน แอร์</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="clean_cooling_1" name="clean_cooling" value="N" required <?php echo e($datas->clean_cooling == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="clean_cooling_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="clean_cooling_2" name="clean_cooling" value="AB"<?php echo e($datas->clean_cooling == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="clean_cooling_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="clean_cooling_3" name="clean_cooling" value="I/F"<?php echo e($datas->clean_cooling == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="clean_cooling_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="clean_cooling_4" name="clean_cooling" value="R"<?php echo e($datas->clean_cooling == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="clean_cooling_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="clean_cooling_5" name="clean_cooling" value="C/O"<?php echo e($datas->clean_cooling == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="clean_cooling_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ทาจารบี ลวดมุม และ ลวดเบส - เลีย</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="grease_wire_1" name="grease_wire" value="N" required <?php echo e($datas->grease_wire == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="grease_wire_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="grease_wire_2" name="grease_wire" value="AB"<?php echo e($datas->grease_wire == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="grease_wire_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="grease_wire_3" name="grease_wire" value="I/F"<?php echo e($datas->grease_wire == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="grease_wire_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="grease_wire_4" name="grease_wire" value="R"<?php echo e($datas->grease_wire == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="grease_wire_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="grease_wire_5" name="grease_wire" value="C/O"<?php echo e($datas->grease_wire == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="grease_wire_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">อัดจารบีรอก </label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="compress_grease_1" name="compress_grease" value="N" required <?php echo e($datas->compress_grease == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="compress_grease_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="compress_grease_2" name="compress_grease" value="AB"<?php echo e($datas->compress_grease == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="compress_grease_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="compress_grease_3" name="compress_grease" value="I/F"<?php echo e($datas->compress_grease == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="compress_grease_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="compress_grease_4" name="compress_grease" value="R"<?php echo e($datas->compress_grease == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="compress_grease_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="compress_grease_5" name="compress_grease" value="C/O"<?php echo e($datas->compress_grease == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="compress_grease_5"> C/O </label>
			</div>
		</div>


			<div class="form-group">
			<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตรวจเช็คภายในตัวเครน</h4></label>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันไฮโดรลิค</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="oli_hydrolic_1" name="oli_hydrolic" value="N" required <?php echo e($datas->oli_hydrolic == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_hydrolic_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="oli_hydrolic_2" name="oli_hydrolic" value="AB"<?php echo e($datas->oli_hydrolic == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_hydrolic_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="oli_hydrolic_3" name="oli_hydrolic" value="I/F"<?php echo e($datas->oli_hydrolic == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_hydrolic_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="oli_hydrolic_4" name="oli_hydrolic" value="R"<?php echo e($datas->oli_hydrolic == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_hydrolic_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="oli_hydrolic_5" name="oli_hydrolic" value="C/O"<?php echo e($datas->oli_hydrolic == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_hydrolic_5"> C/O </label>
			</div>
		</div>
			<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเกียร์ สวิง</label>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_1" name="oli_gear" value="N" required <?php echo e($datas->oli_gear == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_1"> N </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_2" name="oli_gear" value="AB"<?php echo e($datas->oli_gear == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_2"> AB </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_3" name="oli_gear" value="I/F"<?php echo e($datas->oli_gear == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_3"> I/F </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_4" name="oli_gear" value="R"<?php echo e($datas->oli_gear == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_4"> R </label>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="radio" id="oli_gear_5" name="oli_gear" value="C/O"<?php echo e($datas->oli_gear == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_5"> C/O </label>
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเกียร์ มุม</label>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_corner_1" name="oli_gear_corner" value="N" required <?php echo e($datas->oli_gear_corner == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_corner_1"> N </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_corner_2" name="oli_gear_corner" value="AB"<?php echo e($datas->oli_gear_corner == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_corner_2"> AB </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_corner_3" name="oli_gear_corner" value="I/F"<?php echo e($datas->oli_gear_corner == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_corner_3"> I/F </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_corner_4" name="oli_gear_corner" value="R"<?php echo e($datas->oli_gear_corner == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_corner_4"> R </label>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="radio" id="oli_gear_corner_5" name="oli_gear_corner" value="C/O"<?php echo e($datas->oli_gear_corner == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_corner_5"> C/O </label>
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเกียร์ เบส - เลีย</label>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_bass_1" name="oli_gear_bass" value="N" required <?php echo e($datas->oli_gear_bass == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_bass_1"> N </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_bass_2" name="oli_gear_bass" value="AB"<?php echo e($datas->oli_gear_bass == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_bass_2"> AB </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_bass_3" name="oli_gear_bass" value="I/F"<?php echo e($datas->oli_gear_bass == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_bass_3"> I/F </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="oli_gear_bass_4" name="oli_gear_bass" value="R"<?php echo e($datas->oli_gear_bass == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_bass_4"> R </label>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="radio" id="oli_gear_bass_5" name="oli_gear_bass" value="C/O"<?php echo e($datas->oli_gear_bass == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="oli_gear_bass_5"> C/O </label>
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">การรั่วซึมของน้ำมันไฮโดรลิค, ปั๊ม, ข้อต่อสาย</label>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="leak_hy_pump_1" name="leak_hy_pump" value="N" required <?php echo e($datas->leak_hy_pump == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hy_pump_1"> N </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="leak_hy_pump_2" name="leak_hy_pump" value="AB"<?php echo e($datas->leak_hy_pump == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hy_pump_2"> AB </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="leak_hy_pump_3" name="leak_hy_pump" value="I/F"<?php echo e($datas->leak_hy_pump == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hy_pump_3"> I/F </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="leak_hy_pump_4" name="leak_hy_pump" value="R"<?php echo e($datas->leak_hy_pump == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hy_pump_4"> R </label>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="radio" id="leak_hy_pump_5" name="leak_hy_pump" value="C/O"<?php echo e($datas->leak_hy_pump == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="leak_hy_pump_5"> C/O </label>
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">ดรัมสลิง (WINCH MOUNT)</label>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="winch_mount_1" name="winch_mount" value="N" required <?php echo e($datas->winch_mount == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="winch_mount_1"> N </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="winch_mount_2" name="winch_mount" value="AB"<?php echo e($datas->winch_mount == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="winch_mount_2"> AB </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="winch_mount_3" name="winch_mount" value="I/F"<?php echo e($datas->winch_mount == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="winch_mount_3"> I/F </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="winch_mount_4" name="winch_mount" value="R"<?php echo e($datas->winch_mount == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="winch_mount_4"> R </label>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="radio" id="winch_mount_5" name="winch_mount" value="C/O"<?php echo e($datas->winch_mount == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="winch_mount_5"> C/O </label>
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-6 col-sm-6 col-xs-6 ">อัดจารบี แขนเครน และหัวตรัมสลิง</label>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="greas_hand_crane_1" name="greas_hand_crane" value="N" required <?php echo e($datas->greas_hand_crane == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="greas_hand_crane_1"> N </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="greas_hand_crane_2" name="greas_hand_crane" value="AB"<?php echo e($datas->greas_hand_crane == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="greas_hand_crane_2"> AB </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="greas_hand_crane_3" name="greas_hand_crane" value="I/F"<?php echo e($datas->greas_hand_crane == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="greas_hand_crane_3"> I/F </label>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
				<input type="radio" id="greas_hand_crane_4" name="greas_hand_crane" value="R"<?php echo e($datas->greas_hand_crane == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="greas_hand_crane_4"> R </label>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="radio" id="greas_hand_crane_5" name="greas_hand_crane" value="C/O"<?php echo e($datas->greas_hand_crane == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="greas_hand_crane_5"> C/O </label>
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-12 col-sm-12 col-xs-12"><h4>ตู้ควบคุมระบบเครน Electronic cabinet</h4></label>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">ตำแหน่งอุปกรณ์,การจับยึดสายไฟและชุดควบคุม</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="position_device_1" name="position_device" value="N" required <?php echo e($datas->position_device == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="position_device_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="position_device_2" name="position_device" value="AB"<?php echo e($datas->position_device == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="position_device_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="position_device_3" name="position_device" value="I/F"<?php echo e($datas->position_device == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="position_device_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="position_device_4" name="position_device" value="R"<?php echo e($datas->position_device == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="position_device_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="position_device_5" name="position_device" value="C/O"<?php echo e($datas->position_device == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="position_device_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">หน้าปัด(DISPLAY MPC)</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="display_mpc_1" name="display_mpc" value="N" required <?php echo e($datas->display_mpc == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="display_mpc_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="display_mpc_2" name="display_mpc" value="AB"<?php echo e($datas->display_mpc == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="display_mpc_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="display_mpc_3" name="display_mpc" value="I/F"<?php echo e($datas->display_mpc == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="display_mpc_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="display_mpc_4" name="display_mpc" value="R"<?php echo e($datas->display_mpc == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="display_mpc_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="display_mpc_5" name="display_mpc" value="C/O"<?php echo e($datas->display_mpc == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="display_mpc_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-12 col-sm-12 col-xs-12"><h4>หน้าปัดควบคุมเครน( CONTROL PANEL)</h4></label>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 "> ปุ่มควบคุมต่างๆ</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="control_panel_1" name="control_panel" value="N" required <?php echo e($datas->control_panel == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="control_panel_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="control_panel_2" name="control_panel" value="AB"<?php echo e($datas->control_panel == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="control_panel_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="control_panel_3" name="control_panel" value="I/F"<?php echo e($datas->control_panel == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="control_panel_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="control_panel_4" name="control_panel" value="R"<?php echo e($datas->control_panel == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="control_panel_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="control_panel_5" name="control_panel" value="C/O"<?php echo e($datas->control_panel == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="control_panel_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 "> แสงสว่างภายในปลอกเครน</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="lighting_1" name="lighting" value="N" required <?php echo e($datas->lighting == "N" ? "checked" : ""); ?>><span class="radio_check"></span><label for="lighting_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="lighting_2" name="lighting" value="AB"<?php echo e($datas->lighting == "AB" ? "checked" : ""); ?>><span class="radio_check"></span><label for="lighting_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="lighting_3" name="lighting" value="I/F"<?php echo e($datas->lighting == "I/F" ? "checked" : ""); ?>><span class="radio_check"></span><label for="lighting_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="lighting_4" name="lighting" value="R"<?php echo e($datas->lighting == "R" ? "checked" : ""); ?>><span class="radio_check"></span><label for="lighting_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="lighting_5" name="lighting" value="C/O"<?php echo e($datas->lighting == "C/O" ? "checked" : ""); ?>><span class="radio_check"></span><label for="lighting_5"> C/O </label>
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
				<textarea name="note" class="form-control" rows="5"><?php echo e($datas->note); ?></textarea>
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
		<div class="col-md-12 text-center">
				<a href="<?php echo e(url('fts/machine/approve/'.$datas->code.'/'.$id)); ?>" class="btn btn-success" >อนุมัติ</a>
				<a href="<?php echo e(url('fts/machine/notapprove/'.$datas->code.'/'.$id)); ?>" class="btn btn-danger"  >ไม่อนุมัติ</a>

		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12 text-center">
				<a href="<?php echo e(url('fts/machine/crane/report/'.$datas->id)); ?>" class="btn btn-info" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> รายงาน</a>
				</div>
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
	.head{
		font-size: 17px;
	}
	.desktop1{
		margin-top: 5rem;
	}
	.desktop2{
		margin-top: 10rem;
	}
@media (max-width: 1023px) {
.control-label{
	text-align: left !important;
}
.col-md-6{
	font-size: 14px;
}
.check{
	font-size: 14px;
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
.text-right{
	text-align: left !important;
}
.radio_check{
	display: block;
}
.head{
	font-size: 14px;
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
	$('#work_no').select2({placeholder: "เลือกใบแจ้งงาน"});

	// $('#bigboat').select2({
	// 	placeholder: "เลือกเรือใหญ่"
	// });
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