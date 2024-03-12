<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="account-page">
	
  <!-- Main Wrapper -->
      <div class="main-wrapper">
  
    <div class="account-content">
      <div class="container">
      
        <!-- Account Logo -->
        <div class="account-logo">
        <a href="admin-dashboard.html"><img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" ></a>
        </div>
        <!-- /Account Logo -->
        
        <div class="account-box">
          <div class="account-wrapper">
            <h3 class="account-title">Forgot Password?</h3>
            <p class="account-subtitle">Enter your email to get a password reset link</p>
            
            <!-- Account Form -->
            <form id="register-form" action="/admin/forgot_password" role="form" autocomplete="off" class="form" method="post">
              <?php echo csrf_field(); ?>
              <div class="input-block mb-4">
                <label class="col-form-label">Email Address</label>
                <input id="email" name="email" class="form-control"  type="email">
              </div>
              <div class="input-block mb-4 text-center">
                <button class="btn btn-primary account-btn" name="recover-submit" type="submit">Reset Password</button>
              </div>
              <div class="account-footer">
                <p>Remember your password? <a href="/admin">Login</a></p>
              </div>
            </form>
            <!-- /Account Form -->
            
          </div>
        </div>
      </div>
    </div>
      </div>
  <!-- /Main Wrapper -->
  
  </div>
<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- 
      <form id="register-form" action="/admin/forgot_password" role="form" autocomplete="off" class="form" method="post">

          <?php echo csrf_field(); ?>

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

            <input id="email" name="email" placeholder="email address" class="form-control"  type="email">

          </div>

        </div>

        <div class="form-group">

          <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">

        </div>

        <a href="/admin">Back to login </a>

        

      </form> -->

    <?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/forgot.blade.php ENDPATH**/ ?>