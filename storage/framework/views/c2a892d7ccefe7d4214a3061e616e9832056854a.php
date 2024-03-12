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
							<h3 class="account-title">OTP Verification</h3>
							<p class="account-subtitle">Enter the OTP send to</p>
							<p class="user-mail"><b><?php if(!empty($username)): ?><?php echo e($username); ?><?php endif; ?></b></p>
							<!-- Account Form -->
							<form action="javascript:void(0)" id="otp-form" method="" class="row needs-validation" novalidate>
                                <div class="col-12">
                                    <div>
                                        <label for="" class="form-label">OTP</label>
                                    </div>
                                    <div class="d-flex otp-sec">
                                        <input type="text" name="digit1" id="digit1" class="form-control otp-digit" maxlength="1" placeholder="">
                                        <input type="text" name="digit2" id="digit2" class="form-control otp-digit" maxlength="1" placeholder="">
                                        <input type="text" name="digit3" id="digit3" class="form-control otp-digit" maxlength="1" placeholder="">
                                        <input type="text" name="digit4" id="digit4" class="form-control otp-digit" maxlength="1" placeholder="">
                                        <input type="text" name="digit5" id="digit5" class="form-control otp-digit" maxlength="1" placeholder="">
                                        <input type="text" name="digit6" id="digit6" class="form-control otp-digit" maxlength="1" placeholder="">
                                    </div>
                                    <div class="col-12 text-center mt-2">
                                        <input type="submit" class="btn btn-primary account-btn" id="confirm-btn" value="Confirm">
                                    </div>
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

        $(".otp-sec input:first-child").focus();

        $(".otp-sec input").keyup(function() {
            var $this = $(this);
            var value = $this.val();

            if (value.length === 1) {
                // Move focus to the next input field
                $this.next().focus();
            }
        });



        $('.otp-digit').keyup(function(event) {
            const inputLength = $(this).val().length;
            const maxLength = parseInt($(this).attr('maxlength'));
            if (inputLength === maxLength) {
                // Focus on the next input field
                $(this).next('.otp-digit').focus();
            }
        });

        $('#otp-form').submit(function(event) {
            event.preventDefault();

            const digits = [];
            $('.otp-digit').each(function() {
                digits.push($(this).val());
            });

            const otp = digits.join('');
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/verify-otp',
                type: 'POST',
                data: {
                    "_token": csrfToken,
                    otp: otp
                },
                success: function(response) {
                    if (response.success) {
                        triggerAlert('Otp verify successfully!', 'success');
                        window.location.href = '/reset-password';
                        $("#confirm-btn").prop('disabled', true);
                        setTimeout(function() {
                            $("#confirm-btn").prop('disabled', false);
                        }, 10000);
                    } else if (response.error) {
                        triggerAlert('Your OTP is not correct!', 'error');
                        $("#forget_btn").prop('disabled', true);
                        setTimeout(function() {
                            $("#confirm-btn").prop('disabled', false);
                        }, 10000);
                    } else if (response.expired) {
                        triggerAlert('Your OTP is expired!', 'error');
                        $("#forget_btn").prop('disabled', true);
                        setTimeout(function() {
                            $("#confirm-btn").prop('disabled', false);
                        }, 10000);
                    }
                    $('#otp-form')[0].reset();
                },
                error: function(error) {
                    triggerAlert('Invalid otp!', 'error');
                }
            });
        });
    });
</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/otp-verification.blade.php ENDPATH**/ ?>