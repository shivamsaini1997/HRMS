<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<style>
				.addProjectsalary {
					position: absolute;
					right: 31px;
					top: 33px;
				}
				@media (max-width: 767px) {
					.addProjectsalary {
						top: -16px;
					}
				}
			</style>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
		
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Consultant Remuneration</h3>
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
					
					
					<!-- Search Filter -->
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
										<?php for($m = 1; $m <= 12; $m++): ?>
											<option value="<?php echo e($m); ?>" <?php echo e($m == $month ? 'selected' : ''); ?>><?php echo e(date('F', mktime(0, 0, 0, $m, 1))); ?></option>
										<?php endfor; ?>
									</select>
									<label class="focus-label">Select Month</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="year" id="year"> 
										<?php for($y = date('Y'); $y >= date('Y') - 10; $y--): ?>
											<option value="<?php echo e($y); ?>" <?php echo e($y == $year ? 'selected' : ''); ?>><?php echo e($y); ?></option>
										<?php endfor; ?>
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
											<th>Consultant</th>
											<th>Salary Month</th>
											<th>Payable Days</th>
											<th>Monthly Salary</th>
											<th>Consolidated Fee</th>
											<th>TDS</th>
											<th>Salary</th>
											<th>Type</th>
											<th>Project Based</th>
											<th>Payslip</th>
											<th class="text-end">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php if(!empty($get_all_consultant_salary)): ?>
									<?php $__currentLoopData = $get_all_consultant_salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $const): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img src="<?php echo e(url('public/uploads/profile')); ?>/<?php echo e($const->image); ?>" alt="User Image"></a>
													<a href="javascript:void(0)"><?php echo e($const->firstname); ?> <?php echo e($const->lastname); ?></a>
												</h2>
											</td>
											<td><?php echo e($const->sal_month); ?></td>

											<td><?php echo e($const->payable_days); ?></td>
											<td><?php echo e($const->monthly_sal); ?></td>
											<td><?php echo e($const->consolidated_fee); ?></td>
											<td><?php echo e($const->tds); ?></td>
											<td><?php echo e($const->net_pay); ?></td>
											<td><?php echo e($const->type); ?></td>
											<td>
												<?php if(!empty($const->project_details)): ?>
													<?php $__currentLoopData = json_decode($const->project_details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<p>Project Number: <?php echo e($project->projectnumber); ?></p>
														<p>Project Cost: <?php echo e($project->projectcost); ?></p>
														<p>Number of Days: <?php echo e($project->numberofday); ?></p>
														<hr> 
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
													Null
												<?php endif; ?>
											</td>
											<td><a class="btn btn-sm btn-primary" href="<?php echo e(url('/admin/consultant-salary')); ?>/<?php echo e(strtolower($const->emp_id)); ?>/<?php echo e($const->id); ?>">Generate Slip</a></td>
											<td class="text-end">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
														<a class="dropdown-item dl-cs" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary" data-id="<?php echo e($const->id); ?>" data-us-id="<?php echo e($const->userid); ?>"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									No Data Found
									<?php endif; ?>	
										
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
								<h5 class="modal-title">Add Consultant Salary</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)" id="sl-pe" method="POST" class="salarysatff">
									<div class="row"> 
									<div class="col-md-6"> 
											<div class="input-block mb-3">
												<div class="form-check">
													<input class="form-check-input fixedCs" type="checkbox" value="" name="fixedsalary" id="fixedCs"checked>
													<label class="form-check-label" for="fixedCs" >
														Fixed
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-6"> 
											<div class="input-block mb-3">
												<div class="form-check">
													<input class="form-check-input projectBasedSalary" type="checkbox" name="projectBasedSalary" value="" id="projectBasedSalary">
													<label class="form-check-label" for="projectBasedSalary">
														Project Based Salary
													</label>
												</div>
											</div>
										</div>
										
										<div class="col-sm-6"> 
											<div class="input-block mb-3">
												<label class="col-form-label">Select Consultant</label>
												<select class="form-select form-control" id="staff" name="staff"> 
												<option value=""> -- Select Consultant -- </option>
													<?php $__currentLoopData = $all_emp_sal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($employee->userid); ?>" dataid="<?php echo e($employee->email); ?>" data-salary="<?php echo e($employee->salary_amt); ?>"><?php echo e($employee->firstname); ?> <?php echo e($employee->lastname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													
												</select>
											</div>
										</div>
										<div class="col-sm-3"> 
											<label class="col-form-label">Salary Payable</label>
											<input class="form-control" name="grosssalary" id="grosssalary"  type="text" placeholder="0">
										</div>
										<div class="col-sm-3"> 
											<label class="col-form-label">Select Salary Month</label>
											<input class="form-control" name="sm" id="sm" type="date">
										</div>
									</div>
									<div class="row project-base-salary d-none pt-lg-0 pt-5">
										<div class="position-relative">
									
										<!-- <b>Project Based Salary</b> --> <b></b>
										<a href="javascript:void(0)" class="addProjectsalary">
												<ul class="icons-list ">
													<li class="plusrowtravel"><i class="fe fe-plus" aria-label="fe fe-plus" data-bs-original-title="fe fe-plus"></i></li>
												</ul>
											</a>
										
										</div>
										<div class="col-md-4">
											<div class="input-block mb-3">
												<label class="col-form-label">Project Name</label>
												<input class="form-control" name="projectnumber" id="projectnumber" type="text" placeholder="0">
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-block mb-3">
												<label class="col-form-label">Project Cost/Day</label>
												<input class="form-control" name="projectcost" id="projectcost" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
										<div class="col-md-3">
											<div class="input-block mb-3">
												<label class="col-form-label">No of Day</label>
												<input class="form-control" name="numberofday" id="numberofday" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
										
										<div class="col-md-1">
											<button type="button" class="btn btn-danger delete-project d-none">Delete</button>
										</div>
       
									</div>
									<div class="row"> 
										<div class="col-sm-2"> 
											
											<div class="input-block mb-3">
												<label class="col-form-label">Days Payable</label>
												<input class="form-control" name="daypayable" id="daypayable" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
										<div class="col-sm-3"> 
											
											<div class="input-block mb-3">
												<label class="col-form-label">Consolidated Fee</label>
												<input class="form-control" name="basic" id="basic" type="number" placeholder="0" readonly>
											</div>
										</div>
										<div class="col-sm-4">  
											
											<div class="input-block mb-3">
												<label class="col-form-label">TDS</label>
												<div class="row">
												<div class="col-6 pe-0">
														<select name="tdsp" id="tdsp" class="form-select form-control">
															<option value="">Select</option>
															<option value="05">5%</option>
															<option value="10">10%</option>
															<option value="20">15%</option>
														</select>
													</div>
													<div class="col-6 ps-0">
														<input class="form-control" name="tds" id="tds" type="text" placeholder="0"  readonly>
													</div>
													
												</div>
											</div> 
											
										</div>
										<div class="col-sm-3">  
											
											<div class="input-block mb-3">
												<label class="col-form-label">Net Paid</label>
												<input class="form-control" name="ntp" id="ntp" type="number" placeholder="0" readonly>
											</div> 
											
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
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Staff Salary</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)" id="sl-pe" method="POST" class="salarysatff">
									<div class="row"> 
										<div class="col-sm-6"> 
											<div class="input-block mb-3">
												<label class="col-form-label">Select Consultant</label>
												<select class="form-select form-control" id="staff" name="staff"> 
												<option value=""> -- Select Consultant -- </option>
													
													<option value="" dataid="">GFDXG</option>
													
												</select>
											</div>
										</div>
										<div class="col-sm-3"> 
											<label class="col-form-label">Days Payable</label>
											<input class="form-control" name="editgrosssalary" id="editgrosssalary" type="text" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
												<label class="col-form-label">Consolidated Fee</label>
												<input class="form-control" name="basic" id="basic" type="number" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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

		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
		
    <script>
    $(document).ready(function() {
    // Add project section
    $(document).on("click", ".addProjectsalary", function() {
        var $clone = $(".project-base-salary").first().clone();
        $clone.find("input").val(""); // clear input values in the clone
        $clone.find("input[name^='projectnumber']").attr("name", "projectnumber_" + ($(".project-base-salary").length)).attr("id", "projectnumber_" + ($(".project-base-salary").length)); // update input names
        $clone.find("input[name^='projectcost']").attr("name", "projectcost_" + ($(".project-base-salary").length)).attr("id", "projectcost_" + ($(".project-base-salary").length));
        $clone.find("input[name^='numberofday']").attr("name", "numberofday_" + ($(".project-base-salary").length)).attr("id", "numberofday_" + ($(".project-base-salary").length));
        $clone.find(".delete-project").removeClass("d-none"); // show delete button
        $(this).closest(".project-base-salary").after($clone);
        $(".project-base-salary .delete-project").first().addClass("d-none"); // hide delete button for first section
    });

    // Delete project section
    $(document).on("click", ".delete-project", function() {
        $(this).closest(".project-base-salary").remove();
    });
});
</script>

