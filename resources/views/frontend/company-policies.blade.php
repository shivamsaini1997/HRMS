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
                    <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Company Policies </h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Company Policies</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-12">
                          <p>{!! $get_policy->policies !!}</p>
                        </div>
                    </div>
                    </div>
                 </div>
        </div>
        

        @include('frontend.include.footer')


        <script>
            
        </script>