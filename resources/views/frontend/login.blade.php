@include('frontend.include.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
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
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
							<form action="javascript:void(0)" id="login" method="post">
								<div class="input-block mb-4">
									<label class="col-form-label">Email Address</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Enter your email address">
								</div>
								<div class="input-block mb-4">
									<div class="row align-items-center">
										<div class="col">
											<label class="col-form-label">Password</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="{{url('forget-password')}}">
												Forgot password?
											</a>
										</div>
									</div>
									<div class="position-relative">
										<input class="form-control" type="password" name="password" id="password">
										<span class="fa-solid fa-eye-slash" id="toggle-password"></span>
									</div>
								</div>
								<div class="input-block mb-4 text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								<div class="account-footer">
									<p>Don't have an account yet? <a href="{{url('signup')}}">Register</a></p>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		@include('frontend.include.footer')
		<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
		<script>
            $(document).ready(function() {
                $('#login').submit(function(event) {
                    event.preventDefault();
                    const email = $('#email');
                    const password = $('#password');
                   
                     var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/login", 
                        type: 'POST',
                        data: {
                            "_token": csrfToken,
                            email: email.val(),
                            password: password.val()
                        },
                        success: function(response) {
                            console.log(response.success);
                           if (response.success) {
                               triggerAlert('Loged in successfully!','success');
                                window.location.href = '/';
                            } else {
                                triggerAlert(response.message, 'error');
                            }
                          
                        },
                        error: function(error) {
                            triggerAlert('Invalid Login details!','error');
                        }
                    });
                });
                
               
        
            });
        </script>
