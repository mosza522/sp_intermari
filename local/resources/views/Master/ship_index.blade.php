@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลเรือ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลเรือ</h1>
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
                            <h4 class="panel-title">จัดการข้อมูลเรือ</h4>
                        </div>
						
                        <div class="panel-body">
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-6 text-left" >
									<input class="form-control input-sm w250 text-center myLike" name="ShipName" type="text" placeholder="ข้อมูลเรือ">
								</div>
								<div class="col-md-6 text-right" >
									<a href="{{ action('Master\ShipController@create') }}" class="btn btn-sm btn-success">เพิ่มข้อมูลเรือ</a>
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
			url: '{{ action("Master\ShipController@postDatatable") }}',
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
				oData = d;
			},
            method: 'POST'
        },
        columns: [
            {data: 'id', title :'No.', className: 'text-center w60'},
            //{data: 'ShipCode', title :'Code', className: 'text-center w80'},
            {data: 'ShipName', title :'ข้อมูลเรือ', className: 'text-center'},
			{data: 'created_at', title :'Created At', className: 'text-center w100'},
            {data: 'updated_at', title :'Updated At', className: 'text-center w100'},
            {data: 'id', title :'Action', className: 'text-center action w90' , orderable: false},
        ],
		rowCallback: function(nRow, aData, dataIndex){
			var info 	= oTable.page.info();
			var page 	= info.page;
			var length 	= info.length;
			var index	= (page * length + (dataIndex +1));
			$('td:eq(0)', nRow).html(index);
			
			$('td:last-child', nRow).html(''
				+ '<a href="{{ action("Master\ShipController@index") }}/'+aData['id']+'/edit" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> '
				+ '<a rel="{{ action("Master\ShipController@index") }}/'+aData['id']+'/" class="btn btn-xs btn-danger cDelete" style="margin:0px;"><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
			);
			@if (session('RecordID'))
				if( aData['id'] == '{{session('RecordID')}}' )	$('td', nRow).effect("highlight", {}, 4000);
			@endif
		}
    });
	$('.myWhere,.myLike').on('change', function(e){
		oTable.draw();
	});
});
</script>
@endpush
