<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Loader -->
			<div id="loader-wrapper">
				<div id="loader">
					<div class="loader-ellips">
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					</div>
				</div>
			</div>
			<!-- /Loader -->
			<?php echo $__env->make('frontend.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Attendance Reports</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Reports</a></li>
									<li class="breadcrumb-item active">Attendance Reports</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
						<!-- Content Starts -->
						<!-- Search Filter -->
						<?php
						$smonth = $_GET['smonth'] ?? date('m');
						$smonth = intval($smonth);
						$year = date('Y');
						
					?>
					<form action="<?php echo e(url('/attendance-reports')); ?>" method="GET">
						<div class="row filter-row">
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
								<select class="select floating" name="smonth" id="smonth"> 
									<?php for ($m = 1; $m <= 12; $m++): ?>
										<option value="<?= sprintf('%02d', $m) ?>" <?= $m == $smonth ? 'selected' : '' ?>>
											<?= date('F', mktime(0, 0, 0, $m, 1)) ?>
										</option>
									<?php endfor; ?>
								</select>
									<label class="focus-label">Select Month</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="year" id="year"> 
										<?php for($y = date('Y'); $y >= date('Y') - 10; $y--): ?>
											<option value="<?php echo e($y); ?>" <?php echo e($y == $year ? '' : ''); ?>><?php echo e($y); ?></option>
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
									<a href="<?php echo e(url('/attendance-reports')); ?>" class="btn btn-info"> Reset </a>  
								</div>
							</div>     
						</div>
					</form>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Date</th>
											<th>Day</th>
											<th>Clock In</th>
											<th>Clock Out</th>
											<th>Total Hours</th>
										</tr>
									</thead>
									<tbody>
										<?php if($formattedData !=null): ?>
											<?php $__currentLoopData = $formattedData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e(\Carbon\Carbon::parse($attendance->date)->format('d-m-Y')); ?></td>
													<td><?php echo e($attendance->day); ?></td>
													<td><?php echo e($attendance->checkin_time); ?></td>
													<td><?php echo e($attendance->checkout_time); ?></td>
													<td><?php echo e($attendance->total_hours); ?> Hrs.</td>
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
                
					<!-- /Content End -->
					
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/attendance-reports.blade.php ENDPATH**/ ?>