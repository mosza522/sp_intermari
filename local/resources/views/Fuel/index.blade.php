@extends('Layouts.default')
@section('content')
	@php
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
	@endphp
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">ปริมาณน้ำมันคงเหลือ</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ปริมาณน้ำมันคงเหลือ </h1>
			<!-- end page-header -->

			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>
			        <h4 class="panel-title">ถังน้ำมัน</h4>
			    </div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
            {{-- <form action="{{url('fuel/index')}}" method="post" onsubmit="return check_before();"> --}}
							{{-- {{ csrf_field() }} --}}
							<div class="panel-body form-horizontal">

								<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
							</div>
						{{-- </form> --}}



</div>

				</div>
			</div>

			<div class="panel panel-inverse">
					<div class="panel-heading">
							<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">แก้ไขถังน้ำมัน</h4>
					</div>
				<div class="panel-body" style="">
					<div class="row" style="padding: 0px 2px 0 0;">
						{{-- <form action="{{url('fuel/index')}}" method="post" onsubmit="return check_before();"> --}}
							{{-- {{ csrf_field() }} --}}
							<div class="panel-body form-horizontal">

								<table id="data-table2" class="table table-striped table-bordered" width="100%"></table>
							</div>
						{{-- </form> --}}



			</div>

				</div>
			</div>
		</div>

@stop
@push('css')

@endpush
@push('scripts')
	<script type="text/javascript">
		function check_number(salary) {
		var vchar = String.fromCharCode(event.keyCode);
		if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
		salary.onKeyPress=vchar;

		}
	</script>
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
				url: '{{ action("Fuel\FuelController@postDatatable") }}',
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
	            {data: 'name', title :'ชื่อถัง', className:'w50' , defaultContent: '-'},
	            {data: 'balance', title :'ปริมาณน้ำมันคงเหลือ', className:'w150', defaultContent: '-',},
							{data: 'type', title :'ประเภทน้ำมัน', className:'w150', defaultContent: '-',},
							{data: 'id', title :'แก้ไข', className: 'text-center action w90',},


	        ],
			rowCallback: function(nRow, aData, dataIndex){
				if( aData['deleted_at'] ){
					$('td', nRow).css('background-color', 'khaki');
				}
				$('td:last-child', nRow).html(''
					+ '<a href="{{ action("Fuel\FuelController@index") }}/'+aData['id']+'/edit'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> '
				);

				@if (session('RecordID'))
					if( aData['id'] == '{{session('RecordID')}}' )	$('td', nRow).effect("highlight", {}, 4000);
				@endif

			}
	    });
		$('.myWhere,.myLike,#onlyTrashed').on('change', function(e){
			oTable.draw();
		});
		// $('#onlyTrashed').on('', function(e){
		// 	oTable.draw();
		// });
	});
	$(function() {

		var position="{{Auth::user()->PositionID}}";
		modal=''
			oTable = $('#data-table2').DataTable({
			"sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
				order: [[ 5, "asc" ]],
	        processing: true,
	        serverSide: true,
	        scroller: true,
			scrollCollapse: true,
	        scrollX: true,
	        stateSave: true,
			//scrollY: ''+($(window).height()-370)+'px',
			iDisplayLength: 10,
	        ajax: {
				url: '{{ action("Fuel\FuelstockController@postDatatableEditFuel") }}',
				data: function ( d ) {
					$('.btn-danger').click(function(){
						alert('xxxx');
					});

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
	            {data: 'code', title :'เลขที่', className: 'text-center w90', defaultContent: '-',},
	            {data: 'typeStock', title :'ประเภท' ,className:'w200', defaultContent: '-'},
	            {data: 'name', title :'ถังน้ำมัน', className:'w100', defaultContent: '-',},
							{data: 'amount', title :'จำนวน', className:'w50', defaultContent: '-',},
							{data: 'approve_status', title :'การอนุมัติ', className:'w100', defaultContent: 'รอดำเนินการ',},
							{data: 'created_at', title :'วันที่', className:'w150', defaultContent: '-',},
							{data: 'id', title :'แก้ไข', className: 'text-center action w250',},


	        ],
			rowCallback: function(nRow, aData, dataIndex){

				if( aData['deleted_at'] ){
					$('td', nRow).css('background-color', 'khaki');
				}
				if(position=='99' && !aData['approve_status']){
					if(aData['typeStock']=='แก้ไขน้ำมัน(ลด)'){
						$('td:last-child', nRow).html(''
						+ '<a href="" data-toggle="modal" data-target="#myModal'+aData['id']+'" class="btn btn-xs btn-primary" style="margin:0px;"> รายละเอียด</a> '
						+ '<a rel="{{ action("Fuel\FuelController@indexBalance") }}/'+aData['id']+'/del'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-danger cDelete"  style="margin:0px;" ><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
						+ '<a href="{{ action("Fuel\FuelController@indexBalance") }}/'+aData['id']+'/approve/reduce" class="btn btn-xs btn-success " style="margin:0px;" onclick="return confirm(\'are you sure ?\');"><i class="glyphicon glyphicon-ok"></i> อนุมัติ</a> '
						+ '<a href="{{ action("Fuel\FuelController@indexBalance") }}/'+aData['id']+'/notapprove" class="btn btn-xs btn-warning " style="margin:0px;" onclick="return confirm(\'are you sure ?\');"	><i class="glyphicon glyphicon-remove"></i> ไม่อนุมัติ</a> '
						);
					}else{
						$('td:last-child', nRow).html(''
						+ '<a href="" data-toggle="modal" data-target="#myModal'+aData['id']+'" class="btn btn-xs btn-primary" style="margin:0px;"> รายละเอียด</a> '
						+ '<a rel="{{ action("Fuel\FuelController@indexBalance") }}/'+aData['id']+'/del'+(aData['deleted_at']?'?withTrashed=true':'')+'" class="btn btn-xs btn-danger cDelete"  style="margin:0px;" ><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
						+ '<a href="{{ action("Fuel\FuelController@indexBalance") }}/'+aData['id']+'/approve/add" class="btn btn-xs btn-success " style="margin:0px;" onclick="return confirm(\'are you sure ?\');"><i class="glyphicon glyphicon-ok"></i> อนุมัติ</a> '
						+ '<a href="{{ action("Fuel\FuelController@indexBalance") }}/'+aData['id']+'/notapprove" class="btn btn-xs btn-warning " style="margin:0px;" onclick="return confirm(\'are you sure ?\');"	><i class="glyphicon glyphicon-remove"></i> ไม่อนุมัติ</a> '
						);
					}

			}else{
				$('td:last-child', nRow).html(''
				+ '<a href="" data-toggle="modal" data-target="#myModal'+aData['id']+'" class="btn btn-xs btn-primary" style="margin:0px;"> รายละเอียด</a> '
				+ '<a rel="{{ action("Fuel\FuelstockController@indexReceive") }}/'+aData['id']+'/del" class="btn btn-xs btn-danger cDelete" style="margin:0px;" ><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
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
		$('#onlyTrashed').on('change', function(e){
			oTable.draw();
		});
	});
	</script>
@endpush
