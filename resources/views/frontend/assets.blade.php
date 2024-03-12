@include('frontend.include.head')

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
								<h3 class="page-title">Assets</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Assets</li>
								</ul>
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
											<th>Asset User</th>
											<th>Asset Name</th>
											<th>Asset Id</th>
											<th>Asset Isuue</th>
										
											<th class="text-center">Status</th>
										
										</tr>
									</thead>
									<tbody>
										@if(!empty($get_assets))
											@foreach($get_assets as $assets)
												<tr>
													<td>{{$assets->firstname}}</td>
													<td>
														<strong>{{$assets->assetname}}</strong>
													</td>
													<td>#{{$assets->assetid}}</td>
													<td>{{$assets->purchase_date}}</td>
												
													<td class="text-center">
													<a class="dropdown-item" href="#">
											
														@if($assets->status=='A')
															<i class="fa-regular fa-circle-dot text-success"></i> Approved
														@elseif($assets->status=='P')
															<i class="fa-regular fa-circle-dot text-danger"></i> Pending
														@elseif($assets->status=='R')
															<i class="fa-regular fa-circle-dot text-info"></i> Returned
														@elseif($assets->status=='D')
															<i class="fa-regular fa-circle-dot text-info"></i> Damaged
														@endif
													</a>
									
													</td>
													
												</tr>
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

				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->

		@include('frontend.include.footer')
