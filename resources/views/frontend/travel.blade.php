	@include('frontend.include.head')
	<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
			<!-- Main Wrapper -->
			<div class="main-wrapper">
			
				<!-- Header -->
				@include('frontend.include.header')
				<!-- /Header -->
				
				<!-- Sidebar -->
				@include('frontend.include.sidebar')

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
								<div class="col-auto float-end ms-auto">
									<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa-solid fa-plus"></i> Add</a>
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
													<th>Travel ID</th>
													<!-- <th>Travel Detail</th> -->
												
													@php
														$uniqueKeys = collect($get_all_travel_req)
															->pluck('travel_details')
															->flatMap(function ($details) {
																return array_keys(json_decode($details, true));
															})
															->unique();
													@endphp

													<!-- Manually specify the desired headers -->
													@foreach(['travelform', 'Ttravelto', 'dateform', 'dateto', 'travelmode', 'joindate', 'personalwork'] as $header)
														<th>{{ ucfirst(str_replace('_', ' ', $header)) }}</th>
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
														<td>{{ strtoupper($travel_req->travelid) }}</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td class="text-center">
																<p class="dropdown-item mb-0">
																	@if($travel_req->travel_status=='A')
																		<i class="fa-regular fa-circle-dot text-success"></i> Approved
																	@elseif($travel_req->travel_status=='P')
																		<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																	
																	@elseif($travel_req->travel_status=='C')
																		<i class="fa-regular fa-circle-dot text-info"></i> Cancle
																	@endif
																</p>
															</td>
															<td class="text-end">
																<div class="dropdown dropdown-action">
																	<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_asset"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
																		<a class="dropdown-item trvdel" href="javascript:void(0)" data-bs-toggle="modal"  data-id="{{$travel_req->id}}" data-bs-target="#delete_travel"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																	</div>
																</div>
															</td> 
														
														<!-- Travel Details Column -->
														<td colspan="11">
															@php
																$travelDetails = json_decode($travel_req->travel_details, true);
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

													<!-- Manually specify the desired headers -->
													@foreach(['organizationthrough', 'hotelname', 'hoteladdress', 'bookingdateform', 'bookingdateto'] as $header)
														<th>{{ ucfirst(str_replace('_', ' ', $header)) }}</th>
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
																<p class="dropdown-item mb-0">
																	@if($hotel_req->hotel_status=='A')
																		<i class="fa-regular fa-circle-dot text-success"></i> Approved
																	@elseif($hotel_req->hotel_status=='P')
																		<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																	
																	@elseif($hotel_req->hotel_status=='C')
																		<i class="fa-regular fa-circle-dot text-info"></i> Cancle
																	@endif
																</p>
															</td>
															<td class="text-end">
																<div class="dropdown dropdown-action">
																	<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_asset"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
																		<a class="dropdown-item htldel" href="javascript:void(0)" data-bs-toggle="modal" data-id="{{$hotel_req->id}}" data-bs-target="#delete_hotel"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																	</div>
																</div>
															</td> 
														
														<!-- Travel Details Column -->
														<td colspan="11">
															@php
																$travelDetails = json_decode($hotel_req->hotel_details, true);
															@endphp
															@if(!empty($travelDetails))
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
															@endif
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
				
			

				
				
				
					<!-- Add travel Modal -->
					<div id="add_asset" class="modal custom-modal fade" role="dialog">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Travel</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="travelForm" action="#" method="post">
									<input class="form-control"  name="uid" id="uid" value="{{$get_user->userid}}" hidden>
										<div class="row">
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Name</label>
													<input class="form-control" name="name" id="name" type="text" value="{{$get_user->firstname}}" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Travel Days</label>
													<input class="form-control" name="tday" id="tday" type="text" placeholder="travel days" required>
												</div>
											</div>
										</div>
										

										<div class="text-end d-flex justify-content-between">
											<div class="travellags modal-header">
												<h5 class="modal-title">Travel Lags</h5>
											</div>
											<a href="javascript:void(0)" onclick="travelclone()">
												<ul class="icons-list justify-content-end mt-3">
													<li class="plusrowtravel"><i class="fe fe-plus" aria-label="fe fe-plus" data-bs-original-title="fe fe-plus"></i></li>
												</ul>
											</a>
										</div>
																		
										<div class="row travelrow" id="travelrow">
												<div class="text-end removerow d-none" id="removerow">
													<a href="javascript:void()">
														<ul class="icons-list ">
															<li i class="plusrowtravel"><i class="fe fe-minus"></i></li>
														</ul>
													</a>
												</div>
												
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel Form</label>
														<input class="form-control" name="travelform" id="travelform" type="text" placeholder="travel form place" required>
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel To</label>
														<input class="form-control" name="travelto" id="travelto" type="text" placeholder="travel to place" required>
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Date From</label>
														<input class="form-control " name="dateform" id="dateform" type="date" placeholder="travel from date" required>
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Date to</label>
														<input class="form-control " name="dateto" id="dateto" type="date" placeholder="travel to date" required>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel Mode</label>
														<input class="form-control" name="travelmode" id="travelmode" type="text" placeholder="travel mode" required>
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Join Date</label>
														<input class="form-control " name="joindate" id="joindate" type="date" placeholder="join date" required>
													</div>
												</div>
											
												<div class="col-md-3">                                                    
													<label class="custom_check ps-4 mt-5"> Personal Work
														<input type="checkbox" name="personalwork"  id="personalwork">												
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										
										<div>
										<div class="text-end d-flex justify-content-between">
											<div class="travellags modal-header">
												<h5 class="modal-title">Hotel</h5>
											</div>
											<a href="javascript:void(0)" onclick="hotelclone()">
												<ul class="icons-list justify-content-end mt-3">
													<li class="hoteladdrow plusrowtravel"><i class="fe fe-plus" aria-label="fe fe-plus" data-bs-original-title="fe fe-plus"></i></li>
												</ul>
											</a>
										</div>

										<div class="row hotelrow" id="hotelrow">
													<div class="text-end removerow1 d-none" id="removerow1">
										
													</div>

													<div class="col-md-4">
														<div class="input-block mb-3">
															<label class="col-form-label">Organization Through</label>
															<input class="form-control" name="organizationthrough" id="organizationthrough" placeholder="organization through" type="text" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="input-block mb-3">
															<label class="col-form-label">Hotel Name</label>
															<input class="form-control" name="hotelname" id="hotelname" type="text" placeholder="hotel name" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="input-block mb-3">
															<label class="col-form-label">Hotel Address</label>
															<input class="form-control" name="hoteladdress" id="hoteladdress" type="text" placeholder="hotel address" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Booking Date From</label>
															<input class="form-control " name="bookingdateform" id="bookingdateform" placeholder="booking from date " type="date" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Booking Date to</label>
															<input class="form-control " name="bookingdateto" id="bookingdateto" type="date" placeholder="booking to date" required>
														</div>
													</div>
												</div>


										</div>
										
										<div class="submit-section">
											<button type="button" class="btn btn-primary submit-btn travelsubmit" onclick="submitForm()">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Add travel Modal -->
			
					
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
			
					
					<!-- Delete travel Modal -->
					<div class="modal custom-modal fade" id="delete_travel" role="dialog">
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
					<!-- /Delete Travel Modal -->

					<!-- Delete travel Modal -->
					<div class="modal custom-modal fade" id="delete_hotel" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body">
									<div class="form-header">
										<h3>Delete Hotel</h3>
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
					<!-- /Delete Travel Modal -->
					
				</div>
				<!-- /Page Wrapper -->
				
			</div>
			<!-- /Main Wrapper -->

			@include('frontend.include.footer')
			<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
			<script>
			$(document).ready(function(){

				var travelIdToDelete;
				
				$('.trvdel').click(function(){
					travelIdToDelete = $(this).data('id');
				});

				// Handle Delete button click
				$('#delete_travel .continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/travel-request-delete',
						method: 'POST',
						data: {
							"_token": csrfToken,
							travelid: travelIdToDelete,
							type :"deltravel"

						},
						success: function(data){
							console.log(data);
							triggerAlert('You have successfully deleted the Hotel Details', 'success');
							$('#delete_hotel .btn-close').click();
							location.reload(true);
						},
						error: function(error){
							triggerAlert('Something went wrong.', 'error');
						}
					});
				});



				var hotelIdToDelete;
				
				$('.htldel').click(function(){
					hotelIdToDelete = $(this).data('id');
				});

				// Handle Delete button click
				$('#delete_hotel .continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/travel-request-delete',
						method: 'POST',
						data: {
							"_token": csrfToken,
							hotelid: hotelIdToDelete,
							type :"delhotel"

						},
						success: function(data){
							console.log(data);
							triggerAlert('You have successfully deleted the Hotel Details', 'success');
							$('#delete_hotel .btn-close').click();
							location.reload(true);
						},
						error: function(error){
							triggerAlert('Something went wrong.', 'error');
						}
					});
				});
			});
		</script>

