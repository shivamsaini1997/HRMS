<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .form-control {
        width: 98%;
    }

    .btn-first{
        border: 2px solid black;
        background-color: rgba(47, 52, 88, 1);
        color: white;
    }

</style>

<div class="d-flex align-items-center justify-content-center sign-height form-page login-page mt-5">
    <div class="bg-color mt-5">
        <div class="signup-form-div">
            <div class="sign-up-form">
                <div class="text-center">
                    <h3>Forgot Password?</h3>
                    <p>Don’t worry! It happens. Please enter the email id. We will send the OTP on this mail</p>
                </div>
                <form action="#" id="forget" method="" class="">
                    <div class="col-12 text-center">
                        <!-- <label for="" class="form-label">Email</label> -->
                        <input type="text" name="email" class="form-control" placeholder="Email" id="forget-email">
                    </div>
                    <div class="col-12 text-center pb-5">
                        <input type="submit" class="btn btn-first" id="forget_btn" value="Send OTP" disabled>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    // function triggerAlert(message, type) {
    //     // Implement your alert triggering logic here
    // }
</script><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/forget-password.blade.php ENDPATH**/ ?>