<?php $username = Session::get('member_username'); //dd($username); 
?>
<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
    <div class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				
				<div class="container">
				
					<!-- Account Logo -->
					<!-- <div class="account-logo">
						<a href="/"><img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="Access Assist"></a>
					</div> -->
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Reset Password</h3>
							
							<!-- Account Form -->
							<form action="javascript:void(0)" id="reset-pass" method="" class="row g-3 mt-3 needs-validation" novalidate>
								<div class="col-12 position-relative">
									<label for="" class="form-label">New Password</label>
									<input type="password" id="password" name="password" class="form-control" >
								</div>
								<div class="col-12 position-relative">
									<label for="" class="form-label">Confirm Password</label>
									<input   class="form-control"type="password" id="confirm_password" >
									<span id="confirm_password_msg"></span>

								</div>
								<div class="col-12 text-center pb-5 ">
									<input id="sign_in_btn" onclick="return false" type="submit" class="btn btn-primary account-btn" id="forget_btn" value="Reset Password">
								</div>
								
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		

<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#reset-pass').submit(function(event) {
            event.preventDefault();
            const password = $('#password');
           
             var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/change-password", 
                type: 'POST',
                data: {
                    "_token": csrfToken,
                    password: password.val()
                },
                success: function(response) {
                    triggerAlert('Your password changed successfully!','success');
                     $("#forget_btn").prop('disabled', true);
                    setTimeout(function() {
                        window.location.href = '/login';
                    }, 3000);
                        
                  
                },
                error: function(error) {
                    triggerAlert('Password update failed!','error');
                }
            });
        });
        
       

    });
</script>

<script>
            $(document).ready(function(){
          
          $("#confirm_password").bind('keyup change', function(){

            check_Password( $("#password").val(), $("#confirm_password").val() )
            
            
          })

          $("#sign_in_btn").click(function(){

            check_Password( $("#password").val(), $("#confirm_password").val() )

          })
        })

        function check_Password( Pass, Con_Pass){

          if(Pass === ""){
          }else if( Pass === Con_Pass){

            $("#sign_in_btn").removeAttr("onclick")
            $('#confirm_password_msg').show()
            $("#confirm_password_msg").html('<div class="alert alert-success">Password matched</div>')

            setTimeout(function() {
                $('#confirm_password_msg').fadeOut('slow');
            }, 3000);

          }else{
            $("#confirm_password").focus()
            $('#confirm_password_msg').show()
            $("#confirm_password_msg").html('<div class="alert alert-danger">Password didnot matched</div>')

            setTimeout(function() {
                $('#confirm_password_msg').fadeOut('slow');
            }, 3000);

          }

        }
</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/reset-password.blade.php ENDPATH**/ ?>