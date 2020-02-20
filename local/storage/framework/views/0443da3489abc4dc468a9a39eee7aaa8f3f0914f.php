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
	$sum=App\Models\Fuel\Fuel::where('deleted_at',null)->sum('balance');
	?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<?php if($type=="receive"): ?>
					<li><a href="<?php echo e(action('Fuel\FuelstockController@indexReceive')); ?>">รับน้ำมันเข้าสต๊อก</a></li>
				<?php elseif($type=="forcompany"): ?>
					<li><a href="<?php echo e(action('Fuel\FuelstockController@indexCompany')); ?>">จ่ายน้ำมันในบริษัท</a></li>
				<?php elseif($type=="forwork"): ?>
					<li><a href="<?php echo e(action('Fuel\FuelstockController@indexJob')); ?>">จ่ายน้ำมันในงาน</a></li>
				<?php elseif($type=="forboat"): ?>
					<li><a href="<?php echo e(action('Fuel\FuelstockController@indexBoats')); ?>">จ่ายน้ำมันเรือยนต์</a></li>
				<?php elseif($type=="sell"): ?>
					<li><a href="<?php echo e(action('Fuel\FuelstockController@indexSell')); ?>">ขายน้ำมัน</a></li>
				<?php endif; ?>

				<?php if($type=="receive"): ?>
					<?php
							$fuel= App\Models\Fuel\Fuel::where('deleted_at',null)->get();
					?>
					<li class="active">รับน้ำมัน</li>
				<?php elseif($type=="forwork"): ?>
					<?php
					$fuel= App\Models\Fuel\Fuel::where('deleted_at',null)->get();
					$fuelbalance= App\Models\Fuel\Fuel::find(2);
					$smd=App\Models\SMD\Smd::all();
					$staff=App\Models\Staff\Staff::where('DivisionID','!=','99')->get();
					$machine= \App\Models\Master\Machine::orderBy('MachineType')->get();
					?>
					<li class="active">จ่ายน้ำมันในงาน</li>
					<?php elseif($type=="forcompany"): ?>
						<?php
						$fuel= App\Models\Fuel\Fuel::where('deleted_at',null)->get();
						$fuelbalance= App\Models\Fuel\Fuel::find(2);
						$staff=App\Models\Staff\Staff::where('DivisionID','!=','99')->get();
						$machine= \App\Models\Master\Machine::orderBy('MachineType')->get();
						?>
						<li class="active">จ่ายน้ำมันในบริษัท</li>
						<?php elseif($type=="forboat"): ?>
							<?php
							$fuel= App\Models\Fuel\Fuel::where('deleted_at',null)->get();
							$fuelbalance= App\Models\Fuel\Fuel::find(3);
							$staff=App\Models\Staff\Staff::where('DivisionID','!=','99')->get();
							$boat=App\Models\Master\SMD\Boat::all();
							?>
							<li class="active">จ่ายน้ำมันเรือยนต์</li>
							<?php elseif($type=="sell"): ?>
								<?php
								$fuel= App\Models\Fuel\Fuel::where('deleted_at',null)->get();
								$fuelbalance= App\Models\Fuel\Fuel::find(3);
								$boat=App\Models\Master\SMD\Boat::all();
								?>
								<li class="active">ขายน้ำมัน</li>
				<?php endif; ?>

			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<?php if($type=="receive"): ?>
				<h1 class="page-header">รับน้ำมัน </h1>
			<?php elseif($type=="forwork"): ?>
				<h1 class="page-header">จ่ายน้ำมันในงาน </h1>
				<?php elseif($type=="forcompany"): ?>
					<h1 class="page-header">จ่ายน้ำมันในบริษัท </h1>
					<?php elseif($type=="forboat"): ?>
						<h1 class="page-header">จ่ายน้ำมันเรือยนต์ </h1>
						<?php elseif($type=="sell"): ?>
							<h1 class="page-header">ขายน้ำมัน </h1>
			<?php endif; ?>
			<!-- end page-header -->
			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
							<?php if($type=="receive"): ?>
								<h4 class="panel-title">รับน้ำมัน </h4>
							<?php elseif($type=="forwork"): ?>
								<h4 class="panel-title">จ่ายน้ำมันในงาน </h4>
								<?php elseif($type=="forcompany"): ?>
									<h4 class="panel-title">จ่ายน้ำมันในบริษัท </h4>
									<?php elseif($type=="forboat"): ?>
										<h4 class="panel-title">จ่ายน้ำมันเรือยนต์ </h4>
										<?php elseif($type=="sell"): ?>
											<h4 class="panel-title">ขายน้ำมัน </h4>
							<?php endif; ?>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<?php if($type=="receive"): ?>
							<?php
							$stock = App\Models\Fuel\FuelStock::where('type','รับน้ำมัน')->orderBy('created_at','desc')->first();
							$code='FR'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
								<form action="<?php echo e(action('Fuel\FuelstockController@createReceive')); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<div class="panel-body form-horizontal">
										<div class="col-md-5 master">
											<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
											<div class="col-md-6 col-sm-8" >
												<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
												</div>
												<div class="form-group"></div>
												<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
													<div class="col-md-6 col-sm-8" >
														<select class="form-control" name="tank" id="tank" style="width:100%;" required>
															<option value=""></option>
															<?php $__currentLoopData = $fuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
														</div>
														<div class="form-group"></div>
														<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">รับน้ำมันมา</label></div>
																<div class="col-md-6 col-sm-8" >
																<div class="input-group">
															<input class="form-control" type="text" name="amount" value="" id="" onkeypress="return check_number(this);">
															<span class="input-group-addon">ลิตร</span>
																		</div>
															</div>

										</div>
										<div class="col-md-5 master">
											<div class="tablet2">
											<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
											<div class="col-md-8 col-sm-8" >
												<input class="form-control" type="text" name="No_report" value="<?php echo e($code); ?>" readonly>
												</div>
												</div>
												<div class="form-group"></div>
												<div class="col-md-4 col-sm-4 text-right" >
												<label class="control-label">น้ำมันคงเหลือ</label>
											</div>
											<div class="col-md-8 col-sm-8" >
												<div class="input-group">
												<input class="form-control" type="text" name="before" id="before" value="" onkeypress="return check_number(this);" readonly>
												<span class="input-group-addon">ลิตร</span>
															</div>
												</div>

												</div>
														<div class="form-group"></div>
														<div class="form-group">
															<div class="col-md-12 text-center">
																<button type="submit" class="btn btn-primary">บันทึกสต๊อกน้ำมัน</button>
																<a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger" type="button" name="button" >ยกเลิก</a>
															</div>
														</div>
													</form>
						<?php elseif($type=="forwork"): ?>
							<?php
							$stock = App\Models\Fuel\FuelStock::where('type','จ่ายน้ำมันในงาน')->orderBy('created_at','desc')->first();
							$code='FW'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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

								<form action="<?php echo e(action('Fuel\FuelstockController@createForwork')); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<div class="panel-body form-horizontal">
										<div class="col-md-5 master">
											<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
											<div class="col-md-6 col-sm-8" >
												<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
												</div>
												<div class="form-group"></div>
												<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
													<div class="col-md-6 col-sm-8" >
														<select class="form-control" name="tank" id="tank" style="width:100%;" required>
															<?php $__currentLoopData = $fuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
														</div>
														<div class="form-group"></div>
														<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">เลขที่ใบงาน</label></div>
															<div class="col-md-6 col-sm-8" >
																<select class="form-control" name="job_number" id="job_number" style="width:100%;" required>
																	<option value=""></option>
																	<?php $__currentLoopData = $smd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<option value="<?php echo e($element->job_number); ?>"><?php echo e($element->job_number); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																</select>
																</div>
														<div class="form-group"></div>
														<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เบิก</label></div>
																<div class="col-md-6 col-sm-8" >
																<div class="input-group">
															<input class="form-control" type="text" name="amount" value="" id="amount" onkeypress="return check_number(this);" readonly>
															<span class="input-group-addon">ลิตร</span>
																		</div>
															</div>
															<div class="form-group"></div>
														<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันก่อนเติม</label></div>
																	<div class="col-md-6 col-sm-8" >
																		<div class="input-group">
													<input type="text" class="form-control" id="before" value="<?php echo e($fuelbalance->balance); ?>" readonly>
													<span class="input-group-addon">ลิตร</span>
																</div>
																	</div>
																	<div class="form-group"></div>
																	<div class="col-md-6 col-sm-4 text-right" >
																	<label class="control-label">น้ำมันคงเหลือ</label>
																</div>
																<div class="col-md-6 col-sm-8" >
																	<div class="input-group">
																	<input class="form-control" type="text" name="balance" id="balance" value="" onkeypress="return check_number(this);" readonly>
																	<span class="input-group-addon">ลิตร</span>
																				</div>
																	</div>
																	<div class="form-group"></div>
																	<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนคงเหลือในสต๊อก</label></div>
																			<div class="col-md-6 col-sm-8" >
																				<div class="input-group">
																		<input class="form-control" type="text" name="stock_balance" value="<?php echo e(number_format($sum,2,'.','')); ?>" id="stock_balance" onkeypress="return check_number(this);" readonly>
																		<span class="input-group-addon">ลิตร</span>
																					</div>
																		</div>
										</div>
										<div class="col-md-5 master">
											<div class="tablet2">
											<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
											<div class="col-md-8 col-sm-8" >
												<input class="form-control" type="text" name="No_report" value="<?php echo e($code); ?>" readonly>
												</div>
												</div>
												<div class="form-group"></div>
												<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อเครื่องจักร</label></div>
											<div class="col-md-8 col-sm-8" >
												<select class="form-control" name="machine" id="machine" style="width:100%;" required>
													<option value=""></option>
													<?php $__currentLoopData = $machine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($element->id); ?>"><?php echo e($element->MachineType); ?> - <?php echo e($element->MachineName); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
												<div class="form-group"></div>
												<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อผู้เบิก</label></div>
											<div class="col-md-8 col-sm-8" >
												<select class="form-control" name="staff" id="staff" style="width:100%;" required>
													<option value=""></option>
													<?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($element->id); ?>"><?php echo e($element->StaffPrefix); ?> <?php echo e($element->StaffFirstName); ?> <?php echo e($element->StaffLastName); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
											<div class="form-group"></div>
														<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">วัตถุประสงค์</label></div>
																<div class="col-md-8 col-sm-8" >
																	<textarea class="form-control"  name="object" rows="8"></textarea>
																</div>
														</div>
														<div class="form-group"></div>
														<div class="form-group">
															<div class="col-md-12 text-center">
																<button type="submit" class="btn btn-primary">บันทึกสต๊อกน้ำมัน</button>
																<a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger" type="button" name="button" >ยกเลิก</a>
															</div>
														</div>
													</form>
													<script type="text/javascript">
													$('select>option:eq(0)').attr('selected', true);
													setTimeout(function(){
																 $('#tank').trigger('change');
															 }, 1000);
														 </script>
							<?php elseif($type=="forcompany"): ?>
								<?php
								$stock = App\Models\Fuel\FuelStock::where('type','จ่ายน้ำมันในบริษัท')->orderBy('created_at','desc')->first();
								$code='FC'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
									<form action="<?php echo e(action('Fuel\FuelstockController@createForcompany')); ?>" method="post">
										<?php echo e(csrf_field()); ?>

										<div class="panel-body form-horizontal">
											<div class="col-md-5 master">
												<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
												<div class="col-md-6 col-sm-8" >
													<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
													</div>
													<div class="form-group"></div>
													<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
														<div class="col-md-6 col-sm-8" >
															<select class="form-control" name="tank" id="tank" style="width:100%;" required>
																<option value=""></option>
																<?php $__currentLoopData = $fuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

																		<option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>


																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
															</div>
															<div class="form-group"></div>
															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เบิก</label></div>
																	<div class="col-md-6 col-sm-8" >
																	<div class="input-group">
																<input class="form-control" type="text" name="amount" value="" id="amount" onkeypress="return check_number(this);" readonly>
																<span class="input-group-addon">ลิตร</span>
																			</div>
																</div>
																<div class="form-group"></div>
															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันก่อนเติม</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<div class="input-group">
														<input type="text" class="form-control" id="before" value="<?php echo e($fuelbalance->balance); ?>" readonly>
														<span class="input-group-addon">ลิตร</span>
																	</div>
																		</div>
																		<div class="form-group"></div>
																		<div class="col-md-6 col-sm-4 text-right" >
																		<label class="control-label">น้ำมันคงเหลือ</label>
																	</div>
																	<div class="col-md-6 col-sm-8" >
																		<div class="input-group">
																		<input class="form-control" type="text" name="balance" id="balance" value="" onkeypress="return check_number(this);" readonly>
																		<span class="input-group-addon">ลิตร</span>
																					</div>
																		</div>
																		<div class="form-group"></div>
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนคงเหลือในสต๊อก</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<div class="input-group">
																			<input class="form-control" type="text" name="stock_balance" value="<?php echo e(number_format($sum,2,'.','')); ?>" id="stock_balance" onkeypress="return check_number(this);" readonly>
																			<span class="input-group-addon">ลิตร</span>
																						</div>
																			</div>
											</div>
											<div class="col-md-5 master">
												<div class="tablet2">
												<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
												<div class="col-md-8 col-sm-8" >
													<input class="form-control" type="text" name="No_report" value="<?php echo e($code); ?>" readonly>
													</div>
													</div>
													<div class="form-group"></div>
													<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อเครื่องจักร</label></div>
												<div class="col-md-8 col-sm-8" >
													<select class="form-control" name="machine" id="machine" style="width:100%;" required>
														<option value=""></option>
														<?php $__currentLoopData = $machine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($element->id); ?>"><?php echo e($element->MachineType); ?> - <?php echo e($element->MachineName); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
													<div class="form-group"></div>
													<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อผู้เบิก</label></div>
												<div class="col-md-8 col-sm-8" >
													<select class="form-control" name="staff" id="staff" style="width:100%;" required>
														<option value=""></option>
														<?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($element->id); ?>"><?php echo e($element->StaffPrefix); ?> <?php echo e($element->StaffFirstName); ?> <?php echo e($element->StaffLastName); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
												<div class="form-group"></div>
															<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">วัตถุประสงค์</label></div>
																	<div class="col-md-8 col-sm-8" >
																		<textarea class="form-control"  name="object" rows="8"></textarea>
																	</div>
															</div>
															<div class="form-group"></div>
															<div class="form-group">
																<div class="col-md-12 text-center">
																	<button type="submit" class="btn btn-primary">บันทึกสต๊อกน้ำมัน</button>
																	<a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger" type="button" name="button" >ยกเลิก</a>
																</div>
															</div>
														</form>
														<script type="text/javascript">
														$('select>option:eq(1)').attr('selected', true);
														setTimeout(function(){
																	 $('#tank').trigger('change');
																 }, 1000);
															 </script>
							<?php elseif($type=="forboat"): ?>
								<?php
								$stock = App\Models\Fuel\FuelStock::where('type','จ่ายน้ำมันเรือยนต์')->orderBy('created_at','desc')->first();
								$code='FB'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
									<form action="<?php echo e(action('Fuel\FuelstockController@createForboat')); ?>" method="post">
										<?php echo e(csrf_field()); ?>

										<div class="panel-body form-horizontal">
											<div class="col-md-5 master">
												<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
												<div class="col-md-6 col-sm-8" >
													<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
													</div>
													<div class="form-group"></div>
													<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
														<div class="col-md-6 col-sm-8" >
															<select class="form-control" name="tank" id="tank" style="width:100%;" required>
																<option value=""></option>
																<?php $__currentLoopData = $fuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
															</div>
															<div class="form-group"></div>
															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนที่เบิก</label></div>
																	<div class="col-md-6 col-sm-8" >
																	<div class="input-group">
																<input class="form-control" type="text" name="amount" value="" id="amount" onkeypress="return check_number(this);" readonly>
																<span class="input-group-addon">ลิตร</span>
																			</div>
																</div>
																<div class="form-group"></div>
															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันก่อนเติม</label></div>
																		<div class="col-md-6 col-sm-8" >
																			<div class="input-group">
														<input type="text" class="form-control" id="before" value="<?php echo e($fuelbalance->balance); ?>" readonly>
														<span class="input-group-addon">ลิตร</span>
																	</div>
																		</div>
																		<div class="form-group"></div>
																		<div class="col-md-6 col-sm-4 text-right" >
																		<label class="control-label">น้ำมันคงเหลือ</label>
																	</div>
																	<div class="col-md-6 col-sm-8" >
																		<div class="input-group">
																		<input class="form-control" type="text" name="balance" id="balance" value="" onkeypress="return check_number(this);" readonly>
																		<span class="input-group-addon">ลิตร</span>
																					</div>
																		</div>
																		<div class="form-group"></div>
																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนคงเหลือในสต๊อก</label></div>
																				<div class="col-md-6 col-sm-8" >
																					<div class="input-group">
																			<input class="form-control" type="text" name="stock_balance" value="<?php echo e(number_format($sum,2,'.','')); ?>" id="stock_balance" onkeypress="return check_number(this);" readonly>
																			<span class="input-group-addon">ลิตร</span>
																						</div>
																			</div>
											</div>
											<div class="col-md-5 master">
												<div class="tablet2">
												<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
												<div class="col-md-8 col-sm-8" >
													<input class="form-control" type="text" name="No_report" value="<?php echo e($code); ?>" readonly>
													</div>
													</div>
													<div class="form-group"></div>
													<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อเรือ</label></div>
												<div class="col-md-8 col-sm-8" >
													<select class="form-control" name="boat" id="boat" style="width:100%;" required>
														<option value=""></option>
														<?php $__currentLoopData = $boat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($element->id); ?>"><?php echo e($element->BoatName); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
													<div class="form-group"></div>
													<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อผู้เบิก</label></div>
												<div class="col-md-8 col-sm-8" >
													<select class="form-control" name="staff" id="staff" style="width:100%;" required>
														<option value=""></option>
														<?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($element->id); ?>"><?php echo e($element->StaffPrefix); ?> <?php echo e($element->StaffFirstName); ?> <?php echo e($element->StaffLastName); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
												<div class="form-group"></div>
															<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">วัตถุประสงค์</label></div>
																	<div class="col-md-8 col-sm-8" >
																		<textarea class="form-control"  name="object" rows="8"></textarea>
																	</div>
															</div>
															<div class="form-group"></div>
															<div class="form-group">
																<div class="col-md-12 text-center">
																	<button type="submit" class="btn btn-primary">บันทึกสต๊อกน้ำมัน</button>
																	<a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger" type="button" name="button" >ยกเลิก</a>
																</div>
															</div>
														</form>
														<script type="text/javascript">
														$('select>option:eq(2)').attr('selected', true);
														setTimeout(function(){
																	 $('#tank').trigger('change');
																 }, 1000);
															 </script>
									<?php elseif($type=="sell"): ?>
										<?php
										$client = new SoapClient("http://www.pttplc.com/webservice/pttinfo.asmx?WSDL",
										 array(
														"trace"      => 1,		// enable trace to view what is happening
														"exceptions" => 0,		// disable exceptions
													 "cache_wsdl" => 0) 		// disable any caching on the wsdl, encase you alter the wsdl server
													);

													$params = array(
															'Language' => "en",
															'DD' => date('d'),
															'MM' => date('m'),
															'YYYY' => date('Y')
													);

											 $data = $client->GetOilPrice($params);
												 $ob = $data->GetOilPriceResult;
											 $xml = new SimpleXMLElement($ob);
											 // PRICE_DATE , PRODUCT ,PRICE
												 foreach ($xml  as  $key =>$val) {

											 if($val->PRICE != ''){
												 // echo "<script>var ".str_replace(' ', '', $val->PRODUCT)." = '".$val->PRICE."';</script>";
													echo "<input type=\"hidden\" name=\"".$val->PRICE_DATE."\" id=\"".str_replace(' ', '', $val->PRODUCT)."\" value=\"".$val->PRICE."\">";
												 // echo "<input type=\"hidden\" id=\"$val->PRODUCT\" name=\"\" value=\"$val->PRICE\">";
													 }

													}
												 ?>
												 <?php
				 								$stock = App\Models\Fuel\FuelStock::where('type','ขายน้ำมัน')->orderBy('created_at','desc')->first();
				 								$code='FS'.substr(Carbon\Carbon::now(),2,2).substr(Carbon\Carbon::now(),5,2).substr(Carbon\Carbon::now(),8,2);
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
				 									<form action="<?php echo e(action('Fuel\FuelstockController@createForsell')); ?>" method="post">
				 										<?php echo e(csrf_field()); ?>

				 										<div class="panel-body form-horizontal">
				 											<div class="col-md-5 master">
				 												<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่</label></div>
				 												<div class="col-md-6 col-sm-8" >
				 													<input class="form-control" type="text" name="date" value="<?php echo e(DateThai(Carbon\Carbon::now())); ?>" readonly>
				 													</div>
				 													<div class="form-group"></div>
				 													<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ถังน้ำมัน</label></div>
				 														<div class="col-md-6 col-sm-8" >
				 															<select class="form-control" name="tank" id="tank" style="width:100%;" required>
				 																<option value=""></option>
				 																<?php $__currentLoopData = $fuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 																	<option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>
				 																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 															</select>
				 															</div>
				 															<div class="form-group"></div>
				 															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ขายจำนวน</label></div>
				 																	<div class="col-md-6 col-sm-8" >
				 																	<div class="input-group">
				 																<input class="form-control" type="text" name="amount" value="" id="amount" onkeypress="return check_number(this);" readonly>
				 																<span class="input-group-addon">ลิตร</span>
				 																			</div>
				 																</div>
				 																<div class="form-group"></div>
				 															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">ราคาน้ำมัน</label></div>
				 																		<div class="col-md-6 col-sm-8" >
				 																			<div class="input-group">
				 														<input type="text" class="form-control" id="price" name="price" onkeypress="return check_number(this);" readonly>
				 														<span class="input-group-addon">บาท/ลิตร</span>
				 																	</div>
				 																		</div>
																						<div class="form-group"></div>
						 															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">เป็นเงิน</label></div>
						 																		<div class="col-md-6 col-sm-8" >
						 																			<div class="input-group">
						 														<input type="text" class="form-control" id="total_price" name="total_price" readonly>
						 														<span class="input-group-addon">บาท</span>
						 																	</div>
						 																		</div>
																						<div class="form-group"></div>
						 															<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">วันที่อัพเดทราคา</label></div>
						 																		<div class="col-md-6 col-sm-8" >
						 														<input type="text" class="form-control" id="update" name="update" readonly>
						 																		</div>
																								<div class="form-group"></div>
																							<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">น้ำมันก่อนเติม</label></div>
																										<div class="col-md-6 col-sm-8" >
																											<div class="input-group">
																						<input type="text" class="form-control" id="before" value="<?php echo e($fuelbalance->balance); ?>" readonly>
																						<span class="input-group-addon">ลิตร</span>
																									</div>
																										</div>
				 																		<div class="form-group"></div>
				 																		<div class="col-md-6 col-sm-4 text-right" >
				 																		<label class="control-label">น้ำมันคงเหลือ</label>
				 																	</div>
				 																	<div class="col-md-6 col-sm-8" >
				 																		<div class="input-group">
				 																		<input class="form-control" type="text" name="balance" id="balance" value="" onkeypress="return check_number(this);" readonly>
				 																		<span class="input-group-addon">ลิตร</span>
				 																					</div>
				 																		</div>
				 																		<div class="form-group"></div>
				 																		<div class=" col-md-6 col-sm-4 text-right" ><label class="control-label">จำนวนคงเหลือในสต๊อก</label></div>
				 																				<div class="col-md-6 col-sm-8" >
				 																					<div class="input-group">
				 																			<input class="form-control" type="text" name="stock_balance" value="<?php echo e(number_format($sum,2,'.','')); ?>" id="stock_balance" onkeypress="return check_number(this);" readonly>
				 																			<span class="input-group-addon">ลิตร</span>
				 																						</div>
				 																			</div>
				 											</div>
				 											<div class="col-md-5 master">
				 												<div class="tablet2">
				 												<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เลขที่ </label></div>
				 												<div class="col-md-8 col-sm-8" >
				 													<input class="form-control" type="text" name="No_report" value="<?php echo e($code); ?>" readonly>
				 													</div>
				 													</div>
				 													<div class="form-group"></div>
				 													<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">ชื่อลูกค้า</label></div>
				 												<div class="col-md-8 col-sm-8" >
				 													<select class="form-control" name="customer" id="customer" style="width:100%;" required>
				 														<option value=""></option>
				 														<?php $__currentLoopData = $boat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 															<option value="<?php echo e($element->id); ?>"><?php echo e($element->BoatName); ?></option>
				 														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 													</select>
				 												</div>
				 													<div class="form-group"></div>
				 													<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">การชำระเงิน</label></div>
				 												<div class="col-md-8 col-sm-8" >
				 													<input type="radio" name="pay_type" value="เงินสด"> เงินสด <span style="padding-left:5em"></span>
																	<input type="radio" name="pay_type" value="เครดิต"> เครดิต
				 												</div>
				 												<div class="form-group"></div>
				 															<div class=" col-md-4 col-sm-4 text-right" ><label class="control-label">เบอร์ติดต่อ</label></div>
				 																	<div class="col-md-8 col-sm-8" >
																						<input class="form-control" type="text" name="tell" value="" onkeypress="return check_number(this);">
																						</div>
				 															</div>
				 															<div class="form-group"></div>
				 															<div class="form-group">
				 																<div class="col-md-12 text-center">
				 																	<button type="submit" class="btn btn-primary">บันทึกสต๊อกน้ำมัน</button>
				 																	<a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger" type="button" name="button" >ยกเลิก</a>
				 																</div>
				 															</div>
				 														</form>
																		<script type="text/javascript">
																		$('select>option:eq(2)').attr('selected', true);
																		setTimeout(function(){
																					 $('#tank').trigger('change');
																				 }, 1000);
																			 </script>

						<?php endif; ?>



			 <div class="panel-body form-horizontal">

						</div>
