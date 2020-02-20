
								<div class="col-md-6">
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เลขที่ใบแจ้งงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140 pull-left m-r-5" value="{{ $sRow->work_number }}" readonly />
											<input type="text" class="form-control text-center w140 pull-left" value="{{ date('d-m-Y',strtotime($sRow->created_at)) }}" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ลูกค้า</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="{{ $sRow->OwnerName }}" readonly />
										</div>
									</div>
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">เรือใหญ่</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="{{ $sRow->BoatName }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ประเภทงาน</label>
										<div class="col-md-9">
											<input type="text" class="form-control text-center w140" value="{{ $sRow->job_transport }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">ETA/วันที่เรือใหญ่</label>
										<div class="col-md-9">
											<input type='text' class="form-control text-center w140" value="{{ isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta') }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">
											@if( $sRow->job_transport=='Discharge' ) วันที่ขึ้นสินค้า @endif
											@if( $sRow->job_transport=='Load' ) วันที่ลงสินค้า @endif
											@if( $sRow->job_transport=='Other' ) Other @endif
										</label>
										<div class="col-md-9">
											<input type='text' class="form-control text-center w140" value="{{ isset($sRow->work_date_issue)?date('d-m-Y H:i',strtotime($sRow->work_date_issue)):old('work_date_issue') }}" readonly />
										</div>
									</div>
									
									
								
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">แบคโฮหน้าท่า</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ $sRow->work_backhoe=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_backhoe=='0'?'No':'Yes' }}</a></div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">สายกวาดหน้าท่า</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ $sRow->work_sweep_line=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_sweep_line=='0'?'No':'Yes' }}</a></div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">BOBCAT</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ $sRow->work_bobcat=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_bobcat=='0'?'No':'Yes' }}</a></div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">แบคโฮในโกดัง</label>
										<div class="col-md-9"><a href="javascript:;" class="btn btn-{{ @$sRow->work_baekho_warehouse=='0'?'inverse':'success' }} w140 disabled">{{ $sRow->work_baekho_warehouse=='0'?'No':'Yes' }}</a></div>
									</div>
									
								</div>
								
								<div class="col-md-6">
									<div class="form-group m-b-0">
										<label class="col-md-3 control-label">สินค้า</label>
										<div class="row col-md-9 Product_List">
											@if( !empty($rowItem) )
												@foreach($rowItem AS $row)
											<div class="Product_Item">
												<div class="pull-left m-l-10 m-b-5">
													<input type="text" style="width:55%;" class="form-control pull-left m-r-5"  value="{{ $row->ProductName }}" readonly />
													<input type="text" style="width:30%;" class="form-control text-right pull-left m-r-5" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}" readonly />
													<input type="text" style="width:12%;" class="form-control text-center pull-left" value="{{ $sRow->job_unit }}" readonly />
												</div>
											</div>
												@endforeach
											@endif
										</div>
									</div>
									
			
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">
											@if( $sRow->job_transport=='Discharge' ) ท่าขึ้นสินค้า @endif
											@if( $sRow->job_transport=='Load' ) ท่าลงสินค้า @endif
											@if( $sRow->job_transport=='Other' ) Other @endif
										</label>
										<div class="col-md-8">
											<input type="text" class="form-control" value="{{ $sRow->HarborName }}" readonly />
										</div>
									</div>
									
									<div class="form-group m-b-5">
										<label class="col-md-3 control-label">หมายเหตุ</label>
										<div class="col-md-8">
											<textarea class="form-control" rows="3"  readonly >{{ isset($sRow->work_note)?$sRow->work_note:'' }}</textarea>
										</div>
									</div>
									
								</div>