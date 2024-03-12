<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
<!-- Place the first <script> tag in your HTML's <head> -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


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
								<h3 class="page-title">Announcement </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Announcement </li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_announcement"><i class="fa-solid fa-plus"></i> Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Date & Time</th>
											<!-- <th>Announcement Image</th> -->
											<th>Announcement Title</th>
											<th>Announcement Description</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($get_announcement)): ?>
											<?php $__currentLoopData = $get_announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($announcement->id); ?></td>
												<td><?php echo e($announcement->created_at); ?></td>
												<!-- <td>-</td> -->
												<td class="announce-title-td announce-td"><?php echo $announcement->title; ?></td>
												<td class="announcment-dec-td announce-td"><?php echo $announcement->description; ?></td>
												<td class="text-end">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item ea" href="#" data-bs-toggle="modal" data-id="<?php echo e($announcement->id); ?>" data-bs-target="#edit_announcement"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
															<a class="dropdown-item dl-anc" href="#" data-id="<?php echo e($announcement->id); ?>" data-bs-toggle="modal" data-bs-target="#delete_announcement"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>

											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
										 No data found
										<?php endif; ?>
								
									</tbody>
								</table>
							</div>
						</div>
					</div>
                
                </div>
            </div>

        </div>
                <div id="add_announcement" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Announcement</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="javascript:void(0)" method="POST">
									<div class="row">
										<!-- <div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Announcement Image</label>
												<input class="form-control" name="imageannouncement" id="imageannouncement" type="file">
											</div>
										</div> -->
                                        <div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Announcement Title</label>
												<input class="form-control"  name="annoucmenttitle" id="annoucmenttitle"  type="text">
											</div>
										</div>
                                        <div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Announcement Description</label>
												
                                                <textarea  name="annoucmentdes" id="summernote" rows="8" ></textarea>

											</div>
										</div>
										
									</div>
								
									<div class="submit-section">
										<button class="btn btn-primary submit-btn announcementSubmit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add travel claim Modal -->

        		<!-- Edit Travel claim Modal -->
				<div id="edit_announcement" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Announcement</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                            <form action="javascript:void(0)" method="POST">
							<input class="form-control" name="eid" id="eid" hidden>
									<div class="row">
										<!-- <div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Announcement Image</label>
												<input class="form-control" name="imageannouncement1" id="imageannouncement1" type="file">
											</div>
										</div> -->
                                        <div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Announcement Title</label>
												<input class="form-control" name="eannoucmenttitle" id="eannoucmenttitle" type="text">
											</div>
										</div>
                                        <div class="col-md-6">
										<div class="input-block mb-3">
												<label class="col-form-label">Announcement Description</label>
                                                <textarea  name="eannoucmentdes" id="summernote" rows="8" ></textarea>

											</div>
											
										</div>
										
									</div>
								
									<div class="submit-section">
										<button class="btn btn-primary submit-btn edit-announ">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Travel claim Modal -->
				
				<!-- Delete Asset Modal -->
				<div class="modal custom-modal fade" id="delete_announcement" role="dialog">
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


                <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
				<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
	$(document).ready(function(){
		$('.announcementSubmit').click(function(event) {
			event.preventDefault();
			
			const annoucmenttitle = $('#annoucmenttitle');
			const annoucmentdes = $('#summernote');
			
			
			if (annoucmenttitle.val().trim() === '') {
				triggerAlert('Please Enter annoucment title .','error');
				annoucmenttitle.focus();
				return;
			}
			if (annoucmentdes.val().trim() === '') {
				triggerAlert('Please enter annoucment description .','error');
				annoucmentdes.focus();
				return;
			}
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/announcement", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					annoucmenttitle: annoucmenttitle.val(),
					annoucmentdes: annoucmentdes.val(),
					type:'add',
				},
				success: function(response) {
					if (response.success) {
						triggerAlert('You have successfully added Annoucment', 'success');
					
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
		$('.ea').click(function(){
		var emid = $(this).data('id');
		var csrfToken = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url: '/announcement',
			method: 'post',
			data: { 
				"_token": csrfToken,
				"emid": emid,
				"type" :"get"
				},
				success: function(data){
				console.log(data);
					$('#edit_announcement #eannoucmenttitle').val(data.get_ann.title);
					$('#edit_announcement #summernote').val(data.get_ann.description);
					$('#edit_announcement #eid').val(data.get_ann.id);
					
					
					$('#edit_announcement').modal('show');
				},
				error: function(error){
					triggerAlert('Somthings went wrong.','error');
				}
			});
		});
		$('.edit-announ').click(function(event) {
			event.preventDefault();
			
			const eannoucmenttitle = $('#eannoucmenttitle');
			const eannoucmentdes = $('#summernote');
			const eid= $('#eid').val();
			
			if (eannoucmenttitle.val().trim() === '') {
				triggerAlert('Please Enter annoucment title .','error');
				eannoucmenttitle.focus();
				return;
			}
			if (eannoucmentdes.val().trim() === '') {
				triggerAlert('Please enter annoucment description .','error');
				eannoucmentdes.focus();
				return;
			}
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/announcement", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					annoucmenttitle: eannoucmenttitle.val(),
					annoucmentdes: eannoucmentdes.val(),
					eid:eid,
					type:'edit',
				},
				success: function(response) {
					if (response.success) {
						triggerAlert('You have successfully edit Annoucment', 'success');
					
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

		var announcementIdToDelete;
				
		$('.dl-anc').click(function(){
			announcementIdToDelete = $(this).data('id');
		});

		$('.continue-btn').click(function(){
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: '/announcement',
				method: 'POST',
				data: {
					"_token": csrfToken,
					ancid: announcementIdToDelete,
					type :"del_anc"

				},
				success: function(data){
					if (data.success) {
						triggerAlert('You have successfully deleted the Announcement', 'success');
						$('#delete_announcement .btn-close').click();
						location.reload(true);
					} else {
						triggerAlert('Somthing went wrong!', 'error');
					}
					
				},
				error: function(error){
					triggerAlert('Something went wrong.', 'error');
				}
			});
		});

});
$(document).ready(function() {
  $('#summernote').summernote();
});
</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/announcement.blade.php ENDPATH**/ ?>