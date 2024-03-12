<?php
use App\Http\Controllers\HomeController;
$check_pro_details = HomeController::CheckProfileDetails();

// Check if any of the profile details are empty
$show_modal = empty($check_pro_details['emp_details']) || empty($check_pro_details['emp_emargency_contact']) || empty($check_pro_details['emp_bank_info']);
?>
@include('frontend.include.header')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
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
		
			<!-- Loader -->
			<div id="loader-wrapper">
				<div id="loader">
					<div class="loader-ellips">
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					  <span class="loader-ellips__dot"></span>
					</div>
				</div>
			</div>
			<!-- /Loader -->
			@include('frontend.include.sidebar')
			


			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
						@php
							$fullName = $getuser->firstname;

							$words = explode(' ', $fullName);

						
							$initials = '';

							
							foreach ($words as $word) {
								$initials .= strtoupper(substr($word, 0, 1));
							}
						@endphp
					<div class="row">
						<div class="col-md-12">
							<div class="welcome-box">
								<div class="welcome-img em-dashboard">
									
									@if($getuser->image != null)
									<img src="{{url('public/uploads/profile')}}/{{$getuser->image}}" alt="User Image">
									@else
										<span class="em-name-show">{{$initials}}</span>
									@endif
								</div>
								<div class="welcome-det ">
									<h3>Welcome, {{$getuser->firstname}}</h3>
									<p>{{$today}}</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<section class="dash-section">
								
								<div class="dash-sec-content">
									@if($bday != '0')
									@foreach($bday as $dob)
									<div class="dash-info-list">
										<a href="#" class="dash-card text-danger">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa-regular fa-hourglass"></i>
												</div>
												<div class="dash-card-content">
													<p>Today is {{$dob->firstname }}'s birthday</p>
												</div>
												<div class="dash-card-avatars">
													<div class="e-avatar"><img src="{{url('public/uploads/profile')}}/{{$dob->image}}" alt="User Image"></div>
												</div>
											</div>
										</a>
									</div>
									@endforeach
									@endif

									@if($get_leave_details != null)
									<h1 class="dash-sec-title">Leave Updates Of The Month</h1>
									@foreach($get_leave_details as $leave)
									<div class="dash-info-list">
										<a href="#" class="dash-card text-secondary">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="fa-regular fa-hourglass"></i>
												</div>
												<div class="dash-card-content">
													<p>{{$leave->firstname}} {{$leave->lastname}} is on leave from {{ \Carbon\Carbon::parse($leave->from)->format('d/m/Y') }} to {{ \Carbon\Carbon::parse($leave->to)->format('d/m/Y') }}.</p>
												</div>
												<div class="dash-card-avatars">
													<div class="e-avatar"><img src="{{url('public/uploads/profile')}}/{{$leave->image}}" alt="User Image"></div>
												</div>
											</div>
										</a>
									</div>
									@endforeach
									@endif

								
								</div>
							</section>
							<section class="dash-section">
								
									<div id='calendar1'></div>
								
							</section>

						</div>

						<div class="col-lg-4 col-md-4">
							<div class="dash-sidebar">
							<section>
									<h5 class="dash-title">Office Time</h5>
									<div class="card">
										<div class="card-body">
											<div class="time-list mb-0">
												<div class="dash-stats-list">
													<div class="request-btn">
														<button class="btn btn-primary @if($get_today_attendance !== '00:00') btn-success @endif" onclick="checkIn()">Check in</button>
													</div>
													<p>{{$get_today_attendance}} </p>
												</div>
												<div class="dash-stats-list">
													<div class="request-btn">
														<button class="btn btn-primary @if($get_today_acheckout !== '00:00') btn-success @endif" onclick="checkOut()" @if($get_today_attendance == '00:00') disabled @endif>Check Out</button>
													</div>
													<p>{{$get_today_acheckout}}</p>
												</div>
											</div>
										</div>
									</div>
								</section>
								<section >
									<h5 class="dash-title">Announcement </h5>
									<div class="card">
										<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list announcement">
													@if($check_announcement != null)
														@foreach($check_announcement as $announcement)
															<div class="annouce-box">
																<a href="{{url('announcement')}}/{{$announcement->slug}}">
																	<div style="display: grid">
																		<!-- <span class="status online"></span> -->
																		<div>
																			<h5>{{$announcement->title}}</h5>
																			<p class="p-0">{!! substr($announcement->description, 0, strpos($announcement->description, ' ', 100)) !!}
