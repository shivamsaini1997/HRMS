<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('frontend.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Reimbursement </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Reimbursement </li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#travelclaim"><i class="fa-solid fa-plus"></i> Add</a>
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
										<th>Travel Id</th>
										<th>Travel Amount</th>
										<th>Travel Document</th>
										<th>Hotel Amount</th>
										<th>Hotel Document</th>
										<th>Local Travel Amount</th>
										<th>Local Travel Document</th>
										
										<th>Total Amount</th>
										<th class="text-center">Status</th>
										<th class="text-end"></th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($get_all_reimbursement_req)): ?>
									<?php $__currentLoopData = $get_all_reimbursement_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reimbursement_req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e(strtoupper($reimbursement_req->travel_req_travelid)); ?></td>
										<td><?php echo e($reimbursement_req->travel_amt); ?> INR</td>
										<td>
										<?php if($reimbursement_req->travel_doc != null): ?>
											<?php 
												$travelDoc = json_decode($reimbursement_req->travel_doc, true);
											?>
											<?php $__currentLoopData = $travelDoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php
													$extension = pathinfo($td, PATHINFO_EXTENSION);
													$imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
												?>
												<?php if(in_array($extension, $imageExtensions)): ?>
													<a href="<?php echo e(asset('public/uploads/traveldocument/' . $td)); ?>" class="image-popup">
														<img style="width:50px; height:50px" src="<?php echo e(asset('public/uploads/traveldocument/' . $td)); ?>" alt="">
													</a></br>
												<?php else: ?>
													<a href="<?php echo e(asset('public/uploads/traveldocument/' . $td)); ?>" target="_blank"><?php echo e($td); ?></a></br>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											NULL
										<?php endif; ?>
										</td>
									
										<td><?php echo e($reimbursement_req->hotel_amt); ?> INR</td>
										<td>
										<?php if($reimbursement_req->hotel_doc != null): ?>
											<?php 
												$travelDoc = json_decode($reimbursement_req->hotel_doc, true);
											?>
											<?php $__currentLoopData = $travelDoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php
													$extension = pathinfo($td, PATHINFO_EXTENSION);
													$imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
												?>
												<?php if(in_array($extension, $imageExtensions)): ?>
													<a href="<?php echo e(asset('public/uploads/Hoteldocument/' . $td)); ?>" class="image-popup">
														<img style="width:50px; height:50px" src="<?php echo e(asset('public/uploads/Hoteldocument/' . $td)); ?>" alt="">
													</a></br>
												<?php else: ?>
													<a href="<?php echo e(asset('public/uploads/Hoteldocument/' . $td)); ?>" target="_blank"><?php echo e($td); ?></a></br>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											NULL
										<?php endif; ?>
										</td>
										<td><?php echo e($reimbursement_req->loc_amt); ?> INR </td>
										<td>
										<?php if($reimbursement_req->loc_doc != null): ?>
											<?php 
												$travelDoc = json_decode($reimbursement_req->loc_doc, true);
											?>
											<?php $__currentLoopData = $travelDoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php
													$extension = pathinfo($td, PATHINFO_EXTENSION);
													$imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
												?>
												<?php if(in_array($extension, $imageExtensions)): ?>
													<a href="<?php echo e(asset('public/uploads/localtraveldocument/' . $td)); ?>" class="image-popup">
														<img style="width:50px; height:50px" src="<?php echo e(asset('public/uploads/localtraveldocument/' . $td)); ?>" alt="">
													</a></br>
												<?php else: ?>
													<a href="<?php echo e(asset('public/uploads/localtraveldocument/' . $td)); ?>" target="_blank"><?php echo e($td); ?></a></br>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											NULL
										<?php endif; ?>
										</td>
										
										<td><?php echo e($reimbursement_req->total_amt); ?> INR </td>
										

										<td class="text-center">
											<p class="dropdown-item mb-0">
												<?php if($reimbursement_req->status=='A'): ?>
													<i class="fa-regular fa-circle-dot text-success"></i> Approved
												<?php elseif($reimbursement_req->status=='P'): ?>
													<i class="fa-regular fa-circle-dot text-danger"></i> Pending
												
												<?php elseif($reimbursement_req->status=='C'): ?>
													<i class="fa-regular fa-circle-dot text-info"></i> Cancle
												<?php endif; ?>
											</p>
										</td>
										<td class="text-end">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_travelclaim"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_asset"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									Data not found
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

				<!-- Add travel claim Modal -->
				<div id="travelclaim" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Reimbursement</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Travel Id</label>
												<select class="form-select form-control"  name="travelid" id="travelid">
													<option value=""> -- Select Travel ID -- </option>
													<?php $__currentLoopData = $get_all_travel_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trvreq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($trvreq->id); ?>" dataid="<?php echo e($trvreq->userid); ?>"><?php echo e(strtoupper($trvreq->travelid)); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
												
											</div>
										</div>
                                      
										
									</div>
									<div>
										<div class="row travelrowclaim" id="travelrowclaim">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Travel Amount</label>
												<input class="form-control" type="text" name="travelamount" id="travelamount">
											</div>
										</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Travel Document</label>
													<input class="form-control" name="traveldocument" id="traveldocument" type="file" multiple>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Hotel Amount</label>
													<input class="form-control" name="Hotelamount" id="Hotelamount" type="text">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Hotel Document</label>
													<input class="form-control " name="Hoteldocument" id="Hoteldocument" type="file" multiple>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Local Travel Amount</label>
													<input class="form-control " name="ltravelamount" id="ltravelamount" type="text">
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Local Travel Document</label>
													<input class="form-control" name="localtravelsocument" id="localtravelsocument" type="file" multiple>
												</div>
											</div>									
											<div class="col-md-6">   
											<div class="input-block mb-3">                                                 
												<label class="col-form-label">Total Amount</label>
													<input class="form-control" type="text" class="form-control" name="totalamount"  id="totalamount" readonly>	
												
											</div>
											</div>
										</div>
									</div>
								
						
									<div class="row">

									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn add-imbursubmit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add travel claim Modal -->
				
	
				<!-- Edit Travel claim Modal -->
				<div id="edit_travelclaim" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Reimbursement</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Travel Id</label>
												<input class="form-control" type="text" name="travelid"  id="travelid">
											</div>
										</div>
                                      
										
									</div>
									<div>
										<div class="row travelrowclaim" id="travelrowclaim">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Travel Amount</label>
												<input class="form-control" type="text" name="travelamount" id="travelamount">
											</div>
										</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Travel Document</label>
													<input class="form-control" name="traveldocument" id="traveldocument" type="file" multiple accept="image,pdf*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Hotel Amount</label>
													<input class="form-control" name="Hotelamount" id="Hotelamount" type="text">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Hotel Document</label>
													<input class="form-control " name="Hoteldocument" id="Hoteldocument" type="file" multiple>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Local Travel Amount</label>
													<input class="form-control " name="ltravelamount" id="ltravelamount" type="text">
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Local Travel Document</label>
													<input class="form-control" name="localtravelsocument" id="localtravelsocument" type="file" multiple>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Perdiem Amount</label>
													<input class="form-control" name="perdiemamount" id="perdiemamount" type="text">
												</div>
											</div>
										
											<div class="col-md-6">       
												<div class="input-block mb-3">                                             
													<label class="col-form-label">Perdiem Other Person</label>
														<input type="text" class="form-control" name="perdiemotherperson"  id="perdiemotherperson">												
														
													
												</div>
											</div>
											<div class="col-md-6">   
												<div class="input-block mb-3">                                                 
													<label class="col-form-label">Other Perdiem Amount</label>
													<input class="form-control" type="text" name="otherperdiemamount"  id="otherperdiemamount">	
												</div>
											</div>
											<div class="col-md-6">   
											<div class="input-block mb-3">                                                 
												<label class="col-form-label">Other Perdiem Document</label>
													<input class="form-control" type="file" multiple name="otherperdiemadocument"  id="otherperdiemadocument">												
													
												
												</div>
											</div>
											<div class="col-md-6">   
											<div class="input-block mb-3">                                                 
												<label class="col-form-label">Total Amount</label>
													<input class="form-control" type="text" class="form-control" name="totalamount"  id="totalamount">	
												
											</div>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn reimbursubmit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Travel claim Modal -->
				
				<!-- Delete Asset Modal -->
				<div class="modal custom-modal fade" id="delete_asset" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Asset</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Asset Modal -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->

		<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>	

