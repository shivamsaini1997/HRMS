 

    function checkIn() {

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var data = { 
            action: 'check_in',
            "_token": csrfToken,
        };

        $.ajax({
            url: '/check-in-out', 
            method: 'POST',
            data: data,
            success: function(response) {
                if (response.success == true) {
                    triggerAlert(response.message, 'success');
                    location.reload(true);
                }else{
                    triggerAlert(response.message, 'error');
                }
            },
            error: function(error) {
                triggerAlert('Somthings went wrong.','error');
            }
        });
    }

    function checkOut() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var data = {
            action: 'check_out',
            "_token": csrfToken,
        };

        $.ajax({
            url: '/check-in-out', 
            method: 'POST',
            data: data,
            success: function(response) {
 
                if (response.success == true) {
                    triggerAlert(response.message, 'success');
                    //location.reload(true);
                }else{
                    triggerAlert('You have already checked Out', 'error');
                }
            },
            error: function(error) {
                triggerAlert('Somthings went wrong.','error');

            }

        });

    }