</p>
																		</div>
																	</div>
																</a>
																@php
																	$originalDateTime = $announcement->created_at;
																	$dateTime = new DateTime($originalDateTime);
																	$formattedDateTime = $dateTime->format('d M \a\t h:ia');
																@endphp
																<p class="border-bottom date-time-announce">{{$formattedDateTime}}</p>
															</div>
														@endforeach
													@else
														No data found
													@endif
												
													
												</div>
												
											</div>
											
										</div>
									</div>
								</section>
								<!-- <section>
									<h5 class="dash-title">Projects</h5>
									<div class="card">
										<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list">
													<h4>71</h4>
													<p>Total Tasks</p>
												</div>
												<div class="dash-stats-list">
													<h4>14</h4>
													<p>Pending Tasks</p>
												</div>
											</div>
											<div class="request-btn">
												<div class="dash-stats-list">
													<h4>2</h4>
													<p>Total Projects</p>
												</div>
											</div>
										</div>
									</div>
								</section> -->
								<section>
									<h5 class="dash-title">Your Leave</h5>
									<div class="card">
										<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list">
													<h4>4.5</h4>
													<p>Leave Taken</p>
												</div>
												<div class="dash-stats-list">
													<h4>12</h4>
													<p>Remaining</p>
												</div>
											</div>
											<div class="request-btn">
												<a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add_leave">Apply Leave</a>
											</div>
										</div>
									</div>
								</section>
					
								<!-- <section>
									<h5 class="dash-title">Upcoming Holiday</h5>
									<div class="card">
										<div class="card-body text-center">
											<h4 class="holiday-title mb-0">Mon 20 May 2019 - Ramzan</h4>
										</div>
									</div>
								</section> -->
							</div>
						</div>
					</div>

				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

				<!-- Add Leave Modal -->
				<div id="add_leave" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Leave</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm6" method="post">
									<div class="input-block mb-3">
										<label class="col-form-label">Leave<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="le" id="le" placeholder="Cassual/Sick/others">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="lt" id="lt">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">From <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control dat" type="text" name="lfd" id="lfd" onchange="calculateDateDifference()">
										</div>
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">To <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control dat" type="text" name="ltd" id="ltd" onchange="calculateDateDifference()">
										</div>
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Number of days <span class="text-danger">*</span></label>
										<input class="form-control"  type="text"  name="lnd" id="lnd" readonly>
									</div>
									<!-- <div class="input-block mb-3">
										<label class="col-form-label">Remaining Leaves <span class="text-danger">*</span></label>
										<input class="form-control" readonly value="12" type="text">
									</div> -->
									<div class="input-block mb-3">
										<label class="col-form-label">Leave Reason <span class="text-danger">*</span></label>
										<textarea rows="4" class="form-control"  name="lr" id="lr"></textarea>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn adlv">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div> 
				</div>
				<!-- /Add Leave Modal -->
				
@if($show_modal)
<!-- Modal -->
<div class="modal d-block upprof" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: #0000008c;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center  justify-content-center">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Update Profile </b></h1>
      </div>
      <div class="modal-body text-center mb-0">
        <h2><b>Welcome to HRMS. </b></h2>
        <img src="{{ asset('public/frontend/assets/images/up-profile.jpg') }}" alt="">
        <p>Please update your profile.</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary updateprof" data-bs-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{url('/profile')}}">Update Profile</a>
      </div>
    </div>
  </div>
</div>
@endif


		@include('frontend.include.footer')
		<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>

		
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




<script>
	$(document).ready(function () {
		
		var SITEURL = "{{ url('/') }}";
		
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		var calendar = $('#calendar1').fullCalendar({
			editable: false,
			events: SITEURL + "/",
			displayEventTime: false,
			editable: false,
			eventRender: function (event, element, view) {
				if (event.allDay === 'true') {
						event.allDay = true;
				} else {
						event.allDay = false;
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
		<!-- <script src="{{asset('public/frontend/assets/js/dashboard.js')}}"></script> -->
		<script>
			function checkIn() {
				var csrfToken = $('meta[name="csrf-token"]').attr('content');
				var data = { 
					action: 'check_in',
					"_token": csrfToken,
				};

				checkUserLocation(allLocations, function(isInOffice) {
					if (isInOffice) {
						$.ajax({
							url: '/check-in-out', 
							method: 'POST',
							data: data,
							success: function(response) {
								if (response.success == true) {
									triggerAlert(response.message, 'success');
									location.reload(true);
								} else {
									triggerAlert(response.message, 'error');
								}
							},
							error: function(error) {
								triggerAlert('Something went wrong.', 'error');
							}
						});
					} else {
						triggerAlert('You are not in the office location.', 'error');
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
                location.reload(true);
            } else {
                triggerAlert('You have already checked out.', 'error');
            }
        },
        error: function(error) {
            triggerAlert('Something went wrong.', 'error');
        }
    });
}

	

	function checkUserLocation(officeLocations, callback) {
		navigator.geolocation.getCurrentPosition(
			function (position) {
				var userLat = position.coords.latitude;
				var userLng = position.coords.longitude;

				var isInAnyOffice = officeLocations.some(function(office) {
					var officeLat = parseFloat(office.officelat);
					var officeLng = parseFloat(office.officelng);
					var threshold = parseFloat(office.threshold);

					return Math.abs(userLat - officeLat) < threshold && Math.abs(userLng - officeLng) < threshold;
				});

				callback(isInAnyOffice);
			},
			function (error) {
				console.error('Error getting user location:', error);
				triggerAlert('Error getting user location.', 'error');
			}
		);
	}
	var allLocations = <?php echo json_encode($all_location); ?>;
	
	$(document).ready(function () {
    checkUserLocation(allLocations, function (isInOffice) {
        $('#checkInBtn').prop('disabled', !isInOffice);
    });
});

		</script>
		