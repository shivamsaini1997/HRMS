@include('admin.includes.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			@include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')
			
		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Office Location</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Assets</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_asset"><i class="fa-solid fa-plus"></i> Add Location</a>
							</div>
						</div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>Office Address</th>
											<th>Office City</th>
											<th>Office Longitude</th>
											<th>Office Latitude</th>
											<th>Threshold</th>
											<th class="text-center">Action</th>
											<!-- <th class="text-end"></th> -->
										</tr>
									</thead>
									<tbody>
									@if(!empty($all_location))
										@foreach($all_location as $location)
											<tr>
												<td>{{$location->address}}</td>
												<td>{{$location->city}}</td>
												<td>{{$location->officelat}}</td>
												<td>{{$location->officelng}}</td>
												<td>{{$location->threshold}}</td>
												
												<td class="text-end">
													<a class="dl-esse" href="#" data-bs-toggle="modal" data-id="{{$location->id}}" data-bs-target="#delete_asset"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
												</td>
											</tr>
										@endforeach
									@else
									No Data Found
									@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
			
				<!-- Add Location Modal -->
				<div id="add_asset" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Location</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0);"  method="post">
									<div class="row">
										<div class="col-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Office Address</label>
												<input class="form-control" type="text" name="officeaddress" id="officeaddress">
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Office City</label>
												<input class="form-control" type="text"  name="officecity" id="officecity">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Office Longitude</label>
												<input class="form-control " type="text"  name="officelongitude" id="officelongitude"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Office Latitude</label>
												<input class="form-control" type="text"  name="officelatitude" id="officelatitude"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Threshold</label>
												<input class="form-control" type="text"  name="threshold" id="threshold"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
									
										
										
									</div>
								
									<div class="submit-section">
										<button class="btn btn-primary submit-btn location-sub">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Location Modal -->
				
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
										<div class="col-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Office Address</label>
												<input class="form-control" type="text" name="an" id="an">
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Office City</label>
												<input class="form-control" type="text"  name="ai" id="ai">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Office Longitude</label>
												<input class="form-control " type="text"  name="pd" id="pd"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Office Latitude</label>
												<input class="form-control" type="text"  name="pf" id="pf"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Threshold</label>
												<input class="form-control" type="text"  name="mid" id="mid" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
		@include('admin.includes.footer')
		<script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
		<script>
		$(document).ready(function(){
            $('.location-sub').click(function(){
                    event.preventDefault();
					
					const officeaddress = $('#officeaddress');
					const officecity = $('#officecity');
					const officelongitude = $('#officelongitude');
					const officelatitude = $('#officelatitude');
					const threshold = $('#threshold');
                    
					if (officeaddress.val().trim() === '') {
						triggerAlert('Please enter your office address.','error');
						officeaddress.focus();
						return;
					}
					if (officecity.val().trim() === '') {
						triggerAlert('Please enter your office city.','error');
						officecity.focus();
						return;
					}
					if (officelongitude.val().trim() === '') {
						triggerAlert('Please enter office longitude.','error');
						officelongitude.focus();
						return;
					}
					if (officelatitude.val().trim() === '') {
						triggerAlert('Please enter officel atitude.','error');
						officelatitude.focus();
						return;
					}
					if (threshold.val().trim() === '') {
						triggerAlert('Please enter threshold.','error');
						threshold.focus();
						return;
					}
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/add-location',
						method: 'POST',
						data: {
							"_token": csrfToken,
							officeaddress: officeaddress.val(),
							officecity: officecity.val(),
							officelongitude: officelongitude.val(),
							officelatitude: officelatitude.val(),
							threshold: threshold.val(),							
						},
						success: function(data){
							if(data.success){
								triggerAlert('You have successfully add office location', 'success');						
								location.reload(true);
							}else{
								triggerAlert('Something went wrong.', 'error');
							}
							
						},
						error: function(error){
							triggerAlert('Something went wrong.', 'error');
						}
					});
				});


				var locationIdToDelete;
				
				$('.dl-esse').click(function(){
					locationIdToDelete = $(this).data('id');
				});

				// Handle Delete button click
				$('.continue-btn').click(function(){
					var csrfToken = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: '/delete-location',
						method: 'POST',
						data: {
							"_token": csrfToken,
							id: locationIdToDelete,
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
		</script>