<script>
function readFilesDataUrl(input, callback) {
    var len = input.files.length;
    var _files = [];
    var res = [];

    // Function to read a single file
    var readFile = function (filePos) {
        if (!filePos) {
            callback(false, res);
        } else {
            var reader = new FileReader();
            reader.onload = function (e) {
                res.push(e.target.result);
                readFile(_files.shift());
            };
            reader.readAsDataURL(filePos);
        }
    };

    // Populate _files array with input files
    for (var x = 0; x < len; x++) {
        _files.push(input.files[x]);
    }

    // Start reading files
    readFile(_files.shift());
}
$(document).ready(function () {
    // Function to update Total Amount based on Travel Amount, Hotel Amount, and Local Travel Amount
    function updateTotalAmount() {
        const travelAmountVal = parseFloat($('#travelamount').val()) || 0;
        const HotelAmountVal = parseFloat($('#Hotelamount').val()) || 0;
        const ltravelAmountVal = parseFloat($('#ltravelamount').val()) || 0;

        const calculatedTotalAmount = travelAmountVal + HotelAmountVal + ltravelAmountVal;

        // Update the Total Amount input field
        $('#totalamount').val(calculatedTotalAmount.toFixed(2));
    }

    // Update Total Amount on input change for Travel Amount, Hotel Amount, and Local Travel Amount
    $('#travelamount').on('input', updateTotalAmount);
    $('#Hotelamount').on('input', updateTotalAmount);
    $('#ltravelamount').on('input', updateTotalAmount);

    // Initial calculation
    updateTotalAmount();

// Event listener for file input change
$('#traveldocument, #Hoteldocument, #localtravelsocument, #otherperdiemadocument').on('change', function () {
    var input = this;

    // Call the readFilesDataUrl function
    readFilesDataUrl(input, function (err, files) {
        if (err) {
            console.error(err);
            return;
        }

        // Log the base64 encoded strings array
        console.log(files);
    });
});
$('.add-imbursubmit').click(function () {
    const travelid = $('#travelid');
    const travelamount = $('#travelamount');
    const Hotelamount = $('#Hotelamount');
    const ltravelamount = $('#ltravelamount');
    const totalamount = $('#totalamount');
    const traveldoc = $('#traveldocument')[0].files;
    const Hoteldoc = $('#Hoteldocument')[0].files;
    const ltraveldoc = $('#localtravelsocument')[0].files;

    if (travelid.val().trim() === '') {
        triggerAlert('Please enter Travel Id.', 'error');
        travelid.focus();
        return;
    }
    if (travelamount.val() == 0) {
        triggerAlert('Please enter Travel Amount.', 'error');
        travelamount.focus();
        return;
    }
    if (travelamount.val() != 0 && traveldoc.length === 0) {
        triggerAlert('Please upload Travel Amount document.', 'error');
        return;
    }
    if (Hotelamount.val() == 0) {
        triggerAlert('Please enter hotel amount.', 'error');
        Hotelamount.focus();
        return;
    }
    if (Hotelamount.val() != 0 && Hoteldoc.length === 0) {
        triggerAlert('Please enter hotel amount document.', 'error');
        return;
    }
    if (ltravelamount.val().trim() === '') {
        triggerAlert('Please enter local travel amount.', 'error');
        ltravelamount.focus();
        return;
    }
    if (totalamount.val().trim() === '') {
        triggerAlert('Please enter total amount.', 'error');
        totalamount.focus();
        return;
    }

    var formData = new FormData();
    formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
    formData.append("travelid", travelid.val());
    formData.append("travelamount", travelamount.val());
    formData.append("Hotelamount", Hotelamount.val());
    formData.append("ltravelamount", ltravelamount.val());
    formData.append("totalamount", totalamount.val());

    // Append files to formData
    for (let i = 0; i < traveldoc.length; i++) {
        formData.append("traveldoc[]", traveldoc[i]);
    }
    for (let i = 0; i < Hoteldoc.length; i++) {
        formData.append("Hoteldoc[]", Hoteldoc[i]);
    }
    for (let i = 0; i < ltraveldoc.length; i++) {
        formData.append("ltraveldoc[]", ltraveldoc[i]);
    }

    $.ajax({
        url: "/reimbursement",
        type: 'POST',
        processData: false,  
        contentType: false,  
        data: formData,
        success: function (response) {
            if (response.success) {
                triggerAlert('You have successfully requested for reimbursement', 'success');
                location.reload(true);
            } else {
                triggerAlert('Something went wrong!', 'error');
            }
        },
        error: function (error) {
            triggerAlert('Something went wrong.', 'error');
        }
    });
});

});

</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/reimbursement.blade.php ENDPATH**/ ?>