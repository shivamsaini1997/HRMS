//Edit profile
$(document).ready(function(){
    $('.editprof').click(function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        const userid = $(this).data('id');
        $.ajax({
            url: "/emp-profile-details", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                userid:userid,
            },
            success: function(data){
                $('#profile_info #custId').val(data.empdetails.userid);
                $('#profile_info #fname').val(data.empdetails.firstname);
                $('#profile_info #lname').val(data.empdetails.lastname);
                $('#profile_info #dob').val(data.empdetails.dob);
                $('#profile_info #gen').val(data.empdetails.gender);
                $('#profile_info #add').val(data.empdetails.address);
                $('#profile_info #st').val(data.empdetails.state);
                $('#profile_info #cn').val(data.empdetails.nationality);
                $('#profile_info #pin').val(data.empdetails.pin);
                $('#profile_info #phno').val(data.empdetails.phone_no);
                $('#profile_info #deg').val(data.empdetails.design);
                $('#profile_info #dept').val(data.empdetails.dept);
                $('#profile_info #orgname').val(data.empdetails.orgname);
                $('#profile_info #dj').val(data.empdetails.doj);

                $('#profile_info').modal('show');
            },
            error: function(error){
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });

   
    $('.subpr').click(function(){
        const name = $('#fname');
        const lname = $('#lname');
        const custId = $('#custId');
        const deg = $('#deg');
        const dob = $('#dob');
        const ph_number = $('#phno');
        const gender = $('#gen');
        const address = $('#add');
        const state = $('#st');
        const pin = $('#pin');
        const nationality = $('#cn');
        const doj = $('#dj');
        const orgname= $('#orgname');
        const dept= $('#dept');

        if (name.val().trim() === '') {
            triggerAlert('Please enter your first name.','error');
            name.focus();
            return;
        }
        if (lname.val().trim() === '') {
            triggerAlert('Please enter your last name.','error');
            lname.focus();
            return;
        }
        if (dob.val().trim() === '') {
            triggerAlert('Please select your date of birth.','error');
            dob.focus();
            return;
        }
        if (gender.val().trim() === '') {
            triggerAlert('Please enter your gender.','error');
            gender.focus();
            return;
        } 
        if (address.val().trim() === '') {
           
            triggerAlert('Please enter your full address.','error');
            address.focus();
            return;
        }
        if (state.val().trim() === '') {
           
            triggerAlert('Please enter your state.','error');
            state.focus();
            return;
        }

        if (nationality.val().trim() === '') {
           
            triggerAlert('Please enter your nationality.','error');
            nationality.focus();
            return;
        }
        if (pin.val().trim() === '') {
           
            triggerAlert('Please enter your pin code.','error');
            pin.focus();
            return;
        }
        if (deg.val().trim() === '') {
            triggerAlert('Please enter your degignation.','error');
            deg.focus();
            return;
        } 
        if (dept.val().trim() === '') {
            triggerAlert('Please enter your department.','error');
            dept.focus();
            return;
        } 
        if (orgname.val().trim() === '') {
            triggerAlert('Please enter your organization name.','error');
            dept.focus();
            return;
        } 
        if (doj.val().trim() === '') {
            triggerAlert('Please enter your joining date.','error');
            doj.focus();
            return;
        } 
       
         var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/emp-profile-info", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                name: name.val(),
                lname: lname.val(),
                custId: custId.val(),
                deg: deg.val(),
                dept: dept.val(),
                orgname: orgname.val(),
                dob: dob.val(),
                phonenumber: ph_number.val(),
                gender: gender.val(),
                address: address.val(),
                state: state.val(),
                pin: pin.val(),
                nationality: nationality.val(),
                doj: doj.val(),
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    triggerAlert('You have successfully edited profile info', 'success');
                    $('#profile_info .btn-close').click();
                    location.reload(true);
                } else {
                    triggerAlert('Somthings went wrong!', 'error');
                }
            },
            error: function(error) {
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });

    $('#profileImageInput').on('change', function() {
        //alert('ok');
        var fileInput = $(this)[0];
        var file = fileInput.files[0];
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        const userid = $("#myForm2 #custId").val();
        //alert(userid)
        if (file) {
            var formData = new FormData();
            formData.append('profileImage', file);
            formData.append('_token', csrfToken);
            formData.append('userid', userid);
    
            // Make an AJAX request to handle the file upload
            $.ajax({
                url: '/emp-image-profile', // Replace with your actual upload endpoint
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    triggerAlert('You have successfully edited profile photo', 'success');
                    $('#profile_info .btn-close').click();
                    location.reload(true);
                },
                error: function(error) {
                    console.log('Error uploading image:', error);
                }
            });
        }
    });
    

    $('.editpi').click(function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        const userid = $(this).data('id');
        $.ajax({
            url: "/emp-profile-details", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                userid:userid,
            },
            success: function(data){
                $('#personal_info_modal #cust_Id').val(data.empdetails.userid);
                $('#personal_info_modal #nat').val(data.empdetails.nationality);
                $('#personal_info_modal #rel').val(data.empdetails.religion);
                $('#personal_info_modal #ms').val(data.empdetails.maritalstatus);
                $('#personal_info_modal #noc').val(data.empdetails.noofchildren);
                $('#personal_info_modal #sta').val(data.empdetails.state);
                $('#personal_info_modal').modal('show');
            },
            error: function(error){
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });

    $('.subpi').click(function(){
        const nationality = $('#nat');
        const state = $('#sta');
        const religion = $('#rel');
        const marital_status = $('#ms');
        const no_of_children = $('#noc');
        const custId = $('#cust_Id');
        
        if (nationality.val().trim() === '') {
            triggerAlert('Please enter your nationality.','error');
            nationality.focus();
            return;
        }
        if (state.val().trim() === '') {
            triggerAlert('Please select your state.','error');
            state.focus();
            return;
        }
        if (religion.val().trim() === '') {
            triggerAlert('Please enter your religion.','error');
            religion.focus();
            return;
        } 
        if (marital_status.val().trim() === '') {
           
            triggerAlert('Please enter your marital_status.','error');
            marital_status.focus();
            return;
        }
        if (no_of_children.val().trim() === '') {
           
            triggerAlert('Please enter your no of children.','error');
            no_of_children.focus();
            return;
        }

         var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/emp-profile-info", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                nationality: nationality.val(),
                state: state.val(),
                religion: religion.val(),
                marital_status: marital_status.val(),
                no_of_children: no_of_children.val(),
                custId:custId.val(),
                "type":"subpi",
            },
            success: function(response) {
                
                if (response.success) {
                    triggerAlert('You have successfully edited Personal Information', 'success');
                    $('#personal_info_modal .btn-close').click();
                    location.reload(true);
                } else {
                    triggerAlert('Somthings went wrong!', 'error');
                }
            },
            error: function(error) {
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });

    $('.editec').click(function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        const userid = $(this).data('id');
        $.ajax({
            url: "/emp_get-emargency-details", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                userid:userid,
            },
            success: function(data){
                //console.log(data);
                $('#emergency_contact_modal #emp_id').val(data.emp_emargency_contact.empid);
                $('#emergency_contact_modal #pn').val(data.emp_emargency_contact.primary_name);
                $('#emergency_contact_modal #pr').val(data.emp_emargency_contact.primary_relationship);
                $('#emergency_contact_modal #pp').val(data.emp_emargency_contact.primary_contact);
                $('#emergency_contact_modal #sn').val(data.emp_emargency_contact.secondary_name);
                $('#emergency_contact_modal #sr').val(data.emp_emargency_contact.secondary_relationship);
                $('#emergency_contact_modal #sp').val(data.emp_emargency_contact.secondary_contact);
                $('#emergency_contact_modal').modal('show');
            },
            error: function(error){
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });
    
    $('.subec').click(function(){
        const primary_name = $('#pn');
        const primary_relationship = $('#pr');
        const primary_contact = $('#pp');
        const secondary_name = $('#sn');
        const secondary_relationship = $('#sr');
        const secondary_contact = $('#sp');
        const custId = $('#emp_id');
        
        if (primary_name.val().trim() === '') {
            triggerAlert('Please enter your primary contact name.','error');
            primary_name.focus();
            return;
        }
        if (primary_relationship.val().trim() === '') {
            triggerAlert('Please enter your primary relationship.','error');
            primary_relationship.focus();
            return;
        }
        if (primary_contact.val().trim() === '') {
            triggerAlert('Please enter your primary contact number.','error');
            primary_contact.focus();
            return;
        } 
        if (secondary_name.val().trim() === '') {
           
            triggerAlert('Please enter your secondary contact name.','error');
            secondary_name.focus();
            return;
        }
        if (secondary_relationship.val().trim() === '') {
           
            triggerAlert('Please enter your secondary relationship.','error');
            secondary_relationship.focus();
            return;
        }

        if (secondary_contact.val().trim() === '') {
           
            triggerAlert('Please enter your secondary contact number.','error');
            secondary_contact.focus();
            return;
        }

         var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/emp_post-emargency-details", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                primary_name: primary_name.val(),
                primary_relationship: primary_relationship.val(),
                primary_contact: primary_contact.val(),
                secondary_name: secondary_name.val(),
                secondary_relationship: secondary_relationship.val(),
                secondary_contact: secondary_contact.val(),
                custId:custId.val(),
            },
            success: function(response) {
                
                if (response.success) {
                    triggerAlert('You have successfully edited Personal Information', 'success');
                    $('#emergency_contact_modal .btn-close').click();
                    location.reload(true);
                } else {
                    triggerAlert('Somthings went wrong!', 'error');
                }
            },
            error: function(error) {
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });

    $('.subac').click(function(){
        const account_holder_name = $('#ahn');
        const bankname = $('#bankname');
        const bankaccount = $('#bankaccount');
        const ifsccode = $('#ifsccode');
        const panno = $('#panno');
        const pandocument = $('#pandocument');
        const bankstatement = $('#bankstatement');
        const custId = $('#em_id');
        
        if (account_holder_name.val().trim() === '') {
            triggerAlert('Please enter account holder name.','error');
            account_holder_name.focus();
            return;
        }
        if (bankname.val().trim() === '') {
            triggerAlert('Please enter bank name.','error');
            bankname.focus();
            return;
        }
        if (bankaccount.val().trim() === '') {
            triggerAlert('Please enter bank account number.','error');
            bankaccount.focus();
            return;
        } 
        if (ifsccode.val().trim() === '') {
           
            triggerAlert('Please enter your IFSC code.','error');
            ifsccode.focus();
            return;
        }
      
        var pannoValue = panno.val().trim();

        if (pannoValue === '') {
            triggerAlert('Please enter your PAN no.', 'error');
            panno.focus();
            return;
        }

        var panRegex = /^[A-Z0-9]+$/;

        if (!panRegex.test(pannoValue)) {
            triggerAlert('Please enter a valid PAN no. with capital alphanumeric characters only.', 'error');
            panno.focus();
            return;
        }


         var csrfToken = $('meta[name="csrf-token"]').attr('content');
         var formData = new FormData();
        formData.append('account_holder_name', account_holder_name.val());
        formData.append('bankname', bankname.val());
        formData.append('bankaccount', bankaccount.val());
        formData.append('ifsccode', ifsccode.val());
        formData.append('panno', panno.val());
        formData.append('pandocument', pandocument[0].files[0]);
        formData.append('bankstatement', bankstatement[0].files[0]); 
        formData.append('_token', csrfToken);
        formData.append('custId', custId.val());
        

        $.ajax({
            url: "/emp_post-bank-details", 
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                
                if (response.success) {
                    triggerAlert('You have successfully edited Bank Information', 'success');
                    $('#bank_contact_modal .btn-close').click();
                    location.reload(true);
                } else {
                    triggerAlert('Somthings went wrong!', 'error');
                }
            },
            error: function(error) {
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });


    $('.editacd').click(function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        const userid = $(this).data('id');
        $.ajax({
            url: "/emp_get-bank-details", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                userid:userid,
            },
            success: function(data){
                $('#bank_contact_modal #em_id').val(data.emp_bank_info.empid);
                $('#bank_contact_modal #ahn').val(data.emp_bank_info.account_holder_name);
                $('#bank_contact_modal #bankname').val(data.emp_bank_info.bankname);
                $('#bank_contact_modal #bankaccount').val(data.emp_bank_info.bankaccount);
                $('#bank_contact_modal #ifsccode').val(data.emp_bank_info.ifsccode);
                $('#bank_contact_modal #panno').val(data.emp_bank_info.panno);
                $('#bank_contact_modal #pandocument').val(data.emp_bank_info.pandocument);
                $('#bank_contact_modal #bankstatement').val(data.emp_bank_info.bankstatement);
                $('#bank_contact_modal').modal('show');
            },
            error: function(error){
                triggerAlert('Somthings went wrong.','error');
            }
        });
    });


});



