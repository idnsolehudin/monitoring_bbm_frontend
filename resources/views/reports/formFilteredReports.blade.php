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
						@if (session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
						@endif
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_content">
									<br />
									<form action="{{ route("show.datareportsperdate") }}" method="GET" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
										@csrf
										@method('GET')
										<div class="item form-group text-center">
											{{-- <label class="col-form-label col-md-3 col-sm-3 label-align"> <span class="required">*</span>
											</label> --}}
											<div class="col-md-4 col-sm-4 ">
												<input id="start-date" class="date-picker form-control" name="start_date" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
                                            <div class="col-md-4 col-sm-4"><h2>sampai</h2></div>
											<div class="col-md-4 col-sm-4 ">
												<input id="end-date" class="date-picker form-control" name="end_date" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group text-center">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
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