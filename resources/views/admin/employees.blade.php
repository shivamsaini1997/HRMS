@include('admin.includes.head')
@include('admin.includes.header')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Sidebar -->
			@include('admin.includes.sidebar')
			<!-- /Sidebar -->
            <div class="page-wrapper">
				<!-- Page Content -->
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Employee</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Employee</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa-solid fa-plus"></i> Add Employee</a>
								<!-- <div class="view-icons">
									<a href="employees.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="employees-list.html" class="list-view btn btn-link"><i class="fa-solid fa-bars"></i></a>
								</div> -->
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="input-block mb-3 form-focus">
								<input type="text" id="employeeIdInput" class="form-control floating">
								<label class="focus-label">Employee ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="input-block mb-3 form-focus">
								<input type="text" id="employeeNameInput" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="input-block mb-3 form-focus select-focus">
								<select class="select floating" id="organizationDropdown"> 
								<option value="">Select Organization</option>
									@foreach($departmentsByOrganization as $orgId => $orgData)
										<option value="{{ $orgData['org_name'] }}">{{ $orgData['org_name'] }}</option>
									@endforeach
								</select>
								<label class="focus-label">Organization</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="d-grid">
								<a href="#" id="searchButton" class="btn btn-success w-100"> Search </a>  
							</div>  
						</div>
						<div class="col-sm-6 col-md-1">
							<div class="d-grid">  
								<a href="{{url('/admin/employees')}}" class="btn btn-secondary w-100"> Reset </a>  
							</div>  
						</div>
                    </div>
					<!-- Search Filter -->
					
					<div class="row staff-grid-row">
						@foreach($all_emp as $emp)
						@php
							$fullName = $emp->firstname;

							$words = explode(' ', $fullName);

						
							$initials = '';

							
							foreach ($words as $word) {
								$initials .= strtoupper(substr($word, 0, 1));
							}
						@endphp
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3 empdata">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="{{ url('admin/employees/profile') }}/{{ strtolower($emp->emp_id) }}" class="avatar">
									@if($emp->image != null)
										<img src="{{url('public/uploads/profile')}}/{{$emp->image}} " alt="{{$emp->firstname}}">
									@else
										<span class="em-name-show">{{$initials}}</span>
									@endif
									</a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item edit-emp" data-bs-toggle="modal" data-bs-target="#edit_employee" data-id="{{$emp->userid}}"><i class="fa-solid fa-pencil m-r-5"></i> Change Password</a>
										<a class="dropdown-item dl-emp" data-bs-toggle="modal" data-bs-target="#delete_employee"data-id="{{$emp->userid}}" data-email="{{$emp->email}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
									</div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ url('admin/employees/profile') }}/{{ strtolower($emp->emp_id) }}">{{$emp->firstname}}</a></h4>
								<div class="small text-muted">{{$emp->design}}</div>
								<div class="small text-muted">Employee Id : {{$emp->emp_id}}</div>
							</div>
						</div>
						@endforeach
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Employee Modal -->
				<div id="add_employee" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Employee</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)" id="ad_emp" method="post">
									<div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">First Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="fname" id="fn" placeholder="Enter employee first name">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Last Name</label>
												<input class="form-control" type="text" name="lname" id="ln" placeholder="Enter employee last name">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
											<label class="col-form-label">Country code<span class="mandatory">*</span></label>

											<select class="form-select form-control" name="country_code" id="countryname">

												<option value="" selected>Select Country </option>
												@foreach($country as $c)
													<option value="+ {{ $c->phonecode }}" data-id="{{$c->id}}" @if($c->iso == 'IN') selected @endif>+{{ $c->phonecode }} {{ strtolower($c->name) }}</option>
												@endforeach
											</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="phnno" id="ph" placeholder="Enter employee phone number">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Organization Name</label>
												<select class="form-control" name="org" id="org">
													<option value="">Select Organization</option>
													@foreach($departmentsByOrganization as $orgId => $orgData)
														<option value="{{ $orgData['org_name'] }}">{{ $orgData['org_name'] }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Department</label>
												<select class="form-control" name="dept" id="dept">
													<option value="">Select Department</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Designation <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="des" id="des" placeholder="Enter employee designation">
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Email<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="email" id="em" placeholder="Enter employee email">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Password </label>
												<input class="form-control" type="password" name="pas1" id="ps" placeholder="Enter employee password" autocomplete="new-password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Confirm Password</label>
												<input class="form-control" type="password" name="pas2" id="cps" placeholder="Enter your Confirm password" onkeyup="login()">
									 			<span id="login-error" style="color: #fb0505;font-weight: 500;"></span>
											</div>
										</div>
										
										
									</div>
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Employee Modal -->
				
				<!-- Edit Employee Modal -->
				<div id="edit_employee" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Change Password</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm1" method="post">
								<input class="form-control" type="hidden" name="uid" id="uid">
									<div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Full Name <span class="text-danger">*</span></label>
												<input class="form-control"  type="text" name="fname" id="fname" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Employee Id</label>
												<input class="form-control"  type="text" name="eid" id="eid" readonly>
											</div>
										</div>
										
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Email <span class="text-danger">*</span></label>
												<input class="form-control" name="ema" id="ema" type="email" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Password</label>
												<input class="form-control" type="password" name="pas1" id="ps" placeholder="Enter your password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Confirm Password</label>
												<input class="form-control" type="password" name="pas2" id="cps" placeholder="Enter your Confirm password" onkeyup="login()">
												<span id="login-error" style="color: #fb0505;font-weight: 500;"></span>
											</div>
										</div>				
										
									</div>
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Update Password</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Employee Modal -->
				
				<!-- Delete Employee Modal -->
				<div class="modal custom-modal fade" id="delete_employee" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Employee</h3>
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
				<!-- /Delete Employee Modal -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		


		@include('admin.includes.footer')
		<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
		<script>
			 function login() {
            
				var password = $("#ps").val();
				var password1 = $("#cps").val();
				var pswlen = password.length;
				if (password == password1) {
					$('#login-error').text(''); 
					return true;
				}
				else {
					$('#login-error').text('password and confirm password should be same.'); 
					return false;
				}
			}
			$(document).ready(function(){
				$('.edit-emp').click(function(){
					var empId = $(this).data('id');
					$.ajax({
						url: '/get-emp-details',
						method: 'GET',
						data: { id: empId },
						success: function(data){
							console.log(data);
							$('#edit_employee #fname').val(data.empdetails.firstname);
							$('#edit_employee #eid').val(data.empdetails.emp_id);
							$('#edit_employee #ema').val(data.empdetails.email);
							$('#edit_employee #uid').val(data.empdetails.userid);							
							$('#edit_employee').modal('show');
						},
						error: function(error){
							triggerAlert('Somthings went wrong.','error');
						}
					});
				});

				var empIdToDelete;
				var empEmailToDelete;

				// Set empIdToDelete when dl-emp is clicked
				$('.dl-emp').click(function(){
					empIdToDelete = $(this).data('id');
					empEmailToDelete = $(this).data('email');
				});

				// Handle Delete button click
				$('.continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/del-em',
						method: 'POST',
						data: {
							"_token": csrfToken,
							id: empIdToDelete,
							email: empEmailToDelete
						},
						success: function(data){
							console.log(data);
							triggerAlert('You have successfully deleted the employee', 'success');
							$('#delete_employee .btn-close').click();
							location.reload(true);
						},
						error: function(error){
							triggerAlert('Something went wrong.', 'error');
						}
					});
				});

				$('#myForm1').submit(function(event) {
					event.preventDefault();
					
					const password = $('#ps');
					const conf_password = $('#cps');
					const uid = $('#uid');
					const email = $('#ema');

					
					if (password.val().trim() === '') {
					
						triggerAlert('Please enter your password.','error');
						password.focus();
						return;
					}
					if (conf_password.val().trim() === '') {
					
						triggerAlert('Please enter your confirm password.','error');
						conf_password.focus();
						return;
					}
		
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: "/emp-update-pass", 
						type: 'POST',
						data: {
							"_token": csrfToken,
							uid: uid.val(),
							password: password.val(),
							email: email.val()
						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully changed password', 'success');
								$('#edit_employee .btn-close').click();
                    			location.reload(true);
							} else {
								triggerAlert('This user already signed up!', 'error');
							}
						},
						error: function(error) {
							triggerAlert('Somthings went wrong.','error');
						}
					});
				});
			});
		</script>



<script>
$(document).ready(function() {
// Event listener for organization select
$('#org').on('change', function() {
	var selectedOrgName = $(this).val();
	var orgData = <?php echo json_encode($departmentsByOrganization); ?>;
	var departments = null;
	
	// Find the organization data based on the selected organization name
	$.each(orgData, function(orgId, org) {
		if (org.org_name === selectedOrgName) {
			departments = org.departments;
			return false; // Break out of the loop once found
		}
	});
	
	if (departments) {
		// Clear and populate department dropdown
		$('#dept').empty().append('<option value="">Select Department</option>');
		$.each(departments, function(index, department) {
			$('#dept').append($('<option>', {
				value: department['dept_name'],
				text: department['dept_name']
			}));
		});
	} else {
		// If no departments found, clear department dropdown
		$('#dept').empty().append('<option value="">No departments found</option>');
	}
});
});

</script>


<script>
	// Initialize Select2
	$(document).ready(function() {
		$('#countrySelect').select2();
	});
</script>
<script>
 function login() {
		
		 var password = $("#ps").val();
		 var password1 = $("#cps").val();
		 var pswlen = password.length;
			if (password == password1) {
				$('#login-error').text(''); 
				return true;
			 }
			 else {
				$('#login-error').text('password and confirm password should be same.'); 
				 return false;
			 }
	}
	$(document).ready(function() {
		$('#ad_emp').submit(function(event) {
			event.preventDefault();
			const name = $('#fn');
			const lname = $('#ln');
			const dept = $('#dept');
			const email = $('#em');
			const ph_number = $('#ph');
			const password = $('#ps');
			const conf_password = $('#cps');
			const orgname = $('#org');
			const design = $('#des');
			const countrySelect = $('#countryname');
			const selectedOption = countrySelect.find(':selected');
			const countrycode = selectedOption.val();
			const country_Id = selectedOption.data('id');

			if (name.val().trim() === '' || name.val().length < 1) {
				triggerAlert('Please enter your first name.','error');
				name.focus();
				return;
			}
			if (lname.val().trim() === '' || lname.val().length < 1) {
				triggerAlert('Please enter your last name.','error');
				lname.focus();
				return;
			}
			if (ph_number.val().trim() === '' || ph_number.val().length < 10) {
				triggerAlert('Please enter your phone number.','error');
				ph_number.focus();
				return;
			}
			
			if (email.val().trim() === '') {
				triggerAlert('Please enter your email.','error');
				email.focus();
				return;
			} 
			if (password.val().trim() === '') {
			   
				triggerAlert('Please enter your password.','error');
				password.focus();
				return;
			}
			if (conf_password.val().trim() === '') {
			   
				triggerAlert('Please enter your confirm password.','error');
				conf_password.focus();
				return;
			}

			 var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/employee-add", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					firstname: name.val(),
					lname: lname.val(),
					dept: dept.val(),
					email: email.val(),
					orgname: orgname.val(),
					design: design.val(),
					phonenumber: ph_number.val(),
					password: password.val(),
					country_code:countrycode,
					country_id:country_Id,
				},
				success: function(response) {
					if (response.success) {
						triggerAlert('You have successfully registered', 'success');
						location.reload(true);
					} else {
						triggerAlert('This user already signed up!', 'error');
					}
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
			});
		});
		
	   

	});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('em').value = '';
    });
</script>

<script>
    $(document).ready(function() {
        
        $('#organizationDropdown').change(function() {
            var organization = $(this).val();
            $.ajax({
                url: '/admin/employees', 
                method: 'GET',
                data: { organization: organization , search: 'chorg'},
                success: function(response) {
                    var empdata = $(response).find('.empdata');
            		$('.staff-grid-row').html(empdata);
                }
            });
        });

        // Function to handle search button click
        $('#searchButton').click(function(e) {
            e.preventDefault();
            var employeeId = $('#employeeIdInput').val();
            var employeeName = $('#employeeNameInput').val();
            $.ajax({
                url: '/admin/employees', 
                method: 'GET',
                data: { employeeId: employeeId, employeeName: employeeName,search: 'enorg' },
                success: function(response) {
                    var empdata = $(response).find('.empdata');
            		$('.staff-grid-row').html(empdata);
                }
            });
        });
    });
</script>