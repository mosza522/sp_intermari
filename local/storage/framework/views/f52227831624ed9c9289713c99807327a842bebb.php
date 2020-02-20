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
	?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
        <li><a href="<?php echo e(action('Fuel\FuelController@indexBalance')); ?>">ถังน้ำมัน</a></li>
				<li class="active">แก้ถังน้ำมัน</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">แก้ถังน้ำมัน </h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">แก้ถังน้ำมัน</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						<?php if(!isset($id)): ?>
						
						<?php else: ?>
								<form action="<?php echo e(action('Fuel\FuelController@update')); ?>" method="post" onsubmit="return check_before();">
									<?php echo e(csrf_field()); ?>

									<?php
										$fuel= \App\Models\Fuel\Fuel::where('id',$id)->first();
									?>
									<input type="hidden" name="id" value="<?php echo e($id); ?>">
									<div class="panel-body form-horizontal">
										<div class="form-group">
		                <div class="col-md-2 col-sm-6 text-right">
		                  <label for="name" class="control-label">ชื่อถังน้ำมัน</label>
		                </div>
		                <div class="col-md-2 col-sm-6">
		                  <input class="form-control" type="text" name="name" value="<?php echo e($fuel->name); ?>" id="name" >
		                </div>
										<div class="tablet">
										<div class="col-md-2 col-sm-6 text-right">
		                  <label for="name" class="control-label">น้ำมันคงเหลือ</label>
		                </div>
		                <div class="col-md-2 col-sm-6">
		                  <input class="form-control" type="text" id="balance" name="balance" value="<?php echo e($fuel->balance); ?>" readonly>
		                </div>
										<div class="col-md-2 col-sm-6 text-right">
		                  <label for="name" class="control-label">ประเภทน้ำมัน</label>
		                </div>
										<div class="col-md-2 col-sm-6">
											<select class="form-control" name="type">
												<option value="">กรุณาเลือกประเภทน้ำมัน</option>
												<?php $__currentLoopData = $xml; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($val->PRICE != ''): ?>
														<?php if($fuel->type==$val->PRODUCT): ?>
															<option value="<?php echo e($val->PRODUCT); ?>" selected><?php echo e($val->PRODUCT); ?></option>
														<?php else: ?>
															<option value="<?php echo e($val->PRODUCT); ?>"><?php echo e($val->PRODUCT); ?></option>
														<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
		                </div>
										</div>
										<div class="form-group"></div>
										<div class="col-md-12 text-center butt">
												<button class="btn btn-success">บันทึก</button>
										</div>
										</div>
										</div>
									</form>
									<div class="col-md-12 text-center">
										<a href="" data-toggle="modal" data-target="#myModal1" class="btn btn-warning" style="margin:0px;"> เพิ่มปริมาณน้ำมัน</a>
										<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
											<div class="modal-dialog" role="document" style="width:80%;">
												
											<div class="modal-content">
												<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">เพิ่มปริมาณน้ำมัน</h4>
												</div>
													<div class="modal-body" style="height:100px">
														<form action="<?php echo e(action('Fuel\FuelstockController@AddFuel')); ?>" method="post">
															<?php echo e(csrf_field()); ?>

															<input type="hidden" name="id" value="<?php echo e($id); ?>">
															<div class="col-md-3 col-sm-3 text-right">
																	<label class="control-label amout" for="amout">จำนวนน้ำมัน :</label>
																</div>
																<div class="col-md-3 col-sm-3">
																	<input class="form-control" type="text" name="AddAmout" id="AddAmout" value="" onkeypress="return check_number(this);" required>
																</div>
																<div class="col-md-3 col-sm-3 text-right">
																	<label class="control-label amout" for="balance">น้ำมันคงเหลือ :</label>
																</div>
																<div class="col-md-3 col-sm-3">
																	<input class="form-control" type="text" name="AddBalance" id="AddBalance" value="<?php echo e(number_format($fuel->balance,2,'.','')); ?>" readonly>
																</div>
																<div class="col-md-12 text-center">
																	<br>
																	<p><font color="red">* เมื่อบันทึกแล้ว รอการอนุมัติจากผู้ตรวจ</font></p>
																</div>
																</div>

																<div class="modal-footer"  >

																	<button type="submit" class="btn btn-success" name="button">บันทึก</button>
															<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
													</div>
													</form>
													</div>

								</div>
							</div>

							<a href="" data-toggle="modal" data-target="#myModal2" class="btn btn-warning" style="margin:0px;"> ลดปริมาณน้ำมัน</a>
							<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
								<div class="modal-dialog" role="document" style="width:80%;">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">ลดปริมาณน้ำมัน</h4>
										</div>
											<div class="modal-body" style="height:100px">
												<form action="<?php echo e(action('Fuel\FuelstockController@ReduceFuel')); ?>" id="formReduce" method="post">
													<?php echo e(csrf_field()); ?>

													<input type="hidden" name="id" value="<?php echo e($id); ?>">
													<div class="col-md-3 col-sm-3 text-right">
															<label class="control-label amout" for="amout">จำนวนน้ำมัน :</label>
														</div>
														<div class="col-md-3 col-sm-3">
															<input class="form-control" type="text" name="ReduceAmout" id="ReduceAmout" value="" onkeypress="return check_number(this);" required>
														</div>
														<div class="col-md-3 col-sm-3 text-right">
															<label class="control-label amout" for="balance">น้ำมันคงเหลือ :</label>
														</div>
														<div class="col-md-3 col-sm-3">
															<input class="form-control" type="text" name="ReduceBalance" id="ReduceBalance" value="<?php echo e(number_format($fuel->balance,2,'.','')); ?>" readonly>
														</div>
														<div class="col-md-12 text-center">
															<br>
															<p><font color="red">* เมื่อบันทึกแล้ว รอการอนุมัติจากผู้ตรวจ</font></p>
														</div>
														</div>

														<div class="modal-footer"  >

															<button type="submit" id="sub" class="btn btn-success" name="button">บันทึก</button>
													<button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
											</div>
											</form>
											</div>
					</div>
				</div>
										
									</div>
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
	.amout{
		margin-top: 7px;
	}
	@media (max-width: 1023px) {
		.tablet{
			margin-top: 5rem;
		}
		.butt{
			margin-top: 10rem;
			text-align: center;
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
	$("#AddAmout").change(function(){
		if($("#AddAmout").val()==''){
			$("#AddAmout").val('0');
		}
		balance=parseFloat("<?php echo e($fuel->balance); ?>");
		amout=parseFloat($("#AddAmout").val());
		total=parseFloat(balance+amout);
		$("#AddBalance").val(parseFloat(total));
	});
	$("#ReduceAmout").change(function(){
		if($("#ReduceAmout").val()==''){
			$("#ReduceAmout").val('0');
		}
		balance=parseFloat("<?php echo e($fuel->balance); ?>");
		amout=parseFloat($("#ReduceAmout").val());
		total=parseFloat(balance-amout);
		$("#ReduceBalance").val(parseFloat(total));
	});
	$("#formReduce").submit(function(){
    if($("#ReduceBalance").val()<0) {
			alert('น้ำมันคงเหลือไม่สามารถติดลบ');
			return false;
		}
});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>