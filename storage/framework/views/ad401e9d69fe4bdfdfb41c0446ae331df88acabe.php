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
								<h3 class="page-title">Announcement</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Announcement</li>
								</ul>
							</div>
							<!-- <div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="fa-solid fa-plus"></i> Add Leave</a>
							</div> -->
						</div>
					</div>
					<!-- /Page Header -->
					
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-2"><?php echo e($get_announcement->title); ?></h3>
                        <p><?php echo $get_announcement->description; ?></p>
						<?php
						$originalDateTime = $get_announcement->created_at;
						$dateTime = new DateTime($originalDateTime);
						$formattedDateTime = $dateTime->format('d M \a\t h:ia');
						?>
						<p class="border-bottom date-time-announce"><?php echo e($formattedDateTime); ?></p>
                    </div>
                </div>
                </div>
				<!-- /Page Content -->
				
	
				<!-- /Delete Leave Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
		<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/announcement.blade.php ENDPATH**/ ?>