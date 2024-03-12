<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdn.tiny.cloud/1/cwm9vzzgghlue80pv07ozfkdwdwu3bh0v15hg9i0hgmwqutz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


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
                    <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Travel Policies </h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Travel Policies</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-12">
                           <p><?php echo $get_policy->policies; ?></p>
                        </div>
                    </div>
                    </div>
                 </div>
        </div>
        

        <?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/travelpolicies.blade.php ENDPATH**/ ?>