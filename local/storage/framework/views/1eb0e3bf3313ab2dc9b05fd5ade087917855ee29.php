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
	?>
	<?php
	$stock = App\Models\Machine\Electricity::orderBy('created_at','desc')->first();
	$code='ET'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
				->select('ck_Master_Machine.id', 'DepartmentName', 'MachineType', 'MachineName', 'MachineNunber', 'MachineUsage', 'MachineStatus', 'ck_Master_Machine.deleted_at')
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
				<li class="active">เพิ่มใบตรวจเช็ค เครื่องกำเนิดไฟฟ้า</li>
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
			        <h4 class="panel-title">เพิ่มใบตรวจเช็ค เครื่องกำเนิดไฟฟ้า</h4>
			    </div>
				<div class="panel-body" style="" id="check_approve">
					<?php if(!isset($check_approve)): ?>
					<div class="row" style="padding: 0px 2px 0 0;" >
						<form action="<?php echo e(action('Machine\ElectricityController@store')); ?>" method="post" onsubmit="return check_before();">
							<?php echo csrf_field(); ?>

							<input type="hidden" name="prepare_id" value="<?php echo e($prepare_id); ?>">
							<div class="panel-body form-horizontal">
							<div class="form-group">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">วันที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly >
									</div>
									<div class="tablet1">
									<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">ผู้ตรวจสอบ</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="" value="<?php echo e(Auth::user()->StaffPrefix); ?> <?php echo e(Auth::user()->StaffFirstName); ?> <?php echo e(Auth::user()->StaffLastName); ?>" readonly>
									</div>
									</div>
									<?php
										$machine= \App\Models\Master\Machine::where('MachineType','Gennerrator')->get();
										$Buoy= \App\Models\Master\FTS\Buoy::all();
									?>
							
								<div class="tablet2">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label check">เลขที่</label></div>
								<div class="col-md-2 col-sm-7 col-xs-8" >
									<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
									</div>
									</div>
									<div class="desktop tablet3">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">ชื่อเรือทุ่น</label></div>
								<div class="col-md-2 col-sm-7 col-xs-5" >
									<select class="form-control" name="ship_name" id="machine" style="width:100%" required>
										<option value=""></option>
										<?php $__currentLoopData = $Buoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($element->id); ?>"><?php echo e($element->BuoyName); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									</select>
								</div>
								</div>

								<div class="desktop tablet4">
								<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเรือใหญ่</label></div>
									<div class="col-md-2 col-sm-7 col-xs-8" >

										<input class="form-control" type="text" name="" id="" value="<?php echo e($boat_name); ?>" readonly>
										<input class="form-control" type="hidden" name="bigboat" id="bigboat" value="<?php echo e($boat_id); ?>" readonly>

										
								</div>
								</div>
									
								
										

										<div class="desktop tablet5">
										<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">ประเภท</label></div>
										<div class="col-md-2 col-sm-7 col-xs-8" >
										<select class="form-control" name="type">
											<option value="แสงสว่าง">แสงสว่าง</option>
											<option value="เครน">เครน</option>
										</select>
											</div>
											</div>
											<div class="desktop2 tablet6">
												<div class="col-md-2 col-sm-5 col-xs-4 text-right check" >
													<label class="control-label text-right ">หมายเลขเครื่องยนต์</label>
												</div>
												<div class="col-md-2 col-sm-7 col-xs-8" >
													<input type="text" class="form-control" id="" name="" value="<?php echo e($machine_name->MachineName); ?>" readonly>
													<input type="hidden" class="form-control" id="machine_no" name="machine_no" value="<?php echo e($id); ?>" readonly>
													
													</div>
													</div>
													<div class="tablet7 desktop2 lek">
												<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ขนาด</label></div>
												<div class="col-md-2 col-sm-7 col-xs-8" >

													<div class="input-group">
                <input type="text" class="form-control" id="weight" name="weight" onkeypress="return check_number(this);">
                <span class="input-group-addon">ตัน</span>
              </div>	</div>
						</div>
						<div class="tablet8 desktop2">
						<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label check">เลขที่ใบแจ้งงาน</label></div>
						<div class="col-md-2 col-sm-7 col-xs-8" >
							<input type="text" class="form-control" id="work_no" name="work_no" value="<?php echo e($work_number); ?>" readonly>
							
						</div>
						</div>
						<div class="desktop3 tablet9">
							<div class="col-md-2 col-sm-5 col-xs-4 text-right check" >
								<label class="control-label text-right ">มิเตอร์ก่อนปฏิบัติงาน</label>
							</div>
							<div class="col-md-2 col-sm-7 col-xs-8" >
								<input type="text" class="form-control" id="mitor_before" name="mitor_before" onkeypress="return check_number(this);" readonly>
								</div>
								</div>
								<div class="tablet10 desktop3 lek">
							<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">มิเตอร์หลังปฏิบัติงาน</label></div>
							<div class="col-md-2 col-sm-7 col-xs-8" >
								<input type="text" class="form-control" id="mitor_after" name="mitor_after" onkeypress="return check_number(this);" readonly>
							</div>
						</div>

	<div class="tablet11 desktop2">
	<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label check">มิเตอร์ตามรอบ</label></div>
	<div class="col-md-2 col-sm-7 col-xs-8" >
		<input class="form-control" type="text" name="mitor_round" id="mitor_round" onkeypress="return check_number(this);" readonly>
	</div>
	</div>

				</div>



			<div class="panel-body form-horizontal">
				<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
				<div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center check" ><label class="control-label">การตรวจเช็ค  </label>
					<input class="check" type="checkbox" id="check_1" name="check[]" value="before" > <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
					<input class="check" type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2"> หลังปฏิบัติงาน</label>
					<input class="check" type="checkbox" id="check_3" name="check[]" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>

