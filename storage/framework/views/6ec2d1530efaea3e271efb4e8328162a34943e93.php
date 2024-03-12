<?php
   use App\Http\Controllers\HomeController;
    $userinfo=HomeController::userinfo();
	
?>
<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                     <a href="/" class="logo">
						<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" width="40" height="40" alt="Logo">
					</a>
					<a href="/" class="logo2">
						<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" width="40" height="40" alt="Logo">
					</a>
                </div>
				<!-- /Logo -->
				<?php if(!empty($userinfo)): ?>
				
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
						<?php
							$fullName = $userinfo->firstname;

							$words = explode(' ', $fullName);

						
							$initials = '';

							
							foreach ($words as $word) {
								$initials .= strtoupper(substr($word, 0, 1));
							}
						?>
					<li class="nav-item dropdown has-arrow main-drop">
						<?php if(!empty($userinfo)): ?>
						<?php 
							$parts = explode(' ', $userinfo->firstname);
							$initials = '';
							foreach ($parts as $part) {
								$initials .= strtoupper($part[0]);
							}
						?>
						<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<span class="user-img header-user-image">
							<?php if($userinfo->image != null): ?>
								<img src="<?php echo e(url('public/uploads/profile')); ?>/<?php echo e($userinfo->image); ?>" alt="User Image">
								<?php else: ?>
								<span><?php echo e($initials); ?></span>
							<?php endif; ?>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?php echo e(url('/profile')); ?>">My Profile</a>
					
							<a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">Logout</a>
						</div>
						<?php endif; ?>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
					<?php if(!empty($userinfo)): ?>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?php echo e(url('/profile')); ?>">My Profile</a>
				
						<a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">Logout</a>
					</div>
					<?php endif; ?>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
			<!-- /Header -->
			<?php endif; ?><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/include/header.blade.php ENDPATH**/ ?>