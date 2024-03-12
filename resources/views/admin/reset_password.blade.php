@include('admin.includes.head')
<link rel="stylesheet" href="https://hrms.accessassist.in/public/css/alert.css">
<!-- Main Wrapper -->
<div class="account-page">
	
  <!-- Main Wrapper -->
      <div class="main-wrapper">
    <div class="account-content">
      <div class="container">
      
        <!-- Account Logo -->
        <!-- <div class="account-logo">
          <a href="admin-dashboard.html"><img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" ></a>
        </div> -->
        <!-- /Account Logo -->
        
        <div class="account-box">
          <div class="account-wrapper">

            <h2 class="text-center">Reset Password?</h2>
                  <p>You can reset your password here.</p>
            <!-- Account Form -->
           
           <form id="password-reset-form" role="form" autocomplete="off" class="form" method="post" action="/">
                        @csrf
                      <input type="hidden" name="id" value="@if(!empty($id)){{$id}}@endif">
                              <div class="card-body">
                      <span id="message"> </span>
                                <div class="form-group">
                                  <label for="exampleInputName">New Password</label>
                                  <input type="password" value="" name ="new_password" id="password" class="form-control" placeholder="New Password">
                        
                                </div>
                        <div class="form-group">
                                  <label for="exampleInputName">Confirm Password</label>
                                  <input type="password" value="" name ="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div> 
                    
                       
                              </div>
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                              </div>
                            </form>
            <!-- /Account Form -->
            
          </div>
        </div>
      </div>
    </div>
      </div>
  <!-- /Main Wrapper -->

    @include('admin.includes.footer')


    <script src="https://hrms.accessassist.in/public/js/alert.js"></script>
<script>
  $(document).ready(function() {
    // Function to update the "Submit" button state based on password matching
    function updateSubmitButtonState() {
      if ($('#password').val() === $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
        triggerAlert('Matching!', 'success');
        $('button[type="submit"]').prop('disabled', false);
      } else {
        $('#message').html('Not Matching').css('color', 'red');
        // triggerAlert('Not Matching!', 'error');
        $('button[type="submit"]').prop('disabled', true);
      }
    }

     $('#confirm_password').on('input', updateSubmitButtonState);
    //$('#confirm_password').on('blur', updateSubmitButtonState);
  });
</script>
<script>
    $(document).ready(function () {
        // $('#password, #confirm_password').on('input', function () {
        //     if ($('#password').val() === $('#confirm_password').val()) {
        //         $('#message').html('Matching').css('color', 'green');
        //          triggerAlert('Matching!', 'success');
        //     } else {
        //         $('#message').html('Not Matching').css('color', 'red');
        //         // triggerAlert('Not Matching!', 'error');
        //     }
        // });

        $('#password-reset-form').on('submit', function (event) {
            event.preventDefault();

            // Disable the submit button
            $('#submit-btn').prop('disabled', true);

            $.ajax({
                type: 'POST',
                url: "{{ route('reset-paswword') }}",
                data: $(this).serialize(),
                success: function (response) {
                    $('#submit-btn').prop('disabled', false);
                    triggerAlert('Password reset!', 'success');
                    window.location.href = "{{ route('admin') }}";
                    // console.log(response.message);
                   
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#submit-btn').prop('disabled', false);
                    triggerAlert('Somthing went wrong!', 'error');
                    console.error('Password reset error:', errorThrown);
                   
                }
            });
        });
    });
</script>
