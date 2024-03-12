<?php
   use App\Http\Controllers\AdminController;
    $userinfo=AdminController::userinfo();
	
?>
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					
					<?php if($userinfo->type == 1): ?>
					
					<div id="sidebar-menu" class="sidebar-menu">
						<nav class="greedys sidebar-horizantal">
							<ul class="list-inline-item list-unstyled links">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/dashboard')); ?>">Admin Dashboard</a></li>
										<li><a  href="<?php echo e(url('admin/dashboard')); ?>">Department & Org.</a></li>
										<li><a  href="<?php echo e(url('/admin/announcement')); ?>">Announcement</a></li>
									
									</ul>
								</li>
								<li class="menu-title"> 
									<span>Assign Role</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/assign-role')); ?>">Assign Role</a></li>
										<li><a  href="<?php echo e(url('admin/assign-manager-team-lead')); ?>">Assign Manager & Team Lead</a></li>
								
									
									</ul>
								</li>
								
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li>
										<li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li>
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li> -->
										<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li>
								
									</ul>
								</li>
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
								
							</ul>
							<button class="viewmoremenu">More Menu</button>
							<ul class="hidden-links hidden">
								
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="salary.html"> Employee Salary </a></li>
										<li><a href="salary-view.html"> Payslip </a></li>
										<li><a href="payroll-items.html"> Payroll Items </a></li>
									</ul>
								</li>
								<li> 
									<a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
									<ul>
									<!-- <li><a href="employee-reports"> Employee Report </a></li> -->

									</ul>
								</li>
								<li class="menu-title"> 
									<span>Performance</span>
								</li>
								
								
								
								<li> 
									<a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/add-location')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Add  Location </span></a>
								</li>
							</ul>
						</nav>
						<ul class="sidebar-vertical">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('admin/dashboard')); ?>">Admin Dashboard</a></li>
										<li><a  href="<?php echo e(url('admin/department-org')); ?>">Department & Org.</a></li>
										<li><a  href="<?php echo e(url('admin/announcement')); ?>">Announcement</a></li>
									
									</ul>
								</li>
								
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-user-plus"></i><span> Assign Role</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/assign-role')); ?>">Assign Role</a></li>
										<li><a  href="<?php echo e(url('admin/assign-manager-team-lead')); ?>">Assign Manager & Team Lead</a></li>
									
									</ul>
								</li>
							
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li>
										<li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li>
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li> -->
										
									</ul>
								</li>
								
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
						
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/salary')); ?>"> Employee Salary </a></li>
										<li><a href="<?php echo e(url('/admin/consultant-salary')); ?>"> Consultant Remuneration</a></li>
										
							
									</ul>
								</li>
								<li class="submenu"> 
									<a href="javascript:void(0);"><i class="la la-file-pdf-o"></i> <span>Policies</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/company-policies')); ?>"> Company Policies </a></li>
										<li><a href="<?php echo e(url('/admin/travelpolicies')); ?>">Travel Policies </a></li>
						
									</ul>
								</li>

								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li>
										
										<!-- <li><a href="<?php echo e(url('/admin/employee-reports')); ?>"> Employee Report </a></li> -->

									
										<!-- <li><a href="leave-reports"> Leave Report </a></li> -->
									
									</ul>
								</li>
								
								<li> 
									<a href="<?php echo e(url('/admin/employee-assets')); ?>"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
								</li>
								<li >
									<a href="<?php echo e(url('/admin/travel')); ?>"><i class="fa fa-taxi"></i><span>Travel Request</span></a>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Reimbursement </span></a>
								</li>

								<li>
									<a href="<?php echo e(url('/admin/localtravel')); ?>"><i class="fa fa-taxi"></i><span>Local Travel Request</span></a>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/local-pay-reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Local Pay Reimbursement </span></a>
								</li>
								
								
								
							
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
									<ul>
										
								
										<li><a href="<?php echo e(url('/admin/calender')); ?>">Calendar</a></li>
										
									</ul>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/add-location')); ?>"><i class="fe fe-map-pin location" data-bs-toggle="tooltip" aria-label="fe fe-map-pin" data-bs-original-title="fe fe-map-pin"></i> <span>Add  Location </span></a>
								</li>
							
								
								
								
								
							</ul>
							
					</div>
					<style>
						.location, .fa-indian-rupee-sign, .fa-taxi{
							font-size: 18px !important;
							position: relative;
							left: 4px;
						}
					</style>
					<?php elseif($userinfo->type == 2): ?>
					<div id="sidebar-menu" class="sidebar-menu">
						<nav class="greedys sidebar-horizantal">
							<ul class="list-inline-item list-unstyled links">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/dashboard')); ?>">Admin Dashboard</a></li>
										<li><a  href="<?php echo e(url('/admin/announcement')); ?>">Announcement</a></li>
									
									</ul>
								</li>
								
								
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li>
										<li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li>
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li> -->
										<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li>
								
									</ul>
								</li>
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
								
							</ul>
							<button class="viewmoremenu">More Menu</button>
							<ul class="hidden-links hidden">
								
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="salary.html"> Employee Salary </a></li>
										<li><a href="salary-view.html"> Payslip </a></li>
										<li><a href="payroll-items.html"> Payroll Items </a></li>
									</ul>
								</li>
								<li> 
									<a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
									<ul>
									<!-- <li><a href="employee-reports"> Employee Report </a></li> -->

									</ul>
								</li>
								<li class="menu-title"> 
									<span>Performance</span>
								</li>
								
								
								
								<li> 
									<a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
								</li>
								
							
								
							
								
								
								
								
							</ul>
						</nav>
						<ul class="sidebar-vertical">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="/admin/dashboard">Admin Dashboard</a></li>
										<li><a  href="/admin/announcement">Announcement</a></li>
									
									</ul>
								</li>
							
							
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li>
										<li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li>
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li> -->
										
									</ul>
								</li>
								
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
						
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/salary')); ?>"> Employee Salary </a></li>
										
							
									</ul>
								</li>
								<li class="submenu"> 
									<a href="javascript:void(0);"><i class="la la-file-pdf-o"></i> <span>Policies</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/company-policies')); ?>"> Company Policies </a></li>
										<li><a href="<?php echo e(url('/admin/travelpolicies')); ?>">Travel Policies </a></li>
						
									</ul>
								</li>

								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li>
										
										<!-- <li><a href="<?php echo e(url('/admin/employee-reports')); ?>"> Employee Report </a></li> -->

									
										<!-- <li><a href="leave-reports"> Leave Report </a></li> -->
									
									</ul>
								</li>
								
								<li> 
									<a href="<?php echo e(url('/admin/employee-assets')); ?>"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
								</li>
								<li >
								<a href="<?php echo e(url('/admin/travel')); ?>"><i class="fa fa-taxi"></i><span>Travel Request</span></a>
							</li>
								<li> 
									<a href="<?php echo e(url('/admin/reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Reimbursement </span></a>
								</li>
								<li>
									<a href="<?php echo e(url('/admin/localtravel')); ?>"><i class="fa fa-taxi"></i><span>Local Travel Request</span></a>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/local-pay-reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Local Pay Reimbursement </span></a>
								</li>
								
								
							</ul>
							
					</div>
					<?php elseif($userinfo->type == 3): ?>
					<div id="sidebar-menu" class="sidebar-menu">
						<nav class="greedys sidebar-horizantal">
							<ul class="list-inline-item list-unstyled links">
								<!-- <li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/dashboard')); ?>">Admin Dashboard</a></li>
										<li><a  href="<?php echo e(url('/admin/announcement')); ?>">Announcement</a></li>
									
									</ul>
								</li>
								<li class="menu-title"> 
									<span>Assign Role</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/assign-role')); ?>">Assign Role</a></li>
										<li><a  href="<?php echo e(url('admin/assign-manager-team-lead')); ?>">Assign Manager & Team Lead</a></li>
									
									</ul>
								</li> -->
								
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
										<!-- <li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li> -->
										<!-- <li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li> -->
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li>
										<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li> -->
								
									</ul>
								</li>
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
								
							</ul>
							<!-- <button class="viewmoremenu">More Menu</button>
							<ul class="hidden-links hidden">
								
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="salary.html"> Employee Salary </a></li>
										<li><a href="salary-view.html"> Payslip </a></li>
										<li><a href="payroll-items.html"> Payroll Items </a></li>
									</ul>
								</li>
								<li> 
									<a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="employee-reports"> Employee Report </a></li>

									</ul>
								</li>
								<li class="menu-title"> 
									<span>Performance</span>
								</li>
								
								
								
								<li> 
									<a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
								</li>
								
							
								
							
								
								
								
								 -->
							</ul>
						</nav>
						<ul class="sidebar-vertical">
								<!-- <li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="/admin/dashboard">Admin Dashboard</a></li>
										<li><a  href="/admin/announcement">Announcement</a></li>
									
									</ul>
								</li>
								
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-user-plus"></i><span> Assign Role</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/assign-role')); ?>">Assign Role</a></li>
										<li><a  href="<?php echo e(url('admin/assign-manager-team-lead')); ?>">Assign Manager & Team Lead</a></li>
									
									</ul>
								</li> -->
							
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
									<!-- <li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li> -->
										<!-- <li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li> -->
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li> -->
										
									</ul>
								</li>
								
								
							
								<!-- <li class="menu-title"> 
									<span>HR</span>
								</li>
						
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/salary')); ?>"> Employee Salary </a></li>
										
							
									</ul>
								</li>
								<li class="submenu"> 
									<a href="javascript:void(0);"><i class="la la-file-pdf-o"></i> <span>Policies</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/company-policies')); ?>"> Company Policies </a></li>
										<li><a href="<?php echo e(url('/admin/travelpolicies')); ?>">Travel Policies </a></li>
						
									</ul>
								</li> -->

								<!-- <li class="submenu">
									<a href="javascript:void(0);"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
									<ul>
									<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li>
										
										<li><a href="<?php echo e(url('/admin/employee-reports')); ?>"> Employee Report </a></li> -->

									
										<!-- <li><a href="leave-reports"> Leave Report </a></li> -->
									
									<!-- </ul>
								</li>
								
								<li> 
									<a href="<?php echo e(url('/admin/employee-assets')); ?>"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
								</li> -->
								<li >
								<a href="<?php echo e(url('/admin/travel')); ?>"><i class="fa fa-taxi"></i><span>Travel Request</span></a>
							</li>
								<li> 
									<a href="<?php echo e(url('/admin/reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Reimbursement </span></a>
								</li>
								<li>
									<a href="<?php echo e(url('/admin/localtravel')); ?>"><i class="fa fa-taxi"></i><span>Local Travel Request</span></a>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/local-pay-reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Local Pay Reimbursement </span></a>
								</li>
								
								
								
							
								<!-- <li class="submenu">
									<a href="javascript:void(0);"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
									<ul>
										
								
										<li><a href="<?php echo e(url('/admin/calender')); ?>">Calendar</a></li>
										
									</ul>
								</li>
								 -->
								
								
								
							</ul>
							
					</div>
					<?php elseif($userinfo->type == 4): ?>
					<div id="sidebar-menu" class="sidebar-menu">
						<nav class="greedys sidebar-horizantal">
							<ul class="list-inline-item list-unstyled links">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/dashboard')); ?>">Admin Dashboard</a></li>
										<!-- <li><a  href="<?php echo e(url('/admin/announcement')); ?>">Announcement</a></li> -->
									
									</ul>
								</li>
								
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
										<!-- <li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li>
										<li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li> -->
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
<!-- 						
										<li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li>
										<li><a href="<?php echo e(url('/admin/attendance')); ?>">Attendance </a></li> -->
								
									</ul>
								</li>
								
