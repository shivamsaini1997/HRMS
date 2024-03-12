<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Assets</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Assets</li>
								</ul>
							</div>
							<div class="col-auto">
							<!-- <label class="col-form-label">Select Organization</label> -->
								<select class="form-control" name="org" id="org">
									<option value="">Select Organization</option>
									<?php $__currentLoopData = $departmentsByOrganization; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgId => $orgData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($orgData['org_name']); ?>"><?php echo e($orgData['org_name']); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa-solid fa-plus"></i> Add Asset</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<!-- <div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="input-block mb-3 form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="input-block mb-3 form-focus select-focus">
								<select class="select floating"> 
									<option value=""> -- Select -- </option>
									<option value="0"> Pending </option>
									<option value="1"> Approved </option>
									<option value="2"> Returned </option>
								</select>
								<label class="focus-label">Status</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-4">  
						   <div class="row">  
							   <div class="col-md-6 col-sm-6">  
									<div class="input-block mb-3 form-focus">
										<div class="cal-icon">
											<input class="form-control floating datetimepicker" type="text">
										</div>
										<label class="focus-label">From</label>
									</div>
								</div>
							   <div class="col-md-6 col-sm-6">  
									<div class="input-block mb-3 form-focus">
										<div class="cal-icon">
											<input class="form-control floating datetimepicker" type="text">
										</div>
										<label class="focus-label">To</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="d-grid">
								<a href="#" class="btn btn-success"> Search </a>  
							</div>  
						</div>     
                    </div> -->
					<!-- /Search Filter -->
					
					<div class="row filterdata">
						<div class="col-md-12 empdata">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Asset User</th>
											<th>Asset Name</th>
											<th>Asset Id</th>
											<th>Issue Date</th>
											<th>Purchase From</th>
											<th>Model Id</th>
											<th>Serial Number</th>
											<th>Description</th>
											<th>Returned Date</th>
											<th class="text-center">Status</th>
											<th class="text-end"></th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($all_assets)): ?>
											<?php $__currentLoopData = $all_assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($assets->firstname); ?></td>
													<td>
														<strong><?php echo e($assets->assetname); ?></strong>
													</td>
													<td><?php echo e($assets->assetid); ?></td>
													<td><?php echo e($assets->purchase_date); ?></td>
													<td><?php echo e($assets->purchase_from); ?></td>
													<td><?php echo e($assets->modelid); ?></td>
													<td><?php echo e($assets->serial_number); ?></td>
													<td><?php echo e($assets->description); ?></td>
													<td><?php echo e($assets->updated_at); ?></td>
													<td class="text-center">
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
																<?php if($assets->status=='A'): ?>
																	<i class="fa-regular fa-circle-dot text-success"></i> Approved
																<?php elseif($assets->status=='P'): ?>
																	<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																<?php elseif($assets->status=='R'): ?>
																	<i class="fa-regular fa-circle-dot text-info"></i> Returned
																<?php elseif($assets->status=='D'): ?>
																	<i class="fa-regular fa-circle-dot text-info"></i> Damaged
																<?php endif; ?>
															</a>

															<div class="dropdown-menu dropdown-menu-right status-dropdown">
																<a class="dropdown-item" asset-id="<?php echo e($assets->id); ?>" uid="<?php echo e($assets->userid); ?>" data-status="P" href="#">Pending</a>
																<a class="dropdown-item" asset-id="<?php echo e($assets->id); ?>" uid="<?php echo e($assets->userid); ?>" data-status="A" href="#">Approved</a>
																<a class="dropdown-item" asset-id="<?php echo e($assets->id); ?>" uid="<?php echo e($assets->userid); ?>" data-status="R" href="#">Returned</a>
																<a class="dropdown-item" asset-id="<?php echo e($assets->id); ?>" uid="<?php echo e($assets->userid); ?>" data-status="D" href="#">Damaged</a>
															</div>
														</div>
													</td>
													<td class="text-end">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item edit-ase" href="#" data-bs-toggle="modal" data-bs-target="#edit_asset" data-id="<?php echo e($assets->id); ?>" data-us-id="<?php echo e($assets->userid); ?>"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
																<a class="dropdown-item dl-esse" href="#" data-bs-toggle="modal" data-bs-target="#delete_asset" data-id="<?php echo e($assets->id); ?>" data-us-id="<?php echo e($assets->userid); ?>"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
															</div>
														</div>
													</td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											Data Not Found
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
			
				<!-- Add Asset Modal -->
				<div id="add_asset" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Asset</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0);" id="add-asset" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asset Name</label>
												<input class="form-control" type="text" name="an" id="an">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asset Id</label>
												<input class="form-control" type="text"  name="ai" id="ai">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Issue Date</label>
												<input class="form-control datetimepicker" type="text"  name="pd" id="pd">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Purchase From</label>
												<input class="form-control" type="text"  name="pf" id="pf">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Model</label>
												<input class="form-control" type="text"  name="mid" id="mid">
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Serial Number</label>
												<input class="form-control" type="text"  name="sn" id="sn">
											</div>
										</div>
										
									</div>
									<div class="row">
										
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asset User</label>
												<select class="form-select form-control"  name="en" id="en">
													<option value=""> -- Select Employee -- </option>
													<?php $__currentLoopData = $all_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($employee->userid); ?>" dataid="<?php echo e($employee->email); ?>"><?php echo e($employee->firstname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Status</label>
												<select class="form-select form-control"  name="stu" id="stu">
													<option value=""> -- Select Status -- </option>
													<option value="P">Pending</option>
													<option value="A">Approved</option>
													<option value="R">Returned</option>
													<option value="D">Damaged</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Description</label>
												<textarea class="form-control"  name="des" id="des"></textarea>
											</div>
										</div>
										
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn asset-sub">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Asset Modal -->
				
				<!-- Edit Asset Modal -->
				<div id="edit_asset" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Asset</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="javascript:void(0);" id="edit-asset" method="post">
							<input class="form-control" type="hidden" name="aid" id="aid">
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asset Name</label>
												<input class="form-control" type="text" name="ean" id="ean">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asset Id</label>
												<input class="form-control" type="text"  name="eai" id="eai">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Issue Date</label>
												<input class="form-control datetimepicker" type="text"  name="epd" id="epd">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Purchase From</label>
												<input class="form-control" type="text"  name="epf" id="epf">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Model</label>
												<input class="form-control" type="text"  name="emid" id="emid">
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Serial Number</label>
												<input class="form-control" type="text"  name="esn" id="esn">
											</div>
										</div>
										
									</div>
									<div class="row">
										
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asset User</label>
												<select class="form-select form-control"  name="een" id="een">
													<option value=""> -- Select Employee -- </option>
													<?php $__currentLoopData = $all_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($employee->userid); ?>" dataid="<?php echo e($employee->email); ?>"><?php echo e($employee->firstname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Status</label>
												<select class="form-select form-control"  name="estu" id="estu">
													<option value=""> -- Select Status -- </option>
													<option value="P">Pending</option>
													<option value="A">Approved</option>
													<option value="R">Returned</option>
													<option value="D">Damaged</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Description</label>
												<textarea class="form-control"  name="edes" id="edes"></textarea>
											</div>
										</div>
										
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn edit-asset-sub">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Asset Modal -->
				
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
		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
		<script>
		$(document).ready(function(){

			$('#org').change(function() {
				var organization = $(this).val();
				$.ajax({
					url: '/admin/employee-assets', 
					method: 'GET',
					data: { organization: organization, asset: 'asset'},
					success: function(response) {
						var empdata = $(response).find('.empdata');
						$('.filterdata').html(empdata);
					}
				});
			});

			$('#add-asset').submit(function(event) {
					event.preventDefault();
					
					const assetname = $('#an');
					const assetid = $('#ai');
					const purchase_date = $('#pd');
					const purchase_from = $('#pf');
					const modelid = $('#mid');
					const serial_number = $('#sn');
					const userid = $('#en');
					const status = $('#stu');
					const description =$('#des');

					const selectedEmployee = userid.find(':selected');
					const employeeUserId = selectedEmployee.val();
					const employeeEmail = selectedEmployee.attr('dataid');

					
					if (assetname.val().trim() === '') {
						triggerAlert('Please enter your asset name.','error');
						assetname.focus();
						return;
					}
					if (assetid.val().trim() === '') {
						triggerAlert('Please enter your asset id.','error');
						assetid.focus();
						return;
					}
					if (purchase_date.val().trim() === '') {
						triggerAlert('Please enter your asset purchase date.','error');
						purchase_date.focus();
						return;
					}
					if (purchase_from.val().trim() === '') {
						triggerAlert('Please enter your asset purchase from.','error');
						purchase_from.focus();
						return;
					}
					if (modelid.val().trim() === '') {
						triggerAlert('Please enter your asset model id.','error');
						modelid.focus();
						return;
					}
					if (serial_number.val().trim() === '') {
						triggerAlert('Please enter your asset serial number.','error');
						serial_number.focus();
						return;
					}
					if (userid.val().trim() === '') {
						triggerAlert('Please select your asset user.','error');
						userid.focus();
						return;
					}
					if (status.val().trim() === '') {
						triggerAlert('Please select asset status .','error');
						status.focus();
						return;
					}
					if (description.val().trim() === '') {
						triggerAlert('Please select asset description .','error');
						description.focus();
						return;
					}
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: "/employee-assets", 
						type: 'POST',
						data: {
							"_token": csrfToken,
							assetname: assetname.val(),
							assetid: assetid.val(),
							purchase_date: purchase_date.val(),
							purchase_from: purchase_from.val(),
							modelid: modelid.val(),
							serial_number: serial_number.val(),
							userid: userid.val(),
							email: employeeEmail,
							status: status.val(),
							description: description.val(),
							"type" :"add_asset"
						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully assined employee assets', 'success');
								$('#add_asset .btn-close').click();
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

				$('.status-dropdown .dropdown-item').on('click', function(event) {
					event.preventDefault();
					
					const selectedStatus = $(this).data('status');
					const assetId = $(this).attr('asset-id');
					const userId = $(this).attr('uid');
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/update-employee-assets',
						type: 'POST',
						data: {
							"_token": csrfToken,
							"assetId": assetId,
							"userId": userId,
							"status": selectedStatus,
							"type" :"update_status"
						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully changed employee assets status', 'success');
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

				$('.edit-ase').click(function(){
					var empId = $(this).data('id');
					var uid = $(this).data('us-id');
					
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/update-employee-assets',
						method: 'post',
						data: { 
							"_token": csrfToken,
							"userId": uid,
							"empId":empId,
							"type" :"get_asset_details"
						 },
						success: function(data){
						console.log(data);
							$('#edit_asset #ean').val(data.check_asset.assetname);
							$('#edit_asset #eai').val(data.check_asset.assetid);
							$('#edit_asset #epd').val(data.check_asset.purchase_date);
							$('#edit_asset #epf').val(data.check_asset.purchase_from);	
							
							$('#edit_asset #emid').val(data.check_asset.modelid);
							$('#edit_asset #esn').val(data.check_asset.serial_number);
							$('#edit_asset #een').val(data.check_asset.userid);
							$('#edit_asset #estu').val(data.check_asset.status);
							$('#edit_asset #edes').val(data.check_asset.description);
							$('#edit_asset #aid').val(data.check_asset.id);
							
							$('#edit_asset').modal('show');
						},
						error: function(error){
							triggerAlert('Somthings went wrong.','error');
						}
					});
				});

				$('#edit-asset').submit(function(event) {
					event.preventDefault();
					
					const assetname = $('#ean');
					const assetid = $('#eai');
					const purchase_date = $('#epd');
					const purchase_from = $('#epf');
					const modelid = $('#emid');
					const serial_number = $('#esn');
					const userid = $('#een');
					const status = $('#estu');
					const description =$('#edes');
					const aid =$('#aid');

					const selectedEmployee = userid.find(':selected');
					const employeeUserId = selectedEmployee.val();
					const employeeEmail = selectedEmployee.attr('dataid');

					
					if (assetname.val().trim() === '') {
						triggerAlert('Please enter your asset name.','error');
						assetname.focus();
						return;
					}
					if (assetid.val().trim() === '') {
						triggerAlert('Please enter your asset id.','error');
						assetid.focus();
						return;
					}
					if (purchase_date.val().trim() === '') {
						triggerAlert('Please enter your asset purchase date.','error');
						purchase_date.focus();
						return;
					}
					if (purchase_from.val().trim() === '') {
						triggerAlert('Please enter your asset purchase from.','error');
						purchase_from.focus();
						return;
					}
					if (modelid.val().trim() === '') {
						triggerAlert('Please enter your asset model id.','error');
						modelid.focus();
						return;
					}
					if (serial_number.val().trim() === '') {
						triggerAlert('Please enter your asset serial number.','error');
						serial_number.focus();
						return;
					}
					if (userid.val().trim() === '') {
						triggerAlert('Please select your asset user.','error');
						userid.focus();
						return;
					}
					if (status.val().trim() === '') {
						triggerAlert('Please select asset status .','error');
						status.focus();
						return;
					}
					if (description.val().trim() === '') {
						triggerAlert('Please select asset description .','error');
						description.focus();
						return;
					}
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: "/update-employee-assets", 
						type: 'POST',
						data: {
							"_token": csrfToken,
							assetname: assetname.val(),
							assetid: assetid.val(),
							purchase_date: purchase_date.val(),
							purchase_from: purchase_from.val(),
							modelid: modelid.val(),
							serial_number: serial_number.val(),
							userid: userid.val(),
							email: employeeEmail,
							status: status.val(),
							description: description.val(),
							aid:aid.val(),
							"type" :"update_asset_info"

						},
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully edit employee assets', 'success');
								$('#edit_asset .btn-close').click();
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

				var assetIdToDelete;
				var assetUserIdToDelete;
				$('.dl-esse').click(function(){
					assetIdToDelete = $(this).data('id');
					assetUserIdToDelete = $(this).data('us-id');
				});

				// Handle Delete button click
				$('.continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/update-employee-assets',
						method: 'POST',
						data: {
							"_token": csrfToken,
							asetid: assetIdToDelete,
							userid: assetUserIdToDelete,
							"type" :"del_asset"

						},
						success: function(data){
							console.log(data);
							triggerAlert('You have successfully deleted the Asset', 'success');
							$('#delete_asset .btn-close').click();
							location.reload(true);
						},
						error: function(error){
							triggerAlert('Something went wrong.', 'error');
						}
					});
				});

		});
		</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/assets.blade.php ENDPATH**/ ?>