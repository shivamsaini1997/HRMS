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
											<p>Subject: Leave Request - <?php echo e($getuser_details->firstname); ?> <?php echo e($getuser_details->lastname); ?></p>

											<p>Dear Sir/Maam,</p>

											<p>I am writing to request a leave of absence from work for <?php echo e($data['lnd']); ?> days starting from <?php echo e($data['lfd']); ?> to <?php echo e($data['ltd']); ?>. The reason for my leave is <?php echo e($data['lr']); ?>.</p>

											<p>I have ensured that my current projects are up to date, and I am willing to assist in the transition of my responsibilities during my absence. Please let me know if there are any specific procedures or forms I need to complete for this purpose.</p>

											<p>I appreciate your prompt attention to this matter and look forward to your approval.</p>
											<p><b>Note: Only for Manager & Team Lead</b> Open the link to approve or decline the request: <a href="https://hrms.accessassist.in/admin/leaves">Click here</a></p>

											<p>Thank you,</p>

											<p><?php echo e($getuser_details->firstname); ?> <?php echo e($getuser_details->lastname); ?></p>
											<!-- <p>[Your Position]</p> -->
											<p><?php echo e($getuser_details->phone_no); ?></p>

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
</html><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/email_templates/leave-mail.blade.php ENDPATH**/ ?>