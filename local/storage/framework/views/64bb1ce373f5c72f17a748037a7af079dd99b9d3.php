<?php $__env->startSection('content'); ?>
		<div id="xfocus"></div>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">บันทึกใบสั่งขาย (SALE ORDER)</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> บันทึกใบสั่งขาย (SALE ORDER)</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
					<form action="<?php if(empty($sRow)): ?> <?php echo e(action('SMD\SMDController@store')); ?><?php else: ?> <?php echo e(action('SMD\SMDController@update', $sRow->id )); ?><?php endif; ?>" method="POST" autocomplete="off">
						<?php echo e(csrf_field()); ?>

						<?php if( !empty($sRow) ): ?><input name="_method" type="hidden" value="PUT"><?php endif; ?>
						<!-- begin panel -->
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fa fa-desktop"></i>  ใบสั่งขาย (SALE ORDER)</h4>
							</div>
							<div class="panel-body form-horizontal">
								<fieldset class="m-t-15">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">เลขที่เอกสาร</label>
											<div class="row col-md-9">
												<div class="pull-left m-l-10" style="width: 32%;">
													<input type="text" class="form-control text-center" name="job_number" placeholder="Auto" value="<?php echo e(isset($sRow->job_number)?$sRow->job_number:old('job_number')); ?>" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 32%;">
													<input type="text" class="form-control text-center" name="job_number" value="<?php echo e(isset($sRow->created_at)?date('d-m-Y',strtotime($sRow->created_at)):date('d-m-Y')); ?>" readonly />
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ลูกค้า</label>
											<div class="col-md-9">
												<div class="pull-left" style="width: 63%;">
													<input type="text" class="form-control AutoComplete" data-Models="Master\SMD\Owner" data-Field="OwnerName" placeholder="ระบุ" value="<?php echo e(isset($sRow->OwnerName)?$sRow->OwnerName:old('OwnerName')); ?>"  />
													<input name="OwnerID" type="hidden" value="<?php echo e(isset($sRow->OwnerID)?$sRow->OwnerID:''); ?>"  >
												</div>
												<div class="pull-left m-l-10" style="width:34%;">
													<select class="form-control" name="job_customer_type" >
														<option value="1" <?php echo e(@$sRow->job_customer_type=='1'?'selected':''); ?>>ผู้ซื้อ</option>
														<option value="2" <?php echo e(@$sRow->job_customer_type=='2'?'selected':''); ?>>ผู้ขาย</option>
														<option value="3" <?php echo e(@$sRow->job_customer_type=='3'?'selected':''); ?>>ผู้ให้บริการขนส่ง</option>
														<option value="4" <?php echo e(@$sRow->job_customer_type=='4'?'selected':''); ?>>Agent</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">เรือใหญ่</label>
											<div class="col-md-9">
												<input type="text" class="form-control AutoComplete" data-Models="Master\SMD\Boat" data-Field="BoatName" placeholder="เรือใหญ่" value="<?php echo e(isset($sRow->BoatName)?$sRow->BoatName:old('BoatName')); ?>" required />
												<input name="BoatID" type="hidden" value="<?php echo e(isset($sRow->BoatID)?$sRow->BoatID:''); ?>" required >
											</div>
										</div>
									
										<div class="form-group">
											<label class="col-md-3 control-label">ประเภทงาน</label>
											<div class="col-md-9">
												<select class="form-control" name="job_transport" >
													<option value="Discharge" <?php echo e(@$sRow->job_transport=='Discharge'?'selected':''); ?>>Discharge </option>
													<option value="Load" <?php echo e(@$sRow->job_transport=='Load'?'selected':''); ?>>Load</option>
													<option value="Other" <?php echo e(@$sRow->job_transport=='Other'?'selected':''); ?>>Other</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label m-r-10">ETA/วันที่เรือใหญ่</label>
											<div class='col-md-8 input-group date datetimepicker'>
												<input type='text' class="form-control" name="job_date_eta" value="<?php echo e(isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta')); ?>" readonly />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">ประเภทสินค้า</label>
											<div class="col-md-9">
												<div class="pull-left" style="width: 35%;">
													<select class="form-control" name="job_category" id="job_category" >
														<option value="1" <?php echo e(@$sRow->job_category=='1'?'selected':''); ?>>เทกอง</option>
														<option value="2" <?php echo e(@$sRow->job_category=='2'?'selected':''); ?>>เครื่องจักร</option>
														<option value="3" <?php echo e(@$sRow->job_category=='3'?'selected':''); ?>>ชิ้น</option>
													</select>
												</div>
												<div class="pull-left m-l-5" style="width: 20%;">
													<input type="text" class="form-control text-right" value="หน่วยนับ" readonly style="border: transparent;background-color: white;color: black;opacity: 1;" />
												</div>
												<div class="pull-left m-l-5" style="width:21%;">
													<select class="form-control" name="job_unit" >
														<option value="ตัน" <?php echo e(@$sRow->job_unit=='ตัน'?'selected':''); ?>>ตัน</option>
														<option value="ชิ้น" <?php echo e(@$sRow->job_unit=='ชิ้น'?'selected':''); ?>>ชิ้น</option>
														<option value="pc" <?php echo e(@$sRow->job_unit=='pc'?'selected':''); ?>>pc</option>
														<option value="set" <?php echo e(@$sRow->job_unit=='set'?'selected':''); ?>>set</option>
														<option value="ชุด" <?php echo e(@$sRow->job_unit=='ชุด'?'selected':''); ?>>ชุด</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">สินค้า</label>
											<div class="row col-md-9 Product_List">
												<?php if( !empty($rowSmd2Item) ): ?>
													<?php $__currentLoopData = $rowSmd2Item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="Product_Item">
													<div class="pull-left m-l-10 m-b-5" style="width:81%;"> 
														<input type="text" style="width: 66%;" class="form-control AutoComplete pull-left m-r-5 ProductName" data-Field="ProductName" data-Models="jobProduct" id="<?php echo e(empty($sRow->job_category)?'1':$sRow->job_category); ?>" placeholder="สินค้า" value="<?php echo e(isset($row->ProductName)?$row->ProductName:old('ProductName')); ?>"/>
														<input name="ProductID[]" type="hidden" value="<?php echo e(isset($row->ProductID)?$row->ProductID:old('ProductID')); ?>" class="ProductID"/>
														<input type="text" style="width: 30%;" class="form-control price text-right pull-left" name="Weight[]" placeholder="ปริมาณ" value="<?php echo e(isset($row->Weight)?number_format($row->Weight,3):'0'); ?>" required />
													</div>
													<div class="pull-right m-l-10 m-b-5 Product_btn" style="width:13%;padding-top:5px;"></div>
												</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
												<div class="Product_Item">
													<div class="pull-left m-l-10 m-b-5" style="width:81%;">
														<input type="text" style="width: 66%;" class="form-control AutoComplete pull-left m-r-5 ProductName" data-Field="ProductName" data-Models="jobProduct" id="<?php echo e(empty($sRow->job_category)?'1':$sRow->job_category); ?>" placeholder="สินค้า" />
														<input name="ProductID[]" type="hidden" class="ProductID"/>
														<input type="text" style="width: 30%;" class="form-control price text-right pull-left" name="Weight[]" placeholder="ปริมาณ" required />
													</div>
													<div class="pull-right m-l-10 m-b-5 Product_btn" style="width:13%;padding-top:5px;"></div>
												</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">น้ำหนักรวม</label>
											<div class="col-md-9">
												<input type="text" style="width: 80%;" class="form-control price text-right job_weight" name="job_weight" placeholder="ปริมาณ" value="<?php echo e(isset($sRow->job_weight)?number_format($sRow->job_weight,3):'0'); ?>" readonly />
											</div>
										</div>
										
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">หมายเหตุ</label>
											<div class="col-md-9">
												<textarea class="form-control" name="job_note" rows="3" style="width:80%;"><?php echo e(isset($sRow->job_note)?$sRow->job_note:''); ?></textarea>
											</div>
										</div>
										
									</div>
									<div class="col-md-12 ">

									<table class="text-inverse m-t-20 m-b-5 m-l-20">
										<tbody>
											<?php if( !empty($rowItem['FTS']['Buoy']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานทุ่น </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['FTS']['Buoy']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@Buoy', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
											
											<?php if( !empty($rowItem['FTS']['StevieDore']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานสตีวีโดร์ </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['FTS']['StevieDore']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@StevieDore', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
											
											<?php if( !empty($rowItem['RTM']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานเรือ </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['RTM']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@Ship', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
											
											<?php if( !empty($rowItem['CLM']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานแบคโฮ </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['CLM']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@BlackHole', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
											
											<?php if( !empty($rowItem['TRU']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานรถบรรทุก </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['TRU']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@Truck', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
											
											<?php if( !empty($rowItem['SWP']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานท่าสิน </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['SWP']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@ThaSin', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
											
											<?php if( !empty($rowItem['ETE']) ): ?>
											<tr style="height: 30px;">
												<td class="w150">
													<i class="fa fa-caret-right fa-2x pull-left fa-fw"></i>
													<div class="m-t-4">ใบแจ้งงานอื่น ๆ </div>
												</td>
												<td>
													<?php $__currentLoopData = $rowItem['ETE']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<a href="<?php echo e(action('SMD\SMDController@Other', array($sRow->id, $row->id, 'withTrashed'=>request('withTrashed')) )); ?>" class="btn btn-<?php echo e($row->deleted_at?'danger':'success'); ?> btn-xs m-r-5"><?php echo e($row->work_number); ?></a>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
										
									</div>
									<?php if( empty($sRow->deleted_at) ): ?>
									<div class="col-md-12">
										<div class="form-group m-t-30 m-b-5">
											<div class="col-xs-4 text-left"></div>
											<div class="col-xs-4 text-center">
												<button type="submit" class="btn btn-sm btn-primary m-r-5"><?php if(empty($sRow)): ?> เพิ่มข้อมูลใบสั่งขาย (SALE ORDER) <?php else: ?> ปรับข้อมูลใบสั่งขาย (SALE ORDER) <?php endif; ?> </button>
											</div>
											<div class="col-xs-4 text-right">
											<?php if(!empty($sRow) && empty($sRow->deleted_at) ): ?>
												<div class="btn-group dropup m-b-5">
													<a href="javascript:;" class="btn btn-warning"> ออกใบแจ้งงาน</a>
													<a href="javascript:;" data-toggle="dropdown" class="btn btn-warning dropdown-toggle" aria-expanded="false">
														<span class="caret"></span>
													</a>
													<ul class="dropdown-menu pull-right" style="background-color: burlywood;">
													
														<?php if( empty($rowItem['FTS']['Buoy']) ): ?>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@Buoy',$sRow->id)); ?>">ทุ่น</a></li> 
														<?php endif; ?>
														<?php if( empty($rowItem['FTS']['StevieDore']) ): ?>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@StevieDore',$sRow->id)); ?>">สตีวีโดร์</a></li>
														<?php endif; ?>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@Ship',$sRow->id)); ?>">เรือ</a></li>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@BlackHole',$sRow->id)); ?>">แบคโฮ</a></li>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@Truck',$sRow->id)); ?>">รถบรรทุก</a></li>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@ThaSin',$sRow->id)); ?>">ท่าสิน</a></li>
														<li class="divider"></li>
														<li><a class="" href="<?php echo e(action('SMD\SMDController@Other',$sRow->id)); ?>">อื่น ๆ</a></li>
													</ul>
												</div>
											<?php endif; ?>
											</div>
										</div>
									</div>
									<?php endif; ?>
								</fieldset>
							</div>
						</div>
					</form>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<style>
#xfocus {
	display:none;
	font-family: Helvetica, sans-serif;
	word-wrap: break;
	width: 375px;
	background: navajowhite;
	padding: 7px;
	position: relative;
	z-index: 99999;
	border-radius: 5px;
	border: 2px solid #73AD21;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
var job_weight;
$(function() {
	$('.AutoComplete' ).autocomplete({
		minLength: 1,
		source: function( request, response ) {
            var Field 	= this.element.attr('data-Field');
            var Models 	= this.element.attr('data-Models')?this.element.attr('data-Models'):true;
			$.ajax({
				type	: 'POST',
				url		: '<?php echo e(action("AutocompleteController@getSearch")); ?>',
				dataType: "json",
				data	: { Models: Models, Field: Field, query: request.term, Id: this.element.attr('id') },
				success	: function( data ) {
					response( $.map( data, function( result ) {
						return {label: result.value, value: result.value, id: result.id}
					}));
				}
			});
		},
		select: function( event, ui ) {
			var _this = $(this);
			$( '.ProductID' ).each(function(index) {
				if( ui.item.id == $(this).val() ){
					alert('ไม่สามารถเพิ่มรายการสินค้านี้ได้');
					setTimeout(function(){
						_this.val('');
						_this.next().val('');
					}, 500);
					return false;
				}
			});
			_this.next().val(ui.item.id);
		},
		change: function( event, ui ){
			if( !ui.item ){
				$(this).val('');
				$(this).next().val('');
			}
		}
	});
	
	$('.panel-body').on('change' , '.Option1', function (e) {
		if( $(this).val() == '1' ){
			$(this).parent().next().show();
			if( $(this).parent().next().find('select').val() == '1' )
			$(this).parent().next().next().show();
		}else{
			$(this).parent().next().hide();
			$(this).parent().next().next().hide();
		}
	});	
	
	$('.panel-body').on('change' , '#job_category', function (e) {
		$('.Product_Item .ProductName').attr('id',$(this).val());
		$('.Product_List .Product_Item:eq(1)').remove();
		$('.Product_List .Product_Item:eq(1)').remove();
		$('.Product_List .Product_Item:eq(1)').remove();
		$('.Product_List .Product_Item:eq(1)').remove();
		$('.Product_List .Product_Item:eq(0)').find('input').val('');
		ProductList();
	});	
	
	

	
	
	
	/************************************************************************/
	ProductList();
	$( '.Product_List' ).on( "click", ".Product_btn .btn-danger", function() {
		if(confirm('ยืนยันการทำรายการ ?') == true){
			$(this).parent().parent().remove();
			ProductList();
			JobWeight();
		}
	});
	$( '.Product_List' ).on( "click", ".Product_btn .btn-success", function() {
        $('.Product_List .Product_Item').last().clone().appendTo('.Product_List');
		$('.Product_List .Product_Item').last().find('input').val('');
		$('.Product_List .Product_Item').last().find('.AutoComplete').autocomplete({
			minLength: 1,
			source: function( request, response ) {
				var Field 	= this.element.attr('data-Field');
				var Models 	= this.element.attr('data-Models')?this.element.attr('data-Models'):true;
				$.ajax({
					type	: 'POST',
					url		: '<?php echo e(action("AutocompleteController@getSearch")); ?>',
					dataType: "json",
					data	: { Models: Models, Field: Field, query: request.term, Id: this.element.attr('id') },
					success	: function( data ) {
						response( $.map( data, function( result ) {
							return {label: result.value, value: result.value, id: result.id}
						}));
					}
				});
			},
			select: function( event, ui ) {
				var _this = $(this);
				$( '.ProductID' ).each(function(index) {
					if( ui.item.id == $(this).val() ){
						alert('ไม่สามารถเพิ่มรายการสินค้านี้ได้');
						setTimeout(function(){
							_this.val('');
							_this.next().val('');
						}, 500);
						return false;
					}
				});
				_this.next().val(ui.item.id);
			},
			change: function( event, ui ){
				if( !ui.item ){
					$(this).val('');
					$(this).next().val('');
				}
			}
		});
		
		$('.panel-body').on('change' , '.Option1', function (e) {
			if( $(this).val() == '1' ){
				$(this).parent().next().show();
				if( $(this).parent().next().find('select').val() == '1' )
				$(this).parent().next().next().show();
			}else{
				$(this).parent().next().hide();
			}
		});	
		ProductList();
	});


	$('.datetimepicker').datetimepicker({
		format : 'DD-MM-YYYY HH:mm',
		ignoreReadonly: true
	});
});







ProductList = function(){
	$( '.Product_List .Product_Item' ).each(function(index, element) {
		$(this).find('.Product_btn a').remove();
		if( $(this).index() != 0 ){
			$(this).find('.Product_btn').append( '<a class="btn btn-danger btn-icon btn-circle btn-sm m-r-5"><i class="fa fa-times"></i></a>' );
		}
	});
	$('.Product_List .Product_Item').last().find('.Product_btn').append( '<a class="btn btn-success btn-icon btn-circle btn-sm"><i class="fa fa-plus-square-o"></i></a>' );
}


$(document).on('keyup', '.Product_List .Product_Item .price', function() {
	JobWeight();
});
JobWeight = function(){
	job_weight = 0;
	$( '.Product_List .Product_Item' ).each(function(index, element) {
		job_weight = job_weight + parseFloat($(this).find('.price').val().replace(/,/g, ''));
	});
	$('.job_weight').val(frm.AddCommas(job_weight.toFixed(3)));
}

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.default', ['sTitle' => empty($sTitle)?NULL:$sTitle], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>