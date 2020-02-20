<?php $__env->startSection('content'); ?>
	

	</script>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li>ฝ่ายขนถ่ายสินค้าทางทะเล</li>
				<li class="active">การตรวจเช็คเครื่องจักร</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลการตรวจเช็คเครื่องจักร</h1>
			<!-- end page-header -->

			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">จัดการการตรวจเช็คเครื่องจักร</h4>
                        </div>

                        <div class="panel-body">
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-12 text-left" >
									<div class="pull-left">
										<select class="form-control myWhere input-sm" name="DepartmentID" >
											<option value="0">แผนกทุ่นทั้งหมด</option>
										<?php if( !empty($sRowDepartment) ): ?>
											<?php $__currentLoopData = $sRowDepartment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($row->id); ?>"><?php echo e($row->DepartmentName); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</select>
									</div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w150 text-center myLike" name="MachineType" type="text" placeholder="ประเภท"></div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w150 text-center myLike" name="MachineName" type="text" placeholder="เครื่องจักร"></div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w150 text-center myLike" name="MachineName" type="text" placeholder="เลขที่ใบตรวจ"></div>
								</div>
							</div>
                            <table id="data-table" class="table table-striped table-bordered"></table>
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
	// console.log(machine_id);
		oTable = $('#data-table').DataTable({
		pageLength	: 50,
        processing: true,
        serverSide: true,
        scroller: true,
		scrollCollapse: true,
        scrollX: true,
        stateSave: true,
		iDisplayLength: 50,
		order: [[ 0, "desc" ]],
		scrollY: ''+($(window).height()-300)+'px',
		"sDom": "<'row'<'col-sm-6'><'col-sm-6'>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
        ajax: {
			url: '<?php echo e(action("FTS\MachineController@checkInspectionDatatable")); ?>',
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
            {data: 'created_at', title :'วัน-เวลาที่สร้าง', className: 'text-center w80'},
            {data: 'InspectionCode', title :'เลขที่ใบตรวจ', className: 'text-center w80'},
			{data: 'InspectionStatus', title :'สถานะการตรวจ', className: 'text-center w100'},
			{data: 'InspectionCheck_at', title :'วันที่ตรวจเช็ค', className: 'text-center w100'},
			{data: 'InspectionApprove_at', title :'วันที่อนุมัติ', className: 'text-center w100'},
			{data: 'InspectionType', title :'ประเภทการตรวจ', className: 'text-center w100'},
            {data: 'MachineName', title :'<center>เครื่องจักร</center>', className: 'text-left w200'},
            {data: 'work_number', title :'ใบแจ้งงาน', className: 'text-center w80'},
            {data: 'DepartmentName', title :'แผนกทุ่น', className: 'text-center w100'},
            {data: 'MachineType', title :'ประเภทเครื่องจักร', className: 'text-center w100'},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			// if(aData['MachineType']=='Grab'){
      //
			// 	if (true) {
			// for (var i = 0; i < machine_id.length; i++) {
				// if(aData['id']==machine_id[i]){
					$('td:nth-child(2)', nRow).html(''
					+ '<a href="<?php echo e(action("FTS\MachineController@checkInspection")); ?>/'+aData['id']+'/'+(aData['deleted_at']?'?withTrashed=true':'')+'" style="margin:0px;">'+(aData['InspectionCode']?aData['InspectionCode']:'Wait')+'</a> '
					);

					// $('td:nth-child(2)', nRow).html(''
					// + '<a href="<?php echo e(action("FTS\MachineController@checkInspection")); ?>/'+aData['id']+'/'+aData['MachineNunber']+'/check'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-success" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> อนุมัติ</a> '
					// + '<a href="<?php echo e(action("FTS\MachineController@checkInspection")); ?>/'+aData['id']+'/'+aData['MachineNunber']+'/check'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-danger" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> ไม่อนุมัติ</a> '
          //
					// );
				// }
			// }

					// $('td:nth-child(1)', nRow).html(''
					// + '<a href="<?php echo e(action("FTS\MachineController@checkInspection")); ?>/'+aData['id']+'/'+aData['MachineNunber']+'/check'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> รอการตรวจเช็ค</a> '
					// );
				// }
        //
				// }


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