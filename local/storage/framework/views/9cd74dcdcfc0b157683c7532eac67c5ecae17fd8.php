<?php $__env->startSection('content'); ?>
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่าย<?php echo e($sRow->sDivision); ?></li>
				<li>เตรียมความพร้อม (<?php echo e($sRow->pageHeader); ?>)</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ใบแจ้งงาน <?php echo e($sRow->pageHeader); ?></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
						<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-rebel"></i> ใบแจ้งงาน<?php echo e($sRow->pageHeader); ?></h4>
						</div>
						<div class="panel-body form-horizontal">
							<fieldset class="m-t-10">
								<?php echo $__env->make('SWP.Prepare.inc_head_content_'.strtoupper($sRow->work_mode), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								
								<?php if( empty($sRow->deleted_at) ): ?>
								<div class="col-md-12">
									<div class="form-group m-b-5 m-t-25">
										<div class="col-xs-4 text-left">
											<a href="<?php echo e(action($sRow->sPath.'\PrepareController@index')); ?>" class="btn btn-sm btn-success m-l-10">กลับไปหน้าใบงาน<?php echo e($sRow->sDivision); ?></a>
										</div>
										<div class="col-xs-4 text-center">
										</div>
										<div class="col-xs-4 text-right">
											<div class="btn-group dropup m-r-5 m-b-5">
												<a href="javascript:;" class="btn btn-success">เตรียมความพร้อม</a>
												<a href="javascript:;" data-toggle="dropdown" class="btn btn-success dropdown-toggle">
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu pull-right" style="background-color: burlywood;">
												
												</ul>
												<ul class="dropdown-menu pull-right" style="background-color: burlywood;">
													<?php if( $sRow->work_mode != 'TRU' ): ?>
													<li><a href="<?php echo e(action($sRow->sPath.'\PrepareSweepController@index', $sRow->id)); ?>" >สายกวาด</a></li>
													<?php endif; ?>
													<li><a href="<?php echo e(action($sRow->sPath.'\PrepareForemanController@index', $sRow->id)); ?>">โฟร์แมน</a></li>
													<li><a href="<?php echo e(action($sRow->sPath.'\PrepareMachineController@index',  $sRow->id)); ?>">เครื่องจักรและอุปกรณ์</a></li>
													<li><a href="<?php echo e(action($sRow->sPath.'\PrepareStaffController@index', $sRow->id)); ?>">พนักงาน</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</fieldset>
						</div>
					</div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
	
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>