</div>

				</div>
			</div>


		</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
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
		.tablet2{
 			margin-top: 6rem;
 		}
		.tablet3{
 			margin-top: 6rem;
 		}
		.tablet4{
 			margin-top: 6rem;
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
	</style>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript">
		function check_number(salary) {
		var vchar = String.fromCharCode(event.keyCode);
		if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
		salary.onKeyPress=vchar;
  }
	$(document).ready(function() {
$('#tank').select2({
	placeholder: "เลือกถังน้ำมัน"
});
$('#staff').select2({
	placeholder: "เลือกพนักงาน"
});
$('#boat').select2({
	placeholder: "เลือกเรือ"
});
$('#job_number').select2({
	placeholder: "เลือกเลขที่ใบงาน"
});
$('#machine').select2({
	placeholder: "เลือกเครื่องจักร"
});
$('#customer').select2({
	placeholder: "เลือกลูกค้า"
});

});
$("#price").change(function(){
	$("#total_price").val($("#amount").val()*$("#price").val())
		});
$("#amount").change(function(){
sum=parseInt("<?php echo e($sum); ?>");
stock=$("#before").val();
amount=$("#amount").val();
$("#total_price").val($("#amount").val()*$("#price").val())
stock_balance=sum.toFixed(2);
	if(stock-amount>=0){
$("#balance").val(stock-amount);
$("#stock_balance").val((stock_balance-amount).toFixed(2));
	}
else{
alert('น้ำมันไม่พอ');
stock_balance=sum.toFixed(2);
$("#amount").val('');
$("#balance").val('');
$("#stock_balance").val(stock_balance);
}
		});
$("#tank").change(function(){
	$("#amount").val('');
	$("#amount").removeAttr("readonly");
	$("#price").removeAttr("readonly");
	$("#balance").val('');
	$("#total_price").val('');
	$("#stock_balance").val(parseInt("<?php echo e($sum); ?>").toFixed(2));
	$.ajax({
		url: "<?php echo e(action('Fuel\FuelController@checkFuel')); ?>",
		type: "POST",
		data:{id : $("#tank").val()},
		dataType: "json",
		success: function(response) {
			var str=response['type'];
			var str=str.replace(/\s/g, '');
			$("#price").val($("#"+str).val());
			$("#update").val($("#"+str).attr('name'));
			$("#before").val(response['balance']);


			// $("#before").val(response['balance']);
			// for (var i = 0; i < obj.length; i++){
			// if(obj[i].product==response['type']){
			// 	alert(response['type']);
			// }
  // if (obj[i].PRODUCT == response['type']){
  //
  // }
// }
			// alert();
			//
	}
	});
});
	</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>