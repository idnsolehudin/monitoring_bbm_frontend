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
                    @if ($errors->has('input_error'))
                        <div class="bg bg-danger">
                            <p class="text-light">{{ $errors->first('input_error') }}</p>
                        </div>
                    @endif
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								
								<div class="x_content">
									<br />
									<form action="{{ route('store.route') }}" method="POST" id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="kode-rute">Kode Rute <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="kode-rute" required="required" class="form-control" name="code" placeholder="Kode Rute">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="deskripsi">Deskripsi <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="deskripsi" name="description" required="required" class="form-control" placeholder="cth : Serang - Balaraja">
											</div>
										</div>
										<div class="item form-group">
											<label for="jarak" class="col-form-label col-md-3 col-sm-3 label-align">Jarak (KM)</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="jarak" class="form-control" type="number" name="distance" placeholder="Jarak Dalam Kilometer">
											</div>
										</div>
										<input type="hidden" name="created_id" value="{{ session('user')['id'] }}">
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                                <a href="{{ route('show.route') }}" class="btn btn-danger">
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