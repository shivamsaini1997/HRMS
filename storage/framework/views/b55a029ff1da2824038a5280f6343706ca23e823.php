<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://hrms.accessassist.in/public/frontend/assets/css/alert.css">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Assign Manager & Team Lead</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Assign Manager & Team Lead</li>
								</ul>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
                    
                        <div class="card p-4">
                            <div class="row "> 
                                <div class="col-md-4"> 
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Select Employee</label>
                                        <select class="form-select form-control" id="empselect" name="empselect"> 
                                        <option value=""> -- Select Employee -- </option>
                                            <?php $__currentLoopData = $all_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($employee->userid); ?>" dataid="<?php echo e($employee->email); ?>"><?php echo e($employee->firstname); ?> <?php echo e($employee->lastname); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Select Manager</label>
                                        <select class="form-select form-control" id="manager" name="manager"> 
                                            <option value=""> -- Select Manager -- </option>
                                            <?php $__currentLoopData = $get_manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($manager->admin_id); ?>" dataid="<?php echo e($manager->username); ?>"><?php echo e($manager->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Select Team Lead</label>
                                        <select class="form-select form-control" id="teamlead" name="teamlead"> 
                                            <option value=""> -- Select Team Lead -- </option>
                                            <?php $__currentLoopData = $get_team_lead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teamlead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($teamlead->admin_id); ?>" dataid="<?php echo e($teamlead->username); ?>"><?php echo e($teamlead->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        </select>
                                    </div>
                                </div>
								<div><span id="login-error" style="color: #fb0505;font-weight: 500;"></span></div>
                                <div class="submit-section text-end mt-2">
                                            <button class="btn btn-primary submit-btn roleassign">Submit</button>
                                        </div>
                            </div>
                        </div>
                        <div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
										<th>Employee Name</th>
										<th>Manager</th>
                                        <th>Team Lead</th>
										<th class="text-end">Action</th>
								
									</tr>
								</thead>
								<tbody>
								<?php if($get_assigned_emp_manager_teamlead != null): ?>
                                <?php $__currentLoopData = $get_assigned_emp_manager_teamlead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details_m_t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										
												<td><?php echo e($details_m_t->firstname); ?> <?php echo e($details_m_t->lastname); ?></td>
                                                <td><?php echo e($details_m_t->managername); ?></td>
												<td><?php echo e($details_m_t->teamleadname); ?></td>
												
												<td class="text-end">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<!-- <a class="dropdown-item ed-rl" href="#" data-bs-toggle="modal" data-id="<?php echo e($details_m_t->userid); ?>" data-bs-target="#edit_role"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a> -->
															<a class="dropdown-item del-rl" href="#" data-bs-toggle="modal" data-id="<?php echo e($details_m_t->userid); ?>" data-bs-target="#delete_role"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                Data not found
                                <?php endif; ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
</div>
			<!-- Page Wrapper -->
				<!-- Edit Salary Modal -->
				<div id="edit_role" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Assign Manager & Team Lead</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="javascript:void(0)" method="post">
									<div class="row"> 
										<div class="col-sm-6"> 
											<div class="input-block mb-3">
												<label class="col-form-label">Select Employee</label>
												<select class="form-select form-control" id="emp" name="emp"> 
												<option value=""> -- Select Employee -- </option>
													<?php $__currentLoopData = $all_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($employee->userid); ?>" dataid="<?php echo e($employee->email); ?>"><?php echo e($employee->firstname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-sm-6"> 
											<label class="col-form-label">Role</label>
											<input class="form-control" name="roleemp" id="roleemp" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
                                        <div class="col-md-6"> 
                                    <div class="input-block mb-3">
                                    <label class="col-form-label">Change Password</label>
                                        <input class="form-control" name="password" id="password" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="input-block mb-3">
                                    <label class="col-form-label">Confirm Password</label>
                                        <input class="form-control" name="confirmpassword" id="confirmpassword" type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
									</div>
								
									<div class="submit-section">
										<button class="btn btn-primary submit-btn ">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Salary Modal -->
				
				<!-- Delete Salary Modal -->
				<div class="modal custom-modal fade" id="delete_role" role="dialog">
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
		<!-- /Main Wrapper -->

		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<script src="https://hrms.accessassist.in/public/js/alert.js"></script>
<script>
	
   
	$(document).ready(function(){
      $('.roleassign').click(function(){
        
        const empselect = $('#empselect');
        const manager = $('#manager');
        const teamlead = $('#teamlead');
        if (empselect.val().trim() === '') {
            triggerAlert('Please Select Employee.','error');
            empselect.focus();
            return;
        } 
        if (manager.val().trim() === '') {
            triggerAlert('Please select manager.','error');
            manager.focus();
            return;
        }
       
    
       

         var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/assign-manager-team-lead", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                empselect: empselect.val(),
                manager: manager.val(),
                teamlead: teamlead.val(),
                   
            },
            success: function(response) {
                
                if (response.success) {
                    triggerAlert('You have successfully Assign Employee Manager & Team Lead', 'success');
            
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

	var rollIdToDelete;
	
	$('.del-rl').click(function(){
		rollIdToDelete = $(this).data('id');
	
	});

	// Handle Delete button click
	$('.continue-btn').click(function(){
		var csrfToken = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url: '/delete-assign-manager-team-lead',
			method: 'POST',
			data: {
				"_token": csrfToken,
				rlid: rollIdToDelete,
				type :"del_rl"

			},
			success: function(data){
				console.log(data);
				triggerAlert('You have successfully deleted the assigned manager & Team Lead', 'success');
				$('#delete_role .btn-close').click();
				location.reload(true);
			},
			error: function(error){
				triggerAlert('Something went wrong.', 'error');
			}
		});
	});

});
    </script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/assigned-manager.blade.php ENDPATH**/ ?>