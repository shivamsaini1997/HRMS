<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .signup-form-bg {
        background-image: url("./images/form-bg.png");
        background-repeat: no-repeat;
        background-size: cover;
        /* width: 100%; */
        height: 100%;
        border-radius: 5px 0 0 10px;
        /* padding: 100px 0; */
    }

    .login-card {
        padding-top: 130px;
        padding-bottom: 130px;
    }

    .signup-btn {
        color: rgba(47, 52, 88, 1);
        font-size: 20px;
        font-weight: 500;
        background-color: rgba(213, 226, 232, 1);
        border: 1px solid rgba(213, 226, 232, 1);
        border-radius: 6px;
        padding-top: 10px;
        padding-bottom: 10px;
        width: 80%;
    }

    .sign-in-btn {
        color: rgba(47, 52, 88, 1);
        border: 2px solid rgba(47, 52, 88, 1);
        border-radius: 30px;
        padding: 8px 80px;
        font-size: 25px;
        font-weight: 700;
        background: transparent;
    }

    form input {
        width: 80%;
        padding: 10px;
        border: 2px solid rgba(137, 137, 137, 1);
        background: transparent;
        margin: 10px 5px;
        border-radius: 5px;
        /* color: rgba(137, 137, 137, 1); */
        color: white;
    }
</style>

<section class="pt-5 pb-5 mt-5 mb-5">
    <div class="container">
        <div class="row login-form-bg">
            <div class="col-sm-12 col-md-6 col-lg-6 dark-bg rounded">
                <div class="login-card">
                    <div>
                        <h1 class="text-center text-white pb-5">Sign In</h1>
                    </div>
                    <div class="pb-5">
                        <form class="text-center" action="/login" id="login" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="email" id="email"  placeholder="Email">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <div class="text-center pt-5">
                                <button type="submit" class="signup-btn">Login</button>
                            </div>
                            <div class="col-12 text-center text-white page-link mt-3">
                                <a class="text-white" href="<?php echo e(route('forget-password')); ?>"> Forgot Password ??</a>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 rounded d-flex align-items-center justify-content-center">
                <div class="login-card">
                    <h2 class="text-center font-dark pb-3">Welcome</h2>
                    <h5 class="font-dark pb-4 text-center ">"Don't have an account, <br> Create An Account"</h5>
                    <div class="text-center">
                        <a href="<?php echo e(route('signup')); ?>" class="create-account-btn">CREATE ACCOUNT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    //console.log(response.success);
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
</script><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/login.blade.php ENDPATH**/ ?>