  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright 2023 &copy; Elarning. All Rights Reserved.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="<?php echo e(asset('public/js/alert.js')); ?>"></script>
<!-- jQuery -->
<script src="<?php echo e(asset('public/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('public/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  //$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/plugins/daterangepicker/daterangepicker.js')); ?>"></script>

<!-- Summernote -->
<script src="<?php echo e(asset('public/plugins/summernote/summernote-bs4.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('public/dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('public/dist/js/demo.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('public/dist/js/pages/dashboard.js')); ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()

	setTimeout(function(){ $('.alert').hide(); }, 3000);
 
  })
</script>
<style>
 .sidebar-mini.sidebar-collapse .main-footer{
  margin-left: 0.6rem!important;
}
</style>
</body>
</html><?php /**PATH /home/accessas/public_html/elarning/resources/views/admin/includes/footer.blade.php ENDPATH**/ ?>