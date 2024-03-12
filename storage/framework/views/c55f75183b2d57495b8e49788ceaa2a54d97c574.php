<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>







		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('frontend.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- /Sidebar -->
			

			
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
							<!-- <div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa-solid fa-plus"></i> Add Salary</a>
							</div> -->
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
							<div class="col-sm-6 col-md-3">  
								<div class="d-grid">
									<a href="<?php echo e(url('employee-salary')); ?>" class="btn btn-info"> Reset </a>  
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
											<!-- <th class="text-end">Action</th> -->
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($getall_emp_salary)): ?>
											<?php $__currentLoopData = $getall_emp_salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empsalary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar"><img src="<?php echo e(url('public/uploads/profile')); ?>/<?php echo e($empsalary->image); ?>" alt="User Image"></a>
															<a href="javascript:void(0)"><?php echo e($empsalary->firstname); ?></a>
														</h2>
													</td>
													<td><?php echo e($empsalary->emp_id); ?></td>

													<td><?php echo e($empsalary->doj); ?></td>
													<td><?php echo e($empsalary->dept); ?></td>
													<td><?php echo e(\Carbon\Carbon::parse($empsalary->salary_month)->format('F Y')); ?></td>
													<td>INR : <?php echo e($empsalary->total_gross_salary); ?></td>
													<td><a class="btn btn-sm btn-primary" href="<?php echo e(url('employee-salary/salary-view')); ?>/<?php echo e($empsalary->id); ?>">Generate Slip</a></td>
													
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
				<!-- /Page Content -->

				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
		<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/salary.blade.php ENDPATH**/ ?>