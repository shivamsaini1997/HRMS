@include('frontend.include.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
    <div class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
				
					<!-- Account Logo -->
					<!-- <div class="account-logo">
						<a href="admin-dashboard.html"><img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="Access Assist"></a>
					</div> -->
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Register</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
							<form action="javascript:void(0)"  id="myForm1" method="post">
							    <div class="input-block mb-4">
									<label class="col-form-label">First Name<span class="mandatory">*</span></label>
									<input class="form-control" type="text" name="fname" id="fn" placeholder="Enter your first name">
								</div>
                                <div class="input-block mb-4">
									<label class="col-form-label">Last Name<span class="mandatory">*</span></label>
									<input class="form-control" type="text" name="lname" id="ln" placeholder="Enter your last name">
								</div>
								<div class="row">
                                    <div class="col-4">
									<label class="col-form-label">Country code<span class="mandatory">*</span></label>

                                    <select class="form-select form-control" name="country_code" id="countryname">

                                        <option value="" selected>Select Country </option>
                                        @foreach($country as $c)
                                            <option value="+ {{ $c->phonecode }}" data-id="{{$c->id}}" @if($c->iso == 'IN') selected @endif>+{{ $c->phonecode }} {{ strtolower($c->name) }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-block mb-4">
                                            <label class="col-form-label">Phone Number<span class="mandatory">*</span></label>
                                            <input class="form-control" type="text" name="phnno" id="ph" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="input-block mb-4">
                                    <label class="col-form-label">Organization Name</label>
                                    <select class="form-control" name="org" id="org">
                                        <option value="">Select Organization</option>
                                        @foreach($departmentsByOrganization as $orgId => $orgData)
                                            <option value="{{ $orgData['org_name'] }}">{{ $orgData['org_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-block mb-4">
                                    <label class="col-form-label">Department</label>
                                    <select class="form-control" name="dept" id="dept">
                                        <option value="">Select Department</option>
                                    </select>
                                </div>
								<div class="input-block mb-4">
									<label class="col-form-label">Designation</span></label>
									<input class="form-control" type="text" name="des" id="des" placeholder="Enter your designation">
								</div>

                                <div class="input-block mb-4">
                                    <label class="col-form-label">Select Office Location</label>
                                    <select class="form-control" name="ofl" id="ofl">
                                        <option value="">Select Office Location</option>
                                        @foreach($office_locations as $loc)
                                            <option value="{{$loc->id }}">{{ $loc->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
								<div class="input-block mb-4">
									<label class="col-form-label">Email<span class="mandatory">*</span></label>
									<input class="form-control" type="text" name="email" id="em" placeholder="Enter your email">
								</div>
								<div class="input-block mb-4">
									<label class="col-form-label">Password<span class="mandatory">*</span></label>
									<input class="form-control" type="password" name="pas1" id="ps" placeholder="Enter your password">
								</div>
								<div class="input-block mb-4">
									<label class="col-form-label">Confirm Password<span class="mandatory">*</span></label>
									<input class="form-control" type="password" name="pas2" id="cps" placeholder="Enter your Confirm password" onkeyup="login()">
									 <span id="login-error" style="color: #fb0505;font-weight: 500;"></span>
								</div>
								<div class="input-block mb-4 text-center">
									<button class="btn btn-primary account-btn" type="submit">Register</button>
								</div>
								<div class="account-footer">
									<p>Already have an account? <a href="{{url('login')}}">Login</a></p>
								</div>
							</form>
							<!-- /Account Form -->
						</div>
					</div>
				</div>
			</div>
        </div>
	
    </div>
	@include('frontend.include.footer')
	<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>

    <script>
   $(document).ready(function() {
    // Event listener for organization select
    $('#org').on('change', function() {
        var selectedOrgName = $(this).val();
        var orgData = <?php echo json_encode($departmentsByOrganization); ?>;
        var departments = null;
        
        // Find the organization data based on the selected organization name
        $.each(orgData, function(orgId, org) {
            if (org.org_name === selectedOrgName) {
                departments = org.departments;
                return false; // Break out of the loop once found
            }
        });
        
        if (departments) {
            // Clear and populate department dropdown
            $('#dept').empty().append('<option value="">Select Department</option>');
            $.each(departments, function(index, department) {
                $('#dept').append($('<option>', {
                    value: department['dept_name'],
                    text: department['dept_name']
                }));
            });
        } else {
            // If no departments found, clear department dropdown
            $('#dept').empty().append('<option value="">No departments found</option>');
        }
    });
});

</script>


    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('#countrySelect').select2();
        });
    </script>
	<script>
     function login() {
            
             var password = $("#ps").val();
             var password1 = $("#cps").val();
             var pswlen = password.length;
                if (password == password1) {
    				$('#login-error').text(''); 
                    return true;
                 }
                 else {
    				$('#login-error').text('password and confirm password should be same.'); 
                     return false;
                 }
        }
        $(document).ready(function() {
            $('#myForm1').submit(function(event) {
                event.preventDefault();
                const name = $('#fn');
                const lname = $('#ln');
                const dept = $('#dept');
                const email = $('#em');
                const ofl = $('#ofl');
                const ph_number = $('#ph');
                const password = $('#ps');
                const conf_password = $('#cps');
                const orgname = $('#org');
                const design = $('#des');
                const countrySelect = $('#countryname');
                const selectedOption = countrySelect.find(':selected');
                const countrycode = selectedOption.val();
                const country_Id = selectedOption.data('id');

                if (name.val().trim() === '' || name.val().length < 1) {
                    triggerAlert('Please enter your first name.','error');
                    name.focus();
                    return;
                }
                if (lname.val().trim() === '' || lname.val().length < 1) {
                    triggerAlert('Please enter your last name.','error');
                    name.focus();
                    return;
                }
                if (ph_number.val().trim() === '' || ph_number.val().length < 10) {
                    triggerAlert('Please enter your phone number.','error');
                    ph_number.focus();
                    return;
                }
                // if (dept.val().trim() === '' || dept.val().length < 1) {
                //     triggerAlert('Please enter your department.','error');
                //     lname.focus();
                //     return;
                // } 

                // if (design.val().trim() === '' || design.val().length < 1) {
                //     triggerAlert('Please enter your designation.','error');
                //     lname.focus();
                //     return;
                // } 

                // if (orgname.val().trim() === '' || orgname.val().length < 1) {
                //     triggerAlert('Please enter your organization name.','error');
                //     lname.focus();
                //     return;
                // }
                if (ofl.val().trim() === '') {
                    triggerAlert('Please select your office location.','error');
                    ofl.focus();
                    return;
                } 

                if (email.val().trim() === '') {
                    triggerAlert('Please enter your email.','error');
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
                        lname: lname.val(),
                        dept: dept.val(),
                        email: email.val(),
                        orgname: orgname.val(),
                        design: design.val(),
                        phonenumber: ph_number.val(),
                        password: password.val(),
                        country_code:countrycode,
                        country_id:country_Id,
                        ofl:ofl.val(),
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