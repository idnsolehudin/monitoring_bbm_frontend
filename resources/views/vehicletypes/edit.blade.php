<x-layout :title="$title">
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>{{ $title }}</h3>
						</div>

					
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								
								<div class="x_content">
									<br />
									<form action="{{ route('update.vehicletype', $vehicletypes['id']) }}" method="POST" id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="kode-rute">Merk <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="kode-rute" required="required" class="form-control" name="merk" placeholder="Merk Kendaraan" value="{{ $vehicletypes['merk'] }}">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="type">Type<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="type" id="type" class="form-control">
													<option value="{{ $vehicletypes['type'] }}">{{ $vehicletypes['type'] }}</option>
													<option value="4R">4R</option>
													<option value="4A">4A</option>
													<option value="4G">4G</option>
													<option value="4D">4D</option>
													<option value="6R">6R</option>
													<option value="6D">6D</option>
													<option value="4Y">4Y</option>
													<option value="4Z">4Z</option>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="cc" class="col-form-label col-md-3 col-sm-3 label-align">CC</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="cc" class="form-control" type="number" name="cc" placeholder="CC/Silinder" value="{{ $vehicletypes['cc'] }}">
											</div>
										</div>
										<div class="item form-group">
											<label for="ratio" class="col-form-label col-md-3 col-sm-3 label-align">Ratio</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="ratio" class="form-control" type="number" name="ratio" placeholder="Rasio" value="{{ $vehicletypes['ratio'] }}">
											</div>
										</div>
										{{-- <input type="hidden" name="created_id" value="{{ session('user')['id'] }}"> --}}
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                                <a href="{{ route('show.vehicletype') }}" class="btn btn-danger">
                                                    Cancel
                                                </a>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
</x-layout>