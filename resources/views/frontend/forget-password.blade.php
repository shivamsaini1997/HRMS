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
							<h3 class="account-title">Forgot Password?</h3>
							<p class="account-subtitle">Don’t worry! It happens. Please enter the email id. We will send the OTP on this mail</p>
							
							<!-- Account Form -->
							<form action="#" id="forget" method="post" class="">
								<div class="col-12 text-center">
									<!-- <label for="" class="form-label">Email</label> -->
									<input type="text" name="email" class="form-control" placeholder="Email" id="forget-email">
								</div>
								<div class="col-12 text-center pb-5 mt-2">
									<input type="submit" class="btn btn-primary account-btn" id="forget_btn" value="Send OTP" disabled>
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
    $(document).ready(function () {
        $("#forget").submit(function (event) {
            event.preventDefault();
            const email = $("#forget-email");
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (!emailPattern.test(email.val())) {
            triggerAlert("Please enter a valid email address.", "error");
            email.focus();
            return;
            }

            const csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
            url: "/reset-password-email-check",
            type: "POST",
            data: {
                _token: csrfToken,
                email: email.val(),
            },
            success: function (response) {
                if (response.success) {
                triggerAlert("Otp Sent successfully!", "success");
                window.location.href = "/otp-verification";
                $("#forget_btn").prop("disabled", true);
                setTimeout(function () {
                    $("#forget_btn").prop("disabled", false);
                }, 30000);
                } else {
                triggerAlert("User does not exist!", "error");
                }
                $("#forget")[0].reset();
            },
            error: function (error) {
                // triggerAlert('Something went wrong.','error');
                $("#forget_btn").prop("disabled", true);
                setTimeout(function () {
                $("#forget_btn").prop("disabled", false);
                }, 30000);
            },
            });
        });

        const checkInput = () => {
            const content = $("#forget-email").val().trim();
            $("#forget_btn").prop(
            "disabled",
            !content.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)
            );
        };

        $(document).on("keyup", "#forget-email", checkInput);
        });
    </script>