<?php if($InspectionType=='B'): ?>
					<script type="text/javascript">
						setTimeout(function(){ $( "#check_1" ).trigger( "click" ); }, 200);
					</script>
<?php elseif($InspectionType=='A'): ?>
	<script type="text/javascript">
		setTimeout(function(){ $( "#check_2" ).trigger( "click" ); }, 200);
	</script>
<?php else: ?>
	<script type="text/javascript">
		setTimeout(function(){ $( "#check_3" ).trigger( "click" ); }, 200);
	</script>
<?php endif; ?>
				</div>
			</div>
			<div class="col-md-2">

			</div>
				<div class="col-md-8">
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
								<input type="radio" id="380-440_1" name="voltage" value="N" required style="display: block;"> <label for="380-440_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_2" name="voltage" value="AB" style="display: block;"> <label for="380-440_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_3" name="voltage" value="I/F" style="display: block;"> <label for="380-440_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="380-440_4" name="voltage" value="R" style="display: block;"> <label for="380-440_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="380-440_5" name="voltage" value="C/O" style="display: block;"> <label for="380-440_5"> C/O </label>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดความถี่ไฟฟ้า 50/60 HZ</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_1" name="frequency" value="N" required style="display: block;"> <label for="50/60_1"> N </label>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_2" name="frequency" value="AB" style="display: block;"> <label for="50/60_2"> AB </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_3" name="frequency" value="I/F" style="display: block;"> <label for="50/60_3"> I/F </label>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1">
								<input type="radio" id="50/60_4" name="frequency" value="R" style="display: block;"> <label for="50/60_4"> R </label>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2">
								<input type="radio" id="50/60_5" name="frequency" value="C/O" style="display: block;"> <label for="50/60_5"> C/O </label>
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
<?php else: ?>
	<?php
	$datas=\App\Models\Machine\Electricity::leftJoin('ck_Master_Machine','ck_Master_Machine_Electricity.machine_no','=','ck_Master_Machine.id')
	->leftJoin('ck_Staff','ck_Master_Machine_Electricity.created_by','=','ck_Staff.id')
	->leftJoin('ck_Master_Fts_Buoy','ck_Master_Machine_Electricity.boat_name','=','ck_Master_Fts_Buoy.id')
	->select('ck_Master_Machine_Electricity.*','MachineName','StaffPrefix','StaffFirstName','StaffLastName','BuoyName')
	->where('ck_Master_Machine_Electricity.code',$code_no)
	->where('ck_Master_Machine_Electricity.machine_no',$id)
	->first();
	?>
		<div class="panel-body form-horizontal">
		<div class="form-group">
			<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">วันที่</label></div>
			<div class="col-md-2 col-sm-7 col-xs-8" >
				<input class="form-control" type="text" name="date" value="<?php echo e(DateThai($datas->created_at)); ?>" readonly >
				</div>
				<div class="tablet1">
				<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">ผู้ตรวจสอบ</label></div>
			<div class="col-md-2 col-sm-7 col-xs-8" >
				<input class="form-control" type="text" name="" value="<?php echo e(Auth::user()->StaffPrefix); ?> <?php echo e(Auth::user()->StaffFirstName); ?> <?php echo e(Auth::user()->StaffLastName); ?>" readonly>
				</div>
				</div>
				<?php
					$machine= \App\Models\Master\Machine::where('MachineType','Gennerrator')->get();
					$Buoy= \App\Models\Master\FTS\Buoy::all();
				?>
		
			<div class="tablet2">
			<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label check">เลขที่</label></div>
			<div class="col-md-2 col-sm-7 col-xs-8" >
				<input class="form-control" type="text" name="No_report" value="<?php echo e($code_no); ?>" readonly>
				</div>
				</div>
				<div class="desktop tablet3">
			<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">ชื่อเรือทุ่น</label></div>
			<div class="col-md-2 col-sm-7 col-xs-5" >
				<input class="form-control" type="text" name="" value="<?php echo e($datas->BuoyName); ?>" readonly>

				
			</div>
			</div>

			<div class="desktop tablet4">
			<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ชื่อเรือใหญ่</label></div>
				<div class="col-md-2 col-sm-7 col-xs-8" >

					<input class="form-control" type="text" name="" id="" value="<?php echo e($boat_name); ?>" readonly>
					<input class="form-control" type="hidden" name="bigboat" id="bigboat" value="<?php echo e($boat_id); ?>" readonly>

					
			</div>
			</div>
				
			
					

					<div class="desktop tablet5">
					<div class=" col-md-2 col-sm-5 col-xs-4 text-right" ><label class="control-label check">ประเภท</label></div>
					<div class="col-md-2 col-sm-7 col-xs-8" >
					<select class="form-control" name="type">
						<option value="แสงสว่าง" <?php echo e(($datas->type=="แสงสว่าง")?"selected":""); ?>>แสงสว่าง</option>
						<option value="เครน" <?php echo e(($datas->type=="เครน")?"selected":""); ?>>เครน</option>
					</select>
						</div>
						</div>
						<div class="desktop2 tablet6">
							<div class="col-md-2 col-sm-5 col-xs-4 text-right check" >
								<label class="control-label text-right ">หมายเลขเครื่องยนต์</label>
							</div>
							<div class="col-md-2 col-sm-7 col-xs-8" >
								<input type="text" class="form-control" id="" name="" value="<?php echo e($machine_name->MachineName); ?>" readonly>
								<input type="hidden" class="form-control" id="machine_no" name="machine_no" value="<?php echo e($id); ?>" readonly>
								
								</div>
								</div>
								<div class="tablet7 desktop2 lek">
							<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">ขนาด</label></div>
							<div class="col-md-2 col-sm-7 col-xs-8" >

								<div class="input-group">
			<input type="text" class="form-control" id="weight" name="weight" value="<?php echo e($datas->size); ?>" onkeypress="return check_number(this);">
			<span class="input-group-addon">ตัน</span>
		</div>	</div>
	</div>
	<div class="tablet8 desktop2">
	<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label check">เลขที่ใบแจ้งงาน</label></div>
	<div class="col-md-2 col-sm-7 col-xs-8" >
		<input type="text" class="form-control" id="work_no" name="work_no" value="<?php echo e($work_number); ?>" readonly>
		
	</div>
	</div>
	<div class="desktop3 tablet9">
		<div class="col-md-2 col-sm-5 col-xs-4 text-right check" >
			<label class="control-label text-right ">มิเตอร์ก่อนปฏิบัติงาน</label>
		</div>
		<div class="col-md-2 col-sm-7 col-xs-8" >
			<input type="text" class="form-control" id="mitor_before" name="mitor_before" onkeypress="return check_number(this);" readonly>
			</div>
			</div>
			<div class="tablet10 desktop3 lek">
		<div class=" col-md-2 col-sm-5 col-xs-4 text-right check" ><label class="control-label">มิเตอร์หลังปฏิบัติงาน</label></div>
		<div class="col-md-2 col-sm-7 col-xs-8" >
			<input type="text" class="form-control" id="mitor_after" name="mitor_after" onkeypress="return check_number(this);" readonly>
		</div>
	</div>

