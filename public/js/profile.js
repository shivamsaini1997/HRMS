
$(document).ready(function(){
    $('.editprof').click(function(){
        $.ajax({
            url: 'get-profile-details',
            method: 'GET',
            success: function(data){
                console.log(data);
                $('#profile_info #fname').val(data.empdetails.firstname);
                $('#profile_info #dob').val(data.empdetails.dob);
                $('#profile_info #gen').val(data.empdetails.gender);
                $('#profile_info #add').val(data.empdetails.address);
                $('#profile_info #st').val(data.empdetails.state);
                $('#profile_info #cn').val(data.empdetails.nationality);
                $('#profile_info #pin').val(data.empdetails.pin);
                $('#profile_info #phno').val(data.empdetails.phone_no);
                $('#profile_info #deg').val(data.empdetails.dept);

                $('#profile_info').modal('show');
            },
            error: function(error){
                console.log('Error fetching data:', error);
            }
        });
    });

   
    $('.submit-btn').click(function(){
      
    });
});
