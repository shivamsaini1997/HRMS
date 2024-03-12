	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>email inbox message</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
		<style>
			
		</style>
	</head>

		<body>
			<!-- Main Wrapper -->
			<div class="main-wrapper">
				<div class="page-wrapper">
				
					<!-- Page Content -->
					<div class="content container-fluid">
					
						<div class="row">
							<div class="col-sm-12">
								<div class="card mb-0">
									<div class="card-body">
										<div class="mailview-content">
											<div class="mailview-inner">
												
												<p>Subject: Travel Request - {{$getuser_details->firstname}} {{$getuser_details->lastname}}</p>
												<p> Dear Sir/Ma'am,</p>

												<p>I hope this email finds you well. I wanted to inform you about my upcoming trip, including all relevant details for your reference:</p>

												<p>Name:  {{$getuser_details->firstname}} {{$getuser_details->lastname}}</p>
												<p>Travel Days: {{$get_travel_details->travel_days}}</p>
												@php
													$travelDetails = json_decode($get_travel_details->travel_details, true);
												@endphp
												@foreach($travelDetails as $key => $value)
													@if(is_array($value))
														@foreach($value as $nestedKey => $nestedValue)
															
															<p>{{ is_string($nestedValue) ? htmlspecialchars($nestedValue) : '' }}</p>
														@endforeach
													@else
															
														<p>{{ is_string($value) ? htmlspecialchars($value) : '' }}</p>
													@endif
												@endforeach
													<p>From: [Location]</p>
													<p>To: [Destination]</p>
													<p>Dates: [Departure Date] to [Return Date]</p>
													<p>Travel Mode: [Mode of Transportation]</p>

												<p>I will be away for [Number of Days] to attend [Purpose of the trip]. During this period, I plan to address [Any specific work or meetings].</p>

												<p>Joining Date: I will be back in the office on [Return Date].</p>

												<p>For your convenience, the organization has arranged my stay at [Hotel Name], which is located at [Hotel Address]. The booking has been confirmed from [Booking Start Date] to [Booking End Date].</p>

												<p>I appreciate your support and understanding during my absence. Please let me know if there are any specific tasks or matters that require my attention before I depart.</p>

												<p>Thank you for your consideration.</p>

												<p>Best regards,</p>
												<p>{{$getuser_details->firstname}} {{$getuser_details->lastname}}</p>
												<p>{{$getuser_details->dept}}</p>
												<p>{{$getuser_details->phone_no}}</p>
												<p>travel mail to the boss  mentioning, name , travel days, how many days, from where to where, dates, travel mode, when will be joining again, personal work, hotel by organisation, hotel name, hotel add, booking dated from when to when
												</p>
											</div>
										</div>
										
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Content -->
					
				</div>
				<!-- /Page Wrapper -->
				
			</div>
			<!-- /Main Wrapper -->



		</body>
	</html>