<div class="tablet11 desktop2">
<div class=" col-md-2 col-sm-5 col-xs-4 text-right " ><label class="control-label check">มิเตอร์ตามรอบ</label></div>
<div class="col-md-2 col-sm-7 col-xs-8" >
<input class="form-control" type="text" name="mitor_round" id="mitor_round" onkeypress="return check_number(this);" readonly>
</div>
</div>

</div>



<div class="panel-body form-horizontal">
<label class="col-md-12 col-sm-12 col-xs-12 text-center"><h3>หัวข้อในการตรวจเช็ค</h3></label>
<div class="form-group">
<div class="col-md-12 col-sm-12 col-xs-12 text-center check" ><label class="control-label">การตรวจเช็ค  </label>


<?php if($InspectionType=='B'): ?>
	
	<input class="check" type="checkbox" id="check_1" name="check[]" value="before" checked> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
	<input class="check" type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2"> หลังปฏิบัติงาน</label>
	<input class="check" type="checkbox" id="check_3" name="check[]" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>
	<script type="text/javascript">
		$('#mitor_before').val('<?php echo e($datas->mitor_before); ?>');
	</script>
<?php elseif($InspectionType=='A'): ?>
	<input class="check" type="checkbox" id="check_1" name="check[]" value="before"> <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
	<input class="check" type="checkbox" id="check_2" name="check[]" value="after" checked> <label class="control-label" for="check_2"> หลังปฏิบัติงาน</label>
	<input class="check" type="checkbox" id="check_3" name="check[]" value="period"> <label class="control-label" for="check_3">ตามรอบ</label>
	<script type="text/javascript">
		$('#mitor_after').val('<?php echo e($datas->mitor_after); ?>');
	</script>
<?php else: ?>
	<input class="check" type="checkbox" id="check_1" name="check[]" value="before" > <label class="control-label" for="check_1">ก่อนปฏิบัติงาน</label>
	<input class="check" type="checkbox" id="check_2" name="check[]" value="after"> <label class="control-label" for="check_2"> หลังปฏิบัติงาน</label>
	<input class="check" type="checkbox" id="check_3" name="check[]" value="period" checked> <label class="control-label" for="check_3">ตามรอบ</label>
	<script type="text/javascript">
		$('#mitor_round').val('<?php echo e($datas->mitor_round); ?>');
	</script>
