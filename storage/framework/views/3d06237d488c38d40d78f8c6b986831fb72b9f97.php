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
												
												<p>Subject: Travel Request - <?php echo e($getuser_details->firstname); ?> <?php echo e($getuser_details->lastname); ?></p>
												<p> Dear Sir/Ma'am,</p>

												<p>I hope this email finds you well. I wanted to inform you about my upcoming trip, including all relevant details for your reference:</p>

												<p>Name:  <?php echo e($getuser_details->firstname); ?> <?php echo e($getuser_details->lastname); ?></p>
												<p>Travel Days: <?php echo e($get_travel_details->travel_days); ?></p>
												<?php
													$travelDetails = json_decode($get_travel_details->travel_details, true);
												?>
												<?php $__currentLoopData = $travelDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if(is_array($value)): ?>
														<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nestedKey => $nestedValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															
															<p><?php echo e(is_string($nestedValue) ? htmlspecialchars($nestedValue) : ''); ?></p>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php else: ?>
															
														<p><?php echo e(is_string($value) ? htmlspecialchars($value) : ''); ?></p>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
												<p><?php echo e($getuser_details->firstname); ?> <?php echo e($getuser_details->lastname); ?></p>
												<p><?php echo e($getuser_details->dept); ?></p>
												<p><?php echo e($getuser_details->phone_no); ?></p>
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
	</html><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/email_templates/travel-mail.blade.php ENDPATH**/ ?>