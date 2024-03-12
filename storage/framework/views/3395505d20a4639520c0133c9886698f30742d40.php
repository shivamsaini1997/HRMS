<?php 
    $userid = Session::get('ad_id');  
    $getuser_details= DB::table('tbl_admin')->where('admin_id',$userid)->where('status','A')->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title> Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('public/plugins/fontawesome-free/css/all.min.css')); ?>">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/css/pagination_style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/css/alert.css')); ?>">
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('public/plugins/daterangepicker/daterangepicker.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('public/plugins/summernote/summernote-bs4.min.css')); ?>">
<link rel="shortcut icon" type="image/x-icon" href="">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.sidebar-mini.sidebar-collapse .main-header {
    margin-left: 0.6rem!important;
}
.sidebar-mini.sidebar-collapse .content-wrapper{
  margin-left: 0.6rem!important;
}
mini.sidebar-collapse .main-footer{
    margin-left: 0.6rem!important;
}
.status_img {
    height: 20px;
    width: 20px;
}
.btn-red{
  box-shadow: 0px 1px 3px 2px #dc354536;
}
.btn-green {
    box-shadow: 0px 1px 3px 2px #28a74540;
}
.btn-add {
    text-align: center;
    display: flex;
    margin-left: auto;
    padding: 5px 30px;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo e(asset('public/images/adminlte.png')); ?>" alt="AdminLogo" height="60" width="60">
  </div> 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <div class="dropdown">
		<a class="dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($getuser_details->name); ?> </a>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="<?php echo e(url('/admin/change_password')); ?>">Change Password</a>
			<a class="dropdown-item" href="<?php echo e(url('/admin/logout')); ?>">Logout</a>
		</div>
	 </div>
    </ul>
  </nav>
  <script>
   /*  $("p").each(function(){
    if (!$(this).text().trim().length) {
        $(this).remove();
    }
}); */
  </script>
  <!-- /.navbar --><?php /**PATH /home/accessas/public_html/elarning/resources/views/admin/includes/header.blade.php ENDPATH**/ ?>