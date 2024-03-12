@include('admin.includes.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
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
					<!-- <div class="row">
						<div class="col-md-3 d-flex">
							<div class="stats-info w-100">
								<h6>Today Presents</h6>
								<h4>12 / 60</h4>
							</div>
						</div>
						<div class="col-md-3 d-flex">
							<div class="stats-info w-100">
								<h6>Planned Leaves</h6>
								<h4>8 <span>Today</span></h4>
							</div>
						</div>
						<div class="col-md-3 d-flex">
							<div class="stats-info w-100">
								<h6>Unplanned Leaves</h6>
								<h4>0 <span>Today</span></h4>
							</div>
						</div>
						<div class="col-md-3 d-flex">
							<div class="stats-info w-100">
								<h6>Pending Requests</h6>
								<h4>12</h4>
							</div>
						</div>
					</div> -->
					<!-- /Leave Statistics -->
					
					<!-- Search Filter -->
					<div class="row filter-row">
					   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
							<div class="input-block mb-3 form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
					   </div>
					   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
							<div class="input-block mb-3 form-focus select-focus">
								<select class="select floating"> 
									<option> -- Select -- </option>
									<option>Casual Leave</option>
									<option>Medical Leave</option>
									<option>Loss of Pay</option>
								</select>
								<label class="focus-label">Leave Type</label>
							</div>
					   </div>
					   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
							<div class="input-block mb-3 form-focus select-focus">
								<select class="select floating"> 
									<option> -- Select -- </option>
									<option> Pending </option>
									<option> Approved </option>
									<option> Rejected </option>
								</select>
								<label class="focus-label">Leave Status</label>
							</div>
					   </div>
					   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
							<div class="input-block mb-3 form-focus">
								<div class="cal-icon">
									<input class="form-control floating datetimepicker" type="text">
								</div>
								<label class="focus-label">From</label>
							</div>
						</div>
					   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
							<div class="input-block mb-3 form-focus">
								<div class="cal-icon">
									<input class="form-control floating datetimepicker" type="text">
								</div>
								<label class="focus-label">To</label>
							</div>
						</div>
					   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
							<a href="#" class="btn btn-success w-100"> Search </a>  
					   </div>     
                    </div>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Leave Type</th>
											<th>Leave</th>
											<th>From</th>
											<th>To</th>
											<th>No of Days</th>
											<th>Reason</th>
											<th class="text-center">Status</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									<tbody>
										@if(!empty($all_leaves))
											@foreach($all_leaves as $leaves)
											@php 
												$str = $leaves->leave;
												$converted_str = ucwords(str_replace('_', ' ', $str));
											@endphp
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="{{ url('admin/employees/profile') }}/{{ strtolower($leaves->emp_id) }}" class="avatar"><img src="{{url('public/uploads/profile')}}/{{$leaves->image}}" alt="User Image"></a>
														<a href="{{ url('admin/employees/profile') }}/{{ strtolower($leaves->emp_id) }}">{{$leaves->firstname}} {{$leaves->lastname}} <span>( {{$leaves->dept}} ) </span></a>
													</h2>
												</td>
												<td>@if($leaves->leave_type == '0.5') Half Day @else Full Day @endif</td>
												<td>{{$converted_str}}</td>
												<td>{{$leaves->from}}</td>
												<td>{{$leaves->to}}</td>
												<td>{{$leaves->no_of_day}}</td>
												<td>{{$leaves->leave_reason}}</td>
												<td class="text-center">
													<div class="dropdown action-label">
														<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
															@if($leaves->status=='A')
																<i class="fa-regular fa-circle-dot text-success"></i> Approved
															@elseif($leaves->status=='P')
																<i class="fa-regular fa-circle-dot text-danger"></i> Pending
															@elseif($leaves->status=='D')
																<i class="fa-regular fa-circle-dot text-info"></i> Declined
															@endif
														</a>
														<div class="dropdown-menu dropdown-menu-right status-dropdown">
																<a class="dropdown-item" leave-id="{{$leaves->id}}" uid="{{$leaves->userid}}" data-status="P" href="#">Pending</a>
																<a class="dropdown-item" leave-id="{{$leaves->id}}" uid="{{$leaves->userid}}" data-status="A" href="#">Approved</a>
																
																<a class="dropdown-item" leave-id="{{$leaves->id}}" uid="{{$leaves->userid}}" data-status="D" href="#">Declined</a>
															</div>
													</div>
												</td>
												<td class="text-end">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
															<a class="dropdown-item dl-leave" href="#" data-bs-toggle="modal" data-leave-id="{{$leaves->id}}" data-id="{{$leaves->userid}}" data-bs-target="#delete_approve"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
											@endforeach
										@else
											No data found
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
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
								<form action="javascript:void(0)"  id="myForm10" method="post">
									<div class="input-block mb-3">
										<label class="col-form-label">Employee  Name<span class="text-danger">*</span></label>
										<select class="form-select form-control"  name="enname" id="ename">
											<option value=""> -- Select Employee -- </option>
											@foreach($all_employees as $employee)
												<option value="{{ $employee->userid }}" dataid="{{ $employee->email }}">{{ $employee->firstname }}</option>
											@endforeach
										</select>
									</div>
									<div class="row">
									<div class="mb-3 col-lg-6">
										<label class="col-form-label">Leave<span class="text-danger">*</span></label>
										<select class="form-control" type="text" name="ale" id="ale">
											<option value="">Select Leave</option>
												<option value="casual">Casual</option>
												<option value="sick">Sick</option>
												<option value="others">Others</option>
										</select>
									</div>
									<div class="mb-3 col-lg-6">
										<label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
										<select class="form-control" type="text" name="alt" id="alt">
											<option value="">Select Leave Type</option>
												<option value="0.5">Half Day</option>
												<option value="1">Full Day</option>
										
										</select>
									</div>
									<div class="mb-3 col-lg-4">
										<label class="col-form-label">From <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control dat" type="text" name="alfd" id="alfd" onchange="acalculateDateDifference()">
										</div>
									</div>
									<div class="mb-3 col-lg-4">
										<label class="col-form-label">To <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control dat" type="text" name="altd" id="altd" onchange="acalculateDateDifference()">
										</div>
									</div>
									<div class="mb-3 col-lg-4">
										<label class="col-form-label">Number of days <span class="text-danger">*</span></label>
										<input class="form-control"  type="text"  name="alnd" id="alnd" readonly>
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Leave Reason <span class="text-danger">*</span></label>
										<textarea rows="4" class="form-control"  name="alr" id="alr"></textarea>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn adleave">Submit</button>
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
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Leave</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
								<div class="input-block mb-3">
										<label class="col-form-label">Employee Name<span class="text-danger">*</span></label>
										<input class="form-control"  type="text">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
										<select class="form-select form-control" aria-label="Default select example">
											<option select>Select Leave Type</option>
											<option>Casual Leave 12 Days</option>
										</select>
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">From <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" value="01-01-2019" type="text">
										</div>
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">To <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" value="01-01-2019" type="text">
										</div>
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Number of days <span class="text-danger">*</span></label>
										<input class="form-control" type="text" value="2">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Remaining Leaves <span class="text-danger">*</span></label>
										<input class="form-control"  value="12" type="text">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Leave Reason <span class="text-danger">*</span></label>
										<textarea rows="4" class="form-control">Going to hospital</textarea>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Leave Modal -->

				<!-- Approve Leave Modal -->
				<div class="modal custom-modal fade" id="approve_leave" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Leave Approve</h3>
									<p>Are you sure want to approve for this leave?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Approve Leave Modal -->
				
				<!-- Delete Leave Modal -->
				<div class="modal custom-modal fade" id="delete_approve" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Leave</h3>
									<p>Are you sure want to delete this leave?</p>
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

	
@include('admin.includes.footer')
<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.status-dropdown .dropdown-item').on('click', function(event) {
			event.preventDefault();
			
			const selectedStatus = $(this).data('status');
			const leaveId = $(this).attr('leave-id');
			const userId = $(this).attr('uid');
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: '/update-employee-leave',
				type: 'POST',
				data: {
					"_token": csrfToken,
					"leaveId": leaveId,
					"userId": userId,
					"status": selectedStatus,
					"type" :"update_status"
				},
				success: function(response) {
					if (response.success) {
						triggerAlert('You have successfully changed employee leave status', 'success');
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
		$('.dat').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

		function acalculateDateDifference() {
			var fromDate = new Date($('#alfd').val());
			var toDate = new Date($('#altd').val());

			console.log('fromDate:', fromDate);
			console.log('toDate:', toDate);

			if (!isNaN(fromDate.getTime()) && !isNaN(toDate.getTime())) {
				var timeDifference = toDate.getTime() - fromDate.getTime();
				var dayDifference = Math.floor(timeDifference / (1000 * 3600 * 24));

				console.log('timeDifference:', timeDifference);
				console.log('dayDifference:', dayDifference);

				$('#alnd').val(dayDifference);
			}
		}

		$('.adleave').click(function(){
			const ale = $('#ale');
			const alt = $('#alt');
			const alfd = $('#alfd');
			const altd = $('#altd');
			const alnd = $('#alnd');
			const alr = $('#alr');
			const userid = $('#ename');
			const selectedEmployee = userid.find(':selected');
			const employeeUserId = selectedEmployee.val();
			const employeeEmail = selectedEmployee.attr('dataid');
			if (userid.val().trim() === '') {
				triggerAlert('Please select employee name.','error');
				userid.focus();
				return;
			} 
			if (ale.val().trim() === '') {
				triggerAlert('Please enter your leave.','error');
				ale.focus();
				return;
			} 
			if (alt.val().trim() === '') {
				triggerAlert('Please enter your leave Type.','error');
				alt.focus();
				return;
			}
			if (alfd.val().trim() === '') {
				triggerAlert('Please enter leave from date.','error');
				alfd.focus();
				return;
			}
			if (altd.val().trim() === '') {
				triggerAlert('Please enter leave to date.','error');
				altd.focus();
				return;
			} 
			if (alnd.val().trim() === '') {
			
				triggerAlert('Please enter leave number of days.','error');
				alnd.focus();
				return;
			}
			if (alr.val().trim() === '') {
			
				triggerAlert('Please enter your leave reason.','error');
				alr.focus();
				return;
			}

			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/update-employee-leave", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					l: ale.val(),
					lt: alt.val(),
					lfd: alfd.val(),
					ltd: altd.val(),
					lnd: alnd.val(),
					lr: alr.val(),
					eid:userid.val(),
					email: employeeEmail,
					"type" :"add_leave"     
				},
				success: function(response) {
					
					if (response.success) {
						triggerAlert('You have successfully requested for Leave', 'success');
						$('#add_leave .btn-close').click();
						location.reload(true);
					} else {
						triggerAlert('Somthings went wrong!', 'error');
					}
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
			});
		});

		var assetIdToDelete;
		var assetUserIdToDelete;
		$('.dl-leave').click(function(){
			uid = $(this).data('id');
			lid = $(this).data('leave-id');
		});

		// Handle Delete button click
		$('.continue-btn').click(function(){
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: '/del-leave',
				method: 'POST',
				data: {
					"_token": csrfToken,
					lid: lid,
					userid: uid,
					"type" :"del_leave"

				},
				success: function(data){
					console.log(data);
					triggerAlert('You have successfully deleted the Leave', 'success');
					$('#delete_approve .btn-close').click();
					location.reload(true);
				},
				error: function(error){
					triggerAlert('Something went wrong.', 'error');
				}
			});
		});
	});
</script>

		