<!-- 							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
								 -->
							</ul>
							
						</nav>
						<ul class="sidebar-vertical">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="/admin/dashboard">Admin Dashboard</a></li>
										<!-- <li><a  href="/admin/announcement">Announcement</a></li> -->
									
									</ul>
								</li>
								
								<li class="menu-title"> 
									<span>Employees</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
									<ul>
									<!-- <li><a href="<?php echo e(url('/admin/employees')); ?>">All Employees</a></li>
										<li><a href="<?php echo e(url('/admin/holidays')); ?>">Holidays</a></li> -->
										<li><a href="<?php echo e(url('/admin/leaves')); ?>">Leaves<span class="badge rounded-pill bg-primary float-end">1</span></a></li>
						
										<!-- <li><a href="<?php echo e(url('/admin/leave-settings')); ?>">Leave Settings</a></li> -->
										
									</ul>
								</li>
								
								
							
								
								
							</ul>
							
					</div>
					<?php elseif($userinfo->type == 5): ?>
					<div id="sidebar-menu" class="sidebar-menu">
						<nav class="greedys sidebar-horizantal">
							<ul class="list-inline-item list-unstyled links">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a  href="<?php echo e(url('admin/dashboard')); ?>">Admin Dashboard</a></li>
										
									
									</ul>
								</li>
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
								
							</ul>
							<button class="viewmoremenu">More Menu</button>
							<ul class="hidden-links hidden">
								
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="salary.html"> Employee Salary </a></li>
										<li><a href="salary-view.html"> Payslip </a></li>
										<li><a href="payroll-items.html"> Payroll Items </a></li>
									</ul>
								</li>
								
								
								
							</ul>
						</nav>
						<ul class="sidebar-vertical">
								<li class="menu-title"> 
									<span>Main</span>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="/admin/dashboard">Admin Dashboard</a></li>
									
									
									</ul>
								</li>
								
								
							
							
								
								
							
								<li class="menu-title"> 
									<span>HR</span>
								</li>
						
								<li class="submenu">
									<a href="javascript:void(0);"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="<?php echo e(url('/admin/salary')); ?>"> Employee Salary </a></li>
										
							
									</ul>
								</li>
								
								<li >
								<a href="<?php echo e(url('/admin/travel')); ?>"><i class="fa fa-taxi"></i><span>Travel Request</span></a>
							</li>
								<li> 
									<a href="<?php echo e(url('/admin/reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Reimbursement </span></a>
								</li>
								
								<li>
									<a href="<?php echo e(url('/admin/localtravel')); ?>"><i class="fa fa-taxi"></i><span>Local Travel Request</span></a>
								</li>
								<li> 
									<a href="<?php echo e(url('/admin/local-pay-reimbursement')); ?>"><i class="fa-solid fa-indian-rupee-sign"></i> <span>Local Pay Reimbursement </span></a>
								</li>
								
							</ul>
							
					</div>
					<?php else: ?>
					You dont have permission
					<?php endif; ?>
                </div>
            </div>
			<!-- /Sidebar --><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/includes/sidebar.blade.php ENDPATH**/ ?>