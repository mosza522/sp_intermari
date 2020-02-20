
							
							<hr/>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label><b>Created By :</b></label>
										<input type="text" value="{{ empty($sRow->created_by)?'-':$sRow->created_by }}" class="form-control text-center" readonly />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label><b>Created at :</b></label>
										<input type="text" value="{{ empty($sRow->created_at)?'-':$sRow->created_at }}" class="form-control text-center" readonly />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label><b>Modified By :</b></label>
										<input type="text" value="{{ empty($sRow->updated_by)?'-':$sRow->updated_by }}" class="form-control text-center" readonly />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label><b>Modified at :</b></label>
										<input type="text" value="{{ empty($sRow->updated_at)?'-':$sRow->updated_at }}" class="form-control text-center" readonly />
									</div>
								</div>
							</div>