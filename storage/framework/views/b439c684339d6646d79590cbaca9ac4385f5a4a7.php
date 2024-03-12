<?php 

    $userid = Session::get('ad_id');  

    $getuser_details= DB::table('tbl_admin')->where('admin_id',$userid)->where('status','A')->first();

?>
<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <!-- <div class="header-left">
                     <a href="admin-dashboard.html" class="logo">
						<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" width="40" height="40" alt="Logo">
					</a>
					<a href="admin-dashboard.html" class="logo2">
						<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" width="40" height="40" alt="Logo">
					</a>
                </div> -->
				<!-- /Logo -->
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
                <div class="page-title-box">
					<h3>Access Assist</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">
				
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<span class="user-img">

							<span><?php echo e($getuser_details->name); ?></span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?php echo e(url('/admin/change_password')); ?>">Change Password</a>
							<a class="dropdown-item" href="<?php echo e(url('/admin/logout')); ?>">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="<?php echo e(url('/admin/change_password')); ?>">Change Password</a>
						<a class="dropdown-item" href="<?php echo e(url('/admin/logout')); ?>">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
			<!-- /Header --><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/includes/header.blade.php ENDPATH**/ ?>