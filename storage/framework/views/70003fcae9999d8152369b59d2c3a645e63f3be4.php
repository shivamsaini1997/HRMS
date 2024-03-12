
<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <style>
                div#toast-container{
                    background: #34444c;
                }
                .toast.toast-success{
                    background: #34444c;

                }
                .fc-event, .fc-event-dot {
                    background-color: #ff9b44 !important;
                }
            </style>

<!-- Main Wrapper -->
<div class="main-wrapper">
		
        <!-- Header -->
        <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /Header -->
        
        <!-- Sidebar -->
        <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- Page Wrapper -->
        <div class="page-wrapper">
        
            <!-- Page Content -->
            <div class="content container-fluid">
                <div id='calendar'></div>
            </div>
            
        </div>
</div>
<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




<script type="text/javascript">
$(document).ready(function () {
      
    var SITEURL = "<?php echo e(url('/')); ?>";
    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/admin/calender",
                    displayEventTime: true,
                    editable: true,
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        var title = prompt('Event Title:');
                        var time = prompt('Event Time:');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    time: time,
                                    end: end,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function (data) {
                                    displayMessage("Event Created Successfully");
  
                                    calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title + (isValidTime(time) ? ' ' + time : ''),
                                            start: start,
                                            end: end,
                                            time: time,
                                            allDay: allDay
                                        },true);
  
                                    calendar.fullCalendar('unselect');
                                }
                            });

                        }
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                time: event.time,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }
 
                });
 
    });
      
    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

    // Function to check if time is in valid format
    function isValidTime(time) {
        // Regular expression to match various time formats
        var regex = /^(0?[1-9]|1[0-2]):[0-5][0-9](\s?[APap][mM])?$/; // HH:mm or HH:mm AM/PM
        return regex.test(time);
    } 
    
</script>

  
</body>
</html><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/calender.blade.php ENDPATH**/ ?>