<?php endif; ?>
</div>
</div>
<div class="col-md-2">

</div>
<div class="col-md-8">
<div class="form-group">
	<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>ตรวจเช็คก่อนติดเครื่องยนต์</u></h4></label>
</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 "> ระดับน้ำในหม้อน้ำ</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="boiler_1" name="boiler" value="N" required style="display: block;" <?php echo e($datas->boiler == "N" ? "checked" : ""); ?>> <label for="boiler_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="boiler_2" name="boiler" value="AB" style="display: block;" <?php echo e($datas->boiler == "AB" ? "checked" : ""); ?>> <label for="boiler_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="boiler_3" name="boiler" value="I/F"style="display: block;" <?php echo e($datas->boiler == "I/F" ? "checked" : ""); ?>> <label for="boiler_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="boiler_4" name="boiler" value="R"style="display: block;" <?php echo e($datas->boiler == "R" ? "checked" : ""); ?>> <label for="boiler_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="boiler_5" name="boiler" value="C/O"style="display: block;" <?php echo e($datas->boiler == "C/O" ? "checked" : ""); ?>> <label for="boiler_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">ระดับน้ำมันเครื่องอยู่ในเกณฑ์มาตรฐาน</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="engine_1" name="engine" value="N" required style="display: block;"<?php echo e($datas->engine == "N" ? "checked" : ""); ?>> <label for="engine_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="engine_2" name="engine" value="AB"style="display: block;"<?php echo e($datas->engine == "AB" ? "checked" : ""); ?>> <label for="engine_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="engine_3" name="engine" value="I/F"style="display: block;"<?php echo e($datas->engine == "I/F" ? "checked" : ""); ?>> <label for="engine_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="engine_4" name="engine" value="R"style="display: block;"<?php echo e($datas->engine == "R" ? "checked" : ""); ?>> <label for="engine_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="engine_5" name="engine" value="C/O"style="display: block;"<?php echo e($datas->engine == "C/O" ? "checked" : ""); ?>> <label for="engine_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">สภาพสายพานพัดลมหน้าเครื่อง </label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="front_belt_1" name="front_belt" value="N" required style="display: block;"<?php echo e($datas->front_belt == "N" ? "checked" : ""); ?>> <label for="front_belt_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="front_belt_2" name="front_belt" value="AB"style="display: block;"<?php echo e($datas->front_belt == "AB" ? "checked" : ""); ?>> <label for="front_belt_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="front_belt_3" name="front_belt" value="I/F"style="display: block;"<?php echo e($datas->front_belt == "I/F" ? "checked" : ""); ?>> <label for="front_belt_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="front_belt_4" name="front_belt" value="R"style="display: block;"<?php echo e($datas->front_belt == "R" ? "checked" : ""); ?>> <label for="front_belt_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="front_belt_5" name="front_belt" value="C/O"style="display: block;"<?php echo e($datas->front_belt == "C/O" ? "checked" : ""); ?>> <label for="front_belt_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">ท่อยางและเข็มขัดรัดสายทุกตัว</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="pipe_rubber_1" name="pipe_rubber" value="N" required style="display: block;"<?php echo e($datas->pipe_rubber == "N" ? "checked" : ""); ?>> <label for="pipe_rubber_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="pipe_rubber_2" name="pipe_rubber" value="AB"style="display: block;"<?php echo e($datas->pipe_rubber == "AB" ? "checked" : ""); ?>> <label for="pipe_rubber_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="pipe_rubber_3" name="pipe_rubber" value="I/F"style="display: block;"<?php echo e($datas->pipe_rubber == "I/F" ? "checked" : ""); ?>> <label for="pipe_rubber_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="pipe_rubber_4" name="pipe_rubber" value="R"style="display: block;"<?php echo e($datas->pipe_rubber == "R" ? "checked" : ""); ?>> <label for="pipe_rubber_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="pipe_rubber_5" name="pipe_rubber" value="C/O"style="display: block;"<?php echo e($datas->pipe_rubber == "C/O" ? "checked" : ""); ?>> <label for="pipe_rubber_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">ขั้วแบตเตอรี่และเติมน้ำกลั่นอยู่ในเกณฑ์มาตรฐาน </label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="terminals_distilled_1" name="terminals_distilled" value="N" required style="display: block;"<?php echo e($datas->terminals_distilled == "N" ? "checked" : ""); ?>> <label for="terminals_distilled_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="terminals_distilled_2" name="terminals_distilled" value="AB" style="display: block;"<?php echo e($datas->terminals_distilled == "AB" ? "checked" : ""); ?>> <label for="terminals_distilled_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="terminals_distilled_3" name="terminals_distilled" value="I/F" style="display: block;"<?php echo e($datas->terminals_distilled == "I/F" ? "checked" : ""); ?>> <label for="terminals_distilled_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="terminals_distilled_4" name="terminals_distilled" value="R" style="display: block;"<?php echo e($datas->terminals_distilled == "R" ? "checked" : ""); ?>> <label for="terminals_distilled_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="terminals_distilled_5" name="terminals_distilled" value="C/O" style="display: block;"<?php echo e($datas->terminals_distilled == "C/O" ? "checked" : ""); ?>> <label for="terminals_distilled_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คสภาพทั่วไปรอบเครื่อง</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="check_general_1" name="check_general" value="N" required style="display: block;"<?php echo e($datas->check_general == "N" ? "checked" : ""); ?>> <label for="check_general_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="check_general_2" name="check_general" value="AB" style="display: block;"<?php echo e($datas->check_general == "AB" ? "checked" : ""); ?>> <label for="check_general_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="check_general_3" name="check_general" value="I/F" style="display: block;"<?php echo e($datas->check_general == "I/F" ? "checked" : ""); ?>> <label for="check_general_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="check_general_4" name="check_general" value="R" style="display: block;"<?php echo e($datas->check_general == "R" ? "checked" : ""); ?>> <label for="check_general_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="check_general_5" name="check_general" value="C/O" style="display: block;"<?php echo e($datas->check_general == "C/O" ? "checked" : ""); ?>> <label for="check_general_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คสภาพทั่วไปของสายไฟและอุปกรณ์หน้าตู้คอนโทรล</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="wire_controller_1" name="wire_controller" value="N" required style="display: block;"<?php echo e($datas->wire_controller == "N" ? "checked" : ""); ?>> <label for="wire_controller_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="wire_controller_2" name="wire_controller" value="AB" style="display: block;"<?php echo e($datas->wire_controller == "AB" ? "checked" : ""); ?>> <label for="wire_controller_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="wire_controller_3" name="wire_controller" value="I/F" style="display: block;"<?php echo e($datas->wire_controller == "I/F" ? "checked" : ""); ?>> <label for="wire_controller_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="wire_controller_4" name="wire_controller" value="R" style="display: block;"<?php echo e($datas->wire_controller == "R" ? "checked" : ""); ?>> <label for="wire_controller_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="wire_controller_5" name="wire_controller" value="C/O" style="display: block;"<?php echo e($datas->wire_controller == "C/O" ? "checked" : ""); ?>> <label for="wire_controller_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำมันเครื่องและน้ำมันโซล่า</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="leakage_1" name="leakage" value="N" required style="display: block;"<?php echo e($datas->leakage == "N" ? "checked" : ""); ?>> <label for="leakage_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="leakage_2" name="leakage" value="AB" style="display: block;"<?php echo e($datas->leakage == "AB" ? "checked" : ""); ?>> <label for="leakage_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="leakage_3" name="leakage" value="I/F" style="display: block;"<?php echo e($datas->leakage == "I/F" ? "checked" : ""); ?>> <label for="leakage_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="leakage_4" name="leakage" value="R" style="display: block;"<?php echo e($datas->leakage == "R" ? "checked" : ""); ?>> <label for="leakage_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="leakage_5" name="leakage" value="C/O" style="display: block;"<?php echo e($datas->leakage == "C/O" ? "checked" : ""); ?>> <label for="leakage_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">ตรวจเช็คชุดมอเตอร์ปั้มน้ำทะเลและปริมาณน้ำที่ไหลออก</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="motor_sea_1" name="motor_sea" value="N" required style="display: block;"<?php echo e($datas->motor_sea == "N" ? "checked" : ""); ?>> <label for="motor_sea_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="motor_sea_2" name="motor_sea" value="AB" style="display: block;"<?php echo e($datas->motor_sea == "AB" ? "checked" : ""); ?>> <label for="motor_sea_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="motor_sea_3" name="motor_sea" value="I/F" style="display: block;"<?php echo e($datas->motor_sea == "I/F" ? "checked" : ""); ?>> <label for="motor_sea_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="motor_sea_4" name="motor_sea" value="R" style="display: block;"<?php echo e($datas->motor_sea == "R" ? "checked" : ""); ?>> <label for="motor_sea_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="motor_sea_5" name="motor_sea" value="C/O" style="display: block;"<?php echo e($datas->motor_sea == "C/O" ? "checked" : ""); ?>> <label for="motor_sea_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>ตรวจเช็คติดเครื่องรอบเดินเบา/เร่งเครื่อง/หลังติดเครื่อง์</u></h4></label>
</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำ</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_water_1" name="leakage_water" value="N" required style="display: block;"<?php echo e($datas->leakage_water == "N" ? "checked" : ""); ?>> <label for="leakage_water_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_water_2" name="leakage_water" value="AB" style="display: block;"<?php echo e($datas->leakage_water == "AB" ? "checked" : ""); ?>> <label for="leakage_water_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_water_3" name="leakage_water" value="I/F" style="display: block;"<?php echo e($datas->leakage_water == "I/F" ? "checked" : ""); ?>> <label for="leakage_water_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_water_4" name="leakage_water" value="R" style="display: block;"<?php echo e($datas->leakage_water == "R" ? "checked" : ""); ?>> <label for="leakage_water_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="leakage_water_5" name="leakage_water" value="C/O" style="display: block;"<?php echo e($datas->leakage_water == "C/O" ? "checked" : ""); ?>> <label for="leakage_water_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คการรั่วซึมของน้ำมันเครื่องและน้ำมันโซล่า</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_sola_1" name="leakage_sola" value="N" required style="display: block;"<?php echo e($datas->leakage_sola == "N" ? "checked" : ""); ?>> <label for="leakage_sola_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_sola_2" name="leakage_sola" value="AB" style="display: block;"<?php echo e($datas->leakage_sola == "AB" ? "checked" : ""); ?>> <label for="leakage_sola_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_sola_3" name="leakage_sola" value="I/F" style="display: block;"<?php echo e($datas->leakage_sola == "I/F" ? "checked" : ""); ?>> <label for="leakage_sola_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="leakage_sola_4" name="leakage_sola" value="R" style="display: block;"<?php echo e($datas->leakage_sola == "R" ? "checked" : ""); ?>> <label for="leakage_sola_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="leakage_sola_5" name="leakage_sola" value="C/O" style="display: block;"<?php echo e($datas->leakage_sola == "C/O" ? "checked" : ""); ?>> <label for="leakage_sola_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เช็คเสียงดังและการสั่นของเครื่องยนต์</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="engine_noise_1" name="engine_noise" value="N" required style="display: block;"<?php echo e($datas->engine_noise == "N" ? "checked" : ""); ?>> <label for="engine_noise_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="engine_noise_2" name="engine_noise" value="AB" style="display: block;"<?php echo e($datas->engine_noise == "AB" ? "checked" : ""); ?>> <label for="engine_noise_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="engine_noise_3" name="engine_noise" value="I/F" style="display: block;"<?php echo e($datas->engine_noise == "I/F" ? "checked" : ""); ?>> <label for="engine_noise_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="engine_noise_4" name="engine_noise" value="R" style="display: block;"<?php echo e($datas->engine_noise == "R" ? "checked" : ""); ?>> <label for="engine_noise_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="engine_noise_5" name="engine_noise" value="C/O" style="display: block;"<?php echo e($datas->engine_noise == "C/O" ? "checked" : ""); ?>> <label for="engine_noise_5"> C/O </label>
			</div>
		</div>


		<div class="form-group">
		<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>ตู้ควบคุม (CONTROL PANEL), ระบบการแสดงผล์</u></h4></label>
	</div>
	<div class="form-group">
	<label class="col-md-6 col-sm-6 col-xs-6 ">เมนเบรคเกอร์ไฟฟ้า</label>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="breaker_1" name="breaker" value="N" required style="display: block;"<?php echo e($datas->breaker == "N" ? "checked" : ""); ?>> <label for="breaker_1"> N </label>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="breaker_2" name="breaker" value="AB" style="display: block;"<?php echo e($datas->breaker == "AB" ? "checked" : ""); ?>> <label for="breaker_2"> AB </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="breaker_3" name="breaker" value="I/F" style="display: block;"<?php echo e($datas->breaker == "I/F" ? "checked" : ""); ?>> <label for="breaker_3"> I/F </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
		<input type="radio" id="breaker_4" name="breaker" value="R" style="display: block;"<?php echo e($datas->breaker == "R" ? "checked" : ""); ?>> <label for="breaker_4"> R </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="radio" id="breaker_5" name="breaker" value="C/O" style="display: block;"<?php echo e($datas->breaker == "C/O" ? "checked" : ""); ?>> <label for="breaker_5"> C/O </label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-12 col-sm-12 col-xs-12"><h4><u>มาตรวัดต่าง ๆ สามารถอ่านได้</u></h4></label>
	</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 "> เกจวัดแรงดันไฟฟ้า 380-440 v</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="380-440_1" name="voltage" value="N" required style="display: block;"<?php echo e($datas->voltage == "N" ? "checked" : ""); ?>> <label for="380-440_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="380-440_2" name="voltage" value="AB" style="display: block;"<?php echo e($datas->voltage == "AB" ? "checked" : ""); ?>> <label for="380-440_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="380-440_3" name="voltage" value="I/F" style="display: block;"<?php echo e($datas->voltage == "I/F" ? "checked" : ""); ?>> <label for="380-440_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="380-440_4" name="voltage" value="R" style="display: block;"<?php echo e($datas->voltage == "R" ? "checked" : ""); ?>> <label for="380-440_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="380-440_5" name="voltage" value="C/O" style="display: block;"<?php echo e($datas->voltage == "C/O" ? "checked" : ""); ?>> <label for="380-440_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดความถี่ไฟฟ้า 50/60 HZ</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="50/60_1" name="frequency" value="N" required style="display: block;"<?php echo e($datas->frequency == "N" ? "checked" : ""); ?>> <label for="50/60_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="50/60_2" name="frequency" value="AB" style="display: block;"<?php echo e($datas->frequency == "AB" ? "checked" : ""); ?>> <label for="50/60_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="50/60_3" name="frequency" value="I/F" style="display: block;"<?php echo e($datas->frequency == "I/F" ? "checked" : ""); ?>> <label for="50/60_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="50/60_4" name="frequency" value="R" style="display: block;"<?php echo e($datas->frequency == "R" ? "checked" : ""); ?>> <label for="50/60_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="50/60_5" name="frequency" value="C/O" style="display: block;"<?php echo e($datas->frequency == "C/O" ? "checked" : ""); ?>> <label for="50/60_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดความร้อน 87-98 C, 189-209 F </label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="heat_gauge_1" name="heat_gauge" value="N" required style="display: block;"<?php echo e($datas->heat_gauge == "N" ? "checked" : ""); ?>> <label for="heat_gauge_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="heat_gauge_2" name="heat_gauge" value="AB" style="display: block;"<?php echo e($datas->heat_gauge == "AB" ? "checked" : ""); ?>> <label for="heat_gauge_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="heat_gauge_3" name="heat_gauge" value="I/F" style="display: block;"<?php echo e($datas->heat_gauge == "I/F" ? "checked" : ""); ?>> <label for="heat_gauge_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="heat_gauge_4" name="heat_gauge" value="R" style="display: block;"<?php echo e($datas->heat_gauge == "R" ? "checked" : ""); ?>> <label for="heat_gauge_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="heat_gauge_5" name="heat_gauge" value="C/O" style="display: block;"<?php echo e($datas->heat_gauge == "C/O" ? "checked" : ""); ?>> <label for="heat_gauge_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดแรงดันน้ำมันเครื่อง 40 to 88 psi</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="gauge_pressure_1" name="gauge_pressure" value="N" required style="display: block;"<?php echo e($datas->gauge_pressure == "N" ? "checked" : ""); ?>> <label for="gauge_pressure_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="gauge_pressure_2" name="gauge_pressure" value="AB" style="display: block;"<?php echo e($datas->gauge_pressure == "AB" ? "checked" : ""); ?>> <label for="gauge_pressure_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="gauge_pressure_3" name="gauge_pressure" value="I/F" style="display: block;"<?php echo e($datas->gauge_pressure == "I/F" ? "checked" : ""); ?>> <label for="gauge_pressure_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="gauge_pressure_4" name="gauge_pressure" value="R" style="display: block;"<?php echo e($datas->gauge_pressure == "R" ? "checked" : ""); ?>> <label for="gauge_pressure_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="gauge_pressure_5" name="gauge_pressure" value="C/O" style="display: block;"<?php echo e($datas->gauge_pressure == "C/O" ? "checked" : ""); ?>> <label for="gauge_pressure_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">แอมมิเตอร์</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="ammitor_1" name="ammitor" value="N" required style="display: block;"<?php echo e($datas->ammitor == "N" ? "checked" : ""); ?>> <label for="ammitor_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="ammitor_2" name="ammitor" value="AB" style="display: block;"<?php echo e($datas->ammitor == "AB" ? "checked" : ""); ?>> <label for="ammitor_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="ammitor_3" name="ammitor" value="I/F" style="display: block;"<?php echo e($datas->ammitor == "I/F" ? "checked" : ""); ?>> <label for="ammitor_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="ammitor_4" name="ammitor" value="R" style="display: block;"<?php echo e($datas->ammitor == "R" ? "checked" : ""); ?>> <label for="ammitor_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="ammitor_5" name="ammitor" value="C/O" style="display: block;"<?php echo e($datas->ammitor == "C/O" ? "checked" : ""); ?>> <label for="ammitor_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดชั่วโมง</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="hour_gauge_1" name="hour_gauge" value="N" required style="display: block;"<?php echo e($datas->hour_gauge == "N" ? "checked" : ""); ?>> <label for="hour_gauge_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="hour_gauge_2" name="hour_gauge" value="AB" style="display: block;"<?php echo e($datas->hour_gauge == "AB" ? "checked" : ""); ?>> <label for="hour_gauge_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="hour_gauge_3" name="hour_gauge" value="I/F" style="display: block;"<?php echo e($datas->hour_gauge == "I/F" ? "checked" : ""); ?>> <label for="hour_gauge_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="hour_gauge_4" name="hour_gauge" value="R" style="display: block;"<?php echo e($datas->hour_gauge == "R" ? "checked" : ""); ?>> <label for="hour_gauge_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="hour_gauge_5" name="hour_gauge" value="C/O" style="display: block;"<?php echo e($datas->hour_gauge == "C/O" ? "checked" : ""); ?>> <label for="hour_gauge_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">เกจวัดรอบ</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="round_gauge_1" name="round_gauge" value="N" required style="display: block;"<?php echo e($datas->round_gauge == "N" ? "checked" : ""); ?>> <label for="round_gauge_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="round_gauge_2" name="round_gauge" value="AB" style="display: block;"<?php echo e($datas->round_gauge == "AB" ? "checked" : ""); ?>> <label for="round_gauge_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="round_gauge_3" name="round_gauge" value="I/F" style="display: block;"<?php echo e($datas->round_gauge == "I/F" ? "checked" : ""); ?>> <label for="round_gauge_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="round_gauge_4" name="round_gauge" value="R" style="display: block;"<?php echo e($datas->round_gauge == "R" ? "checked" : ""); ?>> <label for="round_gauge_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="round_gauge_5" name="round_gauge" value="C/O" style="display: block;"<?php echo e($datas->round_gauge == "C/O" ? "checked" : ""); ?>> <label for="round_gauge_5"> C/O </label>
			</div>
		</div>
		<div class="form-group">
		<label class="col-md-6 col-sm-6 col-xs-6 ">สายไฟภายในเครื่องไม่มีเปื่อย, แตก, จุดต่อไม่หลวม</label>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="check_inside_1" name="check_inside" value="N" required style="display: block;"<?php echo e($datas->check_inside == "N" ? "checked" : ""); ?>> <label for="check_inside_1"> N </label>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="check_inside_2" name="check_inside" value="AB" style="display: block;"<?php echo e($datas->check_inside == "AB" ? "checked" : ""); ?>> <label for="check_inside_2"> AB </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="check_inside_3" name="check_inside" value="I/F" style="display: block;"<?php echo e($datas->check_inside == "I/F" ? "checked" : ""); ?>> <label for="check_inside_3"> I/F </label>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="radio" id="check_inside_4" name="check_inside" value="R" style="display: block;"<?php echo e($datas->check_inside == "R" ? "checked" : ""); ?>> <label for="check_inside_4"> R </label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" id="check_inside_5" name="check_inside" value="C/O" style="display: block;"<?php echo e($datas->check_inside == "C/O" ? "checked" : ""); ?>> <label for="check_inside_5"> C/O </label>
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
		<div class="form-group">
		<div class="col-md-12 text-center">
				<a href="<?php echo e(url('fts/machine/approve/'.$datas->code.'/'.$id)); ?>" class="btn btn-success" >อนุมัติ</a>
				<a href="<?php echo e(url('fts/machine/notapprove/'.$datas->code.'/'.$id)); ?>" class="btn btn-danger"  >ไม่อนุมัติ</a>

		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12 text-center">
				<a href="<?php echo e(url('fts/machine/electricity/report/'.$datas->id)); ?>" class="btn btn-info" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> รายงาน</a>
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
</div>
					<table id="DashboardFarm" class="table table-striped table-bordered"></table>
				</div>
			</div>


		</div>
		<script type="text/javascript">
		$("#check_1").click(function () {
	if ($('#check_1').prop('checked')) {
		$('#mitor_before').attr('require','require');
		$('#mitor_before').removeAttr('readonly');
	} else {
		$('#mitor_before').attr('readonly','readonly');
		$('#mitor_before').removeAttr('require');

	}
	});
	$("#check_2").click(function () {
if ($('#check_2').prop('checked')) {
		$('#mitor_after').attr('require','require');
	$('#mitor_after').removeAttr('readonly');
} else {
	$('#mitor_after').attr('readonly','readonly');
	$('#mitor_after').removeAttr('require');

}
});
$("#check_3").click(function () {
if ($('#check_3').prop('checked')) {
	$('#mitor_round').attr('require','require');
$('#mitor_round').removeAttr('readonly');
} else {
$('#mitor_round').attr('readonly','readonly');
$('#mitor_round').removeAttr('require');

}
});
// 		mitor_before
// mitor_after
// mitor_round
// check_1
// check_2
// check_3
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
		// $('#bigboat').select2({
		// 	placeholder: "เลือกเรือใหญ่"
		// });
		// $('#work_no').select2({
		// 	placeholder: "เลือกใบแจ้งงาน"
		// });

	});
	function check_before() {
		if(!(document.getElementById('check_1').checked || document.getElementById('check_2').checked || document.getElementById('check_3').checked)){
			alert('กรุณากรอกข้อมูลให้ครบ');
			document.getElementById('check_1').focus();
			return false;
		}
	}
		</script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style media="screen">
.col-md-1{
	font-size: 14px;
}
.col-md-2{
	font-size: 14px;
}
.col-md-6{
	font-size: 17px;
}
.check{
	font-size: 17px;
}
.desktop{
	margin-top: 5rem;
}
.desktop2{
	margin-top: 10rem;
}
.desktop3{
	margin-top: 15rem;
}
@media (max-width: 1023px) {

	.tablet-status{
		margin-top: 10rem;
	}
	.control-label{
		text-align: left !important;
	}
.col-md-6{
	font-size: 14px;
}
.col-md-1{
	font-size: 14px;
}
.col-md-2{
	font-size: 14px;
}
.check{
	font-size: 14px;
}
.radio_check{
	display: block;
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
.tablet8{
	margin-top: 32rem;
}
.tablet9{
	margin-top: 36rem;
}
.tablet10{
	margin-top: 40rem;
}
.tablet11{
	margin-top: 44rem;
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