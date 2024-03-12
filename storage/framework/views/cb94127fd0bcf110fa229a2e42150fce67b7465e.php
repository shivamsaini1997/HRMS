<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Main Wrapper -->
<div class="account-page">
	
  <!-- Main Wrapper -->
      <div class="main-wrapper">
    <div class="account-content">
      <div class="container">
      
        <!-- Account Logo -->
        <!-- <div class="account-logo">
          <a href="admin-dashboard.html"><img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" ></a>
        </div> -->
        <!-- /Account Logo -->
        
        <div class="account-box">
          <div class="account-wrapper">
            <h3 class="account-title">Login</h3>
            <!-- Account Form -->
           
      <form action="/dologin" method="POST">
        <?php echo $__env->make('flash/flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo csrf_field(); ?>
              <div class="input-block mb-4">
                <label id="icon" for="name" class="col-form-label">Email Address</label>
                <input class="form-control"  type="text" name="user_email" id="name" placeholder="Email" required>
              </div>
              <div class="input-block mb-4">
                <div class="row align-items-center">
                  <div class="col">
                    <label id="icon" for="name" class="col-form-label">Password</label>
                  </div>
                  <div class="col-auto">
                    <a class="text-muted" href="/admin/forgotpassword">
                      Forgot password?
                    </a>
                  </div>
                </div>
                <div class="position-relative">
                  <input class="form-control"  type="password" name="user_password" id="password" placeholder="Password" required>
                  <span class="fa-solid fa-eye-slash" id="toggle-password"></span>
                </div>
              </div>
              <div class="input-block mb-4 text-center">
                <button class="btn btn-primary account-btn submit" type="submit">Login</button>
              </div>
             
            </form>
            <!-- /Account Form -->
            
          </div>
        </div>
      </div>
    </div>
      </div>
  <!-- /Main Wrapper -->

    <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/login.blade.php ENDPATH**/ ?>