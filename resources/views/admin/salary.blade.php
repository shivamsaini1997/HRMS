@include('admin.includes.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			@include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')
			
		
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Employee Salary</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Salary</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa-solid fa-plus"></i> Add Salary</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<?php 
						$year = date('Y');
						$month = date('m');
					?>
					<!-- Search Filter -->
					<form action="" method="GET">
						<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="input-block mb-3 form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="smonth" id="smonth"> 
										@for ($m = 1; $m <= 12; $m++)
											<option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
										@endfor
									</select>
									<label class="focus-label">Select Month</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="year" id="year"> 
										@for ($y = date('Y'); $y >= date('Y') - 10; $y--)
											<option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
										@endfor
									</select>
									<label class="focus-label">Select Year</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">  
								<div class="d-grid">
									<button type="submit" class="btn btn-success"> Search </button>  
								</div>
							</div>
							
						</div>
					</form>

					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Employee ID</th>
										
											<th>Join Date</th>
											<th>Role</th>
											<th>Month</th>

											<th>Salary</th>
											<th>Payslip</th>
											<th class="text-end">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(!empty($getall_emp_salary))
											@foreach($getall_emp_salary as $empsalary)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar"><img src="{{url('public/uploads/profile')}}/{{$empsalary->image}}" alt="User Image"></a>
															<a href="javascript:void(0)">{{$empsalary->firstname}}</a>
														</h2>
													</td>
													<td>{{$empsalary->emp_id}}</td>

													<td>{{$empsalary->doj}}</td>
													<td>{{$empsalary->dept}}</td>
													<td>Dec 2023</td>
													<td>INR : {{$empsalary->total_gross_salary}}</td>
													<td><a class="btn btn-sm btn-primary" href="{{ url('admin/salary') }}/{{ strtolower($empsalary->emp_id) }}/{{ $empsalary->id }}">Generate Slip</a></td>
													<td class="text-end">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
																<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
															</div>
														</div>
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
				
				<!-- Add Salary Modal -->
				<div id="add_salary" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Staff Salary</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)" id="sl-pe" method="POST" class="salarysatff">
									<div class="row"> 
										<div class="col-sm-6"> 
											<div class="input-block mb-3">
												<label class="col-form-label">Select Staff</label>
												<select class="form-select form-control" id="staff" name="staff"> 
												<option value=""> -- Select Employee -- </option>
													@foreach($all_employees as $employee)
													<option value="{{$employee->userid}}" dataid="{{$employee->email}}">{{$employee->firstname}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-3"> 
											<label class="col-form-label">Gross Salary</label>
											<input class="form-control" name="grosssalary" id="grosssalary" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
										<div class="col-sm-3"> 
											<label class="col-form-label">Select Salary Month</label>
											<input class="form-control" name="sm" id="sm" type="date">
										</div>
									</div>
									<div class="row"> 
										<div class="col-sm-6"> 
											<h4 class="text-primary">Earnings</h4>
											<div class="input-block mb-3">
												<label class="col-form-label">Basic</label>
												<input class="form-control" name="basic" id="basic" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">DA(50%)</label>
												<input class="form-control" name="da" id="da" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">HRA(15%)</label>
												<input class="form-control" name="hra" id="hra" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Arreas / OT Salary</label>
												<input class="form-control" name="areas_ot" id="areas_ot" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Allowance</label>
												<input class="form-control" name="allowance" id="allowance" type="number" placeholder="0"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Insentive</label>
												<input class="form-control" id="insentive" name="insentive" type="number" placeholder="0"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Bonus</label>
												<input class="form-control" name="bonus" id="bonus"  type="number" placeholder="0"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<!-- <div class="add-more">
												<a href="#"><i class="fa-solid fa-plus-circle"></i> Add More</a>
											</div> -->
										</div>
										<div class="col-sm-6">  
											<h4 class="text-primary">Deductions</h4>
											<div class="input-block mb-3">
												<label class="col-form-label">TDS</label>
												<input class="form-control" name="tds" id="tds" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div> 
											<div class="input-block mb-3">
												<label class="col-form-label">ESI</label>
												<input class="form-control" name="esi" id="esi" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">PF</label>
												<input class="form-control" id="pf" name="pf" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Insurance Deduction</label>
												<input class="form-control" name="insurancededuction" id="insurancededuction" placeholder="0" type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Profession Tax</label>
												<input class="form-control" name="Prof" id="Prof" type="number" placeholder="0"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Staff Conv Deduction</label>
												<input class="form-control" name="staffconvdeduction" id="staffconvdeduction" placeholder="0" type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Others</label>
												<input class="form-control" name="otherDeductions" id="otherDeductions" placeholder="0" type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
											<!-- <div class="add-more">
												<a href="#"><i class="fa-solid fa-plus-circle"></i> Add More</a>
											</div> -->
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn submitsalary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Salary Modal -->
				
				<!-- Edit Salary Modal -->
				<div id="edit_salary" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Staff Salary</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="">
									<div class="row"> 
										<div class="col-sm-6"> 
											<div class="input-block mb-3">
												<label class="col-form-label">Select Staff</label>
												<select class="form-select form-control" id="estaff" name="estaff"> 
												<option value=""> -- Select Employee -- </option>
													@foreach($all_employees as $employee)
													<option value="{{$employee->userid}}" dataid="{{$employee->email}}">{{$employee->firstname}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6"> 
											<label class="col-form-label">Net Salary</label>
											<input class="form-control" name="enetsalary" id="enetsalary" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
									</div>
									<div class="row"> 
										<div class="col-sm-6"> 
											<h4 class="text-primary">Earnings</h4>
											<div class="input-block mb-3">
												<label class="col-form-label">Basic</label>
												<input class="form-control" name="ebasic" id="ebasic" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">DA(40%)</label>
												<input class="form-control" name="eda" id="eda" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">HRA(15%)</label>
												<input class="form-control" name="ehra" id="ehra" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">areas_ot</label>
												<input class="form-control" name="eareas_ot" id="eareas_ot" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Allowance</label>
												<input class="form-control" name="eallowance" id="eallowance" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Medical  Allowance</label>
												<input class="form-control" id="einsentive" name="einsentive" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Others</label>
												<input class="form-control" name="ebonus" id="ebonus"  type="text">
											</div>
											<!-- <div class="add-more">
												<a href="#"><i class="fa-solid fa-plus-circle"></i> Add More</a>
											</div> -->
										</div>
										<div class="col-sm-6">  
											<h4 class="text-primary">Deductions</h4>
											<div class="input-block mb-3">
												<label class="col-form-label">TDS</label>
												<input class="form-control" name="etds" id="etds" type="text">
											</div> 
											<div class="input-block mb-3">
												<label class="col-form-label">ESI</label>
												<input class="form-control" name="eesi" id="eesi" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">PF</label>
												<input class="form-control" id="epf" name="epf" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Leave</label>
												<input class="form-control" name="eleave" id="eleave" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Prof. Tax</label>
												<input class="form-control" name="eProf" id="eProf" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">staffconvdeduction Welfare</label>
												<input class="form-control" name="estaffconvdeduction" id="estaffconvdeduction" type="text">
											</div>
											<div class="input-block mb-3">
												<label class="col-form-label">Others</label>
												<input class="form-control" name="eotherDeductions" id="eotherDeductions" type="text">
											</div>
											<!-- <div class="add-more">
												<a href="#"><i class="fa-solid fa-plus-circle"></i> Add More</a>
											</div> -->
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
				<!-- /Edit Salary Modal -->
				
				<!-- Delete Salary Modal -->
				<div class="modal custom-modal fade" id="delete_salary" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Salary</h3>
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
				<!-- /Delete Salary Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		@include('admin.includes.footer')
		<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>

		<script>
		$(".salarysatff input").keypress(function(event) {
			var inputType = $(this).attr("type");

			// Check if the input type is "tel"
			if (inputType === "tel") {
				// Check if the entered key is a numeric value
				if (event.which < 48 || event.which > 57) {
					// If not a numeric value, prevent the keypress and display an alert
					event.preventDefault();
					// alert("Please enter only numeric values.");

					triggerAlert('Please enter only numeric values..','error');
				}
			}
		});
		$(document).ready(function(){
		
			
			

			$('.submitsalary').click(function(event) {
					event.preventDefault();
					
					const staff = $('#staff');
					const grosssalary = $('#grosssalary');
					const basic = $('#basic');
					const da = $('#da');
					const hra = $('#hra');
					const areas_ot = $('#areas_ot');
					const allowance = $('#allowance');
					const insentive = $('#insentive');
					const bonus =$('#bonus');
					const tds =$('#tds');
					const esi =$('#esi');
					const pf =$('#pf');
					const insurancededuction =$('#insurancededuction');
					const Prof =$('#Prof');
					const staffconvdeduction =$('#staffconvdeduction');
					const otherDeductions =$('#otherDeductions');
					const salarydate=$('#sm');

					
					if (staff.val().trim() === '') {
						triggerAlert('Please select employee name.','error');
						staff.focus();
						return;
					}
					if (grosssalary.val().trim() === '') {
						triggerAlert('Please enter your grosss salary.','error');
						grosssalary.focus();
						return;
					}

					if (salarydate.val().trim() === '') {
						triggerAlert('Please select salary month.','error');
						salarydate.focus();
						return;
					}

					if (basic.val().trim() === '') {
						triggerAlert('Please enter basic salary.','error');
						basic.focus();
						return;
					}
					if (da.val().trim() === '') {
						triggerAlert('Please enter DA.','error');
						da.focus();
						return;
					}
					if (hra.val().trim() === '') {
						triggerAlert('Please enter HRA.','error');
						hra.focus();
						return;
					}
					if (areas_ot.val().trim() === '') {
						triggerAlert('Please enter areas_ot.','error');
						areas_ot.focus();
						return;
					}
					if (allowance.val().trim() === '') {
						triggerAlert('Please enter allowance.','error');
						allowance.focus();
						return;
					}
					if (insentive.val().trim() === '') {
						triggerAlert('Please enter medical allowace .','error');
						insentive.focus();
						return;
					}
					if (bonus.val().trim() === '') {
						triggerAlert('Please enter other earnings .','error');
						bonus.focus();
						return;
					}
					if (tds.val().trim() === '') {
						triggerAlert('Please enter tds.','error');
						tds.focus();
						return;
					}
					if (esi.val().trim() === '') {
						triggerAlert('Please enter ESI .','error');
						esi.focus();
						return;
					}
					if (pf.val().trim() === '') {
						triggerAlert('Please enter pf.','error');
						pf.focus();
						return;
					}
					if (insurancededuction.val().trim() === '') {
						triggerAlert('Please enter insurancededuction.','error');
						insurancededuction.focus();
						return;
					}
					if (Prof.val().trim() === '') {
						triggerAlert('Please enter Prof.','error');
						Prof.focus();
						return;
					}
					if (staffconvdeduction.val().trim() === '') {
						triggerAlert('Please enter staffconvdeduction.','error');
						staffconvdeduction.focus();
						return;
					}
					if (otherDeductions.val().trim() === '') {
						triggerAlert('Please enter otherDeductions.','error');
						otherDeductions.focus();
						return;
					}
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: "/salary-payroll", 
						type: 'POST',
						data: {
							"_token": csrfToken,
							staff: staff.val(),
							grosssalary: grosssalary.val(),
							basic: basic.val(),
							da: da.val(),
							hra: hra.val(),
							areas_ot: areas_ot.val(),
							allowance: allowance.val(),
							insentive: insentive.val(),
							bonus: bonus.val(),
							tds: tds.val(),
							esi: esi.val(),
							pf: pf.val(),
							insurancededuction: insurancededuction.val(),
							Prof: Prof.val(),
							staffconvdeduction: staffconvdeduction.val(),	
							otherDeductions: otherDeductions.val(),	
							salarydate:salarydate.val(),		
						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully added employee salary', 'success');
								$('#add_salary .btn-close').click();
								$('#sl-pe')[0].reset();
                    			location.reload(true);
							} else {
								triggerAlert('Somthing went wrong!', 'error');
								$('#sl-pe')[0].reset();
							}
						},
						error: function(error) {
							triggerAlert('Somthings went wrong.','error');
							$('#sl-pe')[0].reset();
						}
					});
				});

				
		});
		</script>