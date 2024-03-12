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
								<h3 class="page-title">Leaves</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Leaves</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="fa-solid fa-plus"></i> Add Leave</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Leave Statistics -->
					<div class="row">
						<!-- <div class="col-md-3">
							<div class="stats-info">
								<h6>Total Leave</h6>
								<h4>12</h4>
							</div>
						</div> -->
						<div class="col-md-3">
							<div class="stats-info">
								<h6>Available Leave</h6>
								<h4>2</h4>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="stats-info">
								<h6>Taken Leave</h6>
								<h4>0</h4>
							</div>
						</div>
					</div>
					<!-- /Leave Statistics -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table leave-employee-table mb-0 datatable">
									<thead>
										<tr>
											<th>Leave Type</th>
											<th>Leave</th>
											<th>From</th>
											<th>To</th>
											<th>No of Days</th>
											<th>Reason</th>
											<th class="text-center">Status</th>
											<th>Approved by</th>
											
										</tr>
									</thead>
									<tbody>
										@if($get_leaves != null)
											@foreach($get_leaves as $allleaves)
											@php 
												$str = $allleaves->leave;
												$converted_str = ucwords(str_replace('_', ' ', $str));
											@endphp
												<tr>
													<td> @if($allleaves->leave_type == '0.5') Half Day @else Full Day @endif </td>
													<td>{{$converted_str}}</td>
													<td>{{$allleaves->from}}</td>
													<td>{{$allleaves->to}}</td>
													<td>{{$allleaves->no_of_day}}</td>
													<td>{{$allleaves->leave_reason}}</td>
													<td class="text-center">
														<div class="action-label">
															@if($allleaves->status == 'A')
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
																<i class="fa-regular fa-circle-dot text-success"></i> Approved
															</a>
															@elseif($allleaves->status == 'D')
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
																<i class="fa-regular fa-circle-dot text-danger"></i> Declined
															</a>
															@else
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
																<i class="fa-regular fa-circle-dot text-purple"></i> Pending
															</a>
															@endif 
														</div>
													</td>
													<td>
														<h2 class="table-avatar">
															
															<a href="#"></a>
														</h2>
													</td>
													
												</tr>
											@endforeach
										@endif
										<!-- <tr>
											<td>Medical Leave</td>
											<td>27 Feb 2019</td>
											<td>27 Feb 2019</td>
											<td>1 day</td>
											<td>Going to Hospital</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-success"></i> Approved
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr>
										<tr>
											<td>LOP</td>
											<td>24 Feb 2019</td>
											<td>25 Feb 2019</td>
											<td>2 days</td>
											<td>Personnal</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-success"></i> Approved
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr>
										<tr>
											<td>Paternity Leave</td>
											<td>13 Feb 2019</td>
											<td>17 Feb 2019</td>
											<td>5 days</td>
											<td>Going to Hospital</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-danger"></i> Declined
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr>
										<tr>
											<td>Casual Leave</td>
											<td>30 Jan 2019</td>
											<td>30 Jan 2019</td>
											<td>Second Half</td>
											<td>Going to Hospital</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-purple"></i> New
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr>
										<tr>
											<td>Hospitalisation</td>
											<td>15 Jan 2019</td>
											<td>25 Jan 2019</td>
											<td>10 days</td>
											<td>Going to Hospital</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-success"></i> Approved
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr>
										<tr>
											<td>Casual Leave</td>
											<td>13 Jan 2019</td>
											<td>14 Jan 2019</td>
											<td>2 days</td>
											<td>Going to Hospital</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-success"></i> Approved
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr>
										<tr>
											<td>Casual Leave</td>
											<td>10 Jan 2019</td>
											<td>10 Jan 2019</td>
											<td>First Half</td>
											<td>Going to Hospital</td>
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														<i class="fa-regular fa-circle-dot text-danger"></i> Declined
													</a>
												</div>
											</td>
											<td>
												<h2 class="table-avatar">
													
													<a href="#">Richard Miles</a>
												</h2>
											</td>
											
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Leave Modal -->
				<!-- Add Leave Modal -->
				<div id="add_leave" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Leave</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm6" method="post">
									<div class="row">
										<div class="mb-3 col-lg-6">
											<label class="col-form-label">Leave<span class="text-danger">*</span></label>
											<select class="form-control form-select" type="text" name="le" id="le">
												<option value="">Select Leave</option>
												<option value="casual">Casual</option>
												<option value="sick">Sick</option>
												<option value="maternity_leave">Maternity Leave</option>
												<option value="paternity_leave">Paternity Leave</option>
												<option value="bereavement_leave">Bereavement Leave</option>
												<option value="leave_without_pay">Leave Without Pay</option>
												<option value="rh">RH</option>
												<option value="others">Others</option>
											</select>
										</div>
										<div class="mb-3 col-lg-6">
											<label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
											<select class="form-control form-select" type="text" name="lt" id="lt" placeholder="Half Day or Full Day">
												<option value="">Select Leave Type</option>
												<option value="0.5">Half Day</option>
												<option value="1">Full Day</option>
												
										
											</select>
										</div>
										<div class="mb-3 col-lg-4">
											<label class="col-form-label">From <span class="text-danger">*</span></label>
											<div class="cal-icon">
												<input class="form-control dat" type="text" name="lfd" id="lfd" onchange="calculateDateDifference()">
											</div>
										</div>
										<div class="mb-3 col-lg-4">
											<label class="col-form-label">To <span class="text-danger">*</span></label>
											<div class="cal-icon">
												<input class="form-control dat" type="text" name="ltd" id="ltd" onchange="calculateDateDifference()">
											</div>
										</div>
										<div class="mb-3 col-lg-4">
											<label class="col-form-label">Number of days <span class="text-danger">*</span></label>
											<input class="form-control"  type="text"  name="lnd" id="lnd" readonly>
										</div>
										<!-- <div class="input-block mb-3">
											<label class="col-form-label">Remaining Leaves <span class="text-danger">*</span></label>
											<input class="form-control" readonly value="12" type="text">
										</div> -->
										<div class="input-block mb-3">
											<label class="col-form-label">Leave Reason <span class="text-danger">*</span></label>
											<textarea rows="4" class="form-control"  name="lr" id="lr"></textarea>
										</div>
										<div class="submit-section">
											<button class="btn btn-primary submit-btn adlv">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div> 
				</div>
				<!-- /Add Leave Modal -->
				
				<!-- Edit Leave Modal -->
				<div id="edit_leave" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Leave</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="javascript:void(0)"  id="myForm6" method="post">
									<div class="row">
										<div class="mb-3 col-lg-6">
											<label class="col-form-label">Leave<span class="text-danger">*</span></label>
											<select class="form-control form-select" type="text" name="le" id="le">
												<option value="">Select Leave</option>
												<option value="casual">Casual</option>
												<option value="sick">Sick</option>
												<option value="others">Others</option>
											</select>
										</div>
										<div class="mb-3 col-lg-6">
											<label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
											<select class="form-control form-select" type="text" name="lt" id="lt" placeholder="Half Day or Full Day">
												<option value="">Select Leave Type</option>
												<option value="0.5">Half Day</option>
												<option value="1">Full Day</option>
										
											</select>
										</div>
										<div class="mb-3 col-lg-4">
											<label class="col-form-label">From <span class="text-danger">*</span></label>
											<div class="cal-icon">
												<input class="form-control dat" type="text" name="lfd" id="lfd" onchange="calculateDateDifference()">
											</div>
										</div>
										<div class="mb-3 col-lg-4">
											<label class="col-form-label">To <span class="text-danger">*</span></label>
											<div class="cal-icon">
												<input class="form-control dat" type="text" name="ltd" id="ltd" onchange="calculateDateDifference()">
											</div>
										</div>
										<div class="mb-3 col-lg-4">
											<label class="col-form-label">Number of days <span class="text-danger">*</span></label>
											<input class="form-control"  type="text"  name="lnd" id="lnd" readonly>
										</div>
										<!-- <div class="input-block mb-3">
											<label class="col-form-label">Remaining Leaves <span class="text-danger">*</span></label>
											<input class="form-control" readonly value="12" type="text">
										</div> -->
										<div class="input-block mb-3">
											<label class="col-form-label">Leave Reason <span class="text-danger">*</span></label>
											<textarea rows="4" class="form-control"  name="lr" id="lr"></textarea>
										</div>
										<div class="submit-section">
											<button class="btn btn-primary submit-btn adlv">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Leave Modal -->
				
				<!-- Delete Leave Modal -->
				<div class="modal custom-modal fade" id="delete_approve" role="dialog">
					<div class="modal-dialog modal-dialog-centered ">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Leave</h3>
									<p>Are you sure want to Cancel this leave?</p>
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
				<!-- /Delete Leave Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
		@include('frontend.include.footer')