<script>
	$(document).ready(function() {
    // Function to calculate Consolidated Fee for Fixed Salary
    function calculateFixedConsolidatedFee() {
        var salaryPayable = parseFloat($('#grosssalary').val());
        var daysPayable = parseFloat($('#daypayable').val());
        var salaryMonth = $('#sm').val();
        if (!isNaN(salaryPayable) && !isNaN(daysPayable) && salaryMonth) {
            var daysInMonth = new Date(salaryMonth).getDate();
            if (daysPayable > daysInMonth) {
                // Show error message if days payable exceed days in the selected month
                triggerAlert('Total Days Payable cannot be greater than the number of days in the selected month.', 'error');
                return;
            }
            var consolidatedFee = (salaryPayable / daysInMonth) * daysPayable;
            $('#basic').val(consolidatedFee.toFixed(2));
        }
    }

    // Function to calculate Consolidated Fee for Project-Based Salary
    function calculateProjectBasedConsolidatedFee() {
        var salaryPayable = parseFloat($('#grosssalary').val());
        var totalProjectCost = 0;
		var totalNumberOfDays = 0; 
        // Iterate over each project section to calculate total project cost
        $('.project-base-salary').each(function() {
            var projectCost = parseFloat($(this).find('input[name^="projectcost"]').val());
            var numberOfDays = parseFloat($(this).find('input[name^="numberofday"]').val());
            if (!isNaN(projectCost) && !isNaN(numberOfDays)) {
                totalProjectCost += (projectCost * numberOfDays);
				totalNumberOfDays += numberOfDays;
				
            }

        });
		
        var consolidatedFee = salaryPayable + totalProjectCost;
        $('#basic').val(consolidatedFee.toFixed(2));
		$('#daypayable').val(totalNumberOfDays);
    }

    // Trigger Consolidated Fee calculation based on checkbox status
    $('.fixedCs').click(function() {
        if (this.checked) {
            calculateFixedConsolidatedFee();
            $('.project-base-salary').addClass("d-none");
        }
    });

    $('.projectBasedSalary').click(function() {
        if (this.checked) {
            calculateProjectBasedConsolidatedFee();
            $('.project-base-salary').removeClass("d-none");
        }
    });

    // Call calculation functions when relevant input fields change
    $('#grosssalary, #daypayable, #sm, input[name^="projectcost"], input[name^="numberofday"]').on('input change', function() {
        if ($('#fixedCs').is(':checked')) {
            calculateFixedConsolidatedFee();
        } else if ($('#projectBasedSalary').is(':checked')) {
            calculateProjectBasedConsolidatedFee();
        }
    });
});

    $(document).ready(function() {
		$('.projectBasedSalary').click(function(){
			
			if(this.checked){
				$('.project-base-salary').removeClass("d-none");
				$("#fixedCs").prop('checked', false);
				$(".projectBasedSalary").prop('checked', true);
				
			}else{
				$('.project-base-salary').addClass("d-none");
            $("#fixedCs").prop('checked', true);
			}
		})
		$('.fixedCs').click(function(){
			
			if(this.checked){
				$('.project-base-salary').addClass("d-none");
				$(".projectBasedSalary").prop('checked', false);
				
			}else{
			
			}
		})


        $('#staff').change(function() {
            var selectedOption = $(this).children("option:selected");
            var salaryPayable = $('#grosssalary');
            var salary = selectedOption.data('salary');
            salaryPayable.val(salary ? salary : '0');

            $('#sm').val('');
            $('#daypayable').val('');
            $('#basic').val('');
            $('#tds').val('');
            $('#ntp').val('');
            $('#tdsp').val('');
        });


        $('#tds').on('input', function() {
            var consolidatedFee = $('#basic').val();
            var tds = $(this).val();
            if (consolidatedFee && tds) {
                var netPaid = parseFloat(consolidatedFee) - parseFloat(tds);
                $('#ntp').val(netPaid.toFixed(2));
            } else {
                $('#ntp').val('');
            }
        });

		$('#tdsp').on('change', function() {
            var consolidatedFee = $('#basic').val();
            var selectedPercentage = $(this).val();
            if (consolidatedFee && selectedPercentage) {
                var tds = (parseFloat(consolidatedFee) * parseFloat(selectedPercentage)) / 100;
                var netPaid = parseFloat(consolidatedFee) - parseFloat(tds);
                $('#tds').val(tds.toFixed(2));
                $('#ntp').val(netPaid.toFixed(2));
            } else {
                $('#tds').val('');
                $('#ntp').val('');
            }
        });
    });



	$(document).ready(function(){
		$('.submitsalary').click(function(event) {
				event.preventDefault();
				
				const staff = $('#staff');
				const grosssalary = $('#grosssalary');
				const consolidated_fee = $('#basic');
				const salary_month = $('#sm');
				const daypayable = $('#daypayable');
				const tds =$('#tds');
				const ntp =$('#ntp');

				const projects = [];

				

				
				if ($('#fixedCs').is(':checked')) {
					if (staff.val().trim() === '') {
						triggerAlert('Please select employee name.', 'error');
						staff.focus();
						return;
					}
					if (grosssalary.val().trim() === '') {
						triggerAlert('Please enter employee Salary Payable.', 'error');
						grosssalary.focus();
						return;
					}
					if (salary_month.val().trim() === '') {
						triggerAlert('Please select salary month.', 'error');
						salary_month.focus();
						return;
					}
					if (daypayable.val().trim() === '') {
						triggerAlert('Please enter Days Payable.', 'error');
						daypayable.focus();
						return;
					}
					if (tds.val().trim() === '') {
						triggerAlert('Please select TDS percentage.', 'error');
						tds.focus();
						return;
                	}

					var type="fixed";
            	}

				if ($('#projectBasedSalary').is(':checked')) {
					let isValid = true; 
					// Iterate over each project section and collect its data
					$('.project-base-salary').each(function(index) {
						const project = {};

						project.projectnumber = $(this).find('input[name^="projectnumber"]').val();
						project.projectcost = $(this).find('input[name^="projectcost"]').val();
						project.numberofday = $(this).find('input[name^="numberofday"]').val();
						
						if (project.projectnumber.trim() === '' || project.projectcost.trim() === '' || project.numberofday.trim() === '') {
							triggerAlert('Please fill in all project details.', 'error');
							isValid = false; // Set flag to false if any field is empty
							return false; // Exit the loop early
						}
						// Add project data to the array
						projects.push(project);
					});

					if (staff.val().trim() === '') {
						triggerAlert('Please select employee name.', 'error');
						staff.focus();
						return;
					}
					if (grosssalary.val().trim() === '') {
						triggerAlert('Please enter employee Salary Payable.', 'error');
						grosssalary.focus();
						return;
					}
					if (salary_month.val().trim() === '') {
						triggerAlert('Please select salary month.', 'error');
						salary_month.focus();
						return;
					}

					// if (projectnumber.val().trim() === '') {
					// 	triggerAlert('Please enter project name.', 'error');
					// 	projectnumber.focus();
					// 	return;
					// }
					// if (projectcost.val().trim() === '') {
					// 	triggerAlert('Please enter employee project cost perday.', 'error');
					// 	projectcost.focus();
					// 	return;
					// }
					// if (numberofday.val().trim() === '') {
					// 	triggerAlert('Please enter project work day.', 'error');
					// 	numberofday.focus();
					// 	return;
					// }

					if (daypayable.val().trim() === '') {
						triggerAlert('Please enter Days Payable.', 'error');
						daypayable.focus();
						return;
					}
					if (tds.val().trim() === '') {
						triggerAlert('Please select TDS percentage.', 'error');
						tds.focus();
						return;
                	}

					var type="project_based";

					if (!isValid) {
						return; // Exit function if any project detail is invalid
					}
            	}

				
				var csrfToken = $('meta[name="csrf-token"]').attr('content');
				$.ajax({
					url: "/consultant-salary-payroll", 
					type: 'POST',
					data: {
						"_token": csrfToken,
						staff: staff.val(),
						grosssalary: grosssalary.val(),
						consolidated_fee: consolidated_fee.val(),
						salary_month: salary_month.val(),
						daypayable: daypayable.val(),
						ntp: ntp.val(),						
						tds: tds.val(),	
						projects: projects,	
						type:type,					
					},
					success: function(response) {
						if (response.success) {
							triggerAlert('You have successfully added employee salary', 'success');
							$('#add_salary .btn-close').click();
							$('#sl-pe')[0].reset();
							//location.reload(true);
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


			
			var csIdToDelete;
			var csUserIdToDelete;
				$('.dl-cs').click(function(){
					csIdToDelete = $(this).data('id');
					csUserIdToDelete = $(this).data('us-id');
				});

				// Handle Delete button click
				$('.continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/delete-consultant-salary',
						method: 'POST',
						data: {
							"_token": csrfToken,
							csIdToDelete: csIdToDelete,
							userid: csUserIdToDelete,
							
						},
						success: function(data){
							console.log(data);
							if(data.success){
								triggerAlert('You have successfully deleted Consultant Salary Deleted successfully', 'success');
								$('#delete_asset .btn-close').click();
								location.reload(true);
							}else{
								triggerAlert('Something went wrong1.', 'error');
							}
							
						},
						error: function(error){
							triggerAlert('Something went wrong.', 'error');
						}
					});
				});

			
	});
</script>


		<!-- <script>
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
		
		</script> --><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/consultant-salary.blade.php ENDPATH**/ ?>