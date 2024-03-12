<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://hrms.accessassist.in/public/frontend/assets/css/alert.css">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Attendance</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Attendance</li>
								</ul>
								<!-- <form action="<?php echo e(route('exportAttendance')); ?>" method="post">
									<?php echo csrf_field(); ?>
									<?php 
										$year = date('Y');
										$month = date('m');
									?>
									<div class="mb-3">
										<label for="month">Month:</label>
										<select name="month" id="month" class="form-control">
											<?php for($m = 1; $m <= 12; $m++): ?>
												<option value="<?php echo e($m); ?>" <?php echo e($m == $month ? 'selected' : ''); ?>><?php echo e(date('F', mktime(0, 0, 0, $m, 1))); ?></option>
											<?php endfor; ?>
										</select>
									</div>
									<div class="mb-3">
										<label for="year">Year:</label>
										<select name="year" id="year" class="form-control">
											<?php for($y = date('Y'); $y >= date('Y') - 10; $y--): ?>
												<option value="<?php echo e($y); ?>" <?php echo e($y == $year ? 'selected' : ''); ?>><?php echo e($y); ?></option>
											<?php endfor; ?>
										</select>
									</div> -->
									<button type="submit" id="exportBtn" class="btn btn-primary" style="float: right;">Export to CSV</button>
								<!-- </form> -->
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<?php
						$smonth = $_GET['smonth'] ?? date('m');
						$smonth = intval($smonth);
						
					?>
					<form action="<?php echo e(url('admin/attendance')); ?>" method="GET">
						<div class="row filter-row">
							<div class="col-sm-6 col-md-2"> 
								<div class="input-block mb-3 form-focus select-focus">
								<select class="select floating" name="smonth" id="smonth"> 
									<?php for ($m = 1; $m <= 12; $m++): ?>
										<option value="<?= sprintf('%02d', $m) ?>" <?= $m == $smonth ? 'selected' : '' ?>>
											<?= date('F', mktime(0, 0, 0, $m, 1)) ?>
										</option>
									<?php endfor; ?>
								</select>
									<label class="focus-label">Select Month</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-2"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="year" id="year"> 
										<?php for($y = date('Y'); $y >= date('Y') - 10; $y--): ?>
											<option value="<?php echo e($y); ?>" <?php echo e($y == $year ? '' : ''); ?>><?php echo e($y); ?></option>
										<?php endfor; ?>
									</select>
									<label class="focus-label">Select Year</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-2"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="org" id="org"> 
										<option value="">Select Organization</option>
										<?php $__currentLoopData = $departmentsByOrganization; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgId => $orgData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($orgData['org_name']); ?>"><?php echo e($orgData['org_name']); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								<label class="focus-label">Organization</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">  
								<div class="d-grid">
									<button type="submit" class="btn btn-success"> Search </button>  
								</div>
							</div>
							<div class="col-sm-6 col-md-3">  
								<div class="d-grid">
									<a href="<?php echo e(url('admin/attendance')); ?>" class="btn btn-info"> Reset </a>  
								</div>
							</div>     
						</div>
					</form>

					<!-- /Search Filter -->
					
                    <div class="row">
                        <div class="col-lg-12">
						
							<div class="table-responsive">
							<table class="table table-striped custom-table table-nowrap mb-0 attendanceemployees">
							<thead>
								<tr>
									<th>Employee</th>
									<?php
										// Get the value of smonth from the URL
										$smonth = request()->input('smonth');
										$currentYear = date('Y');
										// If smonth is set and is a valid month number, use it to get the month name
										if ($smonth && in_array($smonth, range(1, 12))) {
											$monthName = date('F', mktime(0, 0, 0, $smonth, 1));
											// Get the number of days in the current month
											$numDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $smonth, $currentYear);
										} else {
											// Otherwise, use the current month name
											$monthName = date('F');
											$currentMonth = date('m');
											// Get the number of days in the current month
											$numDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
										}										
									?>
									<?php $__currentLoopData = range(1, $numDaysInMonth); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<th><?php echo e($day); ?> <?php echo e($monthName); ?></th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</thead>
							<tbody>
								<?php
									use Carbon\Carbon;

									// Organize attendance data by user and date
									$userAttendance = [];
									foreach ($all_attendance as $attendance) {
										$currentDate = $attendance->date;
										$dayOfWeek = Carbon::parse($currentDate)->format('N');

										$userAttendance[$attendance->userid][$currentDate] = [
											'checkin_time' => $attendance->checkin_time,
											'checkout_time' => $attendance->checkout_time,
											'image' => $attendance->image,
											'firstname' => $attendance->firstname,
											'lastname' => $attendance->lastname,
											'emp_id' => $attendance->emp_id,
											'week_off' => in_array($dayOfWeek, [6, 7]), // 6 is Saturday, 7 is Sunday
										];
										
									}
									
									// Define the year and month dynamically
									$year = date('Y');
									$month = date('m');
				
								?>

								<?php $__currentLoopData = $userAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $userDays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$fullName = $userDays[key($userDays)]['firstname'];
									$words = explode(' ', $fullName);
									$initials = '';
									foreach ($words as $word) {
										$initials .= strtoupper(substr($word, 0, 1));
									}
								?>
								<tr>
									<td>
										<h2 class="table-avatar">
											<a class="avatar avatar-xs" href="<?php echo e(url('admin/employees/profile')); ?>/<?php echo e(strtolower($userDays[key($userDays)]['emp_id'])); ?>">
											<?php if($userDays[key($userDays)]['image'] != null): ?>
												<img src="<?php echo e(url('public/uploads/profile')); ?>/<?php echo e($userDays[key($userDays)]['image']); ?>" alt="User Image">
											<?php else: ?>
												<span class="em-name-show"><?php echo e($initials); ?></span>
											<?php endif; ?>
											</a>
											<a href="<?php echo e(url('admin/employees/profile')); ?>/<?php echo e(strtolower($userDays[key($userDays)]['emp_id'])); ?>"><?php echo e($userDays[key($userDays)]['firstname']); ?> <?php echo e($userDays[key($userDays)]['lastname']); ?></a>
										</h2>
									</td>
									<?php $__currentLoopData = range(1, $numDaysInMonth); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																
										<td>
											<?php
												$currentDate = date("Y-m-d", strtotime("$year-$month-$day"));
												$dayOfWeek = Carbon::parse($currentDate)->format('N');
												$isWeekendOfMonth = in_array($dayOfWeek, [6, 7]);

												// Check if the day falls on a weekend and is within the current month
												if ($isWeekendOfMonth) {
													echo "<div class=''>Week Off</div>";
												}
												elseif (isset($userDays[$currentDate])) {
													$attendanceData = $userDays[$currentDate];

													// Check if there's leave for this user and date
													$leaveTime = '';
													foreach ($leave_by_month as $leave) {
																$leaveFrom = date('Y-m-d', strtotime($leave->from));
																$leaveTo = date('Y-m-d', strtotime($leave->to));

																// Check if leave falls on the current date or if it extends into the current date
																if (($leave->userid == $userId) && ($currentDate >= $leaveFrom) && ($currentDate <= $leaveTo)) {
																	// Calculate the difference in days between the start and end date of the leave
																	$leaveStartDate = new DateTime($leaveFrom);
																	$leaveEndDate = new DateTime($leaveTo);
																	$dateDifference = $leaveEndDate->diff($leaveStartDate)->days;

																	// Check if leave includes the current date
																	if ($currentDate != $leaveFrom) {
																		$leaveTime = "Leave: " . $leave->from . ' (' . $leave->leave . ')';
																	} else {
																		$leaveTime = "Leave: " . $leave->from . " to " . $leave->to . ' (' . $leave->leave . ')';
																	}
																	break; // Break the loop once leave is found for the current date
																}
															}

														echo "<a href='javascript:void(0);' class='getatng' datemt='{{$currentDate}}' data-bs-toggle='modal'  data-id='" . strtolower($userDays[key($userDays)]['emp_id']) . "' data-bs-target='#attendance_info'>";
														echo "<span class='text-success checkyes'>";
														echo $attendanceData['checkin_time'] != null ? date('h:i A', strtotime($attendanceData['checkin_time'])) : "<div style='color: red;'>00:00</div>";
														echo "</span><br>";
														echo "<span class='text-danger checkno'>";
														echo $attendanceData['checkout_time'] != null ? date('h:i A', strtotime($attendanceData['checkout_time'])) : "<div style='color: red;'>00:00</div>";
														echo "</span><br>";
														if (!empty($leaveTime)) {
															echo "<span style='color: red;'>$leaveTime</span>";
														}
														echo "</a>";
													} else {
														echo "<a href='javascript:void(0);' class='getatng' datemt='{{$currentDate}}' data-bs-toggle='modal'  data-id='" . strtolower($userDays[key($userDays)]['emp_id']) . "' data-bs-target='#attendance_info'>";
														echo "<span class='checkyes' style='color: #b5aeae'>";
														echo "00:00";
														echo "</span><br>";
														echo "<span class='checkno' style='color: #b5aeae'>";
														echo "00:00";
														echo "</span></a>";
													}
												?>
											</td>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
							</table>
							</div>
                        </div>
                    </div>
                </div>
				<!-- /Page Content -->
				<?php
					use Carbon\Carbon as checkin;
				?>
				
				<!-- Attendance Modal -->
				<div class="modal custom-modal fade" id="attendance_info" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Time</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<div class="card punch-status">
											<div class="card-body">
											<h5 class="card-title" >Timesheet <small id="timesheetTitle" class="text-muted"></small></h5>


												<form action=""method="post" >
													<input type="hidden"  class="dateformet" id="dateforuid"/>
													<input type="hidden"  class="hiddendate" id="hiddendate"/>
													<div class="punch-det">
														<h6>Punch In at</h6>
													
															<input type="time" id="checkintime" name="checkintime" class="form-control" value="" step="2">
													
													</div>

													<div class="punch-det">
														<h6>Punch Out at</h6>
														
															<input id="checkouttime" name="checkouttime" type="time" class="form-control" value="" step="2">
													
													</div>
													<div class="statistics">
														<div class="row">
															<div class="col-md-12 ">
																<div class="submit-section text-center">
																	<button class="btn btn-primary submit-timebtn">Submit</button>
																</div>
															</div>
														</div>
													</div>	
												</form>
											</div>
										</div>
									</div>
									<!-- <div class="col-md-6">
										<div class="card recent-activity">
											<div class="card-body">
												<h5 class="card-title">Activity</h5>
												<ul class="res-activity-list">
													<li>
														<p class="mb-0">Punch In at</p>
														<p class="res-activity-time">
															<i class="fa-regular fa-clock"></i>
															10.00 AM.
														</p>
													</li>
													<li>
														<p class="mb-0">Punch Out at</p>
														<p class="res-activity-time">
															<i class="fa-regular fa-clock"></i>
															11.00 AM.
														</p>
													</li>
													
												</ul>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Attendance Modal -->
				
            </div>
			<!-- Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- Your HTML Code -->
