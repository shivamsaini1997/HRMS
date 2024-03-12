<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://hrms.accessassist.in/public/frontend/assets/css/alert.css">
		<!-- Main Wrapper -->
<div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
<!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
				
					
        <div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

  <div class="container-fluid">

    <div class="row ">

  <div class="col-md-9">

   <div class="card card-primary">

          <div class="card-header">

            <h3 class="card-title">Change Password</h3>

          </div>

          <!-- /.card-header -->

<?php echo $__env->make('flash/flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- form start -->

          <form method="POST" action="change_password">

    <?php echo csrf_field(); ?>

    

            <div class="card-body">

    <span id="message">  </span>

              <div class="form-group">

                <label for="exampleInputName">Current Password</label>

                <input type="password" value="" name ="current_password" class="form-control" placeholder="Current Password" required>

              </div>

      <div class="form-group">

                <label for="exampleInputName">New Password</label>

                <input type="password" value="" name ="new_password" id="password" class="form-control" placeholder="New Password" required>

      

              </div>

      <div class="form-group">

                <label for="exampleInputName">Confirm Password</label>

                <input type="password" value="" name ="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>

              </div> 

  

     

            </div>

            <!-- /.card-body -->



            <div class="card-footer">

              <input type="submit" class="btn btn-primary" id="pass_btn" value="Submit">

            </div>

          </form>

        </div>

        </div>

     

    </div>

    <!-- /.row -->

  </div><!-- /.container-fluid -->

</section>

<!-- /.content -->

</div>

				
			
        </div>
      </div>	
</div>
		<!-- /Main Wrapper -->
		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script src="https://hrms.accessassist.in/public/js/alert.js"></script>
<script>

  

$(document).ready(function(){

$('#password, #confirm_password').on('change', function () {

  if ($('#password').val() == $('#confirm_password').val()) {

    $('#message').html('Matching').css('color', 'green');

	

	$('#pass_btn').prop('disabled', false);

  } else {

    $('#message').html('Not Matching').css('color', 'red');

$('#pass_btn').prop('disabled', true);



}

});



});  





</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/change_password.blade.php ENDPATH**/ ?>