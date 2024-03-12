@include('admin.includes.head')

		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            @include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')

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
										<th>Perdiem Amount</th>
										<th>Perdiem Other Person</th>
										<th>Other Perdiem Amount</th>
										<th>Other Perdiem Document</th>
										<th>Total Amount</th>
										<th class="text-center">Status</th>
								
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>CC00002</td>
										<td>6000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png"  class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
									
										<td>4000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
										<td>400</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt=""
												></a>
										</td>
										<td>1000</td>
										<td>4</td>
										<td>4000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
										<td>15400</td>
										<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa-regular fa-circle-dot text-success"></i> Approved
													</a>
													<div class="dropdown-menu dropdown-menu-right" style="">
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-purple"></i> New</a>
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-info"></i> Pending</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approve_leave"><i class="fa-regular fa-circle-dot text-success"></i> Approved</a>
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Declined</a>
													</div>
												</div>
											</td>
										
									</tr>
									<tr>
										<td>CC00002</td>
										<td>6000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png"  class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
									
										<td>4000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
										<td>400</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt=""
												></a>
										</td>
										<td>1000</td>
										<td>4</td>
										<td>4000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
										<td>15400</td>
										<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa-regular fa-circle-dot text-danger"></i> Declined
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-purple"></i> New</a>
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-info"></i> Pending</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approve_leave"><i class="fa-regular fa-circle-dot text-success"></i> Approved</a>
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Declined</a>
													</div>
												</div>
											</td>
										
									</tr>
									<tr>
										<td>CC00002</td>
										<td>6000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png"  class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
									
										<td>4000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
										<td>400</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt=""
												></a>
										</td>
										<td>1000</td>
										<td>4</td>
										<td>4000</td>
										<td>
											<a href="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="image-popup">
												<img style="width:50px; height:50px" src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" alt="">
											</a>
										</td>
										<td>15400</td>
										<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fa-regular fa-circle-dot text-success"></i> Approved
													</a>
													<div class="dropdown-menu dropdown-menu-right" style="">
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-purple"></i> New</a>
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-info"></i> Pending</a>
														<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approve_leave"><i class="fa-regular fa-circle-dot text-success"></i> Approved</a>
														<a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Declined</a>
													</div>
												</div>
											</td>
										
									</tr>
									
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

		@include('admin.includes.footer')
		

