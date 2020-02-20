<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li>ฝ่ายท่าเรือสินวัฒนา</li>
				<li class="active">ข้อมูลเครื่องจักร</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลเครื่องจักร</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">จัดการเครื่องจักร</h4>
                        </div>
						
                        <div class="panel-body">
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-12 text-left" >
									<div class="pull-left"><input class="form-control input-sm w250 text-center myLike" name="MachineType" type="text" placeholder="ประเภท"></div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w250 text-center myLike" name="MachineName" type="text" placeholder="เครื่องจักร"></div>
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
		oTable = $('#data-table').DataTable({
		pageLength	: 50,
        processing: true,
        serverSide: true,
		"sDom": "<'row'<'col-sm-6'><'col-sm-6'>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>", 
        ajax: {
			url: '<?php echo e(action("Master\SWP\MachineController@postDatatable")); ?>',
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
            {data: 'MachineType', title :'ประเภท', className: 'text-center w80'},
            {data: 'MachineNunber', title :'รหัสเครื่องจักร', className: 'text-center w80'},
            {data: 'MachineName', title :'<center>เครื่องจักร</center>', className: 'text-left'},
            {data: 'MachineUsage', title :'สถานะการใช้งาน', className: 'text-center w100'},
			{data: 'MachineStatus', title :'สถานะเครื่องจักร', className: 'text-center w100'},
        ],
		rowCallback: function(nRow, aData, dataIndex){
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