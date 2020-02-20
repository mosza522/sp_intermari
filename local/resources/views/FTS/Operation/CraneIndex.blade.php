@extends('Layouts.default')
@section('data-table')
	<div class="col-md-12 m-t-25">
		<div class="p-l-0 text-left pull-right">
			<a href="{{ action('FTS\OperationCraneController@create', $sRow->id) }}" class="btn btn-sm btn-primary">บันทึกการปฏิบัติงานเครน</a>
		</div>
		<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
	</div>
@stop

@section('pageHeader')
รายการปฏิบัติงานเครน
@stop

@section('content')
	@include('FTS.Operation._inc_content_index')
@stop


@push('scripts')
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
			url: '{{ action("FTS\OperationCraneController@postDatatable",$sRow->id) }}',
			data: function ( d ) { },
            method: 'POST'
        },
        columns: [
            {data: 'workNumber', title :'เลขที่เอกสาร', className: 'text-center w70', orderable: true},
            {data: 'workDate', title :'วันที่', className: 'text-center w70', orderable: true},
            {data: 'created', title :'เพิ่มรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'created_at', title :'เพิ่มรายการเมื่อ', className: 'text-center w120', orderable: false},
            {data: 'updated', title :'อัพเดพรายการโดย', className: 'text-center w125', orderable: false},
            {data: 'updated_at', title :'อัพเดพรายการเมื่อ', className: 'text-center w120', orderable: false},
			{data: 'id', title :'เปิดเอกสาร', className: 'text-center action w60', orderable: false}
		
        ],
		rowCallback: function(nRow, aData, dataIndex){
			if( aData['deleted_at1'] || aData['deleted_at2'] ){
				$('td', nRow).css('background-color', 'khaki');
			}
			$('td:last-child', nRow).html(''
				+ '<a href="{{ action("FTS\OperationCraneController@index",$sRow->id ) }}/'+aData['id']+'" class="btn btn-xs btn-primary" style="margin:0px;"><i class="fa fa-eye"></i> เปิดเอกสาร</a> '
			);
		}
    });
	$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
		oTable.draw();
	});
});
</script>
@endpush