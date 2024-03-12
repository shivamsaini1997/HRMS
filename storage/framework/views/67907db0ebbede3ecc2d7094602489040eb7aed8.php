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
								<h3 class="page-title">Assets</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Assets</li>
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
											<th>Asset User</th>
											<th>Asset Name</th>
											<th>Asset Id</th>
											<th>Asset Isuue</th>
										
											<th class="text-center">Status</th>
										
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($get_assets)): ?>
											<?php $__currentLoopData = $get_assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($assets->firstname); ?></td>
													<td>
														<strong><?php echo e($assets->assetname); ?></strong>
													</td>
													<td>#<?php echo e($assets->assetid); ?></td>
													<td><?php echo e($assets->purchase_date); ?></td>
												
													<td class="text-center">
													<a class="dropdown-item" href="#">
											
														<?php if($assets->status=='A'): ?>
															<i class="fa-regular fa-circle-dot text-success"></i> Approved
														<?php elseif($assets->status=='P'): ?>
															<i class="fa-regular fa-circle-dot text-danger"></i> Pending
														<?php elseif($assets->status=='R'): ?>
															<i class="fa-regular fa-circle-dot text-info"></i> Returned
														<?php elseif($assets->status=='D'): ?>
															<i class="fa-regular fa-circle-dot text-info"></i> Damaged
														<?php endif; ?>
													</a>
									
													</td>
													
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											Data Not Found
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
<?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/assets.blade.php ENDPATH**/ ?>