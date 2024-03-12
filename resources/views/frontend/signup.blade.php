
@include('frontend.include.header')

<section class="pt-5 pb-5 mt-5 mb-5">
    <div class="container">
        <div class="row signup-form-bg ">
            <div class="col-sm-12 col-md-6 col-lg-6 rounded d-flex align-items-center justify-content-center">
                <div class="login-card">
                    <h2 class="text-center font-dark pb-3">Welcome</h2>
                    <h5 class="font-dark pb-4 text-center ">"If you already have an account, <br> please proceed to log in."</h5>
                    <div class="text-center">
                        <a href="{{route('login')}}" class="sign-in-btn">SIGN IN</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 dark-bg rounded">
                <div class="login-card">
                    <div>
                        <h1 class="text-center text-white pb-5">Create Account</h1>
                    </div>
                    <div class="pb-5">
                        <form class="text-center" id="myForm1" action="">
                            <input type="text" name="fName" id="fName" placeholder="Full Name">
                            <input type="text" name="email" id="email" placeholder="Email">
                            <input type="password" id="password" name="password" placeholder="Password">
                            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" onkeyup="login()">
                            <div><span id="login-error" style="color: #fb0505;font-weight: 500;"></span></div>
                            <div class="text-center pt-5">
                                <button type="submit" class="signup-btn">Signup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.include.footer')
<script>
 function login() {
        
         var password = $("#password").val();
         var password1 = $("#confirm-password").val();
         var pswlen = password.length;
        
            if (password == password1) {
				$('#login-error').text(''); 
                return true;
             }
             else {
				
				$('#login-error').text('password and confirm password should be same.'); 
                 return false;
             }

         //}

     }
    $(document).ready(function() {
        $('#myForm1').submit(function(event) {
            event.preventDefault();
            
            const name = $('#fName');
            const email = $('#email');
            const password = $('#password');
            const conf_password = $('#confirm-password');
            
         
    
            if (name.val().trim() === '' || name.val().length < 1) {
                triggerAlert('Please enter your first name.','error');
                name.focus();
                return;
            }
    
            const emailPatternGeneric = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
           
            if (!emailPatternGeneric.test(email.val())) {
                triggerAlert('Invalid email address for your selection.', 'error');
                email.focus();
                return;
            }
            
            if (password.val().trim() === '') {
               
                triggerAlert('Please enter your password.','error');
                password.focus();
                return;
            }
            if (conf_password.val().trim() === '') {
               
                triggerAlert('Please enter your confirm password.','error');
                conf_password.focus();
                return;
            }
    
  
             var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/signup", 
                type: 'POST',
                data: {
                    "_token": csrfToken,
                   
                    firstname: name.val(),
                    email: email.val(),
                    password: password.val()
                },
                success: function(response) {
                    if (response.success) {
                        triggerAlert('You have successfully registered', 'success');
                        window.location.href = '/login';
                    } else {
                        triggerAlert('This user already signed up!', 'error');
                    }
                },
                error: function(error) {
                    triggerAlert('Somthings went wrong.','error');
                }
            });
        });
        
       

    });
</script>