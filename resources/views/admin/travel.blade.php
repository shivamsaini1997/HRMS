	@include('admin.includes.head')

			<!-- Main Wrapper -->
			<div class="main-wrapper">
			
				<!-- Header -->
				@include('admin.includes.header')
				<!-- /Header -->
				
				<!-- Sidebar -->
				@include('admin.includes.sidebar')

				<!-- /Sidebar -->
				
				<!-- Page Wrapper -->
				<div class="page-wrapper">
				
					<!-- Page Content -->
					<div class="content container-fluid">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="page-title">Travel Approval </h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
										<li class="breadcrumb-item active">Travel Approval </li>
									</ul>
								</div>
								
							</div>
						</div>
						<!-- /Page Header -->
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table mb-0 datatable">
									<thead>
											<tr>
											@if($get_all_travel_req != null && count($get_all_travel_req) > 0)
													<!-- Travel ID Column -->
													<th>Name</th>
													<th>Travel ID</th>
													<!-- <th>Name</th> -->
												
													@php
														$uniqueKeys = collect($get_all_travel_req)
															->pluck('travel_details')
															->flatMap(function ($details) {
																return array_keys(json_decode($details, true));
															})
															->unique();
													@endphp

													<!-- Manually specify the desired headers -->
													@php
														$headerMappings = [
															'travelform' => 'Travel Form',
															'Ttravelto' => 'Ttravel To',
															'dateform' => 'Date Form',
															'dateto' => 'Date To',
															'travelmode' => 'Travel Mode',
															'joindate' => 'Join Date',
															'personalwork' => 'Personal Work'
														];
													@endphp

													@foreach(['travelform', 'Ttravelto', 'dateform', 'dateto', 'travelmode', 'joindate', 'personalwork'] as $header)
														<th>{{ $headerMappings[$header] }}</th>
													@endforeach

													<!-- Add the remaining columns (Status and Action) -->
													<th class="text-center">Status</th>
													<th class="text-end">Action</th>

												
											@else
												<th colspan="14">No Data</th>
            								@endif
											</tr>
										</thead>
										<tbody>
										@if($get_all_travel_req != null)
												@foreach($get_all_travel_req as $travel_req)
													<tr>
														<!-- Travel ID Column -->
														<td>{{ strtoupper($travel_req->firstname) }} {{ strtoupper($travel_req->lastname) }}</td>
														<td>{{ strtoupper($travel_req->travelid) }}</td>
														
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td class="text-center">
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
																@if($travel_req->travel_status=='A')
																	<i class="fa-regular fa-circle-dot text-success"></i> Approved
																@elseif($travel_req->travel_status=='P')
																	<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																
																@elseif($travel_req->travel_status=='C')
																	<i class="fa-regular fa-circle-dot text-info"></i> Cancle
																@endif
															</a>

															<div class="dropdown-menu dropdown-menu-right status-dropdown tstatus">
																<a class="dropdown-item" asset-id="{{$travel_req->id}}" uid="{{$travel_req->userid}}" data-status="P" href="#">Pending</a>
																<a class="dropdown-item" asset-id="{{$travel_req->id}}" uid="{{$travel_req->userid}}" data-status="A" href="#">Approved</a>
																<a class="dropdown-item" asset-id="{{$travel_req->id}}" uid="{{$travel_req->userid}}" data-status="C" href="#">Cancle</a>
															</div>
														</div>
													</td>
															<td class="text-end">
																<div class="dropdown dropdown-action">
																	<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_asset"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
																		<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_asset"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																	</div>
																</div>
															</td> 
														
														<!-- Travel Details Column -->
														<td colspan="10">
															@php
																$travelDetails = json_decode($travel_req->travel_details, true);
															@endphp
															@foreach($travelDetails as $key => $value)
																<tr>
																	<!-- <td colspan="2">Travel Details</td> -->
																	<td></td>
																	<td>
																		@if(is_array($value))
																			@foreach($value as $nestedKey => $nestedValue)
																				<!-- <td>{{ ucfirst(str_replace('_', ' ', $nestedKey)) }}</td> -->
																				<td>{{ is_string($nestedValue) ? htmlspecialchars($nestedValue) : '' }}</td>
																			@endforeach
																		@else
																			<!-- <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td> -->
																			<td>{{ is_string($value) ? htmlspecialchars($value) : '' }}</td>
																		@endif
																	</td>
																	
																</tr>
														
													
														
															@endforeach
														</td>
														
														
													</tr>
												@endforeach
										
										@else
												Data not found
											@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Content -->
					<!-- Page Content -->
					<div class="content container-fluid">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="page-title">Hotel</h3>
									
								</div>
								
							</div>
						</div>
						<!-- /Page Header -->
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table mb-0 datatable">
									<thead>
											<tr>
											@if($get_all_hotel_req != null && count($get_all_hotel_req) > 0)
													<!-- Travel ID Column -->
													<th>Travel ID</th>
													<!-- <th>Travel Detail</th> -->
												
													@php
														$uniqueKeys = collect($get_all_hotel_req)
															->pluck('hotel_details')
															->flatMap(function ($details) {
																return array_keys(json_decode($details, true));
															})
															->unique();
													@endphp
													@php
														$headerMappings1 = [
															'organizationthrough' => 'Organization Through',
															'hotelname' => 'Hotel Name',
															'hoteladdress' => 'Hotel Address',
															'bookingdateform' => 'Booking Date Form',
															'bookingdateto' => 'Booking Date To'
															
														];
													@endphp
													<!-- Manually specify the desired headers -->
													@foreach(['organizationthrough', 'hotelname', 'hoteladdress', 'bookingdateform', 'bookingdateto'] as $header)
													<th>{{ $headerMappings1[$header] }}</th>
													@endforeach

													<!-- Add the remaining columns (Status and Action) -->
													<th class="text-center">Status</th>
													<th class="text-end">Action</th>

												
											@else
												<th colspan="14">No Data</th>
            								@endif
											</tr>
										</thead>
										<tbody>
										@if($get_all_hotel_req != null)
												@foreach($get_all_hotel_req as $hotel_req)
													<tr>
														<!-- Travel ID Column -->
														<td>{{ strtoupper($hotel_req->travelid) }}</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														
														<td class="text-center">
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
																@if($travel_req->hotel_status=='A')
																	<i class="fa-regular fa-circle-dot text-success"></i> Approved
																@elseif($travel_req->hotel_status=='P')
																	<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																
																@elseif($travel_req->hotel_status=='C')
																	<i class="fa-regular fa-circle-dot text-info"></i> Cancle
																@endif
															</a>

															<div class="dropdown-menu dropdown-menu-right status-dropdown hstatus">
																<a class="dropdown-item" asset-id="{{$travel_req->id}}" uid="{{$travel_req->userid}}" data-status="P" href="#">Pending</a>
																<a class="dropdown-item" asset-id="{{$travel_req->id}}" uid="{{$travel_req->userid}}" data-status="A" href="#">Approved</a>
																<a class="dropdown-item" asset-id="{{$travel_req->id}}" uid="{{$travel_req->userid}}" data-status="C" href="#">Cancle</a>
															</div>
														</div>
															</td>
															<td class="text-end">
																<div class="dropdown dropdown-action">
																	<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_asset"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
																		<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_asset"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																	</div>
																</div>
															</td> 
														
														<!-- Travel Details Column -->
														<td colspan="11">
															@php
																$travelDetails = json_decode($hotel_req->hotel_details, true);
															@endphp
															@foreach($travelDetails as $key => $value)
																<tr>
																	<!-- <td colspan="2">Travel Details</td> -->
																	<td>
																		@if(is_array($value))
																			@foreach($value as $nestedKey => $nestedValue)
																				<!-- <td>{{ ucfirst(str_replace('_', ' ', $nestedKey)) }}</td> -->
																				<td>{{ is_string($nestedValue) ? htmlspecialchars($nestedValue) : '' }}</td>
																			@endforeach
																		@else
																			<!-- <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td> -->
																			<td>{{ is_string($value) ? htmlspecialchars($value) : '' }}</td>
																		@endif
																	</td>
																	
																</tr>
														
													
														
															@endforeach
														</td>
														
														
													</tr>
												@endforeach
										
										@else
												Data not found
											@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Content -->
				
	
					<!-- Edit Travel Modal -->
					<div id="edit_asset" class="modal custom-modal fade" role="dialog">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Travel</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form>
										<div class="row">
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Name</label>
													<input class="form-control" type="text">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Travel Days</label>
													<input class="form-control" type="text">
												</div>
											</div>
											
										</div>
										<div>

											<div class="text-end d-flex justify-content-between">
												<div class="travellags modal-header">
													<h5 class="modal-title">Travel Lags</h5>
												</div>
												
											</div>
											
											<div class="row" >
												
												
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel Form</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel To</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Date From</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Date to</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel Mode</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Join Date</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
											
												<div class="col-md-3">                                                    
													<label class="custom_check ps-4 mt-5"> Personal Work
														<input type="checkbox" name=""  id="">												
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>
										<div>
											<div class="text-end d-flex justify-content-between">
												<div class="travellags modal-header">
													<h5 class="modal-title">Hotel</h5>
												</div>
												
											</div>

											<div class="row" >

												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Hotel Name</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Hotel Address</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Booking Date From</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Booking Date to</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
											</div>

										</div>
							
										<div class="row">
											
											
										</div>
										<div class="submit-section">
											<button class="btn btn-primary submit-btn">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Edit Travel Modal -->
			
					
					<!-- Delete Asset Modal -->
					<div class="modal custom-modal fade" id="delete_asset" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body">
									<div class="form-header">
										<h3>Delete Travel</h3>
										<p>Are you sure want to delete?</p>
									</div>
									<div class="modal-btn delete-action">
										<div class="row">
											<div class="col-6">
												<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
											</div>
											<div class="col-6">
												<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Delete Asset Modal -->
					
				</div>
				<!-- /Page Wrapper -->
				
			</div>
			<!-- /Main Wrapper -->

			@include('admin.includes.footer')
			<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
		<script>
		$(document).ready(function(){	


			$('.hstatus .dropdown-item').on('click', function(event) {
					event.preventDefault();
					
					const selectedStatus = $(this).data('status');
					const travelid = $(this).attr('asset-id');
					const userId = $(this).attr('uid');
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/update-travel-status',
						type: 'POST',
						data: {
							_token: csrfToken,
							travelid: travelid,
							userId: userId,
							status: selectedStatus,
							type :"update_hotel_status"
						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully changed employee hotel status', 'success');
                    			location.reload(true);
							} else {
								triggerAlert('Somthing went wrong!', 'error');
							}
						},
						error: function(error) {
							triggerAlert('Somthing went wrong!', 'error');
						}
					});
				});


				$('.tstatus .dropdown-item').on('click', function(event) {
					event.preventDefault();
					
					const selectedStatus = $(this).data('status');
					const travelid = $(this).attr('asset-id');
					const userId = $(this).attr('uid');
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/update-travel-status',
						type: 'POST',
						data: {
							_token: csrfToken,
							travelid: travelid,
							userId: userId,
							status: selectedStatus,
							type :"update_travel_status"
						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully changed employee travel status', 'success');
                    			location.reload(true);
							} else {
								triggerAlert('Somthing went wrong!', 'error');
							}
						},
						error: function(error) {
							triggerAlert('Somthing went wrong!', 'error');
						}
					});
				});

			});
		</script>

