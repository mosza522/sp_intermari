@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">กลุ่มผู้ใช้งานแต่ละฝ่าย</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">กลุ่มผู้ใช้งานแต่ละฝ่าย</h1>
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
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">จัดการกลุ่มผู้ใช้งานแต่ละฝ่าย</h4>
                        </div>
						
                        <div class="panel-body">
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-6 text-left" >
								<!--
									<div class="pull-left w120">
										<select class="form-control input-sm w110" name="cDcUser_1">
										<option value="">เลือก Detail</option>
										<option value="4" >พี่อลิส</option>
										<option value="5" >พี่โอ๋</option>
										<option value="6" >พี่หมอ</option>
										<option value="7" >พี่ควร</option>
										<option value="8" >พี่เฟิน</option>
										<option value="9" >พี่ดา</option>
										<option value="10" >พี่อุ๊</option>
										</select>
									</div>
									-->
								</div>
								<div class="col-md-6 text-right" >
									<a href="{{ action('Master\PositionController@create') }}" class="btn btn-sm btn-success">เพิ่มกลุ่มผู้ใช้งาน</a>
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
		"sDom": "<'row'<'col-sm-6'><'col-sm-6'>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>", 
        processing: true,
        serverSide: true,
        ajax: {
			url: '{{ action("Master\PositionController@postDatatable") }}',
			data: function ( d ) {},
            method: 'POST'
        },
        columns: [
            {data: 'PositionCode', title :'รหัสกลุ่ม', className: 'text-center'},
            {data: 'PositionName', title :'ฝ่าย'},
            {data: 'PositionDesc', title :'รายละเอียดของฝ่ายหรือกลุ่มเมนูที่เกี่ยวของ'},
            //{data: 'created_at', title :'Created At', className: 'text-center'},
            //{data: 'updated_at', title :'Updated At', className: 'text-center'},
            {data: 'id', title :'Action', className: 'text-center action w90' , orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			$('td:last-child', nRow).html(''
				+ '<a href="{{ action("Master\PositionController@index") }}/'+aData['id']+'/edit" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> '
				+ '<a rel="{{ action("Master\PositionController@index") }}/'+aData['id']+'/" class="btn btn-xs btn-danger cDelete" style="margin:0px;"><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
			);
		}
    });
});
</script>
@endpush
