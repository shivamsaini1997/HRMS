




<!-- jQuery -->
  <script src="<?php echo e(asset('public/frontend/assets/js/jquery-3.7.1.min.js')); ?>"></script>

<!-- Bootstrap Core JS -->
<script src="<?php echo e(asset('public/frontend/assets/js/bootstrap.bundle.min.js')); ?>"></script>


<!-- Slimscroll JS -->
<script src="<?php echo e(asset('public/frontend/assets/js/jquery.slimscroll.min.js')); ?>"></script>

<!-- Select2 JS -->
<script src="<?php echo e(asset('public/frontend/assets/js/select2.min.js')); ?>"></script>

<!-- Datetimepicker JS -->
<script src="<?php echo e(asset('public/frontend/assets/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<!-- Datatable JS -->
<script src="<?php echo e(asset('public/frontend/assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/plugins/lightbox/glightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/plugins/lightbox/lightbox.js')); ?>"></script>


<!-- Tagsinput JS -->
<script src="<?php echo e(asset('public/frontend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/jquery.fullcalendar.js')); ?>"></script>



 <!-- Theme Settings JS -->
<script src="<?php echo e(asset('public/frontend/assets/js/layout.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/theme-settings.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/greedynav.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
  <!-- Custom JS -->
    <script src="<?php echo e(asset('public/frontend/assets/js/app.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script> -->
    <script>
      $('.dat').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

      function calculateDateDifference() {
        var fromDate = new Date($('#lfd').val());
        var toDate = new Date($('#ltd').val());

        if (!isNaN(fromDate.getTime()) && !isNaN(toDate.getTime())) {
          var timeDifference = toDate.getTime() - fromDate.getTime();
          var dayDifference = Math.floor(timeDifference / (1000 * 3600 * 24));

          $('#lnd').val(dayDifference);
        }
      }

      $('.adlv').click(function(){
        const le = $('#le');
        const lt = $('#lt');
        const lfd = $('#lfd');
        const ltd = $('#ltd');
        const lnd = $('#lnd');
        const lr = $('#lr');

        if (le.val().trim() === '') {
            triggerAlert('Please enter your leave.','error');
            le.focus();
            return;
        } 
        if (lt.val().trim() === '') {
            triggerAlert('Please enter your leave Type.','error');
            lt.focus();
            return;
        }
        if (lfd.val().trim() === '') {
            triggerAlert('Please enter leave from date.','error');
            lfd.focus();
            return;
        }
        if (ltd.val().trim() === '') {
            triggerAlert('Please enter leave to date.','error');
            ltd.focus();
            return;
        } 
        if (lnd.val().trim() === '') {
           
            triggerAlert('Please enter leave number of days.','error');
            lnd.focus();
            return;
        }
        if (lr.val().trim() === '') {
           
            triggerAlert('Please enter your leave reason.','error');
            lr.focus();
            return;
        }

         var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/leaves-employee", 
            type: 'POST',
            data: {
                "_token": csrfToken,
                l: le.val(),
                lt: lt.val(),
                lfd: lfd.val(),
                ltd: ltd.val(),
                lnd: lnd.val(),
                lr: lr.val(),     
            },
            success: function(response) {
                
                if (response.success) {
                    triggerAlert('You have successfully requested for Leave', 'success');
                    $('#add_leave .btn-close').click();
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
    </script>
		<script>
      $(document).ready(function () {
          $('.updateprof').click(function () {
              $('.upprof').removeClass('d-block');
          });
      });
    </script>
    </div>
    </body>

</html><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/include/footer.blade.php ENDPATH**/ ?>