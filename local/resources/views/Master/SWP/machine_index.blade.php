@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li>Master Data</li>
				<li>ฝ่ายท่าสินวัฒนา</li>
				<li class="active">เครื่องจักร</li>
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
								<div class="col-md-9 text-left" >
									<div class="pull-left"><input class="form-control input-sm w250 text-center myLike" name="MachineType" type="text" placeholder="ประเภท"></div>
									<div class="pull-left m-l-10"><input class="form-control input-sm w250 text-center myLike" name="MachineName" type="text" placeholder="เครื่องจักร"></div>
									
									<div class="pull-left m-l-10 m-t-5">
										<label><input type="checkbox" id="onlyTrashed" value="1" > <span style="position: absolute;margin-top: -20px;margin-left: 17px;color: red;">แสดงรายการที่ลบ</span></label>
									</div>
									
								</div>
								<div class="col-md-3 text-right" >
									<a href="{{ action('Master\SWP\MachineController@create') }}" class="btn btn-sm btn-success">เพิ่มเครื่องจักร</a>
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
@stop
@push('scripts')
<script>
$(function() {
		oTable = $('#data-table').DataTable({
		pageLength	: 50,
        processing: true,
        serverSide: true,
		"sDom": "<'row'<'col-sm-6'><'col-sm-6'>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>", 
        ajax: {
			url: '{{ action("Master\SWP\MachineController@postDatatable") }}',
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
            {data: 'id', title :'Action', className: 'text-center action w80'},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			if( aData['deleted_at'] ){
				$('td', nRow).css('background-color', 'khaki');
				$('td:last-child', nRow).html('<a rel="{{ action("Master\SWP\MachineController@index") }}/'+aData['id']+'/?withTrashed=true" class="btn btn-xs btn-warning cDelete" style="margin:0px;"><i class="fa fa-trash-o"></i> กู้คืนข้อมูลที่ลบ</a>');
			}else{
				$('td:last-child', nRow).html(''
					+ '<a href="{{ action("Master\SWP\MachineController@index") }}/'+aData['id']+'/edit" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> '
					+ '<a rel="{{ action("Master\SWP\MachineController@index") }}/'+aData['id']+'/" class="btn btn-xs btn-danger cDelete" style="margin:0px;"><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
				);
			}
			@if (session('RecordID'))
				if( aData['id'] == '{{session('RecordID')}}' )	$('td', nRow).effect("highlight", {}, 4000);
			@endif
		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});
});
</script>
@endpush
