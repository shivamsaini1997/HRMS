<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Local Travel Reimbursement Requests</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Local Travel Reimbursement Requests </li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->

			
						<!-- Page Content -->
						<div class="content container-fluid">
				

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
                                        <th>Employee Name</th>
										<th>Travel Id</th>
										<th>Travel Date</th>
										<th>Travel Reason</th>
										<th>Travel mode</th>
										<th>Travel Amount</th>
										<th>Travel Document</th>
                                        <th>Approved By</th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
                                    <?php if(!empty($get_ltr_details)): ?>
                                        <?php $__currentLoopData = $get_ltr_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ltrdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($ltrdetails->firstname); ?> <?php echo e($ltrdetails->lastname); ?></td>
                                            <td><?php echo e(strtoupper($ltrdetails->travelid)); ?></td>
                                            <td><?php echo e($ltrdetails->traveldate); ?></td>
                                            <td><?php echo e($ltrdetails->travel_reason); ?></td>
                                            <td><?php echo e($ltrdetails->travel_mode); ?></td>
                                            <td><?php echo e($ltrdetails->travel_amount); ?></td>
                                            <td>

                                            <?php if($ltrdetails->doc): ?>
                                                <?php if(pathinfo($ltrdetails->doc, PATHINFO_EXTENSION) == 'pdf'): ?>
                                                    <a href="<?php echo e(url('public/uploads/localtravel')); ?>/<?php echo e($ltrdetails->doc); ?>" class="image-popup">
                                                    <img class="embedclick" src="https://png.pngtree.com/png-clipart/20220612/original/pngtree-pdf-file-icon-png-png-image_7965915.png" alt="Word Document" width="50px" height="50px">
                                                    </a>
                                                <?php elseif(in_array(pathinfo($ltrdetails->doc, PATHINFO_EXTENSION), ['doc', 'docx'])): ?>
                                                    <a href="<?php echo e(url('public/uploads/localtravel')); ?>/<?php echo e($ltrdetails->doc); ?>" class="image-popup">
                                                        <img class="embedclick" src="word_icon.png" alt="Word Document" width="50px" height="50px">
                                                    </a>
                                                <?php elseif(in_array(pathinfo($ltrdetails->doc, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                                <a href="<?php echo e(url('public/uploads/localtravel')); ?>/<?php echo e($ltrdetails->doc); ?>" class="image-popup">
                                                    <img style="width:50px; height:50px" src="<?php echo e(url('public/uploads/localtravel')); ?>/<?php echo e($ltrdetails->doc); ?>" alt=""
                                                    ></a>
                                                <?php else: ?>
                                                    Unsupported File Type
                                                <?php endif; ?>
                                            <?php endif; ?>
                                               
                                            </td>
                                            <td><?php if(!empty($ltrdetails->name)): ?> <?php echo e($ltrdetails->name); ?> <?php endif; ?></td>
                                            <td class="text-center">
                                                    <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
																<?php if($ltrdetails->status=='C'): ?>
																	<i class="fa-regular fa-circle-dot text-success"></i> Cancled
																<?php elseif($ltrdetails->status=='P'): ?>
																	<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																<?php elseif($ltrdetails->status=='R'): ?>
																	<i class="fa-regular fa-circle-dot text-info"></i> Reimbursement
																
																<?php endif; ?>
															</a>

															<div class="dropdown-menu dropdown-menu-right status-dropdown">
																<a class="dropdown-item" tr-id="<?php echo e($ltrdetails->id); ?>" uid="<?php echo e($ltrdetails->userid); ?>" data-status="P" href="#">Pending</a>
																<a class="dropdown-item" tr-id="<?php echo e($ltrdetails->id); ?>" uid="<?php echo e($ltrdetails->userid); ?>" data-status="C" href="#">Cancled</a>
																<a class="dropdown-item" tr-id="<?php echo e($ltrdetails->id); ?>" uid="<?php echo e($ltrdetails->userid); ?>" data-status="R" href="#">Reimbursement</a>
															</div>
                                                    </div>
                                                </td>
                                            
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?> 
                                    No data Found
                                    <?php endif; ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->

		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
		<script>
        $(document).ready(function(){
            $('.status-dropdown .dropdown-item').on('click', function(event) {
                event.preventDefault();
                
                const selectedStatus = $(this).data('status');
                const trId = $(this).attr('tr-id');
                const userId = $(this).attr('uid');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/update-localtravel',
                    type: 'POST',
                    data: {
                        "_token": csrfToken,
                        "trId": trId,
                        "userId": userId,
                        "status": selectedStatus,
                        "type" :"update_status"
                    },
                    success: function(response) {
                        if (response.success) {
                            triggerAlert('You have successfully changed travel reimbursement status', 'success');
                            location.reload(true);
                        } else {
                            triggerAlert('Somthing went wrong!', 'error');
                        }
                    },
                    error: function(error) {
                        triggerAlert('Somthing went wrong!', 'error');
                    }
                });
            });
        });
        </script>

<?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/localtravel.blade.php ENDPATH**/ ?>