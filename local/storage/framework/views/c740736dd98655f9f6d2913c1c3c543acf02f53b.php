<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">บันทึกใบสั่งขาย (SALE ORDER)</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">บันทึกใบสั่งขาย (SALE ORDER)</h1>
			<!-- end page-header -->

			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">รายการบันทึกใบสั่งขาย (SALE ORDER)</h4>
                        </div>

                        <div class="panel-body">
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-10 text-left" >
									<div class="pull-left"><input class="form-control input-sm w120 text-center myLike" name="job_number" type="text" placeholder="เลขที่เอกสาร"></div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w200 text-center myLike" name="BoatName" type="text" placeholder="เรือใหญ่"></div>
									<div class="pull-left m-l-10">
										<?php if( !empty($rowJobStatus) ): ?>
										<select class="form-control input-sm w140 myWhere" name="StatusID">
											<option value="0">สถานะใบสั่งขาย</option>
											<?php $__currentLoopData = $rowJobStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($row->id); ?>"><?php echo e($row->Status_Name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php endif; ?>
									</div>
									<div class="pull-left m-l-10">
										<?php if( !empty($rowJobMode) ): ?>
										<select class="form-control input-sm w130 myWhere" name="ModeID">
											<option value="0">ประเภทใบสั่งขาย</option>
											<?php $__currentLoopData = $rowJobMode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($row->id); ?>"><?php echo e($row->Mode_Name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php endif; ?>
									</div>
									<div class="pull-left m-l-10 m-t-5">
										<label><input type="checkbox" id="onlyTrashed" value="1" > <span style="position: absolute;margin-top: -20px;margin-left: 17px;color: red;">แสดงรายการที่ลบ</span></label>
									</div>
								</div>

								<div class="col-md-2 text-right" >
									<a href="<?php echo e(action('SMD\SMDController@create')); ?>" class="btn btn-sm btn-success">เพิ่มใบสั่งขาย (SALE ORDER)</a>
								</div>

							</div>

                            <table id="data-table" class="table table-striped table-bordered" width="100%"></table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
		oTable = $('#data-table').DataTable({
		"sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
		order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		//scrollY: ''+($(window).height()-370)+'px',
		iDisplayLength: 10,
        ajax: {
			url: '<?php echo e(action("SMD\SMDController@postDatatable")); ?>',
			data: function ( d ) {
				d.Where={};
				$('#btn-Excel').css("display", "none");
				if( $('#Search').val() == '' )	$('#btn-Excel').css("display", "initial");
				$('.myWhere').each(function() {
					if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
						d.Where[$(this).attr('name')] = $.trim($(this).val());
						if( $('#Search').val() == '' )	$('#btn-Excel').css("display", "initial");
					}
				});
				d.Like={};
				$('.myLike').each(function() {
					if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
						d.Like[$(this).attr('name')] = $.trim($(this).val());
					}
				});
				d.onlyTrashed=$('#onlyTrashed').is(':checked');
				oData = d;
			},
            method: 'POST'
        },
        columns: [
            {data: 'job_number', title :'เลขที่เอกสาร', className: 'text-center w70', defaultContent: '-'},
            {data: 'BoatName', title :'เรือใหญ่', defaultContent: '-'},
            {data: 'job_date_eta', title :'วันที่เรือใหญ่', className: 'text-center w100', defaultContent: '-', orderable: false},
            {data: 'job_transport', title :'ประเภทงาน', className: 'text-center w70', defaultContent: '-', orderable: false},
            {data: 'job_weight', title :'น้ำหนัก/ตัน', className: 'text-right w70', defaultContent: '-', orderable: false},
            {data: 'Status_Name', title :'สถานะใบสั่งขาย', className: 'text-center w90', defaultContent: '-', orderable: false},
            {data: 'Mode_Name', title :'ประเภทใบสั่งขาย', className: 'text-center w100', defaultContent: '-', orderable: false},
			{data: 'id', title :'แก้ไข', className: 'text-center action w90', orderable: false},

        ],
		rowCallback: function(nRow, aData, dataIndex){
			if( aData['deleted_at'] ){
				$('td', nRow).css('background-color', 'khaki');
			}
			$('td:last-child', nRow).html(''
				+ '<a href="<?php echo e(action("SMD\SMDController@index")); ?>/'+aData['id']+'/edit'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> '
				+ '<a rel="<?php echo e(action("SMD\SMDController@index")); ?>/'+aData['id']+'/" class="btn btn-xs btn-danger cDelete" style="margin:0px;"><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
			);

			<?php if(session('RecordID')): ?>
				if( aData['id'] == '<?php echo e(session('RecordID')); ?>' )	$('td', nRow).effect("highlight", {}, 4000);
			<?php endif; ?>

		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>