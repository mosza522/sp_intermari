<?php $__env->startSection('content'); ?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Home</li>
				<li>ฝ่ายท่าสินวัฒนา</li>
				<li>การปฏิบัติงานเรือใหญ่</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">การปฏิบัติงานเรือใหญ่ (ท่าเรือสินวัฒนา)</h1>
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
                            <h4 class="panel-title">รายการปฏิบัติงานเรือใหญ่</h4>
                        </div>
						
                        <div class="panel-body">
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-10 text-left" >
									<div class="pull-left"><input class="form-control input-sm w120 text-center myLike" name="work_number" type="text" placeholder="ใบแจ้งงาน"></div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w200 text-center myLike" name="BoatName" type="text" placeholder="เรือใหญ่"></div>
									<div class="pull-left m-l-10 m-t-5">
										<!--<label><input type="checkbox" id="onlyTrashed" value="1" > <span style="position: absolute;margin-top: -20px;margin-left: 17px;color: red;">แสดงรายการที่ลบ</span></label>-->
									</div>
								</div>
							
								<div class="col-md-2 text-right"></div>
							
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
			url: '<?php echo e(action("SWP\OperationController@postDatatable")); ?>',
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
            {data: 'job_number', title :'เลขที่เอกสาร', className: 'text-center w70', orderable: true},
            {data: 'work_number', title :'ใบแจ้งงาน', className: 'text-center w70', orderable: true},
            {data: 'BoatName', title :'เรือใหญ่', orderable: false},
            {data: 'job_date_eta', title :'วันที่เรือใหญ่', className: 'text-center w90', orderable: false},
            {data: 'job_weight', title :'น้ำหนักรวม', className: 'text-right w70', defaultContent: '-', orderable: false},
            {data: 'job_transport', title :'ประเภทงาน', className: 'text-center w70', defaultContent: '-', orderable: false},
			{data: 'id', title :'ดำเนินการ', className: 'text-center action w60', orderable: false},
		
        ],
		rowCallback: function(nRow, aData, dataIndex){
			if( aData['deleted_at1'] || aData['deleted_at2'] ){
				$('td', nRow).css('background-color', 'khaki');
			}
			$('td:last-child', nRow).html(''
				+ '<a href="<?php echo e(action("SWP\OperationController@index")); ?>/'+aData['id']+'/" class="btn btn-xs btn-primary" style="margin:0px;"><i class="fa fa-eye"></i> ดำเนินการ</a> '
			);
		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>