@include('admin.includes.head')
<link rel="stylesheet" href="https://hrms.accessassist.in/public/frontend/assets/css/alert.css">
		<!-- Main Wrapper -->
<div class="main-wrapper">
		
			<!-- Header -->
			@include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')
			
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

@include('flash/flash-message')

          <!-- form start -->

          <form method="POST" action="change_password">

    @csrf

    

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
		@include('admin.includes.footer')


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





</script>