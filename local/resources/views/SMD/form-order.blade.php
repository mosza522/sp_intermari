
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fa fa-desktop"></i>  ใบสั่งขาย (SALE ORDER)</h4>
							</div>
							<div class="panel-body form-horizontal">
								<fieldset class="m-t-15">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">เลขที่เอกสาร</label>
											<div class="row col-md-9">
												<div class="pull-left m-l-10" style="width: 32%;">
													<input type="text" class="form-control text-center" name="job_number" placeholder="Auto" value="{{ isset($sRow->job_number)?$sRow->job_number:old('job_number') }}" readonly />
												</div>
												<div class="pull-left m-l-10" style="width: 32%;">
													<input type="text" class="form-control text-center" name="job_number" value="{{ isset($sRow->created_at)?date('d-m-Y',strtotime($sRow->created_at)):date('d-m-Y') }}" readonly />
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">ลูกค้า</label>
											<div class="col-md-9">
												<div class="pull-left" style="width: 63%;">
													<input type="text" class="form-control AutoComplete" rel="OwnerName" placeholder="ระบุ" value="{{ isset($sRow->OwnerName)?$sRow->OwnerName:old('OwnerName') }}"  />
													<input name="OwnerID" type="hidden" value="{{ isset($sRow->OwnerID)?$sRow->OwnerID:'' }}"  >
												</div>
												<div class="pull-left m-l-10" style="width:34%;">
													<select class="form-control" name="job_customer_type" >
														<option value="1" {{ @$sRow->job_customer_type=='1'?'selected':'' }}>ผู้ซื้อ</option>
														<option value="2" {{ @$sRow->job_customer_type=='2'?'selected':'' }}>ผู้ขาย</option>
														<option value="3" {{ @$sRow->job_customer_type=='3'?'selected':'' }}>ผู้ให้บริการขนส่ง</option>
														<option value="4" {{ @$sRow->job_customer_type=='4'?'selected':'' }}>Agent</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">เรือใหญ่</label>
											<div class="col-md-9">
												<input type="text" class="form-control AutoComplete" rel="BoatName" placeholder="เรือใหญ่" value="{{ isset($sRow->BoatName)?$sRow->BoatName:old('BoatName') }}" required />
												<input name="BoatID" type="hidden" value="{{ isset($sRow->BoatID)?$sRow->BoatID:'' }}" required >
											</div>
										</div>
									
										<div class="form-group">
											<label class="col-md-3 control-label">ประเภทงาน</label>
											<div class="col-md-9">
												<select class="form-control" name="job_transport" >
													<option value="Discharge" {{ @$sRow->job_transport=='Discharge'?'selected':'' }}>Discharge </option>
													<option value="Load" {{ @$sRow->job_transport=='Load'?'selected':'' }}>Load</option>
													<option value="Other" {{ @$sRow->job_transport=='Other'?'selected':'' }}>Other</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label m-r-10">ETA/วันที่เรือใหญ่</label>
											<div class='col-md-8 input-group date datetimepicker'>
												<input type='text' class="form-control" name="job_date_eta" value="{{ isset($sRow->job_date_eta)?date('d-m-Y H:i',strtotime($sRow->job_date_eta)):old('job_date_eta') }}" readonly />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">ประเภทสินค้า</label>
											<div class="col-md-9">
												<div class="pull-left" style="width: 35%;">
													<select class="form-control" name="job_category" id="job_category" >
														<option value="1" {{ @$sRow->job_category=='1'?'selected':'' }}>เทกอง</option>
														<option value="2" {{ @$sRow->job_category=='2'?'selected':'' }}>เครื่องจักร</option>
														<option value="3" {{ @$sRow->job_category=='3'?'selected':'' }}>ชิ้น</option>
													</select>
												</div>
												<div class="pull-left m-l-5" style="width: 20%;">
													<input type="text" class="form-control text-right" value="หน่วยนับ" readonly style="border: transparent;background-color: white;color: black;opacity: 1;" />
												</div>
												<div class="pull-left m-l-5" style="width:21%;">
													<select class="form-control" name="job_unit" >
														<option value="ตัน" {{ @$sRow->job_unit=='ตัน'?'selected':'' }}>ตัน</option>
														<option value="ชิ้น" {{ @$sRow->job_unit=='ชิ้น'?'selected':'' }}>ชิ้น</option>
														<option value="pc" {{ @$sRow->job_unit=='pc'?'selected':'' }}>pc</option>
														<option value="set" {{ @$sRow->job_unit=='set'?'selected':'' }}>set</option>
														<option value="ชุด" {{ @$sRow->job_unit=='ชุด'?'selected':'' }}>ชุด</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">สินค้า</label>
											<div class="row col-md-9 Product_List">
												@if( !empty($rowItem) )
													@foreach($rowItem AS $row)
												<div class="Product_Item">
													<div class="pull-left m-l-10 m-b-5" style="width:81%;">
														<input type="text" style="width: 66%;" class="form-control AutoComplete pull-left m-r-5 ProductName" rel="ProductName" mode="jobProduct" id="{{ empty($sRow->job_category)?'1':$sRow->job_category }}" placeholder="สินค้า" value="{{ isset($row->ProductName)?$row->ProductName:old('ProductName') }}"/>
														<input name="ProductID[]" type="hidden" value="{{ isset($row->ProductID)?$row->ProductID:old('ProductID') }}"/>
														<input type="text" style="width: 30%;" class="form-control price text-right pull-left" name="Weight[]" placeholder="ปริมาณ" value="{{ isset($row->Weight)?number_format($row->Weight,3):'0' }}"/>
													</div>
													<div class="pull-right m-l-10 m-b-5 Product_btn" style="width:13%;padding-top:5px;"></div>
												</div>
													@endforeach
												@else
												<div class="Product_Item">
													<div class="pull-left m-l-10 m-b-5" style="width:81%;">
														<input type="text" style="width: 66%;" class="form-control AutoComplete pull-left m-r-5 ProductName" rel="ProductName" mode="jobProduct" id="{{ empty($sRow->job_category)?'1':$sRow->job_category }}" placeholder="สินค้า" />
														<input name="ProductID[]" type="hidden" />
														<input type="text" style="width: 30%;" class="form-control price text-right pull-left" name="Weight[]" placeholder="ปริมาณ" />
													</div>
													<div class="pull-right m-l-10 m-b-5 Product_btn" style="width:13%;padding-top:5px;"></div>
												</div>
												@endif
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">น้ำหนักรวม</label>
											<div class="col-md-9">
												<input type="text" style="width: 80%;" class="form-control price text-right job_weight" name="job_weight" placeholder="ปริมาณ" value="{{ isset($sRow->job_weight)?number_format($sRow->job_weight,3):'0' }}" readonly />
											</div>
										</div>
										
										<div class="form-group m-b-5">
											<label class="col-md-3 control-label">หมายเหตุ</label>
											<div class="col-md-9">
												<textarea class="form-control" name="job_note" rows="3" style="width:80%;">{{ isset($sRow->job_note)?$sRow->job_note:'' }}</textarea>
											</div>
										</div>
										
									</div>
								</fieldset>
							</div>
						</div>