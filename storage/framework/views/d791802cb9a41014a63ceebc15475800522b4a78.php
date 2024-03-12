<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .profile-details-border {
        border: 10px solid rgba(47, 52, 88, 1);
    }

    .profile-img img {
        border-radius: 50%;
        height: 200px;
        width: 200px;
        max-width: 200px;
        padding: 15px;
    }

    .profile-card {
        margin: 30px 0 -50px 0;
    }

    .row-bg {
        background-color: rgba(114, 125, 201, 0.14);
    }

    .form {
        margin-top: 60px;
    }

    .buttons {
        background-color: rgba(47, 52, 88, 1);
        color: white;
        font-size: 16px;
        padding: 5px 20px;
        border-radius: 6px;
        margin-top: 10px;
    }

    .error {
        color: red;
    }

    .otp-container {
        display: flex;
        justify-content: space-between;
        width: 200px;
    }

    .otp-input {
        width: 40px;
        height: 40px;
        text-align: center;
        font-size: 18px;
        border: 2px solid #ccc;
        border-radius: 5px;
        margin: 5px;
    }

    .otp-sec {
        display: none;
    }

    .change-password {
        display: none;
    }
    
    .profile-user-name{
        background-color: #fff;
        padding: 50px 70px;
        border-radius: 50%;
        font-size: 3rem;
    }
    
    .log-out2{
        display: none;
    }

    .edit-profile-btn{
        position: relative;
        top: 180px;
        left: 135px;
    }

    .edit-profile-btn i{
        background-color: rgba(47, 52, 88, 1);
        padding: 10px;
        border-radius: 50%;
    }

    .name-email-sec{
        padding-left: 50px;
    }

    @media  screen and (max-width: 767px) {
        .otp-input {
            width: 35px;
            height: 35px;
        }

        .name-email-sec {
            margin-bottom: 20px;
        }

    }
    
        @media  screen and (max-width: 426px) {
        
        label h6{
            font-size: 12px;
        }

        .edit-profile-btn{
        position: relative;
        top: 50px;
        left: 200px;
    }

    .name-email-sec{
        padding-left: 0px;
    }
        
}

@media  screen and (max-width: 320px) {
        
        .edit-profile-btn{
        position: relative;
        top: 180px;
        left: 160px;
    }

    .profile-img img {
        margin-left: 30px;
    }
        
}

@media  screen and (max-width: 768px) {
        
        .log-out{
            display: none;
        }
        
            .log-out2{
            display: block;
        }

}
.disabled-button {
    background-color: #ccc; 
    color: #888; 
    cursor: not-allowed; 
}
</style>

<div class="container profile-details-border" style="margin: 100px auto;">
    <div class="row mb-5 ">
        <div class="row-bg">
            <div class="d-flex align-items-center ">
                <div class="container profile-card">
                    <div class="row align-items-end">
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <div class="profile-img">
                                <button type="button" class="btn edit-profile-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-pen d-flex" style="color: #fff;"></i>
                                </button>
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Profile Image</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Choose Profile Image</label>
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="updateProfilePhoto">Update Profile Photo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal end -->

                                <?php if($getuser->image == null): ?> <p class="profile-user-name"><?php echo e(strtoupper($getuser->firstname[0])); ?></p> <?php else: ?> <img src="<?php echo e(asset('public/uploads/profile-image')); ?>/<?php echo e($getuser->image); ?>" alt="" width="100%"><?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8 col-lg-8 name-email-sec">
                                        <div class="mb-3">
                                            <div>
                                                <label for="Name">
                                                    <h4><?php echo e($getuser->firstname); ?></h4>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="Email">
                                                    <h6><?php echo e($getuser->email); ?></h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-end">
                                        <div class="log-out">
                                            <a class="buttons mt-3" href="<?php echo e(route('logout')); ?>">Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <form class="form" id="myform">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(!empty($getuser->firstname)): ?> <?php echo e($getuser->firstname); ?> <?php endif; ?>">
                    <span id="nameError" class="error"></span><br>
                </div>
                <div>
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php if(!empty($getuser->phone_no)): ?> <?php echo e($getuser->phone_no); ?> <?php endif; ?>">
                    <span id="phoneError" class="error"></span><br>
                </div>
                <button type="submit" class="buttons m-0" id="submitBtn" disabled>Update</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-5 mb-5 password-email">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="change-pass-sec">
                <h3 class="mt-2 mb-2">Change Password?</h3>
                <!--<h5 class="mt-2 mb-2">Enter registered email Id</h5>-->
                <form action="" id="myform2">
                    <div>
                        <input type="email" class="form-control col-4" id="email" name="email" value="<?php echo e($getuser->email); ?>" disabled>
                        <span id="emailError" class="error"></span><br>
                    </div>
                    <div class="get-otp">
                        <button type="submit" class="buttons" id="forget_btn">Get Otp</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9 otp-sec">
            <div class="mt-3">
                <div>
                    <h5 class="mt-2 mb-2">Enter OTP</h5>
                </div>

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
                                    <div>
                                        <button type="submit" class="buttons" id="confirm-btn">Confirm</button>
                                    </div>
                                </div>

                            </form>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-5 mb-5 ">
        <div class="col-sm-12 col-md-9 col-lg-9 change-password">
            <div class="">
                <h3 class="mt-2 mb-2">Change Password?</h3>
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
                  <div class="col-12 text-center pb-5">
                      <button id="sign_in_btn" onclick="return false" type="submit" class="btn btn-first">Reset Password</button>
                  </div>
                  
              </form>
            </div>
        </div>
    </div>
    
                              
      <div class="log-out2 mb-3">
        <a class="buttons mt-3" href="<?php echo e(route('logout')); ?>">Log Out</a>
      </div>
                                    
</div>

<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#updateProfilePhoto").click(function() {
        var button = $(this); // Get a reference to the button

        // Check if the button is already disabled to prevent multiple clicks
        if (button.prop('disabled')) {
            return;
        }

        var fileInput = document.getElementById('formFile');
        var file = fileInput.files[0];
        if (!file) {
            triggerAlert('Please select your photo!', 'error');
            setTimeout(function() {
                button.prop('disabled', true);
            }, 100);
            return;
        }

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        if (file) {
            var formData = new FormData();
            formData.append('profileImage', file);
            formData.append('_token', csrfToken);

            // Disable the button
            button.prop('disabled', true);

            $.ajax({
                url: '<?php echo e(route('uploadProfileImage')); ?>', 
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    triggerAlert('Profile photo updated successfully!', 'success');
                    $('#exampleModal').modal('hide');
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    triggerAlert('Something went wrong!', 'error');
                    $('#exampleModal').modal('hide');
                },
                complete: function() {
                    // Re-enable the button after 3 seconds
                    setTimeout(function() {
                        button.prop('disabled', false);
                    }, 100);
                }
            });
        }
    });
});

</script>

<script>
    $(document).ready(function() {
         $("#submitBtn").prop('disabled', true).addClass('disabled-button');
        $("#phone").on('input', function() {
            // Enable the "Save" button when there is input in the phone number field
            if ($(this).val().trim() !== '') {
                $("#submitBtn").prop('disabled', false);
                $("#submitBtn").removeClass('disabled-button');
            } else {
                $("#submitBtn").prop('disabled', true);
                $("#submitBtn").addClass('disabled-button');
            }
        });
    
        $("#myform").submit(function(event) {
            event.preventDefault();
    
            // Reset previous error messages
            $(".error").text('');
    
            // Perform validation
            var name = $("#name").val();
            var phone = $("#phone").val();
    
            if (name === "") {
                triggerAlert("Full name required!", "error");
                return;
            }
    
            if (phone === "") {
                triggerAlert("Number is required!", "error");
                return;
            }
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // If validation passes, send data via AJAX
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('UpdateNamePhone')); ?>",
                data: {
                    _token: csrfToken,
                    name: name,
                    phone: phone
                },
                success: function(response) {
                    triggerAlert('Profile details updated successfully!', 'success');
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(xhr, textStatus, error) {
                    triggerAlert('Something went wrong!', 'error');
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {
        // $("#myform2").submit(function(event) {
        //     // Prevent the form from submitting
        //     event.preventDefault();

        //     // Reset previous error messages
        //     $(".error").text('');

        //     // Perform validation
        //     var email = $("#email").val();

        //     if (email === "") {
        //         $("#emailError").text("Email is required!");
        //         return;
        //     }
        //     $(".otp-sec").show();
        //     $(".get-otp").hide();
        // });
    });
</script>
<script>
    $(document).ready(function () {
      $("#myform2").submit(function (event) {
        event.preventDefault();
        const email = $("#email");

        if (email === "") {
            $("#emailError").text("Email is required!");
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
              $("#forget_btn").prop("disabled", true);
                $(".otp-sec").show();
                $(".get-otp").hide();
              setTimeout(function () {
                $("#forget_btn").prop("disabled", false);
              }, 30000);
            } else {
              triggerAlert("User does not exist!", "error");
            }
            //$("#myform2")[0].reset();
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
});
</script>
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
                      $(".password-email").hide();
                        $(".change-password").show();
                        $("#confirm-btn").prop('disabled', true);
                        setTimeout(function() {
                            $("#confirm-btn").prop('disabled', false);
                        }, 30000);
                    } else if (response.error) {
                        triggerAlert('Your OTP is not correct!', 'error');
                        $("#forget_btn").prop('disabled', true);
                        setTimeout(function() {
                            $("#confirm-btn").prop('disabled', false);
                        }, 30000);
                    } else if (response.expired) {
                        triggerAlert('Your OTP is expired!', 'error');
                        $("#forget_btn").prop('disabled', true);
                        setTimeout(function() {
                            $("#confirm-btn").prop('disabled', false);
                        }, 30000);
                    }
                    $('#otp-form')[0].reset();
                },
                error: function(error) {
                    triggerAlert('Invalid otp!', 'error');
                }
            });
        });
    });
</script>

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
                     $("#sign_in_btn").prop('disabled', true);
                    setTimeout(function() {
                        window.location.href = '/';
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
</script>
<!-- get your certificate section ends -->
<?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/profile.blade.php ENDPATH**/ ?>