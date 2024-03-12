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
								<h3 class="page-title">Announcement</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Announcement</li>
								</ul>
							</div>
							<!-- <div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="fa-solid fa-plus"></i> Add Leave</a>
							</div> -->
						</div>
					</div>
					<!-- /Page Header -->
					
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-2">{{$get_announcement->title}}</h3>
                        <p>{!!$get_announcement->description!!}</p>
						@php
						$originalDateTime = $get_announcement->created_at;
						$dateTime = new DateTime($originalDateTime);
						$formattedDateTime = $dateTime->format('d M \a\t h:ia');
						@endphp
						<p class="border-bottom date-time-announce">{{$formattedDateTime}}</p>
                    </div>
                </div>
                </div>
				<!-- /Page Content -->
				
	
				<!-- /Delete Leave Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
		@include('frontend.include.footer')
