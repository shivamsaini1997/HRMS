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
								<h3 class="page-title">Performance Appraisal</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Performance</li>
								</ul>
							</div>
							<!-- <div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_appraisal"><i class="fa-solid fa-plus"></i> Add New</a>
							</div> -->
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
							
								<!-- Promotion Table -->
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Promoted Employee </th>
											<th>Department</th>
											<th>Promotion Designation From </th>
											<th>Promotion Designation To </th>
											<th>Promotion Date </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												<h2 class="table-avatar blue-link">
													<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
													<a href="profile.html">John Doe</a>
												</h2>
											</td>
											<td>Web Development</td>
											<td>Web Developer</td>
											<td>Sr Web Developer</td>
											<td>28 Feb 2019</td>
											
										</tr>
									</tbody>
								</table>
								<!-- /Promotion Table -->
								
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/performance-appraisal.blade.php ENDPATH**/ ?>