@include('frontend.include.head')
	<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
	<style>
		.pdfmodallink{
			width: 100%;
			header:100%;
			display: block;
			z-index: 999;
			position: relative;
		}
		.embedclick{
			position: relative;
			z-index: -1;
		}

	</style>
			<!-- Main Wrapper -->
			<div class="main-wrapper">
			
				<!-- Header -->
				@include('frontend.include.header')
				<!-- /Header -->
				
				<!-- Sidebar -->
				@include('frontend.include.sidebar')

				<!-- /Sidebar -->
				
				<!-- Page Wrapper -->
				<div class="page-wrapper">
				
					<!-- Page Content -->
					<div class="content container-fluid">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="page-title">Local Pay Reimbursement</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
										<li class="breadcrumb-item active">Local Pay Reimbursement </li>
									</ul>
								</div>
								<div class="col-auto float-end ms-auto">
									<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa-solid fa-plus"></i> Add</a>
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
											
													<!-- Travel ID Column -->
													<th>ID</th>                                        
                                                    <th>Date</th>
                                                    <th>Reason</th>
                                                    <th>Purchase By</th>
                                                    <th>Amount</th>
                                                    <th>Document</th>
													<th class="text-center">Status</th>
													<th class="text-end">Action</th>
											</tr>
										</thead>
										<tbody>
											@if(!empty($get_ltr_details))
												@foreach($get_ltr_details as $travel_details)
													<tr>
														<td>{{strtoupper($travel_details->ltrid)}}</td>
														<td>{{$travel_details->date}}</td>
														<td>{{$travel_details->reason}}</td>
														<td>{{$travel_details->	paidby}}</td>
														<td>{{$travel_details->amount}}</td>
														<td>
															@if($travel_details->doc)
																@if(pathinfo($travel_details->doc, PATHINFO_EXTENSION) == 'pdf')
																	<a class="pdfmodallink" href="javascript:void(0)" type="button" data-bs-toggle="modal" data-bs-target="#pdfModal" data-src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}">
																		<embed class="embedclick" src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}" type="application/pdf" width="200" height="200" />
																	</a>
																@elseif(in_array(pathinfo($travel_details->doc, PATHINFO_EXTENSION), ['doc', 'docx']))
																	<a class="pdfmodallink" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#docModal" data-src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}">
																		<img class="embedclick" src="word_icon.png" alt="Word Document" width="200" height="200">
																	</a>
																@elseif(in_array(pathinfo($travel_details->doc, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
																	<a class="pdfmodallink" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}">
																		<img class="embedclick" src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}" alt="Image" width="200" height="200">
																	</a>
																@else
																	Unsupported File Type
																@endif
															@endif
														</td>

													
														<td class="text-center">
																<p class="dropdown-item mb-0">
																	@if($travel_details->status == 'A')
																		<i class="fa-regular fa-circle-dot text-success"></i> Approved
																	@elseif($travel_details->status == 'R')
																		<i class="fa-regular fa-circle-dot text-danger"></i> Reimbursement
																	
																	@else
																		<i class="fa-regular fa-circle-dot text-info"></i> Pending
																	@endif
																</p>
															</td>
															<td class="text-end">
																<div class="dropdown dropdown-action">
																	<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a class="dropdown-item trvdel" href="javascript:void(0)" data-bs-toggle="modal"  data-id="{{$travel_details->id}}" data-bs-target="#delete_travel"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																	</div>
																</div>
															</td> 
														<!-- Travel Details Column -->
													</tr>

												<div class="modal fade custom-modal" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true" >
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="pdfModalLabel">PDF Document</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<embed src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}" type="application/pdf" width="100%" height="500px" />
															</div>
														</div>
													</div>
												</div>

												<!-- Modal for Word Document -->
												<div class="modal fade" id="docModal" tabindex="-1" role="dialog" aria-labelledby="docModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="docModalLabel">Word Document</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<iframe src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}" frameborder="0" width="100%" height="500px"></iframe>
															</div>
														</div>
													</div>
												</div>

												<!-- Modal for Image -->
												<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="imageModalLabel">Image</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<img src="{{url('public/uploads/localpay')}}/{{$travel_details->doc}}" width="100%" />
															</div>
														</div>
													</div>
												</div>

												@endforeach
											@else
												Data Not Found
											@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Content -->
					<!-- Page Content -->
				
				
			

				
				
				
					<!-- Add travel Modal -->
					<div id="add_asset" class="modal custom-modal fade" role="dialog">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Local Pay Reimbursement</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="travelForm" action="javascript:void(0)" method="post" enctype='multipart/form-data'>
										<div class="row">
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Purchase Date</label>
													<input class="form-control" name="pdate" id="pdate" type="date" value="" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Purchase Items</label>
													<textarea class="form-control" name="pt" id="pt" type="text" placeholder="Purchase Items" required></textarea>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Purchase By</label>
													<input class="form-control" name="pb" id="pb" type="text" placeholder="Purchase By" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Purchase Amount</label>
													<input class="form-control" name="pa" id="pa" type="text" placeholder="Purchase Amount" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Purchase Documents</label>
													<input class="form-control" name="pd" id="pd" type="file" placeholder="Purchase Documents" required>
												</div>
											</div>
										</div>
                                        <div class="submit-section">
											<button type="button" class="btn btn-primary submit-btn Purchasedetailssubmit">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Add travel Modal -->
			
					
					<!-- Edit Travel Modal -->
					<!-- <div id="edit_asset" class="modal custom-modal fade" role="dialog">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Travel</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form>
										<div class="row">
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Name</label>
													<input class="form-control" type="text">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-block mb-3">
													<label class="col-form-label">Travel Days</label>
													<input class="form-control" type="text">
												</div>
											</div>
											
										</div>
										<div>

											<div class="text-end d-flex justify-content-between">
												<div class="travellags modal-header">
													<h5 class="modal-title">Travel Lags</h5>
												</div>
												
											</div>
											
											<div class="row" >
												
												
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel Form</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel To</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Date From</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Date to</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Travel Mode</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Join Date</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
											
												<div class="col-md-3">                                                    
													<label class="custom_check ps-4 mt-5"> Personal Work
														<input type="checkbox" name=""  id="">												
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>
										<div>
											<div class="text-end d-flex justify-content-between">
												<div class="travellags modal-header">
													<h5 class="modal-title">Hotel</h5>
												</div>
												
											</div>

											<div class="row" >

												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Hotel Name</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Hotel Address</label>
														<input class="form-control" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Booking Date From</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
												<div class="col-md-3">
													<div class="input-block mb-3">
														<label class="col-form-label">Booking Date to</label>
														<input class="form-control datetimepicker" name="" id="" type="text">
													</div>
												</div>
											</div>

										</div>
							
										<div class="row">
											
										
								
											
											
										</div>
										<div class="submit-section">
											<button class="btn btn-primary submit-btn">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div> -->
					<!-- Edit Travel Modal -->
			
					
					<!-- Delete travel Modal -->
					<div class="modal custom-modal fade" id="delete_travel" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body">
									<div class="form-header">
										<h3>Delete Local Travel Details</h3>
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
					<!-- /Delete Travel Modal -->
					
				</div>
				<!-- /Page Wrapper -->
				
			</div>
			<!-- /Main Wrapper -->

			@include('frontend.include.footer')
			<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
			<script>
  
        $(document).ready(function(){
        $('.pdfmodallink').on('click', function(){
            var src = $(this).data('src');
            var modalId = $(this).attr('data-bs-target');
            var modalBody = $(modalId).find('.modal-body');
            
            if ($(modalId).hasClass('show')) {
                $(modalId).removeClass('show');
            }

            modalBody.empty();
            
            if (src.endsWith('.pdf')) {
                modalBody.html('<embed src="' + src + '" type="application/pdf" width="100%" height="500px" />');
            } else if (src.endsWith('.doc') || src.endsWith('.docx')) {
                modalBody.html('<iframe src="' + src + '" frameborder="0" width="100%" height="500px"></iframe>');
            } else if (src.endsWith('.jpg') || src.endsWith('.jpeg') || src.endsWith('.png') || src.endsWith('.gif')) {
                modalBody.html('<img src="' + src + '" width="100%" height="500px" />');
            } else {
                modalBody.html('Unsupported File Type');
            }

            $(modalId).addClass('show');
        });
    });
   
</script>
			
			<script>

			$(document).ready(function() {
				$('.Purchasedetailssubmit').click(function(event) {
					const pdate = $('#pdate');
					const pt = $('#pt');
					const pb = $('#pb');
					const pa = $('#pa');
					const pd = $('#pd');

					if (pdate.val().trim() === '') {
						triggerAlert('Please enter your Purchase date.', 'error');
						pdate.focus();
						return;
					}
					if (pt.val().trim() === '') {
						triggerAlert('Please enter your Purchase reason.', 'error');
						pt.focus();
						return;
					}
					if (pb.val().trim() === '') {
						triggerAlert('Please enter your Purchase By.', 'error');
						pb.focus();
						return;
					}
					if (pa.val().trim() === '') {
						triggerAlert('Please enter your Purchase amount.', 'error');
						pa.focus();
						return;
					}
					if (pd.val().trim() === '') {
						triggerAlert('Please select your Purchase document.', 'error');
						pd.focus();
						return;
					}

					const formData = new FormData($('#travelForm')[0]);

					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					formData.append('_token', csrfToken);
					formData.append('type', 'adltr');

					$.ajax({
						url: "/local-pay-reimbursement", 
						type: 'POST',
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							if (response.success) {
								triggerAlert('You have successfully added Travel Details', 'success');
								location.reload(true); 
							} else {
								triggerAlert('Error: ' + response.message, 'error');
							}
						},
						error: function(error) {
							triggerAlert('Error: ' + error.responseText, 'error');
						}
					});
				});
			});



			$(document).ready(function(){

				var travelIdToDelete;
				
				$('.trvdel').click(function(){
					travelIdToDelete = $(this).data('id');
				});

				// Handle Delete button click
				$('#delete_travel .continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/localtravel',
						method: 'POST',
						data: {
							"_token": csrfToken,
							travelid: travelIdToDelete,
							type :"deltravel"
						},
						success: function(response){
							if (response.success) {
								triggerAlert('You have successfully deleted the Travel Details', 'success');
								location.reload(true); 
							} else {
								triggerAlert('Error: ' + response.message, 'error');
							}
						},
						error: function(error){
							triggerAlert('Error: ' + response.message, 'error');
						}
					});
				});



			});
		</script>

