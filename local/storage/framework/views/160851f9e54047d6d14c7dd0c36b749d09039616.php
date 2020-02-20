
								<div class="col-md-6">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่ใบแจ้งงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140 pull-left m-r-5" value="<?php echo e($sRow->work_number); ?>" readonly />
											<input type="text" class="form-control text-center w140 pull-left" value="<?php echo e(date('d-m-Y',strtotime($sRow->created_at))); ?>" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ลูกค้า</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="<?php echo e($sRow->OwnerName); ?>" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เรือใหญ่</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="<?php echo e($sRow->BoatName); ?>" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ประเภทงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140" value="<?php echo e($sRow->job_transport); ?>" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ETA/วันที่เรือใหญ่</label>
										<div class="col-md-9">
											<input type='text' class="form-control text-center w140" value="<?php echo e(isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta')); ?>" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">วันที่เริ่มงาน</label>
										<div class="col-md-9">
											<input type='text' class="form-control text-center w140" value="<?php echo e(isset($sRow->work_date_issue)?date('d-m-Y H:i',strtotime($sRow->work_date_issue)):old('work_date_issue')); ?>" readonly />
										</div>
									</div>
									
	
								</div>
								
								<div class="col-md-6">
									<div class="form-group m-b-0">
										<label class="col-md-3 control-label">สินค้า</label>
										<div class="row col-md-9 Product_List">
											<?php if( !empty($rowItem) ): ?>
												<?php $__currentLoopData = $rowItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="Product_Item">
												<div class="pull-left m-l-10 m-b-5">
													<input type="text" style="width:55%;" class="form-control pull-left m-r-5"  value="<?php echo e($row->ProductName); ?>" readonly />
													<input type="text" style="width:30%;" class="form-control text-right pull-left m-r-5" value="<?php echo e(isset($row->Weight)?number_format($row->Weight,3):'0'); ?>" readonly />
													<input type="text" style="width:12%;" class="form-control text-center pull-left" value="<?php echo e($sRow->job_unit); ?>" readonly />
												</div>
											</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</div>
									</div>
									
			
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ต้นทาง</label>
										<div class="col-md-8">
											<input type="text" class="form-control" value="<?php echo e($sRow->SourceRouteName); ?>" readonly />
										</div>
									</div>
			
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ปลายทาง</label>
										<div class="col-md-8">
											<input type="text" class="form-control" value="<?php echo e($sRow->DestinationRouteName); ?>" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ</label>
										<div class="col-md-8">
											<textarea class="form-control" rows="3"  readonly ><?php echo e(isset($sRow->work_note)?$sRow->work_note:''); ?></textarea>
										</div>
									</div>
									
								</div>