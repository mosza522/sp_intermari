@extends('Layouts.default')
@section('content')
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Master File</a></li>
				<li class="active">ข้อมูลลูกค้า</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">ข้อมูลลูกค้า</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
				
				
					<form  action="@if(empty($sRow)) {{ action('Master\SMD\OwnerController@store') }}@else {{action('Master\SMD\OwnerController@update', $sRow->id )}}@endif" method="POST">
						{{ csrf_field() }}
						@if( !empty($sRow) )<input name="_method" type="hidden" value="PUT">@endif
						
						<!-- begin panel -->
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								</div>
								<h4 class="panel-title">Address</h4>
							</div>
							<div class="panel-body form-horizontal" >
                                <fieldset>
                                    <legend>ข้อมูลลูกค้า</legend>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">รหัสลูกค้า</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerCode" placeholder="รหัสลูกค้า" value="{{ isset($sRow->OwnerCode)?$sRow->OwnerCode:old('OwnerCode') }}" {{ isset($sRow->OwnerCode)?'readonly':'required' }} />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ชื่อลูกค้า</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerName" placeholder="ชื่อลูกค้า" value="{{ isset($sRow->OwnerName)?$sRow->OwnerName:old('OwnerName') }}" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ชื่อลูกค้า [ออกบิล]</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerNameBill" placeholder="ชื่อลูกค้า [ออกบิล]" value="{{ isset($sRow->OwnerNameBill)?$sRow->OwnerNameBill:old('OwnerNameBill') }}" />
											</div>
										</div>
									</div>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">สถานะลูกค้า</label>
											<div class="col-md-9">
												<select name="PosiCode" class="form-control">
													<option value="">เลือกสถานะลูกค้า</option>
												@if( !empty($dPosition) )
													@foreach($dPosition AS $row)
													<option value="{{$row->PosiCode}}" {{ @$sRow->PosiCode==$row->PosiCode?'selected':'' }}>{{$row->PosiTitle}} ({{$row->PosiCode}})</option>
													@endforeach
												@endif
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ชื่อลูกค้า [Eng]</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerNameEng" placeholder="ชื่อลูกค้า [Eng]" value="{{ isset($sRow->OwnerNameEng)?$sRow->OwnerNameEng:old('OwnerNameEng') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Short Name</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerShortName" placeholder="Short Name" value="{{ isset($sRow->OwnerShortName)?$sRow->OwnerShortName:old('OwnerShortName') }}" />
											</div>
										</div>
									</div>
									
									
                                    <legend>ที่อยู่ ภ.พ. 20</legend>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">ที่อยู่เลขที่</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerAddress20" placeholder="ที่อยู่เลขที่" value="{{ isset($sRow->OwnerAddress20)?$sRow->OwnerAddress:old('OwnerAddress20') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">แขวง/ตําบล</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerTambon20" placeholder="แขวง/ตําบล" value="{{ isset($sRow->OwnerTambon20)?$sRow->OwnerTambon:old('OwnerTambon20') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">จังหวัด</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerProvince20" placeholder="จังหวัด" value="{{ isset($sRow->OwnerProvince20)?$sRow->OwnerProvince20:old('OwnerProvince20') }}" />
											</div>
										</div>
									</div>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">ถนน</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerRoad20" placeholder="ถนน" value="{{ isset($sRow->OwnerRoad20)?$sRow->OwnerRoad20:old('OwnerRoad20') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">เขต/อําเภอ</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerAmphoe20" placeholder="เขต/อําเภอ" value="{{ isset($sRow->OwnerAmphoe20)?$sRow->OwnerAmphoe20:old('OwnerAmphoe20') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">รหัสไปรษณีย์</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerPostCode20" placeholder="รหัสไปรษณีย์" value="{{ isset($sRow->OwnerPostCode20)?$sRow->OwnerPostCode20:old('OwnerPostCode20') }}" />
											</div>
										</div>
									</div>
									
                                    <legend>ที่อยู่ที่ติดต่อ <span style="font-size: 11px;color: blue;cursor: pointer;" id="copyAddress"> ตามที่อยู่ ภ.พ. 20 <i class="fa fa-copy"></i></span></legend>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">ที่อยู่เลขที่</label>
											<div class="col-md-9">
												<input type="text" class="form-control copyA" name="OwnerAddress" placeholder="ที่อยู่เลขที่" value="{{ isset($sRow->OwnerAddress)?$sRow->OwnerAddress:old('OwnerAddress') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">แขวง/ตําบล</label>
											<div class="col-md-9">
												<input type="text" class="form-control copyA" name="OwnerTambon" placeholder="แขวง/ตําบล" value="{{ isset($sRow->OwnerTambon)?$sRow->OwnerTambon:old('OwnerTambon') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">จังหวัด</label>
											<div class="col-md-9">
												<input type="text" class="form-control copyA" name="OwnerProvince" placeholder="จังหวัด" value="{{ isset($sRow->OwnerProvince)?$sRow->OwnerProvince:old('OwnerProvince') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">โทรศัพท์</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerTel" placeholder="โทรศัพท์" value="{{ isset($sRow->OwnerTel)?$sRow->OwnerTel:old('OwnerTel') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">อีเมล์</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerMail" placeholder="อีเมล์" value="{{ isset($sRow->OwnerMail)?$sRow->OwnerMail:old('OwnerMail') }}" />
											</div>
										</div>
									</div>
									<div class="col-md-6 m-b-10">
										<div class="form-group">
											<label class="col-md-3 control-label">ถนน</label>
											<div class="col-md-9">
												<input type="text" class="form-control copyA" name="OwnerRoad" placeholder="ถนน" value="{{ isset($sRow->OwnerRoad)?$sRow->OwnerRoad:old('OwnerRoad') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">เขต/อําเภอ</label>
											<div class="col-md-9">
												<input type="text" class="form-control copyA" name="OwnerAmphoe" placeholder="เขต/อําเภอ" value="{{ isset($sRow->OwnerAmphoe)?$sRow->OwnerAmphoe:old('OwnerAmphoe') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">รหัสไปรษณีย์</label>
											<div class="col-md-9">
												<input type="text" class="form-control copyA" name="OwnerPostCode" placeholder="รหัสไปรษณีย์" value="{{ isset($sRow->OwnerPostCode)?$sRow->OwnerPostCode:old('OwnerPostCode') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">แฟกซ์</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerFax" placeholder="แฟกซ์" value="{{ isset($sRow->OwnerFax)?$sRow->OwnerFax:old('OwnerFax') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Homepage</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwnerHomepage" placeholder="Homepage" value="{{ isset($sRow->OwnerHomepage)?$sRow->OwnerHomepage:old('OwnerHomepage') }}" />
											</div>
										</div>
									</div>
    
									<div class="col-md-12 m-t-10">
										<div class="form-group">
											<center>
												@if(empty($sShow))
												<button type="submit" class="btn btn-sm btn-primary m-r-5"> @if(empty($sRow))บันทึกข้อมูล @else แก้ไขข้อมูล @endif</button>
												@endif
												<a href="{{ action('Master\SMD\OwnerController@index') }}" class="btn btn-sm btn-default"> ย้อนกลับ</a>
											</center>
										</div>
									</div>
                                </fieldset>
							</div>
						</div>
						<!-- end panel -->
					
					

				
					
						<!-- begin panel -->
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								</div>
								<h4 class="panel-title">Detail</h4>
							</div>
							<div class="panel-body form-horizontal" style="padding-bottom: 0;">
								<fieldset>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label m-r-10">วันที่เริ่มเป็นลูกค้า</label>
											<div class="col-md-8 input-group date" data-date-format="dd-mm-yyyy" data-date-start-date="Date.default">
												<input type='text' class="form-control datepicker" name="OwnerDate" value="{{ isset($sRow->OwnerDate)?date('d-m-Y',strtotime($sRow->OwnerDate)):old('OwnerDate') }}" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">เลขประจำตัวผู้เสียภาษี</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwenrTax" placeholder="เลขประจำตัวผู้เสียภาษี" value="{{ isset($sRow->OwenrTax)?$sRow->OwenrTax:old('OwenrTax') }}" />
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">เลขที่บัตรประชาชน</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwenrIDcard" placeholder="เลขที่บัตรประชาชน" value="{{ isset($sRow->OwenrIDcard)?$sRow->OwenrIDcard:old('OwenrIDcard') }}" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">สาขา</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="OwenrBranch" placeholder="สาขา" value="{{ isset($sRow->OwenrBranch)?$sRow->OwenrBranch:old('OwenrBranch') }}" />
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							
						</div>
						<!-- end panel -->
					
						<!-- begin panel -->
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								</div>
								<h4 class="panel-title">Credit</h4>
							</div>
							<div class="panel-body form-horizontal" style="padding-bottom: 0;">
								<fieldset>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">วงเงินเครดิต</label>
											<div class="col-md-9">
												<input type="text" class="form-control price" name="OwenrCreditLimit" placeholder="วงเงินเครดิต" value="{{ isset($sRow->OwenrCreditLimit)?$sRow->OwenrCreditLimit:old('OwenrCreditLimit') }}" />
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">จำนวนวันเครดิต</label>
											<div class="col-md-9">
												<input type="text" class="form-control num" name="OwenrDay" placeholder="จำนวนวันเครดิต" value="{{ isset($sRow->OwenrDay)?$sRow->OwenrDay:old('OwenrDay') }}" />
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							
						</div>
						<!-- end panel -->
					</form>
					
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							</div>
							<h4 class="panel-title">Contact / Client</h4>
						</div>
						<div class="panel-body form-horizontal" style="padding-bottom: 0;">
							@if( !empty($sRow) )
							<div class="row" style="padding: 0px 2px 0 0;">
								<div class="col-md-6 text-left" >
									<input class="form-control input-sm w250 text-center myLike" name="OwnerName" type="text" placeholder="ข้อมูลผู้ติดต่อ">
								</div>
								<div class="col-md-6 text-right" >
									<a href="{{ action('Master\SMD\OwnerClientController@create', array($sRow->id)) }}" class="btn btn-sm btn-success">เพิ่มข้อมูลผู้ติดต่อ</a>
								</div>
							</div>
							<fieldset>
								<table id="data-table" class="table table-striped table-bordered" width="100%"></table>
							</fieldset>
							@else
								<center>
								ต้องบันทึกข้อมูลก่อน
								</center>
								<br/>
							@endif
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
	@if(!empty($sShow))
		$('input,select').prop('disabled', true);
	@else
		$( '.panel-body' ).on( "click", "#copyAddress", function() {
			$( '.copyA' ).each(function(index, element) {
				$(this).val( $('input[name="'+$(this).attr('name')+'20"]').val() );
			});
		});
		$('.input-group-addon').click(function() {
			$('.datepicker').datepicker('show');
		});
	@endif
	
	
	@if( !empty($sRow) )
		oTable = $('#data-table').DataTable({
			pageLength	: 10,
			processing: true,
			serverSide: true,
			"sDom": "<'row'<'col-sm-6'><'col-sm-6'>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>", 
			ajax: {
				url: '{{ action("Master\SMD\OwnerClientController@postDatatable", array($sRow->id) ) }}',
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
				{data: 'id', title :'No.', className: 'text-center w40'},
				{data: 'ClientName', title :'ชื่อผู้ติดต่อ', className: 'text-center'},
				{data: 'ClientTel', title :'โทรศัพท์', className: 'text-center'},
				//{data: 'ClientPosition', title :'ตำแหน่งของผู้ติดต่อ', className: 'text-center'},
				//{data: 'ClientResponsibility', title :'หน้าที่ความรับผิดชอบ', className: 'text-center'},
				//{data: 'ClientAddress', title :'ที่อยู่', className: 'text-center'},
				{data: 'ClientMail', title :'E-Mail', className: 'text-center'},
				//{data: 'ClientDefault', title :'Default', className: 'text-center'},
				{data: 'id', title :'Action', className: 'text-center action w90' , orderable: false},
			],
			rowCallback: function(nRow, aData, dataIndex){
				var info 	= oTable.page.info();
				var page 	= info.page;
				var length 	= info.length;
				var index	= (page * length + (dataIndex +1));
				$('td:eq(0)', nRow).html(index);
				$(nRow).data('href','{{ action("Master\SMD\OwnerClientController@index", array($sRow->id)) }}/'+aData['id']+'/');
				
				$('td:last-child', nRow).html(''
					+ '<a href="{{ action("Master\SMD\OwnerClientController@index", array($sRow->id)) }}/'+aData['id']+'/edit" class="btn btn-xs btn-primary" style="margin:0px;"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> '
					+ '<a rel="{{ action("Master\SMD\OwnerClientController@index", array($sRow->id)) }}/'+aData['id']+'/" class="btn btn-xs btn-danger cDelete" style="margin:0px;"><i class="glyphicon glyphicon-remove"></i> ลบ</a> '
				);
				@if (session('RecordID'))
					if( aData['id'] == '{{session('RecordID')}}' )	$('td', nRow).effect("highlight", {}, 4000);
				@endif
			}
		});
	@endif
});
</script>
@endpush