<script src="https://hrms.accessassist.in/public/frontend/assets/js/alert.js"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<!-- Your JavaScript Code -->
<script>
    $(document).ready(function () {
        $('.getatng').click(function () {
            // Get the data attributes from the clicked element
            var userId = $(this).data('id');
            var checkinValue = $(this).find('.checkyes').text().trim();
            var checkoutValue = $(this).find('.checkno').text().trim();

            // Format the values as H:i:s
            var formattedCheckin = formatTime(checkinValue);
            var formattedCheckout = formatTime(checkoutValue);

            // Set the values in the modal input fields
            $('#checkintime').val(formattedCheckin);
            $('#checkouttime').val(formattedCheckout);
            $('#dateforuid').val(userId);

				// Get the date value from the datemt attribute
				var clickedDate = $(this).attr('datemt').replace(/[{}]/g, '');

				// Set the formatted date in the card title using regex
				$('#timesheetTitle').text(clickedDate.replace(/(\d{4}-\d{2}-\d{2})/, function(match, p1) {
					var dateObj = new Date(p1);
					var options = { month: 'short', year: 'numeric', day: 'numeric'};
					return dateObj.toLocaleDateString('en-US', options);
				}));

            // Log the values to the console with H:i:s format
            // console.log('User ID:', userId);
            // console.log('Check In:', formattedCheckin);
            // console.log('Check Out:', formattedCheckout);
            // console.log('Clicked Date:', clickedDate);
            $('#hiddendate').val(clickedDate);

        });

        // Function to format time as H:i:s
        function formatTime(timeString) {
            // Assuming timeString is in HH:mm AM/PM format
            var date = new Date("January 01, 2022 " + timeString);
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            // Ensure two-digit format
            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            return hours + ':' + minutes + ':' + seconds;
        }

		$('.submit-timebtn').click(function(event) {
			event.preventDefault();
			
			const dateforuid = $('#dateforuid');
			const hiddendate = $('#hiddendate');
			const checkintime = $('#checkintime');
			const checkouttime = $('#checkouttime');
			if (checkintime.val().trim() === '') {
				triggerAlert('Please enter Check in time.','error');
				checkintime.focus();
				return;
			}
			if (checkouttime.val().trim() === '') {
				triggerAlert('Please enter Check out time.','error');
				checkouttime.focus();
				return;
			}

			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/update-attendance", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					dateforuid: dateforuid.val(),
					hiddendate: hiddendate.val(),
					checkintime: checkintime.val(),
					checkouttime: checkouttime.val(),
				},
				success: function(response) {
					if (response.success) {
						triggerAlert('You have successfully edit attendance time', 'success');
						location.reload(true);
					} else {
						triggerAlert('Somthing went wrong!', 'error');
					}
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
			});
		});

    });
</script>

<script>
    $(document).ready(function () {
        $("#exportBtn").click(function () {
            let table = document.getElementsByTagName("table");
            // console.log(table);
            // debugger;
            TableToExcel.convert(table[0], {
                name: `Employee_Attendance.xlsx`,
                sheet: {
                    name: 'Employee_Attendance'
                }
            });
        });
    });
</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/attendance.blade.php ENDPATH